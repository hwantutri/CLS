<?php
session_start();

include_once 'database.php';
$db = new Database();

$date = $_POST['datepicker'];
$uid = $_SESSION['uid_new'];
$comment = $_POST['comment'];
$idnum = $_POST['idno'];
$option = $_POST['string'];
$subsec = $_POST['subsec'];
$location = $_POST['location'];
$name = $_POST['name'];
$semval = $_POST['semval'];
$actionTaken = $_POST['actionTaken'];
$results = $_POST['results'];
$comments = $_POST['comments'];

if($option=="update"){
	$query = "INSERT INTO consultation (faculty_uid,stud_id,date,description,subsec,actionTaken,results,comments,sem) VALUES ('$uid','$idnum','$date','$comment','$subsec','$actionTaken','$results','$comments','$semval')";
	mysql_query($query);
	echo "string";
	
}else if($option=="add"){
	$separate_ids = explode(",",$comment);
	foreach($separate_ids as $new_id){
		$query = "INSERT INTO sections (fid,section,sid) VALUES ('$uid','$subsec','$new_id')";
		mysql_query($query);
		echo "string";
	}
	
}else if($option=="dropdown"){
		$new_id = mysql_result(mysql_query("SELECT stud_id from student where stud_name='$name'"),0);
		$result = mysql_query("SELECT section as subsec from sections where sid='$new_id' and fid='$uid'");
        while ($row = mysql_fetch_object($result)) {
            echo '<option value="'.$row->subsec.'">'.$row->subsec.'</option>';
        }

}else{
	$query = "UPDATE faculty SET location='$location' where faculty_uid='$uid'";
	mysql_query($query);
	echo "string";
}			

?>