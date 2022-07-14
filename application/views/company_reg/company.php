


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
 
  
  <div class="col-md-9 ">
<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open_multipart('company'); ?>
<?php if (isset($success_msg))
 { 
  echo $success_msg;
 } 
 else{
//if(isset($error)) {echo '<div id="fileupload">'.$error.'</div>';}
	
	 ?>



<div class="form-group">
<label for="name">Company Name:</label>  <?php echo form_error('cname'); ?><br />

  <input type="text" class="form-control"  name="cname" placeholder="Enter Full Name" required autofill="true" autocomplete="on" >

</div>

<div class="form-group">
<label for="name">WebSite URL:</label>  <?php echo form_error('website'); ?><br />

  <input type="text" class="form-control"  name="website" placeholder="Enter WebSite URL" autocomplete="on"  >

</div>
<div class="form-group">
<label for="name">Address:</label>  <?php echo form_error('address'); ?><br />

  <textarea class="span10" name="address" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter your address" maxlength="200" autocomplete="on"></textarea>

</div>
<div class="form-group" >

<label for="rollno">Company Logo: Your Photo ( Dimensions width=160,height=200 and size<=100kb )</label><?php if(isset($error)) {echo $error;} echo form_error('cfile'); ?> <br />
<input type="file"  name="cfile" size="100"   required/> 
</div>


   <div class="form-group"> 
    <label for="cnic">Business Type:</label><?php echo form_error('business'); ?>
<div  class="dropdiv" >

<select name="business"  required onChange="showfield2(this.options[this.selectedIndex].value)" >
  <option value="">Select</option>
  <option value="other_business">Other...</option>
  	<?php  if(isset($business_list))
  {
	  foreach($business_list as $row_business){?>
      
    <option value="<?php echo $row_business->business_id; ?>"><?php echo ucwords($row_business->name); ?></option>
	<?php }}?>
    </select>
</div></div>
 <div class="form-group"><?php echo form_error('other_business'); ?>
<div id="div2"></div>

</div>
       <div class="form-group"> 
   <label for="name">Brief Detail:</label>  <?php echo form_error('cbdetail'); ?><br />
   <textarea class="span10" name="cbdetail" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter Brief Detail of Your Success Story" maxlength="200" ></textarea></div>
    
   <div class="form-group"> 
   <label for="name">Full Detail:</label>  <?php echo form_error('cfdetail'); ?><br />
   <textarea class="span10" name="cfdetail" rows="10"  required style="width: 400px; height: 150px; " placeholder="Enter Your Complete Success Story" maxlength="500"></textarea></div>
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

<script type="text/javascript">

function showfield2(name){
   
  if(name=='other_business')document.getElementById('div2').innerHTML='<label>Other Business: </label><input type="text" class="form-control" id="dname" name="other_business" placeholder="Enter your business type" required >';
  else document.getElementById('div2').innerHTML='';
}
</script>
