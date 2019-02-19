<?php

class RequestQuotes extends CI_Model {

	/***Table Name****/
	public $request_quotes;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->request_quotes = $this->config->item('request_quotes');
		//check user table exist or not
		//if(!$this->db->table_exists($this->request_quotes)) $this->create_users_table();
	}

	public function insertRequestQuotes($Data){

		$this->db->insert($this->request_quotes, $Data);
		$insertId = $this->db->insert_id();
		
		return $insertId;
	}
	public function GetRequestQuotes($user_id){

		$this->db->select('*');
		$this->db->from($this->request_quotes);
		$this->db->where('user_id', $user_id);
		$this->db->order_by("id", "DESC");
		$query =$this->db->get();		
		return $query->result();
	}
	public function GetRequestQuotesByID($RQID){
		$this->db->select('*');
		$this->db->from($this->request_quotes);
		$this->db->where('id', $RQID);		
		$query =$this->db->get();		
		return $query->row();
	}
	public function UpdateRequestQuotes($RQID, $UpdateData){
		$this->db->where('id', $RQID);
	   	return $rntData = $this->db->update($this->request_quotes, $UpdateData);
		
	}
	public function DeleteRequestQuotes($RQID){
		$this->db->delete($this->request_quotes, array('id' => $RQID));
        return true;
	}

	public function GetRequestQuotesStatus($userId, $status,$limit){
		$this->db->select('*');	
		if($userId)	
		$this->db->where('user_id',$userId);
	    
	    if($status)
		$this->db->where('status',$status);

		$this->db->order_by('id', 'DESC');  
		if($limit){
  		$this->db->limit($limit);
        }
        //else{
        //$this->db->limit('10');
        //}
  		$this->db->from($this->request_quotes);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
	public function GetRequestQuotesSupplierStatus($userId, $status,$limit){
		$this->db->select('request_quotes.*,request_quotes.user_id AS buyer_user_id,assign_request_order.user_id As userId,assign_request_order.status AS assign_status')
         ->from('request_quotes')
         ->join('assign_request_order', 'request_quotes.id = assign_request_order.request_quote_id');
		
		
		if($userId)	
		$this->db->where('assign_request_order.user_id',$userId);
	    
	    if($status)
		$this->db->where('assign_request_order.status',$status);

		$this->db->order_by('request_quotes.id', 'DESC');  
		if($limit){
  		$this->db->limit($limit);
        }
        //else{
        //$this->db->limit('10');
        //}
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
	/*public function GetRequestQuotesCompleted($userId){
		$this->db->select('*');		
		$this->db->where('user_id',$userId);
		$this->db->where('status','complete');
		$this->db->order_by('id', 'DESC');  
  		$this->db->limit('5');
  		$this->db->from($this->request_quotes);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}*/
}


?>
