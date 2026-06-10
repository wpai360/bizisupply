<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Categories extends Rest_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('category');
    }

    public function categories_get()
    {
        $data = $this->category->getCategory();
        $this->response($data, 200);
    }
}