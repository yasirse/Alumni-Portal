

<div class="col-md-9">
<?php 

echo form_open('addwebaddress'); ?>


     
     <div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Profile Addresses</h3></CENTER></div>
<div class="panel-body">




<div class="col-md-12" style="margin-bottom:20px;border: 1px solid rgb(220, 225, 227); border-radius:3px;    background-color: #ddd;;">
<div class="form-group">
<label for="name">Website Name:</label>  <?php echo form_error('name'); ?><br />
  
    
  <input type="text" class="form-control"  name="name" <?php if($name!=''){echo 'value="'.$name.'"';}else{ echo 'placeholder="E.g LinkedIn "';} ?> >
</div>


<div class="form-group">
<label for="name">Address:</label>  <?php echo form_error('address'); ?><br />
<input type="text" class="form-control"  name="address" <?php if($address!=''){echo 'value="'.$address.'"';}else{ echo 'placeholder="Enter profile website address"';} ?> >
</div></div>



<div class="col-md-12" >
<div class="form-group">
  <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Add</button>  
   <button id="cancel" value="cancel" type="submit" class="btn btn-default" onClick="location.href='<?php echo site_url('user')?>'" style="width:100px">Cancel</button>
</div></div>

</div></div>


</div>
</div>

<?php echo form_close(); ?>    


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
</div> <!--container div-->
</div></div>