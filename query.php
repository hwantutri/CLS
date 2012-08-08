<?php

$mysqli = new mysqli('localhost', 'root', '', 'cls');
$text = $mysqli->real_escape_string($_GET['term']);
$phrase = $_GET['phrase'];

if($phrase=='phrase') {
 
$query = "SELECT stud_id as idno, stud_name as fullname, stud_course as course, yearlvl as year FROM student WHERE stud_id LIKE '%$text%' ORDER BY stud_id ASC";
$result = $mysqli->query($query);
$json = '[';
$first = true;
while($row = $result->fetch_assoc())
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row['idno'].'","label":"'.$row['idno'].'","fullname":"'.$row['fullname'].'","courseyrlvl":"'.$row['course']." - ".$row['year'].'"}';
}
$json .= ']';
echo $json;
}

?>