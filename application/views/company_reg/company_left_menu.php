
<body>
<div class="bosluk"></div>
<div class="container" >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"> 
<?php echo form_open('searchcompany'); ?>
<div class="col-md-3"> <div class="panel panel-default"><div class="panel-heading">
<CENTER> <h3 class="panel-title">Search Company</h3></CENTER></div><div class="panel-body">
<div class="form-group">
<label for="name">Company Name:</label>  

  <input type="text" class="form-control"  name="name"  <?php if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter company Name"';} ?> >

</div> 

 <div class="form-group"> 
    <label for="cnic">Business Type:</label>
<div  class="dropdiv" >

<select name="business" >
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
 <?php echo form_close(); ?>
 </div></div>
    </div> <!--  end of left side-->