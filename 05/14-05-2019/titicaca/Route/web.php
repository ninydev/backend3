<?php
use \Kernel\Router;
/*
|--------------------------------------------------------------------------
| Создание роутов
|--------------------------------------------------------------------------
|
| http://laravel.su/docs/5.2/routing
|
*/


Router::addGroup("/page/{action}/{page_id}", "\App\Page\PageController");
Router::addGroup("/somepage/{page_id}/{action}/{autor_id}", "\App\Page\PageController")
    ->middleware("Stop");

//Router::addGroup("/page/{action}/{page_id}/{page_autor}", "\App\Page\PageController");

Router::add("/sitemap.html", "\App\Sitemap\SitemapController")
    ->name("sitemap");

Router::add("/index.html", "\App\Homepage\HomepageController")
            ->showInSiteMap()
			->name("home");

Router::add("/about.html", "\App\Page\PageController" , "index")
			->addArg("page_id", 2)
            ->showInSiteMap()
			->name("about");

Router::add("/cars.html", "\App\Page\PageController" , "index")
    ->addArg("page_id", 'cars')
    ->showInSiteMap()
    ->name("cars");

Router::add("/service.html", "\App\Page\PageController" , "index")
			->addArg("page_id", 3)
            ->showInSiteMap()
			->name("service");

Router::add("/warranty.html", "\App\Page\PageController" , "index")
			->addArg("page_id", 'warranty')
            ->showInSiteMap()
			->name("warranty");

Router::add("/news.html", "\App\Post\PostController" , "index")
			->addArg("page_id", 'post')
            ->showInSiteMap()
			->name("warranty");

Router::addForm("/contact.html", "\App\ContactForm\CFController")
    ->name("contact")
    ->showInSiteMap()
    ->middleware("Stop");


Router::resource("/shop.html", "\App\Page\PageController")
    ->showInSiteMap()
    ->name("shop");

//echo var_dump(Router::$routes);


