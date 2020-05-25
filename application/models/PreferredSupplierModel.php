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
        $this->db->delete('preferrred_suppliers');
        return $this->db->affected_rows();
    }

    public function addPreferredSupplier($newSupplier)
    {
        $data = array(
            'buyer_id' => $newMaster[0],
            'supplier_id' => $newMaster[1],
            'supplier_categories' => $this->encryption->encrypt($newMaster[2]),
            'note' => $this->encryption->encrypt($newMaster[3]),
        );
        $this->db->insert('preferred_suppliers', $data);
        return $this->db->affected_rows();
    }

    public function updateNote($newNote)
    {
        $data = array(
            'note' => $newNote[0],
        );
        $this->db->where(['buyer_id' => $newNote[1], 'supplier_id' => $newMaster[2]]);
        $this->db->update('preferred_supplier', $data);
        return $this->db->affected_rows();
    }
}
