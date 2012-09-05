<?php
session_start();
include_once 'class_login.php';
include_once 'database.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

$query = "UPDATE faculty SET status=0 where faculty_uid='$uid'";
mysql_query($query);


$_SESSION['user_new'] = FALSE;
session_destroy();
header("location:index.php");

//if($_SERVER["REQUEST_METHOD"]=="POST"){
	//$user = $login->validate($_POST['username'],$_POST['password']);
	//if($user){header("location:form.php");}
	//else{$msg = 'Incorrect username and password';}
//}
?>