<?php
session_start();
include('class_login.php');

$login = new Login();

if(isset($_SESSION['uid_new'])) {
header("location:form.php");
}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $login->validate($_POST['username'],$_POST['password']);
		if($user){
		//successful login
		header("location:form.php");
		}else{
		//login failed
		$msg = 'Incorrect username or password';
		}
	}
?>

<html>
<head>
	<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/orbit-1.2.3.css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
<style type="text/css"> 
@font-face
{
font-family: myFirstFont;
src: url('fonts/andy.ttf')
}
lol
{
font-family:myFirstFont;
}
</style>

 
    <style type="text/css">
body{
	 background-image:url('images/wallpaper3.jpg');
background-repeat: no-repeat;
	 font:bold 12px Arial, Helvetica, sans-serif;
	 margin:0;
	 padding:0;
	 min-width:960px;
	 color:#bbbbbb; 
}

a { 
	text-decoration:none; 
	color:#00c6ff;
}

h1 {
	font: 4em normal Arial, Helvetica, sans-serif;
	padding: 20px;	margin: 0;
	text-align:center;
}

h1 small{
	font: 0.2em normal  Arial, Helvetica, sans-serif;
	text-transform:uppercase; letter-spacing: 0.2em; line-height: 5em;
	display: block;
}

h2 {
    color:#bbb;
    font-size:3em;
	text-align:center;
	text-shadow:0 1px 3px #161616;
}

.container {width: 960px; margin: 0 auto; overflow: hidden;}

#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:460px;
	margin-bottom:20px;
	margin:0 auto;
	padding:20px;
	border-radius:5px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:36px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	background:#000;
	display: none; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{
	display:none;
	background: #333;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	float: right; 
	margin: -25px -20px 0 0;
}

fieldset { 
	border:none; 
}

form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:12px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#666666; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:214px;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }

.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	font:12px; 
	width:100px;
}

.button:hover { background:#ddd; }

</style>

</head>

<body >
<div id="header">
  <div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="#login-box" id="login_header_link" class="login-window" data-event="homepage.login" rel="header">Login</a></li>
  		</ul>
  </div>
</div>

<div id="home-bokeh"> </br></br></br></br></br></br></br>
      <div id="featured"> 
     <img src="images/dummy-images/overflow.jpg" alt="Overflow: Hidden No More" height="300" width="450"/>
     <img src="images/dummy-images/captions.jpg"  alt="HTML Captions" height="300" width="450" />
     <img src="images/dummy-images/features.jpg" alt="and more features" height="300" width="450" />
	  <img src="images/dummy-images/coffee.jpg" alt="CLS" height="300" width="450"/>
		</div>
</div>

  <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<img height="30" STYLE="position:absolute; TOP:30px; Left:190px;" src="images/pen_paper_icon2.png">
          <form name="loginform" method="post" class="signin" action="#" onsubmit="return check()">
                <fieldset class="textbox">
                <label>
				<lol><font size="5">Log in to CLS</font></lol>
				</br></br>
					</label>
            	<label class="username">
                <span><font size="2.5px">Username</font></span>
                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username" autofocus="autofocus">
                </label>
                
                <label class="password">
                <span><font size="2.5px">Password</font></span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                <label>
                <button name="submit_btn" id="submit_btn" class="submit button" type="submit">Continue  &rarr;</button>
                </label>
                </fieldset>
          </form>
	</div>
</body>
     <div id="footer-span"></div>
</html>