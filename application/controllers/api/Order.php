<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Order extends Rest_Controller
{

  function __construct()
  {

    parent::__construct();
    $this->load->model('BuyerOrderDashboardModel');
  }

  public function orders_get($userId = 0)
  {
    $data = $this->BuyerOrderDashboardModel->savedOrderRequest(0, intval($userId));
    if ($data != []) {
      $this->response(['status' => TRUE,  'data' => $data], REST_Controller::HTTP_OK);
    } else {
      $this->response(['status' => FALSE, 'message' => 'No data', 'data' => $data], REST_Controller::HTTP_OK);
    }
  }
  public function order_get($orderId = 0)
  {
    $data = $this->BuyerOrderDashboardModel->viewOrder(intval($orderId));
    $this->response($data, 200);
  }

  public function update_put($order_id = 0, $user_id = 0)
  {
    $data = $this->BuyerOrderDashboardModel->UpdateOrderRequest(intval($order_id), intval($user_id));
    if ($data == 1) {
      $this->response(['status' => TRUE, 'message' => 'Order has been cancelled', 'data' => $data], REST_Controller::HTTP_OK);
    } else {
      $this->response(['status' => FALSE, 'message' => 'Order has not been cancelled', 'data' => $data], REST_Controller::HTTP_BAD_REQUEST);
    }
  }
}