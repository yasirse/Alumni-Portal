<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {
	
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
		$this->load->model('Photo_gallery_model');
		$this->load->model('Donation_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		
	 }
	 
	 function video_messages()
	{
		$data=$this->header();		
		$this->load->view('header',$data);
		$this->load->view('others/others_left_menu');
		$this->load->view('others/video_messages');
		$this->load->view('footer.php');
		
	}
	
	function rector_message()
	{
		$data=$this->header();		
		$this->load->view('header',$data);
		$this->load->view('others/others_left_menu');
		$this->load->view('others/rector_message');
		$this->load->view('footer.php');
		
	}
	 
	function contact()
	{
		$data=$this->header();		
		$this->load->view('header',$data);
		$this->load->view('others/others_left_menu');
		$this->load->view('others/contacts');
		$this->load->view('footer.php');
		
	}
	 
	 function privacy()
	{
		$data=$this->header();		
		$this->load->view('header',$data);
		$this->load->view('others/others_left_menu');
		$this->load->view('others/privacy');
		$this->load->view('footer.php');
		
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