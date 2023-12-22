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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['admin'] = 'Admin_Controller';
$route['dashboard'] = 'Admin_Controller/dashboard';
$route['users'] = 'Admin_Controller/users';
$route['research_papers'] = 'Admin_Controller/research_papers';
$route['create_admin'] = 'Admin_Controller/create_admin';
$route['register'] = 'Admin_Controller/register';
$route['Abstract_table'] = 'Admin_Controller/Abstract_table';
$route['approved_abstract_table'] = 'Admin_Controller/approved_abstract_table';
$route['admin_table'] = 'Admin_Controller/admin_table';
$route['all_research_papers'] = 'Admin_Controller/all_research_papers';
$route['completed_research_papers'] = 'Admin_Controller/completed_research_papers';
$route['rejected_research_papers'] = 'Admin_Controller/rejected_research_papers';
$route['all_abstract'] = 'Admin_Controller/all_abstract';
$route['all_fulldocument'] = 'Admin_Controller/all_fulldocument';
$route['all_users'] = 'Admin_Controller/all_users';
$route['not_veriusers'] = 'Admin_Controller/not_veriusers';
$route['denied_users'] = 'Admin_Controller/denied_users';
$route['setting'] = 'Admin_Controller/setting';

$route['login'] = 'Users_Controller/login';
$route['do_login'] = 'Users_Controller/do_login';
$route['logout'] = 'Users_Controller/logout';
$route['registration'] = 'Users_Controller/registration';
$route['list_research_paper'] = 'Users_Controller/list_research_paper';
$route['home'] = 'Users_Controller/home';
$route['upload_form'] = 'Users_Controller/upload_form';
$route['profile'] = 'Users_Controller/profile';
$route['works'] = 'Users_Controller/works';
$route['submit'] = 'Users_Controller/submit';
$route['success'] = 'Users_Controller/success';
$route['get_barangay'] = 'Users_Controller/get_barangay';
$route['get_zipcode'] = 'Users_Controller/get_zipcode';
$route['insert_user_info'] = 'Users_Controller/insert_user_info';
$route['register_success'] = 'Users_Controller/register_success';
$route['Pending'] = 'Users_Controller/Pending';
$route['Reject'] = 'Users_Controller/Reject';
$route['Complete'] = 'Users_Controller/Complete';


$route['view/(:num)'] = 'Users_Controller/view/$1';
$route['view_abstract/(:num)'] = 'Users_Controller/view_abstract/$1';
$route['viewfulldocu'] = 'Users_Controller/viewfulldocu';
$route['edit'] = 'Users_Controller/edit';
$route['delete'] = 'Users_Controller/delete';
$route['update_research'] = 'Users_Controller/update_research';
$route['update_success'] = 'Users_Controller/update_success';

$route['update_profile'] = 'Users_Controller/update_profile';
$route['edit_profile_info'] = 'Users_Controller/edit_profile_info';
$route['update_profile_success'] = 'Users_Controller/update_profile_success';

$route['search'] = 'Users_Controller/search';

$route['upload_fd_form'] = 'Users_Controller/upload_fd_form';
$route['submit_fulldocument'] = 'Users_Controller/submit_fulldocument';
$route['success_fd'] = 'Users_Controller/success_fd';

$route['default_controller'] = 'Users_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
