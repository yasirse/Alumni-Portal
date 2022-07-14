
<?php $home='Admin Panel';
$link='alumniprofile' ?>


<body>

  <div class="bosluk"></div>  
    <div class="container"  >
<div class="content">
     <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                   <CENTER> <h3 class="panel-title">Share Your Job Here  </h3>   </CENTER>         
                    
                    
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                    
                       <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2 "></div>   
  
  <div class="col-md-8 ">
<!--  <form action="register/alumni_reg" method="post">-->

    </div>
        </div>
        </div>
     <div class="col-md-2">    </div>   
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
