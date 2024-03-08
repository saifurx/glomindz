 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Crimatrix for hotel.">
	<meta name="keywords" content="Assam Police, Crimatrix">
	<link rel="shortcut icon" href="https://police.crimatrix.com/assets/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://police.crimatrix.com/assets/img/favicon.ico" type="image/x-icon">


	<title>Crimatrix for hotel</title>
	<!-- css -->
	{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('css/print.css')}}
	<!-- js -->
	{{ HTML::script('js/jquery.min.js');}}
	{{ HTML::script('packages/bootstrap/js/bootstrap.min.js');}}

	<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-96604514-1', 'auto');
ga('send', 'pageview');

</script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
			<div class="col-xs-6 col-md-4">
				{{
					HTML::image('https://crimatrix.com/assets/application/img/logo_glomindz.png', 'crimatrix', array('class' =>
					'm-r-sm'))}}
			</div>

			<div class="col-xs-6 col-md-6 text-right pull-right">
				<address>
				  <strong>Glomindz Sofwtare (P) Ltd.</strong><br>
				  26/27,3rd ByeLane,Industrial Easte<br>
				  Bamunimaidam,Guwahati-21<br>
					<small>CIN: U72200AS2009PTC009502</small><br>
          <small>PAN: ​AADCG6332R</small><br>
          <small>Mobile: +91-9854087006</small>
          <small>Email: support@glomindz.com</small>
				</address>
			</div>
		</div>

		<hr>
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<address class="text-left">
				  <strong>To,</br>{{ $transaction_details[0]->owner_name}}</strong><br>
				  {{ $transaction_details[0]->name}},{{Auth::user()->locality}}<br>
				  Email : {{Auth::user()->email}}<br>
					Mobile : {{Auth::user()->owner_mobile}}<br>
				</address>
			</div>
      <div class="col-xs-6 col-md-4 pull-right">
        <p class="text-right">
          <strong>Payment Date: </strong>{{ $transaction_details[0]->payment_date}}<br>
          <strong>Order Id: </strong>{{ $transaction_details[0]->order_id}}<br>
          <strong>Crimatrix Hotel Id: </strong>{{ $transaction_details[0]->id}}
        </p>
      </div>
		</div>
    <hr>
		<div class="row">
			<div class="col-xs-6 col-md-6">
				<strong>Product Details</strong>
			</div>

			<div class="col-xs-6 col-md-6 text-right">
				<small>all the prices are in INR (&#8377;)</small>
		  </div>
    </div>
    <div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>Property</th>
						<th>Subcription Period</th>
						<th>Units</th>
						<th>Price</th>
						<th>Total</th>

					</tr>
				</thead>
				<tbody id="item_details">
						<tr>
							<td>{{ $transaction_details[0]->product_details}}</td>
							<td>{{ $transaction_details[0]->subcription_start_date}} to {{ $transaction_details[0]->subcription_end_date}}</td>
							<td>One</td>
							<td></td>
							<td class="text-right">{{ $transaction_details[0]->transaction_amount}}</td>
						</tr>

						<tr>
							<td></td>
							<td>
							</td>
							<td>
				      </td>
							<td><strong>Total amount(&#8377;)</strong></td>
							<td class="text-right">{{ $transaction_details[0]->transaction_amount}}
							</td>
						</tr>

				</tbody>
			</table>
      <!-- <small class="pull-right">amount in words (rounded) : <strong>Three Thousand only.</strong></small> -->
			</div>

		</div>
    <br>
    <br>
    <div class="row">
      <div class="col-xs-6 col-md-4">
        {{
          HTML::image('https://crimatrix.com/assets/application/img/logo.png', 'crimatrix', array('class' =>
          'm-r-sm'))}}
      </div>

      <div class="col-xs-6 col-md-6 text-right pull-right">
        <address>
          <strong>Glomindz Sofwtare (P) Ltd.</strong><br><br>

          <small>Digitally Generated no signature required</small>
        </address>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <address>
          <strong>Terms and Conditions:</strong><br>

          <small>* Above amount is in Indian National Rupees (INR)</small><br>
     
          <small>* We declare that this invoice shows the actual price of the services rendered and that all particulars are true and
          correct</small><br>
          <small>* Physical collection charge Rs 100 is applicatble separately</small>
        </address>
      </div>
    </div>
		<hr>




	</div>
  <div class="text-center">SUBJECT TO GUWAHATI JURISDICTION</div>
  </body>
</html>
<script>
function convert_number(number)
{
   if ((number < 0) || (number > 999999999))
    {
    return "Number is out of range";
    }
    var Gn = Math.floor(number / 10000000);  /* Crore */
    number -= Gn * 10000000;
    var kn = Math.floor(number / 100000);     /* lakhs */
    number -= kn * 100000;
    var Hn = Math.floor(number / 1000);      /* thousand */
    number -= Hn * 1000;
    var Dn = Math.floor(number / 100);       /* Tens (deca) */
    number = number % 100;               /* Ones */
    var tn= Math.floor(number / 10);
    var one=Math.floor(number % 10);
    var res = "";

    if (Gn>0)
    {
        res += (convert_number(Gn) + " Crore");
    }
    if (kn>0)
    {
            res += (((res=="") ? "" : " ") +
            convert_number(kn) + " Lakhs");
    }
    if (Hn>0)
    {
        		res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " Thousand");
    }

    if (Dn)
    {
        res += (((res=="") ? "" : " ") +convert_number(Dn) + " hundred");
    }


    var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
		var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

    if (tn>0 || one>0)
    {
        if (!(res==""))
        {
            res += " and ";
        }
        if (tn < 2)
        {
            res += ones[tn * 10 + one];
        }
        else
        {
            res += tens[tn];
            if (one>0)
            {
                res += ("-" + ones[one]);
            }
        }
    }

    if (res=="")
    {
        res = "zero";
    }
    return res;
}
</script>
