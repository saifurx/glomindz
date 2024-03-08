<script type="text/javascript">
	var ps_id = "<?php echo Session::get('ps_id'); ?>";
</script>
<style>


/* Sidenav for Docs
-------------------------------------------------- */

.bs-docs-sidenav {
  padding: 0;
  background-color: #fff;
  -webkit-border-radius: 6px;
     -moz-border-radius: 6px;
          border-radius: 6px;
  -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.065);
     -moz-box-shadow: 0 1px 4px rgba(0,0,0,.065);
          box-shadow: 0 1px 4px rgba(0,0,0,.065);
}
.bs-docs-sidenav > li > a {
  display: block;
  width: 190px \9;
  margin: 0 0 -1px;
  padding: 8px 14px;
  border: 1px solid #e5e5e5;
}
.bs-docs-sidenav > li:first-child > a {
  -webkit-border-radius: 6px 6px 0 0;
     -moz-border-radius: 6px 6px 0 0;
          border-radius: 6px 6px 0 0;
}
.bs-docs-sidenav > li:last-child > a {
  -webkit-border-radius: 0 0 6px 6px;
     -moz-border-radius: 0 0 6px 6px;
          border-radius: 0 0 6px 6px;
}
.bs-docs-sidenav > .active > a {
  position: relative;
  z-index: 2;
  padding: 9px 15px;
  border: 0;
  text-shadow: 0 1px 0 rgba(0,0,0,.15);
  -webkit-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
     -moz-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
          box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
}
/* Chevrons */
.bs-docs-sidenav .icon-chevron-right {
  float: right;
  margin-top: 2px;
  margin-right: -6px;
  opacity: .25;
}
.bs-docs-sidenav > li > a:hover {
  background-color: #f5f5f5;
}
.bs-docs-sidenav a:hover .icon-chevron-right {
  opacity: .5;
}
.bs-docs-sidenav .active .icon-chevron-right,
.bs-docs-sidenav .active a:hover .icon-chevron-right {
  background-image: url(../img/glyphicons-halflings-white.png);
  opacity: 1;
}
.bs-docs-sidenav.affix {
  top: 40px;
}
.bs-docs-sidenav.affix-bottom {
  position: absolute;
  top: auto;
  bottom: 270px;
}
#hotel_details{
	display: none;
}
</style>
<div class="container">
	<div class="row-fluid">
		<div class="span4">
			<input type="text" name="guestlistlate" id="guestlistlate" class="span9 btn-block">
		</div>
		<div class="span8">
 	    <input type="text" class="span9" placeholder="Search">
		 <div class="btn-group pull-right">
		  <button class="btn">Action</button>
		  <button class="btn">Action</button>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3 bs-docs-sidebar">
        	<ul class="nav nav-list bs-docs-sidenav" id="hotel_list_ul">
        	</ul>
      	</div>
      	<div class="span9 img-polaroid" id="hotel_details">
      	
      	
      	</div>
	</div>
</div>	
</div>
<script type="text/javascript">

window.onload = function(){
	$('#hotels_li').addClass('active');
	$( "#guestlistlate" ).datepicker();
	get_ps_registered_hotels();
};

function get_ps_registered_hotels(){
	$('#hotel_master').html('<p class="loading_img"><img alt="loading" src="<?php echo URL;?>/assets/apps/img/loading.gif"/></p>');
	$.ajax({
		url: '<?php echo URL;?>police_service/get_ps_registered_hotels/',
		type: 'POST',
		data: {ps_id:ps_id},
		dataType: 'JSON',
		success: function(data){
			for(var i in data){
				$('#hotel_list_ul').append('<li onclick="show_hotel_details('+data[i].id+');"><a href="#code"><i class="icon-chevron-right"></i>'+data[i].name+'</a></li>');
			}
		}			
	});
}

$("#hotel_list_ul").on("click", "li", function() {
	$(this).addClass("active").siblings().removeClass("active");
});

function show_hotel_details(id){
	console.log(id);
	$('#hotel_details').hide();
	$('#hotel_details').slideDown();
}
</script>