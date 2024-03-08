@extends('layouts.home')

@section('navbar')
    @parent
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@stop

@section('content')
	<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Payment Details</h3>
      </div>
      <div class="panel-body">
    <div class="row">
      <!-- <div id="loader"><img src="{{asset('img/ajax-loader1.gif')}}" alt="loading"></div> -->
        <div class="row" id="guest-form-row">
          {{ Form::open(array('', 'id'=>'guest_form'))}}
                <div class="col-xs-6 col-md-3">
                  <div class="form-group">
                     <label>From Date</label>
                     <input type="text" class="form-control" id="guestlist_date">
                  </div>
                </div>
                <div class="col-xs-6 col-md-3">
                  <div class="form-group">
                     <label>To Date</label>
                     <input type="text" class="form-control" id="guestlist_date">
                  </div>
                </div>
                <div class="col-xs-6 col-md-3">
                  <div class="form-group">
                     <label>Payment Type</label>
                     <input type="text" class="form-control" id="guestlist_date">
                  </div>
                </div>
                <div class="col-xs-6 col-md-3">
                  <button type="button" class="btn btn-primary" id="save_guest_btn">Search</button>
                </div>
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
