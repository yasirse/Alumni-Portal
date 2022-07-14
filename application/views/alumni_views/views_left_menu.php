<body>
<div class="bosluk"></div>
<div class="container" >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"> 
<?php //echo form_open('searchviews'); ?>
<div class="col-md-3">
<div class="panel panel-default"><div class="panel-heading">
<CENTER> <h3 class="panel-title">Search Views</h3></CENTER></div><div class="panel-body">

<div class="form-group">
<label for="name">Alumni Name:</label>  

  <input type="text" class="form-control"  name="name"  <?php if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter alumni Name"';} ?> >

</div> 

<div class="form-group">
    <label for="cnic">Campus:</label>
<div  class="dropdiv" >

<select name="jcampus" id="drop_box_width"  style="width:200px;" >
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

<div class="form-group text-center"> 
 <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Search</button>
 </div> 
 <?php echo form_close(); ?>
 
 
 </div>
 
  
 </div>
<div class="list-group">
    <a href="" class="list-group-item active" style="text-align:center">Social</a>  
    
     <a href="<?php echo site_url('group') ?>" class="list-group-item" >Groups</a> 
     
     <a href="<?php echo site_url('donation') ?>" class="list-group-item" >Donation</a>
      <a href="<?php echo site_url('suggestion') ?>" class="list-group-item" >Suggestions</a> 
      <a href="<?php echo site_url('gallery') ?>" class="list-group-item" >Photo Gallery</a>
     <a href="<?php echo site_url('viewslist') ?>" class="list-group-item" >Show All Views</a>  
</div>
    </div> <!--  end of left side-->