<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Controller {
	
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
		$this->load->model('Story_model');
		$this->load->model('Suggestion_model');
		$this->load->model('Photo_gallery_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		
	 }
	 
	 function index()
	 {
		$data=$this->header();		
		$this->load->view('header',$data);
		$this->load->view('donation/donation_left_menu');
		$this->load->view('suggestion/suggestion_form');	
		$this->load->view('footer.php');
		 
	 }
	 
	 function post_suggestion()
	{		
		$role=$this->session->userdata('role');	
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div><br />');
		
			
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');		
		$this->form_validation->set_rules('cellno', 'Cell No', 'max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('sldetail', 'Brief Detail', 'required|max_length[500]');
		
				
		
		if ($this->form_validation->run() == FALSE)
		{
			$data1['name']=$this->input->post('name');
			$data1['cellno']=$this->input->post('cellno');
			$data1['email']=$this->input->post('email');
			$data1['sldetail']=$this->input->post('sldetail');
			
			
			if($role=='admin')
			{
				$data=$this->new_post();
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('suggestion/suggestion_form',$data1);
				$this->load->view('footer.php');
				
			} 
			else if($role=='alumni')
			{
				$this->load->view('profile_header');	
				$this->load->view('suggestion/suggestion_form',$data1);
				$this->load->view('footer.php');
			}
			else
			{
				$data=$this->header();		
				$this->load->view('header',$data);
				$this->load->view('donation/donation_left_menu');
				$this->load->view('suggestion/suggestion_form',$data1);
				$this->load->view('footer.php');
			}
			
		} 
		else
		{
			
			$data = array(
						
						'name' => $this->input->post('name'),						
						'cellno' => $this->input->post('cellno'),
						'email' => $this->input->post('email'),
						'detail' => $this->input->post('sldetail'),
						'modify_date'=>date("Y-m-d")
					);
					
		//Transfering data to Model
		$this->Suggestion_model->suggestion_post($data);
		
		//Loading View
		$message['success_msg'] = '<CENTER> <h3 style="color:green;">Thank you for your suggestion. </h3></CENTER><br>';
		
		if($role=='admin')
			{
				$data=$this->new_post();
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('suggestion/suggestion_form');
				$this->load->view('footer.php');
				
			} 
			else if($role=='alumni')
			{
				$this->load->view('profile_header');	
				$this->load->view('suggestion/suggestion_form');
				$this->load->view('footer.php');
			}
			else
			{
				$data=$this->header();		
				$this->load->view('header',$data);				
				$this->load->view('donation/donation_left_menu');
				$this->load->view('suggestion/suggestion_form',$message);
				$this->load->view('footer.php');
			}
		}

		

		
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
		$config['base_url'] = base_url().'viewslist';
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
	 
	
	 
	 
	
	 	
}
?>