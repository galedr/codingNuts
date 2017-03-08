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
$route['default_controller'] = 'Page_index/output_list';
$route['index/(:any)'] = 'Page_index/list_pagination/$1'; //首頁分頁
$route['category/(:any)'] = 'Page_index/index_search/$1';
$route['tag/(:any)'] = 'Page_index/index_search/$1';

// 文章內頁
$route['articles/(:any)'] = 'Page_article/articles/$1';

// 後台
$route['back_end'] = 'Page_back_end/back_end_index';
$route['back_end/(:num)'] = 'Page_back_end/back_end_index_pagi/$1';
$route['back_end/category/(:any)'] = 'Page_back_end/back_end_search/$1';
$route['back_end/tag/(:any)'] = 'Page_back_end/back_end_search/$1';

// 管理者登入
$route['back_end/admin_login'] = 'Page_back_end/admin_login_page';
$route['admin_login'] = 'Page_back_end/admin_login';
$route['admin_logout'] = 'Page_back_end/admin_logout';

// 新增文章
$route['back_end/new_article'] = 'Page_back_end/new_article';
$route['new_article/tag_search'] = 'Page_back_end/tag_search';
$route['back_end/add_article'] = 'Page_back_end/add_article';
$route['edit_article/(:any)'] = 'Page_back_end/edit_article_page/$1';
$route['article_update/(:any)'] = 'Page_back_end/edit_article_update/$1';
$route['article_delete/(:any)'] = 'Page_back_end/article_delete/$1';

// test
$route['test'] = 'Page_index/test';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
