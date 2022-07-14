<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	
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
		$this->load->model('Company_model');
		$this->load->model('Experience_model');
		$this->load->model('Department_model');
		$this->load->model('Campus_model');
		$this->load->model('Business_model');		
		$this->load->library('session');
		$this->load->helper('url');	
		$this->load->library('form_validation');	
	 }
	 

function post_job()
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
		$this->load->helper('url');	
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');			
		
		$this->form_validation->set_rules('jcompany', 'Company', 'required');
		$company=$this->input->post('jcompany');
		if($company=='other_company')
		{
			$this->form_validation->set_rules('other_company', 'Other Company', 'required|max_length[50]');
		}
		
		$title=$this->input->post('title');
		$this->form_validation->set_rules('title', 'Job Title', 'required');
		if($title=='other_title')
		{
			$this->form_validation->set_rules('other_title', 'Other Title', 'required|max_length[100]');
		}
		$this->form_validation->set_rules('jexp', 'Experience', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('jcampus', 'Campus', 'required');
		$this->form_validation->set_rules('ldate', 'Last Date', 'required');
		$this->form_validation->set_rules('jbusiness', 'Business', 'required');
		
		$business=$this->input->post('jbusiness');
		if($business=='other_business')
		{
			$this->form_validation->set_rules('other_business', 'Other Business', 'required|max_length[50]');
		}
		
		$this->form_validation->set_rules('jsdetail', 'Short Detail', 'required|max_length[200]');
		$this->form_validation->set_rules('jldetail', 'Long Detail', 'required|max_length[500]');
				
				
		
		if ($this->form_validation->run() == FALSE) 
		{
			$job_title_list=$this->Job_model->get_job_title();
			$company_list=$this->Company_model->get_company();
			$experience_list=$this->Experience_model->get_experience();
			$department_list=$this->Department_model->get_department();
			$campus_list=$this->Campus_model->get_campus();
			$business_list=$this->Business_model->get_business();
			
			$data['job_title_list']=$job_title_list;
			$data['company_list']=$company_list;
			$data['experience_list']=$experience_list;
			$data['department_list']=$department_list;
			$data['campus_list']=$campus_list;
			$data['business_list']=$business_list;			
			
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('job/job',$data);
				$this->load->view('footer.php');				
			}
			
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('job/job',$data);
				$this->load->view('footer');				
			}
		} 
		else
		{
			if($business=='other_business')
			{
				$business_type = array('name'=>$this->input->post('other_business'));				
				$business=$this->Business_model->insert($business_type);				
			}
			if($company=='other_company')
			{
				$company_name = array('name'=>$this->input->post('other_company'));
				$company=$this->Company_model->insert($company_name);
			}
			if($title=='other_title')
			{
				$job_title = array('title'=>$this->input->post('other_title'));
				$title=$this->Job_model->insert_job_title($job_title);
			}
			
			$date = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('ldate'))));
			$data = array(
						'user_id'=>$user_id,
						'job_title_id' => $title,
						'business_id' => $business,
						'company_id' => $company,
						'experience_id' => $this->input->post('jexp'),
						'department_id' => $this->input->post('department'),
						'campus_id' => $this->input->post('jcampus'),
						'last_date' => $date,
						'short_detail' => $this->input->post('jsdetail'),
						'long_detail' => $this->input->post('jldetail'),
						'modify_date'=>date("Y-m-d")
					);
					
		  //Transfering data to Model
		  $this->Job_model->job_post($data);
		
		//Loading View
		$data['msg'] = '<CENTER> <h3 style="color:green;">You have successfully submitted the job. It will be visible to others after the admin approval with in 24 hours. To get publish rights on alumni portal kindly email us from your NU Email OR prove your identity by some other authorized alumni user. OR by visiting the Your Campus </h3></CENTER><br>';
		
		
		if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('job/job',$data);
				$this->load->view('footer.php');				
			}
			
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('job/job',$data);
				$this->load->view('footer');				
			}
		}
		}
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
	function job_detail($job_id)  
	 {
		 
		 if($job_id!='')
		 {
			 $job_detail=$this->Job_model->job_detail($job_id);
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
			 
				 //it fetch record for job left side search panel
			$job_title_list=$this->Job_model->get_job_title();
			$company_list=$this->Company_model->get_company();
			$experience_list=$this->Experience_model->get_experience();
			$business_list=$this->Business_model->get_business();
			
			$data1['job_title_list']=$job_title_list;
			$data1['company_list']=$company_list;
			$data1['experience_list']=$experience_list;
			$data1['business_list']=$business_list;
			$data1['title_id']='';
			$data1['company_id']='';
			$data1['business_id']='';
			$data1['experience_id']='';
			///////////////////////////////////
			// to show detail only to admin 
			$role=$this->session->userdata('role');		
			if($role=='alumni'||$role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('job/job_detail', array('job_detail'=>$job_detail));	
				$this->load->view('footer.php');				
			}
			else
			{// it shows to every one
				$this->load->view('header',$data);
				$this->load->view('job/job_left_menu',$data1);
				$this->load->view('job/job_detail', array('job_detail'=>$job_detail));	
				$this->load->view('footer.php');
			}
			 
		 }
		 
		 				
	 }
	 
	 function get_all_job($record_limit)
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
		 	$record_limit=1;
		 }
		 
		// it will count the job which are not expired to use in pagination
		$job_count=$this->Job_model->count_job();	
			
		$data=$this->header();
		$data1=$this->search_left_menu();
		$data1['title_id']='';
		$data1['company_id']='';
		$data1['business_id']='';
		$data1['experience_id']='';
		
		//it fetch the job which are expired
		$job_all=$this->Job_model->get_all_job($record_limit);
		$data2=$this->pagination($job_count);
		$data2['job_list']=$job_all;
		
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('job/job_left_menu',$data1);
		$this->load->view('job/job_list', $data2);	
		$this->load->view('footer.php'); 
		 
	 }
	 
	 function search_job($record_limit)
	 {
		  if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
		 	$record_limit=1;
		 }					
		
		$title_id=$this->input->post('title');
		$company_id=$this->input->post('jcompany');
		$business_id=$this->input->post('jbusiness');
		$experience_id=$this->input->post('jexp');		
		
		$data=$this->header();
		$data1=$this->search_left_menu();
		$data1['title_id']=$title_id;
		$data1['company_id']=$company_id;
		$data1['business_id']=$business_id;
		$data1['experience_id']=$experience_id;
		
		//it fetch the job on search 
		$job_search=$this->Job_model->search_job($record_limit,$title_id,$company_id,$business_id,$experience_id);
		$search_job_count=count($job_search);
		//$data2=$this->pagination($search_job_count);			
		$data2['job_list']=$job_search;	
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('job/job_left_menu',$data1);
		$this->load->view('job/job_list', $data2);	
		$this->load->view('footer.php');
		
		
		 
	 }
	 
	 // it return dropdown value to left panel
	 function search_left_menu()
	 {
		 
		$job_title_list=$this->Job_model->get_job_title();
		$company_list=$this->Company_model->get_company();
		$experience_list=$this->Experience_model->get_experience();
		$business_list=$this->Business_model->get_business();		
		$data1['job_title_list']=$job_title_list;
		$data1['company_list']=$company_list;
		$data1['experience_list']=$experience_list;
		$data1['business_list']=$business_list;
		
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
		$config['base_url'] = base_url().'joblist';
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
		$data2['link']=	$this->pagination->create_links();
		return $data2;
		 
	 }
	 
	 function approve_job($id)
	 {
		$role=$this->session->userdata('role');		
		if($id!=''&& $role=='admin')
		{
			$approve=$this->Job_model->approve($id);	
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