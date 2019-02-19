<?php 

class Supplier_model extends CI_Model{
	
	
	function add_request($data)
	{
		$query = $this->db->insert('request_quotes', $data);
		
		$insert_id = $this->db->insert_id();

        return  $insert_id;
		
	}
	
	function images($data){
		
		$query = $this->db->insert('request_images', $data);
		return $query;
		
		} 
		
	function select($data)
	{
		$this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
	
	function select_brand()
	{
		$this->db->select('*');
      $this->db->from('brand');
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
	function select_color()
	{
		$this->db->select('*');
      $this->db->from('color');
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
	function select_types()
	{
		$this->db->select('*');
      $this->db->from('types');
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
	function select_category()
	{
	  $this->db->select('id,name');
      $this->db->from('category');
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}
	
		
	function update($id,$data){
		
		$this->db->where('id',$id);
		$res_update = $this->db->update('users',$data);
		return $res_update;
	}
 
	function req_quotesdata($userid,$status){		
	  $this->db->select('res_q.*,cid.name as colorname,tid.name as type,catid.name as categoryname');
      $this->db->from('request_quotes res_q');
	  $this->db->join('color cid','cid.id = res_q.color');
	  $this->db->join('types tid','tid.id = res_q.types');
	  $this->db->join('category catid','catid.id = res_q.category');
	  $this->db->where('res_q.user_id',$userid);
	  $this->db->where('res_q.status',$status);
	  
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;	
	}
	
	function getbrand_data($id)
	{
		$this->db->select('name');
		$this->db->from('brand');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$rntdata = $query->row_array();
		return $rntdata;
	}
	
	function getrequest_img($requestid)
	{
		$this->db->select('image');
		$this->db->from('request_images');
		$this->db->where('request_id',$requestid);
		$query = $this->db->get();
		$rntdata = $query->result_array();
		return $rntdata;
	}


	function userselect($user_info)
	{
		
	  $this->db->select('ct.*,us.*');
      $this->db->from('user_cat_type ct');
      $this->db->join('users us', 'ct.user_id = us.id');
      $this->db->where('ct.cat_id',$user_info['cat_id']);
      $this->db->where('ct.type_id',$user_info['type_id']);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}


	function user_cat_type_data($data)
	{
		$this->db->select('usrct.type_id,ty.name');
		$this->db->from('user_cat_type usrct');
		 $this->db->join('types ty', 'ty.id = usrct.type_id');
		$this->db->where($data);
		$query = $this->db->get();
		$rntdata = $query->result_array();
		return $rntdata;
	}
	function alluser_cat_type_data(){
		$this->db->select('id,name');
		$this->db->from('types');
		$query = $this->db->get();
		$rntData = $query->result_array();

		return $rntData;

	}   

}







