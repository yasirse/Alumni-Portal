<?php 
   class Job_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	function job_post($data)
	{		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('job', $data);
	}
	function get_job1()
	{
		//it will get top 5 job which are not expired 
		$sql = $this->db->query("select 
		job.job_id,
		job.job_title_id,
		job.last_date,
		job.short_detail,
		job.long_detail,
		job.modify_date,
		job_title.title as title,
		business.name as business,
		company.name as company,
		experience.name as experience,
		department.name as department,
		campus.name as campus		
		from job_title INNER JOIN job ON job_title.job_title_id=job.job_title_id 
		INNER JOIN business ON business.business_id=job.business_id
		INNER JOIN company ON company.company_id=job.company_id
		INNER JOIN experience ON experience.experience_id=job.experience_id
		INNER JOIN department ON department.department_id=job.department_id
		INNER JOIN campus ON campus.campus_id=job.campus_id
		where status=1 order by modify_date desc limit 5");
		return $sql->result();
	}
	
	function get_job_title()
	{
		// it will get job title list
		$sql = $this->db->query("select * from job_title order by job_title_id asc");
		return $sql->result();
	}
	
	function job_detail($id)
	{
		$this->db->select('job.job_id,
		job.job_title_id,
		job.last_date,
		job.short_detail,
		job.long_detail,
		job.modify_date,
		job_title.title as title,
		business.name as business,
		company.name as company,
		experience.name as experience
		');
		$this->db->from('job_title');
		$this->db->join('job', 'job_title.job_title_id = job.job_title_id');
		$this->db->join('business', 'business.business_id=job.business_id');
		$this->db->join('company', 'company.company_id=job.company_id');
		$this->db->join('experience', 'experience.experience_id=job.experience_id');
		$this->db->where('job_id',$id);		
		$query = $this->db->get();
		return $query->result();

	}
	
	
	function insert_job_title($data)
	{		
		// Inserting new title job_title 
		$this->db->insert('job_title', $data);
	}
	
	function get_all_job($record_limit)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('job.job_id,
		job.job_title_id,
		job.last_date,
		job.short_detail,
		job.long_detail,
		job.modify_date,
		job_title.title as title,
		business.name as business,
		company.name as company,
		experience.name as experience,
		department.name as department,
		campus.name as campus');
		$this->db->from('job_title');
		$this->db->join('job', 'job_title.job_title_id = job.job_title_id');
		$this->db->join('business', 'business.business_id=job.business_id');
		$this->db->join('company', 'company.company_id=job.company_id');
		$this->db->join('experience', 'experience.experience_id=job.experience_id');
		$this->db->join('department', 'department.department_id=job.department_id');
		$this->db->join('campus', 'campus.campus_id=job.campus_id');
		$this->db->where('status','1');
		$this->db->where('last_date >=CURDATE()');
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	
	// it count the job which are expired
	function count_job()
	{
		$this->db->select();
		$this->db->from('job');		
		$this->db->where('last_date >=CURDATE()');
		return $this->db->count_all_results();	
		
	}
	
	function search_job($record_limit,$title_id,$company_id,$business_id,$experience_id)
	{
				
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('job.job_id,
		job.job_title_id,
		job.last_date,
		job.short_detail,
		job.long_detail,
		job.modify_date,
		job.company_id,
		job.business_id,
		job_title.title as title,
		business.name as business,
		company.name as company,
		experience.name as experience,
		department.name as department,
		campus.name as campus');
		$this->db->from('job_title');
		$this->db->join('job', 'job_title.job_title_id = job.job_title_id');
		$this->db->join('business', 'business.business_id=job.business_id');
		$this->db->join('company', 'company.company_id=job.company_id');
		$this->db->join('experience', 'experience.experience_id=job.experience_id');
		$this->db->join('department', 'department.department_id=job.department_id');
		$this->db->join('campus', 'campus.campus_id=job.campus_id');
		$this->db->where('status','1');
		$sql="job.job_title_id='$title_id' OR job.company_id='$company_id' OR job.business_id='$business_id' OR job.experience_id='$experience_id'";
		$this->db->where($sql);
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		//$this->db->limit($record_start);
		$query = $this->db->get();
		return $query->result();
		
		
	}
	
	function new_job()
	{
		//it will get top 5 job which are not expired 
		$sql = $this->db->query("select 
		job.job_id,
		job.job_title_id,
		job.last_date,
		job.short_detail,
		job.long_detail,
		job.modify_date,
		job_title.title as title,
		business.name as business,
		company.name as company,
		experience.name as experience,
		department.name as department,
		campus.name as campus		
		from job_title INNER JOIN job ON job_title.job_title_id=job.job_title_id 
		INNER JOIN business ON business.business_id=job.business_id
		INNER JOIN company ON company.company_id=job.company_id
		INNER JOIN experience ON experience.experience_id=job.experience_id
		INNER JOIN department ON department.department_id=job.department_id
		INNER JOIN campus ON campus.campus_id=job.campus_id
		where status=0 order by modify_date desc ");
		return $sql->result();
	}
	
	function approve($id)
	{
		$this->db->set('status', '1');
		$this->db->where('job_id', $id);
		$this->db->update('job');
		$bool=$this->db->affected_rows();
		return 	 $bool;			
	}
	
}
   
?>