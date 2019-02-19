<?php
/**
 * Section Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Gilbert Pellegrom
 * @link http://dev7studios.com
 * @version 1.0
 */

class Section extends CI_Model {

	/***Table Name****/
	public $section;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->section = $this->config->item('section');
		//check user table exist or not
		/*if(!$this->db->table_exists($this->section)) $this->create_section_table();*/
	}

  ////////////////////////////////////////////////////////	
	/*
	*
	Get Slug Info
	*
	*/

	public function getSlug($slug)
	{
		$query = $this->db->get_where($this->section, array('slug' => $slug));
		if($query->num_rows()) return $query->row();
		return false;
	}
	

//////////////////////////////////////////////////////////

	/*
	*
     Create Logo
	*
	*/
	public function insert($data)
	{
     $this->db->insert($this->section, $data);
		return $this->db->insert_id();
	}
    
    //////////////////////////////////////////////////////////
	
	/*
	*
	Update Section
	*
	*/

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->section, $data); 

	}


////////////////////////////////////////////////////////////


	/*
	*
	Update Social Link
	*
	*/
	public function getSocialSlug($slug){
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->Where('slug',$slug);
		$query =$this->db->get();
		$result =  $query->result();

		if(!empty($result)){				
			$NewArray = array();				
			foreach($result as $val){
				$NewArray[$val->social_option_name] =  Array
					(
					'social_link_url' => $val->social_link_url,
					'social_option_name' => $val->social_option_name,
					'id' => $val->id,
					);
			}				
			return $NewArray;				
		}else{
				return $result;
		}
	}
	public function UpdateSocialLinks($optionkey,$optvalue){
			
			$udateDate = array('social_link_url' => $optvalue);			
			$this->db->where('social_option_name',$optionkey);
			return $this->db->update('sections',$udateDate);			
	}

}

////////////////////////////////////////////////////////////


	/*
	*
	Update 
	*
	*/