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
$route['default_controller'] = 'Main_page/index';
$route['index'] = 'Main_page/index';
//首頁
$route['header_search/(:any)/(:any)/(:num)'] = 'Main_page/index_search/$1/$2/$3';

//文章內頁
$route['articles/(:num)'] = 'Main_page/articles/$1';
$route['collect_check'] = 'Main_page/collect_check';
$route['unset_collect'] = 'Main_page/unset_collect';
//會員
$route['member_login'] = 'Main_page/member_login';
$route['member_resign'] = 'Main_page/member_resign';
$route['member_logout'] = 'Main_page/member_logout';

//後台
$route['admin_login'] = 'Back_end/admin_login';
$route['login_process'] = 'Back_end/admin_login_process';
$route['back_end'] = 'Back_end/back_end_index';
$route['back_end_search'] = 'Back_end/back_end_search';
$route['logout'] = 'Back_end/logout';
//新文章
$route['new_article'] = 'Back_end/new_article';
$route['tag_search'] = 'Back_end/tag_search';
$route['add_article'] = 'Back_end/add_article';
//修改
$route['article_edit/(:num)'] = 'Back_end/article_edit/$1';
$route['article_update/(:num)'] = 'Back_end/article_update/$1';

//撈資料 pull_data
$route['all_article'] = 'Pull_data/all_article';
$route['reset_category_article'] = 'Pull_data/reset_category_article';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
