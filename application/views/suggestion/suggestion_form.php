<div class="col-md-9">
<?php echo form_open_multipart('suggestion'); ?>
<?php if (isset($success_msg))
 {echo '<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Suggestions</h3></CENTER></div>
<div class="panel-body">'; 
  echo $success_msg;
  echo '</div></div>';
 } 
 else{
	
	
	 ?>
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Suggestions</h3></CENTER></div>
<div class="panel-body">
<div class="col-md-6"  >  
<div class="form-group">
<label for="name">Your Name:<?php echo form_error('name'); ?></label>  

  <input type="text" class="form-control"  name="name"<?php  if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter Full Name"';} ?>  required >

</div>

<div class="form-group">
<label for="name">Cell No:<?php echo form_error('cellno'); ?></label>  

  <input type="text" class="form-control"  name="cellno" <?php  if($cellno!=''){echo 'value="'.$cellno.'"';}else{ echo 'placeholder="Enter your cellno."';} ?>   >

</div>

<div class="form-group">
<label for="name">Email:<?php echo form_error('email'); ?></label>  

  <input type="text" class="form-control"  name="email" <?php
   if($email!=''){echo 'value="'.$email.'"';}else{ echo 'placeholder="Enter your email address"';} ?>   required >
</div>
</div><div class="col-md-6"></div>

<div class="col-md-12">
<div class="form-group"> 
   <label for="name">Your Suggestion:<?php echo form_error('sbdetail'); ?></label>  
   <textarea class="form-control" name="sldetail" rows="6" required  <?php if($sldetail==''){echo 'placeholder="Enter suggestion"';}?>   ><?php if($sldetail!=''){echo $sldetail;} ?></textarea></div>
</div>
   
   <div class="col-md-12">  
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Submit</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url('user');?>'" style="width:100px">Cancel</button>
</div>
</div>

</div>
</div>
<?php } ?>
<?php echo form_close(); ?>



<div class="bosluk"></div> 
<div class="col-md-12 text-center" ></div>  
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->