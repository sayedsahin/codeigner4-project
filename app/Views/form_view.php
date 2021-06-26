<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content') ?>

<?php 
    if (isset($validation)) {
       echo $validation->listErrors();
    } 
?>
<?= form_open() ?>

<h5>Username</h5>
<input type="text" name="username" value="<?= set_value('username') ?>" size="50" />
<span class="text-danger"><?= display_error($validation, 'username'); ?></span>
<h5>Password</h5>
<input type="text" name="password" value="<?= set_value('password') ?>" size="50" />
<span class="text-danger"><?= display_error($validation, 'password'); ?></span>
<h5>Email Address</h5>
<input type="text" name="email" value="<?= set_value('email') ?>" size="50" />
<span class="text-danger"><?= display_error($validation, 'email'); ?></span>

<h5>Mobile Number</h5>
<input type="text" name="mobile" value="<?= set_value('mobile') ?>" size="50" />
<span class="text-danger"><?= display_error($validation, 'mobile'); ?></span>

<div><input type="submit" value="Submit" /></div>

<?= form_close() ?>
<?php echo $this->endSection() ?>