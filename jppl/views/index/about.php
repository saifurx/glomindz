<div class="container">
	<div class="alert alert-error" id="chrome">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
		<strong>Please <a href="https://www.google.com/intl/en/chrome/browser/"	target="_blank">download and install Google Chrome</a> for full	functionality.</strong>
	</div>
	<div class="row">
		<div class="span12">
			<p class="tagline"><em>Empowering citizens, Enabling police</em></p>
		</div>
	</div>
		<div class="row">
			<div class="span12">
				<h4>What is Crimatrix?</h4>
				<p>
					Crimatrix is <strong class="label label-important">a real-time crime monitoring platform</strong> for the police department and citizens to harness the power of community to monitor and prevent crimes in the city using technology.
				</p>
				<h4>What does Crimatrix do?</h4>
				<p>
					Crimatrix uses various mobile and web apps to <strong>collect,
						analyze and share real-time crime data</strong> among police
					officers. Relevant crime data and alerts that could be useful to
					the citizens, like <strong>city crime trends, repeat offenders,
						crime hotspots</strong> will then be made public though this platform
					and shared on social media.
				</p>
				
				<h4>Where does Crimatrix work?</h4>
				<p>
					Currently, Crimatrix works <strong>only in Guwahati.</strong> With
					time, we plan to extend it across Assam.
				</p>
				<h4>Who is behind Crimatrix?</h4>
				<p>
					Crimatrix is a joint initiative by <a
						href="http://www.assampolice.gov.in" target="_blank">Assam Police</a>
					and <a href="http://glomindz.com" target="_blank">Glomindz</a>.
				</p>
				
			</div>


		</div>
			<footer>
			<hr>
				<p>
					&copy; <a href="http://glomindz.com/" target="_blank">Glomindz Software</a> 2013
				</p>
			</footer>
	</div>

</body>
</html>
<script type="text/javascript">
	$('#about_li').addClass('active');
	$(document).ready(function () {
		if($.browser.webkit) {
			    $('#chrome').hide();
		}
	});
	$('#submit_form').click(function () {
		var formData = $('form#recover_password').serialize();
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>login/recover_password',
			  data: formData,
			  success: function(resp){
				  	$('.loginBox').hide();
				  	if(resp!=0){
						$('#reg_success').show();
				  	}else{
				  		$('#reg_error').show();
					}
				}
			});
		});
</script>
