<?php
session_start();

include_once 'database.php';
$db = new Database();

$uid = $_SESSION['uid_new'];
$date = $_POST['datepicker'];
$comment = $_POST['comment'];
$idnum = $_POST['idno'];

$query = "INSERT INTO consultation (faculty_uid,stud_id,date,description) VALUES ('$uid','$idnum','$date','$comment')";
mysql_query($query);			
echo "string";

?>