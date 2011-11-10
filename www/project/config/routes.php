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
$route['send-mail'] = "users_interface/formsendmail";

$route['viewimage/:num'] = "users_interface/viewimage";
$route['viewshema/:num'] = "users_interface/viewshema";
$route['viewthumb/:num'] = "users_interface/viewsthumb";

$route['proekti-derevyannih-domov-do-100m2'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-do-100m2/spisok'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-do-100m2/spisok/:num'] = "users_interface/domalist";

$route['proekti-derevyannih-domov-ot-100m2-do-200m2'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-100m2-do-200m2/spisok'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-100m2-do-200m2/spisok/:num'] = "users_interface/domalist";

$route['proekti-derevyannih-domov-ot-200m2-do-300m2'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-200m2-do-300m2/spisok'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-200m2-do-300m2/spisok/:num'] = "users_interface/domalist";

$route['proekti-derevyannih-domov-ot-300m2'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-300m2/spisok'] = "users_interface/domalist";
$route['proekti-derevyannih-domov-ot-300m2/spisok/:num'] = "users_interface/domalist";

$route['proekti-derevyannih-domov-do-100m2/proekt-db-:num'] = "users_interface/domainfo";
$route['proekti-derevyannih-domov-ot-100m2-do-200m2/proekt-db-:num'] = "users_interface/domainfo";
$route['proekti-derevyannih-domov-ot-200m2-do-300m2/proekt-db-:num'] = "users_interface/domainfo";
$route['proekti-derevyannih-domov-ot-300m2/proekt-db-:num'] = "users_interface/domainfo";

$route['proekti-derevyannih-ban'] = "users_interface/banilist";
$route['proekti-derevyannih-ban/spisok'] = "users_interface/banilist";
$route['proekti-derevyannih-ban/spisok/:num'] = "users_interface/banilist";
$route['proekti-derevyannih-ban/proekt-db-:num'] = "users_interface/banyainfo";

/************************************	ADMIN INTRERFACE	***********************************************/

$route['admin/control-panel'] = "admin_interface/cpanel";
$route['admin/shutdown'] = "admin_interface/shutdown";
$route['admin/delete-message'] = "admin_interface/delete_message";
$route['admin/add-project'] = "admin_interface/add_project";
$route['admin/views-projects'] = "admin_interface/views_projects";
$route['admin/delete-project'] = "admin_interface/delete_project";

/* ----------------------------------- authorization/shutdown ---------------------------------------------*/

$route['admin']	= "users_interface/admin_login";
$route['admin/:any'] = "users_interface/admin_login";
?>