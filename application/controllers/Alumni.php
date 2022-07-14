<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {
	
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
		$this->load->model('Alumni_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		
	 }			
		
	
	 	function alumni_reg_card() 
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
			$this->load->helper('url'); 
			$this->load->library('form_validation');		
			$config['upload_path']   = './uploads/alumni_card/'; 
			$config['allowed_types'] = 'gif|jpg|png';  
			$config['max_size']      = 500; 
			$config['max_width']     = 600;
			$config['max_height']    = 600; 
			$config['file_name'] = strtolower(date("ymdhis").$this->session->userdata('user_id'));
			$this->load->library('upload', $config);
		
		
		
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');			
			$this->form_validation->set_rules('hy', 'hy', 'required|is_unique[alumni_card.user_id]',
			array(
					
					'is_unique' => 'You have already uploaded the picture.'
					));
					  
	  if (empty($_FILES['sfile']['name']))
		{
			$this->form_validation->set_rules('sfile', 'Photo', 'required');
		}		
						
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/alumni_card_reg');
			$this->load->view('footer');
		} 
		else
		{
			
			if ( ! $this->upload->do_upload('sfile'))
				{
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('alumni_profile/alumni_card_reg',array('error' => $this->upload->display_errors('<div class="error">', '</div>')));      	$this->load->view('footer');
				      			
				}
				else
				{
					$upload_msg =$this->upload->data() ;
					$old_file_name=$upload_msg['file_name'];
					$file_name=strtolower($old_file_name);
					rename('./uploads/alumni_card/'.$old_file_name,'./uploads/alumni_card/'.$file_name);
					$data = array(
						'user_id'=>$user_id,						
						'photo_path' =>  $file_name,						
						'modify_date'=>date("Y-m-d")
						);
						
					//Transfering data to Model
					$this->Alumni_model->insert($data);
		
					//Loading View
					$success= '<CENTER> <h3 style="color:green;">You have successfully applied for alumni card</h3></CENTER>';
					//$upload_msg='hello buddy';
					
					$data=array('upload_msg' => $upload_msg, 'success_msg'=>$success  );
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('alumni_profile/alumni_card_reg',$data);
					$this->load->view('footer');
			       
			
			
				}
	
		}
		}//end of if (role==alumni)
		
		
	}
	
	/////////////// it upload alumni profile photo////////////////////////////////////////////////////////////////////
	function 	alumni_profile_photo()
	{
		
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		
		$config['upload_path']   = './uploads/alumni/'; 
		$config['allowed_types'] = 'gif|jpg|png';  
		$config['max_size']      = 100; 
		$config['max_width']     = 300;
		$config['max_height']    = 300; 
		$config['file_name'] = strtolower(date("ymdhis").$this->session->userdata('user_id'));
		$this->load->library('upload', $config);
		
		
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('hy', 'hy', 'required');
					  
	  if (empty($_FILES['sfile']['name']))
		{
			$this->form_validation->set_rules('sfile', 'Photo', 'required');
		}		
						
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/alumni_profile_photo');
			$this->load->view('footer');
		} 
		else
		{
			
			if ( ! $this->upload->do_upload('sfile'))
				{
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/alumni_profile_photo',array('error' => $this->upload->display_errors('<div class="error">', '</div>')));      $this->load->view('footer');
				      			
				}
				else
				{
					$upload_msg =$this->upload->data() ;
					$old_file_name=$upload_msg['file_name'];
					$file_name=strtolower($old_file_name);
					rename('./uploads/alumni/'.$old_file_name,'./uploads/alumni/'.$file_name);
					$data = array(
						'photo' =>  $file_name
						);
						
					//Transfering data to Model
					$this->Alumni_model->alumni_profile_photo($user_id,$data);
								
					$data1=$this->profile_view_data($user_id);
					$data1['message'] = 'Profile Picture Updated Successfully';
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('alumni_profile/private_profile_view',$data1);
					$this->load->view('footer');
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
	
	
	function edit_basic_profile() 
	{
		
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{	
			$this->load->helper('url');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
				
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]');
				
			$this->form_validation->set_rules('rollno', 'Roll No', 'required|regex_match[/[0-9]{2}-[0-9]{1,6}$/]',
			array(
					'required' => 'Please enter the Roll No<br>', 
					'regex_match' => 'Roll No. should in this format <b>Batch#-Roll#</b> (e.g 07-0456)<br>'
					
					));		
					
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
			array(
					'required' => 'Please enter the Email address<br>', 
					'valid_email' => 'Please enter the valid Email address<br>'
					
					));
					
			$this->form_validation->set_rules('cnic', 'CNIC', 'required|regex_match[/^\d{5}-\d{7}-\d{1}$/]',
			array(
					'required' => 'Please enter the CNIC<br>', 
					'regex_match' => 'CNIC format should be like this xxxxx-xxxxxxx-x e.g 32202-2116505-9<br>'
					
					));
					
			//$this->form_validation->set_rules('campus', 'Campus', 'required','Select Campus <br>');
			$this->form_validation->set_rules('department', 'Department', 'required','Select Campus <br>');
			$this->form_validation->set_rules('dob', 'DOB', 'required','Select DOB <br>');
				
				
		
			if ($this->form_validation->run() == FALSE)
			{
				// it fetch the record to edit for profile
				$alumni_name='';													 
				$rollno = '';
				$email= '';
				$cnic= '';
				$department_id= '';
				$campus_id= '';
				$dob= '';
				
				$query = $this->db->query("select * from user where user_id='$user_id'"); 
				 if ($query->num_rows() > 0)
				 {
					
					$row = $query->row();
					$user_id= $row->user_id;
					$alumni_name= $row->name;
														 
					$rollno = $row->rollno;
					$email= $row->email;
					$cnic= $row->cnic;
					$department_id= $row->department_id;
					$campus_id= $row->campus_id;					
					$dob= $row->dob	;					
					$dob1 = date("d/m/Y", strtotime($dob));		
				}
				
				
					$department_list=$this->Department_model->get_department();
					$campus_list=$this->Campus_model->get_campus();
					$data1['user_id']=$user_id;
					$data1['name']=$alumni_name;
					$data1['rollno']=$rollno;
					$data1['email']=$email;
					$data1['cnic']=$cnic;
					$data1['department_id']=$department_id;
					$data1['campus_id']=$campus_id;
					$data1['dob']=$dob1;
					$data1['department_list']=$department_list;
					$data1['campus_list']=$campus_list;	
					
					
					
					$this->load->view('profile_header');
					$this->load->view('alumni_profile/alumni_left_menu');
					$this->load->view('alumni_profile/edit_basic_profile',$data1);
					$this->load->view('footer');
			} 
			else
			{ 
				$date = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('ddob'))));
				$cnic=$this->input->post('cnic');
				$data = array(						
							'name' => $this->input->post('name'),
							'rollno' => $this->input->post('rollno'),
							'email' => $this->input->post('email'),
							'cnic' => $this->input->post('cnic'),
							'department_id' => $this->input->post('department'),
							'campus_id' => $this->input->post('campus'),						
							'dob' => $date,
							'role' =>'alumni'
						);
						
				//Transfering data to Model
				$this->Alumni_model->update_profile($data,$user_id);
				
				$data1=$this->profile_view_data($user_id);
				$data1['message'] = 'Profile updated Successfully';
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/private_profile_view',$data1);
				$this->load->view('footer');
				
			}
		}////end of if (role==alumni)
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
	//////////////////////////////view profile//////////////////////////////
	function view_profile()
	{
		$user_id= $this->session->userdata('user_id');		
		$data1=$this->profile_view_data($user_id);
		$this->load->view('profile_header');
		$this->load->view('alumni_profile/alumni_left_menu');
		$this->load->view('alumni_profile/private_profile_view',$data1);
		$this->load->view('footer');		
		
	}
		//////////////////////////////open profile view //////////////////////////////
	
	function public_profile_view($user_id)  
	 {
		 
		 if($user_id!='')
		 {
			$data2=$this->profile_view_data($user_id);
			$data=$this->header();
			$campus_list=$this->Campus_model->get_campus();
			$department_list=$this->Department_model->get_department();	
			$data2['campus_list']=$campus_list;
			$data2['department_list']=$department_list;
			
			//it fetch record for left side search panel
			$data2['name']='';
			$data2['campus_id']='';
			$data2['department_id']='';				
			///////////////////////////////////
			// to show detail only to admin 
			$role=$this->session->userdata('role');	
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('alumni_profile/public_profile_view',$data2);
				$this->load->view('footer.php');				
			}
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/public_profile_view',$data2);
				$this->load->view('footer');				
			}
			else
			{// it shows to every one
				$this->load->view('header',$data);
				$this->load->view('alumni_profile/search_left_menu',$data2);
				$this->load->view('alumni_profile/public_profile_view',$data2);
				$this->load->view('footer.php');
			}	 
			
						 
			 
		 }
	 }
	//////////////////////////////Edit Profile Address//////////////////////////////
	function update_profile_address() 
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{	
			$this->load->helper('url');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
			$h=1;
			$count=$this->input->post('count');
			for($a=$count;$a>0;$a--)
			{
				$address='address'.$h;
				$name='name'.$h;
				
				$this->form_validation->set_rules($name, 'name'.$h, 'max_length[50]');
				$this->form_validation->set_rules($address, 'Address'.$h, 'max_length[300]');
				$h++;
			}		
				
				
		
			if ($this->form_validation->run() == FALSE)
			{ 
				// it fetch the record to edit for profile
				$linkedin='';													 
				$facebook = '';
				$twitter= '';
				$other= '';			
				
				$list=$this->Alumni_model->get_profile_address($user_id);
				//print_r($list);				
				$data1['list']=$list;				
					
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/update_profile_address',$data1);
				$this->load->view('footer');
			} 
			else
			{
				$h=1;
				$name='name'.$h;
				$id='id'.$h;
				$address='address'.$h;
				for($a=$count;$a>0;$a--)
				{
					$id=$this->input->post($id);
					$name=$this->input->post($name);
					$address=$this->input->post($address);
					$data = array(						
							'user_id' => $user_id,
							'web_name' => $name,
							'address' => $address							
						);
					$this->Alumni_model->update_profile_address($data,$id);
					$h++;
					$name='name'.$h;
					$id='id'.$h;
					$address='address'.$h;
				}
								
						
				
				$data1=$this->profile_view_data($user_id);
				$data1['message'] = 'Updated Successfully';
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/private_profile_view',$data1);
				$this->load->view('footer');
				
				
				
				
			}
		}////end of if (role==alumni)
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
	
	function add_profile_address()
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{	
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
			
			$this->form_validation->set_rules('name', 'Name' ,'required|max_length[50]');
			$this->form_validation->set_rules('address', 'Address', 'required|max_length[300]');
			
				
		
			if ($this->form_validation->run() == FALSE)
			{ 
				// it fetch the record to edit for profile
				$data1['name']=$this->input->post('name');
				$data1['address']=$this->input->post('address');		
				
				
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/add_profile_address',$data1);
				$this->load->view('footer');
			} 
			else
			{
				
				$data = array(						
						'user_id' => $user_id,
						'web_name' => $this->input->post('name'),
						'address' => $this->input->post('address')						
					);
				$this->Alumni_model->add_profile_address($data);
					
								
						
				
		
				$data1=$this->profile_view_data($user_id);
				$data1['message'] = 'Profile address added Successfully';
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/private_profile_view',$data1);
				$this->load->view('footer');
				
				
				
				
			}
		}////end of if (role==alumni)
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
	
	function remove_profile_address($id)
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
			$this->Alumni_model->remove_profile_address($id,$user_id);		
			
			$data1=$this->profile_view_data($user_id);
			$data1['message'] = 'Profile address removed Successfully';
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/private_profile_view',$data1);
			$this->load->view('footer');
		}
		
	}
	//it fetch data to show it on profile 
	function profile_view_data($user_id)
	{
		$list=$this->Alumni_model->get_profile_address($user_id);
		$basic_list=$this->Alumni_model->get_basic_profile($user_id);
		
		$data1['list']=$list;
		$data1['basic_list']=$basic_list;
		return $data1;
	}
	//////////////////////////////////////////////////////////////
	//it is for pagination if alumni are selected base on campus
	function alumni_search()
	{
		
		// it will count the alumni based on campus
		$name=$this->input->post('name');
		$campus_id=$this->input->post('campus');
		$department_id=$this->input->post('department');
		
		
		//removing old session data 
        $this->session->unset_userdata('namealumnisearch'); 
		$this->session->unset_userdata('campusalumnisearch'); 
    	$this->session->unset_userdata('departmentalumnisearch');
		
		
		//adding data to session
		$this->session->set_userdata(array(
					 		'namealumnisearch'       => $name,
                            'campusalumnisearch'       => $campus_id,
                            'departmentalumnisearch'      => $department_id,
							
							));
		
		// it will count alumni search base on campus, department, name
		
		
		$alumni_count=$this->Alumni_model->alumni_count($name,$campus_id,$department_id);
		$data=$this->header();
		
		//it is the route path which pagination will use
		$route='searchnext';
		$data2=$this->pagination($alumni_count,$route);
		
		// it menu for left search panel
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data2['campus_list']=$campus_list;
		$data2['department_list']=$department_list;	
		
		//it fetch record for left side search panel
		
		$data2['name']=$name;
		$data2['campus_id']=$campus_id;
		$data2['department_id']=$department_id;		
				
		///////////////////////////////////
		
		//it fetch the record 
		$record_limit=0;
		$alumni_list=$this->Alumni_model->search_alumni($record_limit,$name,$campus_id,$department_id);	
		//print_r($newsevent_list);
			
		$data2['alumni_list']=$alumni_list;		
		/////////////////////////////////
		
		$role=$this->session->userdata('role');	
		
		if($role=='admin')
		{
			$this->load->view('profile_header');
			$this->load->view('admin/admin_left_menu');
			$this->load->view('alumni_profile/public_profile_view',$data2);
			$this->load->view('footer.php');				
		}
		else if($role=='alumni')
		{
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/private_search_alumni',$data2);
			$this->load->view('footer');				
		}
		else
		{// it shows to every one
			$this->load->view('header',$data);
			$this->load->view('alumni_profile/search_left_menu',$data2);
			$this->load->view('alumni_profile/search_alumni',$data2);
			$this->load->view('footer.php');
		} 
		
		
		 
	 }
	 
	 
	 //////////////////////////////////////////////////////////////
	//it is for pagination if alumni are selected base on campus
	function alumni_search_pagination($record_limit=0)
	{
		
		$name=$this->session->userdata('namealumnisearch');
		$campus_id=$this->session->userdata('campusalumnisearch');
		$department_id=$this->session->userdata('departmentalumnisearch');		
			
		// it will count alumni search base on campus, department, name
		$alumni_count=$this->Alumni_model->alumni_count($name,$campus_id,$department_id);
		$data=$this->header();
		
		//it is the route path which pagination will use
		$route='searchnext';
		$data2=$this->pagination($alumni_count,$route);
		
		// it menu for left search panel
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data2['campus_list']=$campus_list;
		$data2['department_list']=$department_list;	
		
		//it fetch record for left side search panel
		
		$data2['name']=$name;
		$data2['campus_id']=$campus_id;
		$data2['department_id']=$department_id;				
		///////////////////////////////////
		
		//it fetch the record 
		
		$alumni_list=$this->Alumni_model->search_alumni($record_limit,$name,$campus_id,$department_id);	
		//print_r($newsevent_list);
			
		$data2['alumni_list']=$alumni_list;		
		/////////////////////////////////
		
		$role=$this->session->userdata('role');	
		
		if($role=='admin')
		{
			$this->load->view('profile_header');
			$this->load->view('admin/admin_left_menu');
			$this->load->view('alumni_profile/public_profile_view',$data2);
			$this->load->view('footer.php');				
		}
		else if($role=='alumni')
		{
			$this->load->view('profile_header');
			$this->load->view('alumni_profile/alumni_left_menu');
			$this->load->view('alumni_profile/private_search_alumni',$data2);
			$this->load->view('footer');				
		}
		else
		{// it shows to every one
			$this->load->view('header',$data);
			$this->load->view('alumni_profile/search_left_menu',$data2);
			$this->load->view('alumni_profile/search_alumni',$data2);
			$this->load->view('footer.php');
		} 
		
		
		 
	 }
	 
		//it get all alumni based on campus  
	 function get_all_alumni_campus($campus_id=0,$page_limit=0)
	{
	 
		 		 
		// it will count the job which are not expired to use in pagination
		$alumni_count=$this->Alumni_model->alumni_count_campus($campus_id);
		$data=$this->header();
		
		//it is the route path which pagination will use
		$route='alumnilist/'.$campus_id;
		$data2=$this->pagination($alumni_count,$route);
		
		// it menu for left search panel
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data2['campus_list']=$campus_list;
		$data2['department_list']=$department_list;	
		
		//it fetch record for left side search panel
		$data2['name']='';
		$data2['campus_id']='';
		$data2['department_id']='';				
		///////////////////////////////////
		
		//it fetch the record 
		$alumni_list=$this->Alumni_model->get_all_alumni_campus($campus_id,$page_limit);	
		//print_r($newsevent_list);
			
		$data2['alumni_list']=$alumni_list;		
		/////////////////////////////////
		
		
		
		$role=$this->session->userdata('role');	
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('alumni_profile/public_profile_view',$data2);
				$this->load->view('footer.php');				
			}
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('alumni_profile/public_profile_view',$data2);
				$this->load->view('footer');				
			}
			else
			{// it shows to every one
				$this->load->view('header',$data);
				$this->load->view('alumni_profile/search_left_menu',$data2);
				$this->load->view('alumni_profile/search_alumni',$data2);
				$this->load->view('footer.php');
			}
		
		
		 
	 }
	
	 //it fetch record for alumni left side search panel
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
	 function pagination($count,$route)
	 {
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().$route;
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