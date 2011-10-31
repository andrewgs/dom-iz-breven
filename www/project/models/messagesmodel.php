<?php
class Messagesmodel extends CI_Model {
	
	var $id 	= 0;
	var $name 	= "";
	var $text 	= "";
	var $date 	= "";
	var $phone	= 0;
	var $email	= 0;
	
	function __construct(){
        
		parent::__construct();
    }
	
	function read_record($id){
		
		$this->db->where('id',$id);
		$query = $this->db->get('messages',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_records(){
	
		$this->db->order_by('date DESC');
		$query = $this->db->get('messages');
		return $query->result_array();
	}
	
	function insert_record($data){
	
		$this->name  = $data['name'];
		$this->text  = $data['comments'];
		$this->date  = date("Y-m-d");
		$this->phone = $data['phone'];
		$this->email = $data['email'];
		$this->db->insert('messages',$this);
		return $this->db->insert_id();
	}
		
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('messages');
		return $this->db->affected_rows();
	}
	
	function delete_records(){
	
		$this->db->delete('messages');
		return $this->db->affected_rows();
	}
	
	function count_records(){
	
		$this->db->select('count(*) as cnt');
		$query = $this->db->get('messages');
		$data = $query->result_array();
		return $data[0]['cnt'];
	}
	
	function read_limit_records($count,$from){
		
		$this->db->limit($count,$from);
		$this->db->order_by('date DESC');
		$query = $this->db->get('messages');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('messages',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return NULL;
	}
}
?>