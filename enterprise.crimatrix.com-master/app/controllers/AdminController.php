<?php
class AdminController extends BaseController {
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('postProfile')));
    $this->beforeFilter('auth', array('only'=>array('postChangepassword')));
		$this->beforeFilter('auth', array('only'=>array('getHotels')));
		$this->beforeFilter('auth', array('only'=>array('postPermission')));
		$this->beforeFilter('auth', array('only'=>array('postUpdatehotelsdetails')));
	}
	protected $layout = "layouts.admin";
	//profile
	
	public function getProfile(){
	    if (Auth::check())
		{
			$ps = DB::table('policestations')->lists('name','id');
			$city = DB::table('city_master')->lists('name','id');
			$this->layout->content = View::make('admin.profile',compact('ps', 'city'));
		}
		else{
			return Redirect::to('hotel/users/logout');
		}
	}
  public function postProfile(){
    $user_id = Session::get('user_id');
    $user = User::find($user_id);
		$user->name = Input::get('name');
		$user->contact_person = Input::get('contact_person');
		$user->ps_id = Input::get('ps_id');
        $user->city_id = Input::get('city_id');
        $user->state = Input::get('state');
        $user->country = Input::get('country');
        $user->status = 1;
        $user->save();
        return $user->id;
    }
    public function postChangepassword(){
        $validator = Validator::make(Input::all(), User::$change_password_rules);
        if($validator->passes()){
            $old_password = Input::get('old_password');
            $new_password = Input::get('password');
            $user = Auth::user();
            if (Hash::check($old_password, $user->password)) {
                $user->password = Hash::make($new_password);
                $user->save();
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 2;
        }
    }
    //service
	public function getHotels() {
		//$hotels = DB::table('users')->get();
		if(Auth::user()->role == 'admin'){
			$hotels = DB::select(DB::raw('SELECT users.id,users.name,users.email,users.mobile,users.owner_name,users.owner_mobile,users.ps_id,users.status,users.role,users.contact_person,users.city_id,users.number_of_rooms,users.locality, policestations.name as ps_name FROM users INNER JOIN policestations ON users.ps_id = policestations.id'));
			$ps = DB::table('policestations')->lists('name','id');
			$city = DB::table('city_master')->lists('name','id');
			$this->layout->content = View::make('support.index',compact('hotels','ps', 'city'));
		}else{
			$this->layout->content = View::make('home.index');
		}
	}
	public function getPaymentdetails() {
		//$hotels = DB::table('users')->get();
		if(Auth::user()->role == 'admin'){
			$hotels = DB::select(DB::raw("SELECT t2.id as transaction_id,t1.id,t1.name,t1.email,t1.mobile,t1.owner_name,t1.owner_mobile,t1.address,t1.locality,t2.payment_date,t2.transaction_amount,t2.payment_type FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=0 and t2.payment_type='Offline' ORDER BY `t2`.`payment_type` ASC"));
			$this->layout->content = View::make('admin.collection_request',compact('hotels'));
		}else{
			$this->layout->content = View::make('home.index');
		}
	}
	public function postPaidoffline() {
			$hotel_id = Input::get('hotel_id');
			$transaction_id = Input::get('transaction_id');
			$status=DB::table('hotel_transaction_master')->where('id', $transaction_id)->update(array('payment_status' => 1));
			if($status==1){
				$userinfo = DB::table('users')->where('id',$hotel_id)->get();

				$hotel_name = $userinfo[0]->name;
				$email_hotel = $userinfo[0]->email;
				$owner_mobile = $userinfo[0]->owner_mobile;
				$msg="Thanks ".$hotel_name." Your transaction for subcription of crimatrix guestlist submission is successful.";
				$this->sendSMS($msg,$owner_mobile);
				$data_email = array(
					'hotel_name' => $hotel_name,
					'owner_mobile' => $owner_mobile,
					'payment_date' => date('y-m-d'),
					'amount' => 2400,
					'payment_status' => 'Cash Payment'
					);

			   Mail::send('emails.payment_success', $data_email, function($message) use ($userinfo){
			   				$message->from('support@glomindz.com', 'Crimatrix');
			   				$message->to($userinfo[0]->email,$userinfo[0]->name)->cc('saifur.rahman@glomindz.com')->subject('Crimatrix Subcription Fee Payment successful');
			   });
				}
			return $status;
	}

    public function postPermission() {
		$id = Input::get('id');
		$status = Input::get('status');
		DB::table('users')->where('id', $id)->update(array('status' => $status));

		//$this->sendSMS($msg,$mobile);
    return $status;
    }
    public function postResetpass() {
			$id = Input::get('id');
			$string = str_random(8);
			$password = Hash::make($string);
			DB::table('users')->where('id', $id)->update(array('password' => $password));

			$userinfo = DB::table('users')->select('name', 'email')->where('id', $id)->get();

			$data = array("detail"=>"Your Password has been reset and the new password is: $string");
	    Mail::send('emails.resetconfirm', $data, function($message) use ($userinfo){
	        	$message->from('support@glomindz.com', 'Crimatrix');
	          $message->to($userinfo[0]->email, $userinfo[0]->name)->cc('support@glomindz.com')->subject('Crimatrix: Password Reset Confirmation');
	    });
	    return 1;
    }
    public function postUpdatehotelsdetails() {
    	$id = Input::get('id');
    	$data = array();
    	$data['name'] = Input::get('name');
			$data['owner_name'] = Input::get('owner_name');
    	$data['owner_mobile'] = Input::get('owner_mobile');
    	$data['contact_person'] = Input::get('contact_person');
    	$data['ps_id'] = Input::get('ps_id');
    	$data['email'] = Input::get('email');
			$data['mobile'] = Input::get('mobile');
			$data['city_id'] = Input::get('city_id');
			$data['state'] = Input::get('state');
			$data['country'] = Input::get('country');
			$data['number_of_rooms'] = Input::get('number_of_rooms');
			$data['licence_no'] = Input::get('licence_no');
			$data['locality'] = Input::get('locality');
      $data['pin'] = Input::get('pin');
			$data['address'] = Input::get('address');
      $resp = DB::table('users')->where('id', $id)->update($data);
        if($resp != 1){
			return Response::json( array('msg' => 0));
        }
        else{
			return Response::json( array('msg' => 1));
		}

    }
	public function postReports(){
        $data = DB::select(DB::raw("SELECT * FROM (SELECT hotel_id, total_check_in, total_check_out, guestlist_date FROM hotel_records where hotel_id = 259 ORDER BY guestlist_date DESC LIMIT 0 , 30) t ORDER BY guestlist_date ASC"));
        return Response::json($data);
    }
		function sendSMS($sms_format, $mobile_no_list) {
		//	echo $sms_format.$mobile_no_list;
			$authKey = "134784AHno1jVJyXGB585d4ff7";
			$mobileNumber = $mobile_no_list;
			$senderId = "CRMTRX";
			$message = urlencode($sms_format);
			$route = 4;
			$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
			);
			$url="https://control.msg91.com/api/sendhttp.php";
			$ch = curl_init();
			curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					//,CURLOPT_FOLLOWLOCATION => true
			));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$output = curl_exec($ch);
			if(curl_errno($ch))
			{
					echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			//echo $output;
		}
}

?>
