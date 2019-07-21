<?php
/* Smarty version 3.1.33, created on 2019-07-19 20:14:18
  from '/var/www/clients/client1/web20/web/Smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d31fa6a440f28_06304231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8f33dd851f2661bb4acedd5d88b3808c854f89c' => 
    array (
      0 => '/var/www/clients/client1/web20/web/Smarty/templates/header.tpl',
      1 => 1563556454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5d31fa6a440f28_06304231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '398964945d31fa6a42af65_70474077';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/Smarty/favicon.ico">
    <title>
    </title>
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="/Smarty/_css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Smarty/_css/fancybox.css">
    <link rel="stylesheet" href="/Smarty/_css/styles.css">
    <link rel="stylesheet" href="/Smarty/_css/responsive.css">
</head>
<body>

<header class="main-header">
    <div class="container-fluid">
        <div class="logo">
            <a href="#"><img src="/Smarty/_imgs/logo.png" alt="logo"></a>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <div class="menu-button">
        <span></span>
    </div>
    <div class="pre-title">
        <h1>About Valuex Vail</h1>
        <div class="clip-overlay" style="height: 152.4px;">
            <svg class="svg-wave" width="" height="" version="1.1" viewBox="0 0 100 10" preserveAspectRatio="none" xmlns="//www.w3.org/2000/svg">
                <path class="front-wave" d="M0,0 C30,6 80,4 100,0 L100,10 L0,10 Z" fill="#4f8abb"></path>
            </svg>
        </div>
    </div>
</header><?php }
}
