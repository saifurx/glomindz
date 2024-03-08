/*** App Js ***/

function emailValidate(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA 	-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function mobileValidate(mobile){
	if(mobile.length ==10){
		var filter = /^[0-9-+]+$/;
		if (filter.test(mobile)){
		      return true;
		}
		else{
			return false;
		}
	}
	else{
	    return false;
	} 
}

function alphanumericValidate(inputtxt){ 
  var letters = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
  if (letters.test(inputtxt)) {
    return true;
  } else {
    return false;
  }
}


/*
function get_policeStations(){
	$.ajax({
		url: url+'user_service/get_policeStations/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			//console.log(data);
		}		
	});
}

function get_cities(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_cities/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			//console.log(data);
		}		
	});
}
*/