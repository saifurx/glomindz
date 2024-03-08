<?php include "../header.php" ?>
<?php

echo"Hello";
?>
<script>
window.onload = function() {
 sendGCPTip();   
};

function sendGCPTip(){
	alert(1);
        var mobile='9854087006';
        var tip='Test tip';
        var tipperInfo='tipper';
	$.ajax({
		type: 'POST',
		url: 'http://localhost:8888/glomindz/crimatrix/external_service/sendGCPTip/',
                data: {tip:tip,tipperInfo:tipperInfo,sendto:mobile},
		dataType: 'JSON',
		success: function(resp){
			console.log(resp);
			
		}
	});
	
}


</script>