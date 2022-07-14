<?php 
   class Suggestion_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	
	function suggestion_post($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('suggestion', $data);
	}
}