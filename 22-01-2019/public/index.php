<?php
$startFrameworkTime = microtime(true);
include ("../app/templates.lib.php");
include ("../app/vardump.lib.php");
//include ("../app/files.lib.php");
include ("../app/menuClass.lib.php");

$mainMenu = new Menu(); // Создание экземпляра класса


$mainMenu->addEl ("/","Главная");

$mainMenu->addEl ("/about.html","О нас");

$tmp = $mainMenu->addEl ("/gallery.html","Галлерея");
	$mainMenu->addEl ("/gallery1.html","Наши фото", $tmp);
	$mainMenu->addEl ("/gallery2.html","Фото корпаративов", $tmp);
	$mainMenu->addEl ("/gallery3.html","Фото котиков", $tmp);

$mainMenu->addEl ("/contacts.html","Контакты");


$mainMenu->saveMenuJson();
$mainMenu->loadMenuJson();


$responce ['header']['menu'] = $mainMenu->echoMenu ();



$addMenu = new Menu ();
$addMenu->filePathJson =  "../database/data/addMenu.json";
$addMenu->filePathHTML = "../public/cache/addMenu.html";

$addMenu->addEl ("/","На главную");

$addMenu->addEl ("/about.html","Дополнительно");

$tmp = $addMenu->addEl ("/gallery.html","Галлерея");
	$addMenu->addEl ("/gallery1.html","Наши фото", $tmp);
	$addMenu->addEl ("/gallery2.html","Фото корпаративов", $tmp);
	$addMenu->addEl ("/gallery3.html","Фото котиков", $tmp);

$addMenu->addEl ("/contacts.html","Еще раз контакты");

$addMenu->saveMenuJson();
$addMenu->loadMenuJson();



$responce ['header']['sitename'] = "Hello World";
//$responce ['head']['title'] = "My First tpl";
$responce ['head']['css'] = "";
$responce ['footer']['copy'] = "&copy IT Step";
$responce ['content'].= '<h1 class="w-100"> Content </h1>';
$responce ['content'].= $addMenu->echoMenu();

//*-------------------------------------------------------------------------------




// $responce ['content'] = parserGuest();
// $responce ['content'] = parserPhoto();
//*-------------------------------------------------------------------------------
$responce ['footer']['time'] =  $startFrameworkTime;
buildPage($responce);


