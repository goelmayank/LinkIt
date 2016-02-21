<!DOCTYPE html>
<html>

<head>
     <!-- <base href="<?php// echo base_url(); ?>"></base>
     <?php// echo 'test'; ?> -->
    <base href='<?php echo base_url(); ?>'></base>
    <meta charset="utf-8">
    <title>APOGEE 2016| LinkIt</title>
    <link href="style/jquery.countdown.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="keywords" content="HTML,CSS,Javascript,Make your own 2048,Play 2048">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="format-detection" content="telephone=no" />
    <meta property="og:title" content="2048 game" />
    <meta property="og:site_name" content="2048 game" />
    <meta property="og:description" content="A poetic form of '2048' which shall give you some words at the end to create a masterpiece!" />
    <!-- for-mobile-apps -->
    <meta name="keywords" content="A poetic form of '2048' which shall give you some words at the end to create a masterpiece!" />
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
    <script src="js/jquery-2.2.0.min.js"></script>
    <!-- //js -->
</head>

<body>
    <!-- banner-body -->
    <div class="banner-body">
        <div class="container">
            <div class="banner-body-content">
                <div class="col-xs-3 banner-body-left">
                    <div class="logo">
                        <h1><a href="index.php/welcome/index">Link <span>It</span></a></h1>
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
                                        <li><a href="index.php/welcome/play" class="hvr-underline-from-left"><i class="picture1"></i>Play</a></li>
                                        <li><a href="index.php/welcome/profile" class="hvr-underline-from-left"><i class="text-size1"></i>Profile</a></li>
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
    <!-- //for bootstrap working -->
</body>

</html>
