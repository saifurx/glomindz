<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
@extends('layouts.home')
@section('navbar')
@parent
 	<link media="all" type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
 	<link media="all" type="text/css" rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@stop

@section('content')
<div class="container">
		<div class="panel panel-info">
				<div class="panel-heading">
						<h3 class="panel-title">Crimatrix Subcription Details</h3>
			  </div>
		</div>

	<div class="panel-body">

	<div class="row" id="subcription_cart">


			<div class="col-md-12">
				<h4>Pay Online</h4>
			<form method="post" action="/hotel/makepayment" id="checkout_form">
				<input type="hidden" name="_token" id="cfr_token" value="<?php echo csrf_token(); ?>">

				<input id="ORDER_ID" type="hidden"
					name="ORDER_ID"
					value="<?php echo  "CRMTRX".time()?>">
					<input id="CUST_ID" type="hidden"
						name="CUST_ID"
						value="{{Auth::user()->id}}">

							<input id="EMAIL" type="hidden"
								name="EMAIL"
								value="{{Auth::user()->email}}">
								<input id="MOBILE_NO" type="hidden"
									name="MOBILE_NO"
									value="{{Auth::user()->owner_mobile}}">
							<input id="TXN_AMOUNT" type="hidden"
								name="TXN_AMOUNT"
								value=2400>
								<input id="ORDER_DETAILS" type="hidden"
									name="ORDER_DETAILS"
									value="Crimatrix Hotel  Subscription Fee">
			<table class="table table-striped">
			  <tbody>
			    <tr>
			      <th>#</th>
			      <th>Product</th>
			      <th>Units</th>
						<th>Prine</th>
						<th class="text-right"Total sAmount</th>
			    </tr>
			    <tr>
			      <td>1</td>
			      <td>Crimatrix Hotel Subscription Fee</td>
			      <td>12 months
			      </td>
						<td>
							200
			      </td>
						<td class="text-right"> INR 2400
			      </td>
			    </tr>


					<tr>
			      <td></td>
			      <td></td>
			      <td>
			      </td>
						<td>
			      </td>
						<td>
			      </td>
			    </tr>
				
					<tr>
			      <td></td>
						<td>
			      </td>
						<td>
			      </td>
						<td><strong>Total</strong></td>
			      <td class="text-right"> INR 2400
			      </td>
			    </tr>
					<tr>
						<td></td>
						<td>
						</td>
						<td>
			      </td>
						<td><strong>Total amount</strong></td>
						<td class="text-right"> INR 2400
						</td>
					</tr>

			  </tbody>
			</table>

			<input class="btn btn-success pull-right" id="payOnlineBtn" type="submit" value="Pay Online"/>
			</form>
		</div>




<div class="row" id="cashRequest">
	<h4>Pay offline</h4>
	<div class="col-md-12 pull-center">
		<span>Pay Cash/Cheque to our representitive.</span><br><br>
		<span>Our representive will call you and collect the amount from your registered location.(within Guwahati)</span><br><br>
		<h5 class="label label-danger">Payment Amount : INR  2500/-</h5><br><br>
		<div class="btn btn-danger pull-right" id="collectBtn">Request for Collection</div><br>
		<small>* INR 100 phisical collection charge</small><br>
		<small>* On request our representive will call you and collect the amount from your registered location.</small><br>
		<small>* Cash Payment information will be updated within 24 hrs of payment recieved.</small><br>
		<small>* Cheque Payment information will be updated as soon as payment credited to our a/c.</small><br>
		<small>* All the payment should made by cheque/draft/online in favour of <em>Glomindz Software Private Limited</em></small><br>

	</div>
</div>

</div>

</div>
</div>


{{ HTML::script('js/payment.js');}}
@stop
