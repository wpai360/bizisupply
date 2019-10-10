<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
	{		
		/****__construct****/
		parent::__construct();	

        //library
		$this->load->library('session'); 
		$this->load->library('email');
		$this->load->library('form_validation');

		//helper
		$this->load->helper('form');
		
		//model
		$this->load->model('user');
		$this->load->model('section');
		$this->load->model('RequestQuotes');
		$this->load->model('admin/HomePageModel');
		$this->load->model('type');
	    $this->load->model('contact');
	    $this->load->model('Chat');

	}

////////////////////////////////////////////////////////////	
	/*
	*
	Home Page
	*
	*/

	public function index()
	{
		$data['title'] = 'Hawki';
		$data['common'] = frontInfo();
		//echo '<pre>';print_r(frontInfo());die('a');
		$data['Testimonials'] =  $this->HomePageModel->GetAllTestimonials();
		$data['Services'] = $this->HomePageModel->GetAllServices();
		$data['Banner'] = $this->HomePageModel->GetAllBanner();
		$data['PartnersLogo'] = $this->HomePageModel->GetAllPartnersLogo();
		//pr($data);die('a');
		$this->template->set('title', 'HawkiSupply');

		$this->template->load('front', 'contents' , 'home', $data);	
	}

//////////////////////////////////////////////////////////	

	/*
	*
	About Page
	*
	*/


		public function about()
	{
		$data['title'] = 'About Us';
		$data['common'] = frontInfo();
		
		$this->template->set('title', 'About Us');

		$this->template->load('front', 'contents' , 'about', $data);	
	}

	/*
	*
	Contact Page
	*
	*/

	public function contact()
	{
		$data['title'] = 'Contact Us';
		$data['common'] = frontInfo();

		if($this->input->post()){
			$phone = $this->input->post('phone');
			$msg = $this->input->post('message');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
            
            $sended['phone'] = $phone;
            $sended['message'] = $msg;
            $sended['name'] = $name;
            $sended['email'] = $email;
            
            $res = $this->contact->inserted($sended);

            $admin = $this->user->get_user_by_role('admin');
			$adminEmail = $admin->email;

		    $this->email->from($email, $name);
			$this->email->to($adminEmail); 
			$this->email->subject('Contact Us');
			$this->email->message('Hii, '.$msg);	
			if($this->email->send()){

					$this->session->set_flashdata('msg', 'Your mail have been send successfully. Thank you.');
		     }
		 }
		$this->template->set('title', 'Contact Us');

		$this->template->load('front', 'contents' , 'contact', $data);	
	}

///////////////////////////////////////////////////////////

	/*
	*
	Help Page
	*
	*/

	public function help()
	{
		$data['title'] = 'Help';
		$data['common'] = frontInfo();
		
		$this->template->set('title', 'Help');

		$this->template->load('front', 'contents' , 'help', $data);	
	}


/*********************************CHAT*********************/
    public function chat(){

    $data['common'] = frontInfo();
		// Redirect to your logged in landing page here
	if(empty($this->session->userdata('user_buyer_session')) &&  empty($this->session->userdata('user_supplier_session'))) redirect('login');

 $user2 = $this->uri->segment(3); 
 $reqId = $this->uri->segment(4); 

 if($user2){

	$data['title'] = 'Chat';
    $this->template->set('title','Chat');

    $user_id = $data['common']['user']->id;

    $res = $this->input->post();
    if($res){
    	$send['message'] = $res['message'];
    	$send['from'] = $user_id;
    	$send['to'] = $user2;
    	$send['requestId'] = $id;
    	$send['send'] = date('Y-m-d H:i:s');
        $msg = $this->Chat->chatSave($send); 

    }

     $data['chatUser'] = $this->user->get_user($user2);
      $data['reqId'] = $reqId;
    // echo'<pre>';print_r($data['chatUser']);die('a');
    $this->template->load('user','contents', 'chat/chat',$data);

    
}else{
	if($this->session->userdata('user_active') == 'supplier'){
    return redirect('supplier/dashboard');
}else{
	return redirect('buyer/dashboard');
}

}
}



    public function chatSave(){

   $data['common'] = frontInfo();
   $user2 = $this->input->post('userId'); 
    $reqId = $this->input->post('reqId'); 
		$user_id = $data['common']['user']->id;

 if($user2){
    $res = $this->input->post();
    if($res){
    	$send['message'] = $res['message'];
    	$send['from'] = $user_id;
    	$send['to'] = $user2;
    	$send['requestId'] = $reqId;
    	
    	$send['send'] = date('Y-m-d H:i:s');
        $msg = $this->Chat->chatSave($send); 
    return $msg;
    }
}
return false;
}


	public function chatAjax(){
	    $data['common'] = frontInfo();
	    $user2 = $this->input->post('userId'); 
	    $id = $this->input->post('id'); 
	    $reqId = $this->input->post('reqId'); 
	     
		$user_id = $data['common']['user']->id;
		$chat = $this->Chat->getChatUser($user2,$user_id,$id,$reqId);
	    $data['chat'] = $chat;
	   $data['chatUser'] = $this->user->get_user($user2);

	   $this->load->view('chat/chatAjax',$data);
	}

	public function chatScroll(){
	     $data['common'] = frontInfo();
	     $user2 = $this->input->post('userId'); 
	     $id = $this->input->post('id'); 
	     $reqId = $this->input->post('reqId'); 
		 $user_id = $data['common']['user']->id;
		 $chat = $this->Chat->getChatScroll($user2,$user_id,$id,$reqId);
	    $data['chat'] = $chat;
	    $data['chatUser'] = $this->user->get_user($user2);
	    $this->load->view('chat/chatAjax',$data);
	}


////////////////////////////////////////////////////////////	
}
