<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['admin/(:any)'] = 'admin/$1';
$route['admin'] = 'admin/index';
$route['teacher/subjects/(:any)'] = 'teacher/subjects/$1';
$route['teacher/(:any)']= 'teacher/$1';
$route['teacher'] = 'teacher/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
