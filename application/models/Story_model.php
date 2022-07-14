<?php 
   class Story_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	function insert($data)
	{
		
// Inserting in Table(alumni_user) of Database(alumni)
	$this->db->insert('story', $data);
	}
	
	function get_story1()
	{
		//it will get top 5 story which are not expired 
		$sql = $this->db->query("select * from story where status=1 order by modify_date desc limit 5 ");
		return $sql->result();
	}
	
	function story_detail($id)
	{
		$this->db->select('*');
		$this->db->from('story');		
		$this->db->where('story_id',$id);
		$query = $this->db->get();
		return $query->result();

	}
	
	function get_all_story($record_limit)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('story.story_id,
		story.name,
		story.photo_path,
		story.short_detail,
		story.modify_date,
		campus.name	as campus,
		department.name as department
		');
		$this->db->from('campus');
		$this->db->join('story', 'campus.campus_id=story.campus_id');	
		$this->db->join('department', 'story.department_id = department.department_id');		
		$this->db->where('status','1');
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		$this->db->limit($record_end);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	
	
	// it count the job which are expired
	function story_count()
	{
		$this->db->select();
		$this->db->from('story');
		return $this->db->count_all_results();	
		
	}
	
	function search_story($record_limit,$name,$campus_id,$department_id)
	 {
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('story.story_id,
		story.name,
		story.photo_path,
		story.short_detail,
		story.modify_date,
		campus.name	as campus,
		department.name as department
		');
		$this->db->from('campus');
		$this->db->join('story', 'campus.campus_id=story.campus_id');	
		$this->db->join('department', 'story.department_id = department.department_id');		
		$this->db->where('status','1');
		
		if($campus_id==1||$department_id==1)
		{
				
		}
		else
		{
			$sql="story.name like '%$name%' OR story.campus_id='$campus_id' OR story.department_id='$department_id'";
			$this->db->where($sql);				
		}
		//$sql="story.event_date='$event_date' ";		
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		//$this->db->limit($record_start);//currently it is disabled due to sql limit is not supported  by maria db
		$query = $this->db->get();
		return $query->result();
		 
	 }
	 
	 function new_story()
	 {
		$this->db->select('story.story_id,
		story.name,
		story.photo_path,
		story.short_detail,
		story.modify_date,
		campus.name	as campus,
		department.name as department
		');
		$this->db->from('campus');
		$this->db->join('story', 'campus.campus_id=story.campus_id');	
		$this->db->join('department', 'story.department_id = department.department_id');		
		$this->db->where('status','0');
		$this->db->order_by("modify_date", "desc");
		$query = $this->db->get();
		return $query->result();
		 
	 }
	 
	 function approve($id)
	{
		$this->db->set('status', '1');
		$this->db->where('story_id', $id);
		$this->db->update('story');
		$bool=$this->db->affected_rows();
		return 	 $bool;			
	}
	
   }
 ?>