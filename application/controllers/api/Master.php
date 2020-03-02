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
        $email =  $this->post('email');
        $master_data = array(
            'category1' => strip_tags($this->post('category1')),
            'product1' => strip_tags($this->post('product1')),
            'brand1' => strip_tags($this->post('brand1')),
            'itemno1' => strip_tags($this->post('itemno1')),

            'category2' => strip_tags($this->post('category2')),
            'product2' => strip_tags($this->post('product2')),
            'brand2' => strip_tags($this->post('brand2')),
            'itemno2' => strip_tags($this->post('itemno2')),

            'category3' => strip_tags($this->post('category3')),
            'product3' => strip_tags($this->post('product3')),
            'brand3' => strip_tags($this->post('brand3')),
            'itemno3' => strip_tags($this->post('itemno3')),

            'category4' => strip_tags($this->post('category4')),
            'product4' => strip_tags($this->post('product4')),
            'brand4' => strip_tags($this->post('brand4')),
            'itemno4' => strip_tags($this->post('itemno4')),

            'category5' => strip_tags($this->post('category5')),
            'product5' => strip_tags($this->post('product5')),
            'brand5' => strip_tags($this->post('brand5')),
            'itemno5' => strip_tags($this->post('itemno5')),

            'category6' => strip_tags($this->post('category6')),
            'product6' => strip_tags($this->post('product6')),
            'brand6' => strip_tags($this->post('brand6')),
            'itemno6' => strip_tags($this->post('itemno6')),

            'category7' => strip_tags($this->post('category7')),
            'product7' => strip_tags($this->post('product7')),
            'brand7' => strip_tags($this->post('brand7')),
            'itemno7' => strip_tags($this->post('itemno7')),

            'category8' => strip_tags($this->post('category8')),
            'product8' => strip_tags($this->post('product8')),
            'brand8' => strip_tags($this->post('brand8')),
            'itemno8' => strip_tags($this->post('itemno8')),

            'category9' => strip_tags($this->post('category9')),
            'product9' => strip_tags($this->post('product9')),
            'brand9' => strip_tags($this->post('brand9')),
            'itemno9' => strip_tags($this->post('itemno9')),

            'category10' => strip_tags($this->post('category10')),
            'product10' => strip_tags($this->post('product10')),
            'brand10' => strip_tags($this->post('brand10')),
            'itemno10' => strip_tags($this->post('itemno10')),
        );


        $insert = $this->MasterListModel->createMasterList($email, $master_data);
        if ($insert) {
            $this->response([
                'status' => TRUE,
                'message' => 'Master list created'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Some problems occurred, please try again.'
            ],  REST_Controller::HTTP_BAD_REQUEST);
        }
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

        $insert = $this->MasterListModel->addMaster($master_data);

        if ($insert) {
            $this->response([
                'status' => TRUE,
                'message' => 'Master item added'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Some problems occurred, please try again.'
            ],  REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function masters_put()
    {
        $master_data = array(
            strip_tags($this->put('user_id')),
            strip_tags($this->put('master_id')),
            strip_tags($this->put('category_id')),
            strip_tags($this->put('order_name')),
            strip_tags($this->put('brand_name')),
            strip_tags($this->put('part_number')),
        );

        $insert = $this->MasterListModel->updateMaster($master_data);

        if ($insert) {
            $this->response([
                'status' => TRUE,
                'message' => 'Master item updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Some problems occurred, please try again.'
            ],  REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function masters_delete()
    {
        $user_id = (int) $this->delete('user_id');
        $master_id = (int) $this->delete('master_id');

        $result = $this->MasterListModel->deleteMaster($user_id, $master_id);

        if ($result) {
            $this->response([
                'status' => TRUE,
                'message' => 'Master item deleted'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Some problems occurred, please try again.'
            ],  REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}