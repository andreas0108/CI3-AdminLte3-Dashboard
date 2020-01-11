<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['login'] = 'dashboard/auth';
$route['register'] = 'dashboard/auth/registration';
$route['blocked'] = 'dashboard/auth/blocked';

$route['dashboard/user/(:num)'] = 'dashboard/user/index/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
