<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_category extends CI_Controller {

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


	public function new_category(){
		$this->form_validation->set_rules('user_id','id','trim|required');
		$this->form_validation->set_rules('name','name','trim|required');
		if($this->form_validation->run() == FALSE){
			$error = strip_tags(validation_errors());

			$result = array(
						'code'	  => '200',
						'status'  => 'failed',
						'message' => $error
					);
			print_r(json_encode($result));
		}else{

			$user_id 	   = $this->input->post('user_id');
			$category_name = $this->input->post('name');

			$data = array('id' => $user_id, 'role' => 'Supplier');

			$query = $this->Category_model->validuser($data);
			if(!empty($query)){

				$value = array('name' => $category_name, 'user_id' => $user_id,'status' => '1');

				$new_cate = $this->Category_model->newcategory($value);

				  $this->db->select('*');
			      $this->db->from('category');
			      $this->db->where('id',$new_cate);
			      $query = $this->db->get();
			      $userData = $query->result_array();

				if(!empty($userData)){
					$result = array(
						'code'	  => '201',
						'status'  => 'success',
						'message' => 'Add new category successfull.',
						'category'=> $userData,
					);
			print_r(json_encode($result));
				}

			}else{
				$result = array(
						'code'	  => '200',
						'status'  => 'failed',
						'message' => 'User not valid to add new category.',
					);
			print_r(json_encode($result));
			}

		}



	}


}
?>