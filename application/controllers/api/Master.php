<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Master extends Rest_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('MasterListModel');
    }

    public function masters_get($id = 0)
    {
        $data = $this->MasterListModel->masterList(intval($id));
        $this->response($data, 200);
    }

    public function masterList_post()
    {
    }

    public function masters_post()
    {
        $master_data = array(
            strip_tags($this->post('user_id')),
            strip_tags($this->post('category_id')),
            strip_tags($this->post('order_name')),
            strip_tags($this->post('brand_name')),
            strip_tags($this->post('part_number')),
        );

        $this->MasterListModel->addMaster($master_data);
    }

    public function masters_put()
    {
    }

    public function masters_delete()
    {
    }
}