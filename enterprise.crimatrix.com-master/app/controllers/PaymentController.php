<?php

class PaymentController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));

	}

	public function getPaymentdetails(){
		$user_id =Auth::user()->id;
		$hotels = DB::select(DB::raw("SELECT t1.id,t1.name,t1.owner_name,t1.owner_mobile,t2.payment_date,t2.transaction_amount,t2.order_id,t2.subcription_start_date,t2.subcription_end_date,t2.product_details,t2.transaction_id FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t1.id=$user_id"));

		echo json_encode($hotels);
	}
	public function getPrintinvoice($order_id){

		$transaction_details = DB::select(DB::raw("SELECT t1.id,t1.name,t1.owner_name,t1.owner_mobile,t2.payment_date,t2.transaction_amount,t2.order_id,t2.subcription_start_date,t2.subcription_end_date,t2.product_details,t2.transaction_id,t2.payment_type FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t2.order_id ='$order_id'"));
		return  View::make('payment.print_invoice', compact('bill_id','transaction_details'));
	}
	public function getRequestcollection(){

			
			$user_id =Auth::user()->id;
			$max_subcription_end_date= DB::select(DB::raw("SELECT MAX(t2.subcription_end_date) as subcription_end_date FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t1.id=$user_id"));
			$subcription_end_date=date('Y-m-d');
			if($max_subcription_end_date[0]->subcription_end_date){
					$subcription_end_date=$max_subcription_end_date[0]->subcription_end_date;
			}

				$today=date('Y-m-d');
				$data= array();
				$data['hotel_id'] = Auth::user()->id;
				$data['email'] = Auth::user()->email;
				$data['owner_mobile'] = Auth::user()->owner_mobile;
				$data['order_id'] = "CRMTRX".time();
				$data['transaction_amount'] = 2400;
				$data['payment_type'] = "Offline";
				$data['subcription_start_date'] = $subcription_end_date;
				$data['subcription_end_date'] = date('Y-m-d', strtotime($subcription_end_date."+ 365 days"));;
				$data['product_details'] = 'Crimatrix Subcription Fee';
				$data['collection_request_date']=date('Y-m-d H:i:s');
				$data['payment_date']=date('Y-m-d H:i:s');
				$data['id'] = DB::table('hotel_transaction_master')->insertGetId($data);

				$data_email = array(
					'hotel_registration_id' => Auth::user()->id,
					'hotel_name' => Auth::user()->name,
					'owner_mobile' => Auth::user()->owner_mobile,
					'locality' => Auth::user()->locality,
					'payment_date' => date('y-m-d'),
					'amount' => 2400,
					'request_no' => $data['id'],
					'payment_status' => 'Request for Cash collection'
					);

				Mail::send('emails.payment_request', $data_email, function($message){
								$message->from('support@glomindz.com', 'Crimatrix');
								$message->to(Auth::user()->email)->cc('saifur.rahman@glomindz.com')->bcc('sarfaraz.hassan@glomindz.com')->subject('Crimatrix Subcription collecton request.');
				});


				echo $data['id'];


	}
	public function getBanktransfer(){
				$user_id =Auth::user()->id;
				$max_subcription_end_date= DB::select(DB::raw("SELECT MAX(t2.subcription_end_date) FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t1.id=$user_id"));

			//$user_id =Auth::user()->id;
				$today=date('Y-m-d');
				$data= array();
				$data['hotel_id'] = Auth::user()->id;
				$data['email'] = Auth::user()->email;
				$data['owner_mobile'] = Auth::user()->owner_mobile;
				$data['order_id'] = "CRMTRX".time();
				$data['transaction_amount'] = 2400;
				$data['payment_type'] = "Offline";
				$data['subcription_start_date'] = $max_subcription_end_date;
				$data['subcription_end_date'] = date('Y-m-d', strtotime($max_subcription_end_date."+ 365 days"));;
				$data['product_details'] = 'Hotel guest list module';
				$data['collection_request_date']=date('Y-m-d H:i:s');
				$data['payment_date']=date('Y-m-d H:i:s');
				$data['id'] = DB::table('hotel_transaction_master')->insertGetId($data);
				echo $data['id'];


	}
	public function getIfalreadyrequest(){

		$hotel_id=Auth::user()->id;
		$transaction_status = DB::select("select *  from hotel_transaction_master where hotel_id = $hotel_id and payment_type='Offline' and payment_status=0");
		if($transaction_status){
			return 0;
		}else{
		    //switch
			return 1;
		}

	}
}
