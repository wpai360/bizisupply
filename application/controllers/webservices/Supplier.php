<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Request_model');
		$this->load->model('webservices/Supplier_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
		}
	
	
	public function index()
	{
		
		echo 'hai Inder';
		
	}
	
    
	public function getrequest(){
		
		$this->form_validation->set_rules('user_id', 'User id', 'trim|required|numeric');	
		
		if($this->form_validation->run() == false){	
		
			$error = strip_tags(validation_errors());			
			$message = array(
							'code'=>'200',
							'status'=>'failure',
							'message'=>$error,
							);
			print_r(json_encode($message));
		}
		else{			
			   
		$userid = $this->input->post('user_id');
		$userexist = array('id'=>$userid);
		$user_exist = $this->Request_model->select($userexist);
		if(!empty($user_exist)){
			
		$pending_data = $this->Request_model->req_quotesdata($userid,'pending');
		foreach($pending_data as $key =>$value){
				
				$str = $value['brand'];								
				$brand_arr = explode(",",$str);
				$cont = count($brand_arr);
				for($i=0;$i<$cont;$i++){					
					$brandres[] = $this->Request_model->getbrand_data($brand_arr[$i]);
					//print_r($brandres);
				}
				$pending_data[$key]['brand'] = $brandres;
				unset($brandres);		
				
				$requestimg_id = $value['id'];
				$reqt_img = $this->Request_model->getrequest_img($requestimg_id);
				$pending_data[$key]['images'] = $reqt_img;
				unset($reqt_img);
				
		}
		
	
		$completed_data = $this->Request_model->req_quotesdata($userid,'completed');		
		foreach($completed_data as $key1 =>$value1){				
				$str = $value1['brand'];								
				$brand_arr = explode(",",$str);
				$cont = count($brand_arr);
				for($i=0;$i<$cont;$i++){					
					$brandres1[] = $this->Request_model->getbrand_data($brand_arr[$i]);
					//print_r($brandres);				
				}
					$completed_data[$key1]['brand'] = $brandres1;
					unset($brandres1);

				$requestimg_id = $value1['id'];
				$reqt_img1 = $this->Request_model->getrequest_img($requestimg_id);
				$completed_data[$key1]['images'] = $reqt_img1;
				unset($reqt_img1);

					
		}		
		$processed_data = $this->Request_model->req_quotesdata($userid,'processed');	
		foreach($processed_data as $key2 =>$value2){				
				$str = $value2['brand'];								
				$brand_arr2 = explode(",",$str);
				$cont = count($brand_arr2);
				for($i=0;$i<$cont;$i++){					
					$brandres2[] = $this->Request_model->getbrand_data($brand_arr2[$i]);
					//print_r($brandres);				
				}
					$processed_data[$key2]['brand'] = $brandres2;
					unset($brandres2);	

				$requestimg_id2 = $value2['id'];
				$reqt_img2 = $this->Request_model->getrequest_img($requestimg_id2);
				$processed_data[$key2]['images'] = $reqt_img2;
				unset($reqt_img2);	

					
		}	
		
		
			$message = array(
							'code'=>'201',
							'status'=>'success',
							'message'=>'success',
							'pandign_data'=>$pending_data,
							'completed_data'=>$completed_data,
							'order_data'=>$processed_data,
							);
			print_r(json_encode($message));
		}
		else{
			$message = array(
							'code'=>'200',
							'status'=>'failure',
							'message'=>'User id is not valid',
							);
			print_r(json_encode($message));
		}
		  
		} // end main else here
		
	}

	
	public function getcattye_supplier(){

		$this->form_validation->set_rules('user_id', 'User id', 'trim|required|numeric');	
		$this->form_validation->set_rules('cat_id', 'User id', 'trim|required|numeric');	
		
		if($this->form_validation->run() == false){			
			$error = strip_tags(validation_errors());			
			$message = array(
							'code'=>'200',
							'status'=>'failure',
							'message'=>$error,
							);
			print_r(json_encode($message));
		}
		else{			
			   
			$userid = $this->input->post('user_id');
			$cat_id = $this->input->post('cat_id');

			$wheredata = array('user_id'=>$userid,'cat_id'=>$cat_id);			
			$data_user_cat_type = $this->Supplier_model->user_cat_type_data($wheredata);
			$all_usercat_type = $this->Supplier_model->alluser_cat_type_data();
						
			if(!empty($data_user_cat_type)){
				
				$message = array(
							'code'=>'201',
							'status'=>'success',
							'message'=>'successfully',
							'selected_type'=>$data_user_cat_type,
							'all_type'=>$all_usercat_type,
							);
				print_r(json_encode($message));
			}
			else{
				$message = array(
							'code'=>'201',
							'status'=>'success',
							'message'=>'successfully',
							'selected_type'=>[],
							'all_type'=>$all_usercat_type,
							);
						print_r(json_encode($message));
			}

		}		// Main else End Here
	}	
	
	
}	