<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Register_model');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
	 echo 'Inder';
	}

	
	public function create()
	{
		
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('telephone', 'telephone', 'trim|required|numeric|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('business_name', 'Business name', 'trim|required');
		$this->form_validation->set_rules('ABN', 'ABN', 'trim|required');
		$this->form_validation->set_rules('Address', 'Address', 'trim|required');
		$this->form_validation->set_rules('userType', 'userType', 'trim|required');
		$this->form_validation->set_rules('device_id', 'Device id', 'trim|required');
		$this->form_validation->set_rules('device_type', 'Device type', 'trim|required');
		


		if ($this->form_validation->run() == FALSE)
                {
                       $error = strip_tags(validation_errors());
						$result = array(
							'code' => '200',
							'status'=>'failure',
							'message' => $error
						);
						print_r(json_encode($result));
                }
				else{
					
				$username = $this->input->post('username');
				$telephone = $this->input->post('telephone');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$business_name = $this->input->post('business_name');
				$ABN = $this->input->post('ABN');
				$Address = $this->input->post('Address');
				$userType = $this->input->post('userType');
				$device_id = $this->input->post('device_id');
				$device_type = $this->input->post('device_type');

				
		
			$data_sub = array(
			'username' => $username,
			'email' => $email,
			'password' => md5($password),
			'phone' => $telephone,
			'ABN' => $ABN,
			'address' => $Address,
			'role' => $userType,
			'bussiness_name' => $business_name,
			'device_id' => $device_id,
			'device_type' => $device_type,
			
			);
			
			
			$query = $this->Register_model->register_user($data_sub);
			
			if($query){
			$data_fet= array(
			'id' => $query,
			);
			
			$query_fet = $this->Register_model->login_user($data_fet);
			$result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Registration Successfully.",
									'data' => $query_fet,
									
									);
								
									print_r(json_encode($result));
			
			 }
			
			
			
	
		}
					
				
	}
	
	
	/* ***********   Change password function start **************** */
	
	
	public function Change_pass(){
		
		
	$this->form_validation->set_rules('id','ID','trim|required');
	$this->form_validation->set_rules('old_password','OLD Password','trim|required');
	$this->form_validation->set_rules('New_password','NEW Password','trim|required');
	
		if($this->form_validation->run() == FALSE){
			
			$data = strip_tags(validation_errors());
			$result = array(
							'code' =>'200',
							'status'=>'failure',
							'message'=> $data							
							);
			print_r(json_encode($result));				
			
		}
		else{
				$userid = $this->input->post('id');
				$old_pass = md5($this->input->post('old_password'));
				$new_pass = md5($this->input->post('New_password'));
				
				$data = array('id'=>$userid,'password'=>$old_pass);
				$newpassword = array('password'=>$new_pass);
					
				$result = $this->Register_model->change_pass($data);	
				
				if(!empty($result)){
					
					/* print_r($result);
					die; */
					$tablename = 'users';
					
				//	$this->db->set($newpassword);
					$this->db->where($data);
					$this->db->update($tablename,$newpassword);
					
						$result = array(
							'code' =>'201',
							'status'=>'success'	,
							'message'=>'Your password changed successfully.'
							);
						print_r(json_encode($result));
					
					
				}
				else{
						$result = array(
								'code' =>'200',
								'status'=>'failure',
								'Message'=>'Old password not match Try again.'
								);
						print_r(json_encode($result));
				}
				
		}
	}
	
	
	
	/* ****************  Change password function start ***************** */
	
	
}
