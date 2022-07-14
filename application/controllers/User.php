<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 **/
	 function __construct()
	 {
		parent::__construct();
 		$this->load->database();
		
		$this->load->model('Views_model');
		$this->load->model('user_model');
		$this->load->model('Department_model');
		$this->load->model('Campus_model');
		$this->load->model('Newsevent_model');
		$this->load->model('Scholarship_model');
		$this->load->model('Story_model');
		$this->load->model('Company_reg_model');
		$this->load->model('Job_model');
		$this->load->library('session');
	 }
	 
	public function index()
	{
		$this->load->helper('form');
		$this->load->helper('url');		
		
		$user_role= $this->session->userdata('role');
		if($user_role=='admin')
		{
			$data=$this->new_post();
			$this->load->view('profile_header');
			$this->load->view('admin/admin_left_menu');			
			$this->load->view('admin/admin_panel',$data);
			$this->load->view('footer.php');
		} 
		else if($user_role=='alumni')
		{
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/alumni_main');
			$this->load->view('footer.php');
		}
		else
		{
			// This code shows jobs, scholarships, events/news, stories and companies to header menu.
			
			$data=$this->header();
			$this->load->view('header',$data);
			$this->load->view('home');
			$this->load->view('footer');
			
			
		}
		
		
	}

	
	function random_password( $length = 8 )
		{
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
			$password = substr( str_shuffle( $chars ), 0, $length );
			return $password;
		}
	
	function alumni_register() 
	{
		
			
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
			
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]');
			
		$this->form_validation->set_rules('rollno', 'Roll No', 'required|regex_match[/[0-9]{2}-[0-9]{1,6}$/]|is_unique[user.rollno]',
		array(
				'required' => 'Please enter the Roll No<br>', 
				'regex_match' => 'Roll No. should in this format <b>Batch#-Roll#</b> (e.g 07-0456)<br>',
				'is_unique' => 'This Roll No is already registered.'
				));		
				
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]',
		array(
				'required' => 'Please enter the Email address<br>', 
				'valid_email' => 'Please enter the valid Email address<br>',
				'is_unique' => 'This email is already registered.<br>'
				));
				
		$this->form_validation->set_rules('cnic', 'CNIC', 'required|regex_match[/^\d{5}-\d{7}-\d{1}$/]|is_unique[user.cnic]',
		array(
				'required' => 'Please enter the CNIC<br>', 
				'regex_match' => 'CNIC format should be like this xxxxx-xxxxxxx-x e.g 32202-2116505-9<br>',
				'is_unique' => 'This CNIC is already registered.<br>'
				));
				
		$this->form_validation->set_rules('campus', 'Campus', 'required','Select Campus <br>');
		$this->form_validation->set_rules('department', 'Department', 'required','Select Campus <br>');
		$this->form_validation->set_rules('dob', 'DOB', 'required','Select DOB <br>');
				
				
		
		if ($this->form_validation->run() == FALSE)
		{
			$department_list=$this->Department_model->get_department();
			$campus_list=$this->Campus_model->get_campus();
			$data['postback'][] = array(						
						'name' => $this->input->post('name'),
						'rollno' => $this->input->post('rollno'),
						'email' => $this->input->post('email'),
						'cnic' => $this->input->post('cnic'),
						'password' =>$password = $this->random_password(8),
						'department_id' => $this->input->post('department'),
						'campus_id' => $this->input->post('campus'),						
						'dob' => $this->input->post('ddob'),
						'department_list'=>$department_list,
						'campus_list'=>$campus_list
						
					);
			$this->load->view('alumni_register',$data);
		} 
		else
		{
			$date = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('ddob'))));
			$cnic=$this->input->post('cnic');
			$data = array(						
						'name' => $this->input->post('name'),
						'rollno' => $this->input->post('rollno'),
						'email' => $this->input->post('email'),
						'cnic' => $cnic,
						'password' =>$password = $this->random_password(8),
						'department_id' => $this->input->post('department'),
						'campus_id' => $this->input->post('campus'),						
						'dob' => $date,
						'role' =>'alumni',
						'status' =>'0'
					);
					
			//Transfering data to Model
			$this->user_model->alumni_register($data);
			$data['message'] = 'Data Inserted Successfully';
			$query = $this->db->query("select user_id, name, cnic, password ,role,status from user where cnic='$cnic'"); 
			
			 if ($query->num_rows() > 0)
			 {
				
				 $row = $query->row();
				 $user_id= $row->user_id;
				 $alumni_name= $row->name;
				 $cnic_get= $row->cnic;
				 $pass_get= $row->password;
				 $role_get= $row->role;
				 $status_get= $row->status;
				 
					//loading session library 					 
        			//adding data to session
					 
					 $this->session->set_userdata(array(
					 		'user_id'       => $user_id,
                            'cnic'       => $cnic_get,
                            'user_name'      => $alumni_name,
							'role'      => $role_get,
							'status'      =>$status_get
							));
				
					
					if($role_get=='admin')
					{
						$data=$this->new_post();
						$this->load->view('profile_header');
						$this->load->view('admin/admin_left_menu');
						$this->load->view('admin/admin_panel',$data);
						$this->load->view('footer.php');
						
					} 
					if($role_get=='alumni')
					{
						
						$this->load->view('profile_header');
						$this->load->view('alumni_profile/alumni_left_menu');
						$this->load->view('alumni_profile/alumni_main');
						$this->load->view('footer');
					}
				 
			}
			
		}

	}
	
		
	
	function alumni_login() 
	{
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		if($role=='admin')
		{
			$data=$this->new_post();
			$this->load->view('profile_header');
			$this->load->view('admin/admin_left_menu');
			$this->load->view('admin/admin_panel',$data);
			$this->load->view('footer.php');
			
		} 
		else if($role=='alumni')
		{
			
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/alumni_main');
			$this->load->view('footer');
		}
		else{			
				
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
				$this->form_validation->set_rules('dcnic', 'CNIC', 'required|regex_match[/^\d{5}-\d{7}-\d{1}$/]',
				array(
						'required' => 'Please enter the CNIC<br>', 
						'regex_match' => 'CNIC format should be like this xxxxx-xxxxxxx-x e.g 32202-2116505-9<br>'
										));
						
				$this->form_validation->set_rules('dpass', 'Password', 'required');
		
				if ($this->form_validation->run() == FALSE) 
				{
					$job_list=$this->Job_model->get_job1();
					$scholarship_list=$this->Scholarship_model->get_scholarship1();
					$newsevent_list=$this->Newsevent_model->get_newsevent1();
					$story_list=$this->Story_model->get_story1();
					$company_list=$this->Company_reg_model->get_company1();
					$data['header'][]=array('job'=>$job_list,'scholarship'=>$scholarship_list,'newsevent'=>$newsevent_list,'story'=>$story_list,'company'=>$company_list);
					$this->load->view('header',$data);
					
					$this->load->view('login');
				}
				else
				{ 
					$cnic_send = $this->input->post('dcnic');
					$password_send = $this->input->post('dpass');
					
					$query = $this->db->query("select user_id, name, cnic, password ,role,status from user where cnic='$cnic_send'"); 
					
					 if ($query->num_rows() > 0)
					 {
						
						 $row = $query->row();
						 $user_id= $row->user_id;
						 $alumni_name= $row->name;
						 $cnic_get= $row->cnic;
						 $pass_get= $row->password;
						 $role_get= $row->role;
						 $status_get= $row->status;
						 
						 if($cnic_get==$cnic_send && $pass_get==$password_send)
						 {
							 //loading session library 					 
							 //adding data to session
							 
							 $this->session->set_userdata(array(
									'user_id'       => $user_id,
									'cnic'       => $cnic_get,
									'user_name'      => $alumni_name,
									'role'      => $role_get,
									'status'      =>$status_get
									));
						
							
							if($role_get=='admin')
							{
								$data=$this->new_post();
								$this->load->view('profile_header');
								$this->load->view('admin/admin_left_menu');
								$this->load->view('admin/admin_panel',$data);
								$this->load->view('footer.php');
								
							} 
							if($role_get=='alumni')
							{
								
								$this->load->view('profile_header');
								$this->load->view('alumni_profile/alumni_left_menu');
								$this->load->view('alumni_profile/alumni_main');
								$this->load->view('footer');
							}
						 }
						 else
						 {
							 $this->load->view('login', array('error' => 'Your Credential Does Not Match' ));
						 }
					}// end of if ($query->num_rows() > 0)
					else
					{
					 $this->load->view('login', array('error' => 'Your Credential Does Not Match' ));
					}
				}//end of else after the validation if

		}//else after the elseif( role==alumni)
	}
	
	  public function unset_sesssion_data()
	  { 
        //loading session library
        $this->load->library('session');
				
        //removing session data 
        $this->session->unset_userdata('user_name'); 
		$this->session->unset_userdata('role'); 
    	$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('cnic');
		$this->session->unset_userdata('status');
        $this->index();
		 
      }
	  
	   
	
		
		function forget_password() 
	{
		$this->load->helper('form');
		$this->load->helper('url'); 		
		$this->load->view('forget_password');
		
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
	 
	 function new_post()
	 {
		$data['new_job']=$this->Job_model->new_job();
		$data['new_scholarship']=$this->Scholarship_model->new_scholarship();
		$data['new_newsevent']=$this->Newsevent_model->new_newsevent();
		$data['new_story']=$this->Story_model->new_story();
		$data['new_company']=$this->Company_reg_model->new_company();
		return $data;
		 
	 }
		
	
}