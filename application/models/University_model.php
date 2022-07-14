<?php 
   class University_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function insert($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('university', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function get_university()
	{
		// it will get company names
		$sql = $this->db->query("select * from university order by university_id asc");
		return $sql->result();
	}
	
	
   } 
?> 