<?php 
   class User_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	function alumni_register($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('user', $data);
	}	
	
   } 
?> 