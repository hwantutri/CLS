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
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles4.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	
 	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>

	<style type="text/css"> 
body {background-image:url('images/wallpaper3.jpg');
background-repeat: no-repeat;}
h1 {
  color:#2F4F4F;
  padding: 0 0 30px 0;
  font-weight: bold;
  font-size: 19pt;font-family: Garamond, serif;
color: #fff9d6;	
font-size: 32px;
text-shadow:0px 0px 0 rgb(216,216,216),1px 1px 0 rgb(195,195,195),2px 2px 0 rgb(175,175,175),3px 3px 0 rgb(154,154,154), 4px 4px 0 rgb(134,134,134),5px 5px 4px rgba(0,0,0,0.7),5px 5px 1px rgba(0,0,0,0.5),0px 0px 4px rgba(0,0,0,.2);
  
}

#style {
  color: #2F4F4F;
  padding: 0 0 20px 0;
  font-weight: bold;
  position:relative; 
  font-size: 14px;
  left: 60px;
}
#legend {
  color: #2F4F4F;
  padding: 0 0 20px 0;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 24;
  position:fixed;
  top:70px;
  left: 150px;
  bottom: 500px;
  
}
  #md {
  background: url(..images/white.jpg) 0 center no-repeat;
  margin: 0 auto;
  width: 960px;
  padding-top: 46px;
  height: 440px;
  position: relative;
}
	table
	{
	position: relative;
	left: 0px;	
	width:100%;
	border-radius:5px;
	-moz-border-radius:25px;
	}
	#footer
	{
		width: 1020px;
		height: 20px;
		background-repeat: no-repeat;
	}
#footer .strong {font-weight: bold; font-size: 16px;}
#footer p, p:hover, p:visited {color: #2F4F4F;}
#footer .col1 {float: left; padding: 10px 0 10px 10px; width: 30%; }
#footer .col2 {float: left; padding: 10px 0 10px ; width: 34%; }
#footer .col3 {float: left; padding: 10px 0 10px ; width: 34%; }
#footer {position: relative;
	margin-top: 80px;
	height: 80px;
	clear:both;} 
#wrap {min-height: 	10%;}

p{color: white;font-size:0.4px;}
.CSSTableGenerator {width:100%;	box-shadow: 10px 10px 20px #888888;
}
.CSSTableGenerator tr:first-child td{
background-color:#AFDCEC;
font-size:14px;
font-family:Arial;
font-weight:bold;
color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);
	background-color:#005fbf;
}.CSSTableGenerator tr:last-child td:last-child {

	-moz-border-radius-bottomright:0px;

	-webkit-border-bottom-right-radius:0px;

	border-bottom-right-radius:0px;

}

.CSSTableGenerator table tr:first-child td:first-child {

	-moz-border-radius-topleft:0px;

	-webkit-border-top-left-radius:0px;

	border-top-left-radius:0px;

}

.CSSTableGenerator table tr:first-child td:last-child {

	-moz-border-radius-topright:0px;

	-webkit-border-top-right-radius:0px;

	border-top-right-radius:0px;

}.CSSTableGenerator tr:last-child td:first-child{

	-moz-border-radius-bottomleft:0px;

	-webkit-border-bottom-left-radius:0px;

	border-bottom-left-radius:0px;

}





</style>
</head>
<body onload="checkbutton();">
<div id="wrap">
<div id="header">
   <div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="javascript:javascript:history.go(-1)" id="sign_up_header_link" class="login-window" data-event="homepage.login" rel="header">Back</a></li>
  			<input type="image" src="images/cls_logo.png" name="name" width="300" height="45" style="margin-left:-70px;">
		</ul>
  </div>
</div>
</div>
<div id="md">
<form id="searchform" name="searchform" method="post" action="search.php">

<div class="CSSTableGenerator">
<table>

	<thead>
	<tr class="odd">
	<th scope="col" abbr="College">Student Name</th>
	<th scope="col" abbr="College">Date</th>
	<th scope="col" abbr="Department">Time</th>  
	<th scope="col" abbr="Department">Subject/Section</th> 
	<th scope="col" abbr="Name" >Description</th>
	</tr>
	</thead>

<br>

<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$query1 = mysql_query("select * from consultation where cid='".$_GET['p']."'");

           while ($row = mysql_fetch_array($query1)) {
		   $query2 = mysql_query("select stud_name from student where stud_id='".$row['stud_id']."'");
		   $row2 = mysql_fetch_array($query2);
            echo "<tbody>";
            echo "<thead>";
            echo "<tr>";
			echo "<td>" . $row2['stud_name'] . "</td>";
			echo "<td>" . $row['date'] . "</td>";
			echo "<td>" . $row['time'] . "</td>";
			echo "<td>" . $row['subsec'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
            echo "</thead>";
            echo "</tbody>";
			
            }         
?>
</table>
</div>
</form>	
<div id="footer">
<hr />
	<div class="col1">
	
		<p>
			<span class="strong"><font size="2">Consultation Log System</font></span>
		</p>
	</div><!--col1-->
	
	<div class="col2">
		<p>
		<span class="strong"><font size="2">Contact US:</font></span>		
		</p >
		<p>
		<span><font size="2">0906-139-1950</font></span>
		<span><font size="2">0905-123-4567</font></span>
		</p>
	<p>
		<span><font size="2">0915-322-4421</font></span>
		</p>
		
	</div><!--col2-->
	
	<div class="col3">
		<p>
			<span class="strong"><font size="2">Visit US:</font></span>		
		</p>
		<p><a href="https://www.facebook.com/"><img src="images/fb.png" alt="facebook" height="25" width="25"></a>
		<a href="http://twitter.com/"><img src="images/twit.jpg" alt="twitter" height="25" width="25"></a>
		<a href="https://accounts.google.com/ServiceLogin?service=oz&continue=https://plus.google.com/?gpsrc%3Dgplp0&hl=en"><img src="images/g+.png" alt="google+" height="25" width="25"></a></p>
	</div><!--col3-->
</div><!--footer-->

</div>
</body>
</html>
	