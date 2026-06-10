<?php 
class UserCategoryType extends CI_Model {

	/***Table Name****/
	public $user_cat_type;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->user_cat_type = $this->config->item('user_cat_type');
		
		
	}

	public function insertUserCateType($data){
	
		return $this->db->insert($this->user_cat_type, $data);
		
	}

	public function isExitsCatType($condition){
		$this->db->select('*');
		$this->db->from($this->user_cat_type);
		$this->db->where($condition);
		$query = $this->db->get();
	    return $CatData = $query->row();
	}
	
	public function SelectUserCateType($user_id){
		$this->db->select('*');
		$this->db->from($this->user_cat_type);
		$this->db->where('user_id',$user_id);
		//$this->db->where('cat_id',$cat_ID);
		//$this->db->where('type_id', $type_ID);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
	public function getUserCategoryType($cat_ID, $type_ID){
		$this->db->select('*');
		$this->db->from($this->user_cat_type);
		$this->db->where('cat_id',$cat_ID);
		$this->db->where('type_id',$type_ID);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
	public function getCategoryViaSearch($cat_ID){
		$this->db->select('*');
		$this->db->from($this->user_cat_type);
		$this->db->where('cat_id',$cat_ID);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
	public function getCategoryTypeSelected($user_id){
		$this->db->select('*');
		$this->db->from($this->user_cat_type);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
	    return $CatData = $query->result();
	}
}

?>
