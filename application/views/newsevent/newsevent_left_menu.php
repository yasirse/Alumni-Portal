<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!--date picker-->
<script src="<?php echo base_url();?>common/js/date-picker.js"></script>
<!--date picker-->
      <body>
      <div class="bosluk"></div>
      <div class="container" >
      <div class="content">
      <div id="accordion" class="panel-group"> 
      <div class="panel panel-default">
      
      <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      <div class="icerik col-lg-12 col-md-9 col-sm-9 col-xs-12 nopadding"> 
      
      <div class="col-md-3"> <?php echo form_open('searchnewsevent'); ?>
      <div class="panel panel-default">
      <div class="panel-heading">
      <CENTER> <h3 class="panel-title">Search Newsevent</h3></CENTER></div><div class="panel-body">
      
      <div class="form-group">
        <label for="name">NewsEvents Title:</label>  
        <input type="text" class="form-control"  name="netitle" <?php if($event_title!=''){echo 'value="'.$event_title.'"';}else{ echo 'placeholder="Enter the newsevent title"';} ?>   >
      </div>
      <div class="form-group">
    <label for="cnic">Campus:</label>
    <div  class="dropdiv" >    
    <select name="campus" id="drop_box_width" >
      <option value="" style="width:200px;">Select</option>
         <?php  if(isset($campus_list))
      {
          foreach($campus_list as $row_campus){?>      
        <option <?php if($row_campus->campus_id==$campus_id){ echo 'value="'.$campus_id.'"'; echo ' selected="selected"';}else{echo 'value="'.$row_campus->campus_id.'"';} ?> ><?php echo ucfirst($row_campus->name); ?></option>
        <?php }}?>
    </select>
     </div> </div>
     
     <div class="form-group">
        <label for="ldate">Event Date</label>
        <div class="date" style="width:220px;">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="nelastdate"  />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>   
      
      
      <div class="form-group text-center"> 
      <button id="submit" value="Submit" type="submit" class="btn btn-default" style="width:100px">Search</button>
      </div> 
      
      </div></div>
      <?php echo form_close(); ?>
      </div> <!--  end of left side-->