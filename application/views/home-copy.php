 <?php   
	    $user_name= $this->session->userdata('user_name'); 
	    $user_role= $this->session->userdata('role');
	   
   ?>
<!DOCTYPE html>
<html lang="en">
 
<head><title>
	FAST - National University, Islamabad Campus.
</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="http://isb.nu.edu.pk/nusite/images/ohcd/favicon.ico" />

 

<!--Jquery-->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/js/jquery-1.8.3.min.js"></script>
<!--Jquery-->

<!--Bootstrap-->
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/bootstrap/css/bootstrap.css">
<!-- Bootstrap-->

<!--Stil-->
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/css/style.css">
<!--Stil-->

<!--Royal Slider-->
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/royalslider/royalslider.css">
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/royalslider/jquery.royalslider.min.js"></script>
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/royalslider/default-inverted/rs-default-inverted.css">
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/royalslider/default/rs-default.css">
<!--Royal Slider-->

<!--fancy-box-->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/fancybox/source/jquery.fancybox63b9.js?v=2.1.4"></script>
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/fancybox/source/jquery.fancybox63b9.css?v=2.1.4">
 
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
<!--Fancybox>


 

<!--Font Awesome-->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!--Font Awesome-->

<!--Tabs-->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/tabs/jquery.hashchange.html"></script>
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/tabs/jquery.easytabs.js"></script>
 <script type="text/javascript">
  	$(document).ready(function () {
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
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/tiny-scrollbar/js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#scrollbar1').tinyscrollbar();
	});
</script>
<!--Tiny-scrollbar-->	

<!--Mega Menu-->
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/mega-menu/css/megamenu.css"><!-- Mega Menu Stylesheet -->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/mega-menu/js/megamenu_plugins.js"></script><!-- Mega Menu Plugins -->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/mega-menu/js/megamenu.js"></script><!-- Mega Menu Script -->

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
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/uniform/jquery.uniform.js"></script>
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/uniform/themes/default/css/uniform.default.css">


<script type='text/javascript'>
	$(function () {
		$("select, .uni, textarea").uniform();
	});
</script>
<!--Uniform-->

<!--News-Ticker-->
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/jquery_news_ticker/includes/jquery.ticker.js"></script>
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/jquery_news_ticker/styles/ticker-style.css">

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
<link rel = "stylesheet" type = "text/css"    href = "<?php echo base_url(); ?>common/3rd-party/youtv/ytv.css">
<script type = 'text/javascript' src = "<?php echo base_url();?>common/3rd-party/youtv/ytv.js"></script>
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

    <form method="post" action="search.php" id="form1">	
<header class="header-wrapper">
	<div class="container">
    	<div class="row-fluid">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 nopadding">
             <div class="col-md-6 col-sm-12 col-xs-12 nopadding" >
				<a href="<?php echo base_url();?>index.php"><img class="logo" src="<?php echo base_url(); ?>images/alumni_logo.png"  alt=""/> </a>
                </div><!--search box-->
                <!--search box-->
            </div><!--col-lg-6-->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding aramobil">
              <div class="login arama-alani  col-md-4 col-sm-3 col-xs-3 nopadding" > 
                  
              </div> 
              
               <div class="login arama-alani  col-md-5 col-sm-3 col-xs-3 nopadding"  > 
                  <?php  if(isset($user_name)!='')
				{
					echo'<a href="'.site_url('user').'">'.ucwords(strtolower($user_name)).'</a>';
				}
				else
				{
				 ?>
                  <a href="<?php echo site_url('login');?>" >Alumni Login</a>  <!--Sign In--> 
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
        </div><!--row-fluid-->
    </div><!--container-->
</header><!--header-wrapper-->
		
<div class="menu-wrapper">
	<div class="container">
		<div class="testmenu nopadding">
        	<div class="megamenu_container megamenu_dark_bar megamenu_light">
        		<ul class="megamenu"><!-- Begin Mega Menu -->
            		<li class="megamenu_button"><a href="#_">More...</a></li>
					<li class="menuitem1">
    <a href="#_" class="megamenu_drop">ALUMNI</a>
        <div class="dropdown_fullwidth">
		<div class="col_3 responsive_halfs">
          <h3><a class="" href="#">FAST ALUMNI ASSOCIATION</a></h3> 
           <!-- <a class="" href="#"><img src="<?php echo base_url();?>images/rector.jpg" width="210" height="101" alt=""/>  </a> -->  
            <p><a class="" href="#"><a class="" href="#">FAST-NU Alumni Association Secretariat (FAA) was established in April 2016 with a mandate to work for Alumni development at FAST. FAA has worked to officially launch FAST Alumni Association which is working to bring all FAST Alumni on a single platform...

</a></p>
            <a class="" href="chairmans-message/1216/Page.html"><i class="fa fa-chevron-right"></i> Detail</a> 
        </div>
        </div>
   <!--Container -->
</li><!--End Item -->

					<li class="menuitem2"><a href="#_" class="megamenu_drop">JOBS</a>
    <div class="dropdown_fullwidth">
     <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html">TECHNOLOGY SALES REPRESENTATIVE</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">You will be responsible for the generation of cloud and license sales revenue within a team of Technology Sales Representatives in Norway covering Mid- Large Accounts.  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html">Software Engineer C++</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Crossover is looking for software engineers that are ready to utilize their experience in a comprehensive and multidimensional leadership role. Responsibilities will include writing and debugging  ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html">Java Architect</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">DevFactory is partnering with Crossover to fill this position. Crossover specializes in finding and managing the talent in today's global workforce and will help you through the recruiting process...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html">Assistant Manager (PTCL)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Responsible for the development of new soft wares from the scratch i.e. requirements analysis, development and implementation
...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
       
        
         <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Research engineer (Korea)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">A research engineer position is available in South Korea. The candidate is desired to have the following background: MS in CS/EE/TE, Strong programing skills, Expertise ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
                            
    </div><!--dropdown_fullwidth-->    
</li><!-- End Item -->



					<li class="menuitem3"><a href="#_" class="megamenu_drop">EVENTS</a>
    <div class="dropdown_fullwidth dropdown_container">   
       <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Alumni Dinner (ISB)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Dear Alumni
The university will also be printing Alumni cards and handing them over at the Alumni Dinner.
You can still register and send us details at the following link ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Alumni Dinner (ISB)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Dear Alumni
The university will also be printing Alumni cards and handing them over at the Alumni Dinner.
You can still register and send us details at the following link ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Alumni Dinner (ISB)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Dear Alumni
The university will also be printing Alumni cards and handing them over at the Alumni Dinner.
You can still register and send us details at the following link ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Alumni Dinner (ISB)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Dear Alumni
The university will also be printing Alumni cards and handing them over at the Alumni Dinner.
You can still register and send us details at the following link ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Alumni Dinner (ISB)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">Dear Alumni
The university will also be printing Alumni cards and handing them over at the Alumni Dinner.
You can still register and send us details at the following link ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
    </div><!-- End Item container -->
</li><!-- End Item -->
					<li class="menuitem4"><a href="#_" class="megamenu_drop">SCHOLARSHIPS</a><!-- Begin Item -->
    <div class="dropdown_fullwidth"><!-- Begin Item Container -->
    
    <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Fellowship Application (Germany)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">he Global Good Fund is accepting applications from social entrepreneurs for our 2017 Fellowship Program cohort. Please carefully review ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
        <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Fellowship Application (Germany)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">he Global Good Fund is accepting applications from social entrepreneurs for our 2017 Fellowship Program cohort. Please carefully review ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
          <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Fellowship Application (Germany)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">he Global Good Fund is accepting applications from social entrepreneurs for our 2017 Fellowship Program cohort. Please carefully review ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
          <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Fellowship Application (Germany)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">he Global Good Fund is accepting applications from social entrepreneurs for our 2017 Fellowship Program cohort. Please carefully review ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
          <div class="col_2_5">
            <h3><a href="content-detail/626/Page.html"> Fellowship Application (Germany)</a></h3> 
         <!--   <a href="content-detail/626/Page.html"><img src="../images/fakulte.jpg" width="210" height="101" alt=""/></a>  -->   
            <p><a href="content-detail/626/Page.html">he Global Good Fund is accepting applications from social entrepreneurs for our 2017 Fellowship Program cohort. Please carefully review ...  </a></p>
            <a href="content-detail/626/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div> 
        
           
       
    </div><!-- End Item Container -->
</li><!-- End Item -->
      				<li class="menuitem5"><a href="io/default.html" class="megamenu" target="_blank">SUCCESS STORIES</a>
                   <div class="dropdown_fullwidth" style="padding-bottom:20px;"> 
                   
                    <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/kashif.jpg" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Kashif Latif</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">VP development at CureMD
He was student of batch 1994-1996 of FAST Karachi</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>Kamran Khan
        
        
               <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/kashif.jpg" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Kamran Khan</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Software Engineer II Microsoft (Azure) 
He was student of batch 2006-2010 of FAST Islamabad</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
               <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/kashif.jpg" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Muhammad Ikramul Haq</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Software Engineer at Facebook
He was student of MS(CS) batch 2003-2005 of FAST Islamabad</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
               <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/kashif.jpg" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Omer Shahid</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Software Engineer at Facebook
He was student of batch 1994-1996 of FAST Karachi</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        
                 <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/kashif.jpg" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Abdul Hadi</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Software Engineer II Microsoft (Azure) 
He was student of batch 2006-2010 of FAST Islamabad</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
                    </div> 
                    </li>
                    
                    
					<li class="menuitem6"><a href="" class="megamenu" target="_blank">SERVICES</a>
					   </li>
                    
                    <li class="menuitem7"><a href="#_" class="megamenu_drop">STARTUPS</a>
    <div class="dropdown_fullwidth" style="padding-bottom:20px;">
        
    <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/red_buffer.png" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Red Buffer</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Red Buffer provides data science services and builds customised cloud and mobile applications. In particular we are focused on predictive analytics; machine learning; information indexing, retrieval, extraction...</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/creanyx.png" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Red Buffer</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">We are a Web solutions provider company with special emphasis on SMS, ERP and VOIP based applications. We have vast experience in developing high end complex 2-way SMS solutions. ...</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
           <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/red_buffer.png" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Red Buffer</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">Red Buffer provides data science services and builds customised cloud and mobile applications. In particular we are focused on predictive analytics; machine learning; information indexing, retrieval, extraction...</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/creanyx.png" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Red Buffer</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">We are a Web solutions provider company with special emphasis on SMS, ERP and VOIP based applications. We have vast experience in developing high end complex 2-way SMS solutions. ...</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
        
        
         <div class="col_2_5">
           <a class="" href="research-centers/1204/Page.html"><img src="<?php echo base_url();?>images/creanyx.png" width="210" height="101" alt=""/></a> 
            <h3><a class="" href="research-centers/1204/Page.html">Red Buffer</a></h3> 
            <p><a class="" href="research-centers/1204/Page.html">We are a Web solutions provider company with special emphasis on SMS, ERP and VOIP based applications. We have vast experience in developing high end complex 2-way SMS solutions. ...</a></p>
            <a class="" href="research-centers/1204/Page.html"><i class="fa fa-chevron-right"></i> Detail</a>
        </div>
		
    </div>
</li>
				</ul><!--Mega Menu -->
    		</div><!-- Mega Menu Container -->
		</div><!--Testmenu-->
	</div><!--Container -->
</div><!--Menu Wrapper -------------------------------------------------------------------------------------------------------------------------------------->
        
<div class="container">
	<div class="row-fluid">
		<div class="mobile-slider col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style="display:none;">
			<div id="slider-urun-mobile" class="royalSlider rsDefaultInv">
				
                <div id="slide-element">
                <a href="yayinlar/about-us/2166/Page.html" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab2.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab1.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="we-are-learning-the-languages-of-the-tradition-and-the-future/1874/Page.html" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab3.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="News/2013-2014-the-university-of-the-future-the-employment-of-the-future-project/1393/NewsDetail.html#sthash.A8Bp3BJk.dpuf" target="_self">						<img class="imgo" style="display:block;" src="images/bg_tab4.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="News/the-international-conferences-series-have-started-in-izu/1392/NewsDetail.html#sthash.J92jiT78.dpuf" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab1.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="http://www.studyinturkey.gov.tr/profiles/info/287" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab2.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="history-and-foundation/624/Page.html" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab3.jpg" /></a></div>
                
                <div id="slide-element">
                <a href="students-views/1859/Page-2.html" target="_self">
                <img class="imgo" style="display:block;" src="<?php echo base_url();?>images/bg_tab1.jpg" /></a></div>
			
            </div><!--slider-urun-->
            
            
			<div id="slider-prev-orta2" class="slider-prev"></div><div id="slider-next-orta2" class="slider-prev"></div>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    var rsi = $('#slider-urun-mobile').royalSlider({
                        autoHeight: false, arrowsNav: false,
                        fadeinLoadedSlide: false,
                        controlNavigationSpacing: 0,
                        controlNavigation: '',
                        imageScaleMode: '',
                        imageAlignCenter: true,
                        loop: true,
                        loopRewind: false,
                        numImagesToPreload: 6,
                        keyboardNavEnabled: false,
                        autoScaleSlider: true,
                        autoScaleSliderWidth: 586,
                        autoScaleSliderHeight: 420,
                        autoPlay: { enabled: false, delay: 3000, pauseOnHover: true}
                    }).data('royalSlider');
                    $('#slider-next-orta2').click(function () { rsi.next(); });
                    $('#slider-prev-orta2').click(function () { rsi.prev(); });
                });
                </script>
    	</div><!--mobile-slider-->
	</div><!--row-fluid-->
</div><!--container-------------------------------------------------------------------------------------------------------------------------------------->

<div class="sliderContainer fullWidth">
    <div id="full-width-slider" class="royalSlider heroSlider rsMinW">
       
	    <div class="rsContent"><a class="rsImg" href="<?php echo base_url();?>images/bg_tab1.jpg" data-rsw="2000" data-rsh="590"><div class="capcont"><p class="capconttext">National University of Computer & Emerging Science, Islamabad campus</p></div></a><a class="rsLink" href="yayinlar/about-us/2166/Page.html" target="_self"></a></div>
		
		<div class="rsContent"><a class="rsImg" href="<?php echo base_url();?>images/bg_tab2.jpg" data-rsw="2000" data-rsh="590"><div class="capcont"><p class="capconttext">FAST - National University, Islamabad</p></div></a><a class="rsLink" href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html" target="_self"></a></div>
		
		<div class="rsContent"><a class="rsImg" href="<?php echo base_url();?>images/bg_tab3.jpg" data-rsw="2000" data-rsh="590"><div class="capcont"><p class="capconttext">FAST - NU, Islamabad,  Pakistan</p></div></a><a class="rsLink" href="we-are-learning-the-languages-of-the-tradition-and-the-future/1874/Page.html" target="_self"></a></div>
		
		<div class="rsContent"><a class="rsImg" href="<?php echo base_url();?>images/bg_tab4.jpg" data-rsw="2000" data-rsh="590"><div class="capcont"><p class="capconttext">FAST-NUCES, Islamabad</p></div></a><a class="rsLink" href="News/2013-2014-the-university-of-the-future-the-employment-of-the-future-project/1393/NewsDetail.html#sthash.A8Bp3BJk.dpuf" target="_self"></a></div>
		
		
		
		<div class="rsContent"><a class="rsImg" href="<?php echo base_url();?>images/bg_tab5.jpg" data-rsw="2000" data-rsh="590"><div class="capcont"><p class="capconttext">NUCES</p></div></a><a class="rsLink" href="students-views/1859/Page-2.html" target="_self"></a></div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var rsi = $('#full-width-slider').royalSlider({
            autoHeight: false,
            arrowsNav: false,
            fadeinLoadedSlide: false,
            controlNavigationSpacing: 0,
            controlNavigation: 'bullets',
            imageScaleMode: 'fill',
            imageAlignCenter: true,
            loop: true,
            loopRewind: false,
            numImagesToPreload: 6,
            keyboardNavEnabled: false,
            autoScaleSlider: true,
            autoScaleSliderWidth: 2000,
            autoScaleSliderHeight: 800,
            globalCaption: true,
            autoPlay: { enabled: true, delay: 3000, pauseOnHover: true}}).data('royalSlider');
        $('#slider-next-SpotLight').click(function () { rsi.next(); });
        $('#slider-prev-SpotLight').click(function () { rsi.prev(); });
    });
</script>

<div class="bar-wrapper">
	<div class="container">
        <div class="row-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 nopadding"></div><!--col-lg-6-->
            <div class="nav-buttons col-lg-6 col-md-6 col-sm-6 col-xs-4 nopadding">
                <div class="sag">
			<div id="slider-prev-SpotLight" class="slider-prev slide-sol"><i class="fa fa-chevron-left"></i></div>
            <div id="slider-next-SpotLight" class="slider-prev slide-sag"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div><!--nav-buttons-->
		</div><!--row-fluid-->
	</div><!--container-->
</div><!--bar-wrapper-->
        <div class="container">
            
	
	        <div class="bosluk"></div><!--bosluk-->
			
	<div class="row-fluid">
   	    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
			<div class="col-md-6 col-lg-6 nopadding">      
                <div id="slider-urun-orta" class="royalSlider rsDefaultInv">
					<div class="slide-element">
    <a href="research-centers/1204/Page.html"><img class="shadow imgo" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab1.jpg" alt=""/> 
    <img class="imgo" style="display:block;" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab2.jpg"></a>
    <div class="slide-text">
        <p class="slide-baslik"><a href="research-centers/1204/Page.html">Research Based University</a></p>
    </div>
</div><!--slide-element-->

<div class="slide-element">
    <a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html"><img class="shadow imgo" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab2.jpg" alt=""/> 
    <img class="imgo" style="display:block;" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab4.jpg"></a>
    <div class="slide-text">
        <p class="slide-baslik"><a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html">ssssssssssss</a></p>
    </div>
</div><!--slide-element-->

<div class="slide-element">
    <a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html"><img class="shadow imgo" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab3.jpg" alt=""/> 
    <img class="imgo" style="display:block;" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab4.jpg"></a>
    <div class="slide-text">
        <p class="slide-baslik"><a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html">dddddddddddd</a></p>
    </div>
</div><!--slide-element-->


<div class="slide-element">
    <a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html"><img class="shadow imgo" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab4.jpg" alt=""/> 
    <img class="imgo" style="display:block;" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab4.jpg"></a>
    <div class="slide-text">
        <p class="slide-baslik"><a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html">fffffffffffff</a></p>
    </div>
</div><!--slide-element-->

<div class="slide-element">
    <a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html"><img class="shadow imgo" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab5.jpg" alt=""/> 
    <img class="imgo" style="display:block;" src="http://isb.nu.edu.pk/nusite/images/hires/bg_tab4.jpg"></a>
    <div class="slide-text">
        <p class="slide-baslik"><a href="izu-campus-the-place-of-wisdom-and-elegance/1947/Page.html">ggggggggggggggg</a></p>
    </div>
</div><!--slide-element-->

 

                </div><!--slider-urun-->
                <div id="slider-prev-orta" class="slider-prev"></div><div id="slider-next-orta" class="slider-prev"></div>
                <script type="text/javascript">
                jQuery(document).ready(function ($) 
                {var rsi = $('#slider-urun-orta').royalSlider({
                    autoHeight: false, arrowsNav: false, 
                    fadeinLoadedSlide: false, 
                    controlNavigationSpacing: 0, 
                    controlNavigation: '',
                    imageScaleMode: '', 
                    imageAlignCenter: true, 
                    loop: true, 
                    loopRewind: false, 
                    numImagesToPreload: 6, 
                    keyboardNavEnabled: false,
                    autoScaleSlider: true, 
                    autoScaleSliderWidth: 550, 
                    autoScaleSliderHeight: 362, 
                    autoPlay: { enabled: true, delay: 3000, pauseOnHover: true }}).data('royalSlider');
                    $('#slider-next-orta').click(function () { rsi.next(); });
                    $('#slider-prev-orta').click(function () { rsi.prev(); });});
                </script>        
			</div><!--col-md-6-->
			
			
			
            <div class="col-md-6 col-lg-6  nopadding">
                <div class="col-md-6 col-xs-6 nopadding">
					<div class="col-md-12 col-xs-12 nopadding">
		<div class="alt-icerik-1">
			<div class="boxtext">
            <p class="boxbaslik"><a href="home.html" target="_blank">Life in Campus</a></p>
			</div><!--box-text-->
        <a href="home.html" target="_blank">
        <img class="shadow imgo" src="<?php echo base_url();?>images/campus/33.jpg" alt=""/> 
        <img class="imgo" src="<?php echo base_url();?>images/campus/33.jpg">
        </a>
    </div><!--alt-slide-icerik-->
</div>
					<div class="col-md-12 col-xs-12  nopadding">
	<div class="alt-icerik-2">
		<div class="boxtext">
			<p class="boxbaslik"><a href="home.html">The University of the Future</a></p>
		</div><!--box-text-->
		<a href="home.html">
		<img class="shadow imgo" src="<?php echo base_url();?>images/campus/33.jpg" alt=""/> 
		<img class="imgo" src="<?php echo base_url();?>images/campus/22.jpg">
		</a>
	</div>
</div><!--alt-slide-icerik-->
                </div>
				<div class="col-md-6 col-xs-6  nopadding">
                <div class="col-xs-12  nopadding">
					<div class="alt-icerik-3">
						<div class="boxtext">
							<p class="boxbaslik"><a href="home.html">Common Courses</a></p>
						</div><!--box-text-->
						<a href="home.html"> 
						<img class="shadow imgo" src="<?php echo base_url();?>images/shadow.html" alt=""/> 
						<img class="imgo" src="<?php echo base_url();?>images/campus/44.jpg">
						</a>
					</div><!--alt-icerik-3-->
                    </div>
                    <div class="col-xs-12  nopadding">
					<div class="alt-icerik-4">
						<div class="boxtext">
							<p class="boxbaslik"><a href="home.html">International Office</a></p>
						</div><!--box-text-->
						<a href="io/default.html"> 
						<img class="shadow imgo" src="<?php echo base_url();?>images/shadow.html" alt=""/> 
						<img class="imgo" src="<?php echo base_url();?>images/campus/11.jpg">
						</a>
					</div><!--alt-icerik-4-->
                    </div>
                </div>
            </div>
        </div>      
    </div><!--row-fluid-->
            <div class="bosluk"></div><!--bosluk-->
<!--row-fluid-------------------------------------------------------------------------------------------------------------------------------------------------->			
    <!--Removed-->
 <!--row-fluid-------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="bosluk"></div><!--bosluk-->
    <div class="row-fluid">
	
    	
			
			
          
    </div><!--row-fluid-->
	<div class="bosluk"></div><!--bosluk-->
	

        </div><!-- /.container -->
		<div id="UpdatePanel1">
	
				
<footer class="footer"> 
	<div class="container">
		<div class="bosluk"></div><!--bosluk-->
        <div class="row">
			
			<div class="col-md-8 col-sm-12 col-xs-12 padding5">
        		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 border-left bottom20">
					<ul class="footer-menu">
    <p class="footer-baslik">E-SERVICES</p>
    <li><a href="home.html">Student Webmail</a></li>
    <li><a href="home.html">Student Information System</a></li>
    <li><a href="home.html">asdasdsad</a></li>

   
</ul>
            	</div><!--col-lg-4-->
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 border-left">    
					<ul class="footer-menu">
    <p class="footer-baslik">CORPORATE</p>
    <li><a href="home.html">Visit Our Campus</a></li>
    <li><a href="home.html">Human Resource</a></li>
    <li><a href="home.html">Obtaining Information</a></li>
</ul>
				</div><!--col-lg-4-->
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 border-left"> 
					<ul class="footer-menu">
    <p class="footer-baslik">CONTACT</p>
    <li><a href="home.html">Contact</a></li>
    <li><a href="home.html">Contact Form</a></li>
    <li><a href="home.html">Map and Directions</a></li>
</ul>
                </div><!--col-lg-4-->
			</div><!--col-md-6-->

			<div class="col-md-4 col-sm-12 col-xs-12 bottom20 padding5">
				<div class="bulten-kayit">
                	<div class="bulten-form-icerik">
                        <p class="bulten-baslik">E-BULLETIN</p>
                        <p class="bulten-cumle">Please Register Our E-Bulletin for FAST - NU News</p>
                        <div class="bulten-form">
                            <p class="col-md-10 col-sm-10 col-xs-10 nopadding"><input name="Footer1$txtEmail" type="text" value="E-mail address" id="Footer1_txtEmail" class="bulten-input" style="margin-top:10px;" /></p>
                            <p class="col-md-2 col-sm-2 col-xs-2 nopadding"><input type="submit" name="Footer1$btnOK" value="Save" id="Footer1_btnOK" class="genel-button bulten-button" /></p>
							<p class="col-md-12 col-sm-12 col-xs-12 nopadding"><span id="Footer1_lblEBulletinStatus" class="status_acik" 
							style="color:#e0dbd6; font-size:10pt;"></span></p>
                        </div><!--bulten-form-->
                    </div><!--bulten-form-icerik-->
				</div><!--bulten-kayit-->
			</div><!--col-md-6-->

        </div><!--row-fluid-->
      
	  
	  
   
            	 