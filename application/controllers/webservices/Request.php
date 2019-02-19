<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Request_model');
		$this->load->model('webservices/Category_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
		}
	
	
	public function index()
	{
		
		echo 'hai Inder';
		
	}
	
    ## send request to admin	
	
	public function product_accesories(){
	
	$brands = $this->Request_model->select_brand();
	
	$color = $this->Request_model->select_color();
	
	$category = $this->Request_model->select_category();
	
	$type = $this->Request_model->select_types();
	
	
	$result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Successfully.",
									"brand" => $brands ,
									"color" => $color ,
									"category" => $category,
									"type" => $type,
								
									);
								
									print_r(json_encode($result));
	
	
	}
	
	public function create_req(){
		
	 $this->form_validation->set_rules('product_name','Product name','trim|required');
	 $this->form_validation->set_rules('serial_number','serial number','trim|required');
	 $this->form_validation->set_rules('user_id','User id','trim|required|numeric'); 	
	 $this->form_validation->set_rules('size','size','trim|required');
	 $this->form_validation->set_rules('color','color','trim|required|numeric');
	 $this->form_validation->set_rules('quantity','quantity','trim|required');
	 $this->form_validation->set_rules('brands','brands','trim|required|numeric'); 	
	 $this->form_validation->set_rules('category','category','trim|required|numeric');
	 $this->form_validation->set_rules('types','types','trim|required|numeric');
	 $this->form_validation->set_rules('descriptions','descriptions','trim|required');
	 $this->form_validation->set_rules('date','date','trim|required'); 	
	 if (empty($_FILES['images']['name'])){
		
		$this->form_validation->set_rules('images','image','trim|required');
		}
	
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
	 
	 $product_name  = $this->input->post('product_name');
	 $serial_number = $this->input->post('serial_number');
	 $user_id 		= $this->input->post('user_id');
	 $size 			= $this->input->post('size');
	 $color 		= $this->input->post('color');
	 $quantity 		= $this->input->post('quantity');
	 $brands 		= $this->input->post('brands');
	 $category 		= $this->input->post('category');
	 $types 		= $this->input->post('types');
	 $descriptions  = $this->input->post('descriptions');
	 $date 			= $this->input->post('date');
	 
	 $req_data=array(
	      'user_id' 	 => $user_id,
		  'product_name' => $product_name,
		  'serial_no' 	 => $serial_number,
		  'size' 		 => $size,
		  'color' 		 => $color,
		  'quantity' 	 => $quantity,
		  'brand' 	 	 => $brands,
		  'category' 	 => $category,
		  'types' 		 => $types,
		  'description'  => $descriptions,
		  'date' 		 => $date,
		  
	 
	 );
	 
	 // print_r($req_data);
	 // die;
	 
	$Req_id = $this->Request_model->add_request($req_data);

	
	$files = $_FILES['images'];
	foreach ($files['name'] as $key => $value) {
		    if ($files['name'][$key]) {
               
			   $name    = time().$_FILES['images']['name'][$key];
			   
			    $_FILES['file']['name']     = $_FILES['images']['name'][$key];
                $_FILES['file']['type']     = $_FILES['images']['type'][$key];
                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
                $_FILES['file']['error']    = $_FILES['images']['error'][$key];
                $_FILES['file']['size']     = $_FILES['images']['size'][$key];
                
				
				
				// File upload configuration
                $uploadPath = "./Request_images/";
                $config['upload_path']   = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] 	 = $name;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
			
			if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData= $fileData['file_name'];
			
			
			$Request_images = array(
								'request_id' => $Req_id,
								'image' => $uploadData,
								);
			$this->Request_model->images($Request_images);
					
                    
                }
				else{
				
				$fileerror = array('error' => strip_tags($this->upload->display_errors()));
				print_r(json_encode($fileerror));
				exit;
				}
			}
			
		}
		# end of foreach #
		$user_info = array('cat_id' => $category,'type_id' => $types);
		$userdata = $this->Request_model->userselect($user_info);
		//print_r($userdata);
		foreach ($userdata as $user_result) {
				$user_records = $user_result;
				//print_r($user_records);
			if(!empty($user_records['device_id']) && $user_records['device_type'] == '1')
			{
				$device_token = $user_records['device_id'];
				 $msg = "You have new request";

            $message = array(
						//'paper_id'          =>$paper_id,
						'message' 			=> $msg,
						'body' 				=> "Request",
						'notificationType' 	=> "Request",
					    'notificationId' 	=> rand(1000, 9999) ,
					    'icon'              => 'myIcon',
						'vibrate' 			=> 1,
						'sound' 			=> 1
					);
			$this->Category_model->send_gcm($device_token,$message);
			}
		}
		


		$result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Request Sent Successfully.",
								
									);
								
									print_r(json_encode($result));
	
	
	}
	 #end of main else
	 
}
	## end of function 
	
}	