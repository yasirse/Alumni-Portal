<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!--date picker-->
<script src="<?php echo base_url();?>common/js/date-picker.js"></script>

<div class="col-md-9">
<?php 
$user_id= $this->session->userdata('user_id'); 
echo form_open_multipart('editbasicprofile'); ?>
<?php if (isset($message))
 {echo '<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Profile</h3></CENTER></div>
<div class="panel-body"> <CENTER> <h3 class="panel-title">'; 
  echo $message;
  echo '</CENTER></div></div>';
 } 
 else{
	
	
	 ?>
     
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Profile</h3></CENTER></div>
<div class="panel-body">



<div class="form-group">
<label for="name">Name:</label>  <?php echo form_error('name'); ?><br />

  <input type="text" class="form-control" id="dname" name="name" <?php if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter Full Name"';} ?> required>

</div>
<div class="form-group">
<label for="rollno">Roll No:(e.g 07-0385)</label> <?php echo form_error('rollno'); ?><br />

  <input type="text" class="form-control" id="drollno" name="rollno" <?php if($rollno!=''){echo 'value="'.$rollno.'"';}else{ echo 'placeholder="Enter Roll No."';} ?>   required  pattern="\d{2}-\d{1,6}" oninvalid="this.setCustomValidity('Enter Roll No. like this 07-0385)')"  onchange="this.setCustomValidity('')">

</div>
<div class="form-group">
 <label for="email">Personel Email:</label> <?php echo form_error('email'); ?><br />

 <input type="email" class="form-control" id="demail" name="email" <?php if($email!=''){echo 'value="'.$email.'"';}else{ echo 'placeholder="Enter email"';} ?>  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
</div>
<div class="form-group">
<label for="cnic">CNIC:(e.g 32201-2116507-5)</label><?php echo form_error('cnic'); ?><br />


 <input type="text" class="form-control" id="dcnic" name="cnic" <?php if($cnic!=''){echo 'value="'.$cnic.'"';}else{ echo 'placeholder="Enter CNIC"';} ?>  required pattern="\d{5}-\d{7}-\d{1}" oninvalid="this.setCustomValidity('Enter CNIC like this 32201-2116507-5')" 
onchange="this.setCustomValidity('')" >
</div>


 
 
 
 
 <div class="form-group">
    <label for="cnic">Campus:</label>
<div  class="dropdiv" >

<select name="campus" id="drop_box_width"  style="width:200px;" >
  <option value="" style="width:200px;">Select</option>
     <?php  if(isset($campus_list))
  {
	  foreach($campus_list as $row_campus){?>
    <option <?php if($row_campus->campus_id==$campus_id){ echo 'value="'.$campus_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_campus->campus_id.'"';} ?> ><?php echo ucfirst($row_campus->name); ?></option>
	<?php }}?>
</select>
 </div> </div>
 
 
<div class="form-group">
    <label for="cnic">Department:</label><?php echo form_error('department'); ?>
<div  class="dropdiv"  >

<select name="department" id="drop_box_width"  >
  <option value="">Select</option>
     <?php  if(isset($department_list))
  {
	  foreach($department_list as $row_department){?>      
    <option <?php if($row_department->department_id==$department_id){ echo 'value="'.$department_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_department->department_id.'"';} ?> ><?php echo ucwords($row_department->name); ?></option>
	<?php }}?>
   </select>
</div></div>
    
 
  
<div class="form-group">
        <label for="cnic">DOB</label><?php echo form_error('ddob'); ?><br />
        <div class="date">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" id="ddob" name="dob"  value="<?php echo $dob;?>" required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Update</button>  
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