<?php 
   class Department_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function post_company($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('department', $data);
	}
	
	function get_department()
	{
		// it will get company names
		$sql = $this->db->query("select * from department order by department_id asc");
		return $sql->result();
	}
	
	
   } 
?> 