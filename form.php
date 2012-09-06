<?php
session_start();
include_once 'class_login.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

if(!$login->get_session()){
	header("location:index.php");
}
//if($_GET['q'] == 'logout'){
	//$login->logout();
	//header("location:index.php");
//}

//if($_SERVER["REQUEST_METHOD"]=="POST"){
	//$user = $login->validate($_POST['username'],$_POST['password']);
	//if($user){header("location:form.php");}
	//else{$msg = 'Incorrect username and password';}
//}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Consultation Logs System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	
	<script type="text/javascript" charset="utf-8">
		$(function(){ $("label").inFieldLabels(); });
	</script>

	<script>
	$(function() {
			var ac_config = {
				source: "query.php?phrase=phrase",
				select: function(event, ui){
						$("#idno").val(ui.item.idno);
						$("#name").val(ui.item.fullname);
						$("#courseyrlvl").val(ui.item.courseyrlvl);
				},
				minLength:1
			};		
		
		$( "#idno" ).autocomplete(ac_config);
		
		
		//update script
	$("#submitbtn").click(function(e){ 
        	e.preventDefault();
		var sval = $("#idno").val();
		if (sval.length > 0){
	        search_key(sval);
		}
		else {
			alert('No Input : Please enter ID number');
		}
             $("#idno").val("");
     });
     
     function search_key(sk){
     		 //var fid = <?php echo $uid;?>;
       	 var datepicker = $("#datepicker").val();
			 var comment = $("#comment").val();
			 var string = "phrase2";
	         //var time = $("#visittime").val();
        	 $.post("query_cls.php", {datepicker : datepicker, comment : comment, idno: sk }, function(data){
		     data = $.trim(data);
				if (data.length > 0){ 
             			//$("#search_results").html(data)
					alert('Consultation successfully logged!');
          		}
			});
		}
		//{
			//source: "query.php",
			//minLength: 1
		//});
	});
	</script>
	<script type="text/javascript" charset="utf-8">
	function resetForm(id) {
	$('#'+id).each(function(){
	        this.reset();
	});
	idno.focus();
	}
	</script>	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
	

</head>
<body background = "bg1.jpg">

<div id="header">
  <div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="logout.php" id="sign_up_header_link" class="login-window" data-event="homepage.login" rel="header">Log Out</a></li>
  			<li><a href="#" id="login_header_link" class="login-window" data-event="homepage.login" rel="header"><?php $login->get_name($uid);?></a></li>
  		</ul>
  </div>
</div>

	<form id="clsform" name="clsform" action="" accept-charset="utf-8">
		<fieldset> <br /><br /><br /> <br /> <br /> <br />
			<p><legend>Consultation Form</legend></p>
			<p>
				<label for="idno" style="display: block; opacity: 1;">ID No.</label><br />
				<input type="text" name="idno" value="" id="idno" autocomplete="off" autofocus="autofocus">
			</p>
			<p>
				<label for="name" style="display: block; opacity: 1;">Name</label><br />
				<input type="text" name="name" value="Name" id="name" disabled="disabled">
			</p>
			<p>
				<label for="courseyrlvl" style="display: block; opacity: 1;">Course and Year Level</label><br />
				<input type="text" name="courseyrlvl" value="Course & Year Level" id="courseyrlvl" disabled="disabled">
			</p>
			<p>
				<label for="subsec" style="display: block; opacity: 1;">Subject and Section</label><br />
				<input type="text" name="subsec" value="" id="subsec" >
			</p>
			<p>
				<label for="datepicker" style="display: block; opacity: 1;">Date</label><br />
				<input type="text" name="datepicker" value="<?php echo date("d/m/Y"); ?>" id="datepicker" >
			</p>
			<p>
				<label for="comment" style="display: block; opacity: 1;">Description</label><br />
				<textarea cols="30" rows="10" name="comment" id="comment"></textarea>
			</p>
		</fieldset>
		<p><input type="button" name="submitbtn" id="submitbtn" value="Submit &rarr;">&nbsp&nbsp;<input name="reset_btn" type="button" value="Reset" onclick="resetForm('clsform');" ></p>
	</form>	
		<div id="navigation-block">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="form.php">Consult</a></li>
                <li class="sliding-element"><a href="review.php">Review</a></li>
                <li class="sliding-element"><a href="#">Chart</a></li>
                <li class="sliding-element"><a href="#">Search</a></li>
                <li class="sliding-element"><a href="#">Help</a></li>
            </ul>
        </div>
</body>
</html>