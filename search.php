<?php

session_start();

mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$search_value = $_POST['fullname'];
$selected_radio = $_POST['radioval']; 

$s_query = mysql_query("select name,college,dept,status,location from faculty WHERE faculty.name LIKE '%$search_value%' OR faculty.dept LIKE '%$search_value%'");
//$n_query = mysql_query("SELECT * FROM faculty WHERE name LIKE '%$search_value%'");
$d_query = mysql_query("SELECT * FROM faculty WHERE dept LIKE '%$search_value%'");



?>
<html>
<head>
<title>Consultation Logs System</title>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>    
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles4.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	
 	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>

	<style type="text/css"> 
	
body {background-image:url('images/wallpaper3.jpg');
background-repeat: no-repeat;}
	
h1 {
  color:#2F4F4F;
  padding: 0 0 20px 0;
  font-weight: bold;
  font-size: 19pt;
  
}
#style {
  color: #2F4F4F;
  padding: 0 0 20px 0;
  font-weight: bold;
  position:relative; 
  font-size: 14px;
  left: 60px;
}
#legend {
  color: #2F4F4F;
  padding: 0 0 20px 0;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 24;
  position:fixed;
  top:70px;
  left: 150px;
  bottom: 500px;
  
}
  #md {
  background: url(..images/white.jpg) 0 center no-repeat;
  margin: 0 auto;
  width: 960px;
  padding-top: 46px;
  height: 440px;
  position: relative;
}


</style>
  <script>
  
  function refreshTable(){
        $('#divTable').load('search.php');
        setTimeout(refreshTable, 5000);
    }
  
  var new_val = null;
	var ac_config = {
				source: "result.php?radioval=name",
				select: function(event, ui){
						$("#fullname").val(ui.item.fullname);						
				},
				minLength:1
			};		

	$(document).ready(function(){
			
		refreshTable();
		var radio1 = document.searchform.radioval[0];
		var radio2 = document.searchform.radioval[1];
		
		$("input[name='radioval']").change(function(){
			if ($("input[name='radioval']:checked").val() == "name"){
				new_val = radio1.value;
				//alert(new_val);
			}else{
				new_val = radio2.value;
				//alert(new_val);
			}
			ac_config = {
				source: "result.php?radioval="+new_val,
				select: function(event, ui){
						$("#fullname").val(ui.item.res);
				},
				minLength:1
			};	
			$("#fullname").autocomplete(ac_config);
		});
		
		$("#fullname").autocomplete(ac_config);

		$("input:submit, a, button", ".demo").button();
		
	});
  </script>
</head>
<body background="bg1.jpg">

<div id="header">
</div>
<div id="md">
<form id="searchform" name="searchform" method="post" action="search.php">
<br />

<h1>Faculty Availability Search</h1> 
<div class="demo">   
<input id="fullname" name="fullname" type="text"  style="width: 15em; height:1.87em;">
<input type = "submit" name="submit" value = "Search"> 
<div id="style">
<input type="radio" name="radioval" value="name" checked /> Name
<input type="radio" name="radioval" value="dept" /> Department
</div>

</div>

<table name="result-table" style="width:1000px;">

	<thead>
	<tr class="odd">
	<th scope="col" abbr="Name">Name</th>	
	<th scope="col" abbr="College">College</th>
	<th scope="col" abbr="Department">Department</th>  
  <th scope="col" abbr="Location">Location</th>
	<th scope="col" abbr="Status">Status</th>
	</tr>
	</thead>

<br>

<?php

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
        
?>
</table>
</form>	
</div>
</body>
</html>
	