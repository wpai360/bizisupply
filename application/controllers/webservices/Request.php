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
		$this->load->model('UserCategoryType');
		$this->load->model('user');
		$this->load->model('OrderRequestModel');
		$this->load->library('email');
		$this->load->model('BuyerOrderDashboardModel'); 
		
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
	
	
	public function product_order(){
		
		
		$data =  json_decode($this->input->post('data'));
		$user_id = $this->input->post('user_id');
		$draftstatus = $this->input->post('draftstatus');
		
		if(count($data) > 0){
		//print_r($data);
			
			foreach($data as $k=> $v){
				
				
				/*** Get User form Category ****/
				$category = $this->UserCategoryType->getCategoryViaSearch($v->category);
				
				foreach($category  as $typeCatId){
					$getUserIds[] =$typeCatId->user_id;
				} 
				$getUqueUserId =array_unique($getUserIds);
				
				
				/**** final array of category users below ********/
				$getUniqueUserId = \array_diff($getUqueUserId, [$user_id]);
				
				
				foreach($getUniqueUserId as $getSupplier){
					
				$check =	$this->user->get_user($getSupplier);
				$supplierId = array();
					if(!empty($check)){
						
						$email= $check->email;  
						array_push($supplierId,$check->id);
						
						$userId= $check->id;  
						$result = $this->user->update_user($check->id,array('notification_to_supplier'=>1));
						
						
						/******************************************************/
							
							$subject = 'Order Request Notification successfully ';
							//$message = 'User '.ucfirst($name). 'successfully register on your site. Thank you.';
							$message = 'Hi,
							Order Request Notification Completed.Now Login and enjoy your services. Thank you!';
							  $this->emails($check->id, $subject,$message);

							/********************************************************/
						 
						}
					
					}
				     // end supplier foreach
					 
					 
				
				if (empty($supplierId)) {
						$supplierIdInString ='0';
						$total_sender_Notification='0';
					 
						
					}
				
				 else{
					$total_sender_Notification =count($supplierId);
				 $supplierIdInString=implode(",",$supplierId);
				 
				 }
				
				
				
				$arr[] =	[
					            'user_id'=>$user_id,
								'draft'=>$draftstatus,
								//'supplier_id'=>0,
								'brand_name'=>$v->brand_name,
								'product_assign_category'=>$v->category,
								'order_name'=>$v->product,
								'part_number'=>$v->partNumber,
								'quantity'=>$v->quantity,
								'prefer_delivery_data'=>$v->prefer_delivery_date,
								'order_description'=>$v->description,
								'sent_number_ofSupplier_request'=>$total_sender_Notification,
								'send_notification_to_suppliers'=>$supplierIdInString
							];
				
				
				
				}
			    // end main foreach
				
				$this->OrderRequestModel->insertOrderRequest($arr);
				
				
			$result = array('code'=>201,'status'=>'success','message'=>'Successfully');	
				
				 echo json_encode($result);
			}
	         // end main if here	
		
		else{
			$result = array('code'=>200,'status'=>'fail','message'=>'Please fill the Fields');	
				
				 echo json_encode($result);
			
			}
		
}

	/*
    *
    *cancel Order
    *
    */
 public function cancelOrder_by_buyer(){
  $this->form_validation->set_rules('order_id', 'Order id', 'trim|required|numeric');
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
		  $order_id =  $this->input->post('order_id');
		   $update = $this->BuyerOrderDashboardModel->UpdateOrderRequest($order_id);
		   if($update){
			   $result = array('code'=>201,'status'=>'success','message'=>'Order Cancel Successfully');	
				
				 print_r(json_encode($result));
			   }
			   else{
				   $result = array('code'=>200,'status'=>'fail','message'=>'Opps Something went Wrong');	
				
					print_r(json_encode($result));
				   }
		
		}
 
 }
	
	/*
    *
    orderHistory
    *
    */
	 
	public function orderHistory(){
		    
			$this->form_validation->set_rules('user_id', 'User id', 'trim|required|numeric');
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
			$user_id = $this->input->post('user_id');
			$data = $this->BuyerOrderDashboardModel->allOrderHistory($user_id);	
			$result = array('code'=>201,'status'=>'success','message'=>'Successfully','data'=>$data);	
				
			 print_r(json_encode($result));
			}		
   }
	
	
	
/*
    *
    Email
    *
    */
    public function  emails($userId, $subject,$message){
			$admin = $this->user->get_user_by_role('admin');
			$adminEmail = 'seamaszhou@gmail.com';
			$user = $this->user->get_user($userId);
			$email = $user->email;
			$this->email->from($adminEmail, 'Hawkin');
			$this->email->to($email); 
			$this->email->subject($subject);
			$this->email->message($message);	
		 	$this->email->send();
    }
	
	
	
	
}	