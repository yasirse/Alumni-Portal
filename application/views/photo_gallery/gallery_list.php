<div class="col-md-9">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
   <?php if(isset($photo_list)){if(!empty($photo_list)){$count1=0;?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="border:3px solid #ddd;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php foreach($photo_list as $photo_row){if($count1==0){?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $count1;$count1++;?>" class="active"></li><?php }else{?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $count1;$count1++;?>"></li>
    <?php }}?>
  </ol>
<style type="text/css" media="screen">
a:link { color:#FF3  }
.content a {
    text-decoration: none;
    /*color:#fff;*/
	color:#3e88da;
    font-weight: bold;
}
.carousel-control {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 15%;
    font-size: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0,0,0,.6);
    background-color: rgba(0,0,0,0);
    filter: alpha(opacity=50);
    opacity: .5;
}
a {
   /* color: #337ab7;*/
   color:#3e88da;
    text-decoration: none;
}


</style>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php $count2=0; foreach($photo_list as $photo_row){if($count2==0){?>
    <div class="item active">
      <img src="<?php echo base_url().'uploads/gallery/'.$photo_row->name;?>" alt="Chania" title="<?php echo $photo_row->title;  ?>" width="775px" height="400px">
       <div class="slide-text"><p class="slide-baslik"><?php echo $photo_row->title;  ?> </p></div>
    </div>
    <?php }else{?>

    <div class="item">
      <img src="<?php echo base_url().'uploads/gallery/'.$photo_row->name;?>" alt="Chania" width="775px" height="540px">
      <div class="slide-text"><p class="slide-baslik"><?php echo $photo_row->title;  ?></p></div>
    </div>
    
    <?php }$count2++;}?>
    
    <div class="item">
      <iframe width="200" height="200" src="https://www.youtube.com/embed/JNwbMxOJXbY" frameborder="0" allowfullscreen></iframe>
      <div class="slide-text"><p class="slide-baslik"><?php echo $photo_row->title;  ?></p></div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a   class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a  class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>



<?php }else{?>
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
      <CENTER> <h3 class="panel-title">No Photo found</h3></CENTER></div>
</div>
</div>
<?php }}?>

<div class="bosluk"></div> 
<div class="col-md-12 text-center" ><?php // if(!empty($views_list)){echo $pagination;}?></div>  
</div>  <!--  end of job list view-->

</div>
</div>
</div><!--panel body-->
</div><!--panel-collapse-->
</div>


<div class="bosluk"></div>
</div> <!--content div-->
</div> <!--container div-->