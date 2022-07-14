<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scholarship extends CI_Controller {
	
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
		
		
		$this->load->model('Scholarship_model');
		$this->load->model('Country_model');
		$this->load->model('University_model');
		$this->load->model('Department_model');
		$this->load->library('session');
		$this->load->helper('url');	
		
		$this->load->library('form_validation');
		
	 }
	 

	
	function post_scholarship()
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
			$this->load->helper('url'); 
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
				
			$this->form_validation->set_rules('suni', 'University', 'required');
			$university=$this->input->post('suni');
			if($university=='other_university')
			{
				$this->form_validation->set_rules('other_university', 'Other University', 'required');
			}
			
			
			$title=$this->input->post('title');
			$this->form_validation->set_rules('title', 'Scholarship Title', 'required');
			if($title=='other_title')
			{
				$this->form_validation->set_rules('other_title', 'Other Title', 'required|max_length[100]');
			}
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('slastdate', 'Last Date', 'required');
			$this->form_validation->set_rules('sbdetail', 'Brief Description', 'required|max_length[200]');
			$this->form_validation->set_rules('sldetail', 'Long Detail', 'required|max_length[500]');
			
				
		
			if ($this->form_validation->run() == FALSE)
			{
				$university_list=$this->University_model->get_university();
				$country_list=$this->Country_model->get_country();
				$department_list=$this->Department_model->get_department();
				$scholarship_title_list=$this->Scholarship_model->get_scholarship_title();
				
				$data['scholarship_title_list']=$scholarship_title_list;
				$data['university_list']=$university_list;
				$data['country_list']=$country_list;
				$data['department_list']=$department_list;
				$this->load->view('profile_header');
				
					if($role=='admin')
				{
					$this->load->view('profile_header');
					$this->load->view('admin/admin_left_menu');
					$this->load->view('scholarship/scholarship',$data);
					$this->load->view('footer.php');				
				}
				
				else if($role=='alumni')
				{
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('scholarship/scholarship',$data);
					$this->load->view('footer');				
				}
			} 
			else
			{
				if($university=='other_university')
				{
					$university_name = array('name'=>$this->input->post('other_university'));
					$university=$this->University_model->insert($university_name);
				}
				
				if($title=='other_title')
				{
					$sholarship_title = array('title'=>$this->input->post('other_title'));
					$title=$this->Scholarship_model->insert_scholarship_title($sholarship_title);
				}
				$date = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('slastdate'))));
				$data = array(
							'user_id' => $user_id,
							'scholarship_title_id' => $title,
							'university_id' => $university,
							'country_id' => $this->input->post('country'),
							'department_id' => $this->input->post('department'),
							'last_date' => $date,
							'short_detail' => $this->input->post('sbdetail'),
							'long_detail' => $this->input->post('sldetail'),
							'modify_date'=>date("Y-m-d")
						);
						
			//Transfering data to Model
			$this->Scholarship_model->scholarship_post($data);
			
			//Loading View
			$data['msg'] = '<CENTER> <h3 style="color:green;">You have successfully submitted the Scholarship detail. It will be visible to others after the admin approval with in 24 hours. To get publish rights on alumni portal kindly email us from your NU Email OR prove your identity by some other authorized alumni user. OR Contact Academic Officer at your campus</h3></CENTER><br>';
			
			
					if($role=='admin')
				{
					$this->load->view('profile_header');
					$this->load->view('admin/admin_left_menu');
					$this->load->view('scholarship/scholarship',$data);
					$this->load->view('footer.php');				
				}
				
				else if($role=='alumni')
				{
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('scholarship/scholarship',$data);
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
	
	function scholarship_detail($id)  
	 {
		 
		 if($id!='')
		 {
			$scholarship_detail=$this->Scholarship_model->scholarship_detail($id);
			$data=$this->header();
			$data1=$this->search_left_menu();
			//it fetch record for job left side search panel
			$data1['scholarship_title_id']='';
			$data1['university_id']='';
			$data1['country_id']='';
			$data1['department_id']='';					
			///////////////////////////////////
			
			// to show detail only to admin 
			$role=$this->session->userdata('role');		
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('scholarship/scholarship_detail', array('scholarship_detail'=>$scholarship_detail));
				$this->load->view('footer.php');				
			}
			else
			{// it shows to every one
				$this->load->view('header',$data);
				$this->load->view('scholarship/scholarship_left_menu',$data1);
				$this->load->view('scholarship/scholarship_detail', array('scholarship_detail'=>$scholarship_detail));
				$this->load->view('footer.php');
			}
			
			
			 
			 
		 }
	 }
	 
	 
	 function get_all_scholarship($record_limit)
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
		 	$record_limit=1;
		 }
		// it will count the job which are not expired to use in pagination
		$scholarship_count=$this->Scholarship_model->count_scholarship();
		$data=$this->header();
		$data1=$this->search_left_menu();
		
		
		
		
		//it fetch record for job left side search panel
		$data1['scholarship_title_id']='';
		$data1['university_id']='';
		$data1['country_id']='';
		$data1['department_id']='';					
		///////////////////////////////////
		
		//it fetch the job which are expired
		$scholarship_all=$this->Scholarship_model->get_all_scholarship($record_limit);	
		//print_r($scholarship_all);
		$data2=$this->pagination($scholarship_count);	
		$data2['scholarship_list']=$scholarship_all;		
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('scholarship/scholarship_left_menu',$data1);
		$this->load->view('scholarship/scholarship_list', $data2);	
		$this->load->view('footer.php');
		 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		 
	 }
	 
	  function search_scholarship($record_limit)
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
			 
		 	$record_limit=1;
		 }					
		
		
		 $scholarship_title_id=$this->input->post('title');
		 $university_id=$this->input->post('suni');
		 $country_id=$this->input->post('country');
		 $department_id=$this->input->post('department');
		
		// it convert date to db format of date
		/*if(!empty($this->input->post('nelastdate')))
		{
			$event_date= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('nelastdate'))));
		}
		else
		{
			$event_date='';
		}
		*/
		/////////////////////////////////
		
		$data=$this->header();
		$data1=$this->search_left_menu();
		$data1['scholarship_title_id']=$scholarship_title_id;
		$data1['university_id']=$university_id;
		$data1['country_id']=$country_id;
		$data1['department_id']=$department_id;
		
		/*if($campus_id=="")
		{
			$campus_id="111$^";
		}
		if($event_title=="")
		{
			$event_title="111$^";
		}
		if($event_date=="")
		{
			$event_date="111$^";
		}*/
		
		
		//it fetch the job on search 
		$scholarship_search=$this->Scholarship_model->search_scholarship($record_limit,$scholarship_title_id,$university_id,$country_id,$department_id);
		$search_scholarship_count=count($scholarship_search);
		
		//$data2=$this->pagination($search_scholarship_count);	
		$data2['pagination']='';//it is disabled bcz how can i tell the total count no of search, one way is to call  search function twice	
		$data2['scholarship_list']=$scholarship_search;	
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('scholarship/scholarship_left_menu',$data1);
		$this->load->view('scholarship/scholarship_list', $data2);	
		$this->load->view('footer.php');
		 
	 }
	 
	 
	 //it return pagination link
	 function pagination($count)
	 {
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'scholarshiplist';
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
	 
	 // it return dropdown value to left panel
	 function search_left_menu()
	 {		
		//it fetch record for job left side search panel
		$university_list=$this->University_model->get_university();
		$country_list=$this->Country_model->get_country();
		$department_list=$this->Department_model->get_department();
		$scholarship_title_list=$this->Scholarship_model->get_scholarship_title();
				
		$data1['scholarship_title_list']=$scholarship_title_list;
		$data1['university_list']=$university_list;
		$data1['country_list']=$country_list;
		$data1['department_list']=$department_list;		
				
		return $data1;
	 }
	 
	 function approve_scholarship($id)
	 {
		$role=$this->session->userdata('role');		
		if($id!=''&& $role=='admin')
		{
			$approve=$this->Scholarship_model->approve($id);	
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