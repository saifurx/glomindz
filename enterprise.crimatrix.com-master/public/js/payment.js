$(function(){
    $('#payment_li').addClass('active');
  // getSuccessfullPaymentDetails();
   $('#subcription_cart').show();
  // $('#cashRequest').hide();
   checkIfAlreadyRequest();

});

function checkIfAlreadyRequest(){
  $.ajax({
      type: 'GET',
      url: 'payments/ifalreadyrequest',
      dataType: 'JSON',

      success: function(data){
          if(data==0){
            //document.getElementById("collectBtn").disabled = true;
            $("#collectBtn").attr('disabled',true);
          }
      }
  });
}

var cfr_token = $('#cfr_token').val();
function getSuccessfullPaymentDetails(){
  $.ajax({
      type: 'GET',
      url: 'payments/paymentdetails',
      dataType: 'JSON',

      success: function(data){
          if(data.length==0){
            $('#subcription_cart').show();

          }else{
            $('#payment_details_table tbody').empty();
            for(var i in data){
              var url ="/hotel/payments/printinvoice/"+data[i].order_id;
                var row = '<tr>'
                    +'<td>'+data[i].order_id+'</td>'
                    +'<td>'+data[i].id+'</td>'
                    +'<td>'+data[i].name+'</td>'
                    +'<td>'+data[i].owner_name+'/'+data[i].owner_mobile+'</td>'
                    +'<td><strong>'+data[i].product_details+'</strong>('+data[i].subcription_start_date+'-'+data[i].subcription_end_date+')</td>'
                    +'<td>'+data[i].transaction_id+'</td>'
                    +'<td>'+data[i].payment_date+'</td>'
                    +'<td>'+data[i].transaction_amount+'</td>'
                    +'<td style="width:8%;"><a href="'+url+'"+ target="_blank"><i class="btn btn-sm btn-icon fa fa-print"></i></a></td>'
                    +'</tr>';

                  $('#payment_details_table').append(row);
            }
            $('#payment_details').show();

          }
      }
  });
}

$("#collectBtn").on('click',function(){
    $('#collectBtn').attr('disabled',true);
    $.ajax({
        type: 'GET',
        url: 'payments/requestcollection',
        dataType: 'JSON',
        success: function(data){
          if(data>0){
              alertify.success("Request Successfully");
              
          }else{
              alertify.error("Something went to wrong.Please Try again later...");
          }
          console.log(data)
        }
  });
});
