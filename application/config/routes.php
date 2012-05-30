<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "message";
$route['404_override'] = '';

$route['messages'] = "message/index";
$route['messages/hot'] = "message/messages_hot";
$route['messages/inregion/(:any)'] = "message/get_by_region/$1";
$route['messages/edit/(:num)'] = "message/edit/$1";
$route['messages/(:any)'] = "message/index";

$route['regions/hot'] = "region/hot";

$route['account/oauth/douban'] = "account/douban_oauth";
$route['account/douban/register'] = "account/douban_register";
$route['account/oauth/sina'] = "account/sina_oauth";
$route['account/sina/register'] = "account/sina_register";

$route['login/callback.php'] = "account/callback";
$route['login/callback'] = "account/callback";
$route['login'] = "account/login";
$route['logout'] = "account/logout";

$route['users'] = "user/index";
$route['user/register'] = "user/register";
$route['user/messages'] = 'user/get_messages';
$route['user/messages/(:num)'] = "user/get_messages/$1";
$route['user/comments'] = 'user/get_comments';
$route['user/comments/(:num)'] = "user/get_comments/$1";
$route['user/setting']="user/setting";
$route['user/setting/password'] = "user/change_password";
$route['user/upload_profile_image/']="user/upload_profile_image";
$route['users/(:num)'] = 'user/get/$1';

/* API calls */
$route['api/messages'] = "api/messages";
$route['api/messagesInRegion/(:any)'] = "api/messages_in_region/$1";
$route['api/hotMessages/(:num)'] = "api/hot_messages/$1";
$route['api/message/(:num)'] = "api/message/$1";
$route['api/comments'] = "api/comments";


/* End of file routes.php */
/* Location: ./application/config/routes.php */