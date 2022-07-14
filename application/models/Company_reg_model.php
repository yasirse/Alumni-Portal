<?php 
   class Company_reg_model extends CI_Model {
	
  	function __construct() 
	{
		parent::__construct();
	}
	
	
	function insert($data)
	{		
		// it register the  company(business of someone)  detail
		$this->db->insert('company_registration', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function get_company1()
	{
		//it will get top 5 story which are not expired 
		$sql = $this->db->query("select * from company_registration where status=1 order by modify_date desc limit 5 ");
		return $sql->result();
	}
	
	function company_registration_detail($id)
	{
		$this->db->select('*');
		$this->db->from('company_registration');
		$this->db->join('business', 'company_registration.business_id = business.business_id');
		$this->db->where('company_reg_id',$id);
		$query = $this->db->get();
		return $query->result();

	}
	
	function get_all_company($record_limit)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('
		company_registration.comp_reg_id,
		company_registration.name,
		company_registration.photo_path,
		company_registration.short_detail,
		company_registration.long_detail,
		company_registration.posted_by,
		company_registration.modify_date,
		company_registration.weblink,
		business.name as business		
		');
		$this->db->from('company_registration');
		$this->db->join('business', 'company_registration.business_id = business.business_id');	
		
		$this->db->where('status','1');
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	
	// it count the job which are expired
	function count_company()
	{
		$this->db->select();
		$this->db->from('company_registration');
		return $this->db->count_all_results();
		
		
	}
	
	function company_detail($id)
	{
		$this->db->select('
		company_registration.comp_reg_id,
		company_registration.name,
		company_registration.photo_path,
		company_registration.short_detail,
		company_registration.long_detail,
		company_registration.posted_by,
		company_registration.modify_date,
		company_registration.weblink,
		company_registration.address,
		business.name as business	
		');
		$this->db->from('company_registration');
		$this->db->join('business', 'company_registration.business_id = business.business_id');	
		$this->db->where('comp_reg_id',$id);		
		$query = $this->db->get();
		return $query->result();

	}
	
	function search_company($record_limit,$name,$business_id)
	 {
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('
		company_registration.comp_reg_id,
		company_registration.business_id,
		company_registration.name,
		company_registration.photo_path,
		company_registration.short_detail,
		company_registration.long_detail,
		company_registration.posted_by,
		company_registration.modify_date,
		company_registration.weblink,
		business.name as business		
		');
		$this->db->from('company_registration');
		$this->db->join('business', 'company_registration.business_id = business.business_id');			
		$this->db->where('status','1');
		
		if($business_id==1)
		{
				
		}
		else
		{
			$sql="company_registration.name like '%$name%' OR company_registration.business_id='$business_id' ";
			$this->db->where($sql);				
		}
		//$sql="story.event_date='$event_date' ";
		
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		//$this->db->limit($record_start);//currently it is disabled due to sql limit is not supported  by maria db
		$query = $this->db->get();
		return $query->result();
		 
	 }
	 
	 function new_company()
	 {
		$this->db->select('
		company_registration.comp_reg_id,
		company_registration.name,
		company_registration.photo_path,
		company_registration.short_detail,
		company_registration.long_detail,
		company_registration.posted_by,
		company_registration.modify_date,
		company_registration.weblink,
		business.name as business		
		');
		$this->db->from('company_registration');
		$this->db->join('business', 'company_registration.business_id = business.business_id');
		$this->db->where('status','0');
		$this->db->order_by("modify_date", "desc");
		$query = $this->db->get();
		return $query->result();
		 
	 }
	 
	 function approve($id)
	{
		$this->db->set('status', '1');
		$this->db->where('comp_reg_id', $id);
		$this->db->update('company_registration');
		$bool=$this->db->affected_rows();
		return 	 $bool;			
	}
	
	
   } 
?> 