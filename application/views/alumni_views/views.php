


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<body>

  <div class="bosluk"></div>  
    <div class="container"  >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                   <CENTER> <h3 class="panel-title">Share Your Success Story Here  </h3>   </CENTER>         
                                        
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    
                       <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2 "></div>   
  
  <div class="col-md-8 ">
<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open_multipart('story'); ?>
<?php if (isset($success_msg))
 { 
  echo $success_msg;
 } 
 else{
	// if(isset($error)) {echo '<div id="fileupload">'.$error.'</div>';}
	
	 ?>



<div class="form-group">
<label for="name">Your Name:</label>  <?php echo form_error('sname'); ?><br />

  <input type="text" class="form-control"  name="sname" placeholder="Enter Full Name" required style="width:200px;">

</div>
<div class="form-group">
    <label for="cnic">Department:</label><?php echo form_error('department'); ?>
<div  class="dropdiv"  >

<select name="department" id="drop_box_width" required >
  <option value="">Select</option>
     <?php  if(isset($department_list))
  {
	  foreach($department_list as $row_department){?>
      
    <option value="<?php echo $row_department->department_id; ?>"><?php echo ucwords($row_department->name); ?></option>
	<?php }}?>
   </select>
</div></div>
<div class="form-group">
    <label for="cnic">Campus:</label><?php echo form_error('campus'); ?>
<div  class="dropdiv" >

<select name="campus" id="drop_box_width" required style="width:200px;" >
  <option value="" style="width:200px;">Select</option>
     <?php  if(isset($campus_list))
  {
	  foreach($campus_list as $row_campus){?>      
    <option value="<?php echo $row_campus->campus_id; ?>"><?php echo ucfirst($row_campus->name); ?></option>
	<?php }}?>
</select>
 </div> </div>
<div class="form-group" >

<label for="rollno">Your Photo (Upload JPG Image, Dimensions 182x178 and size100kb)</label><?php if(isset($error)) {echo $error;}   echo form_error('sfile'); ?> <br />
<input type="file"  name="sfile" size="100"  required /> 
</div>

       <div class="form-group"> 
   <label for="name">Brief Detail:</label>  <?php echo form_error('sbdetail'); ?><br />
   <textarea class="span10" name="sbdetail" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter Brief Detail of Your Success Story" ></textarea></div>
    
   <div class="form-group"> 
   <label for="name">Full Detail:</label>  <?php echo form_error('sfdetail'); ?><br />
   <textarea class="span10" name="sfdetail" rows="10"  required style="width: 400px; height: 150px; " placeholder="Enter Your Complete Success Story"></textarea></div>
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Post</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url();?>index.php'" style="width:100px">Cancel</button>
</div><?php } ?>
<?php echo form_close(); ?>
    </div>
        </div>
        </div>
     <div class="col-md-2">    </div>   
                 </div><!--panel body-->
        </div>  <!--panel-collapse-->      
        </div>
   
    
    <div class="bosluk"></div>     
</div> <!--content div-->
  </div> <!--container div-->

     <script  type="text/javascript">
$(document).ready(function() {
    $('#dateRangePicker')
        .datepicker({
            format: 'mm/dd/yyyy',
            startDate: '01/01/1900',
            endDate: '12/30/2030'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#dateRangeForm').formValidation('revalidateField', 'date');
        });

    $('#dateRangeForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        min: '01/01/1900',
                        max: '12/30/2030',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
<?php $this->load->view('footer.php'); ?>