<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
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
     <div class="form-row">
          <div class="form-group col-md-6">
               <label for="inputPassword4">Name</label>
               <input type="text" name="username" class="form-control" id="inputPassword4" value="<?= set_value('username') ?>" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
               <label for="inputEmail4">Email</label>
               <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" id="inputEmail4" placeholder="Email">
          </div>
     </div>
     <div class="form-group">
          <label for="inputAddress">Mobile</label>
          <input type="text" name="mobile" value="<?= set_value('mobile') ?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
     </div>
     <div class="form-group">
          <label for="inputAddress2">Messege</label>
          <textarea name="message" value="<?= set_value('message') ?>" id="inputAddress2" class="form-control"><?= set_value('message') ?></textarea>
     </div>
     <button type="submit" class="btn btn-primary">Sign in</button>
<?= form_close(); ?>
</div>
<?php echo $this->endSection() ?>