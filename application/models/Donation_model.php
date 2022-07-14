<?php 
   class Donation_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	
	function donation_post($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('donation', $data);
	}
}