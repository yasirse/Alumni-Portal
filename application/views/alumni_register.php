<?php $this->load->view('header'); ?>
<body>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!--date picker-->
<script src="<?php echo base_url();?>common/js/date-picker.js"></script>
<!--date picker-->

    <div class="container" >
      <div class="row-fluid" >
 
 <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2">    </div>   
  <div class="col-md-8">
   <div class="content">

   <div id="accordion" class="panel-group">
   <div class="panel panel-default">
                  <div class="panel-heading">
                   <CENTER> <h3 class="panel-title">Alumni Registeration  </h3>   </CENTER>       
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">

<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open('register'); ?>
<?php
if(isset($postback))
{foreach($postback as $postback_row)
{
	
}
}
?>
<CENTER><h3 style="color:green;">If you failed to register then send us reason at alumni@nu.edu.pk</h3>
</CENTER><br>

<div class="form-group">
<label for="name">Name:</label>  <?php echo form_error('name'); ?><br />

  <input type="text" class="form-control" id="dname" name="name" <?php if($postback_row['name']!=''){echo 'value="'.$postback_row['name'].'"';}else{ echo 'placeholder="Enter Full Name"';} ?> required>

</div>
<div class="form-group">
<label for="rollno">Roll No:(e.g 07-0385)</label> <?php echo form_error('rollno'); ?><br />

  <input type="text" class="form-control" id="drollno" name="rollno" <?php if($postback_row['rollno']!=''){echo 'value="'.$postback_row['rollno'].'"';}else{ echo 'placeholder="Enter Roll No."';} ?>   required  pattern="\d{2}-\d{1,6}" oninvalid="this.setCustomValidity('Enter Roll No. like this 07-0385)')"  onchange="this.setCustomValidity('')">

</div>
<div class="form-group">
 <label for="email">Personel Email:</label> <?php echo form_error('email'); ?><br />

 <input type="email" class="form-control" id="demail" name="email" <?php if($postback_row['email']!=''){echo 'value="'.$postback_row['email'].'"';}else{ echo 'placeholder="Enter email"';} ?>  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
</div>
<div class="form-group">
<label for="cnic">CNIC:(e.g 32201-2116507-5)</label><?php echo form_error('cnic'); ?><br />


 <input type="text" class="form-control" id="dcnic" name="cnic" <?php if($postback_row['cnic']!=''){echo 'value="'.$postback_row['cnic'].'"';}else{ echo 'placeholder="Enter CNIC"';} ?>  required pattern="\d{5}-\d{7}-\d{1}" oninvalid="this.setCustomValidity('Enter CNIC like this 32201-2116507-5')" 
onchange="this.setCustomValidity('')" >
</div>


    
    <div class="form-group">
    <label for="cnic">Campus:</label><?php echo form_error('campus'); ?>
<div  class="dropdiv" >

<select name="campus" id="drop_box_width" required style="width:200px;" >
  <option value="" style="width:200px;">Select</option>
     <?php 
  {
	  foreach($postback_row['campus_list'] as $row_campus){?>  
    <option <?php if($row_campus->campus_id==$postback_row['campus_id']){ echo 'value="'.$row_campus->campus_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_campus->campus_id.'"';} ?> "><?php echo ucfirst($row_campus->name); ?></option>
	<?php }}?>
</select>
 </div> </div>
 
 
 
<div class="form-group">
    <label for="cnic">Department:</label><?php echo form_error('department'); ?>
<div  class="dropdiv"  >

<select name="department" id="drop_box_width" required >
  <option value="">Select</option>
     <?php 
  {
	  foreach($postback_row['department_list'] as $row_department){?>
      
    <option <?php if($row_department->department_id==$postback_row['department_id']){ echo 'value="'.$row_department->department_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_department->department_id.'"';} ?>><?php echo ucwords($row_department->name); ?></option>
	<?php }}?>
   </select>
</div></div>
    
  
<div class="form-group">
        <label for="cnic">DOB</label><?php echo form_error('ddob'); ?><br />
        <div class="date">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" id="ddob" name="dob"   required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Register</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url();?>index.php'" style="width:100px">Cancel</button>
</div>
<?php echo form_close(); ?>
    </div>
                 </div><!--panel body-->
        </div>  <!--panel-collapse-->      
        </div>

        </div> <!--panel-group-->  
        
        </div> <!--content--> 
      </div> <!--row-fluid--> 
    </div>    <!--container--> 
      <div class="bosluk"></div>
  <!--bosluk--> 
  </div>  
     <div class="col-md-2">    </div> 
    
<?php $this->load->view('footer.php'); ?>