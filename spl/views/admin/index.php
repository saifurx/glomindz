<style>
    body #myModal{
        width: 750px;
        margin-left: -375px;
    }
    #stock_report_filter{
        display: none;
    }
    caption{
        text-align: left;
    }
</style>
<div class="container-fluid">
    <h3>Dashboard</h3>
    <hr>
    <div id="stock_report_filter" class="row-fluid">
        <form action="" class="form-inline" id="search_form">
            <select name="location" id="location">
                <option value="0">-Select-</option>
                <option value="GD">Guwahati</option>
                <option value="RD">Rangia</option>
            </select> 
            <input type="text" class="" name="product_name"	id="product_name" placeholder="Products" autocomplete="off"/>
            <input type="hidden" name="product_id" id="product_id"> 
            <select	name="package_id" id="package_id" class="input-xlarge">
                <option value="0">Package Type</option>
                <?php foreach ($this->package as $package_type) { ?>
                    <option value="<?php echo $package_type['id']; ?>">
                        <?php echo $package_type['volume'] . ' ' . $package_type['unit_type'] . ' ' . $package_type['type'] . ' ( ' . $package_type['quantity_in_box'] . ' Nos in Box)'; ?>
                    </option>
                <?php } ?>
            </select>
            <input type="button" class="btn btn-success" id="search_btn" onclick="search_stocks();" value="Search">
        </form>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <table class="table table-bordered table-condensed">
                <thead id="stock_list_header_GD">
                </thead>
                <caption><strong>Guwahati</strong></caption>
                <tbody id="stock_list_GD" class="table table-bordered"></tbody>
            </table>
        </div>
        <div class="span6">
            <table class="table table-bordered table-condensed">
                <thead id="stock_list_header_RD">
                </thead>
                <caption><strong>Rangia</strong></caption>
                <tbody id="stock_list_RD" class="table table-bordered"></tbody>
            </table>
        </div>
    </div>

    <!-- ***modal*** -->

    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Details</h3>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-condensed">
                <thead><tr><th>#</th><th>Package Type</th><th>Batch</th><th>Exp. Date</th><th>Available Unit</th></tr></thead>
                <tbody id="details_tb"></tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
</div>
<script type="text/javascript">
                var product_list = [];

                $(document).ready(function() {
                    //search_stocks();
                    get_short_code();
                    get_all_customers();

                    get_stocks('GD', 0, 0);
                    get_stocks('RD', 0, 0);
                    //search_stocks_gd();
                });

                function get_short_code() {
                    $.ajax({
                        url: '<?php echo URL; ?>product/get_short_code/',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data) {
                            product_list = data;
                            localStorage.setItem('product_list', JSON.stringify(data));
                        }
                    });
                    return false;
                }

                function get_all_customers() {
                    $.ajax({
                        url: '<?php echo URL; ?>customer/get_all_customers/0',
                        type: 'GET',
                        dataType: 'JSON',
                        async: false,
                        success: function(data) {
                            localStorage.setItem('customer_list', JSON.stringify(data));
                        }
                    });
                    return false;
                }

                function focus_product_name() {
                    $('#product_name').typeahead({
                        source: product_list,
                        itemSelected: function(resp) {
                            $('#product_id').val(resp);
                        }
                    });
                }

                $('#product_name').focus(function() {
                    //console.log(return_list);
                    $('#product_name').typeahead({
                        source: product_list,
                        itemSelected: function(resp) {
                            //var name = $('#product_name').val();
                            $('#product_id').val(resp);
                            selected_product_id = resp;
                            //console.log(name+'::'+resp);  
                            //$('#hidden_product_name').empty().append('<input type="hidden" name="product_name" value="'+name+'"/>');      
                        }
                    });
                });

                function get_stocks(location, package_id, product_id) {
                    var loc = 0;
                    if (location == 'GD') {
                        loc = 1;
                    }
                    else if (location == 'RD') {
                        loc = 2;
                    }
                    $.ajax({
                        url: '<?php echo URL; ?>stocks/search_stocks_by_product/',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {location: location, package_id: package_id, product_id: product_id},
                        beforeSend: function() {
                            $('#stock_list_header').empty();
                            $('#stock_list').empty();
                        },
                        success: function(resp) {
                            if (resp.length == 0) {
                                $('#stock_list_' + location).append('<tr class="alert-error"><td colspan="4" > No Record Found.</td></tr>');
                            }
                            else {
                                //$('#stock_list_header').append('<tr><th rowspan="2" style="text-align:center;">Short Code</th><th rowspan="2" style="text-align:center;"><strong>Name</strong></th><th style="text-align:center;"><strong>Available Boxes</strong></th><th>Action</th></tr>');
                                for (var key in resp) {
                                    $('#stock_list_' + location).append('<tr><td>' + resp[key].short_code + '</td><td>' + resp[key].name + '</td><td style="text-align:right;">' + resp[key].available_unit + '</td><td><button class="btn btn-mini" onclick="show_details(' + resp[key].id + ',' + loc + ',' + package_id + ');">view details</button></td></tr>');
                                }
                            }
                        }
                    });
                }

                function show_details(product_id, location, package_id) {
                    if (location == 1) {
                        location = 'GD';
                    }
                    else if (location == 2) {
                        location = 'RD';
                    }
                    //alert(product_id+'::'+location+':>'+package_id);

                    $('#details_tb').empty();
                    $('#myModal').modal('show');
                    var package_id = $('#package_id').val();
                    //$('.modal-body').html(product_id);
                    $.ajax({
                        url: '<?php echo URL; ?>stocks/show_product_details/',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {product_id: product_id, location: location, package_id: package_id},
                        success: function(data) {
                            console.log(data);
                            var count = 0;
                            var package_id = 0;
                            var package_total = 0;
                            for (var i in data) {
                                count = count + 1;
                                var batch = data[i].batch_id + data[i].batch_no;
                                var ptype = data[i].volume + ' ' + data[i].unit_type + ' ' + data[i].type + ' ' + (data[i].quantity_in_box + ' Nos in Box');
                                console.log(data[i].package_id);
                                if (package_id == data[i].package_id) {
                                    $('#details_tb').append('<tr><td>' + count + '</td><td>' + ptype + '</td><td>' + batch + '</td><td>' + data[i].exp_date + '</td><td>' + data[i].available_unit + '</td></tr>');
                                    package_total = parseInt(package_total) + parseInt(data[i].available_unit);
                                } else {
                                    if (package_id != 0) {
                                        $('#details_tb').append('<tr><td><strong>Total</strong></td><td></td><td></td><td></td><td><strong>' + package_total + '</strong></td></tr>');
                                    }
                                    package_total =0;
                                    package_total=parseInt(data[i].available_unit);
                                    $('#details_tb').append('<tr><td>' + count + '</td><td>' + ptype + '</td><td>' + batch + '</td><td>' + data[i].exp_date + '</td><td>' + data[i].available_unit + '</td></tr>');
                                
                                }
                                package_id = data[i].package_id;
                            }
                            $('#details_tb').append('<tr><td><strong>Total</strong></td><td></td><td></td><td></td><td><strong>' + package_total + '</strong></td></tr>');

                        }
                    });

                }
</script>
