<?php
class BuyerOrderDashboardModel extends CI_Model {

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

	public function insertOrderRequest($Data){
		$go = count($Data);
		for($i=0;$i< $go ;$i++){
			 $this->db->insert($this->buyer_orders, $Data[$i]);
			//$insertId = $this->db->insert_id();
			//return $insertId; 
			
		}
	}
	
	public function getOrderRequest($draft_id,$user_id){
		$this->db->select('*');
		$this->db->from($this->buyer_orders);
		$this->db->where(['draft'=>$draft_id,'is_deleted'=>0,'user_id'=>$user_id]);
		$this->db->order_by("order_id", "DESC");
		$query =$this->db->get();		
		return $query->result();
	}
	public function ViewofferList($user_id,$offer_id){
	

		
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->where(['marked_offer_id'=>$offer_id]);
		$query =$this->db->get(); 
		
		
	return $query->result();
	} 
	
	 public function processOrder($offer_id){
	
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list','supplier_marked_offer.offer_id_fk=offer_list.offer_id');
		$this->db->join('buyer_orders','buyer_orders.order_id=offer_list.pro_order_id');
		$this->db->join('users','offer_list.supplier_user_id=users.id');
		$this->db->where(['offer_id_fk'=>$offer_id]);
		$query =$this->db->get(); 
		
	return $query->result();
	}
	
	
	public function AssignedToBuyerofferList($user_id,$order_id){
		$this->db->select('*');
		$this->db->from('offer_list');
		$this->db->join('buyer_orders', 'offer_list.pro_order_id =  buyer_orders.order_id');
		$this->db->join('users','offer_list.supplier_user_id=users.id');
		$this->db->join('supplier_marked_offer','supplier_marked_offer.offer_id_fk=offer_list.offer_id');
		 //$this->db->where(['offer_list.buyer_user_id'=>$user_id,'supplier_marked_offer.request_wait_response'=>1,' supplier_marked_offer.form_status'=>1,'offer_list.pro_order_id'=>$order_id]);
		 $this->db->where(['offer_list.buyer_user_id'=>$user_id,'supplier_marked_offer.form_status'=>1,'offer_list.pro_order_id'=>$order_id]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();
	return $query->result();
	}                            
	public function SupplierToBuyerOfferList($user_id,$order_id){
		$this->db->select('*');
		$this->db->from('offer_list');
		$this->db->join('buyer_orders', 'offer_list.pro_order_id =  buyer_orders.order_id');
		$this->db->join('users','offer_list.supplier_user_id=users.id');
		$this->db->join('supplier_marked_offer','supplier_marked_offer.offer_id_fk=offer_list.offer_id');
		 $this->db->where(['offer_list.supplier_user_id'=>$user_id,'supplier_marked_offer.request_wait_response'=>1,'buyer_orders.order_id'=>$order_id]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query =$this->db->get();
		return $query->result();
	}
	public function UpdateOrderRequest($order_id){
		$this->db->where('order_id', $order_id);
	   	return $rntData = $this->db->update($this->buyer_orders,['is_deleted'=>1]);
		
	}
	public function getOrderViaPassId($order_id){
		$this->db->select('*');
		$this->db->from($this->buyer_orders);
		$this->db->where(['order_id'=>$order_id,'is_deleted'=>0]);
		$query =$this->db->get();
		return $query->result();
	}
	public function viewOrder($order_id){
		$this->db->select('*');
		$this->db->from($this->buyer_orders);
		$this->db->where(['order_id'=>$order_id]);
		$query =$this->db->get();
		return $query->result();
	}
	public function viewOffer($offer_id){
		$this->db->select('*');
		$this->db->from('offer_list');
		$this->db->where(['offer_id'=>$offer_id]);
		$query =$this->db->get();
		$daa =$query->result(); 
		return $query->result();
	}
	public function UpdateDraftOrderRequest($data,$order_id){
		$this->db->where('order_id', $order_id);
	   	return $rntData = $this->db->update($this->buyer_orders,$data);
		//['is_deleted'=>1]
	}
	
	/* Supplier Marked offer   */
	
	public function supplierOfferforBuyer($attrubute){
		$this->db->insert('supplier_marked_offer', $attrubute);
	}
	
	
	public function SupplierOfferSent($offerId,$attributeMarkedOffer){
		
		$offerSent = ['offer_sent'=>1];
		$this->db->where('offer_id', $offerId);
		$this->supplierOfferforBuyer($attributeMarkedOffer);
	   	return $rntData = $this->db->update('offer_list',$offerSent);
	}
	public function acceptOffer($markedOfferId){
		$offerSent = ['request_wait_response'=>1];
		$this->db->where('marked_offer_id', $markedOfferId);
	   	ECHO  $rntData = $this->db->update('supplier_marked_offer',$offerSent);
	}
	
	
}


?>
