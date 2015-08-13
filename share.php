<?php require_once'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MSP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="col-md-4">
		<img src="<?= base_url('logo.png') ?>">
		<br>
		<a href="<?= base_url('?'.get('path')) ?>" class="form-control btn-primary">share on FACEBOOK</a>
		<br>
		<a href="#" class="form-control btn-primary">share on Twitter</a>
		<br>
		<a href="<?= base_url('?'.get('path')); ?>" class="form-control btn-primary">Download Image</a>
	</div>
	<div class="col-md-4">
		<img class="img" src="<?= base_url('images/'.get('path')) ?>" width="500px">
	</div>
	
</body>
</html>
