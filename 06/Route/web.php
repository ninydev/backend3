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


Router::addGroup("/page/{autor_slug}/{page_id}", "\App\Page\PageController");
Router::addGroup("/pages/{action}/{page_id}", "\App\Page\PageController");
Router::addGroup("/somepage/{page_id}/{action}/{autor_id}", "\App\Page\PageController")
	->middleware("Stop");

//Router::addGroup("/product/{slug}", "\App\Shop\ProductController");	
//Router::addGroup("/{slug}", "\App\Blog\BlogController");	
	

// Router::addGroup("/page/{action: index}/{page_id}/{page_autor}", "\App\Page\PageController");


Router::add("/sitemap.html", "\App\Sitemap\SitemapController")
			->name("sitemap");

Router::add("/", "\App\Homepage\HomepageController")
			->name("home")
			->showInSiteMap();

Router::add("/about.html", "\App\Page\PageController" , "index")
			->addArg("page_id", 1)
			->name("about")
			// ->middleware("Stop")
			->showInSiteMap();

Router::addForm("/contact.html", "\App\Contactform\CFController")
			->name("contact")
			->middleware("Stop")
			->showInSiteMap();



Router::resource("/shop.html", "\App\Page\PageController")
			->showInSiteMap()
			->name("shop");

 