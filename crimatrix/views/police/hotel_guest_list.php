<style>
.navbar{
	display: none;
}
body{
	background: #fff;
}
.table-bordered {
	background: #fff !important;
}
</style>
<div class="container">
	<div class="row-fluid">
	    <div><?php echo $this->hotel_name;?>  <b>Guest List:</b><?php echo $this->guest_listdate;?> </div>
	    <table class="table table-bordered">
	        <thead id="guest_list_head"></thead>
	        <tbody id="guest_list_body" class="table table-bordered">
	        </tbody>
	    </table>
	</div>
</div>
<script>
    window.onload = function() {
        get_hotel_guestlists();
    };
    function get_hotel_guestlists() {

        var guest_listdate = '<?php echo $this->guest_listdate; ?>';
        var hotel_id =<?php echo $this->hotel_id; ?>;

        $('#guest_list_head').html('<p class="loading_img"><img alt="loading" src="<?php echo URL; ?>assets/apps/img/loading.gif"/ style=" margin-left: 100px; "></p>');
        $.ajax({
            url: '<?php echo URL; ?>police_service/show_guest_list/',
            dataType: 'JSON',
            type: 'POST',
            data: {date: guest_listdate, hotel_id: hotel_id},
            success: function(resp) {
                $('#guest_list_body,#guest_list_head').empty();
                $('#guest_list_head').append('<tr>'
                        + '<th class=""><strong>Room No.</strong></th>'
                        + '<th class=""><strong>Photo</strong></th>'
                        + '<th class=""><strong>Name</strong></th>'
                        + '<th class=""><strong>Mobile No.</strong></th>'
                        + '<th class=""><strong>Comming From</strong></th>'
                        + '<th class=""><strong>Going To</strong></th>'
                        + '<th class=""><strong>Id Type</strong></th>'
                        + '<th class=""><strong>Id No</strong></th>'
                        + '<th><strong>Check In Date</strong></th>'
                        + '<th class=""><strong>Check Out Date</strong></th></tr>');
                if (resp.length == 0) {
                    $('#guest_list_body').append('<tr><th colspan="11"><h4 class="alert alert-error">Guest List Not Submitted</h4></th></tr>');
                }
                else {

                    for (var i in resp) {

                        if (resp[i].check_out_status == 0) {
                            $('#guest_list_body').append('<tr><td style="display:none;" class="id">' + resp[i].id + '</td><td>' + resp[i].room_no + '</td><td><img alt="" src='+resp[i].image_url+'></td><td><strong>' + resp[i].name + '</strong><br/>' + resp[i].age + '&nbsp;|&nbsp;' + resp[i].sex + '&nbsp;|&nbsp;' + resp[i].nationality + '</td><td>' + resp[i].mobile + '</td><td>' + resp[i].comming_from + '</td><td>' + resp[i].going_to + '</td><td>' + resp[i].id_type + '</td><td>' + resp[i].id_no + '</td><td>' + readable_format_date(resp[i].date_arrival) + '</td><td></td></tr>');
                        }
                        else {
                            $('#guest_list_body').append('<tr class="alert"><td style="display:none;" class="id">' + resp[i].id + '</td><td>' + resp[i].room_no + '</td><td><img alt="" src='+resp[i].image_url+'></td><td><strong>' + resp[i].name + '</strong><br/>' + resp[i].age + '&nbsp;|&nbsp;' + resp[i].sex + '&nbsp;|&nbsp;' + resp[i].nationality + '</td><td>' + resp[i].mobile + '</td><td>' + resp[i].comming_from + '</td><td>' + resp[i].going_to + '</td><td>' + resp[i].id_type + '</td><td>' + resp[i].id_no + '</td><td>' + readable_format_date(resp[i].date_arrival) + '</td><td class="button_td"><span class="checkedout">Checked out</span> on ' + readable_format_date(resp[i].date_deparature) + '</td></tr>');
                        }
                    }
                }
                
            }
        });
    }
    function readable_format_date(date) {
        //date formate has to be in yyyy-mm-dd
        var n = date.split("-");
        var month = '';
        if (n[1] == '01') {
            month = "Jan";
        }
        else if (n[1] == '02') {
            month = "Feb";
        }
        else if (n[1] == '03') {
            month = "Mar";
        }
        else if (n[1] == '04') {
            month = "Apr";
        }
        else if (n[1] == '05') {
            month = "May";
        }
        else if (n[1] == '06') {
            month = "Jun";
        }
        else if (n[1] == '07') {
            month = "Jul";
        }
        else if (n[1] == '08') {
            month = "Aug";
        }
        else if (n[1] == '09') {
            month = "Sep";
        }
        else if (n[1] == '10') {
            month = "Oct";
        }
        else if (n[1] == '11') {
            month = "Nov";
        }
        else if (n[1] == '12') {
            month = "Dec";
        }
        var d = n[2] + ' ' + month + ', ' + n[0];
        return d;
    }
</script>