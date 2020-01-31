<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Order extends Rest_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('BuyerOrderDashboardModel');
    }

    public function orders_get($id=0)
    {
        $data = $this->BuyerOrderDashboardModel->viewOrder(intval($id));
        $this->response($data, 200);
        
    }

    public function update_put($order_id=0, $user_id=0)
    {
        $data = $this->BuyerOrderDashboardModel->UpdateOrderRequest(intval($order_id), intval($user_id));
        if($data == 1){
          $this->response(['status' => TRUE, 'message' => 'Order has been cancelled', 'data'=>$data], REST_Controller::HTTP_OK);
        }else{
          $this->response(['status' => FALSE, 'message' => 'Order has not been cancelled', 'data'=>$data], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

