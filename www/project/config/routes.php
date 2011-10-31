<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***********************************	USERS INTRERFACE	***********************************************/

/* ----------------------------------------	users menu	--------------------------------------------------*/
$route[''] = "users_interface/index";
/* ----------------------------------- authorization/shutdown ---------------------------------------------*/
$route['authorization'] = "users_interface/authorization";
$route['shutdown'] = "users_interface/shutdown";
$route['admin']	= "users_interface/admin_login";

/************************************	ADMIN INTRERFACE	***********************************************/

$route['admin/control-panel'] = "admin_interface/cpanel";
?>