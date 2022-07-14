<div class="col-md-9">
<?php if(isset($alumni_list)){if(!empty($alumni_list)){ foreach($alumni_list as $row){?>

<div class="col-md-12 Generic_txt listdiv " >
<img src="<?php if($row->photo!=''){$path=$row->photo;}else{$path='no-image.png';} echo base_url().'uploads/alumni/'.$path;?>" alt="Picture Not Found" width="70px" height="70px" align="left" style="padding-right:5px;padding-bottom:5px;border-radius: 8px;" >

<style>
span{margin-right:20px;margin-left:10px;}
</style>
<div class="col-md-10" style="padding-top:10px;">

<span ><strong>Name:</strong><?php echo ' '.$row->name;?> </span>
<span><strong>Rollno:</strong><?php echo ' '.$row->rollno;?> </span>
<span><strong>Email:</strong><?php echo ' '.$row->email;?> </span>
<br />
<span><strong>Department:</strong><?php echo ' '.$row->department;?> </span>
<span><strong>Campus:</strong><?php echo ' '.$row->campus;?> </span>
</div>
<!--#ddd; #00548f  fff-->

</div>
<div class="col-md-12" style="margin-bottom:10px;text-align:center;background-repeat:repeat-x; background-image:url(<?php echo base_url();?>images/bottom.png); background-position:bottom;"><a href="<?php echo site_url('alumnidetail/'.$row->user_id);?>" style="color:00548f;font-size: 12px;
    font-family: Arial, Helvetica, sans-serif;">View Profile</a></div>
<?php } ?>


<?php }else{?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
      <CENTER> <h3 class="panel-title">No record found</h3></CENTER></div>
</div>
</div>
<?php }}?>

<div class="bosluk"></div> 
<div class="col-md-12 text-center" ><?php if(!empty($alumni_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->
 <?php echo form_close(); ?>
</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->