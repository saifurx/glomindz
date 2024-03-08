<style>
    #add_stock_row {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <h3>
            Stocks Production
            <!-- 
            <a class="btn pull-right" href="<?php echo URL; ?>admin/stock_transfer/"><i class="icon-random"></i> Transfer</a>
            -->
            <button class="btn pull-right" id="add_stock_btn">
                <i class="icon-shopping-cart"></i> Production
            </button>

        </h3>
    </div>

    <div class="row-fluid" id="add_stock_row">
        <h4>Production (Rangia)</h4>
        <div class="alert alert-error hide" id="stock_save_error"></div>
        <form action="" class="form" id="add_stock_form">
            <div class="span4">
                <input type="hidden" name="transaction_type" value="Production" /> <input
                    type="hidden" name="location" value="RD" /> <input type="text"
                    placeholder="Product" id="product_typehead"> <input type="hidden"
                    placeholder="Product id" id="product_id" name="product_id"> <select
                    name="package_id" id="package_id">
                    <option value="0">--Package Type--</option>
                    <?php foreach ($this->package as $package_type) { ?>
                        <option value="<?php echo $package_type['id']; ?>">
                            <?php echo $package_type['volume'] . ' ' . $package_type['unit_type'] . ' ' . $package_type['type'] . ' ( ' . $package_type['quantity_in_box'] . ' Nos in Box)'; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>
            <div class="span4">
                <input type="text" placeholder="Transaction Date"
                       id="transaction_date" name="transaction_date"> <input type="text"
                       placeholder="Transaction Reference No"
                       id="transaction_reference_no" name="transaction_reference_no"> <input
                       type="text" placeholder="Remarks" id="remarks" name="remarks"> <br>

            </div>
            <div class="span4">
                <div class="alert alert-error" id="batch_error">
                    <strong> Batch is already allocate for diffrent product.</strong>
                </div>
                <input class="span2" type="text" placeholder="Batch No."
                       disabled="disabled" value="L"> <input type="hidden" name="batch_id"
                       value="L"> <input class="input-medium" type="number"
                       placeholder="Batch No." id="batch_no" name="batch_no">

                <input type="text" placeholder="Mfg Date" id="mfg_date"
                       name="mfg_date"> <input style="text-transform: uppercase;"
                       type="text" placeholder="Exp Month" id="exp_month" name="exp_month"
                       class="datepicker"> <input type="number" placeholder="Quantity"
                       id="quantity" name="quantity"> <span class="row"><button
                        type="button" class="btn btn-success input-large"
                        id="save_stock_btn">Save</button> </span>
            </div>

        </form>
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
    $('#stocks_li').addClass('active');
    var return_list = [];

    window.onload = function() {
        $('#batch_error').hide();
        get_short_code();
        get_stock_master();
        $("#mfg_date").datepicker({dateFormat: "yy-mm-dd"});

        $("#exp_month").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'M yy',
            onClose: function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            }
        });
        $("#transaction_date").datepicker({dateFormat: "yy-mm-dd"});


    };
    function date_ddmmyyyy(date) {
        var n = date.split("-");
        var result = n[2] + '/' + n[1] + '/' + n[0];
        return result;
    }

    $("#exp_month").focus(function() {
        $('.ui-datepicker-calendar').hide();
    });
    function get_short_code() {
        $.ajax({
            url: '<?php echo URL; ?>product/get_short_code/',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                return_list = data;
            }
        });
    }

    $('#product_typehead').focus(function() {
        $('#product_typehead').typeahead({
            source: return_list,
            itemSelected: function(resp) {
                $('#product_id').val(resp);
            }
        });
    });

    $('#add_stock_btn').click(function() {
        $('#stock_error').hide();
        $("#add_stock_row").toggle("300");
    });

    var valid = 0;
    function validate_batch(batch_no) {
        //$('#save_stock_btn').attr('disabled',false).html('Save');
        //$('#error_batch_no').html('');
        var product_id = $('#product_id').val();
        var package_id = $('#package_id').val();
        if (product_id == 0) {
            alert('Please select product');
        }
        if (package_id == 0) {
            alert('Please select package');
        }
        if (product_id != 0 && package_id != 0){
            $.ajax({
                url: '<?php echo URL; ?>stocks/validate_batch/',
                type: 'POST',
                data: {batch_no: batch_no, package_id: package_id, product_id: product_id},
                success: function(resp) {

                    if (resp != 0) {
                        $('#batch_error').show();
                        $('#save_stock_btn').attr('disabled', true).html('Save');
                    }
                    else {
                        $('#batch_error').hide();
                        $('#save_stock_btn').attr('disabled', false).html('Save');
                    }
                }
            });
        }
    }

    $('#batch_no').change(function() {
        $('#save_stock_btn').attr('disabled', true).html('Save');
        var batch_no = $('#batch_no').val();
        validate_batch(batch_no);
    });


    $('#save_stock_btn').click(function() {
        console.log('Test=' + valid);
        var pid = $('#product_id').val();
        var quantity = $('#quantity').val();

        if (pid != '' && pid != 0 && quantity != 0 && quantity != '') {
            $('#save_stock_btn').attr('disabled', true).html('Saving...');
            var formData = $('form#add_stock_form').serialize();
            $.ajax({
                url: '<?php echo URL; ?>stocks/add_new_stock',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(resp) {
                    $("#add_stock_row").slideUp(300);
                    $('#save_stock_btn').attr('disabled', false).html('Save');
                    var array_element = resp;
                    if (array_element.error == '') {
                        get_stock_master();
                    } else {
                        $('#stock_error').empty().append('<h4>' + array_element.error + '</h4>');
                        $('#stock_error').show();
                    }
                }
            });

        }
        else {
            $('#stock_save_error').empty().append('<strong>Oh snap! </strong> Product and Quantity must be select.');
            $('#stock_save_error').show();
            setTimeout(function() {
                $("#stock_save_error").hide(400);
            }, 2500);
        }
        $('form#add_stock_form').each(function() {
            this.reset();
        });
        valid = 0;
        return false;

    });

    function highilight() {
        $("#stock_list tr:first").addClass('alert-success');
        setTimeout(function() {
            $("#stock_list tr:first").removeClass('alert-success');
        }, 2500);
    }

    function reset_form_new_cust_form() {
        $('#add_stock_form').each(function() {
            this.reset();
        });
    }
    function get_stock_master() {
        $('.loading_p').show().html('<img src="<?php echo URL; ?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
        $.ajax({
            url: '<?php echo URL; ?>stocks/get_transfer_pending_stocks',
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
                    $('#stock_list_header').append('<tr><th>Short Code</th><th><strong>Name</strong></th><th><strong>Container</strong></th><th><strong>Location</strong></th><th><strong>Available Boxes</strong></th><th><strong>Batch No</strong></th><th><strong>Exp Date</strong></th><th><strong>Last Transaction</strong></th><th><strong>Action</strong></th></tr>');
                    for (var key in resp) {
                        count = count + 1;
                        var transaction_type = resp[key].transaction_type;
                        var transaction_action = '';

                        if (transaction_type == 'Transfer-pending') {
                            transaction_action = '<label class="label label-warning" onclick="stock_recived(' + resp[key].stock_id + ')">Recived</label>';
                        }
                        var location = 'Rangia';
                        if (resp[key].location === 'GD') {
                            location = 'Guwahati';
                        }
                        var mfg_date = date_ddmmyyyy(resp[key].mfg_date);
                        $('#stock_list').append('<tr><td>' + resp[key].short_code + '</td><td>' + resp[key].name + '</td><td>' + resp[key].volume + ' ml ' + resp[key].type + ' ( ' + resp[key].quantity_in_box + ' Nos in Box)</td><td>' + location + '</td><td style="text-align:right;">' + resp[key].available_unit + '</td><td>' + resp[key].batch_id + '' + resp[key].batch_no + '</td><td>' + resp[key].exp_date + '</td><td>' + transaction_type + '</td><td>' + transaction_action + '</td></tr>');
                    }
                }
            }
        });
    }
    function stock_recived(stock_id) {

        $.ajax({
            url: '<?php echo URL; ?>stocks/recived_stock/' + stock_id,
            dataType: 'JSON',
            type: 'GET',
            beforeSend: function() {
            },
            success: function(resp) {
                get_stock_master();
            }
        });
    }
</script>
