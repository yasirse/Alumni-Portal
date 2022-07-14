<div class="col-md-9">
<?php  if(isset($company_list)){ if(!empty($company_list)){ foreach($company_list as $company_row){?>


<div class="col-md-12 listdiv job-span ">
<img src="<?php echo base_url().'uploads/company/'.$company_row->photo_path;?>" alt="Map" width="100px" height="100px" align="left" style="margin-right:5px;margin-bottom:5px;border-radius: 5px;margin-top:10px;">
<h3 style="margin-bottom:2px;"><a <?php if($company_row->weblink!=''){echo  'href="'.$company_row->weblink.'"'; echo ' target="_blank"';}else{echo 'href="companydetail/'.$company_row->comp_reg_id.'"';}?> ><?php echo ucwords($company_row->name);?></a></h3>
    <?php if($company_row->short_detail!=''){echo '<p>'
.$company_row->short_detail.'</p>';} ?>

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;">

<a href="<?php if($company_row->weblink!=''){echo  'href="'.$company_row->weblink.'"'; echo ' target="_blank"';}else{echo 'href="companydetail/'.$company_row->comp_reg_id.'"';}?>" style="color:00548f;font-size: 12px;
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
<div class="col-md-12 text-center" ><?php if(!empty($company_list)){/*echo $link;*/}?></div>
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->



