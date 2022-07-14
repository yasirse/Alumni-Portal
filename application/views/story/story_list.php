<div class="col-md-9">
<?php if(isset($story_list)){if(!empty($story_list)){ foreach($story_list as $story_row){?>

<div class="col-md-12 listdiv job-span ">
<img src="<?php echo base_url().'uploads/stories/'.$story_row->photo_path;?>" alt="Map" width="100px" height="100px" align="left" style="margin-right:5px;margin-bottom:5px;border-radius: 5px;margin-top:10px;">
<h3 style="margin-bottom:2px;"><a href="<?php echo site_url('storydetail/'.$story_row->story_id);?>"><?php echo ucwords($story_row->name);?></a></h3>
 <?php if($story_row->campus!=''){echo '<span data-toggle="tooltip" data-original-title="Campus" >'.ucwords($story_row->campus).'</span>'; }?>   <?php if($story_row->department!=''){ echo '<span data-toggle="tooltip" data-original-title="department" >'.ucwords($story_row->department).'</span>'; }?> <?php if($story_row->short_detail!=''){echo '<p>'
.$story_row->short_detail.'</p>';} ?>

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;">

<a href="<?php echo site_url('storydetail/'.$story_row->story_id);?>" style="color:00548f;font-size: 12px;
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
<div class="col-md-12 text-center" ><?php if(!empty($story_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->