<?php 

class Register_model extends CI_Model{
	
	
	function register_user($data)
	{
		$query = $this->db->insert('users', $data);
		
		$insert_id = $this->db->insert_id();

        return  $insert_id;
		
	}
	
	function login_user($data)
	{	
	  $this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
	function otp_manage($data){
		
		$query = $this->db->insert('otp_management', $data);
		
		return $query;
		}
		/* *********************  function Start change password************************* */
		
		
	function change_pass($data){
		
	  $this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->row();
	  return $userData;
		
	}
	
	function user_update($id,$data){
		
		$this->db->where('id',$id);
		$res_update = $this->db->update('users',$data);
		return $res_update;
	}
	
	function select_user($data){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($data);
		$res_data = $this->db->get();
		$resdata = $res_data->result_array();
		return $resdata; 
	}
	
	
	
	/* *********************  function End change password************************* */
}







