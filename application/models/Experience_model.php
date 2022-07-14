<?php 
   class Experience_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	
	function get_experience()
	{
		// it will get experience names
		$sql = $this->db->query("select * from experience order by experience_id asc");
		return $sql->result();
	}
	
	
   } 
?> 