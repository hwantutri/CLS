<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'cls');
$text = $mysqli->real_escape_string($_GET['term']);
$radioval = $_GET['radioval'];

if($radioval=="name"){
$query = "SELECT name as res FROM faculty WHERE $radioval LIKE '%$text%' ORDER BY name ASC";
}else if($radioval == "dept"){
$query = "SELECT DISTINCT dept as res FROM faculty WHERE $radioval LIKE '%$text%' ORDER BY name ASC";
}
$result = $mysqli->query($query);
$json = '[';
$first = true;
while($row = $result->fetch_assoc())
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row['res'].'","label":"'.$row['res'].'"}';
}
$json .= ']';
echo $json;

?>