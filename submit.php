<?php
require_once('database.php');
$db = new Database();
$idno = $_POST['idno'];
$subsec = $_POST['subsec'];
$date = $_POST['date'];
$duration = $_POST['duration'];
$comment = $_POST['comment'];
mysql_query("INSERT INTO consultation (Student_id, Duration, Description) VALUES ('$idno','$duration','$comment')");
//header( 'location:form.php' ) ;
?>
