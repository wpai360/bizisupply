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

    public function update_put($id=0)
    {
        $data = $this->BuyerOrderDashboardModel->UpdateOrderRequest(intval($id));
        if($data == 1){
          $this->response(['status' => TRUE, 'message' => 'Order has been cancelled', 'data'=>$data], REST_Controller::HTTP_OK);
        }
    }
}

