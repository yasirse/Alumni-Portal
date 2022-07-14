<?php 
   class Alumni_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	function insert($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('alumni_card', $data);
	}
	
	function update_profile($data,$user_id)
	{
		$this->db->where('user_id', $user_id );
		$this->db->update('user', $data);
		
	}
	
	function alumni_profile_photo($user_id,$data)
	{
		$this->db->where('user_id', $user_id );
		$this->db->update('user', $data);
		
	}
	
	function get_profile_address($user_id)
	{
		
		$this->db->select('
		profile_web_address.web_address_id,
		profile_web_address.user_id,
		profile_web_address.web_name,
		profile_web_address.address,
		');
		$this->db->from('profile_web_address');
		$this->db->join('user', 'profile_web_address.user_id = user.user_id');	
		$sql="profile_web_address.user_id='$user_id' ";	
		$this->db->where($sql);	
		$this->db->order_by("web_address_id", "asc");
		$query = $this->db->get();
		return $query->result();
		
	}
	function update_profile_address($data,$web_address_id)
	{
		$this->db->where('web_address_id', $web_address_id );
		$this->db->update('profile_web_address', $data);
				
	}
	
	function get_basic_profile($user_id)
	{
		$this->db->select('
		user.user_id,
		user.name,
		user.rollno,
		user.cnic,
		user.email,
		user.dob,
		user.photo,
		campus.name campus,
		department.name department
		
		');
		$this->db->from('user');
		$this->db->join('campus', 'user.campus_id = campus.campus_id');	
		$this->db->join('department', 'user.department_id = department.department_id');
		$sql="user.user_id='$user_id' ";	
		$this->db->where($sql);			
		$query = $this->db->get();
		return $query->result();
		
	}
	
	//it add new profile addresses
	function add_profile_address($data)
	{
		$this->db->insert('profile_web_address', $data);
		
	}
	
	
	function remove_profile_address($id,$user_id)
	{
		
		$this->db->where('web_address_id', $id);
		$this->db->where('user_id', $user_id);
      	$this->db->delete('profile_web_address'); 
		
	}
	
		// it count the job which are expired
	function alumni_count_campus($campus_id)
	{
		$this->db->select();
		$this->db->from('user');
		$this->db->where('campus_id', $campus_id);
		return $this->db->count_all_results();	
		
	}
	// it count alumni for pagination where some one search alumni
	function alumni_count($name,$campus_id,$department_id)
	{
		
		$this->db->select();
		$this->db->from('user');
		$this->db->join('campus', 'user.campus_id = campus.campus_id');	
		$this->db->join('department', 'user.department_id = department.department_id');	
		if($campus_id==1||$department_id==1)
		{
			$sql="user.name like '%$name%' ";
				
		}
		else
		{
			$sql="user.name like '%$name%' OR user.campus_id='$campus_id' OR user.department_id='$department_id'";
						
		}
		$this->db->where($sql);
		return $this->db->count_all_results();	
		
	}
	
	
	
	
	function search_alumni($record_limit,$name,$campus_id,$department_id)
	{
		
		$start_from_id=$record_limit;
		$total_recort=10;
		$this->db->select('user.user_id,
		user.name,
		user.rollno,
		user.cnic,
		user.email,
		user.dob,
		user.photo,
		campus.name campus,
		department.name department
		');
		$this->db->from('user');
		$this->db->join('campus', 'user.campus_id = campus.campus_id');	
		$this->db->join('department', 'user.department_id = department.department_id');	
		if($campus_id==1||$department_id==1)
		{
			$sql="user.name like '%$name%' ";
				
		}
		else
		{
			$sql="user.name like '%$name%' OR user.campus_id='$campus_id' OR user.department_id='$department_id'";
						
		}
		$this->db->where($sql);
		$this->db->limit($total_recort,$start_from_id);
		//$this->db->limit($record_end);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	function get_all_alumni_campus($campus_id,$page_limit) 
	{
		$start_from_id=$page_limit;
		$total_recort=10;
		
		$this->db->select('user.user_id,
		user.name,
		user.rollno,
		user.cnic,
		user.email,
		user.dob,
		user.photo,
		user.campus_id,
		campus.name campus,
		department.name department
		');
		$this->db->from('user');
		$this->db->join('campus', 'user.campus_id = campus.campus_id');	
		$this->db->join('department', 'user.department_id = department.department_id');	
		$this->db->where('user.campus_id', $campus_id);	
		$this->db->order_by("rollno", "asc");
		
		$this->db->limit($total_recort,$start_from_id);
		//$this->db->limit($record_end);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	
	
 }
 ?>