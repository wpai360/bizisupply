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

    public function users_get($id=0)
    {
        $data = $this->BuyerOrderDashboardModel->viewOrder(intval($id));
        $this->response($data, 200);
        
    }
}

