<?php
include 'database.php';
$db = new Database();
$result = mysql_query("select name,college,dept,status from faculty");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="refresh" content="20">
<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	<style type="text/css"> 
th {
text-align: center;
}
table
{
border:2px solid #a1a1a1;
position: relative;
left: -150px;
padding:10px 40px; 
background:#dddddd;
width:800px;
border-radius:25px;
-moz-border-radius:25px; /* Firefox 3.6 and earlier */
}
</style>
</head>
<body background = "bg1.jpg">

<div id="header">
</div>
<form id="clsform" name="clsform">
<br /><br /><br /> <br /> <br /> <br />
<table>
	<tr>
	<th>Name</th>
	<th><img width="60"></th>
	<th>College</th>
	<th><img width="50"></th>
	<th>Department</th>
	<th>Status</th>
	</tr>
</table>
<br>
<table>
<?php
  while ($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['college'] . "</td>";
  echo "<td>" . $row['dept'] . "</td>";
  if ($row['status']==0) {
  echo "<td><font color='red'>Offline</font></td>";
  }
  else
  {
  echo "<td><font color='green'>Online</font></td>";
  }
  echo "</tr>";
  }
?>
</form>	
</table>
</body>
</html>
