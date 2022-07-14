<?php $this->load->view('profile_header'); ?>
<style>
.error {
color:red;
font-size:13px;
margin-bottom:-15px
}

   #dcampus{
 width:150px;   
}

#dcampus option{
 width:150px;   
}

.dropdiv 
{
	width: 150px; 
	margin-bottom: 20px;  
	background-color: #ffffff;  
	border: 1px solid transparent;  
	border-radius: 4px;
	border-color: #dddddd; 
	font-family: inherit;
  	font-size: 100%; 
  	background:url(<?php echo base_url();?>/images/drop.png);
	background-repeat:no-repeat;
	background-position:right ;
}

#jobhead{
	background-color: #f5f5f5;
    border-color: #dddddd;
	color: #940029;
    padding: 10px 0px;
    font-weight: bold;
    font-size: 14px;
	}
</style>

<body>

  <div class="bosluk"></div>  
    <div class="container"  >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                   <CENTER> <h3 class="panel-title">Job Panel </h3>   </CENTER>
                    </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    
                   <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
                   <form action="<?php echo site_url('get/getjob') ?>" method="post">
                  <div class="col-sm-4"> </div><div class="col-sm-2" style="padding-top:4px;">
<div  class="dropdiv" ><select name="jobtype" id="drop_box_width" required >
  <option value="">Select</option>
  <option value="0">All</option>
    <option value="0">Pending</option>
    <option value="one">Approved</option>
   </select></div></div><div class="col-sm-6"><button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Show</button></div>  </form>
                   </div> <!--row 1-->
                    <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"></div> <!--row 1-->
                     <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"></div> <!--row 1-->
  
     <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding ">
     <div class="col-sm-3 " id="jobhead">Title</div>   
     <div class="col-sm-2" id="jobhead">Posted By</div> 
     <div class="col-sm-2" id="jobhead">Posted Date</div> 
     <div class="col-sm-1" id="jobhead">Status</div> 
         <div class="col-sm-1" id="jobhead">Email</div> 
         <div class="col-sm-1" id="jobhead">Detail</div> 
         <div class="col-sm-1" id="jobhead">Action</div>
           <?php $colors = array("red", "green", "blue", "yellow","red", "green", "blue",
		   "yellow","red", "green", "blue", "yellow","red", "green", "blue", "yellow"); 

foreach ($jobs as $row) {
		    ?>
			   <div class="col-sm-3 "> <?php echo  $row->job_title ?> </div>   
      <div class="col-sm-2"><?php echo  $row->job_title ?></div> 
       <div class="col-sm-2"><?php echo  $row->job_title ?></div> 
        <div class="col-sm-1"><?php echo  $row->job_title ?></div> 
           <div class="col-sm-1"><?php echo  $row->job_title ?></div> 
           <div class="col-sm-1"><?php echo  $row->job_title ?></div> 
           <div class="col-sm-1"><?php echo  $row->job_title ?></div> 
		 <?php  } ?>
             
              
                  
      </div> <!--row 2 end-->
     <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
       
     </div>
        </div><!--row 3 end-->
                 </div><!--panel body-->
        </div>  	<!--panel-collapse-->      
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