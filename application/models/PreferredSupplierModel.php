<?php
class PreferredSupplierModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //load config
        $this->config->load('config');
        // encryption library
        $this->load->library('encryption');
    }

    public function supplierCategory($supplierId){
      $this->db->select('cat_id');
      $this->db->from('user_cat_type');
      $this->db->where(['user_id' => $supplierId]);
      $query = $this->db->get();
      return $query->result();
    } 

    public function supplierList($userId)
    {
        $this->db->select('*');
        $this->db->from('preferred_suppliers');
        $this->db->join('users', 'users.id = preferred_suppliers.supplier_id', 'left');
        $this->db->where(['preferred_suppliers.buyer_id' => $userId]);
        $query = $this->db->get();
        return $query->result();
    }

    public function deletePreferredSupplier($buyerId, $supplierId)
    {
        $array = array('buyer_id' => $buyerId, 'supplier_id' => $supplierId);
        $this->db->where($array);
        $this->db->delete('preferred_suppliers');
        return $this->db->affected_rows();
    }

    public function addPreferredSupplier($newSupplier)
    {
        $this->db->from('preferred_suppliers')
                 ->where('buyer_id', $newSupplier[0])
                 ->where('supplier_id', $newSupplier[1]);
        $duplicate = $this->db->get();
        if($duplicate->num_rows() == '0'){
            $supplier_category = $this->supplierCategory('90');
            $category = array();
            foreach ($supplier_category as $value){
              array_push($category, $value->cat_id);
            }
            $data = array(
                'buyer_id' => $newSupplier[0],
                'supplier_id' => $newSupplier[1],
                'supplier_categories' => implode(",", $category),
            );
            $this->db->insert('preferred_suppliers', $data);
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }

    public function updateNote($newNote)
    {
        $data = array(
            'note' => $newNote[0],
        );
        $this->db->where(['buyer_id' => $newNote[1], 'supplier_id' => $newNote[2]]);
        $this->db->update('preferred_suppliers', $data);
        return $this->db->affected_rows();
    }

    public function linkSupplierWithMaster($masterId, $preferId)
    {
        $this->db->set('linked_master_product', "CONCAT(linked_master_product,',','".$masterId."')", FALSE); 
        $this->db->where('prefer_id', $preferId);
        $this->db->update('preferred_suppliers');
    }

}
