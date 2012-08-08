<?php
require_once('database.php');
$db = new Database();
//redirect to index if session is unset
session_start();
if(!isset($_SESSION['user']))
header( 'location:index.php' ) ;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	
	<script type="text/javascript" charset="utf-8">
		$(function(){ $("label").inFieldLabels(); });
	</script>

</head>
<body background = "bg1.jpg">

<div id="header">
  <div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="logout.php" id="login_header_link" class="login-window" data-event="homepage.login" rel="header">Log Out</a></li>
  			<li><a href="" id="login_header_link" class="login-window" data-event="homepage.login" rel="header"><?php echo $_SESSION['user'] 	?></a></li>
  		</ul>
  </div>
</div>

	<form  accept-charset="utf-8">
		<fieldset> <br /><br /><br /> <br /> <br /> <br />
			<p><legend>Consultation Form</legend></p>
			<p>
				<label for="idno" style="display: block; opacity: 1;">ID No.</label><br />
				<input type="text" name="idno" value="" id="idno" autocomplete="off">
			</p>
			<p>
				<label for="subsec" style="display: block; opacity: 1;">Subject and Section</label><br />
				<input type="text" name="subsec" value="" id="subsec">
			</p>
			<p>
				<label for="subsec" style="display: block; opacity: 1;">Time & Date</label><br />
				<input type="text" name="date" value="" id="date">
			</p>
			<p>
				<label for="subsec" style="display: block; opacity: 1;">Duration</label><br />
				<input type="text" name="duration" value="" id="duration">
			</p>
			<p>
				<label for="comment" style="display: block; opacity: 1;">Description</label><br />
				<textarea cols="30" rows="10" name="comment" id="comment"></textarea>
			</p>
		</fieldset>
		<p><input type="submit" value="Submit &rarr;"></p>
	</form>	
		<div id="navigation-block">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="#">Consult</a></li>
                <li class="sliding-element"><a href="#">Review</a></li>
                <li class="sliding-element"><a href="#">Chart</a></li>
                <li class="sliding-element"><a href="#">Search</a></li>
                <li class="sliding-element"><a href="#">Help</a></li>
            </ul>
        </div>


</body>
</html>