<!DOCTYPE html>
<html lang="en" manifest="cache.appcache">

<head>
	<base href="<?php echo base_url();?>"></base>

	<meta charset="utf-8">
	<title>APOGEE 2016| LinkIt</title>
	<link href="style/jquery.countdown.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="keywords" content="HTML,CSS,Javascript,Make yourS own 2048,Play 2048">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="738693532334-c4to4fjjbg6gpaf9hq93aimrkoa37eg6.apps.googleusercontent.com">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
	<meta name="format-detection" content="telephone=no" />
	<meta property="og:title" content="2048 game" />
	<meta property="og:site_name" content="2048 game" />
	<meta property="og:description" content="A poetic form of '2048' which shall give you some words at the end to create a masterpiece!" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- banner-body -->
	<div class="banner-body">
		<div class="container">
			<div class="banner-body-content">


<?php
$this->load->library('session');
if ($this->session->userdata('logged_in')) {
	echo '<div class="welcome pull-right" style="position: relative; bottom: 5vh;">';
	echo '<p>Welcome '.$this->session->userdata('name').'</p>';
	echo '<p>'.$this->session->userdata('email').'</p>';
	echo '<img src="'.$this->session->userdata('imageUrl').'" alt="">';
	echo "</div>";
} else {
	echo '<div class="g-signin2 pull-right" data-onsuccess="onSignIn" style="position: relative; bottom: 5vh;" data-scope="https://www.googleapis.com/auth/plus.login"></div>';
}
?>
<div class="col-xs-3 banner-body-left">
					<div class="logo">
						<h1><a href="index.php/welcome/welcome_page">Link <span>It</span></a></h1>
					</div>
					<div class="top-nav">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="stroke">
									<ul class="nav navbar-nav">
										<li class="active"><a href="index.php/welcome/index"><i class="home"></i>Home</a></li>
										<!-- <li><a href="index.php/welcome/play" class="hvr-underline-from-left"><i class="picture1"></i>Play</a></li> -->
										<!-- <li><a href="index.php/welcome/profile" class="hvr-underline-from-left"><i class="text-size1"></i>Profile</a></li> -->
										<li><a id="a_play" href="javascript:alert('Please Login first.');void(0)" class="hvr-underline-from-left"><i class="picture1"></i>Play</a></li>
										<li><a id="a_profile" href="javascript:alert('Please Login first.');void(0)" class="hvr-underline-from-left"><i class="text-size1"></i>Profile</a></li>
									</ul>
								</nav>
							</div>
							<!-- /.navbar-collapse -->
						</nav>
					</div>
				</div>
				<div class="col-xs-9 banner-body-right">
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-wrap">
									<div class="banner">
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-wrap">
									<div class="banner1">
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-wrap">
									<div class="banner2">
									</div>
								</div>
							</article>
						</div>
					</div>
					<script src="js/jquery.wmuSlider.js"></script>
					<script>
						$('.example1').wmuSlider();
					</script>
				</div>
				<div class="clearfix"> </div>
				<div class="col-xs-3 banner-body-left">
					<div class="latest-news">
						<h2>Highest Scores</h2>
<?php
foreach ($board as $name) {
	?>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	<?php echo $name['title'];?>
	</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
	<?php
	echo $name['score'];
	echo $name['email'];
	?>
	</div>
										</div>
									</div>
								</div>
	<?php }
?>
							<div class="join">
								<a href="index.php/welcome/leader">Learn More</a>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
					<br>
					<center>
						<h2>Rules</h2></center>
						<br>
						<br>
						<section class="about">
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>The entries can be in English or Hindi.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>Each participant shall only get two minutes.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>At the end of two minutes, you shall have some words on the screen. The objective of the game is to use those words and write a piece using them.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>The word limit (for any entry) is 1500 words, which if exceeded, shall result in disqualification.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>Word play and interpretation of the topic words (or pictures) shall be appreciated but it shall be bound by plausible logic.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>Use of profanity shall result in disqualification.</p>
									</div>
								</div>
							</article>
							<article class="comment">
								<a class="comment-img" href="#non">
									<span class="glyphicon glyphicon-th-list" width="50" height="50"></span>
								</a>
								<div class="comment-body">
									<div class="text">
										<p>Plagiarism shall result in disqualification.</p>
									</div>
								</div>
							</article>
						</section>​
						<div class="clearfix"> </div>

						<center>
							<h2>Judging Criteria</h2></center>
							<br>
							<br>
							<section class="about">
								<article class="comment">
									<a class="comment-img" href="#non">
										<span class="glyphicon glyphicon-ok" width="50" height="50"></span>
									</a>
									<div class="comment-body">
										<div class="text">
											<p>Originality</p>
										</div>
									</div>
								</article>
								<article class="comment">
									<a class="comment-img" href="#non">
										<span class="glyphicon glyphicon-ok" width="50" height="50"></span>
									</a>
									<div class="comment-body">
										<div class="text">
											<p>Ingenious manipulation of Topic words (or pictures)</p>
										</div>
									</div>
								</article>
								<article class="comment">
									<a class="comment-img" href="#non">
										<span class="glyphicon glyphicon-ok" width="50" height="50"></span>
									</a>
									<div class="comment-body">
										<div class="text">
											<p>Literary aspects</p>
										</div>
									</div>
								</article>
								<article class="comment">
									<a class="comment-img" href="#non">
										<span class="glyphicon glyphicon-ok" width="50" height="50"></span>
									</a>
									<div class="comment-body">
										<div class="text">
											<p>Maximum use of words displayed at the end of the game.</p>
										</div>
									</div>
								</article>
							</section>​
							<div class="clearfix"> </div>
							<div class="footer">
								<div class="footer-left">
									<span><b>E-mail Us at:</b><br></span>
									<a href="mailto:poetryclub.bits@gmail.com" class="link1"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>poetryclub.bits@gmail.com</a>
								</div>
								<div class="footer-right">
									<a href="https://www.facebook.com/bitspoetry/?fref=ts" title=""><img src="images/poetrylogo.png" alt=""></a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<!-- //banner-body -->
				<!-- for bootstrap working -->
				<script src="js/bootstrap.js"></script>
				<script>
					function onSignIn(googleUser) {
						var profile = googleUser.getBasicProfile();
						var id = profile.getId();
						var name = profile.getName();
						var imageUrl = +profile.getImageUrl();
						var email = profile.getEmail();
						$('#a_play').attr("href", "index.php/welcome/play");
						$('#a_profile').attr("href", "index.php/welcome/profile");
						$.ajax({
					url: '<?php echo site_url('welcome/login');?>', // define here controller then function name
					method: 'POST',
					data: {
						name: name,
						imageUrl: imageUrl,
						email: email,
						logged_in : 1
					}, // pass here your date variable into controller
					success: function(result) {
						console.log(result); // alert your date variable value here
					}
				});
					}
				</script>
				<!-- //for bootstrap working -->
			</body>

			</html>
