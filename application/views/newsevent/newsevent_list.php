<div class="col-md-9">

<?php if(isset($newsevent_list)){if(!empty($newsevent_list)){ foreach($newsevent_list as $newsevent_row){?>


<div class="col-md-12 listdiv job-span ">

<h3 style="margin-bottom:2px;"><a href="<?php echo site_url('newseventdetail/'.$newsevent_row->newsevent_id);?>"><?php echo ucwords($newsevent_row->title);?></a></h3>
 <?php if($newsevent_row->campus!=''){echo '<span data-toggle="tooltip" data-original-title="Campus" >'.$newsevent_row->campus.'</span>'; }?>    <?php if($newsevent_row->event_date!=''){$date = new DateTime($newsevent_row->event_date); echo '<span data-toggle="tooltip" data-original-title="Posted date" >'.$date->format('d M Y').'</span>'; }?><?php if($newsevent_row->short_detail!=''){echo '<p>'
.$newsevent_row->short_detail.'</p>';} ?>

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;">

<a href="<?php echo site_url('newseventdetail/'.$newsevent_row->newsevent_id);?>" style="color:00548f;font-size: 12px;
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
<div class="col-md-12 text-center" ><?php if(!empty($newsevent_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->

