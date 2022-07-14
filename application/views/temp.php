
<div class="col-md-3">
<div class="list-group">
    <a href="" class="list-group-item active" style="text-align:center">Social</a>  
    <a href="<?php echo site_url('group') ?>" class="list-group-item">Groups</a>
    <a href="<?php echo site_url('donation') ?>" class="list-group-item ">Donations</a>
    <a href="<?php echo site_url('suggestion') ?>" class="list-group-item ">Suggestions</a>  
    <a href="<?php echo site_url('viewslist') ?>" class="list-group-item ">Reviews/Views</a>    
    <a href="<?php echo site_url('gallery') ?>" class="list-group-item ">Photo Gallery</a>
        
</div>
</div>



raja shuja
<video width="400" controls>
  <source src="https://www.youtube.com/embed/JNwbMxOJXbY" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>
<iframe width="200" height="200" src="https://www.youtube.com/embed/JNwbMxOJXbY" frameborder="0" allowfullscreen></iframe>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1590317397950672";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-video" data-href="https://www.facebook.com/FASTALumniIsb/videos/432107066959632/" data-width="500" data-show-text="false"><blockquote cite="https://www.facebook.com/FASTALumniIsb/videos/432107066959632/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FASTALumniIsb/videos/432107066959632/"></a><p>One of the most honourable professors of FSM Raja Shuja Ul Haq has a message to convey for the alumni. Please be a part of this initiative and help someone build a better future.</p>Posted by <a href="https://www.facebook.com/FASTALumniIsb/">FAST Alumni Association Islamabad - FAAI</a> on Thursday, September 1, 2016</blockquote></div>
video_messagesvideo_messages



//////////////////////////////////////////////////////////////
	//it is for pagination if alumni are selected base on campus
	function alumni_search()
	{
		
		// it will count the alumni based on campus
		$name=$this->input->post('name');
		$campus_id=$this->input->post('campus');
		$department_id=$this->input->post('department');
		
		// it will count alumni search base on campus, department, name
		$name1=$name;
		$campus_id1=$campus_id;
		$department_id1=$department_id;
		if($name1=='')
		{
			$name1='yyyyy';
		}
		if($campus_id1=='')
		{
			$campus_id1=77777;
		}
		if($department_id1=='')
		{
			$department_id1=88888;
		}
		
		$alumni_count=$this->Alumni_model->alumni_count($name,$campus_id,$department_id);
		$data=$this->header();
		
		//it is the route path which pagination will use
		$route='searchnext/'.$name1.'/'.$campus_id1.'/'.$department_id1;
		$data2=$this->pagination($alumni_count,$route);
		
		// it menu for left search panel
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data2['campus_list']=$campus_list;
		$data2['department_list']=$department_list;	
		
		//it fetch record for left side search panel
		if($name=='yyyyy')
		{
			$name='';
		}
		if($campus_id==77777)
		{
			$campus_id='';
		}
		if($department_id==88888)
		{
			$department_id='';
		}
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
	 
	 
	 //////////////////////////////////////////////////////////////
	//it is for pagination if alumni are selected base on campus
	function alumni_search_pagination($name=0,$campus_id=0,$department_id=0,$record_limit=0)
	{
		
		
		// it will count alumni search base on campus, department, name
		$alumni_count=$this->Alumni_model->alumni_count($name,$campus_id,$department_id);
		$data=$this->header();
		
		//it is the route path which pagination will use
		$route='searchnext/'.$name.'/'.$campus_id.'/'.$department_id;
		$data2=$this->pagination($alumni_count,$route);
		
		// it menu for left search panel
		$campus_list=$this->Campus_model->get_campus();
		$department_list=$this->Department_model->get_department();	
		$data2['campus_list']=$campus_list;
		$data2['department_list']=$department_list;	
		
		//it fetch record for left side search panel
		if($name=='yyyyy')
		{
			$name='';
		}
		if($campus_id==77777)
		{
			$campus_id='';
		}
		if($department_id==88888)
		{
			$department_id='';
		}
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
	