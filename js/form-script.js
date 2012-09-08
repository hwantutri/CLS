/* 
CSc 188 - Consultation Logs System
Jquery and javascript functions for CLS/form.php
S.Y. 2012-2013, 1st Sem
*/


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
    });
	 
     function search_key(sk){
       	 var datepicker = $("#datepicker").val();
			 var comment = $("#comment").val();
			 var string = "update";
        	 $.post("query_cls.php", {datepicker : datepicker, comment : comment, idno: sk, string: string }, function(data){
		     data = $.trim(data);
				if (data.length > 0){ 
					alert('Consultation successfully logged!');
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
		
});