<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>
<?php $session = \Config\Services::session(); ?>
<div class="container">
<div class="row">
<div class="col-md-6 col-12 mx-auto">
     <?php if (isset($success)) { ?>
     <div class="alert alert-success"><?= $success; ?></div>
     <?php } ?>
     
     <?php if (isset($error)) { ?>
     <div class="alert alert-danger"><?= $error; ?></div>
     <?php } ?>   
</div>
</div>
</div>
<?php echo $this->endSection() ?>