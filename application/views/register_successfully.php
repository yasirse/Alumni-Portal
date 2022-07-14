<?php $this->load->view('header'); ?>
<body>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <div class="container" >
      <div class="row-fluid" >
 
 <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding">
  <div class="col-md-2">    </div>   
  <div class="col-md-8">
   <div class="content">
   
   <div id="accordion" class="panel-group"> 
   <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Alumni Registeration  </h3>            
                    
                    
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">

<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Congratulation</h2> <h3 style="color:green;">Your login information are sent to your email. Now you can post jobs, scholarships, news and connect with other alumni of FAST-NU </h3></CENTER><br>
<?php } ?>
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