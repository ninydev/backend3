<?php
use \Kernel\Router;
/*
|--------------------------------------------------------------------------
| Создание роутов
|--------------------------------------------------------------------------
|
| http://laravel.su/docs/5.2/routing
| https://symfony.com/doc/current/components/routing.html
|
*/


Router::add("/", "\App\Homepage\HomepageController")
			->name("home");

Router::add("/about.html", "\App\Page\PageController" , "index")
			->addArg("page_id", 1)
			->name("about");

Router::addForm("/contact.html", "\App\Contactform\CFController")
			->name("contact")
			->middleware("Stop");



 