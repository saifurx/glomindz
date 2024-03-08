<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<style type="text/css">dd{line-height: 2;}</style>
	</head>
	<body>
		<div style="width: 100%;min-height: 200px;">
			<h2 style="width:100%;">
				<a href="https://crimatrix.com/" style="float: left;"><img src="https://enterprise.crimatrix.com/img/logo.png" alt="Crimatrix Logo" style="width: 100%;"></a>
			</h2>
			<div style="width:100%; padding-top: 50px;">
				<h3>Crimatrix Payment Collection request</h3>
				<ul>
					<dt>Crimatrix Registration No: {{ $hotel_registration_id}}</dt><br/>
					<dt>Request No: {{ $request_no}}</dt><br/>
					<dt>Hotel Name: {{$hotel_name}}</dt><br/>
					<dt>Owner Mobile: {{$owner_mobile}}</dt><br/>
					<dt>Locality: {{ $locality}}</dt><br/>
					<dt>Date of Request: {{$payment_date}}</dt><br/>
					<dt>Amount: INR {{ $amount}}</dt><br/>
					<dt>Payment Staus: {{ $payment_status}}</dt><br/>


				</dl>

			</div>
			<div>
				<p>Thanks, Crimatrix Team</p>
				<p>For any help <strong>email:</strong> saifur.rahman@glomindz.com <u>OR<u> <strong>call:</strong> +91-9854087006</p>
			</div>
			<div style="border-top: 2px solid #cc0000;">
				<p><small>&copy; <a href="https://crimatrix.com">Crimatrix</a> 2017-2018</small></p>
			</div>
		</div>
	</body>
</html>
