<?php
require 'vendor/autoload.php';

global $app_response;

$app = new \Slim\Slim();
$app_response = $app->response;

function set_response($code, $data = null) {
	global $app_response;
	
	$app_response->setStatus($code);
	
	if ($code == 400) { // none empty
		$app_response->headers->set('Content-Type', 'application/json');
		$app_response->write(json_encode(array('error_msg' => 'None Empty')));	
	}
	else {
		$app_response->headers->set('Content-Type', 'tesxt');
		$app_response->write($code);
	}
}

$app->get('/getuser/userId/:userId', function ($userid) {
	// get user info from database
	$userinfo = false;
	$code = ( $userinfo ) ? $userinfo : 400;
	set_response($code);
});

$app -> get('/getorder/orderId/:orderId', function ($orderId) {
	$orderInfo = false;
	$code = ( $orderInfo ) ? $orderInfo : 400;
	set_response($code);
});

$app -> get('/cancelorder/orderId/:orderId', function ($orderId) {
	$orderId = 1;
	$code = ( $orderId ) ? 2 : 400;
	set_response($code);
});
$app->run();