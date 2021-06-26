<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
<div class="row">
<div class="col-md-6 col-12 mx-auto">
	<h3 class="text-center text-dark">Login</h3>
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
           <label for="inputEmail4">Email</label>
           <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" id="inputEmail4" placeholder="Email">
     </div>
     <div class="form-group">
           <label for="inputpass3">Password</label>
           <input type="text" name="password" value="<?= set_value('password') ?>" class="form-control" id="inputpass3" placeholder="Password">
     </div>
     <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
     <div class="my-2"><a class="btn btn-outline-secondary btn-block" href="">Login With Google</a></div>
     <div><a class="btn btn-outline-secondary btn-block" href="">Login With Facebook</a></div>
     <div class="text-center"><a href="<?= base_url(); ?>/account/forget">Forget Password</a> or <a href="<?= base_url(); ?>/account/signup">Create Account</a></div>
<?= form_close(); ?>
</div>
</div>
</div>
<?php echo $this->endSection() ?>