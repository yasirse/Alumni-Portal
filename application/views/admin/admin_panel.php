
<div class="col-md-9 " id="main_content">
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
<?php if(empty($new_company)&&empty($new_story)&&empty($new_newsevent)&&empty($new_scholarship)&&empty($new_job))
{?>
<div class="panel panel-default">
<div class="panel-body"> 
      <CENTER> <h3 class="panel-title">No record found</h3></CENTER></div>
</div>
<?php }?>

</div>
	
  <!--  end of content-->
</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>
<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->


