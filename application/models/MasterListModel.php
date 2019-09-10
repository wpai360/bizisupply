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
    }

    public function createMasterList($email,$master){

        $user_id_query = $this->db->query("SELECT id FROM users WHERE email = '".$email."'")->result();
        $user_id = $user_id_query[0]->id;
        for($i=1; $i<=5; $i++){
            $data = array(
                'user_id' => $user_id,
                'product_assign_category' => $master[category.$i],
                'brand_name' => $master[brand.$i],
                'order_name' => $master[product.$i],
                'part_number' => $master[itemno.$i]);
            $this->db->insert('master_list', $data); 
        };

    }

    public function masterList($user_id)
    {
        $this->db->select('*');
        $this->db->from('master_list');
        $this->db->join('category','master_list.product_assign_category=category.id');
        $this->db->where(['master_list.user_id' =>$user_id]);
        
        $query =$this->db->get();
        return $query->result();
    }

    public function deleteMaster($user_id, $master_id){
        $array = array('user_id'=>$user_id, 'master_id'=>$master_id);
        $this->db->where($array);
        $this->db->delete('master_list');
        return 1;
    }
    
    
}
