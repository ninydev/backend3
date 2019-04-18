<?php
namespace Kernel;


/*
|--------------------------------------------------------------------------
| Данные для одного маршрута
|--------------------------------------------------------------------------
|
| 
|
*/
class RouteEl {
	public $url;
	public $controller;
	public $action;
	public $name;
	public $middleware;

	public $arg;

	public function __construct ($url, $controller, $action = "index"){
		$this->url = $url;
		$this->controller = $controller;
		$this->action = $action;		
	}

	public function addArg($key, $value) {
		$this->arg[$key] = $value;
		return $this;
	}

	public function name ($name){
		$this->name =$name;
		return $this;
	}

	public function middleware ($middleware){
		$this->middleware[] = $middleware;
		return $this;
	}

}


/*
|--------------------------------------------------------------------------
| Работа с маршрутами
|--------------------------------------------------------------------------
|
| 
|
*/
class Router{

	// ToDo:
	// На примере addForm написать метод,создающий route для CRUD
	// должно создать 
	// / -для отображения index
	// create -вызвать метод create
	// read, update, delete - вызывать соответсвующие методы контроллера
	//
	// Разобраться с посредником - что бы для всех созданных маршрутов вызывался
	// посредник

/*
|--------------------------------------------------------------------------
| Создание маршрута для работы с формой
|--------------------------------------------------------------------------
|
| 
|
*/	

	static function addForm ($url, $controller){
		self::add($url . "/send", $controller, "send");
		return self::add($url, $controller, "index");
	}

	static function getFormAction () {
		$url =  explode('?' , $_SERVER['REQUEST_URI']);
		return $url[0] . "/send";
	}


/*
|--------------------------------------------------------------------------
| Создание маршрута
|--------------------------------------------------------------------------
|
| 
|
*/
	static $routes;
	// static $rCount;

	// Прямой маршрут
	static function add($url, $controller, $action = "index"){
		self::$routes[$url] = new RouteEl ($url, $controller, $action);
		return self::$routes[$url]; //Возвращает обьект
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

	// echo $_SERVER['REQUEST_URI'] . "<br>";


	$url =  explode('?' , "/" . str_replace ("public/", "" , strstr($_SERVER['REQUEST_URI'], "public/")));
	$url = $url [0];

// explode('?', $url); 
	
	// echo self::$routes[$url]->controller;

	// Если у меня естьстатический маршрут
	if(isset(self::$routes[$url])){

		// Если у меня есть в маршруте посредники, создать каждый из них
		if (is_array(self::$routes[$url]->middleware)) {
			for ($i = 0; $i < sizeof(self::$routes[$url]->middleware); $i++){
				// Создаю новый класс по названию, записанному в переменную
				$tmp = "\App\Middleware\\" . self::$routes[$url]->middleware[$i];
				$middleware[$i] = new $tmp();
			}	
		}
		// Возвращаю экземпляр главного контроллера, передавая ему тот метод
		// который нужно вызвать
		return new self::$routes[$url]->controller(self::$routes[$url]->action, self::$routes[$url]->arg);
	}
	 	echo "url = " .  $url;
		echo"<pre>";
		var_dump(self::$routes);
		echo "</pre>";

		die ("<hr>Stop Router");
	}


	public static function  BuildUrl($item){
			// Построение ссылки
		$url = $_SERVER['PHP_SELF'];
		$get = array();

		if (isset($item['controller'])) {
			$get[] = "controller=" . $item['controller'];
		}

		if (isset($item['action'])) {
			$get[] = "action=" . $item['action'];
		}

		if (isset($item['arg'])) {
			$arg = array();
			foreach ($item['arg'] as $keya => $valuea) {
				$arg[]=  $keya . "=" . $valuea;
			}
			$get[] = implode ('&',$arg);
		}

		$url.= '?' . implode ('&', $get);
		return $url;
}



 public static function BuildItem($data, $parent_id) {
	$res = "\n<ul>";

	foreach ($data as $key => $item) {
		if ($item['parentId'] == $parent_id){
			$res_a = '<a href="' . $item['slug'] /*self::BuildUrl($item)*/ . '" title="' . $item['slug'] . '" >' . $item['text'] . "</a>" ;
			$res.= "<li>" . $res_a;

			if ($item['hasCildren']){
				$res.= self::BuildItem($data, $key);
			}
			$res.= "</li>\n";
		}
	}
	$res.= "</ul>\n";

	return $res;
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
	  private function __construct(){}
      private function __clone() {}
      private function __wakeup() {}	
}

// Router::$rCount = 0;
// $Router = Router::getInstance();


//*------------------------------------------------------------
// Подключение маршрутов
include_once ("../Route/web.php");