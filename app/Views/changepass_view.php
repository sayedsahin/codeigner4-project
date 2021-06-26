<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
<div class="row">
<div class="col-md-6 col-12 mx-auto">
	<h3 class="text-center text-dark">Change Password</h3>
<?= form_open(); ?>
     <?php if (isset($validation)) { ?>
     <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
     <?php } ?>

     <?php if ($session->getTempdata('success')) { ?>
     <div class="alert alert-success"><?= $session->getTempdata('success'); ?></div>
     <?php } ?>
     
     <?php if ($session->getTempdata('error')) { ?>
     <div class="alert alert-danger"><?= $session->getTempdata('error'); ?></div>
     <?php } ?>
     <div class="form-group">
           <label for="inputpass1">Old Password</label>
           <input type="text" name="oldpass" value="<?= set_value('oldpass') ?>" class="form-control" id="inputpass1" placeholder="Password">
     </div>
     <div class="form-group">
           <label for="inputpass2">New Password</label>
           <input type="text" name="newpass" value="<?= set_value('newpass') ?>" class="form-control" id="inputpass2" placeholder="Password">
     </div>
     <div class="form-group">
           <label for="inputpass3"> Re Type New Password</label>
           <input type="text" name="newpassre" value="<?= set_value('newpass-re') ?>" class="form-control" id="inputpass3" placeholder="Password">
     </div>
     <button type="submit" name="changepass" class="btn btn-primary btn-block">Change</button>
<?= form_close(); ?>
</div>
</div>
</div>
<?php echo $this->endSection() ?>