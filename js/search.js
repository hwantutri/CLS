/* 
CSc 188 - Consultation Logs System
Jquery and javascript functions for CLS/search.php
S.Y. 2012-2013, 1st Sem

This includes the autocomplete and refresh table scripts
*/


var new_val = null;
	var ac_config = {
				source: "result.php?radioval=name",
				select: function(event, ui){
						$("#fullname").val(ui.item.fullname);						
				},
				minLength:1
			};	
			
$(document).ready(function(){
		//refreshTable();
		poll();
		var radio1 = document.searchform.radioval[0];
		var radio2 = document.searchform.radioval[1];
		
		$("input[name='radioval']").change(function(){
			if ($("input[name='radioval']:checked").val() == "name"){
				new_val = radio1.value;
			}else{
				new_val = radio2.value;
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
	
	/*
	// function to refresh the data in the table every 5 seconds (5000 ms)
	function refreshTable(){
			setInterval(function() {
				$.ajax({
					type: "GET",
					data: 'searchVal='+searchVal+'&button='+button,
					url: "searchTable.php",
					success: function(data) {
						// data is a table in a form string of all output of the server script.
						$("#tableHolder").html(data);
					}
				});
			}, 5000);
	}
	*/
	
	// Long polling technique (alternative for refreshTable)
	function poll(){
			$.ajax({
				type: "GET",
				data: 'searchVal='+searchVal+'&button='+button,
				url: "searchTable.php",
				success: function(data) {
					// data is a table in a form string of all output of the server script.
					$("#tableHolder").html(data);
				}, complete: poll, timeout: 5000 });
	}