<?php
/**
 * User Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Gilbert Pellegrom
 * @link http://dev7studios.com
 * @version 1.0
 */

class User extends CI_Model {

	/***Table Name****/
	public $users_table;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->users_table = $this->config->item('users_table');
		//check user table exist or not
		if(!$this->db->table_exists($this->users_table)) $this->create_users_table();
	}

//////////////////////////////////////////////////////////

	/*
	*
	Admin Login
	*
	*/
	public function login($email, $password)
	{
		$query = $this->db->get_where($this->users_table, array('email' => $email,'password' => md5($password),'role' => 'admin','verify' => 1));
		if($query->num_rows()) return $query->row();
		return false;
	}

//////////////////////////////////////////////////////////
   /*
	*
	User Login
	*
	*/
	public function userLogin($email)
	{
		$query = $this->db->get_where($this->users_table, array('email' => $email,'verify' => 1));
		if($query->num_rows())return $query->row();
		return false;
	}
////////////////////////////////////////////////////////	
	/*
	*
	Get User Info
	*
	*/

	public function get_user($user_id)
	{
		$query = $this->db->get_where($this->users_table, array('id' => $user_id));
		
		
		if($query->num_rows()) return $query->row();
		return false;
	}
	

//////////////////////////////////////////////////////////
	
	/*
	*
	Get User Info by email
	*
	*/

	public function get_user_by_email($email)
	{
		$query = $this->db->get_where($this->users_table, array('email' => $email));
		if($query->num_rows()) return $query->row();
		return false;
	}


		public function get_user_by_emailVerify($email)
	{
		$query = $this->db->get_where($this->users_table, array('email' => $email,'verify'=> 1));
		if($query->num_rows()) return $query->row();
		return false;
	}


//////////////////////////////////////////////////////////	
	/*
	*
	setToken for Users
	*
	*/

	public function setToken($user_id,$token)
	{
		$this->db->where('id', $user_id);
		return $this->db->update($this->users_table, array('_token' => $token)); 
	}

//////////////////////////////////////////////////////////	
	/*
	*
	Get User By Role
	*
	*/

	public function get_user_by_role($role)
	{
		$this->db->limit(1);
		$query = $this->db->get_where($this->users_table, array('role' => $role));

		if($query->num_rows()) return $query->row();
		return false;
	}

////////////////////////////////////////////////////////

	/*
	*
	Get Users 
	*
	*/
	public function get_users($order_by = 'id', $order = 'asc', $limit = 0, $offset = 0)
	{
		$this->db->order_by($order_by, $order); 
		if($limit) $this->db->limit($limit, $offset);
		$query = $this->db->get($this->users_table);
		return $query->result();
	}

//////////////////////////////////////////////////////////

	/*
	*
	Count Users
	*
	*/
	public function get_user_count()
	{
		return $this->db->count_all($this->users_table);
	}

//////////////////////////////////////////////////////////	  
	/*
	*
	getRows
	*
	*/

    function getRows($params = array()){

        $this->db->select('*');
        $this->db->from('users');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('username',$params['search']['keywords']);
              $this->db->or_like('email',$params['search']['keywords']);  
            
        }
         $this->db->where('role','user');
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('id',$params['search']['sortBy']);
        }else{
            $this->db->order_by('id','desc');
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
     }

////////////////////////////////////////////////////////

   /*
	*
	Create User
	*
	*/
	
	public function create_user($data)
	{
	/* 	if($data['image']){

      $data = array(
			'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
			'username' => $data['username'],
			'image' => $data['image'],
			'password' => md5($data['password']) // Should be hashed
			);

		}else{

         $data = array(
			'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
			'username' => $data['username'],
			'name' => $data['name'],
			'AB' => $data['name'],
			'password' => md5($data['password']) // Should be hashed
			);

		}*/
		
		$this->db->insert($this->users_table, $data);
		return $this->db->insert_id();
	}

//////////////////////////////////////////////////////////
	
	/*
	*
	Update Users
	*
	*/

	public function update_user($user_id, $data)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->users_table, $data);
	}

/////////////////////////////////////////////////////////

    /*
	*
	Reset Users
	*
	*/

	public function reset_password($user_id, $password)
	{
		$data = array(
			'password' => md5($password), // Should be hashed
			);

		$this->db->where('id', $user_id);
		return $this->db->update($this->users_table, $data); 
	}


//////////////////////////////////////////////////////////
	
	/*
	*
	Delete User
	*
	*/

	public function delete_user($user_id)
	{
		$this->db->delete($this->users_table, array('id' => $user_id));
	}
	
//////////////////////////////////////////////////////////

	/*
	*
	Create User
	*
	*/

	private function create_users_table()
	{
		$this->load->dbforge();
		$this->dbforge->add_field('id INT(11) NOT NULL AUTO_INCREMENT');
		$this->dbforge->add_field('email VARCHAR(200) NOT NULL');
		$this->dbforge->add_field('password VARCHAR(200) NOT NULL');
		$this->dbforge->add_field('created DATETIME NOT NULL');
		$this->dbforge->add_field('last_login DATETIME NOT NULL');
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table($this->users_table);
	}

	public function GetAllUser(){
		$this->db->select('*');
		$this->db->from($this->users_table);
		$this->db->where_not_in('id', 1);
		$query = $this->db->get();
	    return $UserData = $query->result();
	}

	public function getCategorySelected($userId){
		$this->db->select('category');
		$this->db->from($this->users_table);
		$this->db->where('id',$userId);
		$query = $this->db->get();
	    return $CatData = $query->row();
	}

	
	
	
	
	
	
}

/* End of file: user.php */
/* Location: application/models/user.php */

////////////////////////FINISH////////////////////////////
