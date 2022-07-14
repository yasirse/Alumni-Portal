<?php 
   class Newsevent_model extends CI_Model {
	
  function __construct() 
	{
		parent::__construct();
	}
	
	


	
	function newsevents_post($data)
	{
		
		// Inserting in Table(alumni_user) of Database(alumni)
		$this->db->insert('newsevent', $data);
	}
	
	function get_newsevent1()
	{
		//it will get top 5 newsevent which are not expired 
		$sql = $this->db->query("select DATE_FORMAT(event_date, '%b') as month,DATE_FORMAT(event_date, '%y') as year,newsevent_id,short_detail,title,long_detail from newsevent where status=1 order by modify_date desc limit 4 ");
		return $sql->result();
	}
	
	function newsevent_detail($id)
	{
		$this->db->select('*');
		$this->db->from('newsevent');
		$this->db->join('campus', 'newsevent.campus_id = campus.campus_id');
		$this->db->where('newsevent_id',$id);
		$query = $this->db->get();
		return $query->result();

	}
	
	function get_all_newsevent($record_limit)
	{
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('newsevent.newsevent_id,
		newsevent.title,
		newsevent.event_date,
		newsevent.short_detail,
		newsevent.modify_date,
		campus.name	as campus');
		$this->db->from('campus');
		$this->db->join('newsevent', 'newsevent.campus_id = campus.campus_id');		
		$this->db->where('status','1');
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	// it count the newsevent which are expired
	function newsevent_count()
	{
		$this->db->select();
		$this->db->from('newsevent');		
		return $this->db->count_all_results();
		
		
	}
	
	function search_newsevent($record_limit,$campus_id,$event_title,$event_date)
	{
				
		$record_start=$record_limit;
		$record_end=$record_limit+10;
		$this->db->select('newsevent.newsevent_id,
		newsevent.title,
		newsevent.event_date,
		newsevent.short_detail,
		newsevent.modify_date,
		campus.name	as campus
		');
		$this->db->from('campus');
		$this->db->join('newsevent', 'newsevent.campus_id = campus.campus_id');		
		$this->db->where('status','1');
		$sql="newsevent.campus_id='$campus_id' OR newsevent.title like '%$event_title%' OR newsevent.event_date='$event_date'";
		if($campus_id==1)
		{
				
		}
		else
		{
			$this->db->where($sql);				
		}
		//$sql="newsevent.event_date='$event_date' ";
		
		$this->db->order_by("modify_date", "desc");
		//$this->db->limit($record_start,$record_end);
		//$this->db->limit($record_start);//currently it is disabled due to sql limit is not supported  by maria db
		$query = $this->db->get();
		return $query->result();		
		
	}
	
	function new_newsevent()
	{		
		$this->db->select('*');
		$this->db->from('campus');
		$this->db->join('newsevent', 'newsevent.campus_id = campus.campus_id');		
		$this->db->where('status','0');
		$this->db->order_by("modify_date", "desc");
		$query = $this->db->get();
		return $query->result();
		
	}
	
	function approve($id)
	{
		$this->db->set('status', '1');
		$this->db->where('newsevent_id', $id);
		$this->db->update('newsevent');
		$bool=$this->db->affected_rows();
		return 	 $bool;			
	}
	
   }
 ?>