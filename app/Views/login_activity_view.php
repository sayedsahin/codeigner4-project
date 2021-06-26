<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<div class="container">
	<h5 class="">Your Login Activity</h5>
	<table class="table table-hover">
		<tr>
			<th>List</th>
			<th>User Agent</th>
			<th>Ip Adress</th>
			<th>Login Time</th>
			<th>Logout Time</th>
		</tr>
		<?php 
		if ($activity) { 
			$i=0;
			foreach ($activity as $value) { $i++;
		?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $value->agent; ?></td>
			<td><?= $value->ip; ?></td>
			<td><?= $value->login_at; ?></td>
			<td><?= $value->logout_at; ?></td>
		</tr>
		<?php } }else{ ?>
		<tr>
			<td colspan="5">Activity Info Not Found</td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php echo $this->endSection() ?>