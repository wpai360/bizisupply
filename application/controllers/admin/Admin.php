<?php 
/**Start Work for Admin***/

class Admin extends CI_Controller
{
	/*
	*
	Construction work
	*
	*/
	public function __construct() 
	{		
		/****__construct****/
		parent::__construct();	

        //library
		$this->load->library('session'); 
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('Ajax_pagination');
        $this->perPage = 10;

		//helper
		$this->load->helper('form');	
		
		//model
		$this->load->model('user');
		$this->load->model('section');
		$this->load->model('admin/HomePageModel');
		$this->load->model('category');
		$this->load->model('type');
		$this->load->model('RequestQuotes');
		$this->load->model('notifications');
		$this->load->model('UserCategoryType');


	}

/////////////////////////////////////////////////////////

	/*
	*
	Index Page
	*
	*/

	public function index()
	{
		if($this->session->userdata('admin_user_session'))return redirect('admin/dashboard'); 
		// Admin Dashboard	 
	
		return redirect('admin/login'); // Again login		


		
	}

//////////////////////////////////////////////////////////

	/*
	*
	Admin Login
	*
	*/

	public function login()
	{
		// Redirect to your logged in landing page here
		if($this->session->userdata('admin_user_session'))
			redirect('admin/dashboard');
		/***Login Page content***/
		$data['title'] = 'Admin Login';
		$data['header'] = 'Admin Login';
		$data['error'] = '';

		/***Form Validation***/
		$this->form_validation->set_rules('email', 'Email is', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required',
			array('required' => 'You must provide a  %s.')
			);
        // set rule
		$this->form_validation->set_rules(
			'password', 'password',
			'required|min_length[3]',
			array(
				'required'      => 'You have not provided %s.',
				)
			);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');


		if ($this->form_validation->run())
		{ // if validation is valid
			$result = $this->user->login($this->input->post('email'), $this->input->post('password'));
			if($result){

				$this->session->set_userdata('admin_user_session', $result);

				redirect('admin/dashboard');
			} else {

				//$this->session->set_flashdata('msg','Your email address and/or password is incorrect');
				$data['error'] = 'Your email address and/or password is incorrect.';
			}
		}
		// Redirect to your logged in landing page here
		$this->load->view('admin/login',$data);
	}
/////////////////////////////////////////////////////////

   /*
	*
	Admin Forgot Password
	*
	*/

	public function forgot(){
		$data['title'] = 'Forgot Password'; 
		$data['success'] = false;

		// Redirect to your logged in landing page here
		if($this->session->userdata('admin_user_session')) 
			redirect('admin/dashboard');
		/***Forgot Page content***/

		 //validate
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
		
		if($this->form_validation->run()){

			$email = $this->input->post('email');
			$user = $this->user->get_user_by_email($email);
			$admin = $this->user->get_user_by_role('admin');
			$adminEmail = $admin->email;

			$slug = md5($user->id . $user->email . date('Ymd'));

			$this->email->from($adminEmail, 'Hawkin');
			$this->email->to($email); 
			$this->email->subject('Reset your Password');
			$this->email->message('To reset your password please click the link below and follow the instructions:

				'. site_url('admin/reset/'. $user->id .'/'. $slug) .'

				If you did not request to reset your password then please just ignore this email and no changes will occur.

				Note: This reset code will expire after '. date('j M Y') .'.');	
			if($this->email->send()){
				$token = $this->user->setToken($user->id,$slug);	
				$data['success'] ='yes';
			}
		}
		
		$this->load->view('admin/forgot_password',$data);
	}

//////////////////////////////////////////////////////////

	/*
	*
	Email Exists
	*
	*/

	
	/**
	 * CI Form Validation callback that checks a given email exists in the db
	 *
	 * @param string $email the submitted email
	 * @return boolean returns false on error
	 */

public function email_exists($email)
	{

		if($this->user->get_user_by_emailVerify($email)){
			return true;
		} else {
			$this->form_validation->set_message('email_exists', 'We couldn\'t find that email address.');
			return false;
		}
	}


/////////////////////////////////////////////////////////	
    /*
     *
	 Reset password page
	 *
	 */

	 public function reset()
	 {
		// Redirect to your logged in landing page here
	 	if($this->session->userdata('admin_user_session'))
	 		redirect('admin/dashboard');

	 	$data['success'] = false;
	 	$data['header'] = 'Reset Password';
	 	$data['title'] = 'Reset Password';

	 	$user_id = $this->uri->segment(3);
	 	if(!$user_id) show_error('Invalid reset code.');
	 	$hash = $this->uri->segment(4);
	 	if(!$hash) show_error('Invalid reset code.');

	 	$user = $this->user->get_user($user_id);
	 	if(!$user) show_error('Invalid reset code.');

	 	$slug = md5($user->id . $user->email . date('Ymd'));
	 	if($hash != $slug) show_error('Invalid reset code.');
	 	if(!$user->_token) show_error('You have already updated your password. Now your code has expired. ');

		  // set rule
	 	$this->form_validation->set_rules(
	 		'password', 'password',
	 		'required|min_length[3]',
	 		array(
	 			'required'      => 'You have not provided %s.',
	 			)
	 		);
	 	$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');

	 	if($this->form_validation->run()){

	 		$this->user->reset_password($user->id, $this->input->post('password'));
	 		$data['success'] = true;

	 		$token = $this->user->setToken($user->id,'');	

	 		$this->session->set_flashdata('msg', 'You have successfully reset your password. Please Login with your Updated Password. Thank you.');

	 		return redirect('admin/login'); 
	 	}

	 	return $this->load->view('admin/reset_password', $data);
	 }

   /*
	*
	Admin Dashboard
	*
	*/

	public function dashboard(){
		// Redirect to your logged in landing page here
	if(empty($this->session->userdata('admin_user_session'))) redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data = array();
		$data['TotalUser'] = $this->user->get_user_count();
		$data['TotalCategory'] = $this->category->getCategoryCount();
		$data['TotalType'] = $this->type->getTypeCount();

		

		

		$data['title'] = 'Dashboard';
		$data['user'] = $this->session->userdata('admin_user_session');
		$this->template->set('title', 'Admin Dashboard');
		$this->template->load('admin', 'contents' , 'admin/dashboard', $data);
	}
	public function getNewNotificationsAjax(){
		// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session'))) redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data = array();
		$notifications = $this->notifications->NewNotificationCount();
		$AllNotification = $this->notifications->AllNotification(5);
		$CountAllNotification = $this->notifications->CountAllNotification();
		$noti = '';
		
        //$noti .= '<ul class="menu">';
		foreach ($AllNotification as $AllNotificationVal) {
			$RequestQuotesName = $this->RequestQuotes->GetRequestQuotesByID($AllNotificationVal->rq_id);
			//pr($AllNotificationVal);

			$UserName = $this->user->get_user($AllNotificationVal->user_id);
			/*if($AllNotificationVal->rq_status == 'rejected'){
				$noti .=" has Rejected the RquestQuotes for ".$UserName->name." Buyer";
			}if($AllNotificationVal->rq_status == 'pending'){
				$noti .=" has Request the RquestQuotes for ".$RequestQuotesName->product_name." product";
			}if($AllNotificationVal->rq_status=='awaiting_result'){
				$noti .=" has awaiting for the RquestQuotes from ".$UserName->name." Buyer";
			}*/
			
			$noti .= '<li>';
			$noti .= '<a href="#">';
			$noti .= (
					 ($AllNotificationVal->rq_status == "rejected") ? $UserName->name." has Rejected the RquestQuotes for ".$UserName->name." Buyer" :
					  (($AllNotificationVal->rq_status == "pending") ? $UserName->name." has Request the RquestQuotes for ".$RequestQuotesName->product_name." product" :
					   (($AllNotificationVal->rq_status == "awaiting_result") ? $UserName->name." has awaiting for the RquestQuotes from ".$UserName->name." Buyer" : ""))
					 );
			$noti .= '</a>';
			$noti .= '</li>';

		}
		//$noti .= '</ul>';		
		
		$arr = array($noti, $CountAllNotification, $notifications);
		echo json_encode($arr);

	}
	public function NotificationsAjaxUpdate(){
		if(empty($this->session->userdata('admin_user_session'))) redirect('admin/login');
			header("Access-Control-Allow-Origin: *");
		$notifications = $this->notifications->NotificationUpdate();
		//pr($notifications);
			
	}
	public function ViewAllNotifications(){
		// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session'))) redirect('admin/login');
			header("Access-Control-Allow-Origin: *");
			$data = array();

		$data['AllNotification'] = $this->notifications->AllNotification(0);

		//pr($data['AllNotification']);

		$data['title'] = 'All Notifications';
		$data['user'] = $this->session->userdata('admin_user_session');

		$this->template->set('title', 'All Notifications');
		$this->template->load('admin', 'contents' , 'admin/view_notifications', $data);

	}
//////////////////////////////////////////////////////////		
	/*
	*
	Admin Profile
	*
	*/

	public function profile(){

     // Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");

		$data['user'] = $this->session->userdata('admin_user_session');

		$userId = $this->session->userdata('admin_user_session')->id;   


		$data['title'] = 'Profile';
		$this->template->set('title', 'Profile');

		/***Form Validation***/
		$this->form_validation->set_rules('username', 'Username is', 'required');

        // set rule
		$this->form_validation->set_rules(
			'password', 'password',
			'required|min_length[3]',
			array(
				'required'      => 'You have not provided %s.',
				)
			);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');


		if ($this->form_validation->run())
		{ // if validation is valid

			$getData = $this->input->post();

			if($getData['password'] && $getData['password'] !== 'password'){
				$sendData['password'] = md5($getData['password']);
			}

			$sendData['email'] = $getData['email'];

			$sendData['username'] = $getData['username'];

			if($_FILES['image']['name']){
				$res = $this->uploads($_FILES['image']); 
				if($res){
					$sendData['image'] = $res;
					if($data['user'] && $data['user']->image){
					unlink('assets/uploads/profile/'.$data['user']->image);
				}
				}else{
					$this->session->set_flashdata('msg','');

					return $this->template->load('admin', 'contents' , 'admin/profile', $data);
				}
			}

			$result = $this->user->update_user($userId, $sendData); 
			$this->session->set_flashdata('msg','Your Profile is Updated.');
			$data['user'] =  $this->user->get_user($userId
				);	
			$this->session->unset_userdata('admin_user_session');
			$this->session->set_userdata('admin_user_session', $data['user']);
			$this->session->set_flashdata('imageErr','');

		}else{
			$this->session->set_flashdata('msg','');
		}

		// Redirect to your logged in landing page here
		$this->template->load('admin', 'contents' , 'admin/profile', $data);
	}

//////////////////////////////////////////////////////////	
	/*
	*
	User Section :- Add User
	*
	*/

	public function addUser()  
	{  
	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");

		$data['title'] = 'Add User';
		$data['user'] = $this->session->userdata('admin_user_session');
		$this->template->set('title', 'Add User');

		/***Form Validation***/
		$this->form_validation->set_rules('username', 'Business Name is', 'required');

        // set rule
		$this->form_validation->set_rules(
			'password', 'password',
			'required|min_length[3]',
			array(
				'required'      => 'You have not provided %s.',
				)
			);

		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_rules('ABN', 'ABN is', 'required');

		$this->form_validation->set_rules('address', 'Address is', 'required');

			$this->form_validation->set_rules('name', 'Name is', 'required');


		$this->form_validation->set_rules('phone', 'Phone is', 'required');

		$this->form_validation->set_rules('country', 'Country is', 'required');

		if ($this->form_validation->run())
		{ // if validation is valid


			

				$getData = $this->input->post();
			//echo'<pre>';print_r($sendData);die('a');
			$sendData['password'] = md5($getData['password']);
			$sendData['email'] = $getData['email'];
			$sendData['name'] = $getData['name'];
			$sendData['username'] = $getData['username'];
			$sendData['ABN'] = $getData['ABN'];
			$sendData['country'] = $getData['country'];
			$sendData['address'] = $getData['address'];
			$sendData['phone'] = $getData['phone'];


			$result = $this->user->create_user($sendData); 
			$this->session->set_flashdata('msg','User has been Created.');

			$this->session->set_flashdata('imageErr','');
			return redirect('admin/users');
		}else{
			$this->session->set_flashdata('msg','');
		}

		$this->template->load('admin', 'contents' , 'admin/user/addUser', $data);

	}

	//////////////////////////////////////////////////////////	
	/*
	*
	User Section :- Add User
	*
	*/

	public function UserEdit()  
	{  
	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');

		header("Access-Control-Allow-Origin: *");

		$data['title'] = 'Edit User';
		$data['user'] = $this->session->userdata('admin_user_session');

		$userId = $this->uri->segment(4);
		$user = $this->user->get_user($userId);
		if($user){
			$data['userProfile'] = $user;
			$this->template->set('title', 'Edit '.ucfirst($user->username).' Profile');


			/***Form Validation***/
		$this->form_validation->set_rules('username', 'Business Name is', 'required');

        // set rule
		$this->form_validation->set_rules(
			'password', 'password',
			'required|min_length[3]',
			array(
				'required'      => 'You have not provided %s.',
				)
			);

      if($user->email !== $this->input->post('email')){
				
				$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
			}

		$this->form_validation->set_rules('ABN', 'ABN is', 'required');

		 $this->form_validation->set_rules('address', 'Address is', 'required');

			$this->form_validation->set_rules('name', 'Name is', 'required');


		$this->form_validation->set_rules('phone', 'Phone is', 'required');

		$this->form_validation->set_rules('country', 'Country is', 'required');

			if ($this->form_validation->run())
		{ // if validation is valid

			$getData = $this->input->post();

			if($getData['password'] && $getData['password'] !== 'password'){
				$sendData['password'] = md5($getData['password']);
			}

			$getData = $this->input->post();
			//echo'<pre>';print_r($sendData);die('a');
			$sendData['email'] = $getData['email'];
			$sendData['name'] = $getData['name'];
			$sendData['username'] = $getData['username'];
			$sendData['ABN'] = $getData['ABN'];
			$sendData['country'] = $getData['country'];
			$sendData['address'] = $getData['address'];
			$sendData['phone'] = $getData['phone'];

			$result = $this->user->update_user($userId,$sendData); 
			$this->session->set_flashdata('msg','User has been Updated.');
			return redirect('admin/users');
		}else{
			$this->session->set_flashdata('msg','');
		}
	}else{
		$this->session->set_flashdata('msg','User Not exist');
		return redirect('admin/users');
	}

	$this->template->load('admin', 'contents' , 'admin/user/editUser', $data);

}

/////////////////////////////////////////////////////////	
   /*
	*
	User Section :- List all Users
	*
	*/

 	public function users()  
	{  
	// Redirect to your logged in landing page here
	if(empty($this->session->userdata('admin_user_session')))
		redirect('admin/login');
	header("Access-Control-Allow-Origin: *");

    $data['title'] = 'Users';
    $data['user'] = $this->session->userdata('admin_user_session');
	$this->template->set('title', 'Users');

	 $totalRec = count($this->user->getRows());
        
        //pagination configuration
        $config['target']      = '#userList';
        $config['base_url']    = base_url().'admin/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['users'] = $this->user->getRows(array('limit'=>$this->perPage));


	 $this->template->load('admin', 'contents' , 'admin/user/userList', $data);

    }
    /*
    *
    Delete User
    *
    */
    public function UserDelete(){
    	$userId = $this->input->post('id');
    	return $this->user->delete_user($userId);
    }

//////////////////////////////////////////////////////    
 
   /*
   *
   *
   User Profile
   *
   */

  public function UserProfile(){
   	$userId = $this->uri->segment(4);
     $user = $this->user->get_user($userId);
    $this->template->set('title', ucfirst($user->username).' Profile');
    $data['title'] = 'Profile';
    $data['user'] = $this->session->userdata('admin_user_session');
    $data['userProfile'] = $user;

    $this->template->load('admin', 'contents' , 'admin/user/profile', $data);

  	}
//////////////////////////////////////////////////////////
	
	/*
	*
	Order Section :- Orders
	*
	*/

 	public function order()  
	{  
		// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");

	    $data['title'] = 'Orders';
	    $data['user'] = $this->session->userdata('admin_user_session');

	   	$data['pendingOrder'] = $this->RequestQuotes->GetRequestQuotesStatus('','pending',5);



	    $data['processOrder'] = $this->RequestQuotes->GetRequestQuotesStatus('','processed',5);

	    $data['Ordered'] = $this->RequestQuotes->GetRequestQuotesStatus('','Ordered',5);


	    $data['Completed'] = $this->RequestQuotes->GetRequestQuotesStatus('','Completed',5);

	    
		$this->template->set('title', 'Orders');

		$this->template->load('admin', 'contents' , 'admin/orders', $data);

    }
    public function orderEdit($orderID){
    	if(empty($this->session->userdata('admin_user_session')))
		redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		
		if(isset($_POST['OrderProcessed'])){
		
			$this->form_validation->set_rules('supplier', 'Supplier Name', 'trim|required');
			
			if($this->form_validation->run() == True){

				$updatedata = array ( 'admin_assign_supplier' => $this->input->post('supplier'),
										  'status'				  =>	'processed'					
										);

				$returnReq	=	$this->RequestQuotes->UpdateRequestQuotes($orderID, $updatedata);

				//pr($returnReq);

				if($returnReq == true){
							
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Order was Successfully Updated... </div>');
					redirect('admin/orders');					
				}
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Not able to update Order!</div>');
			}
		}

		$data['Order'] = $this->RequestQuotes->GetRequestQuotesByID($orderID);

		//pr($data['Order']);
		$data['type'] = $this->type->getTypesByID($data['Order']->types);
		$data['category'] = $this->category->getCategoryByID($data['Order']->category);

		$UserCategoryType = $this->UserCategoryType->getUserCategoryType($data['Order']->category, $data['Order']->types );
		//$UserName ="";
		foreach ($UserCategoryType as $UserCategoryTypeValue) {
			$UserName[] = $this->user->get_user($UserCategoryTypeValue->user_id);
			
		}
		if(empty($UserName)){
			$data['supplier_msg'] = 'No Supplier Found in Database. Please Select One from Supplier List.';
		}

		$AllUser = $this->user->GetAllUser();
		
		$data['UserNames'] = (isset($UserName) && !empty($UserName))? $UserName : $AllUser;

		$data['user'] = $this->session->userdata('admin_user_session');
		$data['title'] = 'Assign Supplier with order Status';
		$this->template->set('title', 'Assign Supplier with Order Status');
		$this->template->load('admin', 'contents' , 'admin/orders_edit', $data);
    }

//////////////////////////////////////////////////////////	
	/*
	*
	Logout
	*
	*/

	public function logout()  
	{  
		$this->session->unset_userdata('admin_user_session');
		$this->session->sess_destroy();

		redirect('admin/admin'); 

	}

	/*
	*
	Verify User By Admin
	*
	*/
     
	public function UserStatus()  
	{  
		
		$userId = $this->input->post('id');
		$state = $this->input->post('state');

		if($state == 'active'){
			$data['verify'] = 1;
			/******************************************************/
			$subject = 'Admin Verify Your Account';
			$message = 'Hii,
			Admin has verify your account.Now Login and enjoy your services. Thank you!';

			$this->emails($userId, $subject,$message);

			/********************************************************/
		}else{
			$data['verify'] = 0;
		}
		$result = $this->user->update_user($userId, $data); 
		return true;
	}
//////////////Common Function Section/////////////////

    /*
    *
    Email
    *
    */
    function  emails($userId, $subject,$message){

         $admin = $this->user->get_user_by_role('admin');
			$adminEmail = $admin->email;

           $user = $this->user->get_user($userId);
			$email = $user->email;

			$this->email->from($adminEmail, 'Hawkin');
			$this->email->to($email); 
			$this->email->subject($subject);
			$this->email->message($message);	
			$this->email->send();
    }

 //////////////////////////////////////////////////////
    
   /*
	*
	Admin Upload Image
	*
	*/

	public function uploads($image){

		if(isset($image)){

			$file_name = $image['name'];
			$file_size =$image['size'];
			$file_tmp =$image['tmp_name'];
			$file_type=$image['type'];
			$ex = explode('.',$image['name']);
			$lower = end($ex);
			$file_ext=strtolower($lower);

			$expensions= array("jpeg","jpg","png","gif");

			if(in_array($file_ext,$expensions)=== false){

				$this->session->set_flashdata('imageErr','extension not allowed, please choose a JPEG or PNG file.');
				return false;
			}

			if($file_size > 2097152){

				$this->session->set_flashdata('imageErr','File size less then 2 MB');
				return false;

			}
			$file = date('m_i').'_'.$file_name;
			move_uploaded_file($file_tmp,"assets/uploads/profile/".$file);

			return $file;   
		}

	}
  
 //////////////////////////////////////////////////////
    
    /*
    *
    Ajax Pagination
    *
    */

	public function ajaxPaginationData(){

	 	 $data['title'] = 'Users';
	    $this->template->set('title', 'Users');

        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        
        //total rows count
        $totalRec = count($this->user->getRows($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'admin/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['users'] = $this->user->getRows($conditions);
        $data['start']= $offset;
        
        //load the view
        $this->load->view('admin/user/pagination',$data,false);

    }


/////////////End of Common Function////////////////////



////////////////////////////////////////////////////////////
	/*
	*
	Logo
	*
	*/
	public function logo(){

 // Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

     $data['title'] = 'Logo';
     $this->template->set('title', 'Logo');


  $result = $this->section->getSlug('logo');
     $data['result'] = $result;

      if($this->input->post()){

      $getData = $this->input->post();

           $sendData['name'] = $getData['name'];

           $sendData['description'] = $getData['description'];


			$sendData['slug'] = 'logo';

			if($_FILES['image']['name']){
				$res = $this->uploads($_FILES['image']); 
				if($res){
					$sendData['image'] = $res;

					/*if($result &&  $result->image){
					unlink('assets/uploads/profile/'.$result->image);
				    }*/
				}
			}
           if($result){
           	$id = $result->id;
           	$result = $this->section->update($id, $sendData); 

           		$this->session->set_flashdata('msg','Logo is successfully Updated.');
           }else{
           	$result = $this->section->insert($sendData); 
           		$this->session->set_flashdata('msg','Logo is successfully Added.');
           }
           
			$this->session->unset_userdata('admin_user_session');
			$this->session->set_userdata('admin_user_session', $data['user']);
			$this->session->set_flashdata('imageErr','');
        }

	 $this->template->load('admin', 'contents' , 'common/logo', $data);
	
}

////////////////////////////////////////////////////////////
	
	/*
	*
	Home
	*
	*/
	public function home(){

 // Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

     $data['title'] = 'Home';
     $this->template->set('title', 'Home');

	 $this->template->load('admin', 'contents' , 'common/home', $data);

	}
	public function homeBanner(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['homeBanner'] = $this->HomePageModel->GetAllBanner();
		//pr($data['homeBanner']);

     	$data['title'] = 'Banner';
     	$this->template->set('title', 'Banner');

	 	$this->template->load('admin', 'contents' , 'common/homebanner', $data);

	}

	/*public function AddHomeBanner(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');		

			if(isset($_POST['addNewBanner'])){
				
				//call rand string and upload()
				$ref = rand_string(5);
			
				$img = $_FILES['banner_images'];
				//pr($img);
		
				$ImagePath = 'assets/uploads/homebanner';
				$thumbPath = 'assets/uploads/homebanner/thumbnail';
			
				$imgData = Upload_Single_Images('banner_images', 'ban_'.$ref, $ImagePath, $thumbPath);
				//pr($imgData);
				//$imgData = 	Upload_Single_Images('banner_images', 'ban-'.$ref, $ImagePath, $thumbPath ,1300,643,1300,643);
				
			
				//Validation on Form
				$this->form_validation->set_rules('bannerTitle', 'Banner Title', 'trim|required');
			//	$this->form_validation->set_rules('slideDescription', 'Add Slide Description', 'trim|required');
			//	$this->form_validation->set_rules('buttonText', 'Add Button Text', 'trim|required');
			//	$this->form_validation->set_rules('buttonUrl', 'Add Button Url', 'trim|required');
				
				if ($this->form_validation->run() == True){
					
					$data = 	array 	( 
					'bannerTitle'		=>	$this->input->post('bannerTitle'),	
					//'bannerDescription'	=>	$this->input->post('bannerDescription'),	
			//		'buttonText'		=>	$this->input->post('buttonText'),	
			//		'buttonUrl'			=>	$this->input->post('buttonUrl'),
					'banner_isActive'	=>	$this->input->post('banner_isActive'),
					'image'				=>	$imgData['RtnFileNData']['file_name'],
					);

					//pr($data);
					
					$returnReq	=	$this->HomePageModel->AddHomeBannerInsert($data);

					//pr($returnReq);
					
					if($returnReq == true)
					{
						$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong>Success </strong> New Slide successfully created. </div>');
						redirect('admin/banner');
					}else
					{
						$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to create new slide!</div>');
					}
				}		
				
			}

     	$data['title'] = 'Add Banner';
     	$this->template->set('title', 'Add Banner');

	 	$this->template->load('admin', 'contents' , 'common/createhomebanner', $data);

	}*/


	public function UpdateHomeBanner($slide){

		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(isset($_POST['updateHomeBanner'])){
		
			$this->form_validation->set_rules('bannerTitle', 'Banner Title', 'trim|required');
			//$this->form_validation->set_rules('video_url', 'Banner Video Url', 'trim|required');


			if($this->form_validation->run() == True){

				$updatedata = 	array 	( 
											'bid' 				=> $slide,
											'bannerTitle'		=>	$this->input->post('bannerTitle'),
											'video_url'		=>	$this->input->post('video_url'),			
											'banner_isActive'	=>	$this->input->post('banner_isActive'),					
											);


				if( isset($_FILES["banner_images"]["name"]) && $_FILES["banner_images"]["name"] !="" ) {
					//call rand string and upload()
					$ref = rand_string(5);
					$ImagePath = 'assets/uploads/homebanner';
					$thumbPath = 'assets/uploads/homebanner/thumbnail';
		
					//	$imgData = 	Upload_Single_Images('images', 'rev-'.$ref, $ImagePath, $thumbPath ,1300,643,1300,643);
					$imgData = 	Upload_Single_Images('banner_images', 'ban_'.$ref, $ImagePath, $thumbPath);

					//pr($imgData);
				
					$updatedata['image'] =	$imgData['RtnFileNData']['file_name'];
					
				}

				$returnReq	=	$this->HomePageModel->UpdateBanner($updatedata);

				//pr($returnReq);

				if($returnReq == true){
							
					$this->session->set_flashdata('message','<div class="alert alert-success text-center"> Banner Successfully Updated. </div>');
					redirect('admin/banner');
					
				}
			}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center"> Not able to update banner!</div>');
				}
		}


		$data['bannerdata']	=	$this->HomePageModel->GetslectedBanner($slide);

		$data['title'] = 'Update Banner';
     	$this->template->set('title', 'Update Banner');
	 	$this->template->load('admin', 'contents' , 'common/updatehomebanner', $data);


	}


	public function DeleteHomeBanner($bid){
			
			if(empty($bid)){
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');				
				redirect('admin/banner');
			}
			
			$returnReq	=	$this->HomePageModel->DeleteHomeBanner($bid);
			
			if($returnReq == true){
				
				$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong>Success </strong> Slide Successfully Deleted </div>');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Slide!</div>');
			}
			
			redirect('admin/banner');
			
		}

////////////////////////////////////////////////////////////

public function Testimonials(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');
		
		$data['all_data'] = $this->HomePageModel->GetAllTestimonials();

     	$data['title'] = 'Testimonials';
     	$this->template->set('title', 'Testimonials');

	 	$this->template->load('admin', 'contents' , 'common/testimonials_view', $data);

}
public function AddNewTestimonail(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');
		
		//$data['all_data'] = $this->HomePageModel->GetAllTestimonials();
		if(isset($_POST['addNew_testimonial'])){

			$this->form_validation->set_rules('Name', 'Testimonial Name', 'trim|required');
			$this->form_validation->set_rules('Description', 'Description', 'trim|required');
			$this->form_validation->set_rules('is_active', 'Status', 'trim|required');

			if($this->form_validation->run() == True) {
				$AddData = array(	'name'			=> $this->input->post('Name'),
										'description' 	=> $this->input->post('Description'),
										'is_active' 	=> $this->input->post('is_active'));

				if( isset($_FILES["testimonialMainImage"]["name"]) && $_FILES["testimonialMainImage"]["name"] !="" ) {

					$ImageNewName = 'Testimonial_'.date('Y-m-d_H:i:s').'_'.rand_string(5); /* generate the random name */
					$uploadPath = "assets/uploads/testimonials_images/";
					$imgRetData = Upload_Single_Images('testimonialMainImage', $ImageNewName , $uploadPath );
					if($imgRetData['success'] =="1"){
						$TestimonialImgName			= $imgRetData['RtnFileNData']['file_name'];
					}else{
							
						$TestimonialImgName = "";
						$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
					}

					$AddData['upload_image']	= $TestimonialImgName;

				}
				//pr($AddData);
				$ReturnData = $this->HomePageModel->AddNewTestimonial($AddData);

				if($ReturnData =='1'){
					$this->session->set_flashdata('message','<div class="alert alert-success text-center">Testimonials added Successfully</div>');
					redirect('admin/testimonials');
				}
			}

		}

     	$data['title'] = 'Create Testimonials';
     	$this->template->set('title', 'Create Testimonials');

	 	$this->template->load('admin', 'contents' , 'common/create_testimonial', $data);
	
	}

	public function UpdateTestimonail($Tid){
		if(empty($this->session->userdata('admin_user_session')))
				redirect('admin/login');
			header("Access-Control-Allow-Origin: *");
			$data['user'] = $this->session->userdata('admin_user_session');

			if(isset($_POST['update_testimonial'])){

				$this->form_validation->set_rules('Name', 'Testimonial Name', 'trim|required');
				$this->form_validation->set_rules('Description', 'Description', 'trim|required');
				
				if($this->form_validation->run() == True) {
					$UpdateData = 	array(
										'name' 			=> $this->input->post('Name'),
										'description' 	=> $this->input->post('Description'),
										'is_active' 	=> $this->input->post('is_active')
										);

					if( isset($_FILES["testimonialMainImage"]["name"]) && $_FILES["testimonialMainImage"]["name"] !="" ) {

						$ImageNewName = 'Testimonial_'.date('Y-m-d_H:i:s').'_'.rand_string(5); /* generate the random name */
						
						$uploadPath = "assets/uploads/testimonials_images/";
						
							$imgRetData = Upload_Single_Images('testimonialMainImage', $ImageNewName , $uploadPath ); /* upload image */
						/* pr($imgRetData); */
							
							if($imgRetData['success'] =="1"){
								
								$TestimonialImgName			= $imgRetData['RtnFileNData']['file_name'];
							}else{
								
								$TestimonialImgName = "";
								$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
							}

						
						$UpdateData['upload_image']	= $TestimonialImgName;
					}

					$ReturnData = $this->HomePageModel->UpdateTestimonial($Tid,$UpdateData);

					if($ReturnData =='1'){
						$this->session->set_flashdata('message','<div class="alert alert-success text-center">Testimonials Updated Successfully</div>');
						redirect('admin/testimonials');
					
					}
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>'. validation_errors().'</div>');
					redirect('admin/update-testimonial/'.$Tid);
				}
			}
				

				


			$data['single_data'] = $this->HomePageModel->SingleTestimonail($Tid);

			$data['title'] = 'Update Testimonials';
	     	$this->template->set('title', 'Update Testimonials');
		 	$this->template->load('admin', 'contents' , 'common/update_testimonials', $data);
	}

 	public function DeleteTestimonial($TestimonialID){
	
	   if(empty($TestimonialID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/testimonials');
		}

		$data  = $this->HomePageModel->DeleteTestimonial($TestimonialID);
	
	
		if($data == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Testimonial  Deleted Successfully</div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Testimonial</div>');
		}		
		redirect('admin/testimonials');	
	}

	public function HomeServices(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');
		
		$data['all_data'] = $this->HomePageModel->GetAllServices();

     	$data['title'] = 'Services';
     	$this->template->set('title', 'Services');

	 	$this->template->load('admin', 'contents' , 'common/services_view', $data);

	}
	
	public function AddNewHomeServices(){

 	// Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');		

		if(isset($_POST['addNew_service'])){
			$this->form_validation->set_rules('Name', 'Service Name', 'trim|required');
			$this->form_validation->set_rules('Description', 'Description', 'trim|required');
			$this->form_validation->set_rules('is_active', 'Status', 'trim|required');

			if($this->form_validation->run() == True) {
				$AddData = array(	'name'			=> $this->input->post('Name'),
									'description' 	=> $this->input->post('Description'),
									'is_active' 	=> $this->input->post('is_active')
								);
				
				if( isset($_FILES["ServiceImage"]["name"]) && $_FILES["ServiceImage"]["name"] !="" ) {

					$ImageNewName = 'Service_'.date('Y-m-d_H:i:s').'_'.rand_string(5); 
					$uploadPath = "assets/uploads/service_images/";
					$imgRetData = Upload_Single_Images('ServiceImage', $ImageNewName , $uploadPath );
					if($imgRetData['success'] =="1"){
						$ServiceImgName			= $imgRetData['RtnFileNData']['file_name'];
					}else{
							
						$ServiceImgName = "";
						$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
					}

					$AddData['upload_image']	= $ServiceImgName;

				}
				$ReturnData = $this->HomePageModel->AddNewServices($AddData);


				if($ReturnData =='1'){
					$this->session->set_flashdata('message','<div class="alert alert-success text-center">Services added Successfully</div>');
					redirect('admin/services');
				}
				
			}
		}		

     	$data['title'] = 'Create Services';
     	$this->template->set('title', 'Create Services');

	 	$this->template->load('admin', 'contents' , 'common/create_services', $data);
	
	}

	public function UpdateHomeServices($Sid){
		if(empty($this->session->userdata('admin_user_session')))
				redirect('admin/login');
			header("Access-Control-Allow-Origin: *");
			$data['user'] = $this->session->userdata('admin_user_session');

			if(isset($_POST['update_service'])){
			$this->form_validation->set_rules('Name', 'Service Name', 'trim|required');
			$this->form_validation->set_rules('Description', 'Description', 'trim|required');
			$this->form_validation->set_rules('is_active', 'Status', 'trim|required');

				if($this->form_validation->run() == True) {
					$UpdateData = array(	'name'			=> $this->input->post('Name'),
										'description' 	=> $this->input->post('Description'),
										'is_active' 	=> $this->input->post('is_active')
									);
					
					if( isset($_FILES["ServiceImage"]["name"]) && $_FILES["ServiceImage"]["name"] !="" ) {

						$ImageNewName = 'Service_'.date('Y-m-d_H:i:s').'_'.rand_string(5); 
						$uploadPath = "assets/uploads/service_images/";
						$imgRetData = Upload_Single_Images('ServiceImage', $ImageNewName , $uploadPath );
						if($imgRetData['success'] =="1"){
							$ServiceImgName			= $imgRetData['RtnFileNData']['file_name'];
						}else{
								
							$ServiceImgName = "";
							$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
						}

						$UpdateData['upload_image']	= $ServiceImgName;

					}
					$ReturnData = $this->HomePageModel->UpdateServices($Sid,$UpdateData);

					if($ReturnData =='true'){
						$this->session->set_flashdata('message','<div class="alert alert-success text-center">Services Updated Successfully</div>');
						redirect('admin/services');
					
					}
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>'. validation_errors().'</div>');
					redirect('admin/update-service/'.$Sid);
				}
			}		

		$data['single_data'] = $this->HomePageModel->SingleServices($Sid);

		$data['title'] = 'Update Service';
     	$this->template->set('title', 'Update Service');
	 	$this->template->load('admin', 'contents' , 'common/update_services', $data);
	}

	

	public function DeleteHomeServices($ServiceID){
	
	   if(empty($ServiceID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/services');
		}

		$data  = $this->HomePageModel->DeleteService($ServiceID);
	
	
		if($data == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Testimonial  Deleted Successfully</div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Testimonial</div>');
		}		
		redirect('admin/services');	
	}

	public function PartnerLogo(){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(isset($_POST['upload_partners_logo'])){

			if( isset($_FILES["partners_logo"]["name"]) && $_FILES["partners_logo"]["name"] !="" ) {

				$ImageNewName = 'Partners_logo_'.date('Y-m-d_H:i:s').'_'.rand_string(5); 
				$uploadPath = "assets/uploads/partners_logo/";					

				$imgRetData = GalleyImageUpload('partners_logo', $ImageNewName, $uploadPath, $_FILES);

				if(!empty($imgRetData['Success'])){
					foreach ($imgRetData['Success'] as $GalleryDataDetails) {
							$Partners_logo[]	=  array('pl_file_name' => $GalleryDataDetails['file_name']);
					}
				}
			}

			$ReturnData = $this->HomePageModel->insertPaertnersLogo($Partners_logo);	
			if($ReturnData == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Partners Logo was inserted Successfully</div>');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Partners Logo was not inserted</div>');
			}		
			redirect('admin/partner-logo');	
		}

		$data['all_data'] = $this->HomePageModel->GetAllPartnersLogo();

     	$data['title'] = 'Partner\'s Logo';
     	$this->template->set('title', 'Partner\'s Logo');

	 	$this->template->load('admin', 'contents' , 'common/partners_logo', $data);
    	
	}

	public function UpdatePartnerLogo($plID){
		//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(isset($_POST['update_partners_logo'])){
			if( isset($_FILES["update_partner_logo"]["name"]) && $_FILES["update_partner_logo"]["name"] !="" ) {

				$ImageNewName = 'Partners_logo_'.date('Y-m-d_H:i:s').'_'.rand_string(5); 
				$uploadPath = "assets/uploads/partners_logo/";
				$imgRetData = Upload_Single_Images('update_partner_logo', $ImageNewName , $uploadPath );

				if($imgRetData['success'] =="1"){
					$PartnerImgName			= $imgRetData['RtnFileNData']['file_name'];
				}else{
						
					$PartnerImgName = "";
					$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
				}

				$UpdateData['pl_file_name']	= $PartnerImgName;

			}
			$ReturnData = $this->HomePageModel->UpdatePartnerLogo($plID,$UpdateData);
			if($ReturnData =='true'){
				$this->session->set_flashdata('message','<div class="alert alert-success text-center">Partners Logo Updated Successfully</div>');
				redirect('admin/partner-logo');					
			}

		}


		$data['all_data'] = $this->HomePageModel->GetSinglePartnerLogo($plID);

     	$data['title'] = 'Update Partner\'s Logo';
     	$this->template->set('title', 'Update Partner\'s Logo');

	 	$this->template->load('admin', 'contents' , 'common/update_partners_logo', $data);

	}

	public function DeletePartnerLogo($plID){

		 if(empty($plID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/partner-logo');
		}

		$data  = $this->HomePageModel->DeletePartnerLogo($plID);
	
	
		if($data == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Partners Logo was  Deleted Successfully</div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Partners Logo</div>');
		}		
		redirect('admin/partner-logo');

	}


////////////////////////////////////////////////////////////
	/*
	*
	Contact Us
	*
	*/
	public function contact(){

 // Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['result'] = $this->section->getSlug('contact');

		if(isset($_POST['contact_submit'])){

			$this->form_validation->set_rules('contactNumber', 'Contact Number', 'trim|required');
			$this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');
			$this->form_validation->set_rules('contactAddress', 'Contact Address', 'trim|required');

			if ($this->form_validation->run() == True){

				$contactData = array('contact_number'    => $this->input->post('contactNumber'),
			      			  'contact_email'     => $this->input->post('contactEmail'),
			      			  'contact_address'   => $this->input->post('contactAddress'), 
			      			);

				

					$updateContact = $this->section->update($data['result']->id, $contactData);

					if($updateContact == true){	
						$this->session->set_flashdata('message', 'Record was updated Successfully..');
						redirect(base_url('admin/contact'));
					}else{
						$this->session->set_flashdata('message', 'Record was not updated');
						redirect(base_url('admin/contact'));
					}
				}
			}

     	$data['title'] = 'Contact';
     	$this->template->set('title', 'Contact');

	 	$this->template->load('admin', 'contents' , 'common/contact', $data);

	}	

//////////////////////////////////////////////////////////

	/*
	*
	Social Links
	*
	*
	*/
	
	public function social(){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['result'] = $this->section->getSocialSlug('social_links');
		
		if(isset($_POST['social_submit'])){

			foreach($_POST as $key=>$postdata){
				
				$updateSocialLink = $this->section->UpdateSocialLinks($key, $postdata); 
			}
			
			if($updateSocialLink == true){	
				$this->session->set_flashdata('message', 'Social Links was updated Successfully..');
				redirect(base_url('admin/social_links'));
			}else{
				$this->session->set_flashdata('message', 'Social Links was not updated');
				redirect(base_url('admin/social_links'));
			}
		}
    	$data['title'] = 'Social Links';

     	$this->template->set('title', 'Social Links');

	 	$this->template->load('admin', 'contents' , 'common/social', $data);

	}

	public function GetStarted(){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');
		$data['result'] = $this->section->getSlug('get_started');

		if(isset($_POST['update_get_started'])){

			$this->form_validation->set_rules('first_title', 'First Title', 'trim|required');
			$this->form_validation->set_rules('second_title', 'Second Title', 'trim|required');

			if($this->form_validation->run() == True) {
					$UpdateData = array( 'name'			=> $this->input->post('first_title'),
										 'description' 	=> $this->input->post('second_title')
									);
					if( isset($_FILES["get_started_image"]["name"]) && $_FILES["get_started_image"]["name"] !="" ) {

						$ImageNewName = 'get_started_'.date('Y-m-d_H:i:s').'_'.rand_string(5); 
						$uploadPath = "assets/uploads/get_started/";
						$imgRetData = Upload_Single_Images('get_started_image', $ImageNewName , $uploadPath );
						if($imgRetData['success'] =="1"){
							$ServiceImgName			= $imgRetData['RtnFileNData']['file_name'];
						}else{
								
							$ServiceImgName = "";
							$errorImg	= '<br/><div class="alert alert-danger text-center"><strong>Error ! </strong> '.$imgRetData['error'].'</div><br/>';
						}

						$UpdateData['image']	= $ServiceImgName;

					}

					$ReturnData = $this->section->update($data['result']->id, $UpdateData);

					if($ReturnData =='true'){
						$this->session->set_flashdata('message', 'Data was updated Successfully..');
						redirect('admin/get-started');
					
					}

					
			}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>'. validation_errors().'</div>');
					redirect('admin/get-started');
				}			
			}
    	$data['title'] = 'Get Started';

     	$this->template->set('title', 'Get Started');

	 	$this->template->load('admin', 'contents' , 'common/get_started', $data);

	}

	public function Copyright(){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['result'] = $this->section->getSlug('copyrights');
		
		if(isset($_POST['update_copyrights'])){

			$this->form_validation->set_rules('copyrights', 'Copyrights', 'trim|required');

			if($this->form_validation->run() == True) {

				$UpdateData = array( 'name'			=> 'Copyrights',
									 'description' 	=> $this->input->post('copyrights')
									);

				$ReturnData = $this->section->update($data['result']->id, $UpdateData);

				if($UpdateData == true){	
					$this->session->set_flashdata('message', 'Copyrights was updated Successfully..');
					redirect(base_url('admin/copyright'));
				}

			}else{
				$this->session->set_flashdata('message', 'Copyrights was not updated');
				redirect(base_url('admin/copyright'));
			}
		}
    	$data['title'] = 'Copyrights';

     	$this->template->set('title', 'Copyrights');

	 	$this->template->load('admin', 'contents' , 'common/copyrights', $data);

	}

	public function CategoryList(){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['category'] = $this->category->getCategory();

		$data['title'] = 'Category List';
     	$this->template->set('title', 'Category List');
	 	$this->template->load('admin', 'contents' , 'common/category_list', $data);

	}
	public function CreateCategory(){

		//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(isset($_POST['AddNewCategory'])){
			$this->form_validation->set_rules('categoryName', 'Category Name', 'trim|required|is_unique[category.name]');

			if($this->form_validation->run() == True) {
				$Data = array( 'name'		=> strtoupper($this->input->post('categoryName')),
								'user_id' 	=> $data['user']->id,
								'status' 	=> "1"
									);

				$ReturnData = $this->category->AddNewCategory($Data);

				//pr($ReturnData);
				if($ReturnData){

					$this->session->set_flashdata('message','<div class="alert alert-success text-center">Category was Created Successfully</div>');
					redirect('admin/category');
				}
				
			}
		}

		$data['title'] = 'Add New Category';
     	$this->template->set('title', 'Add New Category');
	 	$this->template->load('admin', 'contents' , 'common/create_category', $data);
	}
	public function UpdateCategory($CatID){

 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		$data['category'] = $this->category->getCategoryByID($CatID);
		
			if(isset($_POST['updateCategory'])){
				$this->form_validation->set_rules('categoryName', 'Category Name', 'trim|required|is_unique[category.name]');

				if($this->form_validation->run() == True) {

				$UpdateData = array( 'name'		=> strtoupper($this->input->post('categoryName')),
									 'user_id' 	=> $data['user']->id
									);


				$ReturnData = $this->category->updateCategory($CatID, $UpdateData);

				if($UpdateData == true){	
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Category Name was updated Successfully..</div>'); 
					redirect('admin/category');
				}
			}
		}

		$data['title'] = 'Update Category';
     	$this->template->set('title', 'Update Category');
	 	$this->template->load('admin', 'contents' , 'common/update_category', $data);

	}

	public function DeleteCategory($CatID){
		if(empty($CatID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/category');
		}

		$data  = $this->category->DeleteCategory($CatID);
	
	
		if($data == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Category Name was  Deleted Successfully</div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Category Name</div>');
		}		
		redirect('admin/category');

	}

	public function TypesList(){
		//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');


		$data['type'] = $this->type->getType();

		$data['title'] = 'Type List';
     	$this->template->set('title', 'Type List');
	 	$this->template->load('admin', 'contents' , 'common/type_list', $data);
	}
	public function CreateTypes(){

		//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(isset($_POST['AddNewTypes'])){
			$this->form_validation->set_rules('typesName', 'Types Name', 'trim|required|is_unique[types.name]');

			if($this->form_validation->run() == True) {
				$Data = array( 'name'		=> strtoupper($this->input->post('typesName')),
									 
								);

				$ReturnData = $this->type->AddNewTypes($Data);

				//pr($ReturnData);
				if($ReturnData=="True"){

					$this->session->set_flashdata('message','<div class="alert alert-success text-center">Type was Created Successfully</div>');
					redirect('admin/types');
				}
				
			}
		}

		$data['title'] = 'Add New Type';
     	$this->template->set('title', 'Add New Type');
	 	$this->template->load('admin', 'contents' , 'common/create_types', $data);
	}

	public function UpdateTypes($TypeID){
 	//Redirect to your logged in landing page here
		if(empty($this->session->userdata('admin_user_session')))
			redirect('admin/login');
		header("Access-Control-Allow-Origin: *");
		$data['user'] = $this->session->userdata('admin_user_session');

		if(empty($TypeID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/types');
		}

		$data['type'] = $this->type->getTypesByID($TypeID);
		
			if(isset($_POST['updateType'])){
				$this->form_validation->set_rules('typeName', 'Type Name', 'trim|required|is_unique[types.name]');

				if($this->form_validation->run() == True) {

				$UpdateData = array( 'name'		=> strtoupper($this->input->post('typeName')),
									 
									);


				$ReturnData = $this->type->updateTypes($TypeID, $UpdateData);

				if($UpdateData == true){	
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Type Name was updated Successfully..</div>'); 
					redirect('admin/types');
				}
			}
		}

		$data['title'] = 'Update Type';
     	$this->template->set('title', 'Update Type');
	 	$this->template->load('admin', 'contents' , 'common/update_types', $data);

	}
	public function DeleteTypes($TypeID){
		if(empty($TypeID)){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid Request! </div>');			
			redirect('admin/types');
		}

		$data  = $this->type->DeleteTypes($TypeID);
	
	
		if($data == true){
		
			$this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Type Name was  Deleted Successfully</div>');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center"><strong>Error ! </strong> Not able to delete Type Name</div>');
		}		
		redirect('admin/types');

	}

	
	
}

/////////////////////FINISH//////////////////////////////
?>