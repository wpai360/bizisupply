<?php
class MasterListModel extends CI_Model
{

    /***Table Name****/
    public $buyer_orders;


    public function __construct()
    {
        parent::__construct();
        //load config
        $this->config->load('config');
        //get table name
        $this->buyer_orders = $this->config->item('buyer_orders');

        // encryption library
        $this->load->library('encryption');
    }

    public function createMasterList($email, $master)
    {
        $userIdQuery = $this->db->query("SELECT id FROM users WHERE email = '" . $email . "'")->result();
        $userId = $userIdQuery[0]->id;
        for ($i = 1; $i <= 10; $i++) {
            $data = array(
                'user_id' => $userId,
                'product_assign_category' => $master[category . $i],
                'brand_name' => $this->encryption->encrypt($master[brand . $i]),
                'order_name' => $this->encryption->encrypt($master[product . $i]),
                'part_number' => $this->encryption->encrypt($master[itemno . $i])
            );
            $this->db->insert('master_list', $data);
        };

        return $this->db->affected_rows();
    }

    public function masterList($userId)
    {
        $this->db->select('*');
        $this->db->from('master_list');
        $this->db->join('category', 'master_list.product_assign_category=category.id');
        $this->db->where(['master_list.user_id' => $userId]);

        $query = $this->db->get();
        return $query->result();
    }

    public function deleteMaster($userId, $masterId)
    {
        $array = array('user_id' => $userId, 'master_id' => $masterId);
        $this->db->where($array);
        $this->db->delete('master_list');
        return $this->db->affected_rows();
    }

    public function addMaster($newMaster)
    {
        $data = array(
            'user_id' => $newMaster[0],
            'product_assign_category' => $newMaster[1],
            'order_name' => $this->encryption->encrypt($newMaster[2]),
            'brand_name' => $this->encryption->encrypt($newMaster[3]),
            'part_number' => $this->encryption->encrypt($newMaster[4])
        );
        $this->db->insert('master_list', $data);
        return $this->db->affected_rows();
    }

    public function updateMaster($newMaster)
    {
        $data = array(
            'product_assign_category' => $newMaster[2],
            'order_name' => $this->encryption->encrypt($newMaster[3]),
            'brand_name' => $this->encryption->encrypt($newMaster[4]),
            'part_number' => $this->encryption->encrypt($newMaster[5])
        );
        $this->db->where(['user_id' => $newMaster[0], 'master_id' => $newMaster[1]]);
        $this->db->update('master_list', $data);
        return $this->db->affected_rows();
    }
}