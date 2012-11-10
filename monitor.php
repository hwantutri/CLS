<?php
session_start();
include_once 'class_login.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

if(!$login->get_session()){
	header("location:index.php");
}
?>

<html>
    <head>
        <title>CLS - Monitor</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
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

        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "media/css/demo_table_jui1.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables1').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
        
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
          <form name="loginform" id="signin">
                <form name="loginform" class="signin">
                <fieldset class="textbox">
               <font size="5" color="white">Set Location</font>
                </br></br>
                                
<select id="ddl" onchange="configureDropDownLists(this,'location')">
<option value="msuiit">MSU-IIT</option>
<option value="online">Online</option>
<option value="others">Others</option>
</select>

<select id="location">
    
<?php
            $res = mysql_query("SELECT * from location WHERE type = 0");
                while ($row = mysql_fetch_array($res)) {
                echo '<option value="'.$row['name'].'"">'.$row['name'].'</option>';
                }
?>
</select>

<input id="others" name="others" value="" type="text" autocomplete="on" placeholder="My Location" autofocus="autofocus" style="visibility:hidden">

                </br></br>
                <button name="location_btn" id="location_btn" class="submit button" type="button">Set  &rarr;</button>
                
                </fieldset> 
          </form>
    </div>

        <div>
            <table id="datatables1" class="display">
    <thead>
	<tr class="odd">
	<th scope="col" width="px" abbr="Name" >Name</th>	
	<th scope="col" abbr="College">Consultations</th>
	<th scope="col" width="200px" abbr="College">Student Served</th>
	<th scope="col" width="300px" abbr="Department">Last Post</th>  
	</tr>
	</thead>
                <tbody>


<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$querydept = mysql_query("SELECT dept from faculty WHERE faculty_uid = '".$uid."'");
$rowdept = mysql_fetch_array($querydept);
$query1 = mysql_query("select * from faculty where dept='".$rowdept['dept']."'");

           while ($row = mysql_fetch_array($query1)) {
			$query2 = mysql_query("select * from consultation where faculty_uid='".$row['faculty_uid']."' order by cid desc");
			$consultations = mysql_num_rows($query2);
			$row2 = mysql_fetch_array($query2);
			$query3 = mysql_query("select distinct stud_id from consultation where faculty_uid='".$row['faculty_uid']."'");
			$stud_count = mysql_num_rows($query3);
            echo "<tr>";
            echo "<td><a href='monitorStud.php?u=". $row['faculty_uid'] . "&p=" . $row['name']."'>" . $row['name'] . "</td>";
			echo "<td><a href='monitorStud.php?u=". $row['faculty_uid'] . "&p=" . $row['name']."'>" . $consultations . "</td>";
			echo "<td><a href='monitorStud.php?u=". $row['faculty_uid'] . "&p=" . $row['name']."'>" . $stud_count . "</td>";
			$string = $row2['description'];
			if(strlen($string)>40){
				$string = substr($string,0,40);
				$string = $string.' ...';
			}
			echo "<td><a href='monitorStud.php?u=". $row['faculty_uid'] . "'>" . $string . "<br>" . $row2['time'] . "</td>";
			echo "</tr>";
            }         
?>
                </tbody>
            </table>
        </div>
    </body>
</html>