<script
src="<?php echo URL; ?>assets/jquery/jquery-1.9.1.js"></script>
<script
src="<?php echo URL; ?>assets/jquery/jquery.min.js"></script>
<script
src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.js"></script>
<link
    href="<?php echo URL; ?>assets/apps/css/print.css" rel="stylesheet">

<style>
    #add_stock_row {
        display: none;
    }
    .btn {
        display: inline-block;
        *display: inline;
        padding: 4px 12px;
        margin-bottom: 0;
        *margin-left: .3em;
        font-size: 14px;
        line-height: 20px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        cursor: pointer;
        background-color: #f5f5f5;
        *background-color: #e6e6e6;
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border: 1px solid #cccccc;
        *border: 0;
        border-color: #e6e6e6 #e6e6e6 #bfbfbf;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border-bottom-color: #b3b3b3;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        *zoom: 1;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    @media print{
        #btn_h3{
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <h3>Current Stock Position <span class="small pull-right"><?php echo date("F j, Y, g:i a"); ?> </span></h3>
        <!--<h3 id="btn_h3"><a class="btn" href="<?php echo URL; ?>/admin">Back</a> <button class="btn" type="button" id="print" onclick="window.print();">Print</button></h3> -->
    </div>
    <hr>
    <div class="alert alert-error hide" id="stock_error"></div>
    <div class="row-fluid">
        <p class="loading_p"></p>
        <table class="table table-bordered table-condensed">
            <thead id="stock_list_header"></thead>
            <tbody id="stock_list" class="table table-bordered"></tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    $('#reports_li').addClass('active');
    var return_list = [];

    window.onload = function() {
        get_stock_master();

    };
    function get_stock_master() {
        $('.loading_p').show().html('<img src="<?php echo URL; ?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
        $.ajax({
            url: '<?php echo URL; ?>admin/get_current_stocks',
            dataType: 'JSON',
            type: 'GET',
            beforeSend: function() {
                $('#stock_list_header').empty();
                $('#stock_list').empty();
            },
            success: function(resp) {
                $('.loading_p').empty().hide();
                var count = 0;

                if (resp.length == 0) {

                } else {
                    var package_id = 0;
                    var package_total = 0;

                    $('#stock_list_header').append('<tr><th>Short Code</th><th><strong>Name</strong></th><th><strong>Container</strong></th><th><strong>Location</strong></th><th><strong>Available Boxes</strong></th><th><strong>Batch NO</strong></th></tr>');
                    for (var key in resp) {
                        count = count + 1;

                        var location = 'Rangia';
                        if (resp[key].location === 'GD') {
                            location = 'Guwahati';
                        }
                        var mfg_date = date_ddmmyyyy(resp[key].mfg_date);
                        if (package_id == resp[key].package_id) {
                            $('#stock_list').append('<tr><td>' + resp[key].name + '</td><td>' + resp[key].volume + ' ml ' + resp[key].type + ' ( ' + resp[key].quantity_in_box + ' Nos in Box)</td><td>' + location + '</td><td>' + resp[key].short_code + '</td><td style="text-align:right;">' + resp[key].available_unit + '</td><td style="text-align:right;">L' + resp[key].batch_no + '</td></tr>');
                            package_total = parseInt(package_total) + parseInt(resp[key].available_unit);

                        } else {
                            if (package_id != 0) {
                                $('#stock_list').append('<tr><td></td><td></td><td></td><td><strong>Total</strong></td><td style="text-align:right;"><strong>' + package_total + '</strong></td><td></td></tr>');
                            }
                            package_total = 0;
                            package_total = parseInt(resp[key].available_unit);
                            $('#stock_list').append('<tr><td>' + resp[key].name + '</td><td>' + resp[key].volume + ' ml ' + resp[key].type + ' ( ' + resp[key].quantity_in_box + ' Nos in Box)</td><td>' + location + '</td><td>' + resp[key].short_code + '</td><td style="text-align:right;">' + resp[key].available_unit + '</td><td style="text-align:right;">L' + resp[key].batch_no + '</td></tr>');
                        }
                        
                        package_id = resp[key].package_id;
                    }
                     $('#stock_list').append('<tr><td></td><td></td><td></td><td><strong>Total</strong></td><td style="text-align:right;"><strong>' + package_total + '</strong></td><td></td></tr>');

                }
            }
        });
    }
    function date_ddmmyyyy(date) {
        var n = date.split("-");
        var result = n[2] + '/' + n[1] + '/' + n[0];
        return result;
    }

</script>
