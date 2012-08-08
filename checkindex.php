<?php
include 'database.php';
$db = new Database();

$uname = $_POST['uname'];
//$uname = mysql_escape_string($uname);
$pass = $_POST['pass'];
//$pass = mysql_escape_string($pass);

$string = "g";
$sql = "select * from faculty where Fac_id='$uname' and Password='$pass'";
$result = mysql_query($sql);
$total = mysql_num_rows($result);
if($total==1){
//use Name of Fac_id as a SESSION
$sql2 = "select Name from faculty where Fac_id='$uname'";
$result2 = mysql_query($sql2);
session_start();
$_SESSION['user'] = mysql_result($result2,0);
$string='gb';
}
echo $string;
?>