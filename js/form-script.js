/* 
CSc 188 - Consultation Logs System
Jquery and javascript functions for CLS/form.php
S.Y. 2012-2013, 1st Sem
*/


//highcharts variable

var chart,chart2;


function int_to_month(number){
		if(number == 1){
		return "January";}
		else if(number == 2){
		return "February";}
		else if(number == 3){
		return "March";}
		else if(number == 4){
		return "April";}
		else if(number == 5){
		return "May";}
		else if(number == 6){
		return "June";}
		else if(number == 7){
		return "July";}
		else if(number == 8){
		return "August";}
		else if(number == 9){
		return "September";}
		else if(number == 10){
		return "October";}
		else if(number == 11){
		return "November";}
		else if(number == 12){
		return "December";}
}


//Reset Form
function resetForm(id) {
	$('#'+id).each(function(){
	        this.reset();
	});
	$("#optionHolder").hide();
	$("#subsec").hide();
	$("#subsec").html('').show();
	$("#optionHolder").html('');
	idno.focus();
	}

$(function() {

$("#optionHolder").hide();
$("label").inFieldLabels(); //infield labels for consultation form
$( "#datepicker" ).datepicker(); //date picker

/* get values to be inserted in the dropdown */

function getDD(name){
			var string="dropdown";
			$("#subsec").hide();
            $("#optionHolder").html('Retrieving...');
			$.post("query_cls.php", {name: name, string: string }, function(data){
							$("#subsec").html(data).show();
							$("#optionHolder").html('');
			});
		}


/* Autocomplete and auto-fill form*/


			var ac_config = {
				source: "query.php?phrase=phrase",
				select: function(event, ui){
						$("#idno").val(ui.item.idno);
						$("#name").val(ui.item.fullname);
						$("#courseyrlvl").val(ui.item.courseyrlvl);
						
						//ajax function to populate the dropdown
						var name = ui.item.fullname;
						getDD(name);
				},
				minLength:1
			};		
		
		$( "#idno" ).autocomplete(ac_config);
		
		
/*	Add students button */

$("#addbtn").click(function(e){ 
        	e.preventDefault();
		var sval = $("#subsec").val();
		var com = $("#comment").val();
		if (sval.length > 0){
			if(com.length > 0){
				add_key(sval);
			}
		}
		else {
			alert('Both fields are required!');
		}
			subsec.focus();
    });
		
		
/* Submit and update function */

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
	
/* Set My Location submit */
	
	$("#location_btn").click(function(e){ 
        e.preventDefault();
		//alert("Bitch please!");
		
		var location = $("#location").val();
		
		if(location.length == 0){
			alert("You cannot set your location to blank!");
		}else{
		
		var string = "location";
		$.post("query_cls.php", {location: location, string: string }, function(data){
		     data = $.trim(data);
				if (data.length > 0){ 
					alert('Your location has been successfully set!');
						$('#mask , .location-popup').fadeOut(300 , function() {
							$('#mask').remove();  
						});
					$("#location").val("");
          		}
		});
		}
    });
	 
	 
	 // Function to submit clsform data to database using jquery post
	 
    function search_key(sk){
       	 var datepicker = $("#datepicker").val();
		 var subsec = $("#subsec").val();
			 var comment = $("#comment").val();
			 var string = "update";
        	 $.post("query_cls.php", {datepicker : datepicker, comment : comment, idno: sk, string: string,subsec:subsec }, function(data){
		     data = $.trim(data);
				if (data.length > 0){ 
					alert('Consultation successfully logged!');
					$("#comment").val("");
					$("#courseyrlvl").val("Course & Year Level");
					$("#name").val("Name");
					$("#optionHolder").hide();
					$("#subsec").hide();
					$("#subsec").html('').show();
					$("#optionHolder").html('');
					idno.focus();
          		}
			});
	}
	
	// Function to submit addform data to database using jquery post
	 
    function add_key(sk){
			 var comment = $("#comment").val();
			 var string = "add";
        	 $.post("query_cls.php", {comment : comment, subsec: sk, string: string }, function(data){
		     data = $.trim(data);
				if (data.length > 0){ 
					alert('Students successfully added!');
					$("#comment").val("");
					$("#subsec").val("");
					subsec.focus();
          		}
			});
	}



/* Function for "Set My Location" pop-up */

$('a.location-window').click(function() {
		
        //Getting the variable's value from a link 
				
		var locationBox = $(this).attr('href');

		//Fade in the Popup
		$(locationBox).fadeIn(300);
		
		//Set the center alignment padding + border see css style
		var popMargTop = ($(locationBox).height() + 24) / 2; 
		var popMargLeft = ($(locationBox).width() + 24) / 2; 
		
		$(locationBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .location-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
	
	//TABS!!!
	$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
		
		
		
		
	//highcharts function

function display(extra,month,year){
		if (extra=="daily"){
			return int_to_month(month) + ' ' +year;
		}
		else if(extra=="monthly"){
			return year;
		}
}
	
	
function makedailychart(data,month,year,extra){
	chart = new Highcharts.Chart({
            chart: {
                renderTo: 'myChart',
                type: 'column'
            },
            title: {
                text: 'Daily Consultation Logs'
            },
            subtitle: {
                text: 'Month of ' +display(extra,month,year)
            },
            xAxis: {
                categories:  <?php $lastday = date("d",mktime(0,0,0,$month+1,0,date("Y")));  echo "["; for ($d = 1; $d <= $lastday-1; $d++){echo "'".$d."',";} echo "'".$lastday."'"."]";?>
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No. of Consultations'
                },
				allowDecimals: false
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y;
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'Consultations',
                data: data
            }]
        });
}
		
		//charts
function makemonthlychart(data,month,year,extra){
		chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'myChart2',
                type: 'column'
            },
            title: {
                text: 'Monthly Consultation Logs'
            },
            subtitle: {
                text: 'For the Year ' +display(extra,month,year)
            },
            xAxis: {
                categories:  ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No. of Consultations'
                },
				allowDecimals: false
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y;
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'Consultations',
                data: data
            }]
        });
}
		var year = $("#year").val();
		// jquery functions for generating new charts
		$("#genbtn0").click(function(e){					/* BUTTON 0 */
			e.preventDefault();
			//var month = parseInt($("#month").val());
			var extra = "daily";
			get_data(extra,year);
		});
		
		$("#genbtn1").click(function(e){					/* BUTTON 1 */
			e.preventDefault()
			var year = parseInt($("#year").val());
			//var month = parseInt($("#month").val());
			var extra = "monthly";
			get_data(extra,year);
		});
		
	function get_data(extra,year){
		var month = parseInt($("#month").val());
		if(extra=="daily"){
		$.post("chartQRY.php", {month:month,year:year,extra:extra}, function(data){ var temp = new Array();temp = data.split(",");for (a in temp ){temp[a] = parseInt(temp[a]);}makedailychart(temp,month,year,extra);});
		}
		else if(extra=="monthly"){
		$.post("chartQRY.php", {month:month,year:year,extra:extra}, function(data){ var temp = new Array();temp = data.split(",");for (a in temp ){temp[a] = parseInt(temp[a]);}makemonthlychart(temp,month,year,extra);});
		}
	}

});