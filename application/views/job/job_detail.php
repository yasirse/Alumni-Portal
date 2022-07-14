<div class="col-md-9">
<div class="panel panel-default">  <div class="panel-heading">
      <CENTER> <h3 class="panel-title">Job Detail</h3></CENTER></div>
<div class="panel-body">
<?php if(isset($job_detail)){ foreach($job_detail as $job_row){?>
 <div class="col-md-12"><div class="col-md-2"><p><b>Title :</b></p></div><div class="col-md-10"><p><?php echo ucwords($job_row->title);?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Last Date :</b></p></div><div class="col-md-10"><p><?php echo $job_row->last_date;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Experience :</b></p></div><div class="col-md-10"><p><?php echo $job_row->experience;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Employer :</b></p></div><div class="col-md-10"><p><?php echo $job_row->company;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Business :</b></p></div><div class="col-md-10"><p><?php echo $job_row->business;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Detail :</b></p></div><div class="col-md-10"><p><?php echo $job_row->long_detail;?></p></div></div>

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