<?php

class PrintPdf extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function save_download_user(){
		
		$this->model->save_download_user();
	}
	//individual district
	public function raw_material($filter){

		$filter = explode(",", $filter);
		$dist_id=$filter[0];
		$rm_items_id= $filter[1];
		$data =$this->model->get_raw_material_data_for_pdf($dist_id,$rm_items_id);
		$data_dm_rm =$this->model->get_dm_rm_for_pdf($dist_id,$rm_items_id);
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetLeftMargin(90);
		$pdf->SetY(20);
		$pdf->SetFont('Arial','B',12);
		foreach ($data_dm_rm as $row_dm_rm){
			$dist_name=$row_dm_rm['dist_name'];
			$rm_name=$row_dm_rm['rm_name'];			
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(35,10,'Report: Viability for '.$rm_name.' in '.$dist_name);
		}
		
		$pdf->SetLeftMargin(20);
		$count_max=0;
		$count_med=0;
		$count_min=0;
		$count_nil=0;

		foreach ($data as $row){
			$score=$row['rm_score'];
			if($score >= 112){
				$count_max=$count_max+1;
			}
			if($score  >= 85 && $score <112){
				$count_med=$count_med+1;
			}
			if($score > 0 && $score < 85){
				$count_min=$count_min+1;
			}
			if($score== 0){
				$count_nil=$count_nil+1;
			}
		}
		
		$max_row=ceil($count_max/3);
		$med_row=ceil($count_med/3);
		$min_row=ceil($count_min/3);
		$nil_row=ceil($count_nil/3);
		
		$pdf->SetTextColor(0,0,0);
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		//High
		
		if($max_row!=0){
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(25);
			$pdf->Cell(15,15,'High');
			$pdf->Line(20,35,200,35);
			$pdf->SetFont('Arial','',10);
			
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];

				if($score >= 112 && $i<$max_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY(35+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$myY=$pdf->GetY();
					
					
				}
				else if($score >= 112 && $i<$max_row+$max_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY(35+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5,$i.'.'. $block,0);
					
				}
				
				else if($score >= 112 && $i<$max_row+$max_row+$max_row){
					$i=$i+1;				
					$z=$z+5;
					$pdf->SetY(35+$z);
					$pdf->SetLeftMargin(140);
					$pdf->Cell(50,5,$i.'.'. $block,0);				
				}
			}
		}

		//Moderate
		if($med_row!=0){
			$myY=$pdf->GetY();
			$myY=$myY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myY);
			$myY=$myY+10;
			$pdf->Cell(15,15,'Moderate');
			$pdf->Line(20,$myY,200,$myY);
			$pdf->SetFont('Arial','',10);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
				$rm_name=$row['rm_name'];
			
				if(($score  >= 85 && $score <112) && $i<$med_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$myYY=$pdf->GetY();
			
				}
				
				else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row) {
					
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+5;
					$pdf->SetY($myY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
	
				}
				
				else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row+$med_row) {
				
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+5;
					$pdf->SetY($myY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				
				}
			}
		}
		
		//Low
		if($min_row!=0){
			$myYY=$pdf->GetY();
			$myYY=$myYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myYY);
			$myYY=$myYY+10;
			$pdf->Cell(15,15,'Low');
			$pdf->Line(20,$myYY,200,$myYY);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if(($score  >0 && $score <85) && $i<$min_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$myYYY=$pdf->GetY();
				}
				else if(($score  > 0 && $score < 85) && $i<$min_row+$min_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($myYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if(($score  > 0 && $score < 85) && $i<$min_row+$min_row+$min_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($myYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}	
		
		//Nil
		if($nil_row!=0){
			$myYYY=$pdf->GetY();
			$myYYY=$myYYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myYYY);
			$myYYY=$myYYY+10;
			$pdf->Cell(15,15,'Nil');
			$pdf->Line(20,$myYYY,200,$myYYY);
			$pdf->SetFont('Arial','',10);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($score == 0 && $i<$nil_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myYYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($score == 0 && $i<$nil_row+$nil_row)  {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($myYYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($myYYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}
		
		$count_cons=0;
		$count_sale=0;
		$count_proc=0;
		$count_wast=0;
		$count_cons_sale_proc=0;
		$count_cons_sale=0;
		$count_sale_proc=0;
	
		foreach ($data as $row){
			$persent_usage=$row['present_usage_id'];
			if($persent_usage == 1){
				$count_cons=$count_cons+1;
			}
			if($persent_usage == 2){
				$count_sale=$count_sale+1;
			}
			if($persent_usage == 3){
				$count_proc=$count_proc+1;
			}
			if($persent_usage == 4){
				$count_wast=$count_wast+1;
			}
			if($persent_usage == 5){
				$count_cons_sale_proc=$count_cons_sale_proc+1;
			}
			if($persent_usage == 6){
				$count_cons_sale=$count_cons_sale+1;
			}
			if($persent_usage == 7){
				$count_sale_proc=$count_sale_proc+1;
			}
		}
		$cons_row=ceil($count_cons/3);
		$sale_row=ceil($count_sale/3);
		$proc_row=ceil($count_proc/3);
		$wast_row=ceil($count_wast/3);
		$cons_sale_proc_row=ceil($count_cons_sale_proc/3);
		$cons_sale_row=ceil($count_cons_sale/3);
		$sale_proc_row=ceil($count_sale_proc/3);

		//new page
		if($cons_row!=0 || $sale_row!=0 || $proc_row!=0 || $cons_sale_row!=0){
			$pdf->SetLeftMargin(70);
			$pdf->AddPage();
			$pdf->SetLeftMargin(90);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
			foreach ($data_dm_rm as $row_dm_rm){
				$dist_name=$row_dm_rm['dist_name'];
				$rm_name=$row_dm_rm['rm_name'];
				$pdf->SetLeftMargin(70);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',12);
				$pdf->Cell(35,10,'Report: Usages for '.$rm_name.' in '.$dist_name);
			}
			$pdf->SetLeftMargin(20);
			$pdf->SetTextColor(0,0,0);
		}
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		//Consumption
		if($cons_row!=0){
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(25);
			$pdf->Cell(15,15,'Consumption');
			$pdf->Line(20,35,200,35);
			$pdf->SetFont('Arial','',10);
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
	
				if($persent_usage==1 && $i<$cons_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY(35+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesY=$pdf->GetY();
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY(35+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5,$i.'.'. $block,0);
				
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row+$cons_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+5;
					$pdf->SetY(35+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}
			
		//Sales
		if($sale_row!=0){
			$usagesY=$pdf->GetY();
			$usagesY=$usagesY+10+5;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY);
			$usagesY=$usagesY+10;
			$pdf->Cell(15,15,'Sales ');
			$pdf->Line(20,$usagesY,200,$usagesY);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==2 && $i<$sale_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesYY=$pdf->GetY();
				}
				else if($persent_usage==2 && $i<$sale_row+$sale_row) {
				
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+5;
					$pdf->SetY($usagesY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				
				}
					
				else if($persent_usage==2 && $i<$sale_row+$sale_row+$sale_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+5;
					$pdf->SetY($usagesY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}
		//processing
		if($proc_row!=0){
			$usagesYY=$pdf->GetY();
			$usagesYY=$usagesYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesYY);
			$usagesYY=$usagesYY+10;
			$pdf->Cell(15,15,'Processing');
			$pdf->Line(20,$usagesYY,200,$usagesYY);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==3 && $i<$proc_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesYYY=$pdf->GetY();
			
				}
					
				else if($persent_usage==3 && $i<$proc_row+$proc_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
			
						
				}
				else if($persent_usage==3 && $i<$proc_row+$proc_row+$proc_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}
		
		//Consumption and Sale
		if($cons_sale_row!=0){
			$usagesYYY=$pdf->GetY();
			$usagesYYY=$usagesYYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesYYY);
			$usagesYYY=$usagesYYY+10;
			$pdf->Cell(15,15,'Consumption and Sale');
			$pdf->Line(20,$usagesYYY,200,$usagesYYY);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==6 && $i<$cons_sale_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesYYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesYYYY=$pdf->GetY();
				}
			
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesYYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row+$cons_sale_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesYYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);		
				}
			}
		}
		
		//new page
		if($sale_proc_row!=0 || $cons_sale_proc_row!=0 || $wast_row!=0){
			$pdf->SetLeftMargin(70);
			$pdf->AddPage();
			$pdf->SetLeftMargin(90);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(20,10,'Usages','C');
			foreach ($data_dm_rm as $row_dm_rm){
					
				$dist_name=$row_dm_rm['dist_name'];
				$rm_name=$row_dm_rm['rm_name'];
					
				$pdf->SetLeftMargin(110);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'District: '.$dist_name.' / Item: '.$rm_name,'');
			}
			$pdf->SetLeftMargin(20);
			$pdf->SetTextColor(0,0,0);
		}

		
		//Sale and Processing
		if($sale_proc_row!=0){
			$usagesYYYY=$pdf->GetY();
			$usagesYYYY=$usagesYYYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesYYYY);
			$usagesYYYY=$usagesYYYY+10;
			$pdf->Cell(15,15,'Sale and Processing');
			$pdf->Line(20,$usagesYYYY,200,$usagesYYYY);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==7 && $i<$sale_proc_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesYYYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesY5=$pdf->GetY();
				}
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesYYYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row+$sale_proc_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesYYYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
			}
		}
		
		//Consumption, Sale and Processing
		if($cons_sale_proc_row!=0){
			$usagesY5=$pdf->GetY();
			$usagesY5=$usagesY5+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY5);
			$usagesY5=$usagesY5+10;
			$pdf->Cell(15,15,'Consumption, Sale and Processing ');
			$pdf->Line(20,$usagesY5,200,$usagesY5);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==5 && $i<$cons_sale_proc_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesY5+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
					$usagesY6=$pdf->GetY();
				}
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row) {
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+5;
					$pdf->SetY($usagesY5+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);		
				}
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row+$cons_sale_proc_row) {
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+5;
					$pdf->SetY($usagesY5+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);	
				}
			}
		}
		//Underutilized/ Wasted
		if($wast_row!=0){
			$usagesY6=$pdf->GetY();
			$usagesY6=$usagesY6+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY6);
			$usagesY6=$usagesY6+10;
			$pdf->Cell(15,15,'Underutilized/Wasted');
			$pdf->Line(20,$usagesY6,200,$usagesY6);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
			
				if($persent_usage==4 && $i<$wast_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesY6+$x);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($persent_usage==4 && $i<$wast_row+$wast_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesY6+$y);
					$pdf->Cell(50,5, $i.'.'.$block,0);
				}
				else if($persent_usage==4 && $i<$wast_row+$wast_row+$wast_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesY6+$z);
					$pdf->Cell(50,5, $i.'.'.$block,0);		
				}
			}
		}
		$pdf->SetLeftMargin(70);
		$pdf->Output();

	}
	//all district
	public function raw_materialall($filter){
	
		$filter = explode(",", $filter);
		$dist_id=$filter[0];
		$rm_items_id= $filter[1];
		$data =$this->model->get_raw_material_data_for_pdf($dist_id,$rm_items_id);
		$data_rm =$this->model->get_rm_for_allpdf($rm_items_id);
		
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetLeftMargin(90);
		$pdf->SetY(20);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(25,10,'Viability','C');
		foreach ($data_rm as $row_rm){				
			$dist_name='Assam';
			$rm_name=$row_rm['rm_name'];
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(35,10,'Report: Viability for '.$rm_name.' in '.$dist_name);
		}
		$count_max=0;
		$count_med=0;
		$count_min=0;
		$count_nil=0;
		foreach ($data as $row){
			$score=$row['rm_score'];
			if($score >= 112){
				$count_max=$count_max+1;
			}
			if($score  >= 85 && $score <112){
				$count_med=$count_med+1;
			}
			if($score > 0 && $score < 85){
				$count_min=$count_min+1;
			}
			if($score== 0){
				$count_nil=$count_nil+1;
			}
		}
		$max_row=ceil($count_max/3);
		$med_row=ceil($count_med/3);
		$min_row=ceil($count_min/3);
		$nil_row=ceil($count_nil/3);
		//high
		if($max_row!=0){
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(25);
			$pdf->Cell(15,15,'High');
			$pdf->Line(20,35,200,35);
			$pdf->SetFont('Arial','',9);
		
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
				if($score >= 112 && $i<$max_row){
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY(35+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$myY=$pdf->GetY();
				}
				else if($score >= 112 && $i<$max_row+$max_row){
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetY(35+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
				}
				else if($score >= 112 && $i<$max_row+$max_row+$max_row){
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetY(35+$z);
					$pdf->SetLeftMargin(140);
					$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
				}
			}
		}
		//Moderate 
		if($med_row!=0){
			$pdf->SetLeftMargin(70);
			if($count_max+$count_med > 180){
				$pdf->AddPage();			
			}
			$myY=$pdf->GetY();
			$myY=$myY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myY);
			$myY=$myY+10;
			$pdf->Cell(15,15,'Moderate');
			$pdf->Line(20,$myY,200,$myY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
				if(($score  >= 85 && $score <112) && $i<$med_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($myY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$myYY=$pdf->GetY();
				}
				else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row) {
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+3.3;
					$pdf->SetY($myY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
				else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row+$med_row) {
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+3.3;
					$pdf->SetY($myY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
		//Low
		if($min_row!=0){
				$pdf->SetLeftMargin(70);
				if(($count_max+$count_med+$count_min) > 100){
				$pdf->AddPage();
			}
			$myYY=$pdf->GetY();
			$myYY=$myYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myYY);
			$myYY=$myYY+10;
			$pdf->Cell(15,15,'Low');
			$pdf->Line(20,$myYY,200,$myYY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
				if(($score  >0 && $score <85) && $i<$min_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($myYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$myYYY=$pdf->GetY();
				}
				else if(($score  > 0 && $score < 85) && $i<$min_row+$min_row) {
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($myYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
				else if(($score  > 0 && $score < 85) && $i<$min_row+$min_row+$min_row) {
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($myYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}	
	
		//Nil
		if($nil_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_min+$count_nil > 180){
				$pdf->AddPage();
			}
			$myYYY=$pdf->GetY();
			$myYYY=$myYYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($myYYY);
			$myYYY=$myYYY+10;
			$pdf->Cell(15,15,'Nil');
			$pdf->Line(20,$myYYY,200,$myYYY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$score=$row['rm_score'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
				if($score == 0 && $i<$nil_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($myYYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
				else if($score == 0 && $i<$nil_row+$nil_row)  {
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($myYYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
				else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($myYYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
		
		$count_cons=0;
		$count_sale=0;
		$count_proc=0;
		$count_wast=0;
		$count_cons_sale_proc=0;
		$count_cons_sale=0;
		$count_sale_proc=0;

		foreach ($data as $row){
			$persent_usage=$row['present_usage_id'];
			if($persent_usage == 1){
				$count_cons=$count_cons+1;
			}
			if($persent_usage == 2){
				$count_sale=$count_sale+1;
			}
			if($persent_usage == 3){
				$count_proc=$count_proc+1;
			}
			if($persent_usage == 4){
				$count_wast=$count_wast+1;
			}
			if($persent_usage == 5){
				$count_cons_sale_proc=$count_cons_sale_proc+1;
			}
			if($persent_usage == 6){
				$count_cons_sale=$count_cons_sale+1;
			}
			if($persent_usage == 7){
				$count_sale_proc=$count_sale_proc+1;
			}
		}
	
		$cons_row=ceil($count_cons/3);
		$sale_row=ceil($count_sale/3);
		$proc_row=ceil($count_proc/3);
		$wast_row=ceil($count_wast/3);
		$cons_sale_proc_row=ceil($count_cons_sale_proc/3);
		$cons_sale_row=ceil($count_cons_sale/3);
		$sale_proc_row=ceil($count_sale_proc/3);
	
		//new page
		$pdf->SetLeftMargin(70);
		$pdf->AddPage();
		$pdf->SetLeftMargin(90);
		$pdf->SetY(20);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(20,10,'Usages','C');
		$pdf->SetLeftMargin(20);
		$pdf->SetTextColor(0,0,0);
		
		foreach ($data_rm as $row_rm){
			$dist_name='Assam';
			$rm_name=$row_rm['rm_name'];
		
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(35,10,'Report: Usages for '.$rm_name.' in '.$dist_name);
		}
		$i=0;
		$x=0;
		$y=0;
		$z=0;
	
		//Consumption
		if($cons_row!=0){
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(25);
			$pdf->Cell(15,15,'Consumption');
			$pdf->Line(20,35,200,35);
			$pdf->SetFont('Arial','',9);
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==1 && $i<$cons_row){
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY(35+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$usagesY=$pdf->GetY();
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row){
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetY(35+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
						
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row+$cons_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+3.3;
					$pdf->SetY(35+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
			
		//Sales
		if($sale_row!=0){
			$pdf->SetLeftMargin(70);
			if($count_cons+$count_sale > 180){
			$pdf->AddPage();
			}
			$usagesY=$pdf->GetY();
			$usagesY=$usagesY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY);
			$usagesY=$usagesY+10;
			$pdf->Cell(15,15,'Sales ');
			$pdf->Line(20,$usagesY,200,$usagesY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==2 && $i<$sale_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($usagesY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$usagesYY=$pdf->GetY();
				}
				else if($persent_usage==2 && $i<$sale_row+$sale_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+3.3;
					$pdf->SetY($usagesY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);						
				}		
				else if($persent_usage==2 && $i<$sale_row+$sale_row+$sale_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+3.3;
					$pdf->SetY($usagesY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
	
		//processing
		if($proc_row!=0){
			$pdf->SetLeftMargin(70);
			if($count_cons+$count_sale > 150 && $count_proc < 60){
			$pdf->AddPage();
			}
			$usagesYY=$pdf->GetY();
			$usagesYY=$usagesYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesYY);
			$usagesYY=$usagesYY+10;
			$pdf->Cell(15,15,'Processing');
			$pdf->Line(20,$usagesYY,200,$usagesYY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==3 && $i<$proc_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($usagesYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$usagesYYY=$pdf->GetY();
				}
		
				else if($persent_usage==3 && $i<$proc_row+$proc_row){
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);	
				}
				
				else if($persent_usage==3 && $i<$proc_row+$proc_row+$proc_row) {
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
		//Consumption and Sale
		if($cons_sale_row!=0){
			$pdf->SetLeftMargin(70);
			if(($count_cons+$count_sale > 100) || $count_proc < 30 && $count_cons_sale < 60){
			$pdf->AddPage();
			}
			$usagesYYY=$pdf->GetY();
			$usagesYYY=$usagesYYY+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesYYY);
			$usagesYYY=$usagesYYY+10;
			$pdf->Cell(15,15,'Consumption and Sale');
			$pdf->Line(20,$usagesYYY,200,$usagesYYY);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==6 && $i<$cons_sale_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($usagesYYY+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
		
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row) {
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesYYY+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row+$cons_sale_row) {
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesYYY+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						
				}	
			}
		}
		//Sale and Processing
		if($sale_proc_row!=0){
			$pdf->SetLeftMargin(70);
			$pdf->AddPage();
			$usagesY5=$pdf->GetY();
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(20);
			$pdf->Cell(15,15,'Sale and Processing');
			$pdf->Line(20,30,200,30);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==7 && $i<$sale_proc_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY(30+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$usagesY5=$pdf->GetY();
		
				}
		
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row) {
					$i=$i+1;
					$y=$y+3.3;
					$pdf->SetLeftMargin(80);
					$pdf->SetY(30+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
		
				}
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row+$sale_proc_row) {
					$i=$i+1;
					$z=$z+3.3;
					$pdf->SetLeftMargin(140);
					$pdf->SetY(30+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
		//Consumption, Sale and Processing
		if($cons_sale_proc_row!=0){
			$pdf->SetLeftMargin(70);
			if($count_cons_sale_proc > 60){
			$pdf->AddPage();
			}
			$usagesY5=$pdf->GetY();
			$usagesY5=$usagesY5+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY5);
			$usagesY5=$usagesY5+10;
			$pdf->Cell(15,15,'Consumption, Sale and Processing ');
			$pdf->Line(20,$usagesY5,200,$usagesY5);
			$pdf->SetFont('Arial','',9);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==5 && $i<$cons_sale_proc_row) {
					$i=$i+1;
					$x=$x+3.3;
					$pdf->SetY($usagesY5+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					$usagesY6=$pdf->GetY();
		
				}
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(80);
					$y=$y+3.3;
					$pdf->SetY($usagesY5+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
		
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row+$cons_sale_proc_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(140);
					$z=$z+3.3;
					$pdf->SetY($usagesY5+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}
		//Underutilized/ Wasted
		if($wast_row!=0){
			$pdf->SetLeftMargin(70);
			if($count_wast > 50){
			$pdf->AddPage();
			}
			$usagesY6=$pdf->GetY();
			$usagesY6=$usagesY6+10;
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($usagesY6);
			$usagesY6=$usagesY6+10;
			$pdf->Cell(15,15,'Underutilized/Wasted');
			$pdf->Line(20,$usagesY6,200,$usagesY6);
			$pdf->SetFont('Arial','',10);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				$block=$row['block_name'];
				$dist=$row['district_name'];
		
				if($persent_usage==4 && $i<$wast_row) {
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($usagesY6+$x);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
		
				else if($persent_usage==4 && $i<$wast_row+$wast_row) {
					$i=$i+1;
					$y=$y+5;
					$pdf->SetLeftMargin(80);
					$pdf->SetY($usagesY6+$y);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);		
				}
				else if($persent_usage==4 && $i<$wast_row+$wast_row+$wast_row) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetLeftMargin(140);
					$pdf->SetY($usagesY6+$z);
					$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
				}
			}
		}$pdf->SetLeftMargin(70);
		$pdf->Output();
	
	}
	
	
	public function block_profile_pdf($id){
		$data =$this->model->get_block_profile_info_data_for_pdf($id);
		//print_r($data);
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetLeftMargin(20);
		$pdf->SetY(35);
		$pdf->SetFont('Arial','BU',12);
		$pdf->Cell(30,10,'General Information');

		foreach ($data as $row){
			$pdf->SetFont('Arial','B',15);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(25);
			$pdf->Cell(15,15,'Block Profile of : '.$row['block_name']);
			
			$pdf->SetFont('Arial','',9);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(40);
			$pdf->Cell(15,20,'Block id: '.$row['id']);
			
	
			$pdf->SetLeftMargin(20);
			$pdf->SetY(45);
			$pdf->Cell(15,20,'Subdivision: '.$row['subdivision']);
			
	
			$pdf->SetLeftMargin(20);
			$pdf->SetY(50);
			$pdf->Cell(15,20,'District: '.$row['dist_name']);

	
			$pdf->SetLeftMargin(20);
			$pdf->SetY(55);
			$pdf->Cell(15,20,'Distance from District HQ (km): '.$row['distance_hq']);
			

			$pdf->SetLeftMargin(20);
			$pdf->SetY(60);
			$pdf->Cell(15,20,'Topography: '.$row['tdef_topography_name']);
			

			$pdf->SetLeftMargin(20);
			$pdf->SetY(65);
			$pdf->Cell(15,20,'River:'.'');
			
	
			$pdf->SetLeftMargin(20);
			$pdf->SetY(70);
			$pdf->Cell(15,20,'Forest: '.'');
			
		
			$pdf->SetLeftMargin(20);
			$pdf->SetY(75);
			$pdf->Cell(15,20,'Population: '.$row['pop_total']);	
		}
		
		$pdf->SetFont('Arial','BU',12);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(90);
		$pdf->Cell(30,10,'General Infrastructure');
		$data_infra =$this->model->get_block_profile_infra_data_for_pdf($id);
		//print_r($data_infra);
		$i=0;
		foreach ($data_infra as $row_infra){
			
			if($row_infra['availability']==1){
				$row_infra['availability']=':  Available';
			}
			if($row_infra['availability']==2){
				$row_infra['availability']=':  Unavailable';
			}
			//echo $row_infra['name'].$row_infra['availability'];
			$pdf->SetFont('Arial','',9);
			$pdf->SetLeftMargin(20);
			$pdf->SetY(95+$i);
			$pdf->Cell(15,20,$row_infra['name'].$row_infra['availability']);
			$i=$i+5;
		}
		
		$gpY=$pdf->GetY();
		$gpY=$gpY+20;
		$pdf->SetY($gpY);
		$pdf->SetFont('Arial','BU',12);
		$pdf->SetLeftMargin(20);
		$pdf->Cell(30,10,'Growth Possibilities');
		$data_gp =$this->model->get_block_profile_growth_poss_data_for_pdf($id);
		//print_r($data_gp);
		$i=10;
		foreach ($data_gp as $row_gp){
			
			$pdf->SetFont('Arial','',9);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($gpY+$i);
			$pdf->SetFont('Arial','UI',10);
			$pdf->MultiCell(150,4,'A. Suggested Enterprises : ');
			$pdf->SetY($gpY+$i+5);
			$pdf->SetFont('Arial','',9);
			$pdf->MultiCell(150,4,$row_gp['possible_sectors']);
			$i=$i+5;
			
			
			$pdf->SetLeftMargin(20);
			$pdf->SetY($gpY+$i);
			$pdf->SetFont('Arial','UI',10);
			$pdf->Cell(15,20,'B. Major Impediments in the growth of enterprises: ');
			$pdf->SetY($gpY+$i+5);
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(15,20,$row_gp['impediments_order']);
			$i=$i+10;
			
			$pdf->SetFont('Arial','B',9);
			$pdf->SetLeftMargin(20);
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'Note:');
			$pdf->SetFont('Arial','',8);
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'1 - Lack of awareness');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'2 - Lack of Finance');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'3 - Shortage of raw materials');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'4 - Poor government support');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'5 - Lack of entrepreneurship');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'6 - Insufficient marketing outlets and facilities');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'7 - Poor communication facilities');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'8 - Lack of infrastructure');
			
			$i=$i+3;
			$pdf->SetY($gpY+$i);
			$pdf->Cell(15,20,'9 - Other reasons');
			
			
		}
		
		$pdf->SetLeftMargin(80);
		$data_raw =$this->model->get_block_profile_raw_data_for_pdf($id);
		//print_r($data_raw);
		
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',15);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(30);
		$pdf->SetFont('Arial','U',12);
		$pdf->Cell(30,10,'Raw Materials:(Report for Viability)');
		$pdf->SetFont('Arial','',8);
		$pdf->SetLeftMargin(20);
		
		$count_max=0;
		$count_med=0;
		$count_min=0;
		$count_nil=0;
		
		
		foreach ($data_raw as $row_raw){
			
			if($row_raw['score'] >= 112){
				$count_max=$count_max+1;
			}
			if($row_raw['score']  >= 85 && $row_raw['score'] <112){
				$count_med=$count_med+1;
			}
			if($row_raw['score'] > 0 && $row_raw['score'] < 85){
				$count_min=$count_min+1;
			}
			if($row_raw['score']== 0){
				$count_nil=$count_nil+1;
			}
		}
		
		$max_row=ceil($count_max/3);
		$med_row=ceil($count_med/3);
		$min_row=ceil($count_min/3);
		$nil_row=ceil($count_nil/3);
		
		$pdf->SetTextColor(0,0,0);
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		if($count_max != 0){
		$pdf->SetFont('Arial','B',10);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(45);
		$pdf->Cell(15,15,'High');
		$pdf->Line(20,55,200,55);
		$pdf->SetFont('Arial','',8);
		
		foreach ($data_raw as $row_raw){
			$score=$row_raw['score'];
			$item=$row_raw['name'];
			
		
			if($score >= 112 && $i<$max_row){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY(55+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myY=$pdf->GetY();
		
		
			}
			else if($score >= 112 && $i<$max_row+$max_row){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY(55+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
		
			}
				
			else if($score >= 112 && $i<$max_row+$max_row+$max_row){
				$i=$i+1;
				$z=$z+5;
				$pdf->SetY(55+$z);
				$pdf->SetLeftMargin(150);
				$pdf->Cell(50,5,$i.'.'. $item,0);
			}
		}
	}
		
	if($count_med != 0){
		$pdf->SetLeftMargin(20);
		$myY=$pdf->GetY();
		$myY=$myY+10;
		$pdf->SetY($myY);
		$myY=$myY+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Moderate');
		$pdf->Line(20,$myY,200,$myY);
		$pdf->SetFont('Arial','',8);
		$i=0;
		$x=0;
		$y=0;
		$z=0;

		foreach ($data_raw as $row_raw){
			$score=$row_raw['score'];
			$item=$row_raw['name'];
				
		
			if(($score  >= 85 && $score <112) && $i<$med_row){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY($myY+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myYY=$pdf->GetY();
			}
			else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY($myY+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
		
			}
		
			else if(($score  >= 85 && $score <112) && $i<$med_row+$med_row+$med_row){
				$i=$i+1;
				$z=$z+5;
				$pdf->SetY($myY+$z);
				$pdf->SetLeftMargin(150);
				$pdf->Cell(50,5,$i.'.'. $item,0);
			}
			
		}
	}
		
	if($count_min =! 0){
		$pdf->SetLeftMargin(20);
		$myYY=$pdf->GetY();
		$myYY=$myYY+10;
		$pdf->SetY($myYY);
		$myYY=$myYY+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Low');
		$pdf->Line(20,$myYY,200,$myYY);
		$pdf->SetFont('Arial','',8);
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		foreach ($data_raw as $row_raw){
			$score=$row_raw['score'];
			$item=$row_raw['name'];
		
		
			if(($score  > 0 && $score <85) && $i<$min_row){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY($myYY+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myY=$pdf->GetY();
		
		
			}
			else if(($score  > 0 && $score <85) && $i<$min_row+$min_row){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY($myYY+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
		
			}
		
			else if(($score  > 0 && $score <85) && $i<$min_row+$min_row+$min_row){
				$i=$i+1;
				$z=$z+5;
				$pdf->SetY($myYY+$z);
				$pdf->SetLeftMargin(150);
				$pdf->Cell(50,5,$i.'.'. $item,0);
			}
				
		}
	}	
	//$pdf->SetLeftMargin(60);
		
	$count_cons=0;
	$count_sale=0;
	$count_proc=0;
	$count_wast=0;
	$count_cons_sale_proc=0;
	$count_cons_sale=0;
	$count_sale_proc=0;
		foreach ($data_raw as $row_raw){
			$persent_usage=$row_raw['present_usage'];
			if($persent_usage == 1){
				$count_cons=$count_cons+1;
			}
			if($persent_usage == 2){
				$count_sale=$count_sale+1;
			}
			if($persent_usage == 3){
				$count_proc=$count_proc+1;
			}
			if($persent_usage == 4){
				$count_wast=$count_wast+1;
			}
			if($persent_usage == 5){
				$count_cons_sale_proc=$count_cons_sale_proc+1;
			}
			if($persent_usage == 6){
				$count_cons_sale=$count_cons_sale+1;
			}
			if($persent_usage == 7){
				$count_sale_proc=$count_sale_proc+1;
			}
		
		}
		
		$cons_row=ceil($count_cons/3);
		$sale_row=ceil($count_sale/3);
		$proc_row=ceil($count_proc/3);
		$wast_row=ceil($count_wast/3);
		$cons_sale_proc_row=ceil($count_cons_sale_proc/3);
		$cons_sale_row=ceil($count_cons_sale/3);
		$sale_proc_row=ceil($count_sale_proc/3);
		
		$pdf->SetLeftMargin(80);
		$pdf->AddPage();
		$pdf->SetFont('Arial','U',12);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(30);
		$pdf->Cell(30,10,'Raw Materials:(Report for Usages)');
		$pdf->SetFont('Arial','B',12);
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		if($cons_row!=0){
		$pdf->SetFont('Arial','B',10);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(45);
		$pdf->Cell(15,15,'Consumption Only');
		$pdf->Line(20,55,200,55);
		$pdf->SetFont('Arial','',8);
		
		
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
				
			
				if($persent_usage==1 && $i<$cons_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY(55+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_con_rm_u=$pdf->GetY();
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY(55+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==1 && $i<$cons_row+$cons_row+$cons_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY(55+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);	
				}
			}
		}
		
		if($count_sale != 0){
		$pdf->SetLeftMargin(20);
		$myY_con_rm_u=$pdf->GetY();
		$myY_con_rm_u=$myY_con_rm_u+10;
		$pdf->SetY($myY_con_rm_u);
		$myY_con_rm_u=$myY_con_rm_u+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Sales Only');
		$pdf->Line(20,$myY_con_rm_u,200,$myY_con_rm_u);
		$pdf->SetFont('Arial','',8);
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
				
				if($persent_usage == 2 && $i<$sale_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_con_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_sale_rm_u=$pdf->GetY();
				}
				else if($persent_usage==2 && $i<$sale_row+$sale_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_con_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==2 && $i<$sale_row+$sale_row+$sale_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_con_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
		}
		if($count_proc != 0){
		$pdf->SetLeftMargin(60);
		$pdf->SetLeftMargin(20);
		$myY_sale_rm_u=$pdf->GetY();
		$myY_sale_rm_u=$myY_sale_rm_u+10;
		$pdf->SetY($myY_sale_rm_u);
		$myY_sale_rm_u=$myY_sale_rm_u+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Processing only');
		$pdf->Line(20,$myY_sale_rm_u,200,$myY_sale_rm_u);
		$pdf->SetFont('Arial','',8);
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
			
			
				if($persent_usage==3 && $i<$proc_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_sale_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_pro_rm_u=$pdf->GetY();
				}
				else if($persent_usage==3 && $i<$proc_row+$proc_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_sale_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==3 && $i<$proc_row+$proc_row+$proc_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_sale_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
		}
		
		
		if($count_cons_sale_proc != 0){
			$pdf->SetLeftMargin(20);
			$myY_pro_rm_u=$pdf->GetY();
			$myY_pro_rm_u=$myY_pro_rm_u+10;
			$pdf->SetY($myY_pro_rm_u);
			$myY_pro_rm_u=$myY_pro_rm_u+10;
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,15,'Consumption, Sales and Processing');
			$pdf->Line(20,$myY_pro_rm_u,200,$myY_pro_rm_u);
			$pdf->SetFont('Arial','',8);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
	
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
			
			
				if($persent_usage==5 && $i<$cons_sale_proc_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_pro_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_CSP_rm_u=$pdf->GetY();
				}
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_pro_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==5 && $i<$cons_sale_proc_row+$cons_sale_proc_row+$cons_sale_proc_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_pro_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
		}
		
		if($count_cons_sale!=0){
			$pdf->SetLeftMargin(20);
			$myY_CSP_rm_u=$pdf->GetY();
			$myY_CSP_rm_u=$myY_CSP_rm_u+10;
			$pdf->SetY($myY_CSP_rm_u);
			$myY_CSP_rm_u=$myY_CSP_rm_u+10;
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,15,'Consumption and Sales');
			$pdf->Line(20,$myY_CSP_rm_u,200,$myY_CSP_rm_u);
			$pdf->SetFont('Arial','',8);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
	
			
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
			
			
				if($persent_usage==6 && $i<$cons_sale_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_CSP_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_SP_rm_u=$pdf->GetY();
				}
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_CSP_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==6 && $i<$cons_sale_row+$cons_sale_row+$cons_sale_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_CSP_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
		}
		
		if($sale_proc_row!=0){
			$pdf->SetLeftMargin(20);
			$myY_SP_rm_u=$pdf->GetY();
			$myY_SP_rm_u=$myY_SP_rm_u+10;
			$pdf->SetY($myY_SP_rm_u);
			$myY_SP_rm_u=$myY_SP_rm_u+10;
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,15,'Sales and Processing');
			$pdf->Line(20,$myY_SP_rm_u,200,$myY_SP_rm_u);
			$pdf->SetFont('Arial','',8);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
	
			
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
			
			
				if($persent_usage==7 && $i<$sale_proc_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_SP_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$myY_W_rm_u=$pdf->GetY();
				}
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_SP_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==7 && $i<$sale_proc_row+$sale_proc_row+$sale_proc_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_SP_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
		}
		
		if($count_wast!=0){
			$pdf->SetLeftMargin(20);
			$myY_W_rm_u=$pdf->GetY();
			$myY_W_rm_u=$myY_W_rm_u+10;
			$pdf->SetY($myY_W_rm_u);
			$myY_W_rm_u=$myY_W_rm_u+10;
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,15,'Wasted');
			$pdf->Line(20,$myY_W_rm_u,200,$myY_W_rm_u);
			$pdf->SetFont('Arial','',8);
			
			$i=0;
			$x=0;
			$y=0;
			$z=0;
	
			
			foreach ($data_raw as $row_raw){
				$persent_usage=$row_raw['present_usage'];
				$item=$row_raw['name'];
			
			
				if($persent_usage==4 && $i<$wast_row){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($myY_W_rm_u+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					
				}
				else if($persent_usage==4 && $i<$wast_row+$wast_row){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($myY_W_rm_u+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5,$i.'.'. $item,0);
						
				}
				else if($persent_usage==4 && $i<$wast_row+$wast_row+$wast_row) {
						
					$i=$i+1;
					$pdf->SetLeftMargin(150);
					$z=$z+5;
					$pdf->SetY($myY_W_rm_u+$z);
					$pdf->Cell(50,5, $i.'.'.$item,0);
				}
			}
			$pdf->SetLeftMargin(60);
		}
		//hr
		
		$data_hr =$this->model->get_block_profile_hr_data_for_pdf($id);
		//print_r($data_hr);
		

		
		$count_max_hr=0;
		$count_med_hr=0;
		$count_min_hr=0;
		$count_nil_hr=0;
		
		
		foreach ($data_hr as $row_hr){
			$score_hr=$row_hr['score'];
			
			if($score_hr >= 88){
				$count_max_hr=$count_max_hr+1;
			}
			if($score_hr  >= 72 && $score_hr < 88){
				$count_med_hr=$count_med_hr+1;
			}
			if($score_hr > 0 && $score_hr < 72){
				$count_min_hr=$count_min_hr+1;
			}

		}
		
		$max_row_hr=ceil($count_max_hr/3);
		$med_row_hr=ceil($count_med_hr/3);
		$min_row_hr=ceil($count_min_hr/3);
	

		if($count_max_hr!=0){
				$pdf->SetLeftMargin(80);
				$pdf->AddPage();
				$pdf->SetFont('Arial','U',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(30);
				$pdf->Cell(30,10,'Human Resources: Potentiality Report ');
				$pdf->SetFont('Arial','B',12);
				$pdf->SetY(40);
				$pdf->Cell(15,15,'High');
				$pdf->Line(20,50,200,50);
				$pdf->SetFont('Arial','',8);
	
			$i=0;
			$x=0;
			$y=0;
			$z=0;
	
			foreach ($data_hr as $row_hr){
				$score_hr=$row_hr['score'];
				$item=$row_hr['name'];
	
				if($score_hr >= 88  && $i< $max_row_hr){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY(55+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$my_hr_Y_p_h=$pdf->GetY();
				}
				else if($score_hr >= 88  && $i<$max_row_hr+$max_row_hr){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY(55+$y);
					$pdf->SetLeftMargin(90);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					
						
				}
				else if($score_hr >= 88  && $i<$max_row_hr+$max_row_hr+$max_row_hr) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetY(55+$z);
					$pdf->SetLeftMargin(140);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					
				}
			}
		}
	
		$pdf->SetLeftMargin(20);
		$my_hr_Y_p_h=$pdf->GetY();
		$my_hr_Y_p_h=$my_hr_Y_p_h+10;
		$pdf->SetY($my_hr_Y_p_h);
		$my_hr_Y_p_h=$my_hr_Y_p_h+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Moderate');
		$pdf->Line(20,$my_hr_Y_p_h,200,$my_hr_Y_p_h);
		$pdf->SetFont('Arial','',8);
		

		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		foreach ($data_hr as $row_hr){
				$score_hr=$row_hr['score'];
				$item=$row_hr['name'];
			
					if(($score_hr  >= 72 && $score_hr <88 ) &&  $i< $med_row_hr ){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($my_hr_Y_p_h+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					$my_hr_Y_p_l=$pdf->GetY();
				}
				else if(($score_hr  >= 72 && $score_hr <88 ) &&  $i< $med_row_hr*2 ){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($my_hr_Y_p_h+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5, $i.'.'.$item,0);
			
						
				}
				else if(($score_hr  >= 72 && $score_hr <88 ) &&  $i< $med_row_hr*3 ) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetY($my_hr_Y_p_h+$z);
					$pdf->SetLeftMargin(140);
					$pdf->Cell(50,5, $i.'.'.$item,0);
			
				}
			}
			if($count_med_hr!=0){
			$pdf->SetLeftMargin(20);
			$my_hr_Y_p_l=$pdf->GetY();
			$my_hr_Y_p_l=$my_hr_Y_p_l+10;
			$pdf->SetY($my_hr_Y_p_l);
			$my_hr_Y_p_l=$my_hr_Y_p_l+10;
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,15,'Low');
			$pdf->Line(20,$my_hr_Y_p_l,200,$my_hr_Y_p_l);
			$pdf->SetFont('Arial','',8);
			
	
		
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			foreach ($data_hr as $row_hr){
				$score_hr=$row_hr['score'];
				$item=$row_hr['name'];
			
					if(($score_hr  > 0 && $score_hr <72 ) &&  $i< $min_row_hr ){
					$i=$i+1;
					$x=$x+5;
					$pdf->SetY($my_hr_Y_p_l+$x);
					$pdf->Cell(50,5, $i.'.'.$item,0);
					
				}
				else if(($score_hr  >0 && $score_hr <72 ) &&  $i< $min_row_hr*2 ){
					$i=$i+1;
					$y=$y+5;
					$pdf->SetY($my_hr_Y_p_l+$y);
					$pdf->SetLeftMargin(80);
					$pdf->Cell(50,5, $i.'.'.$item,0);
			
						
				}
				else if(($score_hr  >0 && $score_hr <72 ) &&  $i< $min_row_hr*3 ) {
					$i=$i+1;
					$z=$z+5;
					$pdf->SetY($my_hr_Y_p_l+$z);
					$pdf->SetLeftMargin(140);
					$pdf->Cell(50,5, $i.'.'.$item,0);
			
				}
			}
		}
		$pdf->SetLeftMargin(60);
		
		//hr usages
		$count_owncons=0;
		$count_com=0;
		$count_concom=0;
		$count_wast_hr=0;
		
		foreach ($data_hr as $row_hr){
			$persent_usage=$row_hr['present_usage'];
			if($persent_usage == 1){
				$count_owncons=$count_owncons+1;
			}
			if($persent_usage == 2){
				$count_com=$count_com+1;
			}
			if($persent_usage == 4){
				$count_concom=$count_concom+1;
			}
			if($persent_usage == 3){
				$count_wast_hr=$count_wast_hr+1;
			}
		}
		
		$cons_row_hr=ceil($count_owncons/3);
		$com_row_hr=ceil($count_com/3);
		$concom_row_hr=ceil($count_concom/3);
		$wast_row_hr=ceil($count_wast_hr/3);
		
		$pdf->SetLeftMargin(80);
		
		$pdf->AddPage();
		$pdf->SetFont('Arial','U',12);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(30);
		$pdf->Cell(30,10,'Human Resources: Usages Report');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetY(40);
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		if($count_owncons!=0){
		$pdf->SetFont('Arial','B',10);
		$pdf->SetLeftMargin(20);
		$pdf->SetY(45);
		$pdf->Cell(15,15,'Own Consumption');
		$pdf->Line(20,55,200,55);
		$pdf->SetFont('Arial','',8);

		foreach ($data_hr as $row_hr){
			$present_usage=$row_hr['present_usage'];
			$item=$row_hr['name'];
				
			if($present_usage==1 && $i<$cons_row_hr){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY(55+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myY_con_hr_u=$pdf->GetY();
			}
			else if($present_usage==1 && $i<$cons_row_hr+$cons_row_hr){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY(55+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
					
			}
			else if($present_usage==1 && $i<$cons_row_hr+$cons_row_hr+$cons_row_hr) {
					
				$i=$i+1;
				$pdf->SetLeftMargin(150);
				$z=$z+5;
				$pdf->SetY(55+$z);
				$pdf->Cell(50,5, $i.'.'.$item,0);
			}
		}
		}
		if($count_com!=0){
		$pdf->SetLeftMargin(20);
		$myY_con_hr_u=$pdf->GetY();
		$myY_con_hr_u=$myY_con_hr_u+10;
		$pdf->SetY($myY_con_hr_u);
		$myY_con_hr_u=$myY_con_hr_u+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Commercially');
		$pdf->Line(20,$myY_con_hr_u,200,$myY_con_hr_u);
		$pdf->SetFont('Arial','',8);


		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		foreach ($data_hr as $row_hr){
			$present_usage=$row_hr['present_usage'];
			$item=$row_hr['name'];
		
			if($present_usage==2 && $i<$cons_row_hr){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY($myY_con_hr_u+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myY_con_hr_u_com=$pdf->GetY();
			}
			else if($present_usage==2 && $i<$cons_row_hr+$cons_row_hr){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY($myY_con_hr_u+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
					
			}
			else if($present_usage==2 && $i<$cons_row_hr+$cons_row_hr+$cons_row_hr) {
					
				$i=$i+1;
				$pdf->SetLeftMargin(150);
				$z=$z+5;
				$pdf->SetY($myY_con_hr_u+$z);
				$pdf->Cell(50,5, $i.'.'.$item,0);
			}
		}
		}
		
		if($count_concom!=0){
		$pdf->SetLeftMargin(20);
		$myY_con_hr_u_com=$pdf->GetY();
		$myY_con_hr_u_com=$myY_con_hr_u_com+10;
		$pdf->SetY($myY_con_hr_u_com);
		$myY_con_hr_u_com=$myY_con_hr_u_com+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Own Consumption and Commercially');
		$pdf->Line(20,$myY_con_hr_u_com,200,$myY_con_hr_u_com);
		$pdf->SetFont('Arial','',8);
		
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		foreach ($data_hr as $row_hr){
			$present_usage=$row_hr['present_usage'];
			$item=$row_hr['name'];
		
			if($present_usage==4 && $i<$concom_row_hr){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY($myY_con_hr_u_com+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				$myY_con_hr_u_concom=$pdf->GetY();
			}
			else if($present_usage==4 && $i<$concom_row_hr+$concom_row_hr){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY($myY_con_hr_u_com+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
					
			}
			else if($present_usage==4 && $i<$concom_row_hr+$concom_row_hr+$concom_row_hr) {
					
				$i=$i+1;
				$pdf->SetLeftMargin(150);
				$z=$z+5;
				$pdf->SetY($myY_con_hr_u_com+$z);
				$pdf->Cell(50,5, $i.'.'.$item,0);
			}
		}
		}
		if($count_wast_hr!=0){
		$pdf->SetLeftMargin(20);
		$myY_con_hr_u_concom=$pdf->GetY();
		$myY_con_hr_u_concom=$myY_con_hr_u_concom+10;
		$pdf->SetY($myY_con_hr_u_concom);
		$myY_con_hr_u_concom=$myY_con_hr_u_concom+10;
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(15,15,'Unused/Wasted');
		$pdf->Line(20,$myY_con_hr_u_concom,200,$myY_con_hr_u_concom);
		$pdf->SetFont('Arial','',8);
		
		
		$i=0;
		$x=0;
		$y=0;
		$z=0;
		
		foreach ($data_hr as $row_hr){
			$present_usage=$row_hr['present_usage'];
			$item=$row_hr['name'];
		
			if($present_usage==3 && $i<$wast_row_hr){
				$i=$i+1;
				$x=$x+5;
				$pdf->SetY($myY_con_hr_u_concom+$x);
				$pdf->Cell(50,5, $i.'.'.$item,0);
				
			}
			else if($present_usage==3 && $i<$wast_row_hr+$wast_row_hr){
				$i=$i+1;
				$y=$y+5;
				$pdf->SetY($myY_con_hr_u_concom+$y);
				$pdf->SetLeftMargin(90);
				$pdf->Cell(50,5,$i.'.'. $item,0);
					
			}
			else if($present_usage==3 && $i<$wast_row_hr+$wast_row_hr+$wast_row_hr) {
					
				$i=$i+1;
				$pdf->SetLeftMargin(150);
				$z=$z+5;
				$pdf->SetY($myY_con_hr_u_concom+$z);
				$pdf->Cell(50,5, $i.'.'.$item,0);
			}
		}
		}
		$pdf->SetLeftMargin(80);
		$pdf->Output();
		}

	// human resource	
	
	public function human_resourceall($filter){
		$filter = explode(",", $filter);
		$dist_id=$filter[0];
		$hr_items_id= $filter[1];
		$data =$this->model->get_hr_data_for_pdf($dist_id,$hr_items_id);
		$data_dm_hr =$this->model->get_hr_for_allpdf($hr_items_id);
		//print_r($data);
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','U',12);
		$pdf->SetLeftMargin(70);
		$pdf->SetY(20);
		$pdf->SetFont('Arial','B',12);

			foreach ($data_dm_hr as $row_dm_hr){
				$dist_name='Assam';
				$hr_name=$row_dm_hr['hr_name'];
				
				$pdf->SetLeftMargin(60);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Potentiality for '.$hr_name.' in '.$dist_name);
			}
			
			$pdf->SetLeftMargin(20);
			
			$count_max=0;
			$count_med=0;
			$count_min=0;
			$count_nil=0;
			
			foreach ($data as $row){
				$score=$row['hr_score'];
				if($score >= 88){
					$count_max=$count_max+1;
				}
				if($score  >= 66 && $score < 88){
					$count_med=$count_med+1;
				}
				if($score > 0 && $score < 66){
					$count_min=$count_min+1;
				}
				if($score== 0){
					$count_nil=$count_nil+1;
				}
			}
			
			$max_row=ceil($count_max/3);
			$med_row=ceil($count_med/3);
			$min_row=ceil($count_min/3);
			$nil_row=ceil($count_nil/3);
			$pdf->SetTextColor(0,0,0);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			//High
			if($max_row!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'High');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score >= 88 && $i<$max_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myY=$pdf->GetY();
					}
					else if($score >= 88 && $i<$max_row+$max_row){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
					else if($score >= 88 && $i<$max_row+$max_row+$max_row){
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->SetLeftMargin(140);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
				}
			}
			//Moderate
			if($med_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_max+$count_med > 180){
					$pdf->AddPage();
				}
				$myY=$pdf->GetY();
				$myY=$myY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myY);
				$myY=$myY+10;
				$pdf->Cell(15,15,'Moderate');
				$pdf->Line(20,$myY,200,$myY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
				
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score >= 66 &&  $score < 88) && $i<$med_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYY=$pdf->GetY();
					}
					else if(($score >= 66 &&  $score < 88) && $i<$med_row*2){
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($myY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score >= 66 &&  $score < 88) && $i<$med_row*3){
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($myY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Low
			if($min_row!=0){
				$pdf->SetLeftMargin(70);
				if(($count_max+$count_med+$count_min) > 100){
					$pdf->AddPage();
				}
				$myYY=$pdf->GetY();
				$myYY=$myYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYY);
				$myYY=$myYY+10;
				$pdf->Cell(15,15,'Low');
				$pdf->Line(20,$myYY,200,$myYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score  >0 && $score <66) && $i<$min_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYYY=$pdf->GetY();
					}
					else if(($score  > 0 && $score < 66) && $i<$min_row+$min_row) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score  > 0 && $score < 66) && $i<$min_row+$min_row+$min_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			
			//Nil
			if($nil_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_min+$count_nil > 180){
					$pdf->AddPage();
				}
				$myYYY=$pdf->GetY();
				$myYYY=$myYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYYY);
				$myYYY=$myYYY+10;
				$pdf->Cell(15,15,'Nil');
				$pdf->Line(20,$myYYY,200,$myYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score == 0 && $i<$nil_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row)  {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//usages
			$count_1=0;
			$count_2=0;
			$count_3=0;
			$count_4=0;
						
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				if($persent_usage == 1){
					$count_1=$count_1+1;
				}
				if($persent_usage == 2){
					$count_2=$count_2+1;
				}
				if($persent_usage == 3){
					$count_3=$count_3+1;
				}
				if($persent_usage == 4){
					$count_4=$count_4+1;
				}
			
			}
			
			$row_1=ceil($count_1/3);
			$row_2=ceil($count_2/3);
			$row_3=ceil($count_3/3);
			$row_4=ceil($count_4/3);
			//new page
			$pdf->SetLeftMargin(70);
			$pdf->AddPage();
			$pdf->SetLeftMargin(90);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetTextColor(0,0,0);
			
				foreach ($data_dm_hr as $row_dm_hr){
				$dist_name='Assam';
				$hr_name=$row_dm_hr['hr_name'];
				$pdf->SetLeftMargin(60);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Usages for '.$hr_name.' in '.$dist_name);
			}
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			
			//Consumption
			if($count_1!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'Own Consumption');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
			
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
			
					if($persent_usage==1 && $i<$row_1){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesY=$pdf->GetY();
					}
					else if($persent_usage==1 && $i< $row_1*2){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
			
					}
					else if($persent_usage==1 && $i<$row_1*3) {
			
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
				
			//Commercially Used
			if($count_2!=0){
				$pdf->SetLeftMargin(70);
				if($count_1+$count_2 > 180){
					$pdf->AddPage();
				}
				$usagesY=$pdf->GetY();
				$usagesY=$usagesY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesY);
				$usagesY=$usagesY+10;
				$pdf->Cell(15,15,'Commercially Used ');
				$pdf->Line(20,$usagesY,200,$usagesY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
			
					if($persent_usage==2 && $i<$row_2) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesYY=$pdf->GetY();
					}
					else if($persent_usage==2 && $i<$row_2*2) {
			
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($usagesY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($persent_usage==2 && $i<$row_2*3) {
			
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($usagesY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			
			//processing
			if($count_4!=0){
				$pdf->SetLeftMargin(70);
				$pdf->AddPage();
				$usagesYY=$pdf->GetY();
				$usagesYY=$usagesYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesYY);
				$usagesYY=$usagesYY+10;
				$pdf->Cell(15,15,'Own Consumption and Commercially Used');
				$pdf->Line(20,$usagesYY,200,$usagesYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
			
					if($persent_usage==4 && $i<$row_4) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesYYY=$pdf->GetY();
					}
			
					else if($persent_usage==4 && $i<$row_4*2){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($usagesYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
			
					else if($persent_usage==4 && $i<$row_4*3) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($usagesYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Consumption and Sale
			if($count_3!=0){
				$pdf->SetLeftMargin(70);
				if( $count_3+$count_4 > 180){
					$pdf->AddPage();
				}
				$usagesYYY=$pdf->GetY();
				$usagesYYY=$usagesYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesYYY);
				$usagesYYY=$usagesYYY+10;
				$pdf->Cell(15,15,'Unused/Wasted');
				$pdf->Line(20,$usagesYYY,200,$usagesYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
			
					if($persent_usage==3 && $i<$row_3) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
			
					else if($persent_usage==3 && $i<$row_3*2) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($usagesYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($persent_usage==3 && $i<$row_3*3) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($usagesYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//end of pdf
			$pdf->SetLeftMargin(70);
			$pdf->Output();
		}
		
	public function human_resource($filter){
			$filter = explode(",", $filter);
			$dist_id=$filter[0];
			$hr_items_id= $filter[1];
			$data =$this->model->get_hr_data_for_pdf($dist_id,$hr_items_id);
			$data_dm_hr =$this->model->get_dm_hr_for_pdf($dist_id, $hr_items_id);
			//print_r($data_dm_hr);
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Arial','U',12);
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
		
			foreach ($data_dm_hr as $row_dm_hr){
				$dist_name=$row_dm_hr['dist_name'];
				$hr_name=$row_dm_hr['hr_name'];
		
				$pdf->SetLeftMargin(60);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Potentiality for '.$hr_name.' in '.$dist_name);
			}
				
			$pdf->SetLeftMargin(20);
				
			$count_max=0;
			$count_med=0;
			$count_min=0;
			$count_nil=0;
				
			foreach ($data as $row){
				$score=$row['hr_score'];
				if($score >= 88){
					$count_max=$count_max+1;
				}
				if($score  >= 66 && $score < 88){
					$count_med=$count_med+1;
				}
				if($score > 0 && $score < 66){
					$count_min=$count_min+1;
				}
				if($score== 0){
					$count_nil=$count_nil+1;
				}
			}
				
			$max_row=ceil($count_max/3);
			$med_row=ceil($count_med/3);
			$min_row=ceil($count_min/3);
			$nil_row=ceil($count_nil/3);
			$pdf->SetTextColor(0,0,0);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			//High
			if($max_row!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'High');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score >= 88 && $i<$max_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myY=$pdf->GetY();
					}
					else if($score >= 88 && $i<$max_row+$max_row){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
					else if($score >= 88 && $i<$max_row+$max_row+$max_row){
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->SetLeftMargin(140);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
				}
			}
			//Moderate
			if($med_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_max+$count_med > 180){
					$pdf->AddPage();
				}
				$myY=$pdf->GetY();
				$myY=$myY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myY);
				$myY=$myY+10;
				$pdf->Cell(15,15,'Moderate');
				$pdf->Line(20,$myY,200,$myY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
		
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score >= 66 &&  $score < 88) && $i<$med_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYY=$pdf->GetY();
					}
					else if(($score >= 66 &&  $score < 88) && $i<$med_row*2){
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($myY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score >= 66 &&  $score < 88) && $i<$med_row*3){
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($myY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Low
			if($min_row!=0){
				$pdf->SetLeftMargin(70);
				if(($count_max+$count_med+$count_min) > 100){
					$pdf->AddPage();
				}
				$myYY=$pdf->GetY();
				$myYY=$myYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYY);
				$myYY=$myYY+10;
				$pdf->Cell(15,15,'Low');
				$pdf->Line(20,$myYY,200,$myYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score  >0 && $score <66) && $i<$min_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYYY=$pdf->GetY();
					}
					else if(($score  > 0 && $score < 66) && $i<$min_row+$min_row) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score  > 0 && $score < 66) && $i<$min_row+$min_row+$min_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
				
			//Nil
			if($nil_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_min+$count_nil > 180){
					$pdf->AddPage();
				}
				$myYYY=$pdf->GetY();
				$myYYY=$myYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYYY);
				$myYYY=$myYYY+10;
				$pdf->Cell(15,15,'Nil');
				$pdf->Line(20,$myYYY,200,$myYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['hr_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score == 0 && $i<$nil_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row)  {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//usages
			$count_1=0;
			$count_2=0;
			$count_3=0;
			$count_4=0;
		
			foreach ($data as $row){
				$persent_usage=$row['present_usage_id'];
				if($persent_usage == 1){
					$count_1=$count_1+1;
				}
				if($persent_usage == 2){
					$count_2=$count_2+1;
				}
				if($persent_usage == 3){
					$count_3=$count_3+1;
				}
				if($persent_usage == 4){
					$count_4=$count_4+1;
				}
					
			}
				
			$row_1=ceil($count_1/3);
			$row_2=ceil($count_2/3);
			$row_3=ceil($count_3/3);
			$row_4=ceil($count_4/3);
			//new page
			$pdf->SetLeftMargin(70);
			$pdf->AddPage();
			$pdf->SetLeftMargin(90);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetLeftMargin(20);
			$pdf->SetTextColor(0,0,0);
				
			foreach ($data_dm_hr as $row_dm_hr){
				$dist_name=$row_dm_hr['dist_name'];
				$hr_name=$row_dm_hr['hr_name'];
				$pdf->SetLeftMargin(60);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Usages for '.$hr_name.' in '.$dist_name);
			}
			$i=0;
			$x=0;
			$y=0;
			$z=0;
				
			//Consumption
			if($count_1!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'Own Consumption');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
					
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
						
					if($persent_usage==1 && $i<$row_1){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesY=$pdf->GetY();
					}
					else if($persent_usage==1 && $i< $row_1*2){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
							
					}
					else if($persent_usage==1 && $i<$row_1*3) {
							
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
		
			//Commercially Used
			if($count_2!=0){
				$pdf->SetLeftMargin(70);
				if($count_1+$count_2 > 180){
					$pdf->AddPage();
				}
				$usagesY=$pdf->GetY();
				$usagesY=$usagesY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesY);
				$usagesY=$usagesY+10;
				$pdf->Cell(15,15,'Commercially Used ');
				$pdf->Line(20,$usagesY,200,$usagesY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
						
					if($persent_usage==2 && $i<$row_2) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesYY=$pdf->GetY();
					}
					else if($persent_usage==2 && $i<$row_2*2) {
							
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($usagesY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($persent_usage==2 && $i<$row_2*3) {
							
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($usagesY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
				
			//processing
			if($count_4!=0){
				$pdf->SetLeftMargin(70);
				if($count_1+$count_2 > 150 && $count_4 < 60){
					$pdf->AddPage();
				}
				$usagesYY=$pdf->GetY();
				$usagesYY=$usagesYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesYY);
				$usagesYY=$usagesYY+10;
				$pdf->Cell(15,15,'Own Consumption and Commercially Used');
				$pdf->Line(20,$usagesYY,200,$usagesYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
						
					if($persent_usage==4 && $i<$row_4) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$usagesYYY=$pdf->GetY();
					}
						
					else if($persent_usage==4 && $i<$row_4*2){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($usagesYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
						
					else if($persent_usage==4 && $i<$row_4*3) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($usagesYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Consumption and Sale
			if($count_3!=0){
				$pdf->SetLeftMargin(70);
				if(($count_1+$count_2 > 100) || $count_3 > 30 && $count_4 > 50){
					$pdf->AddPage();
				}
				$usagesYYY=$pdf->GetY();
				$usagesYYY=$usagesYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($usagesYYY);
				$usagesYYY=$usagesYYY+10;
				$pdf->Cell(15,15,'Unused/Wasted');
				$pdf->Line(20,$usagesYYY,200,$usagesYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$persent_usage=$row['present_usage_id'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
						
					if($persent_usage==3 && $i<$row_3) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($usagesYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
						
					else if($persent_usage==3 && $i<$row_3*2) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($usagesYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($persent_usage==3 && $i<$row_3*3) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($usagesYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//end of pdf
			$pdf->SetLeftMargin(70);
			$pdf->Output();
		}
		
		//gen infra
		
	public function gen_infra($filter){
			$filter = explode(",", $filter);
			$dist_id=$filter[0];
			$infra_items_id= $filter[1];
			$data =$this->model->get_gen_infra_data($dist_id,$infra_items_id);
			$data_dm_hr =$this->model->get_dm_gen_for_pdf($dist_id, $infra_items_id);
			//print_r($data_dm_hr);
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Arial','U',12);
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
			
			foreach ($data_dm_hr as $row_dm_hr){
				$dist_name=$row_dm_hr['dist_name'];
				$hr_name=$row_dm_hr['infra_name'];
			
				$pdf->SetLeftMargin(70);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Quality for '.$hr_name.' in '.$dist_name);
			}
			
			$pdf->SetLeftMargin(20);
			
			$count_max=0;
			$count_med=0;
			$count_min=0;
			$count_nil=0;
			
			foreach ($data as $row){
				$score=$row['binf_score'];
				if($score >= 70){
					$count_max=$count_max+1;
				}
				if($score  >= 60 && $score < 70){
					$count_med=$count_med+1;
				}
				if($score  <= 60 && $score > 0){
					$count_min=$count_min+1;
				}
				if($score == 0){
					$count_nil=$count_nil+1;
				}
			}
			
			$max_row=ceil($count_max/3);
			$med_row=ceil($count_med/3);
			$min_row=ceil($count_min/3);
			$nil_row=ceil($count_nil/3);
			$pdf->SetTextColor(0,0,0);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			//High
			if($max_row!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'High');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score >= 70 && $i<$max_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myY=$pdf->GetY();
					}
					else if($score >= 70 && $i<$max_row+$max_row){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
					else if($score >= 70 && $i<$max_row+$max_row+$max_row){
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->SetLeftMargin(140);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
				}
			}
			//Moderate
			if($med_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_max+$count_med > 180){
					$pdf->AddPage();
				}
				$myY=$pdf->GetY();
				$myY=$myY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myY);
				$myY=$myY+10;
				$pdf->Cell(15,15,'Moderate');
				$pdf->Line(20,$myY,200,$myY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
			
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score >= 60 &&  $score < 70) && $i<$med_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYY=$pdf->GetY();
					}
					else if(($score >= 60 &&  $score < 70) && $i<$med_row*2){
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($myY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score >= 60 &&  $score < 70) && $i<$med_row*3){
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($myY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Low
			if($min_row!=0){
				$pdf->SetLeftMargin(70);
				if(($count_max+$count_med+$count_min) > 100){
					$pdf->AddPage();
				}
				$myYY=$pdf->GetY();
				$myYY=$myYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYY);
				$myYY=$myYY+10;
				$pdf->Cell(15,15,'Low');
				$pdf->Line(20,$myYY,200,$myYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score  <= 60 && $score > 0) && $i<$min_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYYY=$pdf->GetY();
					}
					else if(($score  <= 60 && $score > 0) && $i<$min_row+$min_row) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score  <= 60 && $score > 0) && $i<$min_row+$min_row+$min_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			
			//Nil
			if($nil_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_min+$count_nil > 180){
					$pdf->AddPage();
				}
				$myYYY=$pdf->GetY();
				$myYYY=$myYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYYY);
				$myYYY=$myYYY+10;
				$pdf->Cell(15,15,'Nil');
				$pdf->Line(20,$myYYY,200,$myYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score == 0 && $i<$nil_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row)  {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			$pdf->SetLeftMargin(70);
			$pdf->Output();
		}
		
		public function gen_infra_all($filter){
			$filter = explode(",", $filter);
			$dist_id=$filter[0];
			$infra_items_id= $filter[1];
			$data =$this->model->get_gen_infra_data($dist_id,$infra_items_id);
			$data_dm_hr =$this->model->get_gen_for_allpdf($infra_items_id);
			//print_r($data_dm_hr);
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Arial','U',12);
			$pdf->SetLeftMargin(70);
			$pdf->SetY(20);
			$pdf->SetFont('Arial','B',12);
				
			foreach ($data_dm_hr as $row_dm_hr){
				$dist_name='Assam';
				$hr_name=$row_dm_hr['infra_name'];
					
				$pdf->SetLeftMargin(70);
				$pdf->SetY(20);
				$pdf->SetFont('Arial','U',10);
				$pdf->Cell(35,10,'Report: Quality for '.$hr_name.' in '.$dist_name);
			}
				
			$pdf->SetLeftMargin(20);
				
			$count_max=0;
			$count_med=0;
			$count_min=0;
			$count_nil=0;
				
			foreach ($data as $row){
				$score=$row['binf_score'];
				if($score >= 70){
					$count_max=$count_max+1;
				}
				if($score  >= 60 && $score < 70){
					$count_med=$count_med+1;
				}
				if($score  <= 60 && $score > 0){
					$count_min=$count_min+1;
				}
				if($score == 0){
					$count_nil=$count_nil+1;
				}
			}
				
			$max_row=ceil($count_max/3);
			$med_row=ceil($count_med/3);
			$min_row=ceil($count_min/3);
			$nil_row=ceil($count_nil/3);
			$pdf->SetTextColor(0,0,0);
			$i=0;
			$x=0;
			$y=0;
			$z=0;
			//High
			if($max_row!=0){
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY(25);
				$pdf->Cell(15,15,'High');
				$pdf->Line(20,35,200,35);
				$pdf->SetFont('Arial','',9);
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score >= 70 && $i<$max_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY(35+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myY=$pdf->GetY();
					}
					else if($score >= 70 && $i<$max_row+$max_row){
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetY(35+$y);
						$pdf->SetLeftMargin(80);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
					else if($score >= 70 && $i<$max_row+$max_row+$max_row){
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetY(35+$z);
						$pdf->SetLeftMargin(140);
						$pdf->Cell(50,5,$i.'.'. $block.'('.$dist.')',0);
					}
				}
			}
			//Moderate
			if($med_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_max+$count_med > 180){
					$pdf->AddPage();
				}
				$myY=$pdf->GetY();
				$myY=$myY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myY);
				$myY=$myY+10;
				$pdf->Cell(15,15,'Moderate');
				$pdf->Line(20,$myY,200,$myY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score >= 60 &&  $score < 70) && $i<$med_row){
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYY=$pdf->GetY();
					}
					else if(($score >= 60 &&  $score < 70) && $i<$med_row*2){
						$i=$i+1;
						$pdf->SetLeftMargin(80);
						$y=$y+3.3;
						$pdf->SetY($myY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score >= 60 &&  $score < 70) && $i<$med_row*3){
						$i=$i+1;
						$pdf->SetLeftMargin(140);
						$z=$z+3.3;
						$pdf->SetY($myY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			//Low
			if($min_row!=0){
				$pdf->SetLeftMargin(70);
				if(($count_max+$count_med+$count_min) > 100){
					$pdf->AddPage();
				}
				$myYY=$pdf->GetY();
				$myYY=$myYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYY);
				$myYY=$myYY+10;
				$pdf->Cell(15,15,'Low');
				$pdf->Line(20,$myYY,200,$myYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if(($score  <= 60 && $score > 0) && $i<$min_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
						$myYYY=$pdf->GetY();
					}
					else if(($score  <= 60 && $score > 0) && $i<$min_row+$min_row) {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if(($score  <= 60 && $score > 0) && $i<$min_row+$min_row+$min_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
				
			//Nil
			if($nil_row!=0){
				$pdf->SetLeftMargin(70);
				if($count_min+$count_nil > 180){
					$pdf->AddPage();
				}
				$myYYY=$pdf->GetY();
				$myYYY=$myYYY+10;
				$pdf->SetFont('Arial','B',12);
				$pdf->SetLeftMargin(20);
				$pdf->SetY($myYYY);
				$myYYY=$myYYY+10;
				$pdf->Cell(15,15,'Nil');
				$pdf->Line(20,$myYYY,200,$myYYY);
				$pdf->SetFont('Arial','',9);
				$i=0;
				$x=0;
				$y=0;
				$z=0;
					
				foreach ($data as $row){
					$score=$row['binf_score'];
					$block=$row['block_name'];
					$dist=$row['district_name'];
					if($score == 0 && $i<$nil_row) {
						$i=$i+1;
						$x=$x+3.3;
						$pdf->SetY($myYYY+$x);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row)  {
						$i=$i+1;
						$y=$y+3.3;
						$pdf->SetLeftMargin(80);
						$pdf->SetY($myYYY+$y);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
					else if($score == 0 && $i<$nil_row+$nil_row+$nil_row) {
						$i=$i+1;
						$z=$z+3.3;
						$pdf->SetLeftMargin(140);
						$pdf->SetY($myYYY+$z);
						$pdf->Cell(50,5, $i.'.'.$block.'('.$dist.')',0);
					}
				}
			}
			$pdf->SetLeftMargin(70);
			$pdf->Output();
		}
}
