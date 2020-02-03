<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
require '../vendor/autoload.php';
session_start();
$api_key = $_SESSION['api_key'];
$client = new \GuzzleHttp\Client([  "base_uri" => "http://127.0.0.1/Hawkiweb/api/"]);
$order_number = (int)$_POST['order'];
$user_id = (int)$_SESSION['user_session']->id;
if($order_number){
  $response = $client->request('PUT', 'Order/update/'.$order_number.'/'.$user_id , ['headers' => ['X-API-KEY' => $api_key]]);
  echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
}
?>
