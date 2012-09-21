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
	<title>Consultation Logs System</title>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>    
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
 	
 	<!--<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />-->
 	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	
<style type="text/css">

body {background-image:url('images/wallpaper3.jpg');
background-repeat: no-repeat;}

form legend {
	color: #2F4F4F;
	padding: 0 0 20px 0;
	font-weight: bold;
	font-size: 52;
	position:fixed;
	top:200px;
	left: 350px;
	
}

#style {
	color: #2F4F4F;
	padding: 0 0 20px 0;
	font-weight: bold;
	position:fixed;	
	font-size: 14px;
	left: 580px;
}
#footer {
	border-top: 1px solid #202020;
	background:white;
	bottom:0;
	position:absolute;
	height: 60px;
	width: 100%;
	text-align: center;
}
#mid {
	background: url(..images/white.png) 0 center no-repeat;
	text-align: center;
	margin: 0 auto;
	width: 960px;
	padding-top: 46px;
	height: 440px;
	position: relative;

}

	table{
	margin: 1em auto;
	text-align: left;

	empty-cells: show;
	border: none;
	}
	table{width:100%;	box-shadow: 10px 10px 20px #888888;
}
	td{

	text-align: left;
	border: none;
	}tr{
	border: none;
	}


#footer .strong {font-weight: bold; font-size: 16px; color:black;}
#footer p, p:hover, p:visited {color: #2F4F4F;}
#footer .col1 {float: left; padding: 10px 0 10px 10px; width: 34%; }
#footer .col2 {float: left; padding: 10px 0 10px ; width: 30%; }
#footer .col3 {float: left; padding: 5px 0 10px ; width: 34%; }

#wrap {min-height:   10%;}
p{color: white;font-size:0.4px;}






</style>
</head>
<div style="height:120px"></div>
<body background="bg1.jpg">

<div id="header">
<input type="image" src="images/cls_logo.png" name="name" width="300" height="45" style="margin-left:100px;">
</div>
<div id="mid">
	
<form>
	<div class="CSSTableGenerator">
	<table>
	<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$query1 = mysql_query("select * from consultation where faculty_uid='".$uid."'  and cid='".$_GET['p']."'");

           while ($row = mysql_fetch_array($query1)) {
       $query2 = mysql_query("select stud_name from student where stud_id='".$row['stud_id']."'");
       $row2 = mysql_fetch_array($query2);
      

       echo "<table bgcolor='#678197'  height=60%>";    
        echo "<tr>";     
      echo "<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4 style='width:20px;'>Student Name:</FONT>" ."</td>" ."<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>". $row2['stud_name'] ."</td>";
       echo "</tr>";
        echo "<tr>";
      echo "<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4 style='width:20px;'>Date:</FONT>". "</td>" ."<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>".$row['date'] ."</td>";
       echo "</tr>";
        echo "<tr>";
      echo "<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4 style='width:20px;'>Time:</FONT>"."</td>" ."<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>". $row['time'] ."</td>";
       echo "</tr>";
        echo "<tr>";
     echo "<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4 style='width:20px;'>Subject & Section:</FONT>". "</td>" ."<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>".$row['subsec'] ."</td>";
       echo "</tr>";
        echo "<tr>";
     echo "<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>Description:</FONT>"."</td>" ."<td><FONT COLOR=white FACE='Geneva, Arial' SIZE=4>". $row['description']."</td>";
       echo "</tr>";
        echo "</table>";  
        
            
      
            }         
?>
</table>
</div>

</form>	
</div>

<div id = "footer">
 <div class="col1">
   <p>
     
   </p>
  </div><!--col1-->
 <div class="col2">
    <p>
   
    </p>
 </div><!--col2-->
  <div class="col3">
    <p>
   <span class="strong"><font size="2">Contact Us: </font></span>    
    <span><font size="2">0906-139-1950</font></span></br>
     <span class="strong"><font size="2">Visit Us: </font></span>
    <a href="https://www.facebook.com/"><img src="images/fb.png" alt="facebook" height="20" width="20"></a>
   <a href="http://twitter.com/"><img src="images/twit.jpg" alt="twitter" height="20" width="20"></a>
    <a href="https://accounts.google.com/ServiceLogin?service=oz&continue=https://plus.google.com/?gpsrc%3Dgplp0&hl=en"><img src="images/g+.png" alt="google+" height="20" width="20"></a></p>
  </div><!--col3-->
</div>

</body>
</html>
	