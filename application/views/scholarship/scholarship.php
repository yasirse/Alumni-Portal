


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
 
  
  <div class="col-md-9 ">
<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open('scholarship'); ?>
<?php if (isset($msg)) { echo $msg;} else{?>



<div class="form-group">

<label for="cnic">Scholarship Title:</label><?php echo form_error('title'); ?>
<div  class="dropdiv" >

<select name="title" id="drop_box_width" required >
  <option value="">Select</option>
 
  <?php  if(isset($scholarship_title_list))
  {
	  foreach($scholarship_title_list as $title_row){?>
      
    <option value="<?php echo $title_row->scholarship_title_id; ?>"><?php echo ucwords($title_row->title); ?></option>
	<?php }}?>
    
</select>
    </div></div>
    

 <div class="form-group"> 
    <label for="cnic">University Name:</label>
<div  class="dropdiv" >

<select name="suni"  required  >
  <option value="">Select</option>
  <option value="other_university">Other...</option>
  	<?php  if(isset($university_list))
  {
	  foreach($university_list as $row_university){?>
      
    <option value="<?php echo $row_university->university_id; ?>"><?php echo ucwords($row_university->name); ?></option>
	<?php }}?>
    </select>
</div></div>
 <div class="form-group">
<div id="div2"></div>

</div>
<div class="form-group"> 
<label for="cnic">Scholarship Country:</label><?php echo form_error('country'); ?><br />
<div  class="dropdiv" >

<select name="country"  required >
  <option value="">Select</option>
	  
  	<?php  if(isset($country_list))
  {
	  
	  foreach($country_list as $row_country){?>
      
    <option value="<?php echo $row_country->country_id; ?>"><?php echo ucwords($row_country->country_name); ?></option>
	<?php }}?>
    </select>
	</div></div>
    
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
        <label for="ldate">Last Date</label><?php echo form_error('slastdate'); ?><br />
        <div class="date" style="width:220px;">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="slastdate"  required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
       <div class="form-group"> 
   <label for="name">Brief Description:</label>  <?php echo form_error('sbdetail'); ?><br />
   <textarea class="span10" name="sbdetail" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter short detail of scholarship in three lines" ></textarea></div>
    
   <div class="form-group"> 
   <label for="name">Long Detail:</label>  <?php echo form_error('sldetail'); ?><br />
   <textarea class="span10" name="sldetail" rows="10"  required style="width: 400px; height: 150px; " placeholder="Enter full detail of scholarship"></textarea></div>
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
  if(name=='other_university')document.getElementById('div2').innerHTML='<label>Other University: </label><input type="text" class="form-control" id="dname" name="other_university" placeholder="Enter university name" required >';
  else document.getElementById('div2').innerHTML='';
}

function showfield3(name){
   
  if(name=='other_title')document.getElementById('div3').innerHTML='<label>Other Title: </label><input type="text" class="form-control" id="dname" name="other_title" placeholder="Enter your job title" required >';
  else document.getElementById('div2').innerHTML='';
}
</script>
<?php $this->load->view('footer.php'); ?>