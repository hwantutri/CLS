<?php

session_start();
include_once 'class_login.php';
include_once 'database.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

$end_stamp = date('Y-m-d H:i:s');
$curr_day = date('Y-m-d');

$get_start_time = mysql_query("SELECT start_time from daily_timer where start_time LIKE '%$curr_day%' AND f_id='$uid'");
$stime = mysql_fetch_array($get_start_time);
$db_start_stamp = $stime['start_time'];

$new_stime = strtotime(date('H:i:s', strtotime($db_start_stamp)));
$new_etime = strtotime(date('H:i:s', strtotime($end_stamp)));

$elapsed = $new_etime - $new_stime;
$new_elapsed = date('H:i:s', $elapsed);
$hours_per_day = $curr_day . ' ' . $new_elapsed; 

//check daily
$get_daily = mysql_query("SELECT hours_per_day from daily_timer where f_id='$uid'");

while($daily_time = mysql_fetch_array($get_daily)){
	$tdaily = $daily_time['hours_per_day'];
	$a = date('Y-m-d', strtotime($tdaily));

//check if there is a data for hours_per_day
if($tdaily=="new_stamp"){
	$end_stamp = date('Y-m-d H:i:s');
	mysql_query("UPDATE daily_timer SET end_time='$end_stamp', hours_per_day='$hours_per_day' where f_id='$uid' AND hours_per_day='new_stamp'");
}else if($a==$curr_day){
	$new_hpd = strtotime(date('H:i:s', strtotime($tdaily)));
	$add_to_hpd = $elapsed + $new_hpd;
	$new_elapsed = date('H:i:s', $add_to_hpd);
	$hours_per_day = $curr_day . ' ' . $new_elapsed; 
	mysql_query("UPDATE daily_timer SET end_time='$end_stamp', hours_per_day='$hours_per_day' where hours_per_day LIKE '%$curr_day%' AND f_id='$uid'");
}
}

mysql_query("UPDATE faculty SET status=0 where faculty_uid='$uid'");

$_SESSION['user_new'] = FALSE;
session_destroy();
header("location:index.php");

?>