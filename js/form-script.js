/* 
CSc 188 - Consultation Logs System
Jquery and javascript functions for CLS/form.php
S.Y. 2012-2013, 1st Sem
*/

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
	idno.focus();
	}

$(function() {

$("label").inFieldLabels(); //infield labels for consultation form
$( "#datepicker" ).datepicker(); //date picker

/* Autocomplete and auto-fill form*/

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
					$("#subsec").val("");
					idno.focus();
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
			//notify(extra,month+' '+year);
		}
		else if(extra=="lol1"){
			return 'Monthly Visualization for ' + year;
			//notify(extra,month+' '+year);
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
                }
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
                        this.x +': '+ this.y +' mm';
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
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Consultation Logs',
                x: -20 //center
            },
            subtitle: {
                text: 'Year XXXX',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
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
		$.post("chartQRY.php", {month:month,year:year,extra:extra}, function(data){alert(data); var temp = new Array();temp = data.split(",");for (a in temp ){temp[a] = parseInt(temp[a]);}makemonthlychart(temp,month,year,extra);});
		}
	}

});