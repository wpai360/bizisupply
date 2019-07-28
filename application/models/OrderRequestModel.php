<?php

class OrderRequestModel	 extends CI_Model {

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
	
	public function insert_Offer_List($supplierStringId,$orderId,$user_id){
	    $supplierStringIdArray = explode(",",$supplierStringId);
		$countOfferList = count($supplierStringIdArray);
		for($i=0; $i < $countOfferList; $i++){
			$arrOfferList[] =array(
									'supplier_user_id'=>$supplierStringIdArray[$i], // get supplier record 
									'order_random_id'=>$orderId,
									'buyer_user_id'=>$user_id,
									'buyer_notification_to_supplier'=>1
							);
		}
		for($j=0; $j < count($arrOfferList); $j++){
			$this->db->insert('offer_list',$arrOfferList[$j]);
			
		}
		
	}
	public function insertOrderRequest($Data, $mlData){
	$this->db->insert($this->buyer_orders,$Data[0]);
	$order_id = $this->db->insert_id();
	$order_random_id = $Data[0]['order_random_id'];   //get random id
	$user_id =$Data[0]['user_id'];   //get order ID
	$supplier_id =$Data[0]['user_id'];   //get order ID
	$this->insert_Offer_List($Data[0]['send_notification_to_suppliers'],$order_random_id,$user_id);
	$go2 = count($mlData[0]);
		for($j=0;$j<$go2;$j++){
			$this->db->insert('master_list',$mlData[0][$j]);
		}
		return 1;
	}
	
}


?>
