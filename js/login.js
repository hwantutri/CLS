/* 
CSc 188 - Consultation Logs System
Jquery and javascript functions for CLS/index.php
S.Y. 2012-2013, 1st Sem
*/


// check login fields

 function check(){
	if((document.loginform.username.value=="") | (document.loginform.password.value=="")){
		alert("Both fields are required!");
		return false;
		}
	else
		return true;
}
 
 $(window).load(function() {
         $('#featured').orbit({
			animation: 'horizontal-slide',                  // fade, horizontal-slide, vertical-slide, horizontal-push
			animationSpeed: 800,                // how fast animtions are
			timer: true, 			 // true or false to have the timer
			advanceSpeed: 3500, 		 // if timer is enabled, time between transitions 
			pauseOnHover: true, 		 // if you hover pauses the slider
			startClockOnMouseOut: true, 	 // if clock should start on MouseOut
			startClockOnMouseOutAfter: 0, 	 // how long after MouseOut should the timer start again
			directionalNav: true, 		 // manual advancing directional navs
			captions: true, 			 // do you want captions?
			captionAnimation: 'fade', 		 // fade, slideOpen, none
			captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
			bullets: false,			 // true or false to activate the bullet navigation
			bulletThumbs: false,		 // thumbnails for the bullets
			bulletThumbLocation: '',		 // location from this file where thumbs will be
			afterSlideChange: function(){} 	 // empty function 
		});
		
		$('a.login-window').click(function() {
		
                //Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border see css style
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
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
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
		
});
