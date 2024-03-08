<?php

class HomeController extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth', array('only'=>array('getGuestlist')));
		$this->beforeFilter('auth', array('only'=>array('getProfile')));
		$this->beforeFilter('auth', array('only'=>array('updateProfile')));
		//$this->beforeFilter('auth', array('only'=>array('getMakepayment')));
	}

	protected $layout = "layouts.home";

	public function homePage()
	{
		if (Auth::check())
		{
			if(Auth::user()->role == 'admin'){
                return Redirect::to('/hotel/admin/hotels');
            }
		    return Redirect::to('hotel/guestlist');
		}
		else{
			$this->layout->content = View::make('home.index');
		}
	}
	public function aboutPage()
	{
		$this->layout->content = View::make('home.about');
	}
	public function contactPage()
	{
		$this->layout->content = View::make('home.contact');
	}
	//after login
	public function getGuestlist() {
		if (Auth::check())
		{
			if(Auth::user()->status != 0){
				$hotel_id=Auth::user()->id;
				$max_subcription_end_date= DB::select(DB::raw("SELECT MAX(t2.subcription_end_date) as subcription_end_date FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t1.id=$hotel_id"));
				$subcription_end_date=$max_subcription_end_date[0]->subcription_end_date;
				$transaction_status = DB::select("select *  from hotel_transaction_master where hotel_id = $hotel_id and payment_status=1");
				$this->layout->content = View::make('home.guestlist')->with('subcription_end_date', $subcription_end_date);
			}
			else{
				return Redirect::to('/hotel/profile');
			}
		}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getProfile(){
	    if (Auth::check())
		{
			$ps = DB::table('policestations')->lists('name','id');
			$city = DB::table('city_master')->lists('name','id');
			$this->layout->content = View::make('home.profile',compact('ps', 'city'));
		}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getReports(){
		if (Auth::check())
		{
			$this->layout->content = View::make('home.reports');
		}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getFaq(){
		if (Auth::check())
		{
			$this->layout->content = View::make('home.faq');
		}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getSubcribe(){
		if (Auth::check())
		{
			//$ps = DB::table('policestations')->lists('name','id');
			//$city = DB::table('city_master')->lists('name','id');
			//$this->layout->content = View::make('payment.TxnTest');
			return  View::make('payment.index');
			//return  View::make('payment.TxnTest');
			}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getInvoice(){
		if (Auth::check())
		{
			//$ps = DB::table('policestations')->lists('name','id');
			//$city = DB::table('city_master')->lists('name','id');
			//$this->layout->content = View::make('payment.TxnTest');
			return  View::make('payment.invoice');
			//return  View::make('payment.TxnTest');
			}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getMakepayment(){

		//echo 'makepayment';
		if (Auth::check())
		{
			$user_id =Auth::user()->id;
			$max_subcription_end_date= DB::select(DB::raw("SELECT MAX(t2.subcription_end_date) as subcription_end_date FROM users t1,hotel_transaction_master t2 where t1.id=t2.hotel_id and t2.payment_status=1 and t1.id=$user_id"));
			$subcription_end_date=date('Y-m-d');
			if($max_subcription_end_date[0]->subcription_end_date){
					$subcription_end_date=$max_subcription_end_date[0]->subcription_end_date;
			}
				$data= array();
				$data['hotel_id'] = $_POST["CUST_ID"];
				$data['email'] = $_POST["EMAIL"];
				$data['owner_mobile'] = $_POST["MOBILE_NO"];
				$data['order_id'] = $_POST["ORDER_ID"];
				$data['transaction_amount'] = $_POST["TXN_AMOUNT"];
				$data['subcription_start_date'] = $subcription_end_date;
				$data['subcription_end_date'] = date('Y-m-d', strtotime($subcription_end_date."+ 365 days"));;
				$data['product_details'] = $_POST["ORDER_DETAILS"];
				$data['payment_date']=date('Y-m-d H:i:s');
				$data['id'] = DB::table('hotel_transaction_master')->insertGetId($data);
				return View::make('payment.pgRedirect');
		}
		else{
			return Redirect::to('hotel');
		}
	}
	public function getPaymentresponse(){
			return View::make('payment.pgResponse');
	}

	public function updateProfile(){
		$data = Input::all();
	}
	public function getReset($token){
        $reset = DB::table('reset_password')->where('token',$token)->get();
        $resetsize = sizeof($reset);
        if($resetsize != 0){
            if($reset[0]->status != 1){
                $today = date('Y-m-d H:i:s', time());
                if($reset[0]->expiry_datetime > $today){
                    $this->layout->content = View::make('home.reset', compact('reset'));
                }
                else{
                   return "Time Expired";
                }
            }
            else{
                return "Token Expired";
            }
        }
        else{
            return Redirect::to('/');
        }
    }
}
