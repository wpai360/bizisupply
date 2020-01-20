<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Api extends Rest_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('BuyerOrderDashboardModel');
    }







}
