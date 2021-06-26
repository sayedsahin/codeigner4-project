<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<div class="container">
	<h3 class="">Employee Details <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>/employee/savedata">Add</a></h3> 
	<?php if (session()->getTempdata('success')) { ?>
    <div class="alert alert-success"><?= session()->getTempdata('success'); ?></div>
    <?php } ?>
     
    <?php if (session()->getTempdata('error')) { ?>
    <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
    <?php } ?>
	<table class="table table-hover">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Salary</th>
			<th>Designation</th>
			<th>Action</th>
			
			<th>Logout Time</th>
		</tr>
		<?php 
		if ($employee) { 
			$i=0;
			foreach ($employee as $value) { $i++;
		?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $value['name']; ?></td>
			<td><?= $value['email']; ?></td>
			<td><?= $value['mobile']; ?></td>
			<td><?= $value['salary']; ?></td>
			<td><?= $value['designation']; ?></td>
			<td><?= $value['city']; ?></td>
			<td>
				<a class="btn btn-dark btn-sm" href="<?= base_url();?>/employee/editdata/<?= $value['id']; ?>">Edit</a>
				<a class="btn btn-danger btn-sm" href="<?= base_url();?>/employee/deletedata/<?= $value['id']; ?>">Delete</a>
			</td>
		</tr>
		<?php } }else{ ?>
		<tr>
			<td colspan="5">Activity Info Not Found</td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php echo $this->endSection() ?>