<div class="col-md-9">
 
<?php 
$user_id= $this->session->userdata('user_id'); 
echo form_open_multipart('alumnicard'); ?>
<?php if (isset($success_msg))
 {echo '<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Alumni Card</h3></CENTER></div>
<div class="panel-body">'; 
  echo $success_msg;
  echo '</div></div>';
 } 
 else{
	
	
	 ?>
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Alumni Card</h3></CENTER></div>
<div class="panel-body">
<h3 >Make sure you have correct personnel information in profile, those information will used for alumni card. you can change your personnel information by editing profile <a href="<?php echo site_url('viewprofile');?>">Click here </a></h3><br>



<div class="form-group" >
<input type="hidden" name="hy" value="<?php echo $user_id ;?>">
<label for="rollno">Upload picture for card (Upload JPG Image, Dimensions 600x600 and size 200kb)</label><?php if(isset($error)) {echo $error;}   echo form_error('sfile'); ?><?php echo form_error('hy'); ?> <br />
<input type="file"  name="sfile" size="100"  required /> 

</div>

<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Post</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo site_url('user')?>'" style="width:100px">Cancel</button>
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
</div></div>