<?php 
   class Country_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function insert($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('country', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function get_country()
	{
		// it will get company names
		$sql = $this->db->query("select * from country order by country_id asc");
		return $sql->result();
	}
	
	
   } 
?> 