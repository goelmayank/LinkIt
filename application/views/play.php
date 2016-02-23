<!DOCTYPE html>
<html lang="en" manifest="cache.appcache">

<head>
	<base href="<?php echo base_url();?>"></base>

    <meta charset="utf-8">
    <title>APOGEE 2016| LinkIt</title>
    <link href=" style/jquery.countdown.css" rel="stylesheet" type="text/css">
    <link href=" style/main.css" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400,600,700' rel='stylesheet' type='text/css'> -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="keywords" content="HTML,CSS,Javascript,Make your own 2048,Play 2048">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!-- <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui"> -->
    <meta name="format-detection" content="telephone=no" />
    <meta property="og:title" content="2048 game" />
    <meta property="og:site_name" content="2048 game" />
    <meta property="og:description" content="A poetic form of '2048' which shall give you some words at the end to create a masterpiece!" />
    <script src="js/jquery-1.11.1.min.js"></script>
</head>

<bdy>
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
	$this->load->view('index');
}
?>
<div class="heading">
                <h1 class="title">LinkIt</h1>
                <div class="scores-container">
                    <div class="score-container">0</div>
                    <div class="best-container">0</div>
                </div>
            </div>
            <div class="above-game">
                <p class="game-intro">
                    Use the arrow keys to slide tiles. Combine words with similar rhyming scheme to create new ones. At the end of two minutes you shall have to use the words on the grid to create a masterpiece!
                </p>
            </div>
            <div class="pre-game">
                <br>
                <br>
                <span id='m'>00</span><span>:</span><span id='s'>00</span>
                <br>
                <br>
            </div>
            <center>
                <div class="game-container">
                    <div class="game-message">
                        <p></p>
                        <div class="lower">
                            <a href="#poem" class="learn learn-low write">Write your poem!</a>
                            <a class="retry-button learn learn-low">Play Again</a>
                            <!-- <div class="score-sharing"></div> -->
                        </div>
                    </div>
                    <div class="start-message">
                        <center>
                            <!-- <p>
                                Let's get started!
                            </p>
                            <a class="start restart-button learn learn-low write">Start Game!</a> -->
                            <p>
                                Let's get started!<br>Chose your language.
                            </p>
                            <br>
                            <a class="restart-button english learn learn-low">English</a>
                            <a class="restart-button hindi learn learn-low">Hindi</a>
                        </center>
                    </div>
                    <div class="grid-container">
                        <div class="grid-row">
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                        </div>
                        <div class="grid-row">
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                        </div>
                        <div class="grid-row">
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                        </div>
                        <div class="grid-row">
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                            <div class="grid-cell"></div>
                        </div>
                    </div>
                    <div class="tile-container">
                    </div>
                </div>
            </center>
            <div class="clearfix"> </div>
            <br>
            <hr>
            <br>
            <div id="poem">
                <!-- <span class="mw-headline" id="Poem"> -->
                <center>
                <h2 id="writeHead">Please play the game to get a set of words.</h2>

                <!-- </span> -->
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#title').focus();
                    $('#text').autosize();
                });
                </script>
<?php echo form_open('welcome/userdata');?>


                <div id="wrapper">
                    <!-- <form id="paper" method="get" action=""> -->
                            <textarea placeholder="Your words" id="words" name="words" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; " disabled>


                </textarea>
                <br>
                        <div id="margin">Title:
                            <input id="title" type="text" name="title">
                            <!-- <input id="email" type="text" name="user_email" value="<?php echo $userData->email;?>"> -->
                        </div>
                        <textarea placeholder="Enter your poem." id="text" name="text" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; ">

                        </textarea>
                        </center>
                        <br>
                        <input id="button" type="submit" onclickvalue="Create" >
<?php echo form_close();?>

                    </form>
                </div>
            </div>
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
    <script src="js/bind_polyfill.js"></script>
    <script src="js/classlist_polyfill.js"></script>
    <script src="js/animframe_polyfill.js"></script>
    <script src="js/keyboard_input_manager.js"></script>
    <script src="js/html_actuator.js"></script>
    <script src="js/grid.js"></script>
    <script src="js/tile.js"></script>
    <script src="js/local_storage_manager.js"></script>
    <script src="js/game_manager.js"></script>
    <script src="js/application.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $("#button").click(function(){
var words = $(".tile-inner").text();
var score = $(".score-container").text();
var poem = $("#text").html();
var title = $("#title").html();
console.log("Hi");
            $.ajax({

                url: '<?php echo site_url('welcome/userdata');?>', // define here controller then function name
                method: 'POST',
                data: {
                    words: words,
                    score: score,
                    poem: poem,
                    title: tile
                }, // pass here your date variable into controller
                success: function(result) {
                    console.log(result); // alert your date variable value here
                }
            });
        })();
    </script>
</body>

</html>
