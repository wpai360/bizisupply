<?php

class RequestQuotesStatus extends CI_Model {

	/***Table Name****/
	public $request_quotes_status;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->request_quotes_status = $this->config->item('request_quotes_status');
		//check user table exist or not
		//if(!$this->db->table_exists($this->request_quotes)) $this->create_users_table();
	}

	public function insertRequestQuotesStatus($Data){

		$this->db->insert($this->request_quotes_status, $Data);
		return true;
	}
	

}

?>
