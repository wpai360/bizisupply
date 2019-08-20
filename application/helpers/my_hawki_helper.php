<?php defined('BASEPATH') OR exit('No direct script access allowed.');
	
	/*** Function sue for print data in <pre> format***/
	
	if(!function_exists('pr'))
	{
		function pr($value)
		{
			echo "<pre>";
				print_r($value);
			echo "</pre>";
		}
	}
	
	if(!function_exists('dd'))
	{
		function dd($value)
		{
			echo "<pre>";
				print_r($value);
			echo "</pre>";
			die('***End***');
		}
	}

	/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */
	/*<<<<<<<<<<< Start Random String >>>>>>>>>>>>> */
	function rand_string( $length )
		{
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			
			$size = strlen( $chars );
			$str = '';
			for( $i = 0; $i < $length; $i++ )
			{
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}
			
			return $str;
		}
	/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */ 
	/*<<<<<<<<<<< Start Pagination >>>>>>>>>>>>> */

	function Ads_Pagination($uri,$total_rows,$per_page=''){
        $CI =& get_instance();

        $config['per_page']          = $per_page;
        //$config['uri_segment']       = $segment;
        $config['base_url']          = base_url().$uri;
        $config['total_rows']        = $total_rows;
       /* $config['uri_segment'] = 3;*/
        $config['use_page_numbers']  = TRUE;

		$config['full_tag_open'] = '<div class="pagination pagination-centered" id="pagination1"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
		     
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
		     
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		     
		$config['next_link'] = '<i class="fa  fa-caret-right"></i>';
		$config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
		  
		$config['prev_link'] = '<i class="fa  fa-caret-left"></i>';
		$config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
		  
		
		$config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
		  
		
		$config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $CI->pagination->initialize($config);
        $pageLink = $CI->pagination->create_links();
        $listPageData = array($config, $pageLink);
        //pr($listPageData);
        return $listPageData;  
          
    } 
	/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */

	/* <<<<<<<<<<< Start Single image upload >>>>>>>>>>>>> */
	
	if(!function_exists('Upload_Single_Images'))
	{	
		function Upload_Single_Images($img, $name, $ImagePath, $thumbPath="",$minWidth= "", $minHeight ="",  $maxWidth ="", $maxHeight="" )
		{
			
			$CI =& get_instance();
			$CI->load->library('image_lib'); // load library
			
			//$config['upload_path'] = './assets/uploads/profile-img/'; 
			$config['upload_path']   = $ImagePath; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			
			if(!empty($minWidth)){
				$config['width']  = $minWidth;
			}
			if(!empty($minHeight)){
				$config['height']  = $minHeight;
			}
			
			$config['max_size']	= '10000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';
			
			if(!empty($maxWidth)){
				$config['max_width']  = $maxWidth;
			}
			if(!empty($maxHeight)){
				$config['max_height']  = $maxHeight;
			}
			
			$config['file_name'] = $name;
			
			//$CI->load->library('upload', $config);
			$CI->upload->initialize($config);
			//	print_r($config);
			
			if ( ! $CI->upload->do_upload($img))
			{ /* check is image upload or not */
				return $error = array('success' =>'0','error' => $CI->upload->display_errors());
			}
			else
			{
				
				$file = $CI->upload->data();

				$files = glob($config['upload_path'].'/*'); // get all file names
				
				$config = 	array(
				'source_image'      => $file['full_path'], //path to the uploaded image
				/* 'new_image'         => './assets/uploads/profile-img/', //path to */
				'new_image'         => $ImagePath, //path to
				'maintain_ratio'    => True,
				/* 'width'             => 480,
				'height'            => 294 */
				);
				$CI->image_lib->initialize($config);
				$CI->image_lib->resize();
				
				
				$config =	 array(
				'source_image'      => $file['full_path'],
								'new_image'         => './uploads',
								 //path to
								'maintain_ratio'    => true,
								'width'             => 316,
								'height'            => 236
							);
				
				if(!empty($thumbPath))
				{
					$config['new_image']    = $thumbPath;
				}
				
				//here is the second thumbnail, notice the call for the initialize() function again
				$CI->image_lib->initialize($config);
				$CI->image_lib->resize();
				
				$data = array('upload_data' => $CI->upload->data());
				
				return array('success' =>'1','RtnFileNData' => $file);
			}
		}
	}
	/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */		
	
	
	/* <<<<<<<<<<< Start Gallery image upload >>>>>>>>>>>>> */
	
	if(!function_exists('GalleyImageUpload'))
	{	
		
		function GalleyImageUpload($img, $name, $ImagePath, $files)
		{
			
			$CI =& get_instance();
			$CI->load->library('image_lib'); // load library
		
            
			$errorGalleryArray 		=	array ();
			$successGalleryArray 	=	array();
							
            $count = count($_FILES[$img]['name']);

      			
			for($i=0; $i<$count; $i++) 
			{
				
				
			    $_FILES[$img]['name']		= $files[$img]['name'][$i];
                $_FILES[$img]['type']		= $files[$img]['type'][$i];
                $_FILES[$img]['tmp_name']	= $files[$img]['tmp_name'][$i];
                $_FILES[$img]['error']	= $files[$img]['error'][$i];
                $_FILES[$img]['size']		= $files[$img]['size'][$i]; 
				
				$config = array();
				$config['upload_path']   = $ImagePath; 
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$config['file_name'] = $name;
				$config['overwrite']    = FALSE;
				
				
				$CI->upload->initialize($config);
				$CI->load->library('upload');
		        
				if( ! $CI->upload->do_upload($img) )
				{
                    //error coming here
					$errorGalleryArray[] = $CI->upload->display_errors();
				}
                else 
                {
					$successGalleryArray[]  = $CI->upload->data();
				}
				
			}			
			return $AllFileArray = 	array( 	
			'Errors' => $errorGalleryArray , 
			'Success' => $successGalleryArray, 
			);			
		}		
	}	
	/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */

	/* <<<<<<<<<<< Start Send Email >>>>>>>>>>>>> */	
	
	if(!function_exists('SendEmails'))
	{	
		function SendEmails($sendto , $subject, $msg )
		{
			$CI =& get_instance();
			$CI->load->library('email'); // load library
			//>>>>>>>>>>>>>>      Sending Mail       <<<<<<<<<<<<
			$config['protocol'] = 'sendmail';
			$config['charset'] 	= 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config = 	array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'seamaszhou@gmail.com',
			'smtp_pass' => 'jldiamqspjujvaqz',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
			);			
			$CI->email->set_mailtype("html");
			//$CI->email->initialize($config);			
			//$CI->load->library('email');
			$CI->load->library('email', $config);			
			$CI->email->from('HawkiSupply', 'Test');
			$CI->email->to($sendto);
			/* $CI->email->cc('parwinder.singh@a1professionals.info'); 
			$CI->email->bcc('puneet.singh@a1professionals.info'); */			
			$CI->email->subject($subject);
			$CI->email->message($msg);			
			//$CI->email->send(); 
			if($CI->email->send())
			{
				return  true;
			}
			else
			{
				return  false;
			}
		}	
		
	}


	function frontInfo(){
		$CI =& get_instance();
		$CI->load->library('section');
        $CI->load->library('session'); 
       	$CI->load->database();
		$CI->load->model('UserCategoryType');
      if($CI->session->userdata('user_active')){

     if($CI->session->userdata('user_active') == 'supplier'){

     		//$User_ID= $CI->session->userdata('user_supplier_session')->id;
     		
     	 $data['existCat'] = $CI->UserCategoryType->getCategoryTypeSelected($CI->session->userdata('user_supplier_session')->id);

     	//$data['existCat'] = $CI->session->userdata('user_supplier_session')->category;

     	//pr($data['existCat']);
     	  $data['active'] = 'supplier';
     	    $data['user'] = $CI->session->userdata('user_supplier_session');

         }else{
         	$data['existCat']='';
         	 $data['active'] = 'buyer';
         	  $data['user'] = $CI->session->userdata('user_buyer_session');
         }
     }else{
     	$data['existCat']='';
     	$data['active'] = '';
     	$data['user'] = '';
     }


		$data['logo'] =  $CI->section->getSlug('logo');
		$data['contact'] =  $CI->section->getSlug('contact');
		$data['social_links'] =  $CI->section->getSocialSlug('social_links');
		$data['get_started'] =  $CI->section->getSlug('get_started');
		$data['copyrights'] =  $CI->section->getSlug('copyrights');
		return $data;
	}

	
/* <<<<<<<<<<< END HERE >>>>>>>>>>>>> */	
	
	

	
	