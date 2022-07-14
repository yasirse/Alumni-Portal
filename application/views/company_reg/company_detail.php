<div class="col-md-9">
<div class="panel panel-default"><div class="panel-heading">
      <CENTER> <h3 class="panel-title">Company Detail</h3></CENTER></div>
<div class="panel-body">
<?php if(isset($company_detail)){ foreach($company_detail as $company_row){?>

 
 <div class="col-md-4">
 <h3 class="panel-title">Company Name:</h3><?php echo ucwords($company_row->name);?>
 <h3 class="panel-title">Business Type:</h3>
 <?php echo ucwords($company_row->business);?>
 <h3 class="panel-title">Contact:</h3>
  <?php echo $company_row->address;?>    
 </div>
 <div class="col-md-4"></div>
 <div class="col-md-4" > 
<div style="width: 160px;
height: 200px;
-webkit-border-radius: 20px 17px 20px 20px;
-moz-border-radius: 20px 17px 20px 20px;
border-radius: 20px 17px 20px 20px;
background: rgba(215, 228, 234, 0.3);
-webkit-box-shadow: #B3B3B3 4px 4px 4px;
-moz-box-shadow: #B3B3B3 4px 4px 4px;
box-shadow: #4487B3 4px 4px 4px;
color: #0B0D99;">
<img style="padding:20px" height="200px" width="160px" src="<?php 
	
	 	 if($company_row->photo_path!="")
	  {
		echo base_url();
	  	echo 'uploads/company/'.$company_row->photo_path;
	  }
	  
	  ?>" alt="Photo is not availabe"></div>
      
  
       </div>

 <div class="col-md-12"><h3 class="panel-title">Detail:</h3><p><?php echo $company_row->long_detail;?></p></div>

<?php }}?>  

</div>
</div> <!--end of detail panel -->
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->