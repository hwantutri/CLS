<?php
session_start();
include_once 'class_login.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

if(!$login->get_session()){
	header("location:index.php");
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/form-css.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="development-bundle/themes/base/jquery.ui.all.css" media="screen" />
	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	<script type="text/javascript" src="js/form-script.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript" src="development-bundle/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="development-bundle/ui/jquery.ui.tabs.js"></script>
	
</head>
<body background = "bg1.jpg">

<div id="header">
  <div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="logout.php" id="sign_up_header_link" class="login-window" data-event="homepage.login" rel="header">Log Out</a></li>
  			<li><a href="#" id="login_header_link" class="login-window" data-event="homepage.login" rel="header"><?php $login->get_name($uid);?></a></li>
			<input type="image" src="images/cls_logo.png" name="name" width="300" height="45" style="margin-left:-70px;">
		</ul>
  </div>
</div>

<!--Chart Tabs-->
<div class="demo">
</br></br></br></br>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Daily</a></li>
		<li><a href="#tabs-2">Monthly</a></li>
	</ul>
	<div id="tabs-1">
		<p><font color="black">Generate a daily chart for consultations.</font></p>
		
		<form style="padding: 0 20px 20px 50px;">
			<br /> <br />			
				<select name="month" id="month">
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				<select name="year" id="year">
                    <?php
						$result = mysql_query("select distinct substring_index(time,'-',1) as AYEAR from consultation order by AYEAR desc");
                            while ($row = mysql_fetch_object($result)) {
                                echo '<option value='.$row->AYEAR.'>'.$row->AYEAR.'</option>';
                            }
					?>
				</select>
			<input type="button" name="genbtn0" id="genbtn0" value="Generate &rarr;">
		</form>
		<div id="myChart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</div>
	
	<div id="tabs-2">
		<p><font color="black">Generate a monthly chart for consultations.</font></p>
		
		<form style="padding: 0 20px 20px 50px;">
			<br /> <br />			
				<select name="year" id="year">
                    <?php
						$result = mysql_query("select distinct substring_index(time,'-',1) as AYEAR from consultation order by AYEAR desc");
                            while ($row = mysql_fetch_object($result)) {
                                echo '<option value='.$row->AYEAR.'>'.$row->AYEAR.'</option>';
                            }
					?>
				</select>
			<input type="button" name="genbtn1" id="genbtn1" value="Generate &rarr;">
		</form>	
		<div id="myChart2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</div>
</div>

</div>
	
		<div id="navigation-block3">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="form.php">Consult</a></li>
                <li class="sliding-element"><a href="review.php">Review</a></li>
                <li class="sliding-element"><a href="chart.php">Chart</a></li>
                <li class="sliding-element"><a href="#location-box" class="location-window">Set My Location</a></li>
                <li class="sliding-element"><a href="#">Help</a></li>
            </ul>
        </div>
		<div id="location-box" class="location-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form name="loginform" class="signin">
                <fieldset class="textbox">
                <label>
				<font size="5" color="white">Set Location</font>
				</br></br>
					</label>
            	<label class="location">
                <input id="location" name="location" value="" type="text" autocomplete="on" placeholder="My Location" autofocus="autofocus">
                </label>
                <label>
                <button name="location_btn" id="location_btn" class="submit button" type="button">Set  &rarr;</button>
                </label>
                </fieldset>
          </form>
	</div>
</body>
</html>