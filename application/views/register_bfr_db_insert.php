<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <div class="container" >
      <div class="row-fluid" >
 
 <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2">    </div>   
  <div class="col-md-8">
   <div class="content">
   <div class="bs-example"> 
   <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Alumni Registeration  </h3>            
                    
                    
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
            <form action="" method="get">
                                       <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Full Name" required>
    </div>
    <div class="form-group">
      <label for="rollno">Roll No:(e.g 07-0385)</label>
      <input type="text" class="form-control" id="rollno" placeholder="Enter Roll No." required  pattern="\d{2}-\d{1,6}" oninvalid="this.setCustomValidity('Enter Roll No. like this 07-0385)')" 
onchange="this.setCustomValidity('')">
    </div>
    <div class="form-group">
      <label for="email">Personel Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
    </div>
    <div class="form-group">
      <label for="cnic">CNIC:(e.g 32201-2116507-5)</label>
      <input type="text" class="form-control" id="cnic" placeholder="Enter CNIC" required pattern="\d{5}-\d{7}-\d{1}" oninvalid="this.setCustomValidity('Enter CNIC like this 32201-2116507-5')" 
onchange="this.setCustomValidity('')">
      
    </div>
 

<div class="form-group">

        <label for="cnic">Campus</label>
       <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" >Select Campus
  <span class="caret"></span></button>
  <ul class="dropdown-menu" >
    <li><a href="#">Faisalabad</a></li>
    <li><a href="#">Islamabad</a></li>
    <li><a href="#">Karachi</a></li>
     <li><a href="#">Lahore</a></li>
      <li><a href="#">Peshahwar</a></li>
  </ul>
</div>
    </div>
  

<div class="form-group">
        <label for="cnic">DOB</label>
        <div class="date">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="date" required />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    
  

<div class="form-group">   
    <button type="submit" class="btn btn-default">Register</button>
    </div>
  </form>
                    </div>
                  </div>
                </div>
        </div>        
        </div>
        </div>  
        </div>  
          
      </div>
      <!--row-fluid--> 
    </div>
    <!--container--> 
    
    
    
  <div class="bosluk"></div>
  <!--bosluk--> 
  </div>  
   <div class="col-md-2">    </div> 


  <script  type="text/javascript">
$(document).ready(function() {
    $('#dateRangePicker')
        .datepicker({
            format: 'mm/dd/yyyy',
            startDate: '01/01/2010',
            endDate: '12/30/2020'
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
                        min: '01/01/2010',
                        max: '12/30/2020',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
  

