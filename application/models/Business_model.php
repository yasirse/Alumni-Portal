<?php 
   class Business_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function insert($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('business', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function get_business()
	{
		// it will get company names
		$sql = $this->db->query("select * from business order by business_id asc");
		return $sql->result();
	}
	
	
   } 
?> 