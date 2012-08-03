<?php
session_start();
include_once 'class_login.php';
$login = new Login();
	//if($login->get_session()){
//}

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$user = $login->validate($_POST['username'],$_POST['password']);
	if($user){header("location:form.php");}
	else{$msg = 'Incorrect username and password';}
}
?>
<html>
<head>
<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/orbit-1.2.3.css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script>
	
    <style type="text/css">
	body{
	 //background:#202020;
	 font:bold 12px Arial, Helvetica, sans-serif;
	 margin:0;
	 padding:0;
	 min-width:960px;
	 color:#736F6E; 
	 font-size:20px;
	 font-style:italic;
background-color:#ddd;
}
input.gray{background-color:#6698FF;
color:white;
font-family:"Times New Roman",Georgia,Serif;	




		}
}
.container {width: 960px; margin: 0 auto; overflow: hidden;}



#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }


</style>
</script>

<script type="text/javascript">

</script>
</head>
<body background = "bg1.jpg">

<div class="container">
	<div id="content">
    
		<div class="post">
			<div id="header">
			<a href="logout.php" class="login-window"><img STYLE="position:absolute; TOP:7px; Right:212px;" src="images/close_pop.png"></a>
			</div>
			
			</div>
				
				
				<form name="input" action="" style="text-shadow:4px 4px 8px blue;"align ="left" method="get">
				<center>
					<br><br><br><br><br><br>
					<table border="0">
					<tr>
					<td>Faculty ID:</td><td><input type="text" name="Fac_id" /></td>
					</tr>
					<tr>
					<td>Student ID:</td><td><input type="text" name="Student_id" /></td>
					</tr>
					<tr>
					<td>Date and Time:</td><td><input type="date" name="Date_and_Time" /></td>
					</tr>
					<tr>
					<td>Duration:</td><td><input type="text" name="Duration" /></td>
					</tr>
					<tr>
					<td>Description:</td><td><input type="text" name="Description" /></td>
					</tr>
					<tr>
					<td><input class="gray"type="submit" value = "Submit" style="width:150px; height:30px;"/></td>
					</tr>
					</table>
				</center>
				</form>
			
		</div>
	</div>
</div>


</body>
</html>