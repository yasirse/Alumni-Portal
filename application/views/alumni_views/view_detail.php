<div class="col-md-9">
<div class="panel panel-default">  <div class="panel-heading">
      <CENTER> <h3 class="panel-title">View Detail</h3></CENTER></div>
<div class="panel-body">
<?php if(isset($view_detail)){ foreach($view_detail as $view_row){?>
<div class="col-md-12" style="font-size: 20px;text-align:center;padding-bottom:5px;color:#3E88DA"><?php echo ucwords($view_row->name).'  '.ucwords($view_row->department).'  '.ucwords($view_row->campus).'     Posted Date: '.$view_row->modify_date;?></div>
<div class="col-md-12"><img src="<?php echo base_url().'uploads/views/'.$view_row->photo_path;?>" alt="Map" width="100" height="100" align="left" style="margin-right:5px;margin-top:3px;margin-bottom:3px;">
<?php echo $view_row->detail;?>

<?php }}?> 
</div>
</div> <!--end of detail panel -->
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->
    
