<div class="col-md-9">
<?php if(isset($scholarship_list)){if(!empty($scholarship_list)){ foreach($scholarship_list as $scholarship_row){?>

<div class="col-md-12 listdiv job-span ">

<h3 style="margin-bottom:2px;"><a href="<?php echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id);?>"><?php echo ucwords($scholarship_row->title);?></a></h3>
 <?php if($scholarship_row->university!=''){echo '<span data-toggle="tooltip" data-original-title="University" >'.$scholarship_row->university.'</span>'; }?>   <?php if($scholarship_row->country!=''){ echo '<span data-toggle="tooltip" data-original-title="Country" >'.$scholarship_row->country.'</span>'; }?> <?php if($scholarship_row->last_date!=''){$date = new DateTime($scholarship_row->last_date); echo '<span data-toggle="tooltip" data-original-title="Last date" >'.$date->format('d M Y').'</span>'; }?><?php if($scholarship_row->short_detail!=''){echo '<p>'
.$scholarship_row->short_detail.'</p>';} ?>

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;">

<a href="<?php echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id);?>" style="color:00548f;font-size: 12px;
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
<div class="col-md-12 text-center" ><?php if(!empty($scholarship_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->