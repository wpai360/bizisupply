<?php
class ApiModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //load config
        $this->config->load('config');
        // encryption library
        $this->load->library('encryption');
    }
    private function generateApiKey($id)
    {
        $apiKey = bin2hex(random_bytes(12));
        $data = array(
        'key' => $apiKey,
        'user_id' => $id,
        'ip_addresses' => $this->input->ip_address(),
        'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert('api_keys', $data);
        return $apiKey;
    }

/*    This method will check if the user have an API key*/
/*    If the key exist, return it and store in session*/
/*    If not exist, create a new key, store in the database and then return into session*/

    public function checkApiKey($id)
    {
        $this->db->select('*');
        $this->db->from('api_keys');
        $this->db->where(['user_id' => $id]);
        $apiKey = $this->db->get();
        if($apiKey->num_rows()>0){
          return $apiKey->result()[0]->key;
        }else{
          $newKey = $this->generateApiKey($id);
          return $newKey;
        }

    }






}
