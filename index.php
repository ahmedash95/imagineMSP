<?php
ob_start();

require_once'config.php';

// FACEBOOK AUTH
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/mywork/tamimi/fb.php', $permissions);

// TWITTER AUTH



// GET IMAGE SHORT URL
if(!empty($file = key($_GET))){
	$file = filter_var($file, FILTER_SANITIZE_STRING);
	$file = str_replace('_','.',$file);
	$file = base_url('images/'.$file);
	$file_name = array_pop(explode('/',$file));
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: Binary");
	header("Content-disposition: attachment; filename=\"".$file_name."\""); 
	readfile($file);
	die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MSP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="col-md-12 text-center">
			<img src="logo.png" width="460px">
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-4">
			<br>
			<a class="form-control btn btn-default" href="<?= $loginUrl; ?>">Login With Facebook</a>			
		</div>
		<div class="col-md-4">
			<br>
			<a class="form-control btn btn-default" href="<?= $loginUrl; ?>">Login With Twitter</a>			
		</div>
		<div class="clearfix"></div>
		<div class="col-md-3"></div>
		<div class="col-md-8">
			<br>
			<a class="form-control btn btn-default" href="<?= $loginUrl; ?>">Upload Your Photo</a>			
		</div>
		<div class="col-md-3"></div>
	</div>

</body>
</html>