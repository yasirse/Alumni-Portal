<?php 
   class Campus_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function post_campus($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('campus', $data);
	}
	
	function get_campus()
	{
		// it will get company names
		$sql = $this->db->query("select * from campus order by campus_id asc");
		return $sql->result();
	}
	
	
   } 
?> 