<?php

class CronController extends BaseController {
	public function __construct() {

	}
	public function getSubmittedhotels(){

		$guestlist_date = date('Y-m-d',strtotime(date('Y-m-d'). "-1 days"));
		$registered = User::count();
		$subimitted = Hotelrecord::select(DB::raw('count(*) as subimitted_hotels'))
				->where('guestlist_date', $guestlist_date)
                ->get();
		$totals = Hotelrecord::select(DB::raw('sum(total_check_in) as total_check_in, sum(total_check_out) as total_check_out, sum(foreign_guest) as foreign_guest'))
				->where('guestlist_date', $guestlist_date)
                ->get();
        $totals[0]['guestlist_date'] = $guestlist_date;
		$totals[0]['subimitted_hotels'] = $subimitted[0]['subimitted_hotels'];
        $totals[0]['registered'] = $registered - 5;
        $data = array(
        	'guestlist_date' => $totals[0]['guestlist_date'],
        	'registered' => $totals[0]['registered'],
        	'subimitted_hotels' => $totals[0]['subimitted_hotels'],
        	'total_check_in' => $totals[0]['total_check_in'],
        	'total_check_out' => $totals[0]['total_check_out'],
        	'foreign_guest' => $totals[0]['foreign_guest']
        	);
       	Mail::send('emails.reports', $data, function($message){
                $message->from('reports@crimatrix.com', 'Crimatrix');
                $message->to('support@glomindz.com')->subject('Crimatrix daily report');
        });
	}
	public function getStats(){
			DB::transaction(function(){
			$guestlist_date = date('Y-m-d',strtotime(date('Y-m-d'). "-1 days"));

			$hotels = Guestlist::select('hotel_id')
	                    ->where('guestlist_date', $guestlist_date)
	                    ->distinct()
	                    ->get();

			foreach ($hotels as $row) {
				$total_check_in = Guestlist::select(DB::raw('count(*) as total_check_in'))
					->where('guestlist_date', $guestlist_date)
					->where('hotel_id', $row->hotel_id)
					->pluck('total_check_in');

				$total_check_out = Guestlist::select(DB::raw('count(*) as total_check_out'))
					->where('checkout_date', 'like', $guestlist_date.'%')
					->where('hotel_id', $row->hotel_id)
					->pluck('total_check_out');

				$foreign_guest = Guestlist::select(DB::raw('count(*) as foreign_guest'))
					->where('checkin_date', 'like', $guestlist_date.'%')
					->where('hotel_id', $row->hotel_id)
					->whereNotIn('nationality', array('IND', 'INDIA', 'INDIAN'))
					->pluck('foreign_guest');

				//dd(DB::getQueryLog($total_check_out));
				$data = array();
				$data['hotel_id'] = $row->hotel_id;
				$data['guestlist_date'] = $guestlist_date;
				$data['total_check_in'] = $total_check_in;
				$data['total_check_out'] = $total_check_out;
				$data['foreign_guest'] = $foreign_guest;
				$data['id'] = DB::table('hotel_records')->insertGetId($data);
			}

		});

	}

	public function getRemovephoto(){
		$guestlist_date = date('Y-m-d',strtotime(date('Y-m-d'). "-21 days"));
		$hotels = DB::select(DB::raw("SELECT id FROM hotel_guestlist WHERE guestlist_date = '$guestlist_date'"));
		$count = 0;
		foreach ($hotels as $row){
			$path = public_path();
			$file_url = $path.'/uploads/hotelguestlist/'.$row->id.'.jpg';
			$filethumb_url = $path.'/uploads/hotelguestlist/thumb/'.$row->id.'.jpg';
			if(file_exists($file_url)){
				unlink($file_url);
				$count = $count + 1;
			}
			if(file_exists($filethumb_url)){
				unlink($filethumb_url);
				$count = $count + 1;
			}
		}
		Mail::send('emails.count', array('count' => $count, 'guestlist_date'=> $guestlist_date), function($message)
		{
			$message->to('support@glomindz.com')->subject('Crimatrix Remove Photo Count');
		});
	}

	public function getTest(){
		echo time();
	}
	public function getHotelguestlistbyps(){
		$data = array();
		$guestlist_date = date('Y-m-d',strtotime(date('Y-m-d'). "-1 days"));
		$pslist =DB::select(DB::raw("SELECT id,name,email from policestations"));
		$path = public_path();
		$csv_fields=array();
		$csv_fields[] = 'Hotel Name';
		$csv_fields[] = 'Hotel Contact';
		$csv_fields[] = 'Room No';
		$csv_fields[] = 'Guest Name';
		$csv_fields[] = 'Nationality';
		$csv_fields[] = 'Coming from';
		$csv_fields[] = 'Going to';
		$csv_fields[] = 'Check in date';
		$csv_fields[] = 'Age';
		$csv_fields[] = 'Mobile';
		$csv_fields[] = 'Sex';
		$csv_fields[] = 'ID Type';
		$csv_fields[] = 'ID No';
		$csv_fields[] = 'Vechicle No';
		foreach ($pslist as $ps){

			 $guestlist =DB::select(DB::raw("SELECT t2.name as hotel,t2.mobile as contact,t1.room_no, t1.name,t1.nationality,t1.coming_from,t1.going_to,t1.checkin_date,t1.age,t1.mobile,t1.sex,t1.id_type,t1.id_no,t1.vehicle_no FROM hotel_guestlist t1,users t2 WHERE t1.hotel_id=t2.id and t2.ps_id = $ps->id and guestlist_date = '$guestlist_date' order by t1.hotel_id"));
			 if ((array)$guestlist ){
					 $file = fopen($path.'/img/guestlist.csv', 'w+');
					 fputcsv($file, $csv_fields);
					 foreach ($guestlist as $row){
			 		  	fputcsv($file, (array)$row);
			 		}
			 		fclose($file);
					//array_push($data,$ps);
					if($ps->email){
					Mail::send('emails.ps_guestlist', array('guestlist_date'=> $guestlist_date,'ps_details'=>$ps), function($message) use ($ps)
					{
						$path = public_path();
						$message->from("support@glomindz.com", "Crimatrix");
						$message->attach($path.'/img/guestlist.csv');
					 	$message->to($ps->email)->subject('Hotel Guestlist for date : '.date('Y-m-d',strtotime(date('Y-m-d'). "-1 days")));
					 });
				 }
		  }
		}
		 return Response::json($data);;
	}
}

?>
