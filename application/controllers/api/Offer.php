<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Api_external.php';
class Offer extends Rest_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('BuyerOrderDashboardModel');
        $this->load->model('SupplierRequestModel');
        $this->load->library('Api_External');
    }

    public function offers_get($user_id = 0)
    {
        $data =  $this->SupplierRequestModel->supplierOfferlist($user_id);
        if ($data != []) {
            $this->response(['status' => TRUE,  'data' => $data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'No data', 'data' => $data], REST_Controller::HTTP_OK);
        }
    }

    public function offer_post($offer_id = 0)
    {
        $random_id = $this->api_external->generate_random_number($this->input->post('abn'), 'S');
        $offer = [
            'random_offer_id' => $random_id,
            'offer_id_fk' => $offer_id,
            // 1 for no draft 2 for draft
            'form_status' => $this->input->post('is_draft'),
            'product1_quote' => trim($this->input->post('price_1')),
            'product1_reason' => trim($this->input->post('reason_1')),
            'product2_quote' => trim($this->input->post('price_2')),
            'product2_reason' => trim($this->input->post('reason_2')),
            'product3_quote' => trim($this->input->post('price_3')),
            'product3_reason' => trim($this->input->post('reason_3')),
            'product4_quote' => trim($this->input->post('price_4')),
            'product4_reason' => trim($this->input->post('reason_4')),
            'product5_quote' => trim($this->input->post('price_5')),
            'product5_reason' => trim($this->input->post('reason_5')),
            'product6_quote' => trim($this->input->post('price_6')),
            'product6_reason' => trim($this->input->post('reason_6')),
            'product7_quote' => trim($this->input->post('price_7')),
            'product7_reason' => trim($this->input->post('reason_7')),
            'product8_quote' => trim($this->input->post('price_8')),
            'product8_reason' => trim($this->input->post('reason_8')),
            'product9_quote' => trim($this->input->post('price_9')),
            'product9_reason' => trim($this->input->post('reason_9')),
            'product10_quote' => trim($this->input->post('price_10')),
            'product10_reason' => trim($this->input->post('reason_10')),
            'product1_quantity_no' => trim($this->input->post('qty_no_1')),
            'product1_quantity_price' => trim($this->input->post('qty_price_1')),
            'product2_quantity_no' => trim($this->input->post('qty_no_2')),
            'product2_quantity_price' => trim($this->input->post('qty_price_2')),
            'product3_quantity_no' => trim($this->input->post('qty_no_3')),
            'product3_quantity_price' => trim($this->input->post('qty_price_3')),
            'product4_quantity_no' => trim($this->input->post('qty_no_4')),
            'product4_quantity_price' => trim($this->input->post('qty_price_4')),
            'product5_quantity_no' => trim($this->input->post('qty_no_5')),
            'product5_quantity_price' => trim($this->input->post('qty_price_5')),
            'product6_quantity_no' => trim($this->input->post('qty_no_6')),
            'product6_quantity_price' => trim($this->input->post('qty_price_6')),
            'product7_quantity_no' => trim($this->input->post('qty_no_7')),
            'product7_quantity_price' => trim($this->input->post('qty_price_7')),
            'product8_quantity_no' => trim($this->input->post('qty_no_8')),
            'product8_quantity_price' => trim($this->input->post('qty_price_8')),
            'product9_quantity_no' => trim($this->input->post('qty_no_9')),
            'product9_quantity_price' => trim($this->input->post('qty_price_9')),
            'product10_quantity_no' => trim($this->input->post('qty_no_10')),
            'product10_quantity_price' => trim($this->input->post('qty_price_10')),
            'payment_terms' => trim($this->input->post('payment_term')),
            'extra_notes' => trim($this->input->post('extra_notes')),
            'delay_date' => trim($this->input->post('delay_date'))
        ];

        //Move the image to right directory
        $uploaddir = './uploads/';
        $imageCount = 0;
        if ($_FILES['image']) {
            $uploadfile = $uploaddir . basename(time() . $_FILES["image"]['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'],  $uploadfile)) {
                // add image name to the array
                $offer['sp_image1'] = time() . $_FILES["image"]['name'];
                $imageCount++;
            }
        }

        for ($i = 2; $i < 5; $i++) {
            if ($_FILES['image' . $i]) {
                $uploadfile = $uploaddir . basename(time() . $_FILES['image' . $i]['name']);
                if (move_uploaded_file($_FILES['image' . $i]['tmp_name'],  $uploadfile)) {
                    // add image name to the array
                    $offer['sp_image' . $i] = time() . $_FILES['image' . $i]['name'];
                    $imageCount++;
                }
            }
        }

        echo $this->BuyerOrderDashboardModel->SupplierOfferSent($offer_id, $offer);
    }
}