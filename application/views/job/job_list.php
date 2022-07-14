<div class="col-md-9">
<?php if(isset($job_list)){if(!empty($job_list)){  foreach($job_list as $job_row){?>
<div class="col-md-12 listdiv job-span ">

<h3 style="margin-bottom:2px;"><a href="<?php echo site_url('jobdetail/'.$job_row->job_id);?>"><?php echo ucwords($job_row->title);?></a></h3>
 <span data-toggle="tooltip" data-original-title="Company" ><?php echo $job_row->company;?></span>    <span data-toggle="tooltip" data-original-title="Experience" ><?php echo $job_row->experience;?></span> <span data-toggle="tooltip" data-original-title="Last date" >
 <?php 
$date = new DateTime($job_row->last_date);
echo $date->format('d M Y'); 
 ?></span> 
<p><?php 

$string = strip_tags($job_row->long_detail);

if (strlen($string) > 300) {
	    // truncate string
    $stringCut = substr($string, 0, 300);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;



?></p>

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;">

<a href="<?php echo site_url('jobdetail/'.$job_row->job_id);?>" style="color:00548f;font-size: 12px;
    font-family: Arial, Helvetica, sans-serif;">View Detail</a></div>
<?php }}else{?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body"> 
      <CENTER> <h3 class="panel-title">No record found</h3></CENTER></div>
</div>
</div>
<?php }}?>
<div class="bosluk"></div> 
<div class="col-md-12 text-center" ><?php if(!empty($job_list)){/*echo $link;*/}?></div>
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>
<input name="xyz" type="hidden" value="xyz" />

<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->



