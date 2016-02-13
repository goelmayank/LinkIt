// auth2 is initialized with gapi.auth2.init() and a user is signed in.

if (auth2.isSignedIn.get()) {
  var profile = auth2.currentUser.get().getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}

/**
 * Verify id token is token by checking the certs and audience
 * @param {string} idToken ID Token.
 * @param {string} audience The audience to verify against the ID Token
 * @param {function=} callback Callback supplying GoogleLogin if successful
 */
OAuth2Client.prototype.verifyIdToken = function(idToken, audience, callback) {
  if (!idToken || !callback) {
    throw new Error('The verifyIdToken method requires both ' +
      'an ID Token and a callback method');
  }

  this.getFederatedSignonCerts(function(err, certs) {
    if (err) {
      callback(err, null);
    }
    var login;
    try {
      login = this.verifySignedJwtWithCerts(idToken, certs, audience,
        OAuth2Client.ISSUERS_);
    } catch (err) {
      callback(err);
      return;
    }

    callback(null, login);
  }.bind(this));
};

/**
 * Verify the id token is signed with the correct certificate
 * and is from the correct audience.
 * @param {string} jwt The jwt to verify (The ID Token in this case).
 * @param {array} certs The array of certs to test the jwt against.
 * @param {string} requiredAudience The audience to test the jwt against.
 * @param {array} issuers The allowed issuers of the jwt (Optional).
 * @param {string} maxExpiry The max expiry the certificate can be (Optional).
 * @return {LoginTicket} Returns a LoginTicket on verification.
 */
OAuth2Client.prototype.verifySignedJwtWithCerts =
  function(jwt, certs, requiredAudience, issuers, maxExpiry) {

    if (!maxExpiry) {
      maxExpiry = OAuth2Client.MAX_TOKEN_LIFETIME_SECS_;
    }

    var segments = jwt.split('.');
    if (segments.length !== 3) {
      throw new Error('Wrong number of segments in token: ' + jwt);
    }
    var signed = segments[0] + '.' + segments[1];

    var signature = segments[2];

    var envelope, payload;
    try {
      envelope = JSON.parse(this.decodeBase64(segments[0]));
    } catch (err) { }

    if (!envelope) {
      throw new Error('Can\'t parse token envelope: ' + segments[0]);
    }

    try {
      payload = JSON.parse(this.decodeBase64(segments[1]));
    } catch (err) { }
    if (!payload) {
      throw new Error('Can\'t parse token payload: ' + segments[1]);
    }

    var pem = certs[envelope.kid];
    var pemVerifier = new PemVerifier();
    var verified = pemVerifier.verify(pem, signed, signature, 'base64');

    if (!verified) {
      throw new Error('Invalid token signature: ' + jwt);
    }

    if (!payload.iat) {
      throw new Error('No issue time in token: ' + JSON.stringify(payload));
    }

    if (!payload.exp) {
      throw new Error('No expiration time in token: ' + JSON.stringify(payload));
    }

    var iat = parseInt(payload.iat, 10);
    var exp = parseInt(payload.exp, 10);
    var now = new Date().getTime() / 1000;

    if (exp >= now + maxExpiry) {
      throw new Error('Expiration time too far in future: ' +
        JSON.stringify(payload));
    }

    var earliest = iat - OAuth2Client.CLOCK_SKEW_SECS_;
    var latest = exp + OAuth2Client.CLOCK_SKEW_SECS_;

    if (now < earliest) {
      throw new Error('Token used too early, ' + now + ' < ' + earliest + ': ' +
        JSON.stringify(payload));
    }

    if (now > latest) {
      throw new Error('Token used too late, ' + now + ' > ' + latest + ': ' +
        JSON.stringify(payload));
    }

    if (issuers && issuers.indexOf(payload.iss) < 0) {
      throw new Error('Invalid issuer, expected one of [' + issuers +
          '], but got ' + payload.iss);
    }

    // Check the audience matches if we have one
    if (typeof requiredAudience !== 'undefined' && requiredAudience !== null) {
      var aud = payload.aud;
      if (aud !== requiredAudience) {
        throw new Error('Wrong recipient, payload audience != requiredAudience');
      }
    }

    return new LoginTicket(envelope, payload);
  };

/**
 * This is a utils method to decode a base64 string
 * @param {string} b64String The string to base64 decode
 * @return {string} The decoded string
 */
OAuth2Client.prototype.decodeBase64 = function(b64String) {
  var buffer = new Buffer(b64String, 'base64');
  return buffer.toString('utf8');
};

/**
 * Export OAuth2Client.
 */
module.exports = OAuth2Client;