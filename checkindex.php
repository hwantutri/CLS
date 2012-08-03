<?php
include 'database.php';
$db = new Database();

$uname = $_POST['uname'];
$uname = mysql_escape_string($uname);
$pass = $_POST['pass'];
$pass = mysql_escape_string($pass);

$string = "g";
$sql = "select * from faculty where Fac_id='$uname' and Password='$pass'";
$result = mysql_query($sql);
$total = mysql_num_rows($result);
if($total==1){
$string='gb';
}
echo $string;
?>