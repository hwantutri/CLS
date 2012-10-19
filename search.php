<?php

$search_value = $_POST['fullname'];
$selected_radio = $_POST['radioval']; 

?>
<html>
<head>
<title>CLS-Search Result</title>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>    
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles4.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	
 	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	
	<script>
		var searchVal = "<?php echo $search_value; ?>";
		var button = "<?php echo $selected_radio; ?>";
	</script>

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
  
</head>
<body background="bg1.jpg">

<div id="header">
<input type="image" src="images/cls_logo.png" name="name" width="300" height="45" style="margin-left:100px;">
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
	<div id="tableHolder"></div>
</table>
</form>	
</div>
</body>
</html>
	