<?php
Class Category_model extends CI_Model{


	public function category(){
	  $this->db->select('*');
      $this->db->from('category');
      $this->db->where('status','1');
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;

	}

	public function validuser($data){
	  $this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}

	public function newcategory($value)
	{
		$query = $this->db->insert('category',$value);

		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


	public function cate_detail($user_id)
	{
	  $this->db->select('ut.*,ct.name as category_name,tp.name as type_name');
      $this->db->from('user_cat_type ut');
      $this->db->join('category ct','ut.cat_id = ct.id');
      $this->db->join('types tp','ut.type_id = tp.id');
      $this->db->where('ut.user_id',$user_id);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}

	public function send_gcm($device_token,$message)
	{
		
			       
				$this->load->library('gcm');
				$this->gcm->setMessage($message);
				$this->gcm->addRecepient($device_token);			
				$this->gcm->setTtl(500);
				$this->gcm->setTtl(false);
				$this->gcm->setGroup('Test');
				$this->gcm->setGroup(false);
				$this->gcm->send();
	}
	
	public function supplier_add($value)
	{
		$query = $this->db->insert('user_cat_type',$value);

		$insert_id = $this->db->insert_id();
		return $insert_id;
	}



}

?>