<?php 
   class Photo_gallery_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	
	
	
	
	
	
	// it fetch photo on search based
	
	function search_photo($campus_id)
	 {
		$this->db->select('photo_gallery.gallery_id,
		photo_gallery.name,
		photo_gallery.title,
		campus.name	as campus
		');
		$this->db->from('campus');
		$this->db->join('photo_gallery', 'campus.campus_id=photo_gallery.gallery_id');		
				
		if($campus_id==1)
		{
				
		}
		else
		{
			$sql="photo_gallery.campus_id='$campus_id' ";
			$this->db->where($sql);				
		}
				
		$this->db->order_by("modify_date", "desc");
		$this->db->limit(20);
		
		$query = $this->db->get();
		return $query->result();
		 
	 }
	 
	 
	
   }
 ?>