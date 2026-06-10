<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class HomePageModel extends CI_Model {
		
		function __construct(){
			// Call the Model constructor
			parent::__construct();
		}
		
		
	
		public function AddHomeBannerInsert($NewBannerData){
			
			return $RetnNewBanner = $this->db->insert('banner', $NewBannerData);
			
		}	
		
		public function GetAllBanner()
		{
			$query = $this->db->get('banner');  
			return $query->result(); 
		}
		
		
		
		
		public function UpdateBanner($data)
		
		{
			$this->db->where('bid',$data['bid']);
				return $this->db->update('banner',$data);
		}
		
		
	
		public function GetslectedBanner($slide){
			$this->db->select('*');
			$this->db->from('banner');
			$this->db->where('bid',$slide);
			$query =$this->db->get();
			return $query->result();
			
		}
		
	
		public function DeleteHomeBanner($bid){
			$this->load->helper("file");
			
			$getData =	$this->GetslectedBanner($bid);
			//	pr($getData);
			if(!empty($getData)){
				
				$getImageName	=	$getData[0]->image;
				
				//dd($getImageName);
				
				$deleteFlie = 'assets/uploads/homebanner/'.$getImageName;
				$deleteThumbFlie = 'assets/uploads/homebanner/thumbnail/'.$getImageName;
				
				
				if(unlink($deleteFlie)){
					
					unlink($deleteThumbFlie);
					
					$this->db->where('bid',$bid);
					return	$query = $this->db->delete('banner');
				}else{
					return false;
				}
			}
		}

	public function GetAllTestimonials(){
        $this->db->select("*");
		$this->db->from('testimonials');
		$query = $this->db->get();
	    return $logoData = $query->result();	
	}
	public function AddNewTestimonial($data){
		$insert =  $this->db->insert('testimonials', $data);
		return true;
	}
	public function UpdateTestimonial($Tid,$UpdateData){
        $this->db->where('Testimonials_Id',$Tid);
	    $rntData = $this->db->update('testimonials',$UpdateData);
		return $rntData;	
	}
	public function DeleteTestimonial($Tid){

 		$this->db->delete('testimonials', array('Testimonials_Id' => $Tid));
     	return true;
	}
	public function SingleTestimonail($tid){
        $this->db->select("*");
		$this->db->from('testimonials');
		$this->db->where('Testimonials_Id',$tid);
		$query = $this->db->get();
	    $logoData = $query->result();	
	   if(!empty($logoData)){
	   return $logoData[0];
	   
	   }else{
	    return $logoData;	   
	   }	
	}
	public function GetAllServices(){
        $this->db->select("*");
		$this->db->from('services');
		$query = $this->db->get();
	    return $logoData = $query->result();	
	}
	public function AddNewServices($data){
		$insert =  $this->db->insert('services', $data);
		return true;
	}
	public function UpdateServices($Sid,$UpdateData){
        $this->db->where('services_id',$Sid);
	    $rntData = $this->db->update('services',$UpdateData);
		return $rntData;	
	}
	public function DeleteService($sid){
	
	 	$this->db->delete('services', array('services_id' => $sid));
        return true;
	}
	public function SingleServices($sid){
        $this->db->select("*");
		$this->db->from('services');
		$this->db->where('services_id',$sid);
		$query = $this->db->get();
	    $logoData = $query->result();	
	   if(!empty($logoData)){
	   return $logoData[0];
	   
	   }else{
	    return $logoData;	   
	   }	
	}

	public function GetAllPartnersLogo(){
		$this->db->select("*");
		$this->db->from('partners_logo');
		$query = $this->db->get();
	    return $logoData = $query->result();
	}
	public function insertPaertnersLogo($data){
		$insert = $this->db->insert_batch('partners_logo', $data);
		return true;
	}

	public function UpdatePartnerLogo($plID,$UpdateData){
		$this->db->where('pl_id',$plID);
	    $rntData = $this->db->update('partners_logo',$UpdateData);
		return $rntData;	
	}
	public function DeletePartnerLogo($plID){
		$this->db->delete('partners_logo', array('pl_id' => $plID));
        return true;
	}

	public function GetSinglePartnerLogo($plID){
		$this->db->select("*");
		$this->db->from('partners_logo');
		$this->db->where('pl_id',$plID);
		$query = $this->db->get();
	    return $logoData = $query->row();	
	}
		
}		