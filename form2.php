<html>
<head>
	<title>Consultation Logs System</title>
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>    
 	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />
 	

 	<!--<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />-->
 	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	
<style type="text/css">

form legend {
	color: #2F4F4F;
	padding: 0 0 20px 0;
	font-weight: bold;
	font-size: 52;
	position:fixed;
	top:200px;
	left: 350px;
	
}

#style {
	color: #2F4F4F;
	padding: 0 0 20px 0;
	font-weight: bold;
	position:fixed;	
	font-size: 14px;
	left: 580px;
}
#footer-span {
	border-top: 1px solid #202020;
	background:#989898;
	bottom:0;
	position:absolute;
	height: 80px;
	width: 100%;
}
#mid {
	background: url(..images/white.png) 0 center no-repeat;
	text-align: center;
	margin: 0 auto;
	width: 960px;
	padding-top: 46px;
	height: 440px;
	position: relative;

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
<div style="height:120px"></div>
<body background="bg1.jpg">

<div id="header">
</div>
<div id="mid">
	
<form id="searchform" name="searchform" method="post" action="search.php">
<br /><br /><br /> <br /> <br /> <br />

<div class="demo">	
	<legend>Faculty Availability Search</legend>
	
<input id="fullname" name="fullname" type = "text"  style="width: 23em; height:1.87em;" >
 </br></br>
<input type = "submit" value = "Search">
<div id="style"></br></br>
<input type="radio"  name="radioval" value="name" checked style="width:15px; height:15px;"/> Name
&nbsp&nbsp&nbsp&nbsp;
<input type="radio" name="radioval" value="dept" style="width:15px; height:15px;" /> Department
<!--<input type="hidden" name="hiddenfield" value="" id="hiddenfield" />-->
</div>
</div>

</form>	
</div>
<div id = "footer-span">
</div>

</body>
</html>
	