<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Logout_model');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
		//$this->load->view('webservices/login');
		echo 'hello';
	}


	public function logout_user(){
		$this->form_validation->set_rules('user_id','user_id','trim|required');
		if($this->form_validation->run() == FALSE){
			$error = strip_tags(validation_errors());
			$result = array(
							'code'	 => '200',
							'status' => 'failure',
							'message'=> $error,
						);
			print_r(json_encode($result));
		}
		else{
			$user_id = $this->input->post('user_id');

			$data = array('id' => $user_id);
			$query = $this->Logout_model->logout_user($data);
			//print_r($query);
			if(!empty($query)){
			//print_r($query);



				$logout = array('device_id' => '');
		
				$this->db->where($data);
				$res_update = $this->db->update('users',$logout);
				if($res_update){

						$result = array(
										'code'	  => '201',
										'status'  => 'success',
										'message' => "Logout Successfully.",
								);
								print_r(json_encode($result));			

					}else{
					$result = array(
									'code'	  => '200',
									'status'  => 'fail',
									'message' => "Logout user fail.",
									);	
						print_r(json_encode($result));
					}
			}
			else{
							$result = array(
											'code'	  => '200',
											'status'  => 'fail',
											'message' => "Enter a valid user.",
											);
							print_r(json_encode($result));
					
					}
	


		}


	}

	


}

?>