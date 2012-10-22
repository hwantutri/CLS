<?php

mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$search_value = $_GET['searchVal'];
$selected_radio = $_GET['button'];

$s_query = mysql_query("SELECT * FROM faculty WHERE name LIKE '%$search_value%'");
$d_query = mysql_query("SELECT * FROM faculty WHERE dept LIKE '%$search_value%'");

echo '<table name="result-table" style="width:1000px; ">

<thead>
<tr class="odd">
<th scope="col" abbr="Name">Name</th>	
<th scope="col" abbr="College">College</th>
<th scope="col" abbr="Department">Department</th>  
<th scope="col" abbr="Location">Location</th>
<th scope="col" abbr="Status">Status</th>
</tr>
</thead>
<br>';

if ($selected_radio == 'name') {
          while ($row = mysql_fetch_array($s_query)) {
            echo "<tbody>";
            echo "<thead>";
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['dept'] . "</td>";  
            echo "<td>" . $row['location'] . "</td>";
               if ($row['status']==0) {
                echo "<td><font color='red'>Not Available</font></td>";
               }
               else
                {
                echo "<td><font color='green'>Available</font></td>";
                }
            echo "</tr>";
            echo "</thead>";
            echo "</tbody>";
            } 
        }
        else if ($selected_radio == 'dept') {
          while ($row = mysql_fetch_array($d_query)) {
            echo "<tbody>";
            echo "<thead>";
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['college'] . "</td>";
            echo "<td>" . $row['dept'] . "</td>";  
            echo "<td>" . $row['location'] . "</td>";
               if ($row['status']==0) {
                echo "<td><font color='red'>Not Available</font></td>";
               }
               else
                {
                echo "<td><font color='green'>Available</font></td>";
                }
            echo "</tr>";
            echo "</thead>";
            echo "</tbody>";
            } 
          }
echo '</table>';


?>