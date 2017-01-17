$(document).ready(function(){	

	$("#completed").hide();
	$("#completedHeader").click(function(){
         $("#completed").toggle();
    });	


	$("#rejected").hide();
	$("#rejectedHeader").click(function(){
         $("#rejected").toggle();
    });	
	
});