<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'User';
$route['user'] = 'User';
$route['register'] = 'User/alumni_register';
$route['login'] = 'User/alumni_login';
$route['forget'] = 'User/forget_password';


$route['logout'] = 'User/unset_sesssion_data';


$route['jobdetail/(:num)'] = 'job/job_detail/$1';
$route['job'] = 'Job/post_job';
$route['joblist/(:num)']='Job/get_all_job/$1';
$route['joblist']='Job/get_all_job/$1';
$route['searchjob']='Job/search_job/$1';
$route['searchjob/(:num)']='Job/search_job/$1';
$route['approvejob/(:num)']='Job/approve_job/$1';

$route['scholarshipdetail/(:num)'] = 'scholarship/scholarship_detail/$1';
$route['scholarship'] = 'Scholarship/post_scholarship';
$route['scholarshiplist/(:num)']='Scholarship/get_all_scholarship/$1';
$route['scholarshiplist']='Scholarship/get_all_scholarship/$1';
$route['searchscholarship']='Scholarship/search_scholarship/$1';
$route['approvescholarship/(:num)']='Scholarship/approve_scholarship/$1';

$route['storydetail/(:num)'] = 'story/story_detail/$1';
$route['story'] = 'Story/post_story';
$route['storylist/(:num)']='Story/get_all_story/$1';
$route['storylist']='Story/get_all_story/$1';
$route['searchstory']='Story/search_story';
$route['approvestory/(:num)']='Story/approve_story/$1';

$route['company'] = 'Company_reg/post_company';
$route['companylist/(:num)']='Company_reg/get_all_company/$1';
$route['companylist']='Company_reg/get_all_company/$1';
$route['searchcompany']='Company_reg/search_company';
$route['companydetail/(:num)']='Company_reg/company_detail/$1';
$route['approvecompany/(:num)']='Company_reg/approve_company/$1';

$route['newsevent'] = 'Newsevent/post_newsevent';
$route['newseventlist/(:num)']='Newsevent/get_all_newsevent/$1';
$route['newseventlist']='Newsevent/get_all_newsevent/$1';
$route['searchnewsevent']='Newsevent/search_newsevent';
$route['newseventdetail/(:num)']='Newsevent/newsevent_detail/$1';
$route['approvenewsevent/(:num)']='Newsevent/approve_newsevent/$1';


$route['viewsdetail/(:num)']='Views/view_detail/$1'; 
$route['viewslist/(:num)']='Views/get_all_views/$1';
$route['viewslist']='Views/get_all_views/$1';


$route['gallery']='Photo_gallery/index';
$route['searchphoto']='Photo_gallery/search_photo';
$route['group']='Group';
$route['donation']='Donate/post_donation';
$route['suggestion']='Suggestion/post_suggestion';


$route['contacts']='General/contact';
$route['privacy']='General/privacy';
$route['teachermessage']='General/video_messages';


$route['alumnicard']='Alumni/alumni_reg_card';
$route['updatewebaddress']='Alumni/update_profile_address';
$route['viewprofile']='Alumni/view_profile';
$route['addwebaddress']='Alumni/add_profile_address';
$route['removewebaddress/(:num)']='Alumni/remove_profile_address/$1';
$route['editbasicprofile']='Alumni/edit_basic_profile';
$route['alumnilist/(:num)/(:num)']='Alumni/get_all_alumni_campus/$1/$2'; 
$route['alumnilist/(:num)']='Alumni/get_all_alumni_campus/$1'; 

$route['searchalumni']='Alumni/alumni_search';
$route['alumnidetail/(:num)']='Alumni/public_profile_view/$1';

//$route['searchnext/(:any)/(:num)/(:num)/(:num)']='Alumni/alumni_search_pagination/$1/$2/$3/$4';
//$route['searchnext/(:any)/(:num)/(:num)']='Alumni/alumni_search_pagination/$1/$2/$3';
$route['searchnext/(:num)']='Alumni/alumni_search_pagination/$1';
$route['searchnext']='Alumni/alumni_search_pagination';








$route['getjob'] = 'Job/get_job';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



echo "<mm:dwdrfml documentRoot=\"" . __FILE__ .	"\" >\n\n";
$included_files = get_included_files();
foreach ($included_files as $filename) {
	echo "<mm:IncludeFile path=\"$filename\" />\n\n";
}
echo "</mm:dwdrfml>\n\n";
