<div class="col-md-9">
<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Newsevent Detail</h3></CENTER></div>
<div class="panel-body">
<?php if(isset($newsevent_detail)){ foreach($newsevent_detail as $newsevent_row){?>
 <div class="col-md-12"><div class="col-md-2"><p><b>Title:</b></p></div><div class="col-md-10"><p><?php echo $newsevent_row->title;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Date:</b></p></div><div class="col-md-10"><p><?php echo $newsevent_row->event_date;?></p></div></div>
 <div class="col-md-12"><div class="col-md-2"><p><b>Detail:</b></p></div><div class="col-md-10"><p><?php echo $newsevent_row->long_detail;?></p></div></div>


<?php }}?>
</div>
</div><!--end of detail panel -->
</div>    


       
</div>
</div>
</div><!--panel body-->
</div>  <!--panel-collapse-->      
</div>
   
    
    <div class="bosluk"></div>     
</div> <!--content div-->
  </div> <!--container div-->

    