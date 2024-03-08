@extends('layouts.home')

@section('navbar')
    @parent
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@stop

@section('content')
	<div class="container">
    <div class="row">

		    <div class="panel panel-default">
		      <div class="panel-heading">
		        <h3 class="panel-title">Collection Request</h3>
		      </div>
		      <div class="panel-body">

		      	<div class="table-responsive">
              <input type="hidden" name="_token" id="cfr_token" value="<?php echo csrf_token(); ?>">

				  <table class="table table-bordered datatable" id="payment-hotels-tb">
			        <thead>
			          <tr>
                  <th class="hidden">#</th>
                  <th class="hidden">Name</th>
			          	 <th>Crimatrix Registration ID</th>
			            <th>Hotel Name</th>
                  <th>Owner Name</th>
                  <th>Owner Mobile</th>
                  <th>Registered Email</th>
                  <th>Registered Mobile</th>
                  <th>Address</th>
                  <th>Locality</th>
			            <th>Payment Mode</th>
			            <th>Transaction Request Date</th>
                  <th>Amount</th>
                  <th>Pay Offline</th>
			          </tr>
			        </thead>
			        <tbody>
			        	    @foreach($hotels as $hotel)
  						  <tr>
					           <td class="hotel_id hidden">{{$hotel->id}}</td>
                     <td class="transaction_id hidden">{{$hotel->transaction_id}}</td>
					           <td>{{$hotel->id}}</td>
					           <td>{{$hotel->name}}</td>
                     <td>{{$hotel->owner_name}}</td>
                     <td>{{$hotel->owner_mobile}}</td>
					           <td>{{$hotel->email}}</td>
                     <td>{{$hotel->mobile}}</td>
                     <td>{{$hotel->address}}</td>
                     <td>{{$hotel->locality}}</td>
                      <td>{{$hotel->payment_type}}</td>
                      <td>{{$hotel->payment_date}}</td>
                      <td>{{$hotel->transaction_amount}}</td>
                     <td><button type="button" class="paidOffline btn btn-danger btn-xs">Paid Offline</button></td>

					        </tr>

						@endforeach

			        </tbody>
			      </table>
				</div>
		      </div>
		    </div>
	    </div>
    </div>


  <script>

  $(document).ready(function(){
    $('#payment-hotels-tb').DataTable(
      {
        mark: {
          element: 'span',
          className: 'highlight'
          }

      });
      $.extend(true, $.fn.dataTable.defaults, {
          mark: true
      });
  });

  </script>
{{ HTML::script('js/selectize.min.js');}}
{{ HTML::script('js/admin-hotels_payments.js');}}
@stop
