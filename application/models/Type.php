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

class Type extends CI_Model {

	/***Table Name****/
	public $type;
	

	public function __construct()
	{
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->type = $this->config->item('type');
		
	}

	
	/*
	*
	Get getType 
	*
	*/
	public function getType(){
		$query = $this->db->get($this->type);
		return $query->result();
	}

	public function getTypesByID($TypeID){
		$this->db->select("*");
		$this->db->from($this->type);
		$this->db->where('id',$TypeID);
		$query = $this->db->get();
	    return $TypeData = $query->row();
	}

	public function AddNewTypes($Data){
		$this->db->insert($this->type, $Data);
		return true;
	}
	public function updateTypes($TypeID, $UpdateData){
    	$this->db->where('id',$TypeID);
	    $rntData = $this->db->update($this->type,$UpdateData);
		return $rntData;
    } 
    public function DeleteTypes($TypeID){
    	$this->db->delete($this->type, array('id' => $TypeID));
        return true;
    }
    public function getTypeCount(){
		return $this->db->count_all($this->type);
	}
	
	


////////////////////////////////////////////////////////////
  }