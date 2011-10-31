<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***********************************	USERS INTRERFACE	***********************************************/

/* ----------------------------------------	users menu	--------------------------------------------------*/
$route[''] = "users_interface/index";
$route['o-kompanii'] = "users_interface/okompanii";
$route['proizvodstvo-ocilindrovannogo-brevna'] = "users_interface/proizvodstvo";
$route['proekti-derevyannih-domov'] = "users_interface/proekti";
$route['ceni-na-derevyannie-doma'] = "users_interface/ceni";
$route['kontakti'] = "users_interface/kontakti";
/* ----------------------------------- authorization/shutdown ---------------------------------------------*/
$route['authorization'] = "users_interface/authorization";
$route['shutdown'] = "users_interface/shutdown";
$route['admin']	= "users_interface/admin_login";

/************************************	ADMIN INTRERFACE	***********************************************/

$route['admin/control-panel'] = "admin_interface/cpanel";
?>