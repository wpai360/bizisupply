<?php

class OrderRequestModel	 extends CI_Model
{

	/***Table Name****/
	public $buyer_orders;


	public function __construct()
	{
		parent::__construct();
		//load config
		$this->config->load('config');
		//get table name
		$this->buyer_orders = $this->config->item('buyer_orders');
	}

	public function insertOrderRequest($Data)
	{
		$this->db->insert($this->buyer_orders, $Data);
		$order_id = $this->db->insert_id();
		$order_random_id = $Data['order_random_id'];   //get random id
		$user_id = $Data['user_id'];   //get user ID
		$this->insert_Offer_List($Data['send_notification_to_suppliers'], $order_id, $order_random_id, $user_id);
		return $this->db->affected_rows();

	}


	public function insert_Offer_List($supplierStringId, $orderId, $orderRandomId, $user_id)
	{
		$supplierStringIdArray = explode(",", $supplierStringId);
		$countOfferList = count($supplierStringIdArray);

		for ($i = 0; $i < $countOfferList; $i++) {
			$arrOfferList[] = array(
				'supplier_user_id' => $supplierStringIdArray[$i],
				'order_id_fk' => $orderId, // get supplier record 
				'order_random_id' => $orderRandomId,
				'buyer_user_id' => $user_id,
				'buyer_notification_to_supplier' => 1
			);
		}

		for ($j = 0; $j < count($arrOfferList); $j++) {
			$this->db->insert('offer_list', $arrOfferList[$j]);
		}
	}
}