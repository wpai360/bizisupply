<?php

class orderHistoryModel	 extends CI_Model {

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
	  /*                echo   "<pre>";
					   print_r($Data); */
	for($i=0;$i< $go ;$i++){
		$this->db->insert($this-> buyer_orders, $Data[$i]);
		//$insertId = $this->db->insert_id();
		
		//return $insertId; 
	
	}
	
	
	      
/* die;
		$this->db->insert($this->request_quotes, $Data);
		$insertId = $this->db->insert_id();
		
		return $insertId; */
	}
	
}


?>
