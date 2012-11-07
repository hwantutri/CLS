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
<script type="text/javascript">
    function configureDropDownLists(ddl1,location) {
        var msuiit = new Array('SCS Lounge', 'CS Department', 'Main Library' );
        var online = new Array('Facebook', 'Google', 'Twitter');


        switch (ddl1.value) {
            case 'msuiit':
                document.getElementById(location).options.length = 0;
            for (i = 0; i < msuiit.length; i++) {
                    createOption(document.getElementById(location), msuiit[i], msuiit[i]);
                }
                break;
            case 'online':
                document.getElementById(location).options.length = 0;
            for (i = 0; i < online.length; i++) {
                    createOption(document.getElementById(location), online[i], online[i]);
                }
                break;
                default:
                    document.getElementById(location).options.length = 0;
                break;
        }

    }

    function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }
</script>
<head>
<title>CLS - Consult</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/form-css.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/jquery.toastmessage.css" media="screen" />

	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	<script type="text/javascript" src="js/form-script.js"></script>
	<script type="text/javascript" src="js/jquery.toastmessage.js"></script>
	
	
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

	<form id="clsform" name="clsform" action="" accept-charset="utf-8">
		<fieldset> <br /><br /><br /> <br /> <br /> <br />
			<p><legend>Consultation Form</legend></p>

			
			<p>
				<label for="idno" style="display: block; opacity: 1;">ID No.</label><br />
				<input type="text" name="idno" value="" id="idno" autocomplete="off" autofocus="autofocus">
			</p>
			<p>
				<label for="name" style="display: block; opacity: 1;">Name</label><br />
				<input type="text" name="name" value="Name" id="name" readonly="readonly">
			</p>
			<p>
				<label for="courseyrlvl" style="display: block; opacity: 1;">Course and Year Level</label><br />
				<input type="text" name="courseyrlvl" value="Course & Year Level" id="courseyrlvl" readonly="readonly">
			</p>
			<p>
				<!--<label for="subsec" style="display: block; opacity: 1;">Subject and Section</label><br />-->
				<select name="subsec" id="subsec" style="width:300px;"><option value>Subject and Section</option></select>
					<p id="optionHolder" name="optionHolder"></p>
			</p>
			<p>
				<label for="datepicker" style="display: block; opacity: 1;">Date</label><br />
				<input type="text" name="datepicker" value="<?php echo date("Y/m/d"); ?>" id="datepicker" >
			</p>
			<p>
				<label for="comment" style="display: block; opacity: 1;">Description</label><br />
				<textarea cols="30" rows="5" name="comment" id="comment"></textarea>
			</p>
			<p>
				<label for="actionTaken" style="display: block; opacity: 1;">Action Taken</label><br />
				<input type="text" name="actionTaken"  id="actionTaken" >
			</p>
			<p>
				<label for="results" style="display: block; opacity: 1;">Result</label><br />
				<input type="text" name="results"  id="results" >
			</p>
			<p>
				<label for="comments" style="display: block; opacity: 1;">Comments</label><br />
				<input type="text" name="comments"  id="comments" >
			</p>
			
		</fieldset>
		<p><input type="button" name="submitbtn" id="submitbtn" value="Submit &rarr;">&nbsp;&nbsp;<input name="reset_btn" type="button" value="Reset" onclick="resetForm('clsform');" ></p>
	</form>	
		<div id="navigation-block">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="form.php">Consult</a></li>
                <li class="sliding-element"><a href="review.php">Review</a></li>                
				<li class="sliding-element"><a href="addstudents.php">Add Students</a></li>
                <li class="sliding-element"><a href="#location-box" class="location-window">Set My Location</a></li>
				<?php
                $chair = mysql_query("select chairman from faculty where faculty_uid='".$uid."'");
                $chairrow = mysql_fetch_array($chair);
                if ($chairrow['chairman'] == 0){
					echo "<li class='sliding-element'><a href='chart.php'>Chart</a></li>";   
					echo "<li class='sliding-element'><a href='reports.php'>Generate Report</a></li>";
				}
                else if ($chairrow['chairman'] == 1){
					echo "<li class='sliding-element'><a href='chartChair.php'>Chart</a></li>";                
					echo "<li class='sliding-element'><a href='monitor.php'>Monitor</a></li>";
					echo "<li class='sliding-element'><a href='reportsChair.php'>Generate Report</a></li>";
				}
                ?>
				
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
<select id="ddl" onchange="configureDropDownLists(this,'location')">
<option value="msuiit">MSU-IIT</option>
<option value="online">Online</option>
</select>

<select id="location">
<option value="SCS Lounge">SCS Lounge</option>
<option value="CS Department">CS Department</option>
<option value="Main Library">Main Library</option>
</select>
</label>

                <label>
                <button name="location_btn" id="location_btn" class="submit button" type="button">Set  &rarr;</button>
                </label>
                
                </fieldset>
          </form>
	</div>
</body>
</html>