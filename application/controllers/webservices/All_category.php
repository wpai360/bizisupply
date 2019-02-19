<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('webservices/Category_model');
		$this->load->library('form_validation');
		
		
		}
	
	
	public function index()
	{
		//$this->load->view('webservices/login');
		echo 'hello';
	}


	public function get_category(){

		$query = $this->Category_model->category();

		if(isset($query)){
			foreach ($query as $key => $cate_records) {
				unset($cate_records['user_id']);
				unset($cate_records['status']);
				unset($cate_records['created_at']);
				unset($cate_records['updated_at']);
				$category_data[] = $cate_records;

			}

			$result = array(
						 'code'	   => '201',
						 'status'  => 'success',
						 'message' => "All category result",
						 'category'=> $category_data,
						);
			print_r(json_encode($result));

		}else{
			$result = array(
						 'code'	   => '200',
						 'status'  => 'fail',
						 'message' => "No category",
						
						);
			print_r(json_encode($result));
		}
		
	}
	
	
	/* 
	 add types with category
	 Supplier
     
	 */
 	
	public function add_category_type(){
	
			$this->form_validation->set_rules('user_id','Userid','trim|required');
			$this->form_validation->set_rules('category_id','categoryID','trim|required');
			//$this->form_validation->set_rules('tpye_id','categoryID','trim|required');
		
			if($this->form_validation->run() == FALSE){
				$error = strip_tags(validation_errors());

				$result = array(
							'code'	  => '200',
							'status'  => 'failed',
							'message' => $error
						);
				print_r(json_encode($result));
			}
	
	        else{
			$user_id 	   = $this->input->post('user_id');
			$category_id = $this->input->post('category_id');
		
			if(!empty($_POST['tpye_id'])){
			
			$type_id = $this->input->post('tpye_id');
			$extype = explode(',',$type_id);
			$total = count($extype);
		
		    for($i=0;$i<$total;$i++){
			
			$data = array(
			
					'user_id' => $user_id,
					'cat_id' => $category_id,
					'type_id' => $extype[$i],
					
					);
					
		    $query = $this->Category_model->supplier_add($data);			
			
			
			}
		
			}
			
			if(!empty($_POST['unselect_type_id'])){
			
			$unselect_type_id  = $this->input->post('unselect_type_id');	
			
			$extype2 = explode(',',$unselect_type_id);
		    $total2 = count($extype2);
		
		    for($j=0;$j<$total2;$j++){
			
			$data_delete = array(
			
					'user_id' => $user_id,
					'cat_id' => $category_id,
					'type_id' => $extype2[$j],
					
					);
					
		    			
			$this->db->where($data_delete);
            $this->db->delete('user_cat_type');
			
			}
			
				
		}
		
		
		$result = array(
						 'code'	   => '201',
						 'status'  => 'success',
						 'message' => "success",
						 
						);
			print_r(json_encode($result));
		
	}
	}



}

?>