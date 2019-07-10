<?php
/**
 * Contact Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Gilbert Pellegrom
 * @link http://dev7studios.com
 * @version 1.0
 */

class Contact extends CI_Model
{

    /***Table Name****/
    public $contact;
    

    public function __construct()
    {
        parent::__construct();

        //load config
        $this->config->load('config');
        //get table name
        $this->contact = $this->config->item('contact');
    }


    ////////////////////////////////////////////////////////

    /*
     *
     Create Contact
     *
     */
    
    public function inserted($data)
    {
        $this->db->insert($this->contact, $data);
        return $this->db->insert_id();
    }
}

/* End of file: Contact.php */
/* Location: application/models/Contact.php */

////////////////////////FINISH////////////////////////////
