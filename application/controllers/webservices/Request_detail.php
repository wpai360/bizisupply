<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request_detail extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Request_data');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
		echo 'hello';
	}


	public function request_view(){
		$this->form_validation->set_rules('user_id','user_id','trim|required|numeric');

		if($this->form_validation->run() == FALSE){
			$error = strip_tags(validation_errors());
			$result = array(
							'code'		=> '200',
							'stats'		=> 'failed',
							'message'	=> $error,
						);
			print_r(json_encode($result));
		}else{

			$user_id = $this->input->post('user_id');

			$data = array('user_id' => $user_id);

			$query = $this->Request_data->request_quote($user_id);
			if(!empty($query)){

				$result = array(
							'code'			=> '201',
							'status'		=> 'success',
							'message'		=> 'Request get successfully.',
							'request_detail'=> $query,
						);
				print_r(json_encode($result));
			}else{
				$result = array(
							'code'			=> '200',
							'status'		=> 'failed',
							'message'       => 'No request find',
						);
				print_r(json_encode($result));
			}
		}
	}




}
?>