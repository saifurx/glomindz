<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">
			<li ><a href="<?php echo URL;?>admin/edit_block">Update Block</a></li>
			<li><a href="<?php echo URL;?>admin/remarks">GM Comments</a></li>
			<?php if(Session::get("role")!="default"){?>
			<li><a href="<?php echo URL;?>admin/analytics">Analytics</a>
			<li class="active"><a href="<?php echo URL;?>admin">Users List</a></li>
			
			<li><a href="<?php echo URL;?>admin/approve">Modified
					Data</a>
			</li>
			<?php }else{?>
			<li><a href="<?php echo URL;?>admin/modification">Modified
					Data</a>
			</li>
			<?php }?>
			
			<li><a href="<?php echo URL;?>admin/change_password">Change Password</a></li>
		</ul>
	</div>

	<hr>
<div class="row">
		<div class="span10">
			<h3>Registered Users</h3>
			<table
				class="table table-bordered table-striped responsive-utilities">
				<thead>
					<tr class="label">
						<th>Name</th>
						<th>Email</th>
						<th>District</th>
						<th>Mobile</th>
						<th>Role</th>
						<th>Approve</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($this->userList as $key => $value) {
					echo '<tr>';
					echo '<td >' . $value['name'] . '</td>';
					echo '<td >' . $value['email'] . '</td>';
					echo '<td>' . $value['loc'] . '</td>';
					echo '<td>' . $value['mobile'] . '</td>';
					echo '<td>' . $value['role'] . '</td>';
					if( $value['status']==0){
						echo '<td "  id="'.$value['id'].'"><a href="Javascript:approveUser('.$value['id'].',1)" class="label">Disabled</a></td>';
					}else{
						echo '<td "  id="'.$value['id'].'"><a href="Javascript:approveUser('.$value['id'].',0)" class="label label-success">Enabled</a></td>';
					}
					echo '</tr>';
				}?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<script type="text/javascript">
	$('#admin').addClass('active');
	
	function approveUser(id,status){

		 var formData = new FormData();
		 formData.append('id',id);
		 formData.append('status',status);
		  var xhr = new XMLHttpRequest();
		  xhr.open('POST', 'admin/approveUser', true);
		  xhr.onload = function(e) {
			  if (this.status == 200) {
			      console.log('Server got:', this.response);
			  
			      if(this.response==0){
			      	document.getElementById(id).innerHTML='<a href="Javascript:approveUser('+id+',1)" class="label">Disabled</a>';
			      }else{
			    	  document.getElementById(id).innerHTML='<a href="Javascript:approveUser('+id+',0)" class="label label-success">Enabled</a>';
				   }
			    };
		 };
		
		  xhr.send(formData);
		  return false;
	}
	</script>
<script type="text/javascript">
	$('#admin').addClass('active');
</script>
	