$(function(){
    $('#payment_details_li').addClass('active');

});

var $permission = 0;
$("table#payment-hotels-tb tbody").on("click", ".paidOffline", function(){//'1-to-0';
	$permission = $(this);
	var hotel_id = $permission.closest('tr').find('.hotel_id').text();
  var transaction_id = $permission.closest('tr').find('.transaction_id').text();
	paymentApproved(hotel_id,transaction_id);

});

function paymentApproved(hotel_id,transaction_id){
	var cfr_token = $('#cfr_token').val();
	$permission.attr('disabled',true);
	$.ajax({
		type: 'POST',
		url: 'paidoffline',
		dataType: 'JSON',
		data: {'hotel_id':hotel_id,'transaction_id':transaction_id,'_token':cfr_token},
		success: function(data){
			$permission.attr('disabled',false);
			if(data != 0){

				alertify.success("Transaction successful");
			}
			else{

				alertify.success("Transaction failed");
			}
			$permission = 0;
		}
	});
}
