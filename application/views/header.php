 <?php   
    $user_name= $this->session->userdata('user_name'); 
    $user_role= $this->session->userdata('role');
   
   ?>
<!DOCTYPE html>
<html lang="en">
 
<head><title>
	FAST - National University, Islamabad campus.
</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="http://isb.nu.edu.pk/nusite/images/ohcd/favicon.ico" />

 

<!--Jquery-->
<script src="<?php echo base_url();?>common/js/jquery-1.8.3.min.js"></script>
<!--Jquery-->

<!--Bootstrap-->
<link href="<?php echo base_url();?>common/3rd-party/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- Bootstrap-->


 <!--Custom style sheet-->
<link href="<?php echo base_url();?>common/css/alumni.css" rel="stylesheet">
 <!--Custom style sheet-->
<!--Stil-->
<link href="<?php echo base_url();?>common/css/style.css" rel="stylesheet">
<!--Stil-->

<!--Royal Slider-->
<link href="<?php echo base_url();?>common/3rd-party/royalslider/royalslider.css" rel="stylesheet" />
<script src="<?php echo base_url();?>common/3rd-party/royalslider/jquery.royalslider.min.js"></script>
<link href="<?php echo base_url();?>common/3rd-party/royalslider/default-inverted/rs-default-inverted.css" rel="stylesheet" />
<link href="<?php echo base_url();?>common/3rd-party/royalslider/default/rs-default.css" rel="stylesheet" />
<!--Royal Slider-->

<!--fancy-box-->
<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/fancybox/source/jquery.fancybox63b9.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>common/3rd-party/fancybox/source/jquery.fancybox63b9.css?v=2.1.4" media="screen" />

 
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
<!--Fancybox>


 

<!--Font Awesome-->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<script src="<?php echo base_url();?>common/js/bootstrap.min.js"></script>
<!--Font Awesome-->

<!--Tabs-->
<script src="<?php echo base_url();?>common/3rd-party/tabs/jquery.hashchange.html" type="text/javascript"></script>
<script src="<?php echo base_url();?>common/3rd-party/tabs/jquery.easytabs.js" type="text/javascript"></script>
  <script type="text/javascript">
  	$(document).ready(function (){
  		$('#tab-container, #iltab-container').easytabs({
  			animate: true,
  			animationSpeed: 500,
  			panelActiveClass: "active-content-div",
  			tabActiveClass: "selected-tab",
  			tabs: "> ul > li",
  			updateHash: false,
  			cycle: 6000
  		});
  	});
  </script>
<!--Tabs-->

<!--Tiny-scrollbar-->
<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/tiny-scrollbar/js/jquery.tinyscrollbar.min.js"></script>
 <script type="text/javascript">
	$(document).ready(function () {
		$('#scrollbar1').tinyscrollbar();
	});
</script>
<!--Tiny-scrollbar-->	

<!--Mega Menu-->
<link rel="stylesheet" href="<?php echo base_url();?>common/3rd-party/mega-menu/css/megamenu.css"><!-- Mega Menu Stylesheet -->
<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/mega-menu/js/megamenu_plugins.js"></script><!-- Mega Menu Plugins -->

<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/mega-menu/js/megamenu.js"></script><!-- Mega Menu Script -->
<script>
	$(document).ready(function ($) {
		$('.megamenu').megaMenuCompleteSet({
			menu_speed_show: 50, // Time (in milliseconds) to show a drop down
			menu_speed_hide: 200, // Time (in milliseconds) to hide a drop down
			menu_speed_delay: 50, // Time (in milliseconds) before showing a drop down
			menu_effect: 'hover_fade', // Drop down effect, choose between 'hover_fade', 'hover_slide', etc.
			menu_click_outside: 1, // Clicks outside the drop down close it (1 = true, 0 = false)
			menu_show_onload: 0, // Drop down to show on page load (type the number of the drop down, 0 for none)
			menu_responsive: 1 // 1 = Responsive, 0 = Not responsive
		});
	});
</script>
<!--Mega Menu-->

<!--Uniform-->
<script src="<?php echo base_url();?>common/3rd-party/uniform/jquery.uniform.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>common/3rd-party/uniform/themes/default/css/uniform.default.css" media="screen" />
<script type='text/javascript'>
	$(function () {
		$("select, .uni, textarea").uniform();
	});
</script>
<!--Uniform-->

<!--News-Ticker-->
<script src="<?php echo base_url();?>common/3rd-party/jquery_news_ticker/includes/jquery.ticker.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>common/3rd-party/jquery_news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(function () {
		$('#js-news').ticker();
	});
</script>
<!--News-Ticker-->

<!--Dil Mens-->
<script>
	$(document).ready(function () {
		var menu = $('.dilmenu')
		var timeout = 0;
		var hovering = false;
		menu.hide();

		$('#mainbutton')
        .on("mouseenter", function () {
        	hovering = true;
        	// Open the menu
        	$('.dilmenu')
            .stop(true, true)
            .slideDown(400);

        	if (timeout > 0) {
        		clearTimeout(timeout);
        	}
        })
        .on("mouseleave", function () {
        	resetHover();
        });

		$(".dilmenu")
        .on("mouseenter", function () {
        	// reset flag
        	hovering = true;
        	// reset timeout
        	startTimeout();
        })
        .on("mouseleave", function () {
        	// The timeout is needed incase you go back to the main menu
        	resetHover();
        });

		function startTimeout() {
			// This method gives you 1 second to get your mouse to the sub-menu
			timeout = setTimeout(function () {
				closeMenu();
			}, 1000);
		};

		function closeMenu() {
			// Only close if not hovering
			if (!hovering) {
				$('.dilmenu').stop(true, true).slideUp(400);
			}
		};

		function resetHover() {
			// Allow the menu to close if the flag isn't set by another event
			hovering = false;
			// Set the timeout
			startTimeout();
		};
	});
</script>

<!--Dil Mens-->

<!--Youtv-->
<link href="<?php echo base_url();?>common/3rd-party/youtv/ytv.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>common/3rd-party/youtv/ytv.js"></script>

<!--Youtv--></head>


<body>
<!-- Google Tag Manager -->
<noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-M67F9C"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>	(function (w, d, s, l, i) {
		w[l] = w[l] || []; w[l].push({ 'gtm.start':
new Date().getTime(), event: 'gtm.js'
		}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'../../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-M67F9C');</script>
<!-- End Google Tag Manager -->


<header class="header-wrapper">
	<div class="container">
    	<div class="row-fluid">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 nopadding">
             <div class="col-md-6 col-sm-12 col-xs-12 nopadding" >
				<a href="<?php echo site_url('user')?>"><img class="logo" src="<?php echo base_url(); ?>images/alumni_logo.png"  alt=""/> </a>
                </div><!--search box-->
                <!--search box-->
            </div><!--col-lg-6-->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding aramobil">
              <div class="login arama-alani  col-md-4 col-sm-3 col-xs-3 nopadding" > 
                  
              </div> 
              
               <div class="login arama-alani  col-md-5 col-sm-3 col-xs-3 nopadding" > 
                  <?php  if(isset($user_name)!='')
				{
					echo'<a href="'.site_url('user').'">'.ucwords(strtolower($user_name)).'</a>';
				}
				else
				{
				 ?>
                  <a href="<?php echo site_url('login');?>" >Login</a>  <!--Sign In--> 
               <?php }?>
                 
              </div> 
               <div class="login arama-alani  col-md-3 col-sm-3 col-xs-3 nopadding"  > 
                     <?php  if($user_name!='')
				{ ?>
                <a class="login" href="<?php echo site_url('logout');?>" >Sign Out</a>
				<?php }
				else
				{
				 ?>
                 <a class=" " href="<?php echo site_url('register');?>" >Register </a>  <!--Join Now-->
				 <?php }?>
              </div>
            </div><!--col-lg-6-->
        </div>        
        
        <!--row-fluid-->
    </div><!--container-->
</header><!--header-wrapper-->
		
<div class="menu-wrapper">
	<div class="container">
		<div class="testmenu nopadding">
        	<div class="megamenu_container megamenu_dark_bar megamenu_light">
        		<ul class="megamenu"><!-- Begin Mega Menu -->
            		<li class="megamenu_button"><a href="#_">More...</a></li>
					<!--End Item -->

 <li class="menuitem2"><a href=""   class="megamenu_drop">Alumni</a>
 <div class="dropdown_fullwidth">
 <div class="col_2_5">
 <h3><a href="<?php echo site_url('alumnilist/2');?>">Islamabad </a></h3> 


 </div>
 <div class="col_2_5">
 <h3><a href="<?php echo site_url('alumnilist/3');?>">Lahore </a></h3> 

 </div>
 <div class="col_2_5">
 <h3><a href="<?php echo site_url('alumnilist/4');?>">Karachi </a></h3> 
 
 </div>
 <div class="col_2_5">
 <h3><a href="<?php echo site_url('alumnilist/5');?>">Peshahwar </a></h3> 
 
 </div>
 <div class="col_2_5">
 <h3><a href="<?php echo site_url('alumnilist/6');?>">Chinniot-Faisalabad </a></h3> 

 </div>
 </div>
 </li>
<li class="menuitem4"><a  class="megamenu_drop">Sponarship</a>                    
    <div class="dropdown_fullwidth dropdown_container">  
     
       <div class="col_2_5">
            <h3><a href="">Agha Hasan Abedi</a></h3> 
           <p><a href="">The government of Pakistan has announced to bestow the Sitara-e-Imtiaz on Agha Hasan Abedi. He was patron of FAST, founder CEO of United Bank (the third largest bank in the country), and Bank of Credit and Commerce International (BCCI), the only global bank to have been founded in Pakistan.</a></p>
            <a href=""><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="">Agha Hasan Abedi</a></h3> 
           <p><a href="">The government of Pakistan has announced to bestow the Sitara-e-Imtiaz on Agha Hasan Abedi. He was patron of FAST, founder CEO of United Bank (the third largest bank in the country), and Bank of Credit and Commerce International (BCCI), the only global bank to have been founded in Pakistan.</a></p>
            <a href=""><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="">Agha Hasan Abedi</a></h3> 
           <p><a href="">The government of Pakistan has announced to bestow the Sitara-e-Imtiaz on Agha Hasan Abedi. He was patron of FAST, founder CEO of United Bank (the third largest bank in the country), and Bank of Credit and Commerce International (BCCI), the only global bank to have been founded in Pakistan.</a></p>
            <a href=""><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="">Agha Hasan Abedi</a></h3> 
           <p><a href="">The government of Pakistan has announced to bestow the Sitara-e-Imtiaz on Agha Hasan Abedi. He was patron of FAST, founder CEO of United Bank (the third largest bank in the country), and Bank of Credit and Commerce International (BCCI), the only global bank to have been founded in Pakistan.</a></p>
            <a href=""><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="">Agha Hasan Abedi</a></h3> 
           <p><a href="">The government of Pakistan has announced to bestow the Sitara-e-Imtiaz on Agha Hasan Abedi. He was patron of FAST, founder CEO of United Bank (the third largest bank in the country), and Bank of Credit and Commerce International (BCCI), the only global bank to have been founded in Pakistan.</a></p>
            <a href=""><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
    
       
    </div><!-- End Item container -->
	</li>

	<li class="menuitem6"><a href="<?php echo site_url('joblist/1');?>" class="megamenu_drop">JOBS</a>
    <div class="dropdown_fullwidth">
    <?php 
	if(isset($job))
	{
		foreach($job as $job_row){?>			
     <div class="col_2_5 job-span">
    <h3 style="margin-bottom:7px;"><a href="<?php echo site_url('jobdetail/'.$job_row->job_id);?>" style="color: #3E88DA;"><?php echo ucwords($job_row->title);?></a></h3> 
    <span data-toggle="tooltip" data-original-title="Company" ><?php echo $job_row->company;?></span>    <span data-toggle="tooltip" data-original-title="Experience" ><?php echo $job_row->experience;?></span>    
    <p style="margin-top:5px;color: #3E88DA;"><a href="<?php echo site_url('jobdetail/'.$job_row->job_id);?>"><?php 
	$string = strip_tags($job_row->short_detail);

if (strlen($string) > 115) {
	    // truncate string
    $stringCut = substr($string, 0, 115);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;
	
	
	?> ...</a>  <a href="<?php echo site_url('jobdetail/'.$job_row->job_id);?>" style="color: #3E88DA;">more</a></p>
   
        </div> 
   <?php }}?>       
                            
    </div><!--dropdown_fullwidth-->   
</li><!-- End Item -->



	<!-- End Itembusiness.name as business,
		company.name as company,
		experience.name as experience,
		department.name as department,<span title="" data-toggle="tooltip" data-original-title="Posted On">
                                            <i class="calendar rz-calendar"></i>Nov 01, 2016
                                        </span> -->
<li class="menuitem5"><a href="<?php echo site_url('scholarshiplist');?>" class="megamenu_drop">SCHOLARSHIPS</a><!-- Begin Item -->
    <div class="dropdown_fullwidth"><!-- Begin Item Container -->
     <?php if(isset($scholarship)){   foreach($scholarship as $scholarship_row){?>
       <div class="col_2_5">
            <h3 style="margin-bottom:7px;"><a href="<?php echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id);?>" style="color: #3E88DA;"><?php echo ucwords($scholarship_row->title);?></a></h3> 
           
            <p><a href="<?php echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id);?>"><?php 
			$string = strip_tags($scholarship_row->short_detail);

if (strlen($string) > 115) {
	    // truncate string
    $stringCut = substr($string, 0, 115);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;
			
			
			?></a>...<a href="<?php echo site_url('scholarshipdetail/'.$scholarship_row->scholarship_id);?>" style="color: #3E88DA;">more</a></p>
            
        </div>
    <?php }}?>        
    </div><!-- End Item Container -->
</li><!-- End Item -->

            <li class="menuitem3"><a href="<?php echo site_url('storylist');?>" class="megamenu_drop" >SUCCESS STORIES</a>
           <div class="dropdown_fullwidth" style="padding-bottom:20px;"> 
           <?php if(isset($story)){ foreach($story as $story_row){?>
             <div class="col_2_5">
           <a class="" href="<?php echo site_url('storydetail/'.$story_row->story_id);?>"></a> 
            <h3 style="margin-bottom:7px;"><a  href="<?php echo site_url('storydetail/'.$story_row->story_id);?>" style="color: #3E88DA;"><?php echo ucwords($story_row->name);?></a></h3> 
            <p ><a class="" href="<?php echo site_url('storydetail/'.$story_row->story_id);?>"><img src="<?php echo base_url().'uploads/stories/'.$story_row->photo_path;?>" width="70" height="70"  align="left" alt="" style="margin-right:5px;margin-top:3px;margin-bottom:0px;border-radius: 4px;" alt=""/><?php 
			$string = strip_tags($story_row->short_detail);

if (strlen($string) > 160) {
	    // truncate string
    $stringCut = substr($string, 0, 160);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;
			
			
			?></a>...
            
            <a class="" href="<?php echo site_url('storydetail/'.$story_row->story_id);?>" style="color: #3E88DA;">more</a>
            </p>
            
        </div><?php }}?>
       
        </div></li>
                    
					
                    
   <li class="menuitem7"><a href="<?php echo site_url('companylist');?>" class="megamenu_drop">STARTUPS</a>
    <div class="dropdown_fullwidth" style="padding-bottom:20px;">
      <?php if(isset($company)){  foreach($company as $company_row){?>   
    <div class="col_2_5" >
           <a  <?php if($company_row->weblink!=''){echo  'href="'.site_url($company_row->weblink).'"'; echo ' target="_blank"';}else{echo 'href="'.site_url('companydetail/'.$company_row->comp_reg_id).'"';}?>></a> 
            <h3 style="margin-bottom:7px;"><a <?php if($company_row->weblink!=''){echo  'href="'.site_url($company_row->weblink).'"'; echo ' target="_blank"';}else{echo 'href="'.site_url('companydetail/'.$company_row->comp_reg_id).'"';}?> style="color: #3E88DA;"><?php echo $company_row->name;?></a></h3> 
            
            <p><a <?php if($company_row->weblink!=''){echo  'href="'.site_url($company_row->weblink).'"'; echo ' target="_blank"';}else{echo 'href="'.site_url('companydetail/'.$company_row->comp_reg_id).'"';}?>><img src="<?php echo base_url().'uploads/company/'.$company_row->photo_path;?>" width="70" height="70"  align="left" alt="" style="margin-right:5px;margin-top:3px;margin-bottom:0px;border-radius: 4px;"/><?php  
$string = strip_tags($company_row->short_detail);

if (strlen($string) > 160) {
	    // truncate string
    $stringCut = substr($string, 0, 160);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;			
			
			
			
			?></a>...
            <a <?php if($company_row->weblink!=''){echo  'href="'.site_url($company_row->weblink).'"'; echo ' target="_blank"';}else{echo 'href="'.site_url('companydetail/'.$company_row->comp_reg_id).'"';}?> style="color: #3E88DA;">more</a></p>
            
        </div>
        <?php }}?>       
		
    </div>
</li>

<li class="menuitem1">
    <a href="#_" class="megamenu_drop">Social</a>
    <div class="dropdown_fullwidth">
    <div class="col_2_5">
            <h3><a href="<?php echo site_url('viewslist');?>">Views and Reviews</a></h3>       
    </div> 
    <div class="col_2_5">
            <h3><a href="<?php echo site_url('suggestion');?>">Suggestions</a></h3> 
    </div>
    <div class="col_2_5">
            <h3><a href="<?php echo site_url('group');?>">Groups</a></h3> 
    </div> 
    <div class="col_2_5">
    <h3><a href="<?php echo site_url('donation');?>">Donation</a></h3> 
    </div> 
    <div class="col_2_5">
    <h3><a href="<?php echo site_url('gallery');?>">Photo Gallery</a></h3> 
    </div> 
    
    
    
             </div><!--dropdown_fullwidth-->    
   <!--Container -->
</li>
			</ul><!--Mega Menu -->
    		</div><!-- Mega Menu Container -->
		</div><!--Testmenu-->
	</div><!--Container -->
</div><!--Menu Wrapper -------------------------------------------------------------------------------------------------------------------------------------->
        



<div class="bar-wrapper">
	<div class="container">
        <div class="row-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 nopadding"></div><!--col-lg-6-->
            <div class="nav-buttons col-lg-6 col-md-6 col-sm-6 col-xs-4 nopadding">
                <div class="sag">
			<div id="slider-prev-SpotLight" class="slider-prev slide-sol"></div>
            <div id="slider-next-SpotLight" class="slider-prev slide-sag"></div>
                </div>
            </div><!--nav-buttons-->
		</div><!--row-fluid-->
	</div><!--container-->
</div><!--bar-wrapper-->
     
        
	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>  
	  
   
            	 