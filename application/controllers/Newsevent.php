<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsevent extends CI_Controller {
	
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
		$this->load->model('Newsevent_model');
		$this->load->model('Campus_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
	 }
	 
function post_newsevent() 
	{
		$user_id= $this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		
		if($role=='alumni'||$role=='admin')
		{
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
		$this->form_validation->set_rules('campus', 'Campus', 'required');	
		$this->form_validation->set_rules('netitle', 'Tile', 'required|max_length[100]');
		$this->form_validation->set_rules('nelastdate', 'Date');
		$this->form_validation->set_rules('nebdetail', 'Brief Description', 'required|max_length[200]');
		$this->form_validation->set_rules('neldetail', 'Long Detail', 'required|max_length[500]');
				
				
		
		if ($this->form_validation->run() == FALSE) 
		{
			$campus_list=$this->Campus_model->get_campus();
			
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('newsevent/news_events',array('campus_list'=>$campus_list));
				$this->load->view('footer.php');				
			}
			
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('newsevent/news_events',array('campus_list'=>$campus_list));
				$this->load->view('footer');				
			}
		} 
		else
		{
			$date = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('nelastdate'))));
			$data = array(
						'user_id' =>$user_id,
						'title' => $this->input->post('netitle'),
						'campus_id' =>$this->input->post('campus'),
						'event_date' => $date,
						'short_detail' => $this->input->post('nebdetail'),
						'long_detail' => $this->input->post('neldetail'),
						'posted_by' =>  $this->session->userdata('cnic'),
						'modify_date'=>date("Y-m-d")
						
					);
					
		//Transfering data to Model
		$this->Newsevent_model->newsevents_post($data);
		
		//Loading View
		$message['msg'] = '<CENTER> <h3 style="color:green;">Your have successfully submitted the newsevent. It will be visible to others after the admin approval with in 24 hours. To get publish rights on alumni portal kindly email us from your NU Email OR prove your identity by some other authorized alumni user. OR by visiting the Your Campus </h3></CENTER><br>';
		
		if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('newsevent/news_events', $message);
				$this->load->view('footer.php');				
			}
			
			else if($role=='alumni')
			{
				$this->load->view('profile_header');
				$this->load->view('alumni_profile/alumni_left_menu');
				$this->load->view('newsevent/news_events', $message);
				$this->load->view('footer');				
			}
		}
		}
		else{
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
	
	
	function newsevent_detail($id)
	 {
		 
		 if($id!='')
		 {
			 $newsevent_detail=$this->Newsevent_model->newsevent_detail($id);
			 $data=$this->header();
			 $data1=$this->search_left_menu();
			 $data1['campus_id']='';
			 $data1['event_title']='';
			 $data1['event_date']='';
			 
		 	 
			 // to show detail only to admin 
			$role=$this->session->userdata('role');		
			if($role=='admin')
			{
				$this->load->view('profile_header');
				$this->load->view('admin/admin_left_menu');
				$this->load->view('newsevent/newsevent_detail', array('newsevent_detail'=>$newsevent_detail));
				$this->load->view('footer.php');				
			}
			else
			{// it shows to every one
				 $this->load->view('header',$data);
				 $this->load->view('newsevent/newsevent_left_menu',$data1);
				 $this->load->view('newsevent/newsevent_detail', array('newsevent_detail'=>$newsevent_detail));
				 $this->load->view('footer.php');
			}
		 	 
			 
			 
		 }
	 }
	 
	 
	 function get_all_newsevent($record_limit)
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
		 	$record_limit=1;
		 }
		// it will count the job which are not expired to use in pagination
		$newsevent_count=$this->Newsevent_model->newsevent_count();
		$data=$this->header();
		$data1=$this->search_left_menu();
		
		
		
		
		//it fetch record for job left side search panel
		$data1['campus_id']='';
		$data1['event_title']='';
		$data1['event_date']='';
				
		///////////////////////////////////
		
		//it fetch the job which are expired
		$newsevent_list=$this->Newsevent_model->get_all_newsevent($record_limit);	
		//print_r($newsevent_list);
		$data2=$this->pagination($newsevent_count);	
		$data2['newsevent_list']=$newsevent_list;		
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('newsevent/newsevent_left_menu',$data1);
		$this->load->view('newsevent/newsevent_list', $data2);	
		$this->load->view('footer.php'); 
		 
	 }
	 
	 
	 
	 function search_newsevent()
	 {
		 if(isset($record_limit))
		 {
			 
		 }
		 else
		 {
			 
		 	$record_limit=1;
		 }					
		
		
		$campus_id=$this->input->post('campus');
		$event_title=$this->input->post('netitle');
		if(!empty($this->input->post('nelastdate')))
		{
			$event_date= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('nelastdate'))));
		}
		else
		{
			$event_date='';
		}
		
		
		
		$data=$this->header();
		$data1=$this->search_left_menu();
		$data1['campus_id']=$campus_id;
		$data1['event_title']=$event_title;
		$data1['event_date']=$event_date;
		
		if($campus_id=="")
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
		}
		
		
		//it fetch the job on search 
		$newsevent_search=$this->Newsevent_model->search_newsevent($record_limit,$campus_id,$event_title,$event_date);
		$search_newsevent_count=count($newsevent_search);
		
		//$data2=$this->pagination($search_job_count);	
		$data2['pagination']='';//it is disabled bcz how can i tell the total count no of search, one way is to call  search function twice	
		$data2['newsevent_list']=$newsevent_search;	
		/////////////////////////////////
		
		$this->load->view('header',$data);
		$this->load->view('newsevent/newsevent_left_menu',$data1);
		$this->load->view('newsevent/newsevent_list', $data2);	
		$this->load->view('footer.php');
		 
	 }
	 
	 // it return dropdown value to left panel
	 function search_left_menu()
	 {		
		$campus_list=$this->Campus_model->get_campus();
		$data1['campus_list']=$campus_list;			
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
		$config['base_url'] = base_url().'newseventlist';
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
	 
	 function approve_newsevent($id)
	 {
		$role=$this->session->userdata('role');		
		if($id!=''&& $role=='admin')
		{
			$approve=$this->Newsevent_model->approve($id);	
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
<?php
if(isset($approve))
{
	if($approve==1)
	{
	 echo '<div class="alert alert-danger">
			Approved Successfully
		</div>';
	}
	else
	{
		echo '<div class="alert alert-danger">
			Some Error Occurred.
		</div>';
	}
}

	?>
    <div class="col-md-12">
<?php if(isset($new_job))
{if(!empty($new_job)){?>
<h3>Jobs</h3>
<div class="panel panel-default">
<div class="panel-body">
<?php
		echo '<ul>';	
		foreach($new_job as $job_row)
		{
			echo '<div class="col-md-10" ><li>'; 
			echo '<a href="';echo site_url('jobdetail/'.$job_row->job_id).'">'.$job_row->title.'</a>';   
	  		echo '</li></div>';?>
			<?php echo '<div class="col-md-2"><a href="'.site_url('approvejob/'.$job_row->job_id);?><?php echo '">Approve</a></div>';?>		
		<?php }
	  	echo '</ul>';
?>
</div>
</div>
<?php 		
}} 

if(isset($new_scholarship))
{
	if(!empty($new_scholarship))
	{?>
<h3>Scholarships</h3>
<div class="panel panel-default">
<div class="panel-body">
<?php
		echo '<ul>';	
		foreach($new_scholarship as $scholarship_row)
		{
			echo '<div class="col-md-10" ><li>'; 
			echo '<a href="';echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id).'">'.$scholarship_row->title.'</a>';   
	  		echo '</li></div>';?>
			<?php echo '<div class="col-md-2"><a href="'.site_url('approvescholarship/'.$scholarship_row->scholarship_id);?><?php echo '">Approve</a></div>';?>		
		<?php }
	  	echo '</ul>';
?>
</div>
</div>
		
<?php 	}}?>

<?php 		

if(isset($new_newsevent))
{
	if(!empty($new_newsevent))
	{?>
<h3>NewsEvents</h3>
<div class="panel panel-default">
<div class="panel-body">
<?php
		echo '<ul>';	
		foreach($new_newsevent as $newsevent_row)
		{
			echo '<div class="col-md-10" ><li>'; 
			echo '<a href="';echo site_url('newseventdetail/'.$newsevent_row->newsevent_id).'">'.$newsevent_row->title.'</a>';   
	  		echo '</li></div>';?>
			<?php echo '<div class="col-md-2"><a href="'.site_url('approvenewsevent/'.$newsevent_row->newsevent_id);?><?php echo '">Approve</a></div>';?>		
		<?php }
	  	echo '</ul>';
?>
</div>
</div>
		
<?php 	}}?>


<?php 		

if(isset($new_story))
{
	if(!empty($new_story))
	{?>
<h3>Stories</h3>
<div class="panel panel-default">
<div class="panel-body">
<?php
		echo '<ul>';	
		foreach($new_story as $story_row)
		{
			echo '<div class="col-md-10" ><li>'; 
			echo '<a href="';echo site_url('storydetail/'.$story_row->story_id).'">'.$story_row->name.'</a>';   
	  		echo '</li></div>';?>
			<?php echo '<div class="col-md-2"><a href="'.site_url('approvestory/'.$story_row->story_id);?><?php echo '">Approve</a></div>';?>		
		<?php }
	  	echo '</ul>';
?>
</div>
</div>
		
<?php 	}}?>

<?php 		

if(isset($new_company))
{
	if(!empty($new_company))
	{?>
<h3> Companies</h3>
<div class="panel panel-default">
<div class="panel-body">
<?php
		echo '<ul>';	
		foreach($new_company as $company_row)
		{
			echo '<div class="col-md-10" ><li>'; 
			echo '<a href="';echo site_url('companydetail/'.$company_row->comp_reg_id).'">'.$company_row->name.'</a>';   
	  		echo '</li></div>';?>
			<?php echo '<div class="col-md-2"><a href="'.site_url('approvecompany/'.$company_row->comp_reg_id);?><?php echo '">Approve</a></div>';?>		
		<?php }
	  	echo '</ul>';
?>
</div>
</div>
		
<?php 	}}?>

<div class="bosluk"></div> 
<script type="text/javascript">
<!--
 
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
 
});
//-->
</script>

</div>