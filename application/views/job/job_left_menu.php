
<body>
<div class="bosluk"></div>
<div class="container" >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"> 

<div class="col-md-3"><?php echo form_open('searchjob'); ?><div class="panel panel-default"><div class="panel-heading">
                   <CENTER> <h3 class="panel-title">Search Job</h3></CENTER></div><div class="panel-body"><div class="form-group">

<label for="cnic">Job Title:</label>
<div  class="dropdiv" >

<select name="title" id="drop_box_width" >
  <option value="">Select</option>
  
  <?php  if(isset($job_title_list))
  {
	  foreach($job_title_list as $title_row){?>
      
    <option <?php if($title_row->job_title_id==$title_id){ echo 'value="'.$title_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$title_row->job_title_id.'"';} ?> "><?php echo ucwords($title_row->title); ?></option>
	<?php }}?>
    
</select>
    </div></div>
    
    <div class="form-group">

<label for="cnic">Company:</label>
<div  class="dropdiv" >

<select name="jcompany" id="drop_box_width" >
  <option value="">Select</option>
  
  <?php  if(isset($company_list))
  {
	  foreach($company_list as $row_company){?>
      
    <option <?php if($row_company->company_id==$company_id){ echo 'value="'.$company_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_company->company_id.'"';} ?> ><?php echo ucwords($row_company->name); ?></option>
	<?php }}?>
    
</select>

    </div>   </div>
    
     <div class="form-group">
<label for="cnic">Experience:</label>
<div  class="dropdiv" >

<select name="jexp" id="drop_box_width"  >
  <option value="">Select</option>
  
     <?php  if(isset($experience_list))
  {
	  foreach($experience_list as $row_experience){?>
      
    <option <?php if($row_experience->experience_id==$experience_id){ echo 'value="'.$experience_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_experience->experience_id.'"';} ?> ><?php echo $row_experience->name; ?></option>
	<?php }}?>
</select>

    </div></div>
   <div class="form-group"> 
    <label for="cnic">Business Type:</label>
<div  class="dropdiv" >

<select name="jbusiness" id="drop_box_width"  >
  <option value="">Select</option>
 
  	<?php  if(isset($business_list))
  {
	  foreach($business_list as $row_business){?>
      
    <option <?php if($row_business->business_id==$business_id){ echo 'value="'.$business_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_business->business_id.'"';} ?> ><?php echo ucwords($row_business->name); ?></option>
	<?php }}?>
    </select>
</div></div>
<div class="form-group text-center"> 
 <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Search</button>
 </div> 

 </div></div>
  <?php echo form_close(); ?>
    </div> <!--  end of left side-->