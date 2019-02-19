<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_detail extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Category_model');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
		//$this->load->view('webservices/login');
		echo 'hello';
	}


	public function category_info(){
		$this->form_validation->set_rules('user_id','user_id','trim|required');
		
		if($this->form_validation->run() == FALSE){
			$error = strip_tags(validation_errors());
			$result = array(
							'code'	 => '200',
							'status' => 'failed',
							'message'=> $error,
						);
			print_r(json_encode($result));
		}else{

			$user_id 	 = $this->input->post('user_id');

			$data = array('id' => $user_id);

			$query = $this->Category_model->cate_detail($user_id);
			if(!empty($query)){

				$result = array(
							'code'	  => '201',
							'status'  => 'success',
							'message' => 'category get successfully',
							'category_detail' => $query,
						);
				print_r(json_encode($result));
			}else{
				$result = array(
							'code'	  => '200',
							'status'  => 'failed',
							'message' => 'Enter a valid user.',
						);
				print_r(json_encode($result));
			}
		}

	}





}
?>