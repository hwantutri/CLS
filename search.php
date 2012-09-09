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
  padding: 0 0 30px 0;
  font-weight: bold;
  font-size: 19pt;font-family: Garamond, serif;
color: #fff9d6;	
font-size: 32px;
text-shadow:0px 0px 0 rgb(216,216,216),1px 1px 0 rgb(195,195,195),2px 2px 0 rgb(175,175,175),3px 3px 0 rgb(154,154,154), 4px 4px 0 rgb(134,134,134),5px 5px 4px rgba(0,0,0,0.7),5px 5px 1px rgba(0,0,0,0.5),0px 0px 4px rgba(0,0,0,.2);
  
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
	table
	{
	position: relative;
	left: 0px;	
	width:100%;
	border-radius:5px;
	-moz-border-radius:25px;
	}
	#footer
	{
		width: 1020px;
		height: 20px;
		background-repeat: no-repeat;
	}
#footer .strong {font-weight: bold; font-size: 16px;}
#footer p, p:hover, p:visited {color: #2F4F4F;}
#footer .col1 {float: left; padding: 10px 0 10px 10px; width: 30%; }
#footer .col2 {float: left; padding: 10px 0 10px ; width: 34%; }
#footer .col3 {float: left; padding: 10px 0 10px ; width: 34%; }
#footer {position: relative;
	margin-top: 80px;
	height: 80px;
	clear:both;} 
#wrap {min-height: 	10%;}

p{color: white;font-size:0.4px;}
.CSSTableGenerator {width:100%;	box-shadow: 10px 10px 20px #888888;
}
.CSSTableGenerator tr:first-child td{
background-color:#AFDCEC;
font-size:14px;
font-family:Arial;
font-weight:bold;
color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);
	background-color:#005fbf;
}.CSSTableGenerator tr:last-child td:last-child {

	-moz-border-radius-bottomright:0px;

	-webkit-border-bottom-right-radius:0px;

	border-bottom-right-radius:0px;

}

.CSSTableGenerator table tr:first-child td:first-child {

	-moz-border-radius-topleft:0px;

	-webkit-border-top-left-radius:0px;

	border-top-left-radius:0px;

}

.CSSTableGenerator table tr:first-child td:last-child {

	-moz-border-radius-topright:0px;

	-webkit-border-top-right-radius:0px;

	border-top-right-radius:0px;

}.CSSTableGenerator tr:last-child td:first-child{

	-moz-border-radius-bottomleft:0px;

	-webkit-border-bottom-left-radius:0px;

	border-bottom-left-radius:0px;

}





</style>
  <script>
  var new_val = null;
	var ac_config = {
				source: "result.php?radioval=name",
				select: function(event, ui){
						$("#fullname").val(ui.item.fullname);						
				},
				minLength:1
			};		

	$(document).ready(function(){
		
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
<body onload="checkbutton();">
<div id="wrap">
<div id="header">
<img src="images/cls.png" alt="logo" height="40" width="100">
</div>
</div>
<div id="md">
<form id="searchform" name="searchform" method="post" action="search.php">
<br />

<h1 align="center"><font size="7" face="Georgia, Arial" >F</font>aculty <font size="7" face="Georgia, Arial">A</font>vailability <font size="7" face="Georgia, Arial">S</font>earch</h1> 
<div class="demo">   
<input id="fullname" name="fullname" type="text"  style="width: 42em; height:1.68em;" size="15" placeholder="Faculty Search">
<input type = "image" src="images/si1.png" name="fullname" width="100" height="30" > 
<div id="style">
<input type="radio" name="radioval" value="name" checked /> Name
<input type="radio" name="radioval" value="dept" /> Department
</div>

</div>
<div class="CSSTableGenerator">
<table>

	<thead>
	<tr class="odd">
	<th scope="col" abbr="Name" >Name</th>	
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
            echo "<tr >";
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
</div>
</form>	
<div id="footer">
<hr />
	<div class="col1">
	
		<p>
			<span class="strong"><font size="2">Consultation Log System</font></span>
		</p>
	</div><!--col1-->
	
	<div class="col2">
		<p>
		<span class="strong"><font size="2">Contact US:</font></span>		
		</p >
		<p>
		<span><font size="2">0906-139-1950</font></span>
		<span><font size="2">0905-123-4567</font></span>
		</p>
	<p>
		<span><font size="2">0915-322-4421</font></span>
		</p>
		
	</div><!--col2-->
	
	<div class="col3">
		<p>
			<span class="strong"><font size="2">Visit US:</font></span>		
		</p>
		<p><a href="https://www.facebook.com/"><img src="images/fb.png" alt="facebook" height="25" width="25"></a>
		<a href="http://twitter.com/"><img src="images/twit.jpg" alt="twitter" height="25" width="25"></a>
		<a href="https://accounts.google.com/ServiceLogin?service=oz&continue=https://plus.google.com/?gpsrc%3Dgplp0&hl=en"><img src="images/g+.png" alt="google+" height="25" width="25"></a></p>
	</div><!--col3-->
</div><!--footer-->

</div>
</body>
</html>
	