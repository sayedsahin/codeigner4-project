<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
	<?php if (isset($validation)) { ?>
	<div class="alert alert-danger"><?= $validation->listErrors();?></div>
	<?php } ?>
	<?php if ($session->getTempdata('success')) { ?>
     <div class="alert alert-success"><?= $session->getTempdata('success'); ?></div>
     <?php } ?>
     
     <?php if ($session->getTempdata('error')) { ?>
     <div class="alert alert-danger"><?= $session->getTempdata('error'); ?></div>
     <?php } ?>
	<?= form_open_multipart(); ?>
	<div class="input-group">
		<div class="custom-file">
			<input type="file" name="file" class="custom-file-input" id="fileUpload">
			<label class="custom-file-label" for="fileUpload">Choose file...</label>
		</div>
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="submit" name="submit">Button</button>
		</div>
	</div>
	<?= form_close(); ?>
</div>
<?php echo $this->endSection() ?>