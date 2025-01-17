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
$route['default_controller'] = 'webkayu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// API Data Kayu
$route['api/kayuapi'] = 'kayuapi/index'; // Untuk GET semua data
$route['api/kayuapi/(:num)'] = 'kayuapi/show/$1'; // Untuk GET data by ID
$route['api/kayuapi/store'] = 'kayuapi/store'; // Untuk POST data
$route['api/kayuapi/update/(:num)'] = 'kayuapi/update/$1'; // Untuk PUT data
$route['api/kayuapi/delete/(:num)'] = 'kayuapi/delete/$1'; // Untuk DELETE data
$route['api/kayuapi/list/(:num)'] = 'kayuapi/list/$1'; // Menampilkan data kayu dengan pagination
$route['api/kayuapi/list'] = 'kayuapi/list'; // Menampilkan data kayu dengan search dan pagination

// API Pesanan
$route['api/pesanankayuapi'] = 'pesanankayuapi/index'; // Untuk GET semua data
$route['api/pesanankayuapi/(:num)'] = 'pesanankayuapi/show/$1'; // Untuk GET data by ID
$route['api/pesanankayuapi/store'] = 'pesanankayuapi/store'; // Untuk POST data
$route['api/pesanankayuapi/update/(:num)'] = 'pesanankayuapi/update/$1'; // Untuk PUT data
$route['api/pesanankayuapi/delete/(:num)'] = 'pesanankayuapi/delete/$1'; // Untuk DELETE data
$route['api/pesanankayuapi/list/(:num)'] = 'pesanankayuapi/list/$1'; // Menampilkan data kayu dengan pagination
$route['api/pesanankayuapi/list'] = 'pesanankayuapi/list'; // Menampilkan data kayu dengan search dan pagination

// API Auth
$route['api/authapi/login'] = 'authapi/login';
$route['api/authapi/register'] = 'authapi/register'; // Untuk POST data
$route['api/authapi/logout'] = 'authapi/logout';
// API User
$route['api/authapi'] = 'authapi/index'; // Untuk GET semua data
$route['api/authapi/(:num)'] = 'authapi/show/$1'; // Untuk GET data by ID
$route['api/authapi/update/(:num)'] = 'authapi/update/$1'; // Untuk PUT data
$route['api/authapi/delete/(:num)'] = 'authapi/delete/$1'; // Untuk DELETE data
$route['api/authapi/list/(:num)'] = 'authapi/list/$1'; // Menampilkan data kayu dengan pagination
$route['api/authapi/list'] = 'authapi/list'; // Menampilkan data kayu dengan search dan pagination

$route['api/swagger'] = 'apiswagger';