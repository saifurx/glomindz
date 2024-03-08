<?php include "../header.php" ?>

<style>
.col-md-3,.col-md-4 {
	margin-bottom: 10px;
}

.criminalinfo {
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 5px;
}

label {
	font-size: 12px;
}
</style>
<div class="">
	<div class="subNav">
		<span class="subNavtext">CRIMINAL GALLERY</span>&nbsp;&nbsp;
		<div class=" pull-right img_pills">
			<button type="button" class="btnPill" id="rg0"
				onclick="show_gallery(0);">MOST WANTED</button>
			<button type="button" class="btnPill" id="rg1"
				onclick="show_gallery(1);">CAR LIFTER</button>
			<button type="button" class="btnPill" id="rg2"
				onclick="show_gallery(2);">2 WHEELER LIFTER</button>
			<button type="button" class="btnPill" id="rg3"
				onclick="show_gallery(3);">DRUG PEDDLERS</button>
			<button type="button" class="btnPill" id="rg4"
				onclick="show_gallery(4);">SNATCHER</button>
		</div>
	</div>
	<div class="container" style="min-height: 740px;">
		<div class="col-md-3 pull-right" id="sidebar" style="height: 200px;">
			<div class="col-md-12">
				<br> <br>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">SEND TIP</h3>
					</div>
					<div class="panel-body" id="tip_div">
						
						<p style="font-size: 11px;">
							If you wish to share any information with the police regarding any crime or criminal, you can tip us.<br>
                                                        Based on the result achieved on the basis of your TIP, you will be suitably rewarded.<br>Your identity will be kept
							secret. You may also choose to stay anonymous by checking the stay anonymous checkbox below.
						</p>
						<label>Tip to Police</label>
						<textarea maxlength="140" class="form-control" rows="3"
							placeholder="Your Tip" id="tip"></textarea>
						<br> <label>Send Tip To</label><br> <input type="checkbox"
							class="sendTo" id="ssp" name="sendTo" data-id="1"> SSP
<br>
						<input type="checkbox" class="sendTo" id="aspdsb" name="sendTo" data-id="6"> SP (Traffic)
							<br> <input
							type="checkbox" class="sendTo" id="spo" name="sendTo" data-id="2">
						SP (Operations)<br> <input type="checkbox" class="sendTo"
							id="aspcrime" name="sendTo" data-id="3"> Addl.SP (Crime)<br> <input
							type="checkbox" class="sendTo" id="aspcity" name="sendTo"
							data-id="4"> Addl.SP (City)<br> <input type="checkbox"
							class="sendTo" id="aspdsb" name="sendTo" data-id="5"> Addl.SP
						(DSB)
						
						<br> <br> <label>Email / Mobile</label> <input type="text"
							class="form-control" id="tipperInfo"
							placeholder="Email or Mobile"> <br> <label
							style="font-size: 10px;"> <input type="checkbox"
							id="stayAnonymous">Stay Anonymous
						</label> <input type="hidden" id="isanonymous"> <br>
						<button type="button" class="btn btn-primary" id="send_tip_btn" onclick="send_tip();">Send Tip</button>
					</div>
				</div>
				<hr>
			</div>
		</div>


		<!-- most wanted -->

		<div id="most_wanted_div">
			<div class="row">
				<div class="col-md-9">
					<div style="margin-top: 10px;"></div>
					<div class=" col-md-4">
						<div class="thumbnail">
							<img src="<?php echo URL;?>assets/apps/images/car_lifter/anil_chauhan.jpg"alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp; Anil
									Chauhan</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp;  Dispur Dist: Kamrup (M)</small>
							</div>
						</div>
					</div>
					<div class=" col-md-4">
						<div class="thumbnail">
							<img src="<?php echo URL;?>assets/apps/images/car_lifter/raj_thakuria.jpg"alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp; Raj
									Thakuria</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp;  Kalaigaon, Dist- Darrang.</small>
							</div>
						</div>
					</div>
					<div class=" col-md-4">
						<div class="thumbnail">
							<img src="<?php echo URL;?>assets/apps/images/car_lifter/nalwa.jpg"alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Nalua</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Jammu</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Car Lifter -->

		<div id="car_lifter_div">
			<div class="row">
				<div class="col-md-9">
					<div style="margin-top: 10px;"></div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/abdul_ahmed.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Abdul Ahmed</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Bhogpur Goreswar</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/abdul_kasem.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Abdul Kasem</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Pachaji Rehampul
								</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/Amarjit_Singh.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Amarjit Singh</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Gupter Bagan</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/bakul_baruah.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Bakul Baruah</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Barangabari </small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/biraj_das.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Biraj Das</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Amritpar</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/chintu_sonowal.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Chintu Sonowal</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Tupoguri PS
									Moran</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/dhamen_gogoi.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Dhamen Gogoi</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Deragabeth PS
									Moran</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/dilip_gogoi.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Dilip Gogoi</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/faruk_ahmed.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Faruk Ahmed</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Lanka odali </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/faruk_ali.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Faruk Ali</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; S/O Raju Ali,
									Namile.</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/gauranga_das.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Gauranga Das</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/kabita_borah.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Kabita Borah</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Latamary </small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/mafizul_islam.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Mafizul Islam</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/Mahanta_Surjyabanshi.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Mahanta Surjyabangshi</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Koilagura PS
									Moran </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/manoj_gupta.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Monoj Gupta</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Vill:-Turkolia</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/nazrul_islam.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Nazrul Islam</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Pub- Sariatoli
									PS Nalbari</small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/nripen_das.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Nripen Das</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/nurul_amin.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;Nurul
									Amin</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Bilasipara</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/phanindra_gogoi.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Phanindra Gogoi</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Khoang Rangsali</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/raju_boro.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp; Raju
									Boro</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Ganeshpara
									Guwahati </small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">

					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/Ramesh_Kumar.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Ramesh Kumar</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Nayagaon
									,hariyana</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/ranjit_mech.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Ranjit Mech</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Bhogpur</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/samresh_barman.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Sarmesh Barman</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/satya_bora.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Satya Bora</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp;</small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/shah_alam.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp; Shah
									Alam</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/suraj_ali.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Suraj Ali</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Vill- Panbari</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/suraj_shah.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Suraj Shah</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Champalhari</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/car_lifter/wasim_khan.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Wasim Khan</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
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
				
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/md_jakaria.jpg" alt="...">
					      <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; MD Jakaria</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;Ali vill: Satra Konara P. S Baghbar Dist:  Barpeta </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/md_khalil_aziz.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; MD Khalil Aziz</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Bharalumukh  Santipur</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/moinul.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Minul @ kala</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Samtila Kharupetia PS Dolgaon</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/salim_ahmed.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Salim Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Yampa P.S Thoubal Dist:East Imphal State: Manipur </small>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/anil_nath.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Anil Nath</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Vill & P.S:- Kalaigaon Dist: Udalguri </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/saddam_ali.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Saddam Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; P.S: Jalukbari,Dist: Kamrup (M)</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/kalsi_sahani.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Kalshi Sahani</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; P.S: Jalukbari,Dist: Kamrup (M)</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/two wheeler lifter/sambu_sahani.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Sambu Sahani</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp;Pandu Colony,P.S: Jalukbari,Dist: Kamrup (M)  </small>
					    </div>
					</div>
				</div>
			</div>		</div>
		<!-- peddler -->

		<div id="peddler_div">
			<div class="row">
			<div class="col-md-9">
				
				<hr style="margin-top: 10px;">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/rashid_ahmed.jpg" alt="...">
					      <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Rashid Ahmed</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Katiyala PS Karimganj </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/rubul_ali.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Rubul Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Sixmile Daranda Panjabari</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/tuleswar_singh.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Tuleswar Singh</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Manipuribasti</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/wajib_hussain.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Wajib Hussain</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Satgaon</small>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/anwar_ali.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Anwar Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Dispur Dist: Kamrup </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/dip_borah.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Dip Borah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Paltanbazar Dist: Kamrup(M)</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/peddler/chintu_baruah.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Chintu Baruah</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Gandhibasti,Kamrup</small>
					    </div>
					</div>
				</div>
			</div>
		</div>

		<!-- snatcher -->

		<div id="snatcher_div">
			<div class="row">
				<div class="col-md-9">
					<div style="margin-top: 10px;"></div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/snatcher/hasmat_ali.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Hasmat Ali</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp;Rahampur</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/snatcher/imran_ahmed.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Imran Ahmed</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Barsapara</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/snatcher/jadu_das.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;Jadu
									Das</label><br /> <small><span class="glyphicon glyphicon-home"></span>&nbsp;North
									Guwahati</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/snatcher/jiten_das.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Jiten Das</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; </small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
						<div class="thumbnail">
							<img
								src="<?php echo URL;?>assets/apps/images/snatcher/jugendra_roy.jpg"
								alt="...">
							<div class="criminalinfo">
								<label><span class="glyphicon glyphicon-user"></span>&nbsp;
									Jugendra Roy</label><br /> <small><span
									class="glyphicon glyphicon-home"></span>&nbsp; Patacharkuchi</small>
							</div>
						</div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/Bhupen_das.jpg" alt="...">
					      <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Bhupen Das</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Tihu Athiabari, Nalbari </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/chintu_medhi.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Chintu Medhi</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Tarun Nagar, H/No. 6</small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/hasim_ali.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Hasim Ali</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Vill- Bijoy Nagar, Halegaon, PS- Palashbari
					      </small>
					    </div>
					</div>
					<div class=" col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo URL;?>assets/apps/images/snatcher/jitu_barman.jpg" alt="...">
					       <hr>
					      <label><span class="glyphicon glyphicon-user"></span>&nbsp; Jitu Barman</label><br/>
					      <small><span class="glyphicon glyphicon-home"></span>&nbsp; Address:-S/O Pramod Barman of Belsor PS- Belsor Dist- Nalbari.</small>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#rg0').click();
	$('#criminal_nav').addClass('active');
        change_gallary();
	
};
$(window).on('hashchange', function(e){
	change_gallary();
});

function change_gallary(){
	var current_url = "<?php echo URL; ?>";
	var most_wanted_url = current_url + 'criminals/criminal_gallery.php?#most_wanted';
	var car_lifter_url = current_url + 'criminals/criminal_gallery.php?#car_lifter';
	var two_wheeler_lifter_url = current_url + 'criminals/criminal_gallery.php?#two_wheeler_lifter';
	var peddler_url = current_url + 'criminals/criminal_gallery.php?#peddler';
	var snatcher_url = current_url + 'criminals/criminal_gallery.php?#snatcher';

 	if (document.URL == most_wanted_url) {
		$('#rg0').click();
    }
	if (document.URL == car_lifter_url) {
		$('#rg1').click();
    }
	if (document.URL == two_wheeler_lifter_url) {
		$('#rg2').click();
    }
	if (document.URL == peddler_url) {
		$('#rg3').click();
    }
	if (document.URL == snatcher_url) {
		$('#rg4').click();
    }
}

	function show_gallery(div){
		if(div == 0){
			$('#rg0').removeClass('btnPill').addClass('btnPillactive');
			$('#rg1,#rg2,#rg3,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#car_lifter_div,#two_wheeler_lifter_div,#peddler_div,#snatcher_div').hide();
			$('#most_wanted_div').show();
		}
		
		if(div == 1){
			$('#rg1').removeClass('btnPill').addClass('btnPillactive');
			$('#rg0,#rg2,#rg3,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#most_wanted_div,#two_wheeler_lifter_div,#peddler_div,#snatcher_div').hide();
			$('#car_lifter_div').show();
		}

		if(div == 2){
			$('#rg2').removeClass('btnPill').addClass('btnPillactive');
			$('#rg0,#rg1,#rg3,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#most_wanted_div,#car_lifter_div,#peddler_div,#snatcher_div').hide();
			$('#two_wheeler_lifter_div').show();
		}

		if(div == 3){
			$('#rg3').removeClass('btnPill').addClass('btnPillactive');
			$('#rg0,#rg1,#rg2,#rg4').removeClass('btnPillactive').addClass('btnPill');
			
			$('#most_wanted_div,#car_lifter_div,#two_wheeler_lifter_div,#snatcher_div').hide();
			$('#peddler_div').show();
		}
		
		if(div == 4){
			$('#rg4').removeClass('btnPill').addClass('btnPillactive');
			$('#rg0,#rg1,#rg2,#rg3').removeClass('btnPillactive').addClass('btnPill');
			
			$('#most_wanted_div,#car_lifter_div,#two_wheeler_lifter_div,#peddler_div').hide();
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
		var mobile = '8876698046,9854087006,9678708417';
		if(isanonymous == 1){
			tipperInfo = "Anonymous";
		}
		if(tip.length > 0 && tip.length < 161){
			$('#send_tip_btn').attr('disabled', true).html('Sending');
			$.ajax({
				type: 'POST',
				url: 'http://crimatrix.com/external_service/sendGCPTip/',
				data: {tip:tip,tipperInfo:tipperInfo,sendto:mobile},
				dataType: "json",
				crossDomain: true,
				async : false,
				success: function(resp){
					console.log(resp);
					
					//$('#send_tip_btn').attr('disabled', true).html('Sending');
				}
			});
			setInterval(function () {
				var contant ="";
				if(isanonymous==0){
					contant = '<h3>Thank You</h3>'
					  	+'<p style=" text-align: justify; ">for your Tip. We will follow it up.</p>'
					   	+'<p style=" text-align: justify; ">We may contact you for further details if required. If we achieve any result you will be rewarded.</p>'
					   	+'<p style=" text-align: justify; ">Your identity will be safe with us.</p>'
					   	+'<small style=" text-align: justify; ">* You can send only one tip per day. Come back later if you want to send more tip.</small>';
				    }
				else if(isanonymous==1){
				    contant = '<h3>Thank You</h3>'
					+'<p style=" text-align: justify; ">for your Tip. We will follow it up.</p>'
					+'<p style=" text-align: justify; ">You have choosen to stay anonymous. So we wont be able to reward you for your valuable information</p>'
					+'<small style=" text-align: justify; ">* You can send only one tip per day. Come back later if you want to send more tip.</small>';
				}
				else{
					contant = '<h3>Sorry, Error. Tip didnt send.</h3>'		 
				}
				$('#tip_div').html(contant);
			}, 2000);
		}
	}
</script>
<?php include "../footer.php" ?>
