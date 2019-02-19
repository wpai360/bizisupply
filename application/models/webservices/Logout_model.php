<?php
Class Logout_model extends CI_Model{


	public function logout_user($data)
	{
			
	  $this->db->select('*');
      $this->db->from('users');
      $this->db->where($data);
      
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
				$gcm = $this->gcm->send();
				
				if($gcm){
					echo 'yes';
				}
				else{
					echo "no";
				}
	}


}


?>