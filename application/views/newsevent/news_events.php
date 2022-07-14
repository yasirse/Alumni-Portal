<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  
  
  <div class="col-md-9 ">
<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open('newsevent'); ?>
<?php if (isset($msg)) { echo $msg;} else{?>


<div class="form-group">
<label for="name">NewsEvents Title:</label>  <?php echo form_error('netitle'); ?><br />
<input type="text" class="form-control"  name="netitle" placeholder="Enter The Scholarship Title" required >
</div>
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
    
    <div class="form-group">
        <label for="ldate">Event Date</label><?php echo form_error('nelastdate'); ?><br />
        <div class="date" style="width:220px;">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="nelastdate"  required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
       <div class="form-group"> 
   <label for="name">Brief Description:</label>  <?php echo form_error('nebdetail'); ?><br />
   <textarea class="span10" name="nebdetail" rows="10" required style="width: 400px; height: 100px;"  placeholder="Enter Short Detail of News OR Events in Three Lines" ></textarea></div>
    
   <div class="form-group"> 
   <label for="name">Long Detail:</label>  <?php echo form_error('neldetail'); ?><br />
   <textarea class="span10" name="neldetail" rows="10"  required style="width: 400px; height: 150px; " placeholder="Enter Full Detail of News OR Events"></textarea></div>
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
