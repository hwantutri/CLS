<?php
session_start();
include_once 'database.php';
$db = new Database();

$uid = $_SESSION['uid_new'];

$sem = $_POST['sem'];
$month = $_POST['month'];
$extra = $_POST['extra'];
$year = $_POST['year'];
$namedaily = $_POST['namedaily'];
$namemonthly = $_POST['namemonthly'];

if($extra=="daily"){
	$lastday = date("d",mktime(0,0,0,$month+1,0,$year));
		$logs = array();
		for($d = 1; $d <= $lastday; $d++){
			$result =  mysql_query("SELECT COUNT( * ) AS logs
							from consultation
                            where faculty_uid='$uid'
							AND date LIKE '".date("Y/m/d",mktime(0,0,0,$month,$d,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}
else if($extra=="monthly"){
	$logs = array();
	for ($m = 1; $m <= 12; $m++) {
		$result = mysql_query("SELECT COUNT(*) as logs
							from consultation
							where faculty_uid='$uid'
							and date LIKE '%".date("Y/m",mktime(0,0,0,$m,1,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}

else if($extra=="daily2"){
	$lastday = date("d",mktime(0,0,0,$month+1,0,$year));
		$logs = array();
		for($d = 1; $d <= $lastday; $d++){
			$result =  mysql_query("SELECT COUNT( * ) AS logs
							from consultation,faculty
                            where faculty.faculty_uid='$namedaily' and consultation.faculty_uid=faculty.faculty_uid
							AND date LIKE '".date("Y/m/d",mktime(0,0,0,$month,$d,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}
else if($extra=="monthly2"){
	$logs = array();
	for ($m = 1; $m <= 12; $m++) {
		$result = mysql_query("SELECT COUNT(*) as logs
							from consultation,faculty
							where faculty.faculty_uid='$namemonthly' and consultation.faculty_uid=faculty.faculty_uid
							and date LIKE '%".date("Y/m",mktime(0,0,0,$m,1,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}
else if($extra=="sem"){
	$logs = array();
	for ($m = 1; $m <= 12; $m++) {
		$result = mysql_query("SELECT COUNT(*) as logs
							from consultation
							where faculty_uid='$uid' AND consultation.sem='$sem'
							and date LIKE '%".date("Y/m",mktime(0,0,0,$m,1,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}

else if($extra=="sem2"){
	$logs = array();
	for ($m = 1; $m <= 12; $m++) {
		$result = mysql_query("SELECT COUNT(*) as logs
							from consultation,faculty
							where faculty.faculty_uid='$namemonthly' and consultation.faculty_uid=faculty.faculty_uid AND consultation.sem='$sem'
							and date LIKE '%".date("Y/m",mktime(0,0,0,$m,1,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}

?>