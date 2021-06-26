<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
<div class="row">
<div class="col-md-6 col-12 mx-auto">
	<h3 class="text-center text-dark">Ragistration</h3>
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
           <label for="inputPassword4">User Name</label>
           <input type="text" name="username" class="form-control" id="inputPassword4" value="<?= set_value('username') ?>" placeholder="Name">
           <span class="text-danger"><?= display_error($validation, 'username'); ?></span>
     </div>
     <div class="form-group">
           <label for="inputEmail4">Email</label>
           <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" id="inputEmail4" placeholder="Email">
           <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
     </div>
     <div class="form-group">
           <label for="inputpass3">Password</label>
           <input type="text" name="password" value="<?= set_value('password') ?>" class="form-control" id="inputpass3" placeholder="Password">
           <span class="text-danger"><?= display_error($validation, 'password'); ?></span>
     </div>
     <div class="form-group">
           <label for="inputpass4">Re-Type Password</label>
           <input type="text" name="re-password" value="<?= set_value('re-password') ?>" class="form-control" id="inputpass4" placeholder="Re-Type Password">
           <span class="text-danger"><?= display_error($validation, 're-password'); ?></span>
     </div>
     <div class="form-group">
          <label for="inputAddress">Mobile</label>
          <input type="text" name="mobile" value="<?= set_value('mobile') ?>" class="form-control" id="inputAddress" placeholder="0181xxxxxxxx">
          <span class="text-danger"><?= display_error($validation, 'mobile'); ?></span>
     </div>
     <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
     <span> or <a href="<?= base_url(); ?>/account/login">Login</a></span>
<?= form_close(); ?>
</div>
</div>
</div>
<?php echo $this->endSection() ?>