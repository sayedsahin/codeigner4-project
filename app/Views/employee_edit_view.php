<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
     <h3>Save Employee Data</h3>
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
          <input type="text" name="name" class="form-control" id="inputPassword4" value="<?= $employee['name']; ?>">
     </div>
     <div class="form-group">
          <label for="email">Email</label>
          <input readonly type="text" name="email" class="form-control" id="email" value="<?= $employee['email']; ?>">
     </div>
     <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" class="form-control" id="mobile" value="<?= $employee['mobile']; ?>">
     </div>
     <div class="form-group">
          <label for="salary">Salary</label>
          <input type="number" name="salary" class="form-control" id="salary" value="<?= $employee['salary']; ?>">
     </div>
     <div class="form-group">
          <label for="designation">Designation</label>
          <input type="text" name="designation" class="form-control" id="designation" value="<?= $employee['designation']; ?>">
     </div>
     <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control" id="city" value="<?= $employee['city']; ?>">
     </div>
     <button type="submit" name="employee" class="btn btn-primary">Save</button>
     <?= form_close(); ?>
</div>
<?php echo $this->endSection() ?>