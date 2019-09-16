<?php

class SupplierRequestModel extends CI_Model{

	/***Table Name****/
	 public $offer_list;
	

	public function __construct()
	{
		parent::__construct();
       //load config
		$this->config->load('config');
        //get table name
		 $this->offer_list = $this->config->item('offer_list');
		
	}
	
	public function supplierOfferlist($user_id){
	   $this->db->select('*');
	   $this->db->from($this->offer_list);
	   $this->db->join('buyer_orders', 'offer_list.order_random_id = buyer_orders.order_random_id');
	  // $this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id');
	   $this->db->where(['offer_list.supplier_user_id'=>$user_id,'offer_list.buyer_notification_to_supplier'=>1,'offer_list.ignoreOffer'=>0]);
	   $this->db->order_by("offer_list.offer_id", "DESC");
	   $query =$this->db->get();	
			//pr($query->result());
			//die;		
			//die;		
		return $query->result();
	}
	
	public function draftOfferlist($user_id){
	   $this->db->select('*');
		$this->db->from($this->offer_list);
		$this->db->join('buyer_orders', 'offer_list.order_random_id = buyer_orders.order_random_id');
		$this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id');
		//$this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id');
		$this->db->where(['offer_list.supplier_user_id'=>$user_id,'offer_list.buyer_notification_to_supplier'=>1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();	
			//pr($query->result());
		//	die;		
			//die;		
		return $query->result();
	}
	
	
	public function check_Offer($offer_id){
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','offer_list.offer_id = supplier_marked_offer.offer_id_fk');
		$this->db->where(['supplier_marked_offer.offer_id_fk'=>$offer_id]);
		$query =$this->db->get(); 
		return $query->result();
	}
	public function markedResponse($offer_id,$supplier_id){
	   $this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','supplier_marked_offer.offer_id_fk=offer_list.offer_id');
		$this->db->join('buyer_orders','buyer_orders.order_random_id=offer_list.order_random_id');
		$this->db->join('users','offer_list.supplier_user_id=users.id');
		$this->db->where(['supplier_marked_offer.offer_id_fk'=>$offer_id]);
        //$this->db->where(['supplier_marked_offer.offer_id_fk'=>$offer_id,'offer_list.supplier_user_id'=>$suulier_id]);
		$query =$this->db->get(); 
		
	return $query->result();
	}
	public function OfferSentList($user_id){
	//ECHO $user_id;
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders','offer_list.order_random_id=buyer_orders.order_random_id');
		//$this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id');//$this->db->where(['offer_list.buyer_user_id'=>$user_id,'offer_list.request_wait_response'=>1,'buyer_orders.order_random_id'=>$order_id]);
		$this->db->where(['offer_list.supplier_user_id'=>$user_id,' supplier_marked_offer.form_status'=>1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();
		/* $aa =$query->result();
		echo "<pre>";
		print_r($aa); */
		return $query->result();
	
	/* $this->db->select('*');
		$this->db->from($this->offer_list);
		$this->db->where(['offer_list.offer_sent'=>1,'offer_list.supplier_user_id'=>$user_id]);
		$this->db->order_by("offer_id", "DESC");
		$this->db->join('buyer_orders', 'offer_list.order_random_id = buyer_orders.order_random_id');
		$query =$this->db->get();		
		 return $query->result(); */
	}
	
	
		public function requestInSupply($user_id){
	//ECHO $user_id;
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders','offer_list.order_random_id=buyer_orders.order_random_id');
		$this->db->join('users','offer_list.supplier_user_id=users.id');
		$this->db->where(['offer_list.supplier_user_id'=>$user_id,' supplier_marked_offer.form_status'=>1,' supplier_marked_offer.request_wait_response'=>1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();
		 $aa =$query->result();
		/* echo "<pre>";
		print_r($aa);  */
		return $query->result();
	}
	
	
	
	public function marks_as_paid($markedOfferId){
		$offerSent = ['supplier_payment_mark_received'=>1];
		$this->db->where('marked_offer_id', $markedOfferId);
	   	echo   $rntData = $this->db->update('supplier_marked_offer',$offerSent);
	}
	public function transits_mark_as_recieved($markedOfferId,$traking_Info,$logistic){
		//die($traking_Info);
		//die($logistic);
		$offerSent = ['supplier_delivery_transit_status'=>1 ];
		$this->db->where('marked_offer_id', $markedOfferId);
		$this->db->update('supplier_marked_offer', array('supplier_delivery_transit_status' => 1,'traking_Info'=>$traking_Info,'logistic'=>$logistic));
	   	echo   $rntData = $this->db->update('supplier_marked_offer',$offerSent);
	}
	public function rejectOfferfN($random_id, $product_id){
		$product = 'product'.$product_id.'_status';
		$offerSent = [$product=>4];
		$this->db->where('random_offer_id', $random_id);
	   	echo   $rntData = $this->db->update('supplier_marked_offer',$offerSent);
	}	
	
	public function supplierAcceptfN($random_id, $product_id){
		$product = 'product'.$product_id.'_status';
		$offerSent = [$product=>3];
		$this->db->where('random_offer_id', $random_id);
		echo   $rntData = $this->db->update('supplier_marked_offer',$offerSent); 
	}

	public function supplierAcceptNewQty($random_id, $product_id){
		$product = 'product'.$product_id.'_status';
		$offerSent = [$product=>5];
		$this->db->where('random_offer_id', $random_id);
		echo   $rntData = $this->db->update('supplier_marked_offer',$offerSent); 
	}
	
	public function allOrderHistory($user_id){
	
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders','offer_list.order_random_id=buyer_orders.order_random_id');
		$this->db->join('users','offer_list.buyer_user_id=users.id');
		//$this->db->where(['offer_list.supplier_user_id'=>$user_id,'supplier_marked_offer.form_status'=>1,' supplier_marked_offer.buyer_payment_mark_paid'=>1,'supplier_marked_offer.supplier_payment_mark_received'=>1,' supplier_marked_offer.buyer_delivery_transit_status'=>1,'supplier_marked_offer.supplier_delivery_transit_status'=>1]);
		$this->db->where(['offer_list.supplier_user_id'=>$user_id,'supplier_marked_offer.form_status'=>1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();
/* 		$aa =$query->result();
		 echo "<pre>";
		print_r($aa);  */ 
		return $query->result();
	}
	
	public function updateAndPublisOffer($data,$offer_id_fk){
	
		$this->db->where('offer_id_fk', $offer_id_fk);
	   	echo   $rntData = $this->db->update('supplier_marked_offer',$data);
	}
	
	
	
	public function ignoreOffer($offer_id){
		$ignore = ['ignoreOffer'=>1];
		$this->db->where('offer_id', $offer_id);
	   	echo   $rntData = $this->db->update('offer_list',$ignore);
	}
	
	public function allactiOnOffer($offer_id){
		$ignore = ['ignoreOffer'=>1];
		$this->db->where('offer_id', $offer_id);
	   	echo   $rntData = $this->db->update('offer_list',$ignore);
	}
	
		
}


?>
