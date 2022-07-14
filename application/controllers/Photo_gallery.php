<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_gallery extends CI_Controller {
	
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
		$this->load->model('Photo_gallery_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		
	 }
	 
	 function index()
	 {
		$data=$this->header();
		$data1=$this->search_left_menu();
		//it fetch record for left side search panel
		$campus_id='1';
		$photo_search=$this->Photo_gallery_model->search_photo($campus_id);
		$data1['campus_id']='';
		$data2['pagination']='';//it is disabled bcz how can i tell the total count no of search, one way is to call  search function twice	
		$data2['photo_list']=$photo_search;	
		$this->load->view('header',$data);
		$this->load->view('Photo_gallery/gallery_left_menu',$data1);
		$this->load->view('Photo_gallery/gallery_list',$data2);	
		$this->load->view('footer.php');
		 
	 }
	 	
	
	
	
	
	  function search_photo()
	 {
		  if(isset($record_limit))
		 {
			 
		 }
		 else
		 {			 
		 	$record_limit=1;
		 }			
		
		
		
		$campus_id=$this->input->post('campus');					
		
		$data=$this->header();
		$data1=$this->search_left_menu();
		//it fetch record for left side search panel
		$data1['campus_id']=$campus_id;
					
			
		//it fetch the job on search 
		$photo_search=$this->Photo_gallery_model->search_photo($campus_id);
		//print_r($photo_search);
		
		//$data2=$this->pagination($search_job_count);	
		$data2['pagination']='';//it is disabled bcz how can i tell the total count no of search, one way is to call  search function twice	
		$data2['photo_list']=$photo_search;	
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('Photo_gallery/gallery_left_menu',$data1);
		$this->load->view('Photo_gallery/gallery_list',$data2);	
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