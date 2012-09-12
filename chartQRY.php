<?php
$connect = mysql_connect('localhost','root','') or die('Could not connect to mysql server.' );
mysql_select_db('cls', $connect) or die('Could not select database.');

$month = $_POST['month'];
$extra = $_POST['extra'];
$year = $_POST['year'];

if($extra=="daily"){
	$lastday = date("d",mktime(0,0,0,$month+1,0,$year));
		$logs = array();
		//$years = $year;
		for($d = 1; $d <= $lastday; $d++){
			$result =  mysql_query("SELECT COUNT( * ) AS logs
							from consultation
                            where faculty_uid='dorward.villaruz'
							AND time LIKE '".date("Y-m-d",mktime(0,0,0,$month,$d,$year))."%'");
			$json_logs = array();
			while ($row = mysql_fetch_assoc($result)) {
					$logs[] = $row['logs'];
					array_push($json_logs, $row['logs']);
				   }
		}
		$string = implode($logs, ', ');
		echo $string;
}
else if($extra=="lol1"){
	$visits = array();
	for ($m = 1; $m <= 12; $m++) {
		$date = $year."-0".$m;
		$result = mysql_query("SELECT COUNT( * ) AS visits
							from logbook, stud_course, coursecollege,collegelist,visitor
                            where logbook.idnum=visitor.idnum
							and stud_course.idnum=visitor.idnum
							and coursecollege.college_code=collegelist.college_code
                            and stud_course.course_code=coursecollege.course
                            and logbook.libcode='$libcode'
                            AND logbook.petsa like '".date("Y-m",mktime(0,0,0,$m,1,$year))."%'");
			$json_visits = array();
			while ($row = mysql_fetch_assoc($result)) {
					$visits[] = $row['visits'];
					array_push($json_visits, $row['visits']);
				   }
		}
		$string2 = implode($visits, ', ');
		echo $string2;
}
?>