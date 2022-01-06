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
$route['default_controller'] = 'Login_controller';
$route['/'] = 'Login_controller';
$route['user_redirect'] = 'Login_controller/redirect';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home_controller';

// USER CONTROLLER
$route['login'] = 'Login_controller';


// ADMIN
$route['admin'] = 'Admin_controller/index';

/* USUARIOS */
    /* VIEWS */
        /* ADMINS */
        $route['admin/users/admin'] = 'Admin_controller/users_admin';
        /* NORMALES */
        $route['admin/users/normal'] = 'Admin_controller/users_normal';

    /* GETTERS */
        /* ALL */
        $route['admin/users/admin/all'] = 'User_controller/get_all_users';
        /* BY ROLE */
        $route['admin/get_list_users/(:num)'] = 'User_controller/get_users_by_role/$1';



/* MIEMBROS GENERAL */
$route['admin/members'] = 'Admin_controller/members';


$route['admin/members/list'] = 'Member_controller/get_all_members';

/* MIEMBROS LIDERAZGO */
$route['admin/members/leaders'] = 'Admin_controller/leaders';

/* ESCUELA DISCIPULADO NIVEL 1*/
$route['admin/discipleship/level/(:num)'] = 'Admin_controller/discipleship/$1';

/* EQUIPOS PASTORALES */
$route['admin/teams'] = 'Admin_controller/teams';
