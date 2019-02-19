<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Register_model');
		$this->load->library('form_validation');
		$this->load->library('upload');	
		$this->load->helper(array('form', 'url'));
		
		
		}
	
	
	public function index()
	{
		//$this->load->view('webservices/login');
		echo 'Inder';
	}
	
	public function login_user()
	{
	
	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
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
	 
	
	$email = $this->input->post('email');
	$pass = $this->input->post('password');
	$userType = $this->input->post('userType');
	$device_id = $this->input->post('device_id');
	$device_type = $this->input->post('device_type');
				
				$data_log = array(
			'email' => $email,
			'password' => md5($pass),
			'role' => $userType,
	
			);
			
			$data1 = array(
			'device_id' => $device_id,
			'device_type' => $device_type,	
	        );
			
			
			$query = $this->Register_model->login_user($data_log);
			
				  
				  if($query){
				  
					      $pid = $query[0]['id'];
					  
							$table_name = 'users';
					$this->db->where('id', $pid);
					$query2 = $this->db->update($table_name,$data1);
					  
					  $result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Login Successfully.",
									'data'=>$query,
									
									);
								
									print_r(json_encode($result));
					  
					  }
					  else{
						  $result = array(
									'code' => '200',
									'status'=>'fail',
									'message' => "Invalid User and Password"
									);
								
									print_r(json_encode($result));
						  
						  
						  }
				
				
	
	}
	
	}
	
	
	
	/********* Forget Password **********************/
	
	public function forget_pass(){
	
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		
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
					
		         $email = $this->input->post('email');
				 
				  $this->db->select('*');
				  $this->db->from('users');
				  $this->db->where('email',$email);
				  $query = $this->db->get();
				  $userData = $query->result_array();
				//  print_r($userData);
				//  die('test');
				
				if(!empty($userData)){  
				$uname = $userData[0]['username'];
				  $uid = $userData[0]['id'];
				  $otp = rand(1000,10000);
				  
				  $data1 = array(
				  'otp' => $otp,
				  );
				  $table_name = 'users';
				$this->db->where('id', $uid);
				$query2 = $this->db->update($table_name,$data1);
		
		
		
		if($query2){
		
		       $subject = "Forget Password";
				$to_email = $email;
				$from = 'testdemo198@gmail.com';
				
			/******************* Email ***************************/
			$headers = 'From: Hawkisupply' . "\r\n" ;
			$headers .='Reply-To: '. $from . "\r\n" ;
			$headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			
			/****************** End *******************************/
			
			
			$message="<html><body><p>Hi ".$uname.", </p><p>Otp is ".$otp."</p></body></html>";
					
					mail($to_email, $subject, $message,$headers);
					
			//custom_mail($to_email,$subject,$message,$from);		
			
		
			
			 $result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Otp has been sent Successfully.",
									'otp'     => $otp,
									);
									print_r(json_encode($result));
			
			}
			
			
					 
				 
		else{
			$result = array(
									'code' => '200',
									'status'=>'fail',
									'message' => "Invalid Email.",
									);
									print_r(json_encode($result));
			
			
			}		 
				 
		}
		
		else{
			$result = array(
									'code' => '200',
									'status'=>'fail',
									'message' => "Invalid Email.",
									);
									print_r(json_encode($result));
			
			
			}		 
	}
}	
	
	
	/********* Reset ************************************/
	
	public function reset_pass(){
		
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('otp', 'Otp', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password', 'trim|required');
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
			$email = $this->input->post('email');
			$otp = $this->input->post('otp');
	        $npass = $this->input->post('new_password');
		$CHdata= array(
		'email' => $email,
		'otp' => $otp,
		);	
			
		$this->db->select("*");
		$this->db->from('users');
		$this->db->where($CHdata); 
		$query = $this->db->get();
		$res = $query->result();
		// print_r($res);
		// die;
		if(!empty($res)){
			
			$idd = $res[0]->id;
			
			$data=array(
			'password'=>md5($npass),
			);
			
			$table_name = 'users';
	$this->db->where('id', $idd);
   $query2 = $this->db->update($table_name,$data);
   
   if($query2){
   
   $data3 =array(
    'otp' =>'',
	);
   $table_name2 = 'users';
	$this->db->where('id', $idd);
   $query3 = $this->db->update($table_name2,$data3);
   
	   
	   $result = array(
									'code' => '201',
									'status'=>'success',
									'message' => "Password has been Updated Successfully.",
									);
									print_r(json_encode($result));
	   
	   }
			
			
			}
		else{
			$result = array(
									'code' => '200',
									'status'=>'fail',
									'message' => "Wrong Email and Otp .",
									);
									print_r(json_encode($result));
			
			
			}	
			
			}
	
}

 function update_profile(){
	 $this->form_validation->set_rules('user_id','User ID','trim|required');
		
	 $this->form_validation->set_rules('user_name','Name','trim|required');
	 
	 $this->form_validation->set_rules('full_name','Full Name','trim|required');
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
				$user_name = $this->input->post('user_name');
				$full_name = $this->input->post('full_name');
				/**********profile_pic **************************/
				
				if (!empty($_FILES['profile_image']['name']))
				{			
				$new_name = time().$_FILES["profile_image"]['name'];
				
				$path = "./profile_image/";
				$config['upload_path']   = $path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '0';
				$config['file_name'] = $new_name;
				  
				$this->load->library('upload', $config);
				 
				if ($this->upload->do_upload('profile_image'))
				{
					$img = $this->upload->data();
					$image =  $img['file_name'];               
				}
			else{
				
				$fileerror = array('error' => strip_tags($this->upload->display_errors()));
				print_r(json_encode($fileerror));
				exit;
				}
			}
				/**********End profile_pic ************************/
				
			if (empty($_FILES['profile_image']['name'])){	
		 		$up_data = array(
				 'name' => $user_name,
				 'full_name' => $full_name,
				 );
			}
			else{
				$up_data = array(
				 'name' => $user_name,
				 'full_name' => $full_name,
				 'profile_image' => $image,
				 );
				
				}
			//print_r($up_data);
			$update =	$this->Register_model->user_update($user_id,$up_data);
			if($update){
		
				$data_up=array(
				'id'=> $user_id,
				);		   
				$fetch_data = $this->Register_model->select_user($data_up);		
				$result = array(
									'code' => '201',
									'status'=>'Success',
									'message' =>'Successfully',
									'user_id'=> $fetch_data[0]['id'],
									'full_name'=> $fetch_data[0]['full_name'],
									'name'=> $fetch_data[0]['name'],
									'profile_image'=> $fetch_data[0]['profile_image'],
									);								
									print_r(json_encode($result));			
			}
			else{
				
				$result = array(
						'code' => '200',
						'status'=>'fail',
						'message' =>'user deos not Exist',
						);								
						print_r(json_encode($result));				
				}
				
			}			
	             // end main else
	}
	
	function get_profile(){		 
	$this->form_validation->set_rules('user_id','User ID','trim|required|numeric');		
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
		$data = array('id'=>$user_id);
		$u_data = $this->Register_model->login_user($data);		
		
		if(!empty($u_data)){
			
			$result = array(
			'code' => '201',
			'status'=>'success',
			'data' => $u_data,
			);
			print_r(json_encode($result));
		}	
		else{
			
				$result = array(
				'code' => '200',
				'status'=>'failure',
				'message' => 'user id not valid .',
				);
				print_r(json_encode($result));
			}	
		}  // Main else end here 				
	}
	
	
	function edit_profile(){		 
	$this->form_validation->set_rules('user_id','User ID','trim|required|numeric');		
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
		$data = array('id'=>$user_id);
		$u_data = $this->Register_model->login_user($data);
		
		if(!empty($_FILES["image"]["name"])){
			
			$new_name = time().$_FILES["image"]["name"];
			
			$path = "./profile_image/";
			$img_name = rand_string(5).$_FILES["image"]["name"]; 
			$imgRetData = Upload_Single_Images('image', $img_name , $path );
			
			if (!empty($imgRetData))
			{
				$img = $this->upload->data();
				$image =  $img['file_name'];
				$final = array('image'=>$image);
				$u_profileimg = $this->Register_model->user_update($user_id, $final);
			}
			else
			{	
			$fileerror = array('error' => strip_tags($this->upload->display_errors()));
			print_r(json_encode($fileerror));
			exit;
			} 			
		}

		
		if(!empty($u_data)){
			//print_r($u_data);die;
			foreach($_POST as $key => $value){				
				if(empty($value)){
					unset($key);		
					unset($value);	
				}
				elseif($key == 'user_id'){
					unset($key);		
					unset($value);
				}
				else{
					$Fdata[$key] = $value;
				}				
			}
			if(isset($Fdata)&& !empty($Fdata)){
				$final = $Fdata;
				/* print_r($final);
				die(); */
				$result = $this->Register_model->user_update($user_id, $final);
				if(!empty($result)){
					$final = 'successfully.';
				}
			}
			else{
				$final = '';
			}				
			$result = array(
				'code' => '201',
				'status'=>'success',
				'message'=> 'success',
				'data' => $final,
				);
			print_r(json_encode($result));			
		}	
		else{			
				$result = array(
				'code' => '200',
				'status'=>'failure',
				'message' => 'user id not valid . ',
				);
				print_r(json_encode($result));
			}		
		}  // Main else end here 				
	}
	
	
	
	
	
	
	
}