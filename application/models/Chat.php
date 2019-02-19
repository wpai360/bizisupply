<?php 


	/**
	* Chat model
	*/
	class Chat extends CI_Model
	{
		
		public function __construct()
	  {
		parent::__construct();

       //load config
		$this->config->load('config');
        //get table name
		$this->chat = $this->config->item('chat');
	
	}

		public function chatSave($data){
			$query = $this->db->insert($this->chat,$data);
			return $query;
		}	


	
	public function getChatUser($senderId,$receiverId,$id,$reqId)
		{
     $res;
			$where = "(`from` = '".$senderId."' AND `to` = '".$receiverId."')";
			$where1 = "(`from` = '".$receiverId."' AND `to` = '".$senderId."')";
			$whereFinal = "($where OR $where1)";
// select * from `chat` where ((`from` = 1 AND `to` = 8) OR (`from` = 8 AND `to` = 1))
			
			if($id){

            $this->db->select('*');
			$this->db->from('chat');
			$this->db->where($whereFinal);
			$this->db->where('requestId',$reqId);
		     $this->db->where('id >', $id);
			 $this->db->order_by('id','DESC');
			$this->db->limit(5);
           $query = $this->db->get();

			}else{
					$res = ' AND `requestId` ='.$reqId;
		$query = $this->db->query('select * from (
    select * from chat where ((`from` = '.$senderId.' AND `to` = '.$receiverId.') OR (`from` = '.$receiverId.' AND `to` = '.$senderId.')) '.$res.'  order by id desc limit 5
) tmp order by tmp.id asc');
		}
			return $query->result();
		}

		public function getChatScroll($senderId,$receiverId,$id,$reqId)
		{

				$where = "(`from` = '".$senderId."' AND `to` = '".$receiverId."')";
			$where1 = "(`from` = '".$receiverId."' AND `to` = '".$senderId."')";
			$whereFinal = "($where OR $where1)";

			
			if($id){

$res = ' AND `requestId` ='.$reqId.' AND `id` <'.$id;

	$query = $this->db->query('select * from (
    select * from chat where ((`from` = '.$senderId.' AND `to` = '.$receiverId.') OR (`from` = '.$receiverId.' AND `to` = '.$senderId.')) '.$res.'  order by id desc limit 5
) tmp order by tmp.id asc');
	return $query->result();
		}
/*
            $this->db->select('*');
			$this->db->from('chat');
			$this->db->where($whereFinal);
			$this->db->where('requestId',$reqId);
		    $this->db->where('id <', $id);
			$this->db->order_by('id','DESC');
			$this->db->limit(5);
            $query = $this->db->get();
            return $query->result();
			}*/
			return false;
		}
	}


?>