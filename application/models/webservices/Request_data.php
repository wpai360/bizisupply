<?php
Class Request_data extends CI_Model{

	public function request_quote($user_id){
	  $this->db->select('rq.*');
      $this->db->from('user_cat_type ct');
      $this->db->join('request_quotes rq','ct.cat_id = rq.category and ct.type_id = rq.types');
      $this->db->where('ct.user_id',$user_id);
      $query = $this->db->get();
      $userData = $query->result_array();
	  return $userData;
	}


}
?>