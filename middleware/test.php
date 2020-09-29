<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
require '../vendor/autoload.php';
session_start();
//$encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
$encryption_key = 'aHpDWFp31q+lMOuW6vx+lSLB80fvLw3mY4ZKcqYo4nc=';
$encrypt_api_key = $_SESSION['api_key'];
$client = new \GuzzleHttp\Client([  "base_uri" => "http://127.0.0.1/Hawkiweb/api/"]);
$order_number = (int)$_POST['order'];
$cancel_order = (int)$_POST['cancelOrder'];
$user_id = (int)$_SESSION['user_session']->id;

function api_decrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

$api_key = api_decrypt($encrypt_api_key, $encryption_key);

if($order_number){
  if($cancel_order == 1){
    $response = $client->request('PUT', 'Order/update/'.$order_number.'/'.$user_id , ['headers' => ['X-API-KEY' => $api_key]]);
    echo $response->getBody(); 
  }
}
?>
