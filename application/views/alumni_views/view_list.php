<div class="col-md-9">
<?php if(isset($views_list)){if(!empty($views_list)){ foreach($views_list as $views_row){?>

<div class="col-md-12 Generic_txt" style="margin-bottom:10px;border: 1px solid rgb(220, 225, 227); border-radius:3px;    background-color: rgb(250, 250, 250);"><div class="col-md-12" style="text-align:center;padding-bottom:5px;padding-top:5px;color:#3E88DA"><a href="<?php echo site_url('viewsdetail/'.$views_row->view_id);?>"><?php echo ucwords($views_row->name).'  '.ucwords($views_row->department).'  '.ucwords($views_row->campus);

$date = new DateTime($views_row->modify_date);
echo '     Posted Date: '.$date->format('d M Y');?></a></div>
<img src="<?php echo base_url().'uploads/views/'.$views_row->photo_path;?>" alt="Map" width="100px" height="100px" align="left" style="padding-right:5px;padding-bottom:5px;border-radius: 8px;">
<?php echo ucwords($views_row->detail);?>
</div>
<?php }}else{?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
      <CENTER> <h3 class="panel-title">No record found</h3></CENTER></div>
</div>
</div>
<?php }}?>

<div class="bosluk"></div> 
<div class="col-md-12 text-center" ><?php if(!empty($views_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->