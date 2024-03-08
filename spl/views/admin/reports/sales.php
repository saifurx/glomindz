<div class="container-fluid">
    <h3>Sales Reports</h3>
    <hr>
    <div class="row-fluid">
        <div class="span3 hidden-print">
            <ul class="nav nav-pills nav-stacked well well_bg">

                <!-- <li>
                    <select class="span12" id="location">
						<option value="0">All Tax</option>
						<option value="1000">Add, Output VAT@5%</option>
						<option value="2000">Add, 2 % CST against C Form</option>
					</select>
                </li>-->
                <li>
                    <input class="span12" type="text" placeholder="From Date" id="from_date">
                </li>
                <li>
                    <input class="span12" type="text" placeholder="To Date" id="to_date">
                </li>
                <li>
                    <button type="button" class="span12 btn btn-success" id="get_stock_report_btn" onclick="get_sales_report();">Search</button>
                </li>
            </ul>
        </div>
        <div class="span9">
            <table class="table table-bordered table-condensed table-striped" id="result_table">
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">

                        $('#reports_li').addClass('active');

                        $(function() {
                            $("#from_date").datepicker({
                                defaultDate: "+1w",
                                dateFormat: "yy-mm-dd",
                                onClose: function(selectedDate) {
                                    $("#to_date").datepicker("option", "minDate", selectedDate);
                                }
                            });
                            $("#to_date").datepicker({
                                defaultDate: "+1w",
                                dateFormat: "yy-mm-dd",
                                onClose: function(selectedDate) {
                                    $("#from_date").datepicker("option", "maxDate", selectedDate);
                                }
                            });
                        });


                        function get_sales_report() {
                            $('#get_stock_report_btn').attr('disabled', true).html('Searching...');
                            $('#filters_details').html('');

                            var from_date = $('#from_date').val();
                            var to_date = $('#to_date').val();
                            if (from_date != 0 && to_date != 0) {
                                $.ajax({
                                    url: '<?php echo URL; ?>analytics/get_sale_report_details/',
                                    type: 'POST',
                                    data: {from_date: from_date, to_date: to_date},
                                    dataType: 'JSON',
                                    success: function(data) {
                                        $('#result_table').show().empty();

                                        if (data.length == 0) {
                                            $('#result_table').append('<thead><tr class="alert alert-error"><td><h4>No Record Found</h4></td></tr></thead>');
                                        } else {
                                            var total_bill_amount = 0.00;
                                            var total_central_excise_duty = 0.00;
                                            var total_education_cess = 0.00;
                                            var total_higher_education_cess = 0.00;
                                            var total_discount_amount = 0.00;
                                            var total_tax_amount = 0.00;
                                             var total_round_off = 0.00;
                                            var total_total_amount = 0.00;

                                            $('#result_table').append('<thead><tr><th>Invoice No</th><th>Company</th><th>Order Reference</th><th>Invoice Date</th><th>Order amount</th><th>CED</th><th>Edu Cess</th><th>SH Edu Cess</th><th>Discount</th><th>Tax</th><th>Round off</th><th>Net Payable</th></tr></thead>');
                                            $('#result_table').append('<tbody>');
                                            for (var i in data) {
                                                $('#result_table').append('<tr><td>' + data[i].invoice_id + '</td><td>' + data[i].company + '</td><td>' + data[i].reference + '</td><td>' + data[i].date + '</td><td style="text-align:right;">' + parseFloat(data[i].total_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].central_excise_duty).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].education_cess).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].higher_education_cess).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].discount_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].tax_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].round_off).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(data[i].bill_amount).toFixed(2) + '</td></tr>');
                                                total_bill_amount = parseFloat(total_bill_amount) + parseFloat(data[i].bill_amount);
                                                total_central_excise_duty = parseFloat(total_central_excise_duty) + parseFloat(data[i].central_excise_duty);
                                                total_education_cess = parseFloat(total_education_cess) + parseFloat(data[i].education_cess);
                                                total_higher_education_cess = parseFloat(total_higher_education_cess) + parseFloat(data[i].higher_education_cess)
                                                total_discount_amount = parseFloat(total_discount_amount) + parseFloat(data[i].discount_amount);
                                                total_tax_amount = parseFloat(total_tax_amount) + parseFloat(data[i].tax_amount);
                                                 total_round_off = parseFloat(total_round_off) + parseFloat(data[i].round_off);
                                                total_total_amount = parseFloat(total_total_amount) + parseFloat(data[i].total_amount);
                                            }
                                          //  alert(total_total_amount);
                                            $('#result_table').append('<tr class="success"><td>Total</td><td></td><td></td><td style="text-align:right;">' + parseFloat(total_total_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_central_excise_duty).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_education_cess).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_higher_education_cess).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_discount_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_tax_amount).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_round_off).toFixed(2) + '</td><td style="text-align:right;">' + parseFloat(total_bill_amount).toFixed(2) + '</td></tr></tbody>');
                                           
                                        }
                                        $('#get_stock_report_btn').attr('disabled', false).html('Search');
                                    }
                                });
                            }
                            else {
                                alert('Error! Select above parameters.');
                                $('#get_stock_report_btn').attr('disabled', false).html('Search');
                            }
                        }
</script>
