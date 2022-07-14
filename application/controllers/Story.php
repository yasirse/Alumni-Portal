<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller {
	
		 function __construct() 
	 {
		parent::__construct();
 		$this->load->database();
		
		$this->load->model('Views_model');
		$this->load->model('Job_model');
		$this->load->model('Newsevent_model');
		$this->load->model('Scholarship_model');
		$this->load->model('Story_model');
		$this->load->model('Company_reg_model');
		$this->load->model('Campus_model');
		$this->load->model('Department_model');
		$this->load->model('story_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		
	 }			
		
	
	 	function post_story() 
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		
		$config['upload_path']   = './uploads/stories/'; 
		$config['allowed_types'] = 'gif|jpg|png';  
		$config['max_size']      = 100; 
		$config['max_width']     = 300; 
		$config['max_height']    = 300; 
		$config['file_name'] = strtolower(date("ymdhis").$this->session->userdata('user_id'));
		$this->load->library('upload', $config);
		
		
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
			
		$this->form_validation->set_rules('sname', 'Name', 'required|max_length[100]');
	  
	  if (empty($_FILES['sfile']['name']))
		{
			$this->form_validation->set_rules('sfile', 'Photo', 'required');
		}
		
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('campus', 'Campus', 'required');		 
		$this->form_validation->set_rules('sbdetail', 'Brief Description', 'required|max_length[200]');
		$this->form_validation->set_rules('sfdetail', 'Long Detail', 'required|max_length[500]');
		
		$department_list=$this->Department_model->get_department();
			$campus_list=$this->Campus_model->get_campus();
			$data['campus_list']=$campus_list;
			$data['department_list']=$department_list;		
		
		if ($this->form_validation->run() == FALSE) 
		{
			
					
			
				if($role=='admin')
				{
					$this->load->view('profile_header');
					$this->load->view('admin/admin_left_menu');
					$this->load->view('story/success_story',$data);
					$this->load->view('footer.php');				
				}
				
				else if($role=='alumni')
				{
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('story/success_story',$data);
					$this->load->view('footer');				
				}
		} 
		else
		{
			
			if ( ! $this->upload->do_upload('sfile'))
				{
					$data['error']=$this->upload->display_errors('<div class="error">', '</div>');
				
					if($role=='admin')
					{
						$this->load->view('profile_header');
						$this->load->view('admin/admin_left_menu');
						$this->load->view('story/success_story',$data);
						$this->load->view('footer.php');				
					}
					
					else if($role=='alumni')
					{
						$this->load->view('profile_header');
						$this->load->view('alumni_profile/alumni_left_menu');
						$this->load->view('story/success_story',$data);
						$this->load->view('footer');				
					}
				      			
				}
				else
				{
					$upload_msg =$this->upload->data() ;
					$old_file_name=$upload_msg['file_name'];
					$file_name=strtolower($old_file_name);
					rename('./uploads/stories/'.$old_file_name,'./uploads/stories/'.$file_name);
					$data = array(
						'user_id'=>$user_id,
						'name' => $this->input->post('sname'),
						'photo_path' =>  $file_name,
						'campus_id' => $this->input->post('campus'),
						'department_id' => $this->input->post('department'),
						'short_detail' => $this->input->post('sbdetail'),
						'long_detail' => $this->input->post('sfdetail'),
						'posted_by' =>  $this->session->userdata('cnic'),
						'modify_date'=>date("Y-m-d")
						);
						
					//Transfering data to Model
					$this->story_model->insert($data);
		
					//Loading View
					$success= '<CENTER> <h3 style="color:green;">Your have successfully submitted the job. It will be visible to others after the admin approval with in 24 		hours. To get publish rights on alumni portal kindly email us from your NU Email OR prove your identity by some other authorized alumni user. OR by visiting 								the Your Campus </h3></CENTER><br>';
					//$upload_msg='hello buddy';
					
				$data['upload_msg']= $upload_msg;
					 $data['success_msg']=$success  ;
					
					
					
					if($role=='admin')
				{
					$this->load->view('profile_header');
					$this->load->view('admin/admin_left_menu');
					$this->load->view('story/success_story',$data);
					$this->load->view('footer.php');				
				}
				
				else if($role=='alumni')
				{
					echo 'yasir';
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('story/success_story',$data);
					$this->load->view('footer');				
				}
		}
	
		}
		}//end of if (role==alumni)
		else
		{
			$job_list=$this->Job_model->get_job1();
			$scholarship_list=$this->Scholarship_model->get_scholarship1();
			$newsevent_list=$this->Newsevent_model->get_newsevent1();
			$story_list=$this->Story_model->get_story1();
			$company_list=$this->Company_reg_model->get_company1();
			
			$data['job']=$job_list;
			$data['scholarship']=$scholarship_list;
			$data['newsevent']=$newsevent_list;
			$data['story']=$story_list;
			$data['company']=$company_list;
			$this->load->view('header',$data);
			$this->load->view('home');
			$this->load->view('footer');
		}
		
	}
	
	
	
	function story_detail($id)  
	 {
		 
		 if($id!='')
		 {
			$story_detail=$this->Story_model->story_detail($id);
			$data=$this->header();
			$data1=$this->search_left_menu();
			
			//it fetch record for left side search panel
			$data1['name']='';
			$data1['campus_id']='';
			$data1['department_id']='';				
			///////////////////////////////////
			// to show detail only to admin 
			$role=$this->session->userdata('role');	
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('story/story_detail', array('story_detail'=>$story_detail));
				$this->load->view('footer.php');				
			}
			else
			{// it shows to every one
				$this->load->view('header',$data);
				$this->load->view('story/story_left_menu',$data1);
				$this->load->view('story/story_detail', array('story_detail'=>$story_detail));
				$this->load->view('footer.php');
			}	 
			
						 
			 
		 }
	 }
	 
	 function get_all_story($record_limit)
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
		 	$record_limit=1;
		 }
		// it will count the job which are not expired to use in pagination
		$story_count=$this->Story_model->story_count();
		$data=$this->header();
		$data1=$this->search_left_menu();	
		
		//it fetch record for left side search panel
		$data1['name']='';
		$data1['campus_id']='';
		$data1['department_id']='';				
		///////////////////////////////////
		
		//it fetch the record 
		$story_list=$this->Story_model->get_all_story($record_limit);	
		//print_r($newsevent_list);
		$data2=$this->pagination($story_count);	
		$data2['story_list']=$story_list;		
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('story/story_left_menu',$data1);
		$this->load->view('story/story_list', $data2);	
		$this->load->view('footer.php'); 
		
		
		 
	 }
	 
	  function search_story()
	 {
		  if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
			 
		 	$record_limit=1;
		 }					
		
		
		$name=$this->input->post('name');
		$campus_id=$this->input->post('jcampus');
		$department_id=$this->input->post('department');					
		
		$data=$this->header();
		$data1=$this->search_left_menu();
		//it fetch record for left side search panel
		$data1['name']=$name;
		$data1['campus_id']=$campus_id;
		$data1['department_id']=$department_id;				
		///////////////////////////////////
		
		if($name=="")
		{
			$name="$111$^";
		}
		
		
		
		//it fetch the job on search 
		$story_search=$this->Story_model->search_story($record_limit,$name,$campus_id,$department_id);
		$search_story_count=count($story_search);
		
		//$data2=$this->pagination($search_job_count);	
		$data2['pagination']='';//it is disabled bcz how can i tell the total count no of search, one way is to call  search function twice	
		$data2['story_list']=$story_search;	
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('story/story_left_menu',$data1);
		$this->load->view('story/story_list', $data2);	
		$this->load->view('footer.php'); 
		 
	 }
	 
	 //it fetch record for story left side search panel
	  function search_left_menu()
	 {		
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data1['campus_list']=$campus_list;
		$data1['department_list']=$department_list;
					
		return $data1;
	 }
	 
	  //it the top 5 jobs,scholarship,newsevent, stories and registered companies
	 function header()
	 {
		 		
		$job_list=$this->Job_model->get_job1();
		$scholarship_list=$this->Scholarship_model->get_scholarship1();
		$newsevent_list=$this->Newsevent_model->get_newsevent1();
		$story_list=$this->Story_model->get_story1();
		$company_list=$this->Company_reg_model->get_company1();
		$data['job']=$job_list;
		$data['scholarship']=$scholarship_list;
		$data['newsevent']=$newsevent_list;
		$data['story']=$story_list;
		$data['company']=$company_list;	
		$views_list=$this->Views_model->get_story1();
		$data['views_list']=$views_list	;		
		return $data;
		 
	 }
	 
	 //it return pagination link
	 function pagination($count)
	 {
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'storylist';
		$config['total_rows'] = $count;
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);	
		$data2['pagination']=	$this->pagination->create_links();
		return $data2;
		 
	 }
	 
	 function approve_story($id)
	 {
		$role=$this->session->userdata('role');		
		if($id!=''&& $role=='admin')
		{
			$approve=$this->Story_model->approve($id);	
			$data['new_job']=$this->Job_model->new_job();
			$data['new_scholarship']=$this->Scholarship_model->new_scholarship();
			$data['new_newsevent']=$this->Newsevent_model->new_newsevent();
			$data['new_story']=$this->Story_model->new_story();
			$data['new_company']=$this->Company_reg_model->new_company();
			$data['approve']=$approve;
			$this->load->view('profile_header');
			$this->load->view('admin/admin_left_menu');
			$this->load->view('admin/admin_panel',$data);
			$this->load->view('footer.php');
		}
		 
	 }
	 
	 
	
	 	
}
?>