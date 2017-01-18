$(document).ready(function(){	

$("#directDebit").change(function () {
   if(this.checked) {
   $( "#bankDetails" ).hide( "slow" );}
   else{
	   $( "#bankDetails" ).show( "slow" );
   }
});


document.getElementById('sameAsAddress').onchange = function() {
	if(this.checked){
		currentFormCopy();
		document.getElementById('remitAddress').disabled = true;
		document.getElementById('remitAddress2').disabled = true;
		document.getElementById('remitCity').disabled = true;
		document.getElementById('remitCounty').disabled = true;
		document.getElementById('remitPostcode').disabled = true;
		document.getElementById('remitCountry').disabled = true;
		document.getElementById('remitTelephone').disabled = true;
		document.getElementById('remitFax').disabled = true;
		document.getElementById('remitEmail').disabled = true;
	}else{
		currentFormClear();
		document.getElementById('remitAddress').disabled = false;
		document.getElementById('remitAddress2').disabled = false;
		document.getElementById('remitCity').disabled = false;
		document.getElementById('remitCounty').disabled = false;
		document.getElementById('remitPostcode').disabled = false;
		document.getElementById('remitCountry').disabled = false;
		document.getElementById('remitTelephone').disabled = false;
		document.getElementById('remitFax').disabled = false;
		document.getElementById('remitEmail').disabled = false;

	}
}
function currentFormCopy(){
	 document.getElementById('remitAddress').value= document.getElementById('contactAddress').value;
 	 document.getElementById('remitAddress2').value= document.getElementById('contactAddress2').value;
 	 document.getElementById('remitCity').value= document.getElementById('contactCity').value;
 	 document.getElementById('remitCounty').value= document.getElementById('contactCounty').value;
 	 document.getElementById('remitPostcode').value= document.getElementById('contactPostcode').value;
 	 document.getElementById('remitCountry').value= document.getElementById('contactCountry').value;
 	 document.getElementById('remitTelephone').value= document.getElementById('contactTelephone').value;
 	 document.getElementById('remitFax').value= document.getElementById('contactFax').value;
 	 document.getElementById('remitEmail').value= document.getElementById('contactEmail').value;

}

function currentFormClear(){
	document.getElementById('remitAddress').value ='';
	document.getElementById('remitAddress2').value ='';
	document.getElementById('remitCity').value ='';
	document.getElementById('remitCounty').value ='';
	document.getElementById('remitPostcode').value ='';
	document.getElementById('remitCountry').value ='';
	document.getElementById('remitTelephone').value ='';
	document.getElementById('remitFax').value ='';
	document.getElementById('remitEmail').value ='';
}

$('#back').click(function(){
		history.go(-1);
});

$('#clear').click(function(){
		history.go(0);
});

});