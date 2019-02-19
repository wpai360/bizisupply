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
									'pro_order_id'=>$orderId,
									'buyer_user_id'=>$user_id,
									'buyer_notification_to_supplier'=>1
							);
		}
		for($j=0; $j < count($arrOfferList); $j++){
			$this->db->insert('offer_list',$arrOfferList[$j]);
			
		}
		
	}
	public function insertOrderRequest($Data){
	$go = count($Data);
		for($i=0;$i< $go ;$i++){
			 $this->db->insert($this->buyer_orders,$Data[$i]);
			 $order_id = $this->db->insert_id();   //get order ID
			 $user_id =$Data[$i]['user_id'];   //get order ID
			 $supplier_id =$Data[$i]['user_id'];   //get order ID
			 $this->insert_Offer_List($Data[$i]['send_notification_to_suppliers'],$order_id,$user_id);
		}
		return 1;
	}
	
}


?>
