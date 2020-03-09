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

class Category extends CI_Model
{

	/***Table Name****/
	public $type;


	public function __construct()
	{
		parent::__construct();

		//load config
		$this->config->load('config');
		//get table name
		$this->category = $this->config->item('category');
	}


	/*
	*
	Get getCategory 
	*
	*/
	public function getCategory()
	{

		$this->db->order_by('name', 'asc');
		$this->db->where('status', '1');
		$query = $this->db->get($this->category);
		return $query->result();
	}

	/*
	*
	checkExistance OF CATEGORY
	*
	*/

	public function checkExistance($val)
	{
		$query = $this->db->get_where($this->category, array('name' => $val));

		if ($query->num_rows()) return $query->row();
		return false;
	}

	public function getCategoryById($catId)
	{
		$this->db->select("*");
		$this->db->from('category');
		$this->db->where('id', $catId);
		$query = $this->db->get();
		return $query->row();
	}
	public function getCategoryIDByName($catName)
	{
		$this->db->select("*");
		$this->db->from($this->category);
		$this->db->where('name', $catName);
		$query = $this->db->get();
		return $query->row();
	}

	public function AddNewCategory($data)
	{
		$this->db->insert($this->category, $data);
		return $this->db->insert_id();
	}

	public function updateCategory($CatID, $UpdateData)
	{
		$this->db->where('id', $CatID);
		$rntData = $this->db->update('category', $UpdateData);
		return $rntData;
	}
	public function UpdateStatus($upStatusData, $CatID)
	{
		$this->db->where('id', $CatID);
		$rntData = $this->db->update('category', $upStatusData);
		return $rntData;
	}
	public function DeleteCategory($CatID)
	{
		$this->db->delete('category', array('id' => $CatID));
		return true;
	}

	public function getCategoryCount()
	{
		return $this->db->count_all($this->category);
	}

	public function GetLastRow()
	{
		$this->db->select('id');
		$this->db->from($this->category);
		$this->db->order_by('id', "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		return $CatData = $query->row();
	}


	////////////////////////////////////////////////////////////
}