<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<div class="col-md-9">
<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open('job'); ?>
<?php if (isset($msg)) { echo $msg;} else{?>

<div class="form-group">

<label for="cnic">Job Title:</label><?php echo form_error('title'); ?>
<div  class="dropdiv" >

<select name="title" id="drop_box_width" required onChange="showfield3(this.options[this.selectedIndex].value)">
  <option value="">Select</option>
  <option value="other_title">Other...</option>
  <?php  if(isset($job_title_list))
  {
	  foreach($job_title_list as $title_row){?>
      
    <option value="<?php echo $title_row->job_title_id; ?>"><?php echo ucwords($title_row->title); ?></option>
	<?php }}?>
    
</select>
    </div></div>
    <div class="form-group">
<div id="div3"></div>
</div>


<div class="form-group">

<label for="cnic">Company:</label><?php echo form_error('jcompany'); ?>
<div  class="dropdiv" >

<select name="jcompany" id="drop_box_width" required onChange="showfield(this.options[this.selectedIndex].value)">
  <option value="">Select</option>
  <option value="other_company">Other...</option>
  <?php  if(isset($company_list))
  {
	  foreach($company_list as $row_company){?>
      
    <option value="<?php echo $row_company->company_id; ?>"><?php echo ucwords($row_company->name); ?></option>
	<?php }}?>
    
</select>

    </div>   </div>

<div class="form-group">
<div id="div1"></div>

</div>


 <div class="form-group">
<label for="cnic">Experience:</label><?php echo form_error('jexp'); ?>
<div  class="dropdiv" >

<select name="jexp" id="drop_box_width" required >
  <option value="">Select</option>
  
     <?php  if(isset($experience_list))
  {
	  foreach($experience_list as $row_experience){?>
      
    <option value="<?php echo $row_experience->experience_id; ?>"><?php echo $row_experience->name; ?></option>
	<?php }}?>
</select>

    </div></div>
   <div class="form-group"> 
    <label for="cnic">Business Type:</label><?php echo form_error('cbusiness'); ?>
<div  class="dropdiv" >

<select name="jbusiness"  required onChange="showfield2(this.options[this.selectedIndex].value)" >
  <option value="">Select</option>
  <option value="other_business">Other...</option>
  	<?php  if(isset($business_list))
  {
	  foreach($business_list as $row_business){?>
      
    <option value="<?php echo $row_business->business_id; ?>"><?php echo ucwords($row_business->name); ?></option>
	<?php }}?>
    </select>
</div></div>
 <div class="form-group">
<div id="div2"></div>

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
    <label for="cnic">Campus:</label><?php echo form_error('jcampus'); ?>
<div  class="dropdiv" >

<select name="jcampus" id="drop_box_width" required style="width:200px;" >
  <option value="" style="width:200px;">Select</option>
     <?php  if(isset($campus_list))
  {
	  foreach($campus_list as $row_campus){?>      
    <option value="<?php echo $row_campus->campus_id; ?>"><?php echo ucfirst($row_campus->name); ?></option>
	<?php }}?>
</select>
 </div> </div>
    
    <div class="form-group">
        <label for="ldate">Last Date</label><?php echo form_error('ldate'); ?><br />
        <div class="date" style="width:220px;">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" id="ddob" name="ldate"  required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
       <div class="form-group"> 
   <label for="name">Short Detail:</label>  <?php echo form_error('jsdetail'); ?><br />
   <textarea class="span10" name="jsdetail" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter Short Detail of Job in Three Lines" ></textarea></div>
    
   <div class="form-group"> 
   <label for="name">Long Detail:</label>  <?php echo form_error('jldetail'); ?><br />
   <textarea class="span10" name="jldetail" rows="10"  required style="width: 400px; height: 150px; " placeholder="Enter Full Detail of Job"></textarea></div>
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Post</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url();?>user'" style="width:100px">Cancel</button>
</div><?php } ?>
<?php echo form_close(); ?>
    </div>
    </div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div>
</div>
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
function showfield(name){
  if(name=='other_company')document.getElementById('div1').innerHTML='<label>Other Company: </label><input type="text" class="form-control" id="dname" name="other_company" placeholder="Enter Full Name" required >';
  else document.getElementById('div1').innerHTML='';
 
}

function showfield2(name){
   
  if(name=='other_business')document.getElementById('div2').innerHTML='<label>Other Business: </label><input type="text" class="form-control" id="dname" name="other_business" placeholder="Enter your business type" required >';
  else document.getElementById('div2').innerHTML='';
}

function showfield3(name){
   
  if(name=='other_title')document.getElementById('div3').innerHTML='<label>Other Title: </label><input type="text" class="form-control" id="dname" name="other_title" placeholder="Enter your job title" required >';
  else document.getElementById('div2').innerHTML='';
}
</script>
