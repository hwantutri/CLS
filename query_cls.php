<?php
session_start();

include_once 'database.php';
$db = new Database();

$uid = $_SESSION['uid_new'];
$date = $_POST['datepicker'];
$comment = $_POST['comment'];
$idnum = $_POST['idno'];
$subsec = $_POST['subsec'];

$query = "INSERT INTO consultation (faculty_uid,stud_id,date,description,subsec) VALUES ('$uid','$idnum','$date','$comment','$subsec')";
mysql_query($query);			
echo "string";

?>