function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
    $.ajax({
        url: '<?php echo site_url('
        welcome / logout ');?>', // define here controller then function name
        method: 'POST',
        data: {
            logged_in: 0
        }, // pass here your date variable into controller
        success: function(result) {
            console.log(result); // alert your date variable value here
        }
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id = profile.getId();
    var name = profile.getName();
    var imageUrl = +profile.getImageUrl();
    var email = profile.getEmail();
    $('#a_play').attr("href", "index.php/welcome/play");
    $('#a_profile').attr("href", "index.php/welcome/profile");
    $.ajax({
        url: '<?php echo site_url('welcome / login ');?>', 
        method: 'POST',
        data: {
            name: name,
            imageUrl: imageUrl,
            email: email,
            logged_in: TRUE
        }, // pass here your date variable into controller
        success: function(result) {
            console.log(result); // alert your date variable value here
        }
    });
}
