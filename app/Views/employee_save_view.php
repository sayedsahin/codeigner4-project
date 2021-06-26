<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
     <h3>Save Employee Data </h3>
     <?= form_open(); ?>

     <?php if (isset($success)) { ?>
     <div class="alert alert-success"><?= $success; ?></div>
     <?php } ?>
     
     <?php if (isset($error)) { ?>
     <div class="alert alert-danger">
          <?php foreach ($error as $key => $value) {?>
               <?= $value; ?><br>
          <?php } ?>
     </div>
     <?php } ?>
     <div class="form-group">
          <label for="inputPassword4">Name</label>
          <input type="text" name="name" class="form-control" id="inputPassword4" value="<?= set_value('name') ?>" placeholder="Name">
     </div>
     <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" value="<?= set_value('email') ?>" class="form-control" id="email" placeholder="Email">
     </div>
     <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" value="<?= set_value('mobile') ?>" class="form-control" id="mobile" placeholder="1234 Main St">
     </div>
     <div class="form-group">
          <label for="salary">Salary</label>
          <input type="number" name="salary" value="<?= set_value('salary') ?>" class="form-control" id="salary" placeholder="1234 Main St">
     </div>
     <div class="form-group">
          <label for="designation">Designation</label>
          <input type="text" name="designation" value="<?= set_value('designation') ?>" class="form-control" id="designation" placeholder="1234 Main St">
     </div>
     <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" value="<?= set_value('city') ?>" class="form-control" id="city" placeholder="1234 Main St">
     </div>
     <button type="submit" name="employee" class="btn btn-primary">Save</button>
     <?= form_close(); ?>
</div>
<?php echo $this->endSection() ?>