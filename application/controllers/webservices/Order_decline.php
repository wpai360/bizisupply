<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_decline extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Order_model');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
		echo 'hello';
	}


	public function order_reject(){
		$this->form_validation->set_rules('user_id','user_id','trim|required|numeric');
		$this->form_validation->set_rules('request_quote_id','request_quote_id','trim|required|numeric');
		$this->form_validation->set_rules('status','status','trim|required');
		$this->form_validation->set_rules('reson','reson','trim|required');

		if($this->form_validation->run() == FALSE){
			$error = strip_tags(validation_errors());

			$result = array(
						"code" 		=> "200",
						"status"	=> "failure",
						"message"	=> $error,
						);
			print_r(json_encode($result));
		}
		else{
			$user_id 	= $this->input->post('user_id');
			$status 	= $this->input->post('status');
			$reson 		= $this->input->post('reson');
			$request_quote_id = $this->input->post('request_quote_id');

			$assign_data = array(
						"user_id"	=> $user_id,
						"status"	=> $status,
						"reson"		=> $reson,
						"request_quote_id"	=> $request_quote_id,
						);

			$data = array(
						//"id" 		=> $request_quote_id, 
						"id"	=> $user_id
						);
 
			$user_request = $this->Order_model->usercheck($data);
			
			if(empty($user_request)){

				$result = array(
										'code' 		=> '200',
										'status'	=> 'failed',
										'message'	=> "Unauthorization user id",
									);
										
						print_r(json_encode($result));
						

			}else{

					$query = $this->Order_model->assign_request_order($assign_data);
					if(!empty($query)){
						$result = array(
										'code' 		=> '201',
										'status'	=> 'success',
										'message'	=> "Successfully",
									);
										
						print_r(json_encode($result));
				}
				else{
					$result = array(
										'code' 		=> '200',
										'status'	=> 'fail',
										'message'	=> "Unsuccessfully",
									);
										
						print_r(json_encode($result));
				}
			}

	}


}






}
?>