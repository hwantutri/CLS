<?php
session_start();
include_once 'database.php';
$db = new Database();

$uid = $_SESSION['uid_new'];

$month = $_POST['month'];
$extra = $_POST['extra'];
$year = $_POST['year'];
$search_value = $_POST['name'];

if($extra=="daily2"){
	$lastday = date("d",mktime(0,0,0,$month+1,0,$year));
		$logs = array();
		for($d = 1; $d <= $lastday; $d++){
			$result =  mysql_query("SELECT COUNT( * ) AS logs
							from consultation
                            where faculty_uid='$search_value'
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
							from consultation
							where faculty_uid='$search_value'
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
							from consultation
							where faculty_uid='$search_value'
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