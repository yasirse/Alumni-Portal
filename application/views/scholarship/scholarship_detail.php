<div class="col-md-9">
<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Scholarship Detail</h3></CENTER></div>
<div class="panel-body">
<?php if(isset($scholarship_detail)){ foreach($scholarship_detail as $scholarship_row){?>
 <div class="col-md-12"><div class="col-md-2"><p><b>Title :</b></p></div><div class="col-md-8"><p><?php echo ucwords($scholarship_row->title);?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Last Date :</b></p></div><div class="col-md-8"><p><?php echo $scholarship_row->last_date;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Detail :</b></p></div><div class="col-md-8"><p><?php echo $scholarship_row->long_detail;?></p></div></div>

<?php }}?> 
</div>
</div><!--end of detail panel -->
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>

<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->


