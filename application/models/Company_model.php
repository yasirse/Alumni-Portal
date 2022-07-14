<?php 
   class Company_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function insert($data)
	{		
		// it insert company name if already not existing 
		$this->db->insert('company', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function get_company()
	{
		// it fetch company name list 
		$sql = $this->db->query("select * from company order by company_id asc");
		return $sql->result();
	}
	
	
   } 
?> 