<?php echo $this->extend('layouts/base'); ?>
<?php echo $this->section('content'); ?>
<div class="container">
	<ul class="list-group">
		<?php foreach ($user as $value) {?>
		<li class="list-group-item">Name: <?= $value->username; ?>, Email: <?= $value->email; ?></li>
		<?php } ?>
	</ul>
</div>
<?php echo $this->endSection() ?>