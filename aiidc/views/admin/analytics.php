<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">

			<li><a href="<?php echo URL;?>admin/edit_block">Update Block</a>
			</li>
			<li><a href="<?php echo URL;?>admin/remarks">GM Comments</a></li>
			<?php if(Session::get("role")!="default"){?>
			<li class="active"><a href="<?php echo URL;?>admin/analytics">Analytics</a>
			
			<li><a href="<?php echo URL;?>admin">Users List</a></li>
			
			<li><a href="<?php echo URL;?>admin/approve">Modified
					Data</a>
			</li>
			<?php }else{?>
			<li><a href="<?php echo URL;?>admin/modification">Modified
					Data</a>
			</li>
			<?php }?>
			

			<li><a href="<?php echo URL;?>admin/change_password">Change Password</a>
			</li>
		</ul>
	</div>

	<hr>
	<div class="row">
		<div class="span10">
			<h3>Report download information</h3>
			<table
				class="table table-bordered table-striped responsive-utilities">
				<thead>
					<tr class="label">
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>User Type</th>
						<th>Report</th>
						<th>Date&Time</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($this->downloadUsers as $key => $value) {
					echo '<tr>';
					echo '<td >' . $value['name'] . '</td>';
					echo '<td>' . $value['email'] . '</td>';
					echo '<td >' . $value['mobile'] . '</td>';
					echo '<td >' . $value['user_type'] . '</td>';
					echo '<td >' . $value['access_type'] . '</td>';
					echo '<td >' . $value['last_update'] . '</td>';
					echo '</tr>';
				}?>
				</tbody>
			</table>
		</div>

	</div>

</div>
<script type="text/javascript">
	$('#admin').addClass('active');
</script>
