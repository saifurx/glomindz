<style>
.col-md-3,
.col-md-4{
	margin-bottom: 10px;
}

.thumbnail > img {
	margin-top: 10px;
}
.criminalinfo{
 	margin-left: 10px; 
 	margin-right: 10px;
 	margin-top: 5px;
 } 
</style>
<div class="">
	<div class="subNav">
		<span class="subNavtext">CRIMINALS GALLERY</span>&nbsp;&nbsp;
		<div class=" pull-right img_pills">
			<button type="button" class="btnPill" id="rg1" onclick="show_gallery(1);">CAR LIFTER</button>
			<button type="button" class="btnPill" id="rg2" onclick="show_gallery(2);">2 WHEELER LIFTER</button>
			<button type="button" class="btnPill" id="rg3" onclick="show_gallery(3);">PEDDLER</button>
			<button type="button" class="btnPill" id="rg4" onclick="show_gallery(4);">SNATCHER</button>
		</div>
	</div>
	<div class="container" style=" height: auto; overflow-y: overlay;">
	<div class="col-md-3 pull-right" id="sidebar" style=" height: 200px; ">
		<div class="col-md-12">
				<br><br>
				<div class="panel panel-danger">
			        <div class="panel-heading" style="background: #D53A3A; color: #fff;">
			          <h3 class="panel-title">LOOKOUT NOTICE</h3>
			        </div>
			        <div class="panel-body">
	  		            <div class="thumbnail">
						      <img src="<?php echo URL;?>assets/apps/images/car_lifter/Amarjit_Singh.jpg" alt="...">
						      <div class="criminalinfo">
						      <label>Name:&nbsp; Your Name</label><br/>
						      <small><strong>Alias: </strong>&nbsp; Bhogpur Goreswar</small><br/>
						      <small><strong>Wanted for: </strong>&nbsp; haha</small>
						      <button type="button" class="btn btn-default btn-lg btn-block btn-xs"><span class="glyphicon glyphicon-download"></span> Download</button>
						      </div>
					    </div>
			        </div>
		     	</div>
		     	
				<div class="panel panel-primary">
			        <div class="panel-heading">
			          <h3 class="panel-title">REWARDS FOR GIVING INFO</h3>
			        </div>
			        <div class="panel-body" id="tip_div">
			          <p style=" text-align: justify; ">Strive to build up a strong Police-Public bond in order to encourage community.</p>
			          <label>Tip to Police</label>
			          <textarea maxlength="160" class="form-control" rows="3" placeholder="Your Tip" id="tip"></textarea>
			          <br>
			          <label>Email / Mobile</label>
			          <input type="text" class="form-control" id="tipperInfo" placeholder="Email or Mobile">
			          <br>
			          <label>
      					<input type="checkbox" id="stayAnonymous"> Stay Anonymous 
    				  </label>
    				  <input type="hidden" id="isanonymous">
    				  <br>
			          <button type="button" class="btn btn-primary" id="send_tip_btn" onclick="send_tip();">Send Tip</button>
			        </div>
			     </div>
				<hr>
		</div>
	</div>	
	
	<!-- Car Lifter -->
	<div id="car_lifter_div">
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">MOST WANTED</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/dharam_nath_pandit.jpg" alt="...">
					      <div class="criminalinfo">
					      	<label><span class="glyphicon glyphicon-user"></span>&nbsp; Dharam Nath Pandit</label><br/>
					      	<small><span class="glyphicon glyphicon-home"></span>&nbsp;</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/habibur_rahman.jpg" alt="...">
					      <div class="criminalinfo">
					      	<label><span class="glyphicon glyphicon-user"></span>&nbsp; Habibur Rahman</label><br/>
					      	<small><span class="glyphicon glyphicon-home"></span>&nbsp; Nagarbahi PS  Mangaldai</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/niraj_saikia.jpg" alt="...">
					      <div class="criminalinfo">
					      	<label><span class="glyphicon glyphicon-user"></span>&nbsp; Niraj Saikia</label><br/>
					      	<small><span class="glyphicon glyphicon-home"></span>&nbsp; Vill. 84 G Raja Sc </small>
					      </div>
					    </div>
					</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">OTHERS</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/abdul_ahmed.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Abdul Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bhogpur Goreswar</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/abdul_kasem.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Abdul Kasem</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Pachaji Rehampul </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/Amarjit_Singh.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Amarjit Singh</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Gupter Bagan</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/bakul_baruah.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Bakul Baruah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Barangabari </small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/biraj_das.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Biraj Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Amritpar</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/chintu_sonowal.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Chintu Sonowal</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Tupoguri PS Moran</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/dhamen_gogoi.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Dhamen Gogoi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Deragabeth PS Moran</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/dilip_gogoi.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Dilip Gogoi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/faruk_ahmed.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Faruk Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Lanka odali 
					      </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/faruk_ali.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Faruk Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; S/O Raju Ali, Namile.</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/gauranga_das.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Gauranga Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/kabita_borah.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Kabita Borah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Latamary
					      </small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/mafizul_islam.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Mafizul Islam</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/Mahanta_Surjyabanshi.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Mahanta Surjyabangshi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Koilagura PS Moran    </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/manoj_gupta.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Monoj Gupta</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Vill:-Turkolia</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/nazrul_islam.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Nazrul Islam</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Pub- Sariatoli  PS Nalbari</small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
				
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/nripen_das.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Nripen Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/nurul_amin.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Nurul Amin</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bilasipara</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/phanindra_gogoi.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Phanindra Gogoi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Khoang Rangsali</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/raju_boro.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Raju Boro</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Ganeshpara Guwahati
					      </small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
				
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/Ramesh_Kumar.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Ramesh Kumar</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Nayagaon ,hariyana</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/ranjit_mech.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Ranjit Mech</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bhogpur</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/samresh_barman.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Sarmesh Barman</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/satya_bora.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Satya Bora</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;</small>
					      </div>
					    </div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/shah_alam.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Shah Alam</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/suraj_ali.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Suraj Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Vill- Panbari</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/suraj_shah.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Suraj Shah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Champalhari</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/car_lifter/wasim_khan.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Wasim Khan</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	
	
	<!-- two wheeler lifter -->
	
	<div id="two_wheeler_lifter_div">
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">MOST WANTED</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/amirul_islam.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Amirul Islam</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Dhirenpara Raghunath Path</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/anwar_hussain.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Anwar Hussain</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bijoynagar Hatigaon PS
					      </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/arup_das.jpg" alt="...">
					       <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Arup Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">OTHERS</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/md_jakaria.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; MD Jakaria</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/md_khalil_aziz.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; MD Khalil Aziz</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bharalumukh  Santipur</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/moinul.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Minul @ kala</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Samtila Kharupetia</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/salim_ahmed.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Salim Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Yampa, P.S Thoubal</small>
					      </div>
					    </div>
					</div>
					
				</div>
			</div>
		</div>	
	<!-- peddler -->
	
	<div id="peddler_div">
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">MOST WANTED</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/anwar_ali.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Anwar Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Six Mile, Daranda Panjabari Road</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/chintu_baruah.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Chintu Baruah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Gandhibasti, Paltanbazar</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/dip_borah.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Dip Borah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bhogpur Goreswar</small>
					      </div>
					    </div>
					</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">OTHERS</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/rashid_ahmed.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Rashid Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Katiyala PS Karimganj </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/rubul_ali.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Rubul Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Sixmile Daranda Panjabari</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/tuleswar_singh.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Tuleswar Singh</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Manipuribasti</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/wajib_hussain.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Wajib Hussain</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Satgaon</small>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		
	<!-- snatcher -->
	
	<div id="snatcher_div">
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">MOST WANTED</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/Bhupen_das.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Bhupen Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Tihu Athiabari, Nalbari </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/chintu_medhi.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Chintu Medhi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Tarun Nagar, H/No. 6</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/hasim_ali.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Hasim Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;Bijoy Nagar</small>
					      </div>
					    </div>
					</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-9">
				<h4 style=" margin-left: 12px; ">OTHERS</h4>
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/hasmat_ali.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Hasmat Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;Rahampur</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/imran_ahmed.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Imran Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Barsapara</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/jadu_das.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Jadu Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;North Guwahati</small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/jiten_das.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Jiten Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; </small>
					      </div>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/jugendra_roy.jpg" alt="...">
					      <div class="criminalinfo">
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Jugendra Roy</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Patacharkuchi</small>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#criminal_nav').addClass('active');
	show_gallery(1);
};

	function show_gallery(div){
		if(div == 1){
			$('#rg1').removeClass('btnPill').addClass('btnPillactive');
			$('#rg2,#rg3,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#two_wheeler_lifter_div,#peddler_div,#snatcher_div').hide();
			$('#car_lifter_div').show();
		}

		if(div == 2){
			$('#rg2').removeClass('btnPill').addClass('btnPillactive');
			$('#rg1,#rg3,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#car_lifter_div,#peddler_div,#snatcher_div').hide();
			$('#two_wheeler_lifter_div').show();
		}

		if(div == 3){
			$('#rg3').removeClass('btnPill').addClass('btnPillactive');
			$('#rg1,#rg2,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#car_lifter_div,#two_wheeler_lifter_div,#snatcher_div').hide();
			$('#peddler_div').show();
		}
		
		if(div == 4){
			$('#rg4').removeClass('btnPill').addClass('btnPillactive');
			$('#rg1,#rg2,#rg3').removeClass('btnPillactive').addClass('btnPill');
			
			$('#car_lifter_div,#two_wheeler_lifter_div,#peddler_div').hide();
			$('#snatcher_div').show();
		}
	}

	/**textarea char count**/
	
	var supportOnInput = 'oninput' in document.createElement('input');

	$("textarea[maxlength]").each(function() {
	    var $this = $(this);
	    var maxLength = parseInt($this.attr('maxlength'));
	    $this.attr('maxlength', null);
	    
	    var el = $("<span class=\"character-count\">" + maxLength + "</span>");
	    el.insertAfter($this);
	    
	    $this.bind(supportOnInput ? 'input' : 'keyup', function() {
	        var cc = $this.val().length;
	        
	        el.text(maxLength - cc);
	        
	        if(maxLength < cc) {
	            el.css('color', 'red');
	        } else {
	            el.css('color', null);
	        }
	    });
	});

	var isanonymous = 0;
	$(function(){
		$('#stayAnonymous').change(function(){
			if ($('#stayAnonymous').is(':checked')) {
			   $('#tipperInfo').attr('disabled', true).val('');
			   isanonymous = 1;
			} else {
				$('#tipperInfo').attr('disabled', false);
				isanonymous = 0;
			} 
		});
	});
	
	function send_tip(){
		var tip = $('#tip').val();
		var tipperInfo = $('#tipperInfo').val();
		var formData;
		if(isanonymous == 1){
			formData = {'tip':tip};
		}
		if(isanonymous == 0){
			formData = {'tip':tip, 'tipperInfo': tipperInfo};
		}

		//console.log(formData);
		if(tip.length>0 && tip.length<161){
			if(isanonymous == 0 && tipperInfo.length ===0){
				alert('Your Email/Mobile or checked Stay Anonymous');
			}
			else{
				$('#send_tip_btn').attr('disabled', true).html('Sending');
				$('#tip_div').html('<h3>Thank You</h3>');
				$.ajax({
				    type: 'POST',
				    url: '<?php echo URL;?>',
				    data: formData,	
				    dataType: 'JSON',    
				    success: function(formData){
				    	//$('#send_tip_btn').attr('onclick','');
				    	//$('#send_tip_btn').attr('disabled', false).html('Thank You');
				    	//$('#tip_div').html('<h3>Thank You</h3>');        
				    }
				});
			}
		}
	}

</script>