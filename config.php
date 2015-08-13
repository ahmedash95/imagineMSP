<?php 

session_start();
require_once 'functions.php';
require_once __DIR__ . '/vendor/autoload.php';


// FACEBOOK
# login.php
$fbConfig = [
	'app_id' => '935385313166277',
  	'app_secret' => '1342f383ee4cff5f87db57e6463a2bda',
  	'default_graph_version' => 'v2.2',
];
$fb = new Facebook\Facebook($fbConfig);

// TWITTER 

$settings = array(
    'oauth_access_token' => "709567136-QYGcERtCzRNHlmiSIFyGiZmjA7xDYDNJIYD85x9H",
    'oauth_access_token_secret' => "u663YU40LD1SmGpVgvBnJvKh3C5sUtwgdBmPjLhQV5UGf",
    'consumer_key' => "TKflwZZv3VxGaD8K3RAYfkf5m",
    'consumer_secret' => "rKE9J723xnyt6CL1VdMnu8SceaSXHoHuau8ozW4FhIUSmBm3R2"
);

