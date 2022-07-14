<div class="col-md-9">

<div class="col-md-11 " align="left"><strong>Basic Profile </strong></div><div class="col-md-1 " align="left"></div>

<div class="col-md-12 " style="margin-bottom:20px;border: 1px solid rgb(220, 225, 227); border-radius:3px;    background-color: rgb(250, 250, 250);"><br />

<?php
if(isset($basic_list))
{if(!empty($basic_list)){
	$count=1;
	foreach($basic_list as $row2)
	{			

?>
<div class="col-md-6">
<div class="col-md-12" style="padding-top:10px"><strong>Name: </strong><?php echo ucfirst($row2->name);?> </div>
<div class="col-md-12 " style="padding-top:20px"><strong>Rollno: </strong><?php echo $row2->rollno;?> </div>
<div class="col-md-12 " style="padding-top:20px"><strong>Email : </strong><?php echo $row2->email;?> </div>
<div class="col-md-12 " style="padding-top:20px"><strong>Department : </strong><?php echo ucfirst($row2->department);?> </div>
<div class="col-md-12 " style="padding-top:20px"><strong>Campus : </strong><?php echo ucfirst($row2->campus);?> </div>

<?php }?>

</div><div class="col-md-2" ></div>
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
<img style="padding:20px" height="200px" width="160px" src="<?php if($row2->photo!=''){$path=$row2->photo;}else{$path='no-image.png';} echo base_url().'uploads/alumni/'.$path;?>" alt="Photo is not availabe"></div>
      
  
       </div>
       <div class="col-md-12 " style="padding-top:20px"></div>
<?php }
}?>


</div>
<!-----------------------------------------------------------start of profile address----------------------------------------------------->



<?php
if(isset($list))
{if(!empty($list)){?>
<div class="col-md-10 " align="left"><strong>Profile Address</strong></div><div class="col-md-1 " align="left"></div><div class="col-md-1 " align="left"></div>
	<div class="col-md-12 " style="margin-bottom:10px;border: 1px solid rgb(220, 225, 227); border-radius:3px;    background-color: rgb(250, 250, 250);"><br />
<?php	$count=1;
	foreach($list as $row1)
	{			

?>

<div class="col-md-10 " style="padding-top:10px;padding-bottom:10px"><strong><?php echo ucfirst($row1->web_name).' Profile';?>:   </strong> <a href="<?php echo $row1->address;?>" target="_blank"><?php echo $row1->address;?></a></div><div class="col-md-2 " align="center" style="padding-top:10px;;padding-bottom:10px"></div>

<?php }?>
</div>
<?php }
}?>



<script type="text/javascript">
<!--
 
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
 
});
//-->
</script>

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