<?php 
   class Scholarship_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	
	function scholarship_post($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('scholarship', $data);
	}
	
	function get_scholarship1()
	{
		//it will get top 5 scholarship which are not expired 
		$sql = $this->db->query("select
		scholarship.scholarship_id,
		scholarship.short_detail,
		scholarship.long_detail,
		scholarship.last_date,
		scholarship_title.title as title,
		department.name as department,
		country.country_name as country,
		university.name as university	
		from department INNER JOIN scholarship ON department.department_id=scholarship.department_id
		INNER JOIN scholarship_title ON scholarship_title.scholarship_title_id=scholarship.scholarship_title_id
		INNER JOIN country ON country.country_id=scholarship.country_id
		INNER JOIN university ON university.university_id=scholarship.university_id
		where status=1 order by modify_date desc limit 5 ");
		return $sql->result();
	}
	
	function insert_scholarship_title($data)
	{		
	// Inserting new title job_title
	$this->db->insert('scholarship_title', $data);
	}
	
	function get_scholarship_title()
	{
		// it will get job title list
		$sql = $this->db->query("select * from scholarship_title order by scholarship_title_id asc");
		return $sql->result();
	}
	
	function scholarship_detail($id)
	{
		$this->db->select('*');
		$this->db->from('scholarship_title');
		$this->db->join('scholarship', 'scholarship_title.scholarship_title_id = scholarship.scholarship_title_id');
		$this->db->where('scholarship_id',$id);
		$query = $this->db->get();
		return $query->result();

	}
	
	
	function get_all_scholarship($record_limit)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('scholarship.scholarship_id,
		scholarship.short_detail,
		scholarship.long_detail,
		scholarship_title.title as title,
		scholarship.last_date,
		department.name as department,
		country.country_name as country,
		university.name as university');
		$this->db->from('department');
		$this->db->join('scholarship', 'department.department_id=scholarship.department_id');
		$this->db->join('scholarship_title', 'scholarship_title.scholarship_title_id=scholarship.scholarship_title_id');
		$this->db->join('country', 'country.country_id=scholarship.country_id');
		$this->db->join('university', 'university.university_id=scholarship.university_id');
		
		$this->db->where('status','1');
		$this->db->where('last_date >=CURDATE()');
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	
	// it count the job which are expired
	function count_scholarship()
	{
		$this->db->select();
		$this->db->from('scholarship');		
		$this->db->where('last_date >=CURDATE()');
		return $this->db->count_all_results();
		
		
	}
	
	function search_scholarship($record_limit,$scholarship_title_id,$university_id,$country_id,$department_id)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('scholarship.scholarship_id,
		scholarship.short_detail,
		scholarship.long_detail,
		scholarship_title.title as title,
		scholarship.last_date,
		department.name as department,
		country.country_name as country,
		university.name as university');
		$this->db->from('department');
		$this->db->join('scholarship', 'department.department_id=scholarship.department_id');
		$this->db->join('scholarship_title', 'scholarship_title.scholarship_title_id=scholarship.scholarship_title_id');
		$this->db->join('country', 'country.country_id=scholarship.country_id');
		$this->db->join('university', 'university.university_id=scholarship.university_id');
		
		$this->db->where('status','1');
		
		if($department_id==1)
		{
		//it select all scholarship		
		}
		else
		{
			$sql="scholarship.scholarship_title_id='$scholarship_title_id' OR scholarship.university_id ='$university_id' OR scholarship.country_id='$country_id' OR 					scholarship.department_id='$department_id'";
			$this->db->where($sql);				
		}
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		//$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
		
		////////////////////////////////////////////////////////////////////////////////////////////////////
				
		
	}
	
	
	function new_scholarship()
	{
		//it will get top 5 scholarship which are not expired 
		$sql = $this->db->query("select
		scholarship.scholarship_id,
		scholarship.short_detail,
		scholarship.long_detail,
		scholarship_title.title as title,
		department.name as department,
		country.country_name as country,
		university.name as university	
		from department INNER JOIN scholarship ON department.department_id=scholarship.department_id
		INNER JOIN scholarship_title ON scholarship_title.scholarship_title_id=scholarship.scholarship_title_id
		INNER JOIN country ON country.country_id=scholarship.country_id
		INNER JOIN university ON university.university_id=scholarship.university_id
		where status=0 order by modify_date desc  ");
		return $sql->result();
	}
	
	function approve($id)
	{
		$this->db->set('status', '1');
		$this->db->where('scholarship_id', $id);
		$this->db->update('scholarship');
		$bool=$this->db->affected_rows();
		return 	 $bool;			
	}
	
   }
   ?>