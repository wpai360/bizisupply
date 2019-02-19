<?php 
class AssignOrderUser extends CI_Model {

	/***Table Name****/
	public $assign_request_order;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->assign_request_order = $this->config->item('assign_request_order');
		
		
	}

	public function insertUserAssignRequestQuote($data){
		//echo $this->assign_request_order." hello";
	//pr($data); die;
		return $this->db->insert_batch('assign_request_order', $data);
		
	}
	
	public function checkRequestSupplierStatus($requestId,$status=null)
	{
		$this->db->select('*')
         ->from('assign_request_order');
         
		
	    
	    if($status)
		$this->db->where('status',$status);
		
		if($requestId)
		$this->db->where('request_quote_id',$requestId);

        //else{
        //$this->db->limit('10');
        //}
		$query = $this->db->get();
	    return $query->num_rows();
	}
	
	public function UpdateRequestSupplierStatusQuotes($RQID, $suppierId,$UpdateData){
		$this->db->where('request_quote_id', $RQID);
		$this->db->where('user_id', $suppierId);
	   	return $rntData = $this->db->update('assign_request_order', $UpdateData);
		
	}
}

?>
