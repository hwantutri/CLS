<?php
session_start();
include_once 'class_login.php';

$login = new Login();
$uid = $_SESSION['uid_new'];

if(!$login->get_session()){
	header("location:index.php");
}
?>

<html>
    <head>
        <title>CLS-Monitoring Students</title>
        <style>
    html{
      background: #333;
    }
    
    body{
      font: normal 14px Arial, Helvetica;
      width: 920px;
      margin: 100px auto;
      color: #444;
      background: #fff;
      padding: 0px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      border-radius: 15px;  
    }
    
    a{
        color: #777;
    }
    
    /* ------------------------------------------- */   
    
    ul{
      margin: 0;
      padding: 0;
      list-style: none;
    }
    
    /* ------------------------------------------- */
    
    #breadcrumbs-one{
      background: #eee;
      border-width: 1px;
      border-style: solid;
      border-color: #f5f5f5 #e5e5e5 #ccc;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
      -moz-box-shadow: 0 0 2px rgba(0,0,0,.2);
      -webkit-box-shadow: 0 0 2px rgba(0,0,0,.2);
      box-shadow: 0 0 2px rgba(0,0,0,.2);
      /* Clear floats */
      overflow: hidden;
      width: 100%;
    }
    
    #breadcrumbs-one li{
      float: left;
    }
    
    #breadcrumbs-one a{
      padding: .7em 1em .7em 2em;
      float: left;
      text-decoration: none;
      color: #444;
      position: relative;
      text-shadow: 0 1px 0 rgba(255,255,255,.5);
      background-color: #ddd;
      background-image: -webkit-gradient(linear, left top, right bottom, from(#f5f5f5), to(#ddd));
      background-image: -webkit-linear-gradient(left, #f5f5f5, #ddd);
      background-image: -moz-linear-gradient(left, #f5f5f5, #ddd);
      background-image: -ms-linear-gradient(left, #f5f5f5, #ddd);
      background-image: -o-linear-gradient(left, #f5f5f5, #ddd);
      background-image: linear-gradient(to right, #f5f5f5, #ddd);  
    }
    
    #breadcrumbs-one li:first-child a{
      padding-left: 1em;
      -moz-border-radius: 5px 0 0 5px;
      -webkit-border-radius: 5px 0 0 5px;
      border-radius: 5px 0 0 5px;
    }
    
    #breadcrumbs-one a:hover{
      background: #fff;
    }
    
    #breadcrumbs-one a::after,
    #breadcrumbs-one a::before{
      content: "";
      position: absolute;
      top: 50%;
      margin-top: -1.5em;   
      border-top: 1.5em solid transparent;
      border-bottom: 1.5em solid transparent;
      border-left: 1em solid;
      right: -1em;
    }
    
    #breadcrumbs-one a::after{ 
      z-index: 2;
      border-left-color: #ddd;  
    }
    
    #breadcrumbs-one a::before{
      border-left-color: #ccc;  
      right: -1.1em;
      z-index: 1; 
    }
    
    #breadcrumbs-one a:hover::after{
      border-left-color: #fff;
    }
    
    #breadcrumbs-one .current,
    #breadcrumbs-one .current:hover{
      font-weight: bold;
      background: none;
    }
    
    #breadcrumbs-one .current::after,
    #breadcrumbs-one .current::before{
      content: normal;  
    }
    
    /*-----------------------------------*/
    
    #breadcrumbs-two{
      /* Clear floats */
      overflow: hidden;
      width: 100%;
    }
    
    #breadcrumbs-two li{
      float: left;
      margin: 0 .5em 0 1em;
    }
    
    #breadcrumbs-two a{
      background: #ddd;
      padding: .7em 1em;
      float: left;
      text-decoration: none;
      color: #444;
      text-shadow: 0 1px 0 rgba(255,255,255,.5); 
      position: relative;
    }
    
    #breadcrumbs-two a:hover{
      background: #99db76;
    }
    
    #breadcrumbs-two a::before{
      content: "";
      position: absolute;
      top: 50%; 
      margin-top: -1.5em;   
      border-width: 1.5em 0 1.5em 1em;
      border-style: solid;
      border-color: #ddd #ddd #ddd transparent;
      left: -1em;
    }
    
    #breadcrumbs-two a:hover::before{
      border-color: #99db76 #99db76 #99db76 transparent;
    }
    
    #breadcrumbs-two a::after{
      content: "";
      position: absolute;
      top: 50%; 
      margin-top: -1.5em;   
      border-top: 1.5em solid transparent;
      border-bottom: 1.5em solid transparent;
      border-left: 1em solid #ddd;
      right: -1em;
    }
    
    #breadcrumbs-two a:hover::after{
      border-left-color: #99db76;
    }
    
    #breadcrumbs-two .current,
    #breadcrumbs-two .current:hover{
      font-weight: bold;
      background: none;
    }
    
    #breadcrumbs-two .current::after,
    #breadcrumbs-two .current::before{
      content: normal;
    }
    
    /* ------------------------------------------- */
    
    #breadcrumbs-three{
      /* Clear floats */
      overflow: hidden;
      width: 100%;
      position: relative;
      top: -250px;
    }
    
    #breadcrumbs-three li{
      float: left;
      margin: 0 2em 0 0;

    }
    
    #breadcrumbs-three a{
      padding: .7em 1em .7em 2em;
      float: left;
      text-decoration: none;
      color: #444;
      background: #ddd;  
      position: relative;     
      z-index: 1;
      text-shadow: 0 1px 0 rgba(255,255,255,.5);  
      -moz-border-radius: .4em 0 0 .4em;
      -webkit-border-radius: .4em 0 0 .4em;
      border-radius: .4em 0 0 .4em;  
    }
    
    #breadcrumbs-three a:hover{
      background: #678197;
    }
    
    #breadcrumbs-three a::after{
      background: #ddd;
      content: "";
      height: 2.5em;
      margin-top: -1.25em;
      position: absolute;
      right: -1em;
      top: 50%;
      width: 2.5em;
      z-index: -1;  
      -webkit-transform: rotate(45deg); 
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg); 
      transform: rotate(45deg);
      -moz-border-radius: .4em;
      -webkit-border-radius: .4em;
      border-radius: .4em;
    }
    
    #breadcrumbs-three a:hover::after{
      background: #678197;
    }
    
    #breadcrumbs-three .current,
    #breadcrumbs-three .current:hover{
      font-weight: bold;
      background: #61B4EB;
    }
    
    #breadcrumbs-three .current::after{
      content: normal;
      background: #61B4EB;
    }
    
    /* ------------------------------------------- */
    
    #breadcrumbs-four{
      /* Clear floats */
      overflow: hidden;
      width: 100%;
    }
    
    #breadcrumbs-four li{
      float: left;
      margin: 0 .5em 0 1em;
    }
    
    #breadcrumbs-four a{
      background: #ddd;
      padding: .7em 1em;
      float: left;
      text-decoration: none;
      color: #444;
      text-shadow: 0 1px 0 rgba(255,255,255,.5); 
      position: relative;
    }
    
    #breadcrumbs-four a:hover{
      background: #efc9ab;
    }
    
    #breadcrumbs-four a::before,
    #breadcrumbs-four a::after{
      content:'';
      position:absolute;
      top: 0;
      bottom: 0;
      width: 1em;
      background: #ddd;
      -webkit-transform: skew(-10deg);
      -moz-transform: skew(-10deg);
      -ms-transform: skew(-10deg);
      -o-transform: skew(-10deg);
      transform: skew(-10deg);  
    }
    
    #breadcrumbs-four a::before{
    
      left: -.5em;
      -webkit-border-radius: 5px 0 0 5px;
      -moz-border-radius: 5px 0 0 5px;
      border-radius: 5px 0 0 5px;
    }
    
    #breadcrumbs-four a:hover::before{
      background: #efc9ab;
    }
    
    #breadcrumbs-four a::after{
      right: -.5em;   
      -webkit-border-radius: 0 5px 5px 0;
      -moz-border-radius: 0 5px 5px 0;
      border-radius: 0 5px 5px 0;
    }
    
    #breadcrumbs-four a:hover::after{
      background: #efc9ab;
    }
    
    #breadcrumbs-four .current,
    #breadcrumbs-four .current:hover{
      font-weight: bold;
      background: none;
    }
    
    #breadcrumbs-four .current::after,
    #breadcrumbs-four .current::before{
      content: normal;
    }
    </style>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/styles2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/styles4.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/noreset.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" media="screen" />    
	<link rel="stylesheet" type="text/css" href="css/form-css.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/CSSTableGenerator.css" media="screen" />
	<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/sliding_effect.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
	<script type="text/javascript" src="js/form-script.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.2-jquery.min"></script>

        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "media/css/demo_table_jui.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables1').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
        
    </head>
    <body background = "bg1.jpg">
<div id="header">
	<div class="wrapper">
  		<ul id="main" class="loggedout-right">
  			<li><a href="logout.php" id="sign_up_header_link" class="login-window" data-event="homepage.login" rel="header">Log Out</a></li>
  			<li><a href="#" id="login_header_link" class="login-window" data-event="homepage.login" rel="header"><?php $login->get_name($uid);?></a></li>
			<input type="image" src="images/cls_logo.png" name="name" width="300" height="45" style="margin-left:-70px;">
		</ul>
  </div>
</div>

<?php $login->get_name($uid);?>
	<div id="navigation-block5">
			<img src="images/background.jpg" id="hide" />
            <ul id="sliding-navigation">
                <li class="sliding-element"><h3>CLS NAVIGATION</h3></li>
                <li class="sliding-element"><a href="form.php">Consult</a></li>
                <li class="sliding-element"><a href="review.php">Review</a></li>
                <li class="sliding-element"><a href="chart.php">Chart</a></li>
				<li class="sliding-element"><a href="addstudents.php">Add Students</a></li>
                <li class="sliding-element"><a href="#location-box" class="location-window">Set My Location</a></li>
				<?php
				$chair = mysql_query("select chairman from faculty where faculty_uid='".$uid."'");
				$chairrow = mysql_fetch_array($chair);
				if ($chairrow['chairman'] == 1) echo "<li class='sliding-element'><a href='monitor.php'>Monitor</a></li>"; 
				?>
            </ul>
        </div>
        
        	<div id="location-box" class="location-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form name="loginform" class="signin">
                <fieldset class="textbox">
                <label>
				<font size="5" color="white">Set Location</font>
				</br></br>
					</label>
            	<label class="location">
                <input id="location" name="location" value="" type="text" autocomplete="on" placeholder="My Location" autofocus="autofocus">
                </label>
                <label>
                <button name="location_btn" id="location_btn" class="submit button" type="button">Set  &rarr;</button>
                </label>
                </fieldset>
          </form>
		</div>
        <div> 


<ul id="breadcrumbs-three">
        
        <li><a href="Monitor.php">Monitor</a></li>        
        <li><a href="#" class="current"><?php echo $_GET['p']; ?></a></li>
        
    </ul>   
            <table id="datatables1" class="display">

   <thead>
    <tr class="odd">
    <th scope="col" abbr="College">Student Name</th>
    <th scope="col" abbr="College">Date</th>
    <th scope="col" abbr="Name" >Description</th>
    </tr>
    </thead>
                <tbody>  
<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("cls") or die ("cannot select db");

$query1 = mysql_query("select * from consultation where faculty_uid='".$_GET['u']."' order by date desc");
            
           while ($row = mysql_fetch_array($query1)) {
           $query2 = mysql_query("select stud_name from student where stud_id='".$row['stud_id']."'");
           $row2 = mysql_fetch_array($query2);
            echo "<tr>";            
            echo "<td><a href='displayInfo.php?p=" . $row['cid'] . "' target='view_data'>" .$row2['stud_name'] . "</a></td>";
            echo "<td><a href='displayInfo.php?p=" . $row['cid'] . "' target='view_data'>" .$row['date'] . "</a></td>";
            $string = $row['description'];
			if(strlen($string)>40){
				$string = substr($string,0,40);
				$string = $string.' ...';
			}
			echo "<td><a href='displayInfo.php?p=" . $row['cid'] . "' target='view_data'>" . $string . "</a></td>";
			echo "</tr>";
            
            }         
?>
                </tbody>
            </table>
        </div>
    </body>
</html>