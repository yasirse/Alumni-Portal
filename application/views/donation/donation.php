<div class="col-md-9">
<?php echo form_open_multipart('donation'); ?>
<?php if (isset($success_msg))
 { 
  echo $success_msg;
 } 
 else{
	
	
	 ?>
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Donate to help others</h3></CENTER></div>
<div class="panel-body">
Donations will be joyfully accepted and designated towards scholarships and research work. If you would like to make a financial donation, please use the account details given below.
<p>For any query email us at alumni@nu.edu.pk </p>
<table class="table table-bordered">
    
     
   
    <tbody>
      <tr>
      <th scope="row">Account Title:</th>
        <td>FAST General Donation account</td>
        
      </tr>
      <tr>
      <th scope="row">Account No:</th>
        <td>50060006554501</td>
        
      </tr>
      <tr>
      <th scope="row">Swift Code:</th>
        <td>JFHFU</td>
        
      </tr>
      <tr>
      <th scope="row">Branch Code:</th>
        <td>5006</td>
        
      </tr>
      <tr>
      <th scope="row">Branch Name & Address:</th>
        <td>Al-Falah Bank Limited, G-9 markaz Branch,  Islamabad</td>
        
      </tr>
    </tbody>
  </table>
<p>Please provide us your detail if you have donated to FAST NU. </p>  <!--  <form action="register/alumni_reg" method="post">-->

 <div class="col-md-6"  >  
<div class="form-group">
<label for="name">Your Name:<?php echo form_error('name'); ?></label>  

  <input type="text" class="form-control"  name="name"<?php  if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="Enter Full Name"';} ?>  required >

</div>
<div class="form-group">
<label for="name">Amount(Rupees):<?php echo form_error('amount'); ?></label>  

  <input type="text" class="form-control"  name="amount" <?php  if($amount!=''){echo 'value="'.$amount.'"';}else{ echo 'placeholder="Enter the amount donated"';} ?> required >

</div>
<div class="form-group">
<label for="name">Cell No:<?php echo form_error('cellno'); ?></label>  

  <input type="text" class="form-control"  name="cellno" <?php  if($cellno!=''){echo 'value="'.$cellno.'"';}else{ echo 'placeholder="Enter your cellno."';} ?>   >

</div>

<div class="form-group">
<label for="name">Email:<?php echo form_error('email'); ?></label>  

  <input type="text" class="form-control"  name="email" <?php 
   if($email!=''){echo 'value="'.$email.'"';}else{ echo 'placeholder="Enter your email address"';} ?>   required >

</div>
</div><div class="col-md-6"></div>

<div class="col-md-12">

       <div class="form-group"> 
   <label for="name">Your detail:<?php echo form_error('sbdetail'); ?></label>  
   <textarea class="form-control" name="sldetail" rows="7" required  <?php if($sldetail==''){echo 'placeholder="Your brief detail"';}?>   ><?php if($sldetail!=''){echo $sldetail;} ?></textarea></div>
   </div>
    
<div class="col-md-12">  
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Submit</button>  
  <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo base_url('user');?>'" style="width:100px">Cancel</button>
</div>
</div>

</div>
</div>

<?php } ?>
<?php echo form_close(); ?>




<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<div class="bosluk"></div> 
<div class="col-md-12 text-center" ></div>  
</div>  <!--  end of job list view-->

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