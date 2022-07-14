
<style>
.error {
color:red;
font-size:13px;
margin-bottom:-15px
}
</style>
<body>


    <div class="container" >
      <div class="row-fluid" >
 
 <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2">    </div>   
  <div class="col-md-8">
   <div class="content">

   <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                  <CENTER>  <h3 class="panel-title">Alumni Login  </h3>       </CENTER>     
                    
                    
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
          <?php if (isset($error)) { ?>
<CENTER><h3 style="color:red;"> <?php echo $error; ?></h3></CENTER><br>
<?php } ?>

<!--  <form action="register/alumni_reg" method="post">-->
<?php echo form_open('login'); ?>

<div class="form-group">
<label for="cnic">User CNIC: (e.g 32201-2116507-5)</label><?php echo form_error('dcnic'); ?><br />


 <input type="text" class="form-control" id="dcnic" name="dcnic" placeholder="Enter Your CNIC" required pattern="\d{5}-\d{7}-\d{1}" oninvalid="this.setCustomValidity('Enter CNIC like this 32201-2116507-5')" 
onchange="this.setCustomValidity('')" >
</div>
<div class="form-group">
<label for="rollno">Password</label> <?php echo form_error('dpass'); ?><br />

  <input type="text" class="form-control" id="dpass" name="dpass" placeholder="Enter Your Password"  required >

</div>
<div class="form-group">
<a href="<?php echo site_url('user/forget') ?>">  Request a new password.</a>
<a style="margin-left:20px;" href="<?php echo site_url('register') ?>">  Create new account.</a>

</div>
   
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Login</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url();?>logout'" style="width:100px">Cancel</button>
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