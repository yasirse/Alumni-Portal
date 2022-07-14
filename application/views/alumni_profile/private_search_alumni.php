<?php echo form_open('searchalumni'); ?>

<div class="col-md-9">
<div class="panel panel-default"><div class="panel-heading">
<CENTER> <h3 class="panel-title">Search Alumni</h3></CENTER></div><div class="panel-body">
<div class="col-md-4">
<div class="form-group">
<label for="name">Alumni Name:</label>  

  <input type="text" class="form-control"  name="name"  <?php if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter alumni Name"';} ?>  >

</div> 
</div>
<div class="col-md-4">
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
 </div> </div> </div> 
  <div class="col-md-4">   
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
</div></div></div>
  <div class="col-md-12"> 
<div class="form-group text-center"> 
 <button id="submit" value="Submit" name="search" type="submit" class="btn btn-default" style="width:100px">Search</button>
 </div> 

 </div>
 
 
  <?php echo form_close(); ?>
  
<!--  --------------------------------------------end of search panel---------------------------------------------------------->
<?php if(isset($alumni_list)){if(!empty($alumni_list)){ foreach($alumni_list as $row){?>

<div class="col-md-12 Generic_txt" style="border: 1px solid rgb(220, 225, 227);     border-top-left-radius:3px;  border-top-left-radius:3px;   background-color: rgb(250, 250, 250); ">
<img src="<?php if($row->photo!=''){$path=$row->photo;}else{$path='no-image.png';} echo base_url().'uploads/alumni/'.$path;?>" alt="Picture Not Found" width="70px" height="70px" align="left" style="padding-right:5px;padding-bottom:5px;border-radius: 8px;" >

<style>
span{margin-right:20px;margin-left:10px;}
</style>
<div class="col-md-10" style="padding-top:10px;">
<span ><strong>Name:</strong><?php echo ' '.$row->name;?> </span>
<span><strong>Rollno:</strong><?php echo ' '.$row->rollno;?> </span>
<span><strong>Email:</strong><?php echo ' '.$row->email;?> </span>
<br />
<span><strong>Department:</strong><?php echo ' '.$row->department;?> </span>
<span><strong>Campus:</strong><?php echo ' '.$row->campus;?> </span>
</div>
<!--#ddd; #00548f  fff-->

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;"><a href="<?php echo site_url('alumnidetail/'.$row->user_id);?>" style="color:00548f;font-size: 12px;
    font-family: Arial, Helvetica, sans-serif;">View Profile</a></div>
<?php } ?>


<?php }else{?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
      <CENTER> <h3 class="panel-title">No record found</h3></CENTER></div>
</div>
</div>
<?php }}?>

<div class="bosluk"></div> 
<div class="col-md-12 text-center" ><?php if(!empty($alumni_list)){echo $pagination;}?></div>  
</div></div>
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->