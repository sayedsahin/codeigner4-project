<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<div class="container">
	<div class="media border p-3">
		<img src="<?= base_url().'/img/sayed.png'; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
		<div class="media-body">
			<h4><?= $userdata->username; ?> <small><i>Join on <?= $userdata->created_at; ?></i></small></h4>
			<p class="mb-1"><?= $userdata->email; ?></p>
			<p class="mb-1"><?= $userdata->mobile; ?></p>
			<span><a href="<?= base_url().'/dashboard/login_activity' ?>">Login Activity</a></span>
			<span><a href="<?= base_url().'/dashboard/changepassword' ?>">Change Password</a></span>
		</div>
	</div>
</div>
<?php echo $this->endSection() ?>