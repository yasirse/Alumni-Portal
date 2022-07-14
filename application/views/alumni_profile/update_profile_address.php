

<div class="col-md-9">
<?php 
$user_id= $this->session->userdata('user_id'); 
echo form_open_multipart('updatewebaddress'); ?>
<?php if (isset($message))
 {echo '<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Profile Addresses</h3></CENTER></div>
<div class="panel-body"> <CENTER> <h3 class="panel-title">'; 
  echo $message;
  echo '</CENTER></div></div>';
 } 
 else{
	
	
	 ?>
     
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Profile Addresses</h3></CENTER></div>
<div class="panel-body">



<?php 
if(isset($list))
{if(!empty($list)){
	$count=1;
	foreach($list as $row1)
	{
		$web_name=$row1->web_name;
		$id=$row1->web_address_id;
		$address=$row1->address;
		$name1='name'.$count;
		$address1='address'.$count;
		

?>
<div class="col-md-12" style="margin-bottom:20px;border: 1px solid rgb(220, 225, 227); border-radius:3px;    background-color: #ddd;;">
<div class="form-group">
<label for="name">Website Name:</label>  <?php echo form_error($name1); ?><br />
  
    <input type="hidden" class="form-control" name="id<?php echo $count;?>" value="<?php echo $id;?>">
  <input type="text" class="form-control"  name="name<?php echo $count;?>" <?php if($web_name!=''){echo 'value="'.$web_name.'"';}else{ echo 'placeholder="E.g LinkedIn "';} ?> >
</div>


<div class="form-group">
<label for="name">Address:</label>  <?php echo form_error($address1); ?><br />
<input type="text" class="form-control"  name="address<?php echo $count;?>" <?php if($address!=''){echo 'value="'.$address.'"';}else{ echo 'placeholder="Enter profile website address"';} ?> >
</div></div>

<?php $count++; }?>
<input type="hidden" class="form-control" name="count" value="<?php echo $count++;?>">
<div class="col-md-12" >
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Update</button>  
   <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo site_url('user')?>'" style="width:100px">Cancel</button>
</div></div>
<?php $count++; }}else{?>
<CENTER> <h3 class="panel-title">Please add new profile address.
 </h3></CENTER></div></div>
<?php } ?>

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