<?php
namespace Kernel;

/**
 * 
 */
class Router{
	function __construct(){
	}


/*
|--------------------------------------------------------------------------
| Создание запрошенного контроллера 
|--------------------------------------------------------------------------
|
| Router создает выбранный пользователем контроллер, и передеает ему параметры
|
*/
	function getMainController (){
		
		// В любой непонятной ситуации - вернуть главную страницу
		if (!isset($_GET["controller"])){ return new \App\Homepage\HomepageController ();}
		

		if (!isset($_GET["page_id"])){ $page_id= 0; } else { $page_id = $_GET["page_id"];}

		// Если пользователь не определил акцию, имя по умолчанию будет index
		if (!isset($_GET["action"])){ $action= "index"; } 
		else { $action = $_GET["action"];}



		// Выбираем нужный контроллер, на основе выбора пользователя ( $_GET )
		switch ($_GET["controller"]) {
			case 'page':
			return new \App\Page\PageController ($action, $page_id);
				break;

			case 'post':
			return new \App\Post\PostController ();
				break;

			// If user chouse Contact Form controller
			case 'contactform':
			return new \App\Contactform\CFController ($action);
				break;
			
			default:
			return new \App\Page\PageController (); // TODO Error 404 or HomePage
				break;
		}
	}

//*------------------------------------------------------------
// Обеспечение единственной копии класса      
      private static $instance;
      public static function getInstance() {
          if (!self::$instance) {
              self::$instance = new self();
          }
          return self::$instance;
      }
      private function __clone() {}
      private function __wakeup() {}	
}

// $Router = Router::getInstance();