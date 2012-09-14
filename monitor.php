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
	<link rel="stylesheet" type="text/css" href="css/styles4.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/noreset.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/form-css.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/CSSTableGenerator.css" media="screen" />

	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	<script type="text/javascript" src="js/form-script.js"></script>
	
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

		<div id="navigation-block5">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="form.php">Consult</a></li>
                <li class="sliding-element"><a href="review.php">Review</a></li>
                <li class="sliding-element"><a href="chart.php">Chart</a></li>
				<li class="sliding-element"><a href="addstudents.php">Add Students</a></li>
                <li class="sliding-element"><a href="#location-box" class="location-window">Set My Location</a></li>
				<?php if ($uid=='val.madrid') echo "<li class='sliding-element'><a href='monitor.php'>Monitor</a></li>"; ?>
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

<form id="searchform" name="searchform" method="post" action="search.php">

<div class="CSSTableGenerator">
<table>

	<thead>
	<tr class="odd">
	<th scope="col" abbr="Name" >Name</th>	
	<th scope="col" abbr="College">Consultations</th>
	<th scope="col" abbr="College">Student Served</th>
	<th scope="col" abbr="Department">Last Post</th>  
	</tr>
	</thead>

<br>

<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$query1 = mysql_query("select * from faculty");

           while ($row = mysql_fetch_array($query1)) {
			$query2 = mysql_query("select * from consultation where faculty_uid='".$row['faculty_uid']."' order by cid desc");
			$consultations = mysql_num_rows($query2);
			$row2 = mysql_fetch_array($query2);
			$query3 = mysql_query("select distinct stud_id from consultation where faculty_uid='".$row['faculty_uid']."'");
			$stud_count = mysql_num_rows($query3);
            echo "<tbody>";
            echo "<thead>";
            echo "<tr>";
            echo "<td><a href='monitor1.php?uid=". $row['faculty_uid'] . "'>" . $row['name'] . "</td>";
			echo "<td><a href='monitor1.php?uid=". $row['faculty_uid'] . "'>" . $consultations . "</td>";
			echo "<td><a href='monitor1.php?uid=". $row['faculty_uid'] . "'>" . $stud_count . "</td>";
			echo "<td><a href='monitor1.php?uid=". $row['faculty_uid'] . "'>" . $row2['description'] . "<br>" . $row2['time'] . "</td>";
            echo "</tr>";
            echo "</thead>";
            echo "</tbody>";
			
            }         
?>
</table>

</div>
		<div id="view-box" class="location-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form name="loginform" class="signin">
                <fieldset class="textbox">
            	<label>WHAT!<table><th>dfjhfdh</th></table> </label>
                </fieldset>
          </form>
		</div>
</form>	
</body>
</html>