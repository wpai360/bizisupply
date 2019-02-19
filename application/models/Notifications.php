<?php

class Notifications extends CI_Model {

	/***Table Name****/
	public $notifications;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->notifications = $this->config->item('notifications');
		//check user table exist or not
		
	}

	public function insertNotification($Data){

		$this->db->insert($this->notifications, $Data);
		return true;
	}

	public function NewNotificationCount(){
		$this->db->where('read_status', "0");
		$this->db->from($this->notifications);
		return $this->db->count_all_results();
	}
	public function CountAllNotification(){
		return $this->db->count_all($this->notifications);
	}
	public function NotificationUpdate(){
		$data = array('read_status' => '1');
		$this->db->where('read_status', '0');
		return $this->db->update($this->notifications,$data);	   	
	}
	public function AllNotification($limit){
		$this->db->select('*');
		if($limit){
  		$this->db->limit($limit);
        }
        $this->db->order_by('id', 'DESC');
		$this->db->from($this->notifications);
		$query =$this->db->get();		
		return $query->result();
	}


}


?>