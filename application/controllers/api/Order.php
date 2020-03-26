<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Order extends Rest_Controller
{

  function __construct()
  {

    parent::__construct();
    $this->load->model('BuyerOrderDashboardModel');
    $this->load->model('OrderRequestModel');
    $this->load->model('UserCategoryType');
    $this->load->model('user');
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

  public function generate_order_number($abn)
  {
    $length = 1;
    $numberlength = 7;
    $buyer = "B";
    $last_abn_two_digit = substr($abn, -2);
    $randomletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $randomnumber = substr(str_shuffle("0123456789"), 0, $numberlength);
    $random_id = $buyer . $randomletter . $last_abn_two_digit . $randomnumber;
    return $random_id;
  }

  public function searchUserViaOrder($category_id, $user_id)
  {
    $buyer = array("0" => $user_id);
    if (!empty($category_id)) {
      $data = $this->UserCategoryType->getCategoryViaSearch($category_id);
      foreach ($data  as $typeCatId) {
        $getUserIds[] = $typeCatId->user_id;
      }
      $supplierList = array_diff($getUserIds, $buyer);
      print_r($supplierList);
      return $supplierList;
    } else {
      $supplierList = array();
      return $supplierList;
    }
  }


  public function order_post()
  {
    $random_id = $this->generate_order_number($this->input->post('abn'));

    $supplierList  = $this->searchUserViaOrder($this->input->post('category'), $this->input->post('user_id'));
    foreach ($supplierList as $getSupplier) {
      $supplierId[] = $getSupplier;
    }
    // 'notification_to_supplier' => 1
    if (empty($supplierId)) {
      $supplierIdInString = '0';
      $total_sender_Notification = '0';
    } else {
      $total_sender_Notification = count($supplierId);
      $supplierIdInString = implode(",", $supplierId);
    }


    $order = array(
      'user_id' => $this->input->post('user_id'),
      'draft' => $this->input->post('is_draft'),
      'product_assign_category' => $this->input->post('category'),
      'order_name_1' => $this->input->post('order_1'),
      'brand_name_1' => $this->input->post('brand_1'),
      'part_number_1' => $this->input->post('part_no_1'),
      'quantity_1' => $this->input->post('qty_1'),
      'note_1' => $this->input->post('note_1'),
      'order_name_2' => $this->input->post('order_2'),
      'brand_name_2' => $this->input->post('brand_2'),
      'part_number_2' => $this->input->post('part_no_2'),
      'quantity_2' => $this->input->post('qty_2'),
      'note_2' => $this->input->post('note_2'),
      'order_name_3' => $this->input->post('order_3'),
      'brand_name_3' => $this->input->post('brand_3'),
      'part_number_3' => $this->input->post('part_no_3'),
      'quantity_3' => $this->input->post('qty_3'),
      'note_3' => $this->input->post('note_3'),
      'order_name_4' => $this->input->post('order_4'),
      'brand_name_4' => $this->input->post('brand_4'),
      'part_number_4' => $this->input->post('part_no_4'),
      'quantity_4' => $this->input->post('qty_4'),
      'note_4' => $this->input->post('note_4'),
      'order_name_5' => $this->input->post('order_5'),
      'brand_name_5' => $this->input->post('brand_5'),
      'part_number_5' => $this->input->post('part_no_5'),
      'quantity_5' => $this->input->post('qty_5'),
      'note_5' => $this->input->post('note_5'),
      'order_name_6' => $this->input->post('order_6'),
      'brand_name_6' => $this->input->post('brand_6'),
      'part_number_6' => $this->input->post('part_no_6'),
      'quantity_6' => $this->input->post('qty_6'),
      'note_6' => $this->input->post('note_6'),
      'order_name_7' => $this->input->post('order_7'),
      'brand_name_7' => $this->input->post('brand_7'),
      'part_number_7' => $this->input->post('part_no_7'),
      'quantity_7' => $this->input->post('qty_7'),
      'note_7' => $this->input->post('note_7'),
      'order_name_8' => $this->input->post('order_8'),
      'brand_name_8' => $this->input->post('brand_8'),
      'part_number_8' => $this->input->post('part_no_8'),
      'quantity_8' => $this->input->post('qty_8'),
      'note_8' => $this->input->post('note_8'),
      'order_name_9' => $this->input->post('order_9'),
      'brand_name_9' => $this->input->post('brand_9'),
      'part_number_9' => $this->input->post('part_no_9'),
      'quantity_9' => $this->input->post('qty_9'),
      'note_9' => $this->input->post('note_9'),
      'order_name_10' => $this->input->post('order_10'),
      'brand_name_10' => $this->input->post('brand_10'),
      'part_number_10' => $this->input->post('part_no_10'),
      'quantity_10' => $this->input->post('qty_10'),
      'note_10' => $this->input->post('note_10'),
      'notification_to_supplier' => $this->input->post('notification_to_supplier'),
      'prefer_delivery_data' => $this->input->post('delivery_date'),
      'order_description' => $this->input->post('description'),
      'sent_number_ofSupplier_request' => $total_sender_Notification,
      'send_notification_to_suppliers' => $supplierIdInString,
      'is_Request_order_again' => $this->input->post('is_reorder'),
      'order_random_id' => $random_id
    );


    $uploaddir = './uploads/';
    $imageCount = 0;
    //This line will be generating random name for images that are uploaded
    if ($_FILES['image']) {
      $uploadfile = $uploaddir . basename(time() . $_FILES["image"]['name']);
      if (move_uploaded_file($_FILES['image']['tmp_name'],  $uploadfile)) {
        $imageCount++;
      }
    }

    for ($i = 2; $i < 10; $i++) {
      if ($_FILES['image' . $i]) {
        $uploadfile = $uploaddir . basename(time() . $_FILES["image" . $i]['name']);
        if (move_uploaded_file($_FILES['image' . $i]['tmp_name'],  $uploadfile)) {
          $imageCount++;
        }
      }
    }

    // $this->response($imageCount . ' images uploaded');
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