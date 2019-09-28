<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    /*
    *
    Construction work
    *
    */
    public $successStatus = 200;
     
    public function __construct()
    {
        /****__construct****/
        parent::__construct();
         
        //library
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->library('Ajax_pagination');
        $this->load->library('upload');
        $this->load->library('encryption');
        
        $this->perPage = 10;

        //helper
        $this->load->helper('form');
        $this->load->helper('my_hawki_helper');
        $this->load->library('email');

        
        
        //model
        $this->load->model('user');
        $this->load->model('section');
        $this->load->model('type');
        $this->load->model('category');
        $this->load->model('RequestQuotes');
        $this->load->model('UserCategoryType');
        $this->load->model('RequestQuotesStatus');
        $this->load->model('Notifications');
        $this->load->model('AssignOrderUser');
        $this->load->model('OrderRequestModel');
        $this->load->model('BuyerOrderDashboardModel');
        $this->load->model('MasterListModel');
        $this->load->model('OrderHistoryModel');
        $this->load->model('SupplierRequestModel');
        $this->load->database();

        
        //$this->load->model('DraftOrderModel');
        //config
        $this->config->load('config');
    }

    /////////////////////////////////////////////////////////

    /*
    *
    Index Page
    *
    */

    public function index()
    {
        $data['common'] = frontInfo();

        if ($this->session->userdata('user_active')) {
            if ($this->session->userdata('user_active') == 'buyer') {
                //return  redirect('buyer/dashboard');
                return  redirect('buyer/buyerOrderDashboard');
            } else {
                return  redirect('supplier/dashboard');
            }
        } else {
            return redirect('login'); // Again login
        }
    }
    
    public function upload()
    {
        
        //die('edf');
        
        sleep(3);
        if ($_FILES["files"]["name"] != '') {
            $output = '';
            $config["upload_path"] = './uploads/';
            $config["allowed_types"] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for ($count = 0; $count<count($_FILES["files"]["name"]); $count++) {
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
                if ($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $output .= '
     <div class="col-md-3">
      <img class="abc" src="'.base_url().'uploads/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
     </div>
     ';
                }
            }
            echo $output;
        }
    }
    
    //////////////////////////////////////////////////////////

    /*
    *
    User Login
    *
    */

    public function login()
    {
        $data['common'] = frontInfo();

        // Redirect to your logged in landing page here
        if ($this->session->userdata('user_buyer_session') || $this->session->userdata('user_supplier_session')) {
            redirect('index');
        }

        /***Login Page content***/
        $data['title'] = 'Login';
        $data['header'] = 'Login';
        $data['error'] = '';
        $this->template->set('title', 'Login');
        /***Form Validation***/
        $this->form_validation->set_rules('email', 'Email is', 'required');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'You must provide a  %s.')
            );
        // set rule
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            array(
                'required'      => 'You have not provided %s.',
                )
            );
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');


        if ($this->form_validation->run()) { // if validation is valid
            $result = $this->user->userLogin($this->input->post('email'));
            $hash = $result->password;
            if (password_verify($this->input->post('password'), $hash) == 1) {
                $this->session->set_userdata('user_session', $result);
                if ($this->input->post('userType') == 'buyer') {
                    $this->session->set_userdata('user_buyer_session', $result);
                    $this->session->set_userdata('user_active', 'buyer');

                    //redirect('buyer/dashboard');
                    redirect('buyer/buyerOrderDashboard');
                } else {
                    $this->session->set_userdata('user_active', 'supplier');
                    $this->session->set_userdata('user_supplier_session', $result);

                    redirect('supplier/dashboard');
                    //redirect('supplier/dashboard');
                }
            } else {
                $data['error'] = 'Your email address and/or password is incorrect.';
            }
        }
        // Redirect to your logged in landing page here

        $this->template->load('front', 'contents', 'user/login', $data);
    }
    /////////////////////////////////////////////////////////

    /*
     *
     Admin Forgot Password
     *
     */

    public function forgot()
    {
        $data['common'] = frontInfo();
        $data['title'] = 'Forgot Password';
        $data['success'] = false;
        // Redirect to your logged in landing page here
        if ($this->session->userdata('user_session')) {
            redirect('index');
        }
        /***Forgot Page content***/

        //validate
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
        
        if ($this->form_validation->run()) {


             // Note: no $config param needed

            
            $email = $this->input->post('email');
            
            $user = $this->user->get_user_by_email($email);
            
            $admin = $this->user->get_user_by_role('admin');
            $adminEmail = $admin->email;

            $slug = md5($user->id . $user->email . date('Ymd'));

            $this->email->from('seamaszhou@gmail.com');
            $this->email->to($email);
            $this->email->subject('Reset your Password');
            $this->email->message('Hi, To reset your password please click the link below and follow the instructions:

				'. site_url('reset/'. $user->id .'/'. $slug) .'

				If you did not request to reset your password then please just ignore this email and no changes will occur.

                Note: This reset code will expire after '. date('j M Y') .'.');

            if ($this->email->send()) {
                $token = $this->user->setToken($user->id, $slug);
                $data['success'] ='yes';
            } else {
                show_error($this->email->print_debugger());
            }
        }
        
        $this->template->set('title', 'Forgot Password');
        return	$this->template->load('front', 'contents', 'user/forgot_password', $data);
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
        if ($this->user->get_user_by_emailVerify($email)) {
            return true;
        } else {
            $this->form_validation->set_message('email_exists', 'We couldn\'t find that email address.');
            return false;
        }
    }

    public function check_email_exists()
    {
        if ($this->user->get_user_by_email($_GET['email'])) {
            echo 'false';
        } else {
            $this->form_validation->set_message('email_exists', 'We couldn\'t find that email address.');
            echo 'true';
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
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if ($this->session->userdata('user_session')) {
            redirect('index');
        }

        $data['success'] = false;
        $data['header'] = 'Reset Password';
        $data['title'] = 'Reset Password';

        $user_id = $this->uri->segment(2);
        if (!$user_id) {
            show_error('Invalid reset code.');
        }
        $hash = $this->uri->segment(3);
        if (!$hash) {
            show_error('Invalid reset code.');
        }

        $user = $this->user->get_user($user_id);
        if (!$user) {
            show_error('Invalid reset code.');
        }

        $slug = md5($user->id . $user->email . date('Ymd'));
        if ($hash != $slug) {
            show_error('Invalid reset code.');
        }
        if (!$user->_token) {
            show_error('You have already updated your password. Now your code has expired. ');
        }

        // set rule
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            array(
                'required'      => 'You have not provided %s.',
                )
            );
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run()) {
            $this->user->reset_password($user->id, $this->input->post('password'));
            $data['success'] = true;

            $token = $this->user->setToken($user->id, '');

            $this->session->set_flashdata('msg', 'You have successfully reset your password. Please Login with your Updated Password. Thank you.');

            return redirect('login');
        }

        $this->template->set('title', 'Reset Password');
        return	$this->template->load('front', 'contents', 'user/reset_password', $data);
    }

    /*
     *
     User Dashboard
     *
     */

    public function dashboard()
    {
        $data['common'] = frontInfo();
        
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_buyer_session')) &&  empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $data['title'] = 'Dashboard';
        
        if ($this->session->userdata('user_active') == 'buyer') {
            $this->template->set('title', 'Buyer Dashboard');
            $data['user'] = $this->session->userdata('user_buyer_session');
            $data['user_active'] = 'buyer';

            $data['RequestQuotesP']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'pending', 5);
            $data['RequestQuotesPr']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'processed', 5);
            $data['RequestQuotesOr']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'ordered', 5);
            $data['RequestQuotesC']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'completed', 5);

            return $this->template->load('user', 'contents', 'user/buyer/dashboard', $data);
        } else {
            $data['user_active'] = 'supplier';
            $this->template->set('title', 'Supplier Dashboard');
            $data['user'] = $this->session->userdata('user_supplier_session');

            /*	$data['RequestQuotesPr']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id,'processed', 5);*/
            

                
            //pr($data['RequestQuotesPr']); die;

            /*	$data['RequestQuotesOr']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id,'ordered', 5);

                $data['RequestQuotesC']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id,'completed', 5);*/

            /* added via  Er gurmeet singh  guri 1 3 2019 */
            $supplierId =$this->session->userdata('user_supplier_session')->id;
            $data['supplierOfferlist']  = $this->SupplierRequestModel->supplierOfferlist($supplierId);
            $data['OfferSentList']  = $this->SupplierRequestModel->OfferSentList($supplierId);
            $data['requestInSupply']  = $this->SupplierRequestModel->requestInSupply($supplierId);
                
            /* added via  Er gurmeet singh  guri 1 3 2019 */

            
            return $this->template->load('user', 'contents', 'user/supplier/dashboard', $data);
        }
    }
     
    
    //////////////////////////////////////////////////////////

    /*
    *
    User Profile
    *
    */


    public function profile()
    {
        $data['common'] = frontInfo();
      
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_buyer_session')) && empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

        header("Access-Control-Allow-Origin: *");
        $uri = $this->uri->segment(1);
        if ($this->session->userdata('user_active') == 'buyer') {
            $userId = $this->session->userdata('user_buyer_session')->id;

            $data['user'] = $this->session->userdata('user_buyer_session');
            $data['user_active'] = 'buyer';
        } else {
            $data['user_active'] = 'supplier';

            $data['user'] = $this->session->userdata('user_supplier_session');
            //$data['supplier_image'] = $this->session->set_userdata($data['user']->supplier_image);
            
            
            //echo"<pre>"; print_r($data['user']); die;
            
            $userId = $this->session->userdata('user_supplier_session')->id;
            // echo"<pre>"; print_r($userId); die;
            
            $data['type'] = $this->type->getType();
        }


        $user = $this->user->get_user($userId);

        $data['user'] = $this->user->get_user($userId);
        
        $data['title'] = 'Profile';
        $this->template->set('title', 'Profile');

        /***Form Validation***/
        $this->form_validation->set_rules('username', 'Business Name is', 'required');

        // set rule
       

        if ($user->email !== $this->input->post('email')) {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
        }

        $this->form_validation->set_rules('ABN', 'ABN/ACN', 'required');

        $this->form_validation->set_rules('address', 'Address', 'required');

        $this->form_validation->set_rules('city', 'City', 'required');

        $this->form_validation->set_rules('name', 'Name', 'required');

        $this->form_validation->set_rules('zipCode', 'Post Code', 'required');

        $this->form_validation->set_rules('Mphone', 'Mobile Phone', 'required');
        $this->form_validation->set_rules('Tphone', 'TelePhone', 'required');

        $this->form_validation->set_rules('bsntype', 'Business type', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');


        
        
        if (isset($_POST['payment_term'])) {
            if ($_POST['payment_term'][0]==1) {
                $this->form_validation->set_rules('paypalEmail', 'Email / Mobile number is', 'required');
            }
            if ($_POST['payment_term'][1]==2) {
                $this->form_validation->set_rules('billerCode', 'Biller Code is', 'required|numeric');
            }
            if ($_POST['payment_term'][2]==3) {
                $this->form_validation->set_rules('abnNumber', 'ABN number is', 'required|numeric');
            }

            if ($_POST['payment_term'][3]==4) {
                $this->form_validation->set_rules('bsbNumber', 'BSB number is', 'required|numeric');
                $this->form_validation->set_rules('bankAccount', 'Bank account is', 'required|numeric');
            }
        }
      
        //$this->form_validation->set_rules('payment_term', 'payment term is', 'required');

        if ($this->form_validation->run()) { // if validation is valid
            
            
            $getData = $this->input->post();
            // $oldimage = $this->input->post('old_buyer_Image');
            // $Supplieroldimage = $this->input->post('old_supplier_Image');

            
            
            
            if ($this->session->userdata('user_active') == 'buyer') {
                $new_name = time().$_FILES["image1"]['name'];
                $oldimage = $this->input->post('old_buyer_image');
                //This line will be generating random name for images that are uploaded
                $config['upload_path'] =  './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $new_name;
                        
                        
                $this->load->library('upload', $config); //Loads the Uploader Library
                $this->upload->initialize($config);
                    
          
                if (!$this->upload->do_upload('image1')) {
                    $mainimage = $oldimage;
                } else {
                    $img1 = $this->upload->data();
                    $mainimage = $img1['file_name'];
                    //This will upload the `image/file` using native image
                }
                        
                if (empty($img1['file_name'])) {
                    $mainimage = $oldimage;
                }
                $sendData['email'] = $getData['email'];
                $sendData['username'] = $getData['username'];
                $sendData['name'] = $getData['name'];
                $sendData['ABN'] = $getData['ABN'];
                $sendData['Tphone'] = $getData['Tphone'];
                $sendData['Mphone'] = $getData['Mphone'];
                $sendData['address'] = $getData['address'];
                $sendData['state'] = $getData['state'];
                $sendData['city'] = $getData['city'];
                $sendData['zipCode'] = $getData['zipCode'];
                $sendData['website'] = $getData['website'];
                $sendData['description'] =trim($getData['description']);
                $sendData['bsntype'] =trim($getData['bsntype']);
                $sendData['title'] =trim($getData['title']);
                $sendData['buyer_image'] = $mainimage;
            //$sendData['supplier_image'] = $mainimage1;
            } else {
                $Supplieroldimage = $this->input->post('old_supplier_Image');
                //$oldimage = $this->input->post('old_buyer_Image');
                $new_name2 = time().$_FILES["image2"]['name'];
                    
                //This line will be generating random name for images that are uploaded
                $config['upload_path'] =  './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $new_name2;
                        
         

                $this->load->library('upload', $config); //Loads the Uploader Library
                $this->upload->initialize($config);
                if (! $this->upload->do_upload('image2')) {
                    //echo "image not upload";

                    $mainimage1=  $Supplieroldimage;
                } else {
                    $img2 = $this->upload->data();
                    $mainimage1= $img2['file_name'];
                        
                    //This will upload the `image/file` using native image
                }
                if (empty($img2['file_name'])) {
                    $mainimage1=  $Supplieroldimage;
                }
                $sendData['email'] = $getData['email'];
                $sendData['username'] = $getData['username'];
                $sendData['name'] = $getData['name'];
                $sendData['ABN'] = $getData['ABN'];
                $sendData['Tphone'] = $getData['Tphone'];
                $sendData['Mphone'] = $getData['Mphone'];
                $sendData['address'] = $getData['address'];
                $sendData['state'] = $getData['state'];
                $sendData['city'] = $getData['city'];
                $sendData['zipCode'] = $getData['zipCode'];
                $sendData['website'] = $getData['website'];
                $sendData['description'] =trim($getData['description']);
                $sendData['bsntype'] =trim($getData['bsntype']);
                $sendData['title'] =trim($getData['title']);
                //$sendData['buyer_image'] = $mainimage;
                $sendData['supplier_image'] = $mainimage1;


                $payment   = $getData['payment_term'];
                $payments  =   implode(",", $payment);
            
            
                $sendData['payment_term'] = $payments ;
            
                if (isset($_POST['payment_term'])) {
                    $sendData['zipCode'] = 	$payments;

                    if ($_POST['payment_term'][0]==1) {
                        $sendData['paypalEmail']   = $getData['paypalEmail'];
                    }

                    if ($_POST['payment_term'][1]==2) {
                        $sendData['billerCode']   = $getData['billerCode'];
                    }

                    if ($_POST['payment_term'][2]==3) {
                        $sendData['abnNumber']   = $getData['abnNumber'];
                    }

                    if ($_POST['payment_term'][3]==4) {
                        $sendData['bsbNumber']   = $getData['bsbNumber'];
                        $sendData['bankAccount']   = $getData['bankAccount'];
                    }
                    //echo "<pre>"; print_r($sendData); die;
                }
            }
            
            
            // echo "<pre>"; print_r($payments); die;
            

            if ($_FILES['image']['name']) {
                $res = $this->uploads($_FILES['image']);
                if ($res) {
                    $sendData['image'] = $res;
                    if ($data['user']->buyer_logo) {
                        unlink('assets/uploads/profile/'.$data['user']->image);
                    }
                } else {
                    $this->session->set_flashdata('msg', '');

                    return $this->template->load('buyer', 'contents', 'user/buyer/profile', $data);
                }
            }

            if ($_FILES['logo']['name']) {
                $res = $this->uploads($_FILES['logo']);
                if ($res) {
                    if ($this->session->userdata('user_active') == 'buyer') {
                        $sendData['buyer_logo'] = $res;
                        if ($data['user']->buyer_logo) {
                            unlink('assets/uploads/profile/'.$data['user']->buyer_logo);
                        }
                    } else {
                        $sendData['supplier_logo'] = $res;
                        if ($data['user']->supplier_logo) {
                            unlink('assets/uploads/profile/'.$data['user']->supplier_logo);
                        }
                    }
                } else {
                    $this->session->set_flashdata('msg', '');

                    return $this->template->load('buyer', 'contents', 'user/buyer/profile', $data);
                }
            }
            
            $result = $this->user->update_user($userId, $sendData);
            
            $this->session->set_flashdata('msg', 'Your Profile is Updated.');
            $data['user'] =  $this->user->get_user(
                $userId
                );
            $this->session->unset_userdata('user_buyer_session');
            $this->session->set_userdata('user_buyer_session', $data['user']);
            $this->session->set_flashdata('imageErr', '');
        } else {
            $this->session->set_flashdata('msg', '');
        }

        if ($this->session->userdata('user_active') == 'buyer') {
            return $this->template->load('user', 'contents', 'user/buyer/profile', $data);
        } else {
            return $this->template->load('user', 'contents', 'user/supplier/profile', $data);
        }
    }




    ///////////////////////////////////////////////////////////
    
    /*
    *
    Change Dashboard
    *
    */

    public function switch()
    {
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_buyer_session')) && empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

        if ($this->session->userdata('user_active') == 'buyer') {
            $this->session->unset_userdata('user_active');

            $this->session->set_userdata('user_supplier_session', $this->session->userdata('user_buyer_session'));

            $this->session->set_userdata('user_active', 'supplier');
            return redirect('supplier');
        } else {
            $this->session->unset_userdata('user_active');
            $this->session->set_userdata('user_active', 'buyer');
            $this->session->set_userdata('user_buyer_session', $this->session->userdata('user_supplier_session'));

            return redirect('buyer');
        }
    }

    //////////////////////////////////////////////////////////
    /*
    *
    User Section :- Register
    *
    */

    public function register()
    {
        $data['common'] = frontInfo();

        $data['title'] = 'Register';
        $data['header'] = 'Register';
        $data['error'] = '';
        $data['key'] = $key;
        $data['secret'] = $secret;
        return	$this->template->load('front', 'contents', 'user/register', $data);
    }

    public function registerSupplier()
    {
        $data['common'] = frontInfo();
        $data['category'] = $this->category->getCategory();
        $key =  $this->config->item('SITE_KEY');
        $secret =  $this->config->item('SECRETE_KEY');

        // Redirect to your logged in landing page here
        if ($this->session->userdata('user_session')) {
            redirect('index');
        }

         

        $data['title'] = 'Register';
        $data['header'] = 'Register';
        $data['error'] = '';
        $data['key'] = $key;
        $data['secret'] = $secret;
        
        /***Form Validation***/
        $this->form_validation->set_rules('username', 'Business Name is', 'required');
        $this->template->set('title', 'Register');

        // set rule
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            array(
                'required'      => 'You have not provided %s.',
                )
            );

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');

        $this->form_validation->set_rules('ABN', 'ABN/ACN is', 'required');

        $this->form_validation->set_rules('address', 'Address is', 'required');

        $this->form_validation->set_rules('name', 'Name is', 'required');

        $this->form_validation->set_rules('state', 'State is', 'required');
        $this->form_validation->set_rules('title', 'Title is', 'required');
        $this->form_validation->set_rules('city', 'City is', 'required');
        $this->form_validation->set_rules('zipCode', 'PostCode is', 'required');
        $this->form_validation->set_rules('Tphone', 'TelePhone is', 'required');
        $this->form_validation->set_rules('Mphone', 'MobilePhone is', 'required');

        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_recaptcha');
    

        if ($this->form_validation->run()) { // if validation is valid
            $getData = $this->input->post();


            $sendData['password'] = md5($getData['password']);
            $sendData['email'] = $getData['email'];
            $sendData['name'] = $getData['name'];
            $sendData['Bsntype'] = $getData['bsntype'];
            $sendData['title'] = $getData['title'];
            $sendData['username'] = $getData['username'];
            $sendData['ABN'] = $getData['ABN'];
            $sendData['city'] = $getData['city'];
            $sendData['state'] = $getData['state'];
            $sendData['zipCode'] = $getData['zipCode'];
            $sendData['address'] = $getData['address'];
            $sendData['Mphone'] = $getData['Mphone'];
            $sendData['Tphone'] = $getData['Tphone'];



            
           

            $result = $this->user->create_user($sendData);
            $this->MasterListModel->createMasterList($sendData['email'], $masterData);
            // $this->user->createMasterList($sendData['email'], $masterData);


            $subject = 'Account Verification';
            $message = 'To Activate Your account, please click the link below and follow the instructions:

				'. site_url('activate/'. $result).' If you did not click then your account verification process will not complete.';

            $this->emails($result, $subject, $message);

            $this->session->set_flashdata('msg', 'Please Check your mail and verify your account. Thank you.');

            return redirect('thankyou');
        } else {
            $this->session->set_flashdata('msg', '');
        }

        return	$this->template->load('front', 'contents', 'user/supplier_register', $data);
    }


    public function registerBuyer()
    {
        $data['common'] = frontInfo();
        $data['category'] = $this->category->getCategory();
        $key =  $this->config->item('SITE_KEY');
        $secret =  $this->config->item('SECRETE_KEY');

        // Redirect to your logged in landing page here
        if ($this->session->userdata('user_session')) {
            redirect('index');
        }

         

        $data['title'] = 'Register';
        $data['header'] = 'Register';
        $data['error'] = '';
        $data['key'] = $key;
        $data['secret'] = $secret;
        
        /***Form Validation***/
        $this->form_validation->set_rules('username', 'Business Name is', 'required');
        $this->template->set('title', 'Register');

        // set rule
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            array(
                'required'      => 'You have not provided %s.',
                )
            );

        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');

        $this->form_validation->set_rules('ABN', 'ABN/ACN is', 'required');

        $this->form_validation->set_rules('address', 'Address is', 'required');

        $this->form_validation->set_rules('name', 'Name is', 'required');

        $this->form_validation->set_rules('state', 'State is', 'required');
        $this->form_validation->set_rules('title', 'Title is', 'required');
        $this->form_validation->set_rules('city', 'City is', 'required');
        $this->form_validation->set_rules('zipCode', 'PostCode is', 'required');
        $this->form_validation->set_rules('Tphone', 'TelePhone is', 'required');
        $this->form_validation->set_rules('Mphone', 'MobilePhone is', 'required');

        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_recaptcha');
    

        if ($this->form_validation->run()) { // if validation is valid
            $getData = $this->input->post();
            $sendData['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $sendData['email'] = $getData['email'];
            $sendData['name'] = $getData['name'];
            $sendData['Bsntype'] = $getData['bsntype'];
            $sendData['title'] = $getData['title'];
            $sendData['username'] = $getData['username'];
            $sendData['ABN'] = $getData['ABN'];
            $sendData['city'] = $getData['city'];
            $sendData['state'] = $getData['state'];
            $sendData['zipCode'] = $getData['zipCode'];
            $sendData['address'] = $getData['address'];
            $sendData['Mphone'] = $getData['Mphone'];
            $sendData['Tphone'] = $getData['Tphone'];
            $sendData['farm'] = $getData['farm'];


            $masterData['product1'] = $getData['product_1'];
            $masterData['category1'] = $getData['category_1'];
            $masterData['brand1'] = $getData['brand_1'];
            $masterData['itemno1'] = $getData['itemno_1'];

            $masterData['product2'] = $getData['product_2'];
            $masterData['category2'] = $getData['category_2'];
            $masterData['brand2'] = $getData['brand_2'];
            $masterData['itemno2'] = $getData['itemno_2'];

            $masterData['product3'] = $getData['product_3'];
            $masterData['category3'] = $getData['category_3'];
            $masterData['brand3'] = $getData['brand_3'];
            $masterData['itemno3'] = $getData['itemno_3'];

            $masterData['product4'] = $getData['product_4'];
            $masterData['category4'] = $getData['category_4'];
            $masterData['brand4'] = $getData['brand_4'];
            $masterData['itemno4'] = $getData['itemno_4'];

            $masterData['product5'] = $getData['product_5'];
            $masterData['category5'] = $getData['category_5'];
            $masterData['brand5'] = $getData['brand_5'];
            $masterData['itemno5'] = $getData['itemno_5'];
            
           

            $result = $this->user->create_user($sendData);
            $this->MasterListModel->createMasterList($sendData['email'], $masterData);
            // $this->user->createMasterList($sendData['email'], $masterData);


            $subject = 'Account Verification';
            $message = 'To Activate Your account, please click the link below and follow the instructions:

				'. site_url('activate/'. $result).' If you did not click then your account verification process will not complete.';

            $this->emails($result, $subject, $message);

            $this->session->set_flashdata('msg', 'Please Check your mail and verify your account. Thank you.');

            return redirect('thankyou');
        } else {
            $this->session->set_flashdata('msg', '');
        }

        return	$this->template->load('front', 'contents', 'user/buyer_register', $data);
    }

    //////////////////////////////////////////////////////

    /*
    *
    Thank you
    *
    */

    public function thankyou()
    {
        $data['common'] = frontInfo();
        $data['title'] = 'Thank you';
        $data['header'] = 'Thank you';

        $this->template->set('title', 'Thank You');
        return	$this->template->load('front', 'contents', 'user/thankyou', $data);
    }
    /*
    *
    Capcha
    *
    */
    /***********Check Capcha**************/

    public function recaptcha($str='')
    {
        $secret =  $this->config->item('SECRETE_KEY');
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res= json_decode($res, true);
        //reCaptcha success check
        if ($res['success']) {
            return true;
        } else {
            $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
            return false;
        }
    }
 
    //////////////////////////////////////////////////////////
    /*
    *
    Verify
    *
    */

    public function verify()
    {  //$data['common'] = frontInfo();
        $data['verify'] = 1;
        $userId = $this->uri->segment(2);
        if (!$userId) {
            show_error('Invalid User.');
        }
        $result = $this->user->get_user($userId);
        $admin = $this->user->get_user_by_role('admin');

        if ($result) {
            $name = $result->username;
            if ($result->verify) {
                $this->session->set_flashdata('msg', 'Your account is already Activated. Thank you.');
                redirect('login');
            } else {
                $result = $this->user->update_user($userId, $data);
                /******************************************************/
                $subject = 'Verification Complete';
                $message = 'Hii,
				Verification Completed.Now Login and enjoy your services. Thank you!';

                $this->emails($userId, $subject, $message);


                $subject = 'User successfully Registered';
                $message = 'User '.ucfirst($name). 'successfully register on your site. Thank you.';

                $this->emails($admin->id, $subject, $message);

                /********************************************************/

                $this->session->set_flashdata('msg', 'Thank you. Your account has been activated.Please login.');
                return redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg', 'Sorry,User not Exists.Please sign up first');
            redirect('login');
        }
    }

    /*
    *
    Logout
    *
    */

    public function logout()
    {
        $this->session->unset_userdata('user_session');
        $this->session->unset_userdata('user_supplier_session');
        $this->session->unset_userdata('user_buyer_session');
        $this->session->sess_destroy();

        redirect('login');
    }

    //////////////////////////Supplier/////////////////////////

    /*
    *
    add User Cat in html
    *
    */
    public function addUserCat()
    {
        $data['category'] = $this->input->post('cat');

         

        $data['type'] = $this->type->getType();
        $this->load->view('common/addCatTr', $data, false);
    }

    //////////////////////////////////////////////////////////

    /*
    *
    *
    check category existance
    *
    */

    public function checkCategory()
    {
        if ($this->input->post('category')) {
            $res = $this->category->checkExistance(trim($this->input->post('category')));
            if ($res) {
                echo 'yes';
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    ///////////////////////////////////////////////////////////

    /*
    *
    *
    Save Supplier Category
    *
    */
    
    /*public function saveSupCategory(){

     if(empty($this->session->userdata('user_supplier_session'))) redirect('login');
     $types =	array_unique($this->input->post('type_id'));
     echo '<pre>';print_r($types);die('a');
     $new = $this->input->post('new');
     if($new){
         $ex = explode('[', $new);
         $ex = explode(']', $ex[1]);
         $ex = explode(',', $ex[0]);
         for($i =0; $i < count($ex); $i++){
             $send['name'] = trim($ex[$i],'"');
             $send['user_id'] = $this->session->userdata('user_supplier_session')->id;
             $res = $this->category->AddNewCategory($send);
         }
     }
     $combine = $this->input->post('combine');
     $data['category'] = $combine;
     if($combine){
         $res = $this->user->update_user($this->session->userdata('user_supplier_session')->id, $data);


         $user = $this->user->get_user($this->session->userdata('user_supplier_session')->id);

         $this->session->unset_userdata('user_buyer_session');
         $this->session->unset_userdata('user_supplier_session');
         $this->session->set_userdata('user_buyer_session', $user);
         $this->session->set_userdata('user_supplier_session', $user);


         $this->session->set_flashdata('msg','Categories Save successfully.');
     }
     return  redirect('supplier/dashboard');


    } */


    public function saveSupCategoryAjax()
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
    
        $types_ID = $this->input->post('types_ID');
        $cats_ID  = $this->input->post('cats_ID');
        $cateData = json_decode($cats_ID);
        $TypeData = json_decode($types_ID);
        foreach ($cateData as $key => $value) {
            $condition = array( 'user_id'   => $this->session->userdata('user_supplier_session')->id,
                            'cat_id' =>$cateData[$key],
                            'super_id'=>$TypeData[$key],
                        );
                        
            //  ??
            $rtnVal = $this->UserCategoryType->isExitsCatType($condition);
            if (empty($rtnVal)) {
                $userId =	$this->session->userdata('user_supplier_session')->id;
                $this->db->select('user_cat_type.cat_id', 'user_cat_type.super_id');
                $this->db->from('user_cat_type');
                $this->db->where('user_id', $userId);
                $query = $this->db->get();
                $CatData = $query->result();
      
                $InsertData = array( 'user_id'   => $this->session->userdata('user_supplier_session')->id,
                          'cat_id'    => $cateData[$key],
                          'super_id'	  => $TypeData[$key]
                        );
                $results = array_diff($CatData, $InsertData);

                $returnReq	=	$this->UserCategoryType->insertUserCateType($InsertData);
          
                $upStatusData = array('status' => "1", );

                $updateCatStatus = $this->category->UpdateStatus($upStatusData, $cateData[$key]);
            }
            // unselect category is not wokring
            else {
                $userId =	$this->session->userdata('user_supplier_session')->id;
                $this->db->select('user_cat_type.cat_id');
                $this->db->from('user_cat_type');
                $this->db->where('user_id', $userId);
                $query = $this->db->get();
                $CatData = $query->result();

                $this ->db->where(['user_id'=>$userId , 'cat_id' => $cateData[$key], 'super_id' => $TypeData[$key]  ]);
                $this ->db->delete('user_cat_type');
                $this->db->where('user_id', $userId);
                $this->db->update('user_cat_type', array('cat_id' => $cateData[$key]  ,'super_id' => $TypeData[$key] ));
            }

            $rtnData = array('status' 		=> 1,
                        'msg'			=> 'Category was updated Successfully..');
        }

        echo  json_encode($rtnData);
    }

    public function insertCat()
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $Cat = $this->input->post('cat');

        $InsertData = array( 'user_id'   => $this->session->userdata('user_supplier_session')->id,
                          'name'    => $Cat,
                          'status'	  => '0'
                        );
        $returnReq	=	$this->category->AddNewCategory($InsertData);
    }
    public function getCatLastID()
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

        $CatName = $this->input->post('cat');
        $returnReq	=	$this->category->GetCategoryIDByName($CatName);
        //pr($returnReq->ID);
        if ($returnReq) {
            $rtnData = array('status' 		=> 1,
                      'CatID'			=> $returnReq->id,
                      'CatName'			=> $returnReq->name,
                                            
                 );
        }
    
        echo  json_encode($rtnData);
    }
    //////////////////////////////////////////////////////////

    /*
    *
    Category
    *
    */

    public function category()
    {
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

        $data['title'] = 'Category';
        
        // $data['categorySelected'] = $this->user->getCategorySelected($this->session->userdata('user_supplier_session')->id);

        $data['categorySelected'] = $this->UserCategoryType->getCategoryTypeSelected($this->session->userdata('user_supplier_session')->id);


        // pr($data['categorySelected']);

        if ($this->session->userdata('user_active') == 'supplier') {
            // $data['category'] = $this->type->getType();
            // $data['type'] = $this->category->getCategory();
            $data['user_active'] = 'supplier';
            
            /* $this->db->select('category.name, types.name')
            ->from('category')
            ->join('types', 'category.id =  types.cat_id');
            $this->db->where('status', '1');
            $result = $this->db->get(); */
            /*  echo "<pre>"; //print_r($result); die;  */
            
            $this->db->select('category.name, category.id as cat_id,category.super_cat_id , super_category.name as super_cat_name , super_category.id');
            $this->db->from('category');
            $this->db->where('status', '1');
            $this->db->join('super_category', 'category.super_cat_id =  super_category.id');
            $query = $this->db->get();
            $data['category']= $query->result_array();
            //echo "<pre>"; print_r($data); die;
          
            $this->template->set('title', 'Supplier');
            $data['user'] = $this->session->userdata('user_supplier_session');
            return $this->template->load('user', 'contents', 'user/supplier/category', $data);
        } else {
            return  redirect('supplier/dashboard');
        }
    }


    public function responseToQuote($quoteID)
    {
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

    


        $data['RequestQuoteData'] = $this->RequestQuotes->GetRequestQuotesByID($quoteID);
        if (empty($data['RequestQuoteData'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"> The Request Quote ID is not valid!</div>');
            redirect('supplier/dashboard');
        }

        //pr($data['RequestQuoteData']);

        $data['title'] = 'Response Quote';
        $this->template->set('title', 'Response To Quote');
        return $this->template->load('user', 'contents', 'user/supplier/responseQuote', $data);
    }
    public function insertRejectReason()
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $user_id = $_POST['user_id'];
        $ReQID  = $_POST['RequestQuoteID'];
        $RejectReason  = $_POST['rejected_reason'];

        $InsertData = array('user_id'   		=> $this->session->userdata('user_supplier_session')->id,
                            'req_quote_id'    	=> $ReQID,
                            'reject_reason'		=> $RejectReason,
                            'status'	  		=> 'rejected'
                    );
        $returnReq	=	$this->RequestQuotesStatus->insertRequestQuotesStatus($InsertData);
        if ($returnReq == true) {
            $upStatusData = array('status'    => "rejected", );
            /* Old */
            //$updateReqStatus = $this->RequestQuotes->UpdateRequestQuotes($ReQID, $upStatusData);
            /* End */
                
                
            /* Add New Block */
            $checkTotalRows = $this->AssignOrderUser->checkRequestSupplierStatus($ReQID);
            $check = $this->AssignOrderUser->checkRequestSupplierStatus($ReQID, 'rejected');
            if (($checkTotalRows-$check)<=1) {
                $updateReqStatus = $this->RequestQuotes->UpdateRequestQuotes($ReQID, $upStatusData);
            }
            $updateReqStatus = $this->AssignOrderUser->UpdateRequestSupplierStatusQuotes($ReQID, $this->session->userdata('user_supplier_session')->id, $upStatusData);
            /* End */
        }
            
        if ($updateReqStatus == true) {
            $Data = array('user_id' => $this->session->userdata('user_supplier_session')->id,
                            'rq_id'    	 => $ReQID,
                            'rq_status'		=> 'rejected',
                            'read_status'	  		=> '0'
                    );
            $insertNoti = $this->Notifications->insertNotification($Data);

            $rtnData = array('status' 		=> 1,
                    'msg'			=> 'You have rejected the buyer successfully...',
                    //'redirect_url'  => base_url().'supplier/response-to-quote/'.$ReQID,
                    'redirect_url'  => base_url().'supplier/dashboard',
                 );
        }
        echo  json_encode($rtnData);
    }


    public function ViewRequestQuotesSupplier($status="")
    {
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_supplier_session');
        if (empty($status)) {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotes($user_id->id);
        }
        if ($status == 'pending') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'pending', '');
        }
        if ($status == 'processed') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'processed', '');
        }
        if ($status == 'ordered') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'ordered', '');
        }
        if ($status == 'completed') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'completed', '');
        }
        
        $this->template->set('title', 'Buyer Dashboard List');

        $this->template->load('user', 'contents', 'user/supplier/requesttoResponseQuotesList', $data);
    }



    public function responseQuote()
    {
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }

        $data['title'] = 'Response Quote';
        $this->template->set('title', 'Response To Quote');
        return $this->template->load('user', 'contents', 'user/supplier/responseQuote', $data);
    }



    /******************************Supplier*****************/
    /* code added by Er gurmeet singh  guri on 12 -09 2018 start  */
   
   
   
   
    public function processOrder($getOfferId)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $data['viewOffer'] = $this->BuyerOrderDashboardModel->processOrder($getOfferId);
        if ($data['viewOffer'][0]->buyer_user_id != $userId) {
            die;
        };

        //$data['offerList'] = $this->BuyerOrderDashboardModel->SupplierToBuyerOfferList($userId,$order_id);
        //$data['viewOffer'] = $this->BuyerOrderDashboardModel->viewOffer($order_id);
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $this->template->set('title', 'Process Order');

        $this->template->load('user', 'contents', 'user/buyer/processOrder', $data);
    }
    
    
    public function makeAsOrder($id)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $data['getOrderDetails'] = $this->BuyerOrderDashboardModel->acceptOffer($id);
        /* 	if(empty($this->session->userdata('user_buyer_session'))) {redirect('login');}
    $user_id = $this->session->userdata('user_buyer_session');
         $userId =$user_id->id; */
    }
    
    
    
   
    public function buyerOrderDashboard()
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['draftOrder'] = $this->BuyerOrderDashboardModel->getOrderRequest(1, $userId);	 // 1=> for got all Saved  in Draft
        //$data['savedtOrder'] = $this->BuyerOrderDashboardModel->getOrderRequest(0,$userId);
        $data['savedtOrder'] = $this->BuyerOrderDashboardModel->savedtOrderRequest(0, $userId);
        $data['offerCount'] = $this->BuyerOrderDashboardModel->offerCount(0, $userId);
        // $checkoffer =$this->BuyerOrderDashboardModel->countOffer(0,$userId);
        // $data['orderInSupply'] = $this->BuyerOrderDashboardModel->orderInSupply($userId);
                

        $this->template->set('title', 'Buyer Dashboard');
        $this->template->load('user', 'contents', 'user/buyer/buyerOrderDashboard', $data);
    }
    public function orderHistory()
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['allOrderHistory'] = $this->BuyerOrderDashboardModel->allOrderHistory($userId);

        $this->template->set('title', 'Order history');
        $this->template->load('user', 'contents', 'user/buyer/orderHistory', $data);
    }

    // for masterlist page
    public function masterList()
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId = $user_id->id;
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['category'] = $this->category->getCategory();
        $data['masterList'] = $this->MasterListModel->masterList($userId);


        $this->template->set('title', 'Hawki Master List');
        $this->template->load('user', 'contents', 'user/buyer/masterList', $data);

    }

    public function addMaster(){

        $user_id = $this->session->userdata('user_buyer_session');
        $userId = $user_id->id;
        $this->form_validation->set_rules('category', 'Category is', 'required');
        $this->form_validation->set_rules('product', 'Product is', 'required');

        $newMaster = array();
        $newCategory = $this->input->post('category');
        $newProduct = $this->input->post('product');
        $newBrand = $this->input->post('brand');
        $newItem = $this->input->post('item');
        
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong> </strong>Something is wrong</div>');

        if ($this->form_validation->run()){
            array_push($newMaster,  $userId , $newCategory, $newProduct, $newBrand, $newItem);
            $this->MasterListModel->addMaster($newMaster);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">The new product has been add successfully</div>');
        }

        redirect('/buyer/masterList');

    }

    public function deleteMaster($masterId)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId = $user_id->id;
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong> </strong>Something is wrong</div>');
        $isDeleted = $this->MasterListModel->deleteMaster($userId, $masterId);
        if ($isDeleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Master Product Deleted Successfully</div>');
        }
        redirect('/buyer/masterList');
    }

    public function editMaster()
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId = $user_id->id;

        $this->form_validation->set_rules('categoryE', 'Category is', 'required');
        $this->form_validation->set_rules('productE', 'Product is', 'required');

        $newMaster = array();
        $masterID =$this->input->post('masterE');
        $newCategory = $this->input->post('categoryE');
        $newProduct = $this->input->post('productE');
        $newBrand = $this->input->post('brandE');
        $newItem = $this->input->post('itemE');

        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong> </strong>Something is wrong</div>');

        if($this->form_validation->run()){
            array_push($newMaster,  $userId , $masterID , $newCategory, $newProduct, $newBrand, $newItem);

            if($this->MasterListModel->updateMaster($newMaster)==1){
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Master Product Changed Successfully</div>');
            }
        }
        redirect('/buyer/masterList');

    }
    
    public function requestHistory()
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_supplier_session');
        $userId =$user_id->id;
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['allOrderHistory'] = $this->SupplierRequestModel->allOrderHistory($userId);

        $this->template->set('title', 'Order history');
        $this->template->load('user', 'contents', 'user/supplier/orderHistory', $data);
    }
    
    public function draftDelete($draft_id)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $is_deleted =$this->BuyerOrderDashboardModel->UpdateOrderRequest($draft_id);
        $baseUrls = base_url('buyer/draftOrder');
        if ($is_deleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Order Deleted Successfully</div>');
            header("Location: $baseUrls", true, 301);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong>Error ! </strong> Opps Something went Wrong</div>');
            header("Location: $baseUrls", true, 301);
        }
    }
    public function cancelOrder($id)
    {
        //die($id);
        //echo $order_id  =  $this->input->post('id');
        //die;
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $is_deleted =$this->BuyerOrderDashboardModel->UpdateOrderRequest($id);
        $baseUrls = base_url('buyer/buyerOrderDashboard');
    
     
        if ($is_deleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong></strong>Order Cancel Successfully</div>');
            header("Location: $baseUrls", true);
        
        
        //echo json_encode($is_deleted);
        
        
        // $this->session->set_flashdata('message','<div class="alert alert-success text-center"><strong> </strong>Order Cancel Successfully</div>');
         // header("Location: $baseUrls", true, 301);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong>Error ! </strong> Opps Something went Wrong</div>');
            header("Location: $baseUrls", true, 301);
        }
    }
    public function draftOrder()
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['draftOrder'] = $this->BuyerOrderDashboardModel->getOrderRequest(1, $userId);
        $this->template->set('title', 'Draft Order');
        $this->template->load('user', 'contents', 'user/buyer/draftOrder', $data);
    }

    public function viewCheckOrder($offer_id)
    {
        //die($offer_id);
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        //$data['viewOrder'] = $this->BuyerOrderDashboardModel->viewOrder($order_id);
        $offerList = $this->BuyerOrderDashboardModel->ViewofferList($userId, $offer_id);
        $offerList['userId'] = $userId;
        echo  json_encode($offerList);
    }

    public function viewProductQuote($orderId)
    {
        //die($offer_id);
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        //$data['viewOrder'] = $this->BuyerOrderDashboardModel->viewOrder($order_id);
        $offerList = $this->BuyerOrderDashboardModel->ViewProductQuoteList($orderId);

        echo  json_encode($offerList);
    }
   
    public function buyerRating()
    {
        $url = $this->input->post('url');
        $good_quality = $this->input->post('good_quality');
        $delivery_speed = $this->input->post('delivery_speed');
        $attitute = $this->input->post('attitute');
        $total = $good_quality+$delivery_speed+$attitute;
        $avrage = $total/3;
        
        $data = array(
        'good_quality'=>$this->input->post('good_quality'),
        'offer_id'=>$this->input->post('offer_id'),
        'user_id'=>$this->input->post('user_id'),
        'delivery_speed'=>$this->input->post('delivery_speed'),
        'attitute'=>$this->input->post('attitute'),
        'rate'=>$this->input->post('description'),
        'average'=> $avrage
        
          );
        
        
        $this->db->insert('buyer_feedback', $data);
        
        //echo "<pre>"; print_r($form_data); die;
        return  redirect($url);
    }
   
   
   
   
    public function rate($id, $offerorderId)
    {
        $this->db->select("*");
        $this->db->from('users');
        $query  =  $this->db->where('users.id', $id);
        $query = $this->db->get();
        $row['result'] = $query->row_array();
      
        //echo"<pre>"; print_r($row); die;
        $row['offerid']   =  $offerorderId;
      
        // echo "<pre>"; print_r($offerid); die;
     
        $this->template->load('profile', 'contents', 'user/supplier/frontprofile', $row);
    }

    
    public function viewOrder($order_id)
    {
        //die($order_id);
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $userId =$user_id->id;
        $orderInfo = $this->BuyerOrderDashboardModel->viewOrder($order_id);
        if ($orderInfo[0]->buyer_user_id == $userId) {
            $data['viewOrder'] = $this->BuyerOrderDashboardModel->viewOrder($order_id, $userId);
        } else {
        }
        //$data['offerList'] = $this->BuyerOrderDashboardModel->AssignedToBuyerofferList($userId,$order_id);
        $data['offerList'] = $this->BuyerOrderDashboardModel->AssignedToBuyerofferList($userId, $order_id);
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $this->db->where('order_id', $order_id);
        $query=$this->db->get('feedback');
        $data['star_rating']=$query->result();
        // echo "<pre>"; print_r($data); die;
        $this->template->set('title', 'View Order');
        
        $this->template->load('user', 'contents', 'user/buyer/viewOrder', $data);
    }
    
    /*  used this function on submit function for test offer if exist after that marked page  will open instead of offer list*/
    public function markedResponse($offerID)
    {
        $supplierId =$this->session->userdata('user_supplier_session')->id;
        $data['viewOffer']  = $this->SupplierRequestModel->markedResponse($offerID, $supplierId);
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $this->template->set('title', 'Supplier Dashboard');
        
        //$this->db->select('image');
        $this->db->from('supplier_marked_offer');
        $this->db->where('offer_id_fk', $offerID);
        //$subQuery = $this->db->get();
        $subQuery = $this->db->get()->result();
       
        $data['result'] = $subQuery[0]->image;
        
        $isPublishedoffers =$data['viewOffer'][0]->form_status;
         
         
        if ($isPublishedoffers==1) {
            echo 	$this->template->load('user', 'contents', '/user/supplier/markedResponse', $data);
        } else { 				//if form status will 2 then it will go
            $this->session->set_flashdata('message', '<div class="text-center">Your Offer had saved in Draft ,Do you want publish this offer ?  Or you can go back <a href="/hawki/supplier/dashboard")?">Back</a></div>');
            redirect('/supplier/PublishOffer/'.$offerID);
        }
    }
    
    public function deletes($particular_image, $offer_id)
    {
        $this->db->select('*');
        $this->db->from('supplier_marked_offer');
        $this->db->where('offer_id_fk', $offer_id);
        $query = $this->db->get()->result();
        
        
        $all_image = $query[0]->image;
         
         
        $all_images = explode(',', $all_image);
        
            
            
        foreach ($all_images  as $key => $val) {
            if ($val === $particular_image) {
                unset($all_images[$key]);
            }
            // $file_image_path = base_path().'/uploads/'.$particular_image;
            
             // echo "<pre>"; print_r($file_image_path); die;
            
                
                // if(file_exists($file_image_path)){
                    
                    
                    // unlink($file_image_path);
                // }
        }
            
        $unique =  uniqid();
        $update_images = implode(',', $all_images);
            
        //echo "<pre>"; print_r($update_images); die;
            
        $this->db->where('offer_id_fk', $offer_id);
        $this->db->update('supplier_marked_offer', array('image'=> $update_images));
            
        $response['success'] = 1;
        //echo json_encode($response);
        return response()->json();
    }
    
    public function buyerProfile($id)
    {
        $this->db->select("*");
        $this->db->from('users');
        $query  =  $this->db->where('users.id', $id);
        $query = $this->db->get();
        $row['result'] = $query->row_array();
      
     
      
        // $query = $this->db->select('*')->from('users')->get();
        // $query->result();
        
        // print_r($query);
    
        // echo "hlooooooooo";
      
      
      
      
        $this->template->load('profile', 'contents', 'user/buyer/frontprofile', $row);
    }
    
    
    // supplier submit offer controllers
    
    public function submitOffer($order_id)
    {
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_supplier_session');
        $userId =$user_id->id;
        $ViewofferList = $this->SupplierRequestModel->check_Offer($order_id);
        $viewOfferOrder =  $this->BuyerOrderDashboardModel->viewOfferOrder($order_id);

        
        if (count($ViewofferList) > 0) {   //  user will see marked page if offer will exist  instead of offer page
            $offerID =$order_id;
            $this->markedResponse($offerID);
        } elseif ($userId == $viewOfferOrder[0]->supplier_user_id) {
            $user_id = $this->session->userdata('user_supplier_session');
            $userId =$user_id->id;
            $data['viewOrder'] = $this->BuyerOrderDashboardModel->viewOrder($order_id);
            $data['offerList'] = $this->BuyerOrderDashboardModel->SupplierToBuyerOfferList($userId, $order_id);
            $data['viewOffer'] = $this->BuyerOrderDashboardModel->viewOffer($order_id);
            $data['viewOfferOrder'] = $viewOfferOrder;


            $data['userId'] = $userId;
            $data['title'] = 'Help';
            $data['common'] = frontInfo();
            $this->template->set('title', "Supplier's Offer");
            
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                //die('fgff');
                /* Set validation rule for name field in the form */
                $offerId = $data['viewOffer'][0]->offer_id;
                //$data['viewOrder'] = $this->BuyerOrderDashboardModel->viewOrder($order_id);

                if (trim($_POST['submit_as_draft'])=='save as draft') {
                    $new_name = time().$_FILES["image1"]['name'];
                    $new_name2 = time().$_FILES["image2"]['name'];
                    $new_name3 = time().$_FILES["image3"]['name'];
                    $new_name4 = time().$_FILES["image4"]['name'];
                    $new_name5 = time().$_FILES["image5"]['name'];
                    //This line will be generating random name for images that are uploaded
                    $config['upload_path'] =  './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name'] = $new_name;
                    $config['file_name'] = $new_name2;
                    $config['file_name'] = $new_name3;
                    $config['file_name'] = $new_name4;
                    $config['file_name'] = $new_name5;
                        
                    $this->load->library('upload', $config); //Loads the Uploader Library
                    $this->upload->initialize($config);
                    if (! $this->upload->do_upload('image1')) {
                        echo "image not upload";
                    } else {
                        $img1 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                               
                    if (! $this->upload->do_upload('image2')) {
                        echo "image not upload";
                    } else {
                        $img2 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                               
                    if (! $this->upload->do_upload('image3')) {
                        echo "image not upload";
                    } else {
                        $img3 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                    if (! $this->upload->do_upload('image4')) {
                        echo "image not upload";
                    } else {
                        $img4 = $this->upload->data(); //This will upload the `image/file` using native image
                    }

                    if (! $this->upload->do_upload('image5')) {
                        echo "image not upload";
                    } else {
                        $img5 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                             
                    $length = 1;
                    $numberlength = 7;
                    $buyer = "S";
                    $abn = $user_id->ABN;
                    $last_abn_two_digit = substr($abn, -2);
                    $randomletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                    $randomnumber = substr(str_shuffle("0123456789"), 0, $numberlength);
                    $random_id = $buyer.$randomletter.$last_abn_two_digit.$randomnumber;
          
                    // echo "<pre>"; print_r($random_id); die;
                        
                
                    $attributeMarkedOffer = [
                            'offer_id_fk'=>$offerId,
                            'product1_quote'=> trim($_POST['price_1']),
                            'product1_reason'=>trim($_POST['reason_1']),
                            'product2_quote'=>trim($_POST['price_2']),
                            'product2_reason'=>trim($_POST['reason_2']),
                            'product3_quote'=>trim($_POST['price_3']),
                            'product3_reason'=>trim($_POST['reason_3']),
                            'product4_quote'=>trim($_POST['price_4']),
                            'product4_reason'=>trim($_POST['reason_4']),
                            'product5_quote'=>trim($_POST['price_5']),
                            'product5_reason'=>trim($_POST['reason_5']),
                            'product6_quote'=>trim($_POST['price_6']),
                            'product6_reason'=>trim($_POST['reason_6']),
                            'product7_quote'=>trim($_POST['price_7']),
                            'product7_reason'=>trim($_POST['reason_7']),
                            'product8_quote'=>trim($_POST['price_8']),
                            'product8_reason'=>trim($_POST['reason_8']),
                            'product9_quote'=>trim($_POST['price_9']),
                            'product9_reason'=>trim($_POST['reason_9']),
                            'product10_quote'=>trim($_POST['price_10']),
                            'product10_reason'=>trim($_POST['reason_10']),
                            'product1_quantity_no'=>trim($_POST['qty_no_1']),
                            'product1_quantity_price'=>trim($_POST['qty_price_1']),
                            'product2_quantity_no'=>trim($_POST['qty_no_2']),
                            'product2_quantity_price'=>trim($_POST['qty_price_2']),
                            'product3_quantity_no'=>trim($_POST['qty_no_3']),
                            'product3_quantity_price'=>trim($_POST['qty_price_3']),
                            'product4_quantity_no'=>trim($_POST['qty_no_4']),
                            'product4_quantity_price'=>trim($_POST['qty_price_4']),
                            'product5_quantity_no'=>trim($_POST['qty_no_5']),
                            'product5_quantity_price'=>trim($_POST['qty_price_5']),
                            'product6_quantity_no'=>trim($_POST['qty_no_6']),
                            'product6_quantity_price'=>trim($_POST['qty_price_6']),
                            'product7_quantity_no'=>trim($_POST['qty_no_7']),
                            'product7_quantity_price'=>trim($_POST['qty_price_7']),
                            'product8_quantity_no'=>trim($_POST['qty_no_8']),
                            'product8_quantity_price'=>trim($_POST['qty_price_8']),
                            'product9_quantity_no'=>trim($_POST['qty_no_9']),
                            'product9_quantity_price'=>trim($_POST['qty_price_9']),
                            'product10_quantity_no'=>trim($_POST['qty_no_10']),
                            'product10_quantity_price'=>trim($_POST['qty_price_10']),
                            // 'payment_type'=>trim($_POST['payment_status']),
                            // 'insurance'=>trim($_POST['insurance']),
                            'payment_terms'=>trim($_POST['payment_term']),
                            'extra_notes'=>trim($_POST['extra_notes']),
                            'delay_date'=>trim($_POST['delay_date']),
                            'form_status'=>2,
                            'sp_image1'=> $img1['file_name'],
                            'sp_image2'=> $img2['file_name'],
                            'sp_image3'=> $img3['file_name'],
                            'sp_image4'=> $img4['file_name'],
                            'sp_image5'=> $img5['file_name'],
                            'random_offer_id'=>$random_id
                        ];
                            
                    $this->BuyerOrderDashboardModel->SupplierOfferSent($offerId, $attributeMarkedOffer);
                    return redirect('supplier/dashboard');
                } else {
                    /*  $config['upload_path']          = './uploads/';
                     $config['allowed_types']        = 'gif|jpg|png';
                     $config['max_size']             = 100;
                     $config['max_width']            = 1024;
                     $config['max_height']           = 768;
                     $this->load->library('upload', $config);

                     if ($this->upload->do_upload('image1')){
                     $Imagenames = array('upload_data' => $this->upload->data());
                     print_r($Imagenames);
                     die();
                     } */
                    /* -------------------------- */
                    $new_name = time().$_FILES["image1"]['name'];
                    $new_name2 = time().$_FILES["image2"]['name'];
                    $new_name3 = time().$_FILES["image3"]['name'];
                    $new_name4 = time().$_FILES["image4"]['name'];
                    $new_name5 = time().$_FILES["image5"]['name'];
                    //This line will be generating random name for images that are uploaded
                     
                    $config['upload_path'] =  './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name'] = $new_name;
                    $config['file_name'] = $new_name2;
                    $config['file_name'] = $new_name3;
                    $config['file_name'] = $new_name4;
                    $config['file_name'] = $new_name5;
                        
                    $this->load->library('upload', $config); //Loads the Uploader Library
                    $this->upload->initialize($config);
                    if (! $this->upload->do_upload('image1')) {
                        echo "image1 not upload";
                    } else {
                        $img1 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                    if (! $this->upload->do_upload('image2')) {
                        echo "image2 not upload";
                    } else {
                        $img2 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                               
                    if (! $this->upload->do_upload('image3')) {
                        echo "image3 not upload";
                    } else {
                        $img3 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                        
                    if (! $this->upload->do_upload('image4')) {
                        echo "image4 not upload";
                    } else {
                        $img4 = $this->upload->data(); //This will upload the `image/file` using native image
                    }

                    if (! $this->upload->do_upload('image5')) {
                        echo "image5 not upload";
                    } else {
                        $img5 = $this->upload->data(); //This will upload the `image/file` using native image
                    }
                             
                    $length = 1;
                    $numberlength = 7;
                    $buyer = "S";
                    $abn = $user_id->ABN;
                    $last_abn_two_digit = substr($abn, -2);
                    $randomletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                    $randomnumber = substr(str_shuffle("0123456789"), 0, $numberlength);
                    $random_id = $buyer.$randomletter.$last_abn_two_digit.$randomnumber;
          
                    // echo "<pre>"; print_r($random_id); die;
                        
                
                    $attributeMarkedOffer = [
                                    'offer_id_fk'=>$offerId,
                                    'product1_quote'=>trim($_POST['price_1']),
                                    'product1_reason'=>trim($_POST['reason_1']),
                                    'product2_quote'=>trim($_POST['price_2']),
                                    'product2_reason'=>trim($_POST['reason_2']),
                                    'product3_quote'=>trim($_POST['price_3']),
                                    'product3_reason'=>trim($_POST['reason_3']),
                                    'product4_quote'=>trim($_POST['price_4']),
                                    'product4_reason'=>trim($_POST['reason_4']),
                                    'product5_quote'=>trim($_POST['price_5']),
                                    'product5_reason'=>trim($_POST['reason_5']),
                                    'product6_quote'=>trim($_POST['price_6']),
                                    'product6_reason'=>trim($_POST['reason_6']),
                                    'product7_quote'=>trim($_POST['price_7']),
                                    'product7_reason'=>trim($_POST['reason_7']),
                                    'product8_quote'=>trim($_POST['price_8']),
                                    'product8_reason'=>trim($_POST['reason_8']),
                                    'product9_quote'=>trim($_POST['price_9']),
                                    'product9_reason'=>trim($_POST['reason_9']),
                                    'product10_quote'=>trim($_POST['price_10']),
                                    'product10_reason'=>trim($_POST['reason_10']),
                                    'product1_quantity_no'=>trim($_POST['qty_no_1']),
                                    'product1_quantity_price'=>trim($_POST['qty_price_1']),
                                    'product2_quantity_no'=>trim($_POST['qty_no_2']),
                                    'product2_quantity_price'=>trim($_POST['qty_price_2']),
                                    'product3_quantity_no'=>trim($_POST['qty_no_3']),
                                    'product3_quantity_price'=>trim($_POST['qty_price_3']),
                                    'product4_quantity_no'=>trim($_POST['qty_no_4']),
                                    'product4_quantity_price'=>trim($_POST['qty_price_4']),
                                    'product5_quantity_no'=>trim($_POST['qty_no_5']),
                                    'product5_quantity_price'=>trim($_POST['qty_price_5']),
                                    'product6_quantity_no'=>trim($_POST['qty_no_6']),
                                    'product6_quantity_price'=>trim($_POST['qty_price_6']),
                                    'product7_quantity_no'=>trim($_POST['qty_no_7']),
                                    'product7_quantity_price'=>trim($_POST['qty_price_7']),
                                    'product8_quantity_no'=>trim($_POST['qty_no_8']),
                                    'product8_quantity_price'=>trim($_POST['qty_price_8']),
                                    'product9_quantity_no'=>trim($_POST['qty_no_9']),
                                    'product9_quantity_price'=>trim($_POST['qty_price_9']),
                                    'product10_quantity_no'=>trim($_POST['qty_no_10']),
                                    'product10_quantity_price'=>trim($_POST['qty_price_10']),
                                    // 'payment_type'=>trim($_POST['payment_status']),
                                    // 'insurance'=>trim($_POST['insurance']),
                                    'payment_terms'=>trim($_POST['payment_term']),
                                    'extra_notes'=>trim($_POST['extra_notes']),
                                    'delay_date'=>trim($_POST['delay_date']),
                                    'form_status'=>1,
                                    'sp_image1'=> $img1['file_name'],
                                    'sp_image2'=> $img2['file_name'],
                                    'sp_image3'=> $img3['file_name'],
                                    'sp_image4'=> $img4['file_name'],
                                    'sp_image5'=> $img5['file_name'],
                                    'random_offer_id'=>$random_id
                                ];
                            
                    $this->BuyerOrderDashboardModel->SupplierOfferSent($offerId, $attributeMarkedOffer);
                    return redirect('supplier/dashboard');
                }
            }
                
            $this->template->load('user', 'contents', 'user/supplier/submitOffer', $data);
        }
    }
    
    
    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './resources/upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = false;

        return $config;
    }
    
    
    
    public function supplierRating()
    {
        $url  = $this->input->post('url');
        //$user_id = $this->session->userdata('user_buyer_session');
        $user_id = $this->session->userdata('user_supplier_session');
        $userId =$user_id->id;
        //echo "<pre>"; print_r($userId); die;
        $star_rating  = $this->input->post('star_rating');
        $buyer_id = $this->input->post('buyer_id');
        $data = array(
    'rate' => $this->input->post('description'),
    'star_rating' => $this->input->post('star_rating'),
    'order_id'    => $this->input->post('order_id'),
    'status' =>'1',
    'user_id'     => $buyer_id,
    
     );
     
        //echo "<pre>"; print_r($data); die;
     
        $this->db->insert('feedback', $data);
        return redirect($url);
        //return redirect('supplier/dashboard');
    }
    
    
    public function callable_show_errors($fields)
    {
        $baseUrls = base_url('buyer/orderRequest');
        header("Location: $baseUrls", true, 301);
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong> </strong>'.$fields.' '.'is  required ,Please fill again all inputs. </div>');
        exit;
    }
    

    public function searchUserViaOrder($orderId)
    {
        if (!empty($orderId)) {
            $data = $this->UserCategoryType->getCategoryViaSearch($orderId);
            foreach ($data  as $typeCatId) {
                $getUserIds[] =$typeCatId->user_id;
            }
            $getUqueUserId =array_unique($getUserIds);
            $GETuser_id = $this->session->userdata('user_buyer_session');
            $userGetId =$GETuser_id->id;
            $getUniqueUserId = \array_diff($getUqueUserId, [$userGetId]);
            //└────────┘→ Array values which you want to delete
            
            return  $getUniqueUserId;
        } else {
            $getUniqueUserId=array();
            return $getUniqueUserId;
        }
    }
    
    // buyer make order
    
    public function orderSubmitRequest($draftStatus, $userId)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        
        
        $userIdLogin =$user_id->id;
        $category =  $this->input->post('category');
        $brand_name_1 =  $this->input->post('brand_name_1');
        $product_1 =  $this->input->post('product_1');
        $partNumber_1 =  $this->input->post('partNumber_1');
        $quantity_1 =  $this->input->post('quantity_1');
        $note_1 = $this->input->post('note_1');

        $brand_name_2 =  $this->input->post('brand_name_2');
        $product_2 =  $this->input->post('product_2');
        $partNumber_2 =  $this->input->post('partNumber_2');
        $quantity_2 =  $this->input->post('quantity_2');
        $note_2 = $this->input->post('note_2');

        $brand_name_3 =  $this->input->post('brand_name_3');
        $product_3 =  $this->input->post('product_3');
        $partNumber_3 =  $this->input->post('partNumber_3');
        $quantity_3 =  $this->input->post('quantity_3');
        $note_3 = $this->input->post('note_3');

        $brand_name_4 =  $this->input->post('brand_name_4');
        $product_4 =  $this->input->post('product_4');
        $partNumber_4 =  $this->input->post('partNumber_4');
        $quantity_4 =  $this->input->post('quantity_4');
        $note_4 = $this->input->post('note_4');

        $brand_name_5 =  $this->input->post('brand_name_5');
        $product_5 =  $this->input->post('product_5');
        $partNumber_5 =  $this->input->post('partNumber_5');
        $quantity_5 =  $this->input->post('quantity_5');
        $note_5 = $this->input->post('note_5');

        $brand_name_6 =  $this->input->post('brand_name_6');
        $product_6 =  $this->input->post('product_6');
        $partNumber_6 =  $this->input->post('partNumber_6');
        $quantity_6 =  $this->input->post('quantity_6');
        $note_6 = $this->input->post('note_6');

        $brand_name_7 =  $this->input->post('brand_name_7');
        $product_7 =  $this->input->post('product_7');
        $partNumber_7 =  $this->input->post('partNumber_7');
        $quantity_7 =  $this->input->post('quantity_7');
        $note_7 = $this->input->post('note_7');

        $brand_name_8 =  $this->input->post('brand_name_8');
        $product_8 =  $this->input->post('product_8');
        $partNumber_8 =  $this->input->post('partNumber_8');
        $quantity_8 =  $this->input->post('quantity_8');
        $note_8 = $this->input->post('note_8');

        $brand_name_9 =  $this->input->post('brand_name_9');
        $product_9 =  $this->input->post('product_9');
        $partNumber_9 =  $this->input->post('partNumber_9');
        $quantity_9 =  $this->input->post('quantity_9');
        $note_9 = $this->input->post('note_9');

        $brand_name_10 =  $this->input->post('brand_name_10');
        $product_10 =  $this->input->post('product_10');
        $partNumber_10 =  $this->input->post('partNumber_10');
        $quantity_10 =  $this->input->post('quantity_10');
        $note_10 = $this->input->post('note_10');

        $masterlist_option_1 = $this->input->post('master_list_product_1');
        $masterlist_option_2 = $this->input->post('master_list_product_2');
        $masterlist_option_3 = $this->input->post('master_list_product_3');
        $masterlist_option_4 = $this->input->post('master_list_product_4');
        $masterlist_option_5 = $this->input->post('master_list_product_5');
        $masterlist_option_6 = $this->input->post('master_list_product_6');
        $masterlist_option_7 = $this->input->post('master_list_product_7');
        $masterlist_option_8 = $this->input->post('master_list_product_8');
        $masterlist_option_9 = $this->input->post('master_list_product_9');
        $masterlist_option_10 = $this->input->post('master_list_product_10');

        $prefer_delivery_date =  $this->input->post('prefer_delivery_date');
        $description =  $this->input->post('description');
        $countMaxArraySize = count($product_1);
        $productCount = 0;
        for ($v = 1; $v<11;$v++) {
            // echo"<pre>"; print_r(${'product_'.$v});
            if (${'product_'.$v}[0]!='') {
                // echo "<pre>"; print_r(${'product_'.$v});
                $productCount++;
            }
        };
        // print_r($productCount);
        //  die;

        
        for ($i=0;$i< $countMaxArraySize;$i++) {
                
            /* form custom validatios start  */
                
            if (empty($brand_name_1[$i])) {
                $this->callable_show_errors('Brand Name field');
            } elseif (empty($product_1[$i])) {
                $this->callable_show_errors('Product field');
            } elseif (empty($partNumber_1[$i])) {
                $this->callable_show_errors('Part number field');
            } elseif (empty($quantity_1[$i])) {
                $this->callable_show_errors('Quantity field');
            } else {
            }


            /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
            $searchCategoryViaOrder  = $this->searchUserViaOrder($category[$i]);
            //echo "<pre>";
            //print_r($searchCategoryViaOrder);
            //got all suppliers
            foreach ($searchCategoryViaOrder as $getSupplier) {
                $user = $this->user->get_user($getSupplier);
                $countArray = count($user);
                if ($countArray) {
                    $email= $user->email;
                    $supplierId[]= $user->id;

                    //  echo"<pre>"; print_r($supplierId); die;

                    $userId= $user->id;
                    $data=array('notification_to_supplier'=>1);
                    $result = $this->user->update_user($userId, $data);
                    
                    //if($result){
                    //then send emails
                    /******************************************************/
                            
                                
                    $subject = 'New order recevied';
                    //$message = 'User '.ucfirst($name). 'successfully register on your site. Thank you.';
                    $message = 'Hi,
								You have recevied a new order, login and response it now!';
                    // $this->emails($userId, $subject, $message);

                    /********************************************************/
                            
                          //}
                }
            }
            if (empty($supplierId)) {
                $supplierIdInString ='0';
                $total_sender_Notification='0';
            } else {
                $total_sender_Notification =count($supplierId);
                $supplierIdInString=implode(",", $supplierId);
            }
                                
            if (trim($_POST['Order_Again'])=='Order Again') {
                echo  $is_Request_order_again=1;
            } else {
                echo  $is_Request_order_again=0;
            }
                
            /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        
            /* form custom validatios end  */
                
                
            $new_name = time().$_FILES["image1"]['name'];
            $new_name2 = time().$_FILES["image2"]['name'];
            $new_name3 = time().$_FILES["image3"]['name'];
            $new_name4 = time().$_FILES["image4"]['name'];
            $new_name5 = time().$_FILES["image5"]['name'];
            $new_name6 = time().$_FILES["image6"]['name'];
            $new_name7 = time().$_FILES["image7"]['name'];
            $new_name8 = time().$_FILES["image8"]['name'];
            $new_name9 = time().$_FILES["image9"]['name'];
            $new_name10 = time().$_FILES["image10"]['name'];
            //This line will be generating random name for images that are uploaded
            $config['upload_path'] =  './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $config['file_name'] = $new_name2;
            $config['file_name'] = $new_name3;
            $config['file_name'] = $new_name4;
            $config['file_name'] = $new_name5;
            $config['file_name'] = $new_name6;
            $config['file_name'] = $new_name7;
            $config['file_name'] = $new_name8;
            $config['file_name'] = $new_name9;
            $config['file_name'] = $new_name10;
            
                        
            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('image1')) {
                echo "image not upload";
            } else {
                $img1 = $this->upload->data();
                //This will upload the `image/file` using native image
            }
                        
                               
            if (! $this->upload->do_upload('image2')) {
                echo "image not upload";
            } else {
                $img2 = $this->upload->data(); //This will upload the `image/file` using native image
            }
                        
                               
            if (! $this->upload->do_upload('image3')) {
                echo "image not upload";
            } else {
                $img3 = $this->upload->data(); //This will upload the `image/file` using native image
            }
                        
            if (! $this->upload->do_upload('image4')) {
                echo "image not upload";
            } else {
                $img4 = $this->upload->data(); //This will upload the `image/file` using native image
            }

            if (! $this->upload->do_upload('image5')) {
                echo "image not upload";
            } else {
                $img5 = $this->upload->data();
            }

            if (! $this->upload->do_upload('image6')) {
                echo "image not upload";
            } else {
                $img6 = $this->upload->data();
            }

            if (! $this->upload->do_upload('image7')) {
                echo "image not upload";
            } else {
                $img7 = $this->upload->data();
            }

            if (! $this->upload->do_upload('image8')) {
                echo "image not upload";
            } else {
                $img8 = $this->upload->data();
            }

            if (! $this->upload->do_upload('image9')) {
                echo "image not upload";
            } else {
                $img9 = $this->upload->data();
            }

            if (! $this->upload->do_upload('image10')) {
                echo "image not upload";
            } else {
                $img10 = $this->upload->data();
            }
                        
            $length = 1;
            $numberlength = 7;
            $buyer = "B";
            $abn = $user_id->ABN;
            $last_abn_two_digit = substr($abn, -2);
            $randomletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
            $randomnumber = substr(str_shuffle("0123456789"), 0, $numberlength);
            $random_id = $buyer.$randomletter.$last_abn_two_digit.$randomnumber;
            // $id_array = array();
            // array_push($id_array,$random_id);

                
                
            $arr[$i] =	[
                                'user_id'=>$userIdLogin,
                                'draft'=>$draftStatus,
                                //'supplier_id'=>0,
                                'product_assign_category'=>$category[$i],
                                'brand_name_1'=>$brand_name_1[$i],
                                'order_name_1'=>$product_1[$i],
                                'part_number_1'=>$partNumber_1[$i],
                                'quantity_1'=>$quantity_1[$i],
                                'note_1'=>$note_1[$i],
                                'brand_name_2'=>$brand_name_2[$i],
                                'order_name_2'=>$product_2[$i],
                                'part_number_2'=>$partNumber_2[$i],
                                'quantity_2'=>$quantity_2[$i],
                                'note_2'=>$note_2[$i],
                                'brand_name_3'=>$brand_name_3[$i],
                                'order_name_3'=>$product_3[$i],
                                'part_number_3'=>$partNumber_3[$i],
                                'quantity_3'=>$quantity_3[$i],
                                'note_3'=>$note_3[$i],
                                'brand_name_4'=>$brand_name_4[$i],
                                'order_name_4'=>$product_4[$i],
                                'part_number_4'=>$partNumber_4[$i],
                                'quantity_4'=>$quantity_4[$i],
                                'note_4'=>$note_4[$i],
                                'brand_name_5'=>$brand_name_5[$i],
                                'order_name_5'=>$product_5[$i],
                                'part_number_5'=>$partNumber_5[$i],
                                'quantity_5'=>$quantity_5[$i],
                                'note_5'=>$note_5[$i],
                                'brand_name_6'=>$brand_name_6[$i],
                                'order_name_6'=>$product_6[$i],
                                'part_number_6'=>$partNumber_6[$i],
                                'quantity_6'=>$quantity_6[$i],
                                'note_6'=>$note_6[$i],
                                'brand_name_7'=>$brand_name_7[$i],
                                'order_name_7'=>$product_7[$i],
                                'part_number_7'=>$partNumber_7[$i],
                                'quantity_7'=>$quantity_7[$i],
                                'note_7'=>$note_7[$i],
                                'brand_name_8'=>$brand_name_8[$i],
                                'order_name_8'=>$product_8[$i],
                                'part_number_8'=>$partNumber_8[$i],
                                'quantity_8'=>$quantity_8[$i],
                                'note_8'=>$note_8[$i],
                                'brand_name_9'=>$brand_name_9[$i],
                                'order_name_9'=>$product_9[$i],
                                'part_number_9'=>$partNumber_9[$i],
                                'quantity_9'=>$quantity_9[$i],
                                'note_9'=>$note_9[$i],
                                'brand_name_10'=>$brand_name_10[$i],
                                'order_name_10'=>$product_10[$i],
                                'part_number_10'=>$partNumber_10[$i],
                                'quantity_10'=>$quantity_10[$i],
                                'note_10'=>$note_10[$i],
                                'prefer_delivery_data'=>$prefer_delivery_date[$i],
                                'order_description'=>$description[$i],
                                'sent_number_ofSupplier_request'=>$total_sender_Notification,
                                'send_notification_to_suppliers'=>$supplierIdInString,
                                'is_Request_order_again'=>$is_Request_order_again,
                                'image1' => $img1['file_name'],
                                'image2' => $img2['file_name'],
                                'image3' => $img3['file_name'],
                                'image4' => $img4['file_name'],
                                'image5' => $img5['file_name'],
                                'image6' => $img6['file_name'],
                                'image7' => $img7['file_name'],
                                'image8' => $img8['file_name'],
                                'image9' => $img9['file_name'],
                                'image10' => $img10['file_name'],
                                'order_random_id' => $random_id
                                
                            ];

            if ($masterlist_option_1 == 1) {
                $masterArr[] = array(
                                    array(
                                    'user_id'=>$userIdLogin,
                                    'product_assign_category'=>$category[0],
                                    'brand_name'=>$brand_name_1[0],
                                    'order_name'=>$product_1[0],
                                    'part_number'=>$partNumber_1[0])
                                    );
            } else {
                $masterArr[$i] = array();
            }
                            
                    
            if ($productCount>1) {
                for ($j=2;$j<= $productCount;$j++) {
                    if (${'masterlist_option_'.$j}[0]==1) {
                        $newdata = array(
                                    'user_id'=>$userIdLogin,
                                    'product_assign_category'=>$category[$i],
                                    'brand_name'=>${'brand_name_'.$j}[$i],
                                    'order_name'=>${'product_'.$j}[$i],
                                    'part_number'=>${'partNumber_'.$j}[$i]);
                        array_push($masterArr[$i], $newdata);
                    }
                }
            }
        }
        return	$this->OrderRequestModel->insertOrderRequest($arr, $masterArr);
    }
    public function ajexOrderRequest()
    {
        echo "ajexOrderRequest";
    }
    
    
    
    
    public function MasterListFunction()
    {
        //die('fdrfdfddf');
        $product = $this->input->post('product');
       
       
       
        if ($product) {
            $this->db->from('master_list');
            $this->db->where('master_id', $product);
            $this->db->join('category', 'category.id = master_list.product_assign_category');
            // $this->db->select('buyer_orders.brand_name', 'buyer_orders.order_name, category.name ,buyer_orders.product_assign_category' ,'buyer_orders.part_number');
            $querys = $this->db->get()->result();
            if (!empty($querys)) {
                foreach ($querys as $categoryValue) {
                    $order_name = $this->encryption->decrypt($categoryValue->order_name);
                    $category_name = $categoryValue->name;
                    $part_number = $this->encryption->decrypt($categoryValue->part_number);
                    $product_assign_category =  $categoryValue->product_assign_category;
                    $brand_name = $this->encryption->decrypt($categoryValue->brand_name);
                    $data =	array('brand_name_1'=>$brand_name,'product_assign_category'=>$product_assign_category,'order_name_1'=>$order_name,'part_number_1'=>$part_number,'category_name'=>$category_name);
                    // echo "<pre>"; print_r($data); die;
                    echo json_encode($data);
                    //exit;
                }
            }
        }
    }
    
    
    
    
    
    // search product by category
    
    public function pCategory()
    {
        //die('fdrfdfddf');
        $Category1 = $this->input->post('Category1');
        //echo "<pre>"; print_r($Category1); die;
       
        if ($Category1) {
            //echo "<pre>"; print_r($Category1); die;
            $this->db->from('products');
            $this->db->join('category', 'category.id = products.category_id');
            $this->db->select('products.product_name, category.name');
            // $this->db->select('*');
            $this->db->where("products.product_name LIKE '$Category1%'");
            //$this->db->like('buyer_orders.order_name', $Category1%);
      
            $querys = $this->db->get()->result();
            //  echo "<pre>"; print_r($querys); die;
           
            if (!empty($querys)) {
                foreach ($querys as $categoryValue) {
                    $product_name = str_replace(' ', '_', $categoryValue->product_name);
                    $category_name = str_replace(' ', '_', $categoryValue->name);
                    //$category_name =  $categoryValue->name;
                    $click = "getcategory(this,'$product_name','$category_name');";
                    //$manu = "onclick='getcategory('$categoryValue->order_name','$categoryValue->name')';";
                    echo "<div class='rg'  onclick=$click><h3 class='custom_searching'><b>$categoryValue->product_name</b>  in<span color='green'>$categoryValue->name</span></h3></div>";
                }
            }
        }
    }

    // search in the past orders

    // public function pCategory(){
    //     //die('fdrfdfddf');
    //       $Category1 = $this->input->post('Category1');
    //       //echo "<pre>"; print_r($Category1); die;
          
    //       if($Category1){
    //       //echo "<pre>"; print_r($Category1); die;
    //       $this->db->from('buyer_orders');
    //       $this->db->join('category', 'category.id = buyer_orders.product_assign_category');
    //       $this->db->select('buyer_orders.order_name, category.name ,buyer_orders.product_assign_category');
    //       // $this->db->select('*');
    //       $this->db->where("buyer_orders.order_name LIKE '$Category1%'");
    //       //$this->db->like('buyer_orders.order_name', $Category1%);
         
    //       $querys = $this->db->get()->result();
          
    //     //  echo "<pre>"; print_r($querys); die;
              
    //            if(!empty($querys)){
    //            foreach ($querys as $categoryValue) {
               
    //            $order_name = str_replace(' ','_',$categoryValue->order_name);
    //            $category_name = str_replace(' ','_',$categoryValue->name);
    //            //$category_name =  $categoryValue->name;
    //            $product_assign_category =  $categoryValue->product_assign_category;
               
           
    //       $click = "getcategory('$order_name','$category_name','$product_assign_category');";
   
    //            //$manu = "onclick='getcategory('$categoryValue->order_name','$categoryValue->name')';";
    //     echo "<div class='rg'  onclick=$click><h3 class='custom_searching'><b>$categoryValue->order_name</b>  in<span color='green'>$categoryValue->name</span></h3></div>";
   
                 
    //             }
               
    //            }
          
    //    }
    //    }
    
    
    
    
    public function newCategory()
    {
        $user_id = $this->session->userdata('user_buyer_session');
        $userIdLogin =$user_id->id;
        $data = array(
            'name' => $this->input->post('newCategory'),
            'status' => 1,
            'user_id' => $userIdLogin
        );
        $this->db->insert('category', $data);
        $category = $this->category->getCategory();
        echo'<option value ="">Select Category</option>';
        if (!empty($category)) {
            foreach ($category as $categoryValue) {
                echo'<option value="'.$categoryValue->id.'">'.$categoryValue->name.'</option>';
            }
        }
    }
    
    
    
    public function orderRequest()
    {
        //http://jsfiddle.net/lemonkazi/re8e2yov/
    
        $user_id = $this->session->userdata('user_buyer_session');
    
        //echo "<pre>"; print_r($user_id); die;
    
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $userId =$user_id->id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
    
        //die('hhhh');
            $draftStatus=0;
            $this->orderSubmitRequest($draftStatus, $userId);  //submit order and send mail to supplier
            // die;
            $baseUrls = base_url('buyer/buyerOrderDashboard');
            header("Location: $baseUrls", true, 301);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>New Request has been Submitted  Successfully...</div>');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Order_Again'])) {
            $draftStatus=0;
            $this->orderSubmitRequest($draftStatus, $userId);  //submit order and send mail to supplier
            // die;
            $baseUrls = base_url('buyer/buyerOrderDashboard');
            header("Location: $baseUrls", true, 301);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Order again  Request has been Submitted  Successfully...</div>');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Save_As_Draft'])) {
            $draftStatus=1;
            $this->orderSubmitRequest($draftStatus, $userId);
            $baseUrls = base_url('buyer/draftOrder');
            header("Location: $baseUrls", true, 301);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>New Request  Save As Draft has been Submitted Successfully...</div>');
        } else {
        }


        $this->db->from('master_list');
        $whereQ = "master_list.user_id = $userId ";
        $this->db->join('category', 'master_list.product_assign_category=category.id');
        $this->db->where($whereQ);
        $query = $this->db->get();
        $data['master_list'] = $query->result();
    
 
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['category'] = $this->category->getCategory();
        $this->template->set('title', 'Buyer Dashboard');
        $this->template->load('user', 'contents', 'user/buyer/orderRequest', $data);
    }
    // publish draft order
    public function PublishOrder($order_id, $cid)
    {
        //die($cid);
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $searchCategoryViaOrder  = $this->searchUserViaOrder($cid);
        // echo "<pre>";
        // print_r($searchCategoryViaOrder);
        // die;
        //got all suppliers
        foreach ($searchCategoryViaOrder as $getSupplier) {
            $user = $this->user->get_user($getSupplier);
            $countArray = count($user);
            if ($countArray) {
                $email= $user->email;
                $supplierId[]= $user->id;
                $userId= $user->id;
                $data=array('notification_to_supplier'=>1);
                $result = $this->user->update_user($userId, $data);
                    
                        
                        
                        
                //if($result){
                //then send emails
                /******************************************************/
                            
                                
                $subject = 'Draft Order Publish Successfully';
                //$message = 'User '.ucfirst($name). 'successfully register on your site. Thank you.';
                $message = 'Hi,
								Order Request Notification Completed .Now Login and enjoy your services. Thank you!';
                $this->emails($userId, $subject, $message);

                /********************************************************/
                            
                          //}
            }
        }
        $supplierIdInString=implode(",", $supplierId);
        $data=array(
                    
                    'send_notification_to_suppliers'=>$supplierIdInString,
                    'draft'=>0,
                    'is_deleted'=>0
                );
    
        $is_Publish_Order =$this->BuyerOrderDashboardModel->UpdateDraftOrderRequest($data, $order_id);
        $baseUrls = base_url('buyer/buyerOrderDashboard');
        if ($is_Publish_Order) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Draft Order publish Successfully</div>');
            header("Location: $baseUrls", true, 301);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong>Error ! </strong> Opps Something went Wrong</div>');
            header("Location: $baseUrls", true, 301);
        }
    }
    
    
    
    
    
    
    public function editOrder($id)
    {
        $user_id = $this->session->userdata('user_buyer_session');
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_id =  $this->input->post('order_id');
            $category =$this->input->post('category');
            
            $brand_name_1 =  $this->input->post('brand_name_1');
            $product_1 =  $this->input->post('product_1');
            $partNumber_1 =  $this->input->post('partNumber_1');
            $quantity_1 =  $this->input->post('quantity_1');
            $note_1 = $this->input->post('note_1');

            $brand_name_2 =  $this->input->post('brand_name_2');
            $product_2 =  $this->input->post('product_2');
            $partNumber_2 =  $this->input->post('partNumber_2');
            $quantity_2 =  $this->input->post('quantity_2');
            $note_2 = $this->input->post('note_2');

            $brand_name_3 =  $this->input->post('brand_name_3');
            $product_3 =  $this->input->post('product_3');
            $partNumber_3 =  $this->input->post('partNumber_3');
            $quantity_3 =  $this->input->post('quantity_3');
            $note_3 = $this->input->post('note_3');

            $brand_name_4 =  $this->input->post('brand_name_4');
            $product_4 =  $this->input->post('product_4');
            $partNumber_4 =  $this->input->post('partNumber_4');
            $quantity_4 =  $this->input->post('quantity_4');
            $note_4 = $this->input->post('note_4');

            $brand_name_5 =  $this->input->post('brand_name_5');
            $product_5 =  $this->input->post('product_5');
            $partNumber_5 =  $this->input->post('partNumber_5');
            $quantity_5 =  $this->input->post('quantity_5');
            $note_5 = $this->input->post('note_5');

            $brand_name_6 =  $this->input->post('brand_name_6');
            $product_6 =  $this->input->post('product_6');
            $partNumber_6 =  $this->input->post('partNumber_6');
            $quantity_6 =  $this->input->post('quantity_6');
            $note_6 = $this->input->post('note_6');

            $brand_name_7 =  $this->input->post('brand_name_7');
            $product_7 =  $this->input->post('product_7');
            $partNumber_7 =  $this->input->post('partNumber_7');
            $quantity_7 =  $this->input->post('quantity_7');
            $note_7 = $this->input->post('note_7');

            $brand_name_8 =  $this->input->post('brand_name_8');
            $product_8 =  $this->input->post('product_8');
            $partNumber_8 =  $this->input->post('partNumber_8');
            $quantity_8 =  $this->input->post('quantity_8');
            $note_8 = $this->input->post('note_8');

            $brand_name_9 =  $this->input->post('brand_name_9');
            $product_9 =  $this->input->post('product_9');
            $partNumber_9 =  $this->input->post('partNumber_9');
            $quantity_9 =  $this->input->post('quantity_9');
            $note_9 = $this->input->post('note_9');

            $brand_name_10 =  $this->input->post('brand_name_10');
            $product_10 =  $this->input->post('product_10');
            $partNumber_10 =  $this->input->post('partNumber_10');
            $quantity_10 =  $this->input->post('quantity_10');
            $note_10 = $this->input->post('note_10');

            $masterlist_option_1 = $this->input->post('master_list_product_1');
            $masterlist_option_2 = $this->input->post('master_list_product_2');
            $masterlist_option_3 = $this->input->post('master_list_product_3');
            $masterlist_option_4 = $this->input->post('master_list_product_4');
            $masterlist_option_5 = $this->input->post('master_list_product_5');
            $masterlist_option_6 = $this->input->post('master_list_product_6');
            $masterlist_option_7 = $this->input->post('master_list_product_7');
            $masterlist_option_8 = $this->input->post('master_list_product_8');
            $masterlist_option_9 = $this->input->post('master_list_product_9');
            $masterlist_option_10 = $this->input->post('master_list_product_10');
           
            /* +++++++++++++++++++++++++++  searchCategoryViaOrder ++++++++++++++++++++++++++++++++++ */
            $searchCategoryViaOrder  = $this->searchUserViaOrder($category);
            /* echo "<pre>";
            print_r($searchCategoryViaOrder);
            die; */
            //got all suppliers
            foreach ($searchCategoryViaOrder as $getSupplier) {
                $user = $this->user->get_user($getSupplier);
                $countArray = count($user);
                if ($countArray) {
                    $email= $user->email;
                    $supplierId[]= $user->id;
                    $userId= $user->id;
                    $data=array('notification_to_supplier'=>1);
                    $result = $this->user->update_user($userId, $data);
                    
                        
                        
                        
                    //if($result){
                    //then send emails
                    /******************************************************/
                            
                                
                    $subject = 'Draft Order Publish Successfully';
                    //$message = 'User '.ucfirst($name). 'successfully register on your site. Thank you.';
                    $message = 'Hi,
								Order Request Notification Completed .Now Login and enjoy your services. Thank you!';
                    $this->emails($userId, $subject, $message);

                    /********************************************************/
                            
                          //}
                }
            }
            //die;
            $supplierIdInString=implode(",", $supplierId);
            
            
                
            /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
           
            /* get all record updated	 */
          
           
           
            $new_name = time().$_FILES["image1"]['name'];
            $new_name2 = time().$_FILES["image2"]['name'];
            $new_name3 = time().$_FILES["image3"]['name'];
            $new_name4 = time().$_FILES["image4"]['name'];
            $new_name5 = time().$_FILES["image5"]['name'];
            $new_name6 = time().$_FILES["image6"]['name'];
            $new_name7 = time().$_FILES["image7"]['name'];
            $new_name8 = time().$_FILES["image8"]['name'];
            $new_name9 = time().$_FILES["image9"]['name'];
            $new_name10 = time().$_FILES["image10"]['name'];

            $prefer_delivery_date =  $this->input->post('prefer_delivery_date');
            $description =  $this->input->post('description');
            //This line will be generating random name for images that are uploaded
            $config['upload_path'] =  './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $config['file_name'] = $new_name2;
            $config['file_name'] = $new_name3;
            $config['file_name'] = $new_name4;
            $config['file_name'] = $new_name5;
            $config['file_name'] = $new_name6;
            $config['file_name'] = $new_name7;
            $config['file_name'] = $new_name8;
            $config['file_name'] = $new_name9;
            $config['file_name'] = $new_name10;
                        
            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('image1')) {
                echo "image not upload";
            } else {
                $img1 = $this->upload->data();
                $images1     =  $img1['file_name'];

                //This will upload the `image/file` using native image
            }
                        
                               
            if (! $this->upload->do_upload('image2')) {
                echo "image not upload";
            } else {
                $img2 = $this->upload->data();

                $images2     =  $img2['file_name'];
            }
                        
                               
            if (! $this->upload->do_upload('image3')) {
                echo "image not upload";
            } else {
                $img3 = $this->upload->data();
                $images3     =  $img3['file_name'];
            }
                        
            if (! $this->upload->do_upload('image4')) {
                echo "image not upload";
            } else {
                $img4 = $this->upload->data();
                $images4     =  $img4['file_name'];
            }

            if (! $this->upload->do_upload('image5')) {
                echo "image not upload";
            } else {
                $img5 = $this->upload->data();
                $images5     =  $img5['file_name'];
            }

            if (! $this->upload->do_upload('image6')) {
                echo "image not upload";
            } else {
                $img6 = $this->upload->data();
                $images6     =  $img6['file_name'];
            }

            if (! $this->upload->do_upload('image7')) {
                echo "image not upload";
            } else {
                $img7 = $this->upload->data();
                $images7     =  $img7['file_name'];
            }

            if (! $this->upload->do_upload('image8')) {
                echo "image not upload";
            } else {
                $img8 = $this->upload->data();
                $images8     =  $img8['file_name'];
            }

            if (! $this->upload->do_upload('image9')) {
                echo "image not upload";
            } else {
                $img9 = $this->upload->data();
                $images9     =  $img9['file_name'];
            }

            if (! $this->upload->do_upload('image10')) {
                echo "image not upload";
            } else {
                $img10 = $this->upload->data();
                $images10     =  $img10['file_name'];
            }
                        
            
            $data=array(
                    //'send_notification_to_suppliers'=>$supplierIdInString,
                    'draft'=>0,
                    'image1' => $images1,
                    'image2' => $images2,
                    'image3' => $images3,
                    'image4' => $images4,
                    'image5' => $images5,
                    'image6' => $images6,
                    'image7' => $images7,
                    'image8' => $images8,
                    'image9' => $images9,
                    'image10' => $images10,
                    'brand_name_1'=>$brand_name_1[0],
                    'order_name_1'=>$product_1[0],
                    'part_number_1'=>$partNumber_1[0],
                    'quantity_1'=>$quantity_1[0],
                    'note_1'=>$note_1[0],
                    'brand_name_2'=>$brand_name_2[0],
                    'order_name_2'=>$product_2[0],
                    'part_number_2'=>$partNumber_2[0],
                    'quantity_2'=>$quantity_2[0],
                    'note_2'=>$note_2[0],
                    'brand_name_3'=>$brand_name_3[0],
                    'order_name_3'=>$product_3[0],
                    'part_number_3'=>$partNumber_3[0],
                    'quantity_3'=>$quantity_3[0],
                    'note_3'=>$note_3[0],
                    'brand_name_4'=>$brand_name_4[0],
                    'order_name_4'=>$product_4[0],
                    'part_number_4'=>$partNumber_4[0],
                    'quantity_4'=>$quantity_4[0],
                    'note_4'=>$note_4[0],
                    'brand_name_5'=>$brand_name_5[0],
                    'order_name_5'=>$product_5[0],
                    'part_number_5'=>$partNumber_5[0],
                    'quantity_5'=>$quantity_5[0],
                    'note_5'=>$note_5[0],
                    'brand_name_6'=>$brand_name_6[0],
                    'order_name_6'=>$product_6[0],
                    'part_number_6'=>$partNumber_6[0],
                    'quantity_6'=>$quantity_6[0],
                    'note_6'=>$note_6[0],
                    'brand_name_7'=>$brand_name_7[0],
                    'order_name_7'=>$product_7[0],
                    'part_number_7'=>$partNumber_7[0],
                    'quantity_7'=>$quantity_7[0],
                    'note_7'=>$note_7[0],
                    'brand_name_8'=>$brand_name_8[0],
                    'order_name_8'=>$product_8[0],
                    'part_number_8'=>$partNumber_8[0],
                    'quantity_8'=>$quantity_8[0],
                    'note_8'=>$note_8[0],
                    'brand_name_9'=>$brand_name_9[0],
                    'order_name_9'=>$product_9[0],
                    'part_number_9'=>$partNumber_9[0],
                    'quantity_9'=>$quantity_9[0],
                    'note_9'=>$note_9[0],
                    'brand_name_10'=>$brand_name_10[0],
                    'order_name_10'=>$product_10[0],
                    'part_number_10'=>$partNumber_10[0],
                    'quantity_10'=>$quantity_10[0],
                    'note_10'=>$note_10[0],
                    'prefer_delivery_data'=>$prefer_delivery_date[0],
                    'order_description'=>$description[0]
                );
         
            // echo "<pre>"; print_r($id); die;
        
            $is_Publish_Order =$this->BuyerOrderDashboardModel->UpdateDraftOrderRequest($data, $id);

            $baseUrls = base_url('buyer/buyerOrderDashboard');
            if ($is_Publish_Order) {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center"><strong> </strong>Draft Order update Successfully</div>');
                header("Location: $baseUrls", true, 301);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center"><strong>Error ! </strong> Opps Something went Wrong</div>');
                header("Location: $baseUrls", true, 301);
            }
        }

        $userId =$user_id->id;
        $this->db->from('master_list');
        $whereQ = "master_list.user_id = $userId ";
        $this->db->join('category', 'master_list.product_assign_category=category.id');
        $this->db->where($whereQ);
        $query = $this->db->get();
        $data['master_list'] = $query->result();

    
        $data['getOrderDetails'] = $this->BuyerOrderDashboardModel->getOrderViaPassId($id);	 // 1=> for got all Saved  draft
        if ($userId != $data['getOrderDetails'][0]->user_id) {
            die;
        }
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['category'] = $this->category->getCategory();
        $this->template->set('title', 'Draft Order');
        $this->template->load('user', 'contents', 'user/buyer/editOrderRequest', $data);
    }

    public function acceptQuote($offerNo)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $product = $this->input->post('product');
        $this->BuyerOrderDashboardModel->acceptQuote($offerNo, $product);
    }

    public function acceptQtyQuote($offerNo)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $productStatus = $this->input->post('productStatus');
        $newQty = $this->input->post('newQty');
        $productNo = $this->input->post('productNo');
        $product = 'product'.$productNo.'_quantity_no';
        $this->BuyerOrderDashboardModel->acceptQtyQuote($offerNo, $productStatus, $newQty, $product);
    }

  
    public function acceptOffer($id)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_buyer_session');
        $p1 = $this->input->post('p1');
        $p2 = $this->input->post('p2');
        $p3 = $this->input->post('p3');
        $p4 = $this->input->post('p4');
        $p5 = $this->input->post('p5');
        $p6 = $this->input->post('p6');
        $p7 = $this->input->post('p7');
        $p8 = $this->input->post('p8');
        $p9 = $this->input->post('p9');
        $p10 = $this->input->post('p10');
        $p1_qty = $this->input->post('p1_qty');
        $p2_qty = $this->input->post('p2_qty');
        $p3_qty = $this->input->post('p3_qty');
        $p4_qty = $this->input->post('p4_qty');
        $p5_qty = $this->input->post('p5_qty');
        $p6_qty = $this->input->post('p6_qty');
        $p7_qty = $this->input->post('p7_qty');
        $p8_qty = $this->input->post('p8_qty');
        $p9_qty = $this->input->post('p9_qty');
        $p10_qty = $this->input->post('p10_qty');
        $userId =$user_id->id;
        $data['getOrderDetails'] = $this->BuyerOrderDashboardModel->acceptOffer($id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
        $data['updateQuantity'] = $this->BuyerOrderDashboardModel->updateQuantity(
            $id,
            $p1_qty,
            $p2_qty,
            $p3_qty,
            $p4_qty,
            $p5_qty,
            $p6_qty,
            $p7_qty,
            $p8_qty,
            $p9_qty,
            $p10_qty
        );
        /* 	if(empty($this->session->userdata('user_buyer_session'))) {redirect('login');}
    $user_id = $this->session->userdata('user_buyer_session');
         $userId =$user_id->id; */
    }
    public function supplierOrderDashboard()
    {
        $supplierId =$this->session->userdata('user_supplier_session')->id;
        $data['supplierOfferlist']  = $this->SupplierRequestModel->supplierOfferlist($supplierId);
        echo "<pre>";
        print_r($data);
        die;
        /* $supplierId =$this->session->userdata('user_supplier_session')->id;
        // Redirect to your logged in landing page here
        if(empty($this->session->userdata('user_supplier_session'))) redirect('login');
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $data['type'] = $this->type->getType();
        $data['category'] = $this->category->getCategory();
        $datah  =$this->SupplierRequestModel->supplierOfferlist(17);
        $this->template->set('title', 'Supplier Dashboard');
        $this->template->load('user', 'contents' , 'user/supplier/dashboard', $data); */
    }
    /* code added by  Er gurmeet singh  guri on 12 -09 2018 end*/


    public function ViewRequestQuotes($status="")
    {
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_buyer_session');
        if (empty($status)) {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotes($user_id->id);
        }
        if ($status == 'pending') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'pending', '');
        }
        if ($status == 'processed') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'processed', '');
        }
        if ($status == 'ordered') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'ordered', '');
        }
        if ($status == 'completed') {
            $data['RequestQuotes']	=	$this->RequestQuotes->GetRequestQuotesStatus($user_id->id, 'completed', '');
        }
        

        
        $this->template->set('title', 'Buyer Dashboard List');

        $this->template->load('user', 'contents', 'user/buyer/requestQuotesList', $data);
    }




    public function orderPlaced()
    {
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        
        $this->template->set('title', 'Buyer Dashboard');

        $this->template->load('user', 'contents', 'user/buyer/orderPlaced', $data);
    }

    public function suppliers()
    {
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        
        $this->template->set('title', 'Suppliers');

        $this->template->load('user', 'contents', 'user/buyer/suppliers', $data);
    }

    ///////////////////////////////////////////////////////
    //////////////Common Function Section/////////////////

    /*
    *
    Email
    *
    */
    public function emails($userId, $subject, $message)
    {
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

    public function uploads($image)
    {
        if (isset($image)) {
            $file_name = $image['name'];
            $file_size =$image['size'];
            $file_tmp =$image['tmp_name'];
            $file_type=$image['type'];
            $ex = explode('.', $image['name']);
            $lower = end($ex);
            $file_ext=strtolower($lower);

            $expensions= array("jpeg","jpg","png","gif");

            if (in_array($file_ext, $expensions)=== false) {
                $this->session->set_flashdata('imageErr', 'extension not allowed, please choose a JPEG or PNG file.');
                return false;
            }

            if ($file_size > 2097152) {
                $this->session->set_flashdata('imageErr', 'File size less then 2 MB');
                return false;
            }
            $file = date('m_i').'_'.$file_name;
            move_uploaded_file($file_tmp, "assets/uploads/profile/".$file);

            return $file;
        }
    }
  
    //////////////////////////////////////////////////////
    
    /*
    *
    Ajax Pagination
    *
    */

    public function ajaxPaginationData()
    {
        $data['title'] = 'Users';
        $this->template->set('title', 'Users');

        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if (!empty($keywords)) {
            $conditions['search']['keywords'] = $keywords;
        }
        if (!empty($sortBy)) {
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
        $this->load->view('admin/user/pagination', $data, false);
    }
    
    public function Orders()
    {
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_buyer_session')) &&  empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $data['title'] = 'Orders';
        $data['user_active'] = 'supplier';
        $this->template->set('title', 'Supplier Orders');
        $data['user'] = $this->session->userdata('user_supplier_session');

        $data['RequestQuotesPr']	=	$this->RequestQuotes->GetRequestQuotesSupplierStatus($data['user']->id, 'pending', 5);

        $data['RequestQuotesOr']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'ordered', 5);

        $data['RequestQuotesC']	=	$this->RequestQuotes->GetRequestQuotesStatus($data['user']->id, 'completed', 5);

        return $this->template->load('user', 'contents', 'user/supplier/orders', $data);
    }


    /////////////End of Common Function////////////////////


    /* Buyer Section Start  2 27 2018 */

    public function mark_as_paid($marked_offer_id, $offerID)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $this->BuyerOrderDashboardModel->mark_as_paid($marked_offer_id);
        return redirect('buyer/processOrder/'.$offerID);
    }

    public function transit_mark_as_recieved($marked_offer_id, $offerID)
    {
        if (empty($this->session->userdata('user_buyer_session'))) {
            redirect('login');
        }
        $this->BuyerOrderDashboardModel->transit_mark_as_recieved($marked_offer_id);
        return redirect('buyer/processOrder/'.$offerID);
    }


    /* Buyer Section end  2 27 2018 */


    /* Supplier Section Start  2 27 2018 */

    public function marks_as_paid($marked_offer_id, $offerID)
    {
        $this->SupplierRequestModel->marks_as_paid($marked_offer_id);
        return redirect('supplier/submitOffer/'.$offerID);
    }

    public function transits_mark_as_recieved($marked_offer_id, $offerID)
    {  //die($marked_offer_id);

        $traking_Info = $this->input->post("traking_Info");
        $logistic = $this->input->post("logistic");
        
        $this->SupplierRequestModel->transits_mark_as_recieved($marked_offer_id, $traking_Info, $logistic);
        return redirect('supplier/submitOffer/'.$offerID);
    }
    
    public function rejectOffer($random_id, $product_id)
    {
        $this->SupplierRequestModel->rejectOfferfN($random_id, $product_id);
    }
    public function supplierContinueOffer($random_id, $product_id)
    {
        $this->SupplierRequestModel->supplierAcceptfN($random_id, $product_id);
    }
    public function supplierContinueOfferQty($random_id, $product_id)
    {
        $this->SupplierRequestModel->supplierAcceptNewQty($random_id, $product_id);
    }
    
    
    public function draftOffers()
    {
        $data['common'] = frontInfo();
        // Redirect to your logged in landing page here
        if (empty($this->session->userdata('user_buyer_session')) &&  empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $data['title'] = 'Dashboard';
        $data['user_active'] = 'supplier';
        $this->template->set('title', 'Supplier Dashboard');
        $data['user'] = $this->session->userdata('user_supplier_session');
        $data['RequestQuotesPr']	=	$this->RequestQuotes->GetRequestQuotesSupplierStatus($data['user']->id, 'pending', 5);
        $data['RequestQuotesOr']	=	$this->RequestQuotes->GetRequestQuotesSupplierStatus($data['user']->id, 'ordered', 5);
        $supplierId =$this->session->userdata('user_supplier_session')->id;
        $data['supplierOfferlist']  = $this->SupplierRequestModel->draftOfferlist($supplierId);
        $data['RequestQuotesC']	=$this->RequestQuotes->GetRequestQuotesSupplierStatus($data['user']->id, 'completed', 5);
        
        return $this->template->load('user', 'contents', 'user/supplier/draftOffers', $data);
    }
    
    // check and publish offer
 
    public function PublishMarkedResponse($offerID)
    {
        $supplierId =$this->session->userdata('user_supplier_session')->id;
        $data['viewOffer']  = $this->SupplierRequestModel->markedResponse($offerID, $supplierId);
        $data['title'] = 'Help';
        $data['common'] = frontInfo();
        $this->template->set('title', 'Draft Offer');
        $this->template->load('user', 'contents', 'user/supplier/publishsubmitedOffer', $data);
    }
 
 
    public function PublishOffer($order_id)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $new_name = time().$_FILES["image1"]['name'];
            $new_name2 = time().$_FILES["image2"]['name'];
            $new_name3 = time().$_FILES["image3"]['name'];
            $new_name4 = time().$_FILES["image4"]['name'];
            $new_name5 = time().$_FILES["image5"]['name'];
           
            //This line will be generating random name for images that are uploaded
            $config['upload_path'] =  './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;
            $config['file_name'] = $new_name2;
            $config['file_name'] = $new_name3;
            $config['file_name'] = $new_name4;
            $config['file_name'] = $new_name5;
           
                        
            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('image1')) {
                echo "image not upload";
            } else {
                $img1 = $this->upload->data(); //This will upload the `image/file` using native image
            }
                        
                               
            if (! $this->upload->do_upload('image2')) {
                echo "image not upload";
            } else {
                $img2 = $this->upload->data(); //This will upload the `image/file` using native image
            }
                        
                               
            if (! $this->upload->do_upload('image3')) {
                echo "image not upload";
            } else {
                $img3 = $this->upload->data(); //This will upload the `image/file` using native image
            }
                        
            if (! $this->upload->do_upload('image4')) {
                echo "image not upload";
            } else {
                $img4 = $this->upload->data(); //This will upload the `image/file` using native image
            }

            if (! $this->upload->do_upload('image5')) {
                echo "image not upload";
            } else {
                $img5 = $this->upload->data();
            }

            $attribute = [
                'product1_quote'=>trim($_POST['price_1']),
                'product1_reason'=>trim($_POST['reason_1']),
                'product2_quote'=>trim($_POST['price_2']),
                'product2_reason'=>trim($_POST['reason_2']),
                'product3_quote'=>trim($_POST['price_3']),
                'product3_reason'=>trim($_POST['reason_3']),
                'product4_quote'=>trim($_POST['price_4']),
                'product4_reason'=>trim($_POST['reason_4']),
                'product5_quote'=>trim($_POST['price_5']),
                'product5_reason'=>trim($_POST['reason_5']),
                'product6_quote'=>trim($_POST['price_6']),
                'product6_reason'=>trim($_POST['reason_6']),
                'product7_quote'=>trim($_POST['price_7']),
                'product7_reason'=>trim($_POST['reason_7']),
                'product8_quote'=>trim($_POST['price_8']),
                'product8_reason'=>trim($_POST['reason_8']),
                'product9_quote'=>trim($_POST['price_9']),
                'product9_reason'=>trim($_POST['reason_9']),
                'product10_quote'=>trim($_POST['price_10']),
                'product10_reason'=>trim($_POST['reason_10']),
                'product1_quantity_no'=>trim($_POST['qty_no_1']),
                'product1_quantity_price'=>trim($_POST['qty_price_1']),
                'product2_quantity_no'=>trim($_POST['qty_no_2']),
                'product2_quantity_price'=>trim($_POST['qty_price_2']),
                'product3_quantity_no'=>trim($_POST['qty_no_3']),
                'product3_quantity_price'=>trim($_POST['qty_price_3']),
                'product4_quantity_no'=>trim($_POST['qty_no_4']),
                'product4_quantity_price'=>trim($_POST['qty_price_4']),
                'product5_quantity_no'=>trim($_POST['qty_no_5']),
                'product5_quantity_price'=>trim($_POST['qty_price_5']),
                'product6_quantity_no'=>trim($_POST['qty_no_6']),
                'product6_quantity_price'=>trim($_POST['qty_price_6']),
                'product7_quantity_no'=>trim($_POST['qty_no_7']),
                'product7_quantity_price'=>trim($_POST['qty_price_7']),
                'product8_quantity_no'=>trim($_POST['qty_no_8']),
                'product8_quantity_price'=>trim($_POST['qty_price_8']),
                'product9_quantity_no'=>trim($_POST['qty_no_9']),
                'product9_quantity_price'=>trim($_POST['qty_price_9']),
                'product10_quantity_no'=>trim($_POST['qty_no_10']),
                'product10_quantity_price'=>trim($_POST['qty_price_10']),
                // 'payment_type'=>trim($_POST['payment_status']),
                // 'insurance'=>trim($_POST['insurance']),
                'payment_terms'=>trim($_POST['payment_term']),
                'extra_notes'=>trim($_POST['extra_notes']),
                'delay_date'=>trim($_POST['delay_date']),
                'form_status'=>1,
                'sp_image1'=> $img1['file_name'],
                'sp_image2'=> $img2['file_name'],
                'sp_image3'=> $img3['file_name'],
                'sp_image4'=> $img4['file_name'],
                'sp_image5'=> $img5['file_name'],

            ];
            $this->SupplierRequestModel->updateAndPublisOffer($attribute, $order_id);
                        
            $this->session->set_flashdata('message', 'Offer has been Published Successfully');
            redirect('/supplier/dashboard/');
        }
        if (empty($this->session->userdata('user_supplier_session'))) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_supplier_session');
        $userId =$user_id->id;
        $viewOfferList = $this->SupplierRequestModel->check_Offer($order_id);
  
        if ($viewOfferList[0]->supplier_user_id!=$userId) {
            die;
        };
    
        if (count($viewOfferList) > 0) {   //  user will see marked page if offer will exist  instead of offer page
            $offerID =$order_id;
            $this->PublishMarkedResponse($offerID);
        } else {
            return "Yet offer is not Assigned on this Order";
        }
    }
    
    public function ignoreOffer($offerID)
    {
        $this->SupplierRequestModel->ignoreOffer($offerID);
        $this->session->set_flashdata('message', 'Offered Ignore has been Successfully');
        return redirect('/supplier/dashboard');
    }
    
    public function allactiOnOffer()
    {
        if (trim($_POST['make_offer_for_all'])=='Make Offer for All') {
            foreach ($_POST['gotOfferId'] as $offerID) {
                $arr_OfferId[] =$offerID;
            }
            $data['string']= implode(",", $arr_OfferId);
            $this->template->load('user', 'contents', 'user/supplier/allsubmitOffer', $data);
        } elseif (trim($_POST['Ignore_all'])=='Ignore All') {
            foreach ($_POST['gotOfferId'] as $offerID) {
                $this->SupplierRequestModel->ignoreOffer($offerID);
            }
            $this->session->set_flashdata('message', 'Offered Ignore has been Successfully');
            return redirect('/supplier/dashboard');
        } else {
            //echo "hello";
        }
    }


    public function markedsAllOffer()
    {
        if (trim($_POST['submit_as_draft'])=='save as draft') {
            $axolodeArray= explode(",", $_POST['offerids']);
            foreach ($axolodeArray as $getId) {
                $attributeMarkedOffer = [
            'offer_id_fk'=>$getId,
            'price_offer'=>trim($_POST['price']),
            'part_number'=>trim($_POST['part_number']),
            'payment_type'=>trim($_POST['payment_status']),
            'insurance'=>trim($_POST['insurance']),
            'payment_terms'=>trim($_POST['payment_term']),
            'description'=>trim($_POST['description']),
            'form_status'=>2         						 			//  submit as draft
            ];
                
                $this->BuyerOrderDashboardModel->SupplierOfferSent($getId, $attributeMarkedOffer);
        
        

                //$this->BuyerOrderDashboardModel->SupplierOfferSent($offerId,$attributeMarkedOffer);
        //
            }
            $this->session->set_flashdata('message', 'Offer Sent for all orders saved as draft.');
            return redirect('supplier/draftOffers');
        } elseif (trim($_POST['submit'])=='Submit') {
            $axolodeArray= explode(",", $_POST['offerids']);
            foreach ($axolodeArray as $getId) {
                $attribute = [
                'offer_id_fk'=>$getId,
                'price_offer'=>trim($_POST['price']),
                'part_number'=>trim($_POST['part_number']),
                'payment_type'=>trim($_POST['payment_status']),
                'insurance'=>trim($_POST['insurance']),
                'payment_terms'=>trim($_POST['payment_term']),
                'description'=>trim($_POST['description']),
                'form_status'=>1	  //  Submit
                ];
                $this->BuyerOrderDashboardModel->SupplierOfferSent($getId, $attribute);
            }
            $this->session->set_flashdata('message', 'Offer Sent for all orders.');
            //$this->BuyerOrderDashboardModel->SupplierOfferSent($offerId,$attribute);
            return redirect('/supplier/dashboard');
        } else {
            return redirect('/supplier/dashboard');
        }
    }
    /* Supplier Section end  2 27 2018 */
}
/////////////////////FINISH//////////////////////////////
