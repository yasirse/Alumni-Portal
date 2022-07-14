<body>
<div class="bosluk"></div>
<div class="container" >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"> 
<?php echo form_open('searchscholarship');  ?>
<div class="col-md-3"> <div class="panel panel-default"><div class="panel-heading">
<CENTER> <h3 class="panel-title">Search Scholarship</h3></CENTER></div><div class="panel-body">
 
<div class="form-group">

<label for="cnic">Scholarship Title:</label>
<div  class="dropdiv" >

<select name="title" id="drop_box_width"  >
  <option value="">Select</option>
  
  <?php  if(isset($scholarship_title_list))
  {
	  foreach($scholarship_title_list as $title_row){?>
      
    <option <?php if($title_row->scholarship_title_id==$scholarship_title_id){ echo 'value="'.$scholarship_title_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$title_row->scholarship_title_id.'"';} ?> ><?php echo ucwords($title_row->title); ?></option>
	<?php }}?>
    
</select>
    </div></div>
    
    <div class="form-group"> 
    <label for="cnic">University Name:</label>
<div  class="dropdiv" >

<select name="suni"   id="drop_box_width" >
  <option value="">Select</option>
  
  	<?php  if(isset($university_list))
  {
	  foreach($university_list as $row_university){?>
      
    <option <?php if($row_university->university_id==$university_id){ echo 'value="'.$university_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_university->university_id.'"';} ?> ><?php echo ucwords($row_university->name); ?></option>
	<?php }}?>
    </select>
</div></div>
    
     <div class="form-group"> 
<label for="cnic">Scholarship Country:</label>
<div  class="dropdiv" >

<select name="country" id="drop_box_width"  >
  <option value="">Select</option>
	  
  	<?php  if(isset($country_list))
  {
	  
	  foreach($country_list as $row_country){?>
      
    <option <?php if($row_country->country_id==$country_id){ echo 'value="'.$country_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_country->country_id.'"';} ?> ><?php echo ucwords($row_country->country_name); ?></option>
	<?php }}?>
    </select>
	</div></div>
   <div class="form-group">
    <label for="cnic">Department:</label>
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
 </div></div>
    </div> <!--  end of left side-->