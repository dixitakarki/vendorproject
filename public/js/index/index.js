$(document).ready(function(){	
	
	$("#pendingHeader").click(function(){
         $("#pendingBody").toggle();
    });
	
	$("#completed").hide();
	$("#completedHeader").click(function(){
         $("#completed").toggle();
    });	


	$("#rejected").hide();
	$("#rejectedHeader").click(function(){
         $("#rejected").toggle();
    });	
	
});