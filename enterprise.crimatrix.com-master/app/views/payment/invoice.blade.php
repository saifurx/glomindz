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

<div id="payment_details">
	<div class="row">

	<table class="table table-bordered">
			<thead>
				<tr>
					<th>Order Id</th>
					<th>Hotel Id</th>
					<th>Hotel Name</th>
					<th>Owner's Name/Mobile</th>
					<th>Payment Details</th>
					<th>Transaction Id</th>
					<th>Payment Date</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="payment_details_table">

			</tbody>
		</table>
</div>


</div>
</div>



{{ HTML::script('js/invoice.js');}}
@stop
