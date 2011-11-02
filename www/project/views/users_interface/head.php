<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?=$title;?></title>
<meta name="description" content="<?=$description;?>">
<meta name="author" content="<?=$author;?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- CSS concatenated and minified via ant build script-->
<link rel="stylesheet" href="<?=$baseurl;?>css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?=$baseurl;?>css/960.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?=$baseurl;?>css/prettyphoto.css" type="text/css" media="screen"/>
<?php if($form):?>
<link rel="stylesheet" href="<?=$baseurl;?>css/jquery.jgrowl.css" type="text/css" media="screen"/>
<?php endif;?>
<!-- end CSS-->
<script src="<?=$baseurl;?>js/libs/modernizr-2.0.6.min.js"></script>
<?php if($this->uri->segment(1) == 'kontakti'):?>
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AJ7Yp04BAAAAF33mdgIAdWfLeYksoqkOYC9W6KJqga6moiwAAAAAAAAAAAAlvBoZmtNC5Cm6SEOnrvKjqBf8JA==" type="text/javascript"></script>
  <style type="text/css">
	.overlay { position: absolute; z-index: 1; width: 40px; height: 36px; background: url(img/home_contacts.png); cursor:pointer; }
	.map-wrapper { background: #90987F; border: 1px solid #999; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; height: 400px; padding: 3px; text-align: center; width: 600px; margin-bottom: 20px; }
  </style>
<?php endif;?>
</head>