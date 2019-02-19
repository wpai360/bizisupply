<?php
class Order_model extends CI_Model{
	
	
	function assign_request_order($assign_data)
	{
		$query = $this->db->insert('assign_request_order', $assign_data);
		
		$insert_id = $this->db->insert_id();

        return  $insert_id;
		
	} 

	function request_data($data)
	{
		$this->db->select('*');
      $this->db->from('request_quotes');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}

	function usercheck($data)
	{
		$this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}


}

?>