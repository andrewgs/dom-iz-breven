<?php
class Projectsmodel extends CI_Model {
	
	var $id 	= 0;
	var $square = "";
	var $price 	= "";
	var $text 	= "";
	var $image	= 0;
	var $shema	= 0;
	var $thumb	= 0;
	
	function __construct(){
        
		parent::__construct();
    }
	
	function read_record($id){
		
		$this->db->select('id,square,price,text');
		$this->db->where('id',$id);
		$query = $this->db->get('projects',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return FALSE;
	}
	
	function read_rundom($low,$high){
	
		$query = "SELECT id,square,price,text FROM projects WHERE square >= $low AND square <= $high ORDER BY RAND() LIMIT 1";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return FALSE;
	}
	
	function read_records(){
		
		$this->db->select('id,square,price,text');
		$query = $this->db->get('projects');
		$data = $query->result_array();
		if(isset($data)) return $data;
		return FALSE;
	}
	
	function insert_record($data,$price){
	
		$this->square= $data['square'];
		$this->price = round($data['square']*$price);
		$this->text  = $data['text'];
		$this->image = $data['image'];
		$this->shema = $data['shema'];
		$this->thumb = $data['thumb'];
		$this->db->insert('projects',$this);
		return $this->db->insert_id();
	}
		
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('projects');
		return $this->db->affected_rows();
	}
	
	function count_records($low,$high){
	
		$this->db->select('count(*) as cnt');
		$this->db->where('square >=',$low);
		$this->db->where('square <=',$high);
		$query = $this->db->get('projects');
		$data = $query->result_array();
		return $data[0]['cnt'];
	}
	
	function read_limit_records($count,$from,$low,$high){
		
		$this->db->limit($count,$from);
		$this->db->where('square >=',$low);
		$this->db->where('square <=',$high);
		$this->db->order_by('square ASC');
		$query = $this->db->get('projects');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('projects',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return NULL;
	}
	
	function get_image($id){
		
		$this->db->where('id',$id);
		$this->db->select('image');
		$query = $this->db->get('projects');
		$data = $query->result_array();
		return $data[0]['image'];
	}
	
	function get_shema($id){
		
		$this->db->where('id',$id);
		$this->db->select('shema');
		$query = $this->db->get('projects');
		$data = $query->result_array();
		return $data[0]['shema'];
	}
	
	function get_thumb($id){
		
		$this->db->where('id',$id);
		$this->db->select('thumb');
		$query = $this->db->get('projects');
		$data = $query->result_array();
		return $data[0]['thumb'];
	}
}
?>