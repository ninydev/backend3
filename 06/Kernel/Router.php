<?php
namespace Kernel;
use Kernel\Lib\PP;


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
	public $showInSiteMap;
	public $path;

	public $parent_id; // Ссылка на родительский маршрут

	public $arg;

	public function __construct ($url, $controller, $action = "index", $parent_id = null){
		$this->showInSiteMap = false;
		$this->url = $url;
		$this->controller = $controller;
		$this->action = $action;
		$this->parent_id = $parent_id;		
	}

	public function addArg($key, $value) {
		$this->arg[$key] = $value;
		return $this;
	}

	public function addPath($path) {
		$this->path = $path;
		return $this;
	}

	public function showInSiteMap($flag = true) {
		$this->showInSiteMap = $flag;
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
		$mainRoute = self::add($url, $controller, "index");
		self::add($url . "/send", $controller, "send", $mainRoute);
		return $mainRoute;
	}


	// /ссылка база / {action} / {key_name} / {key_name} ... 
	// user/{action: index}/{user_id}
	// blog/{post_id} - если нет action - action = index
	// page/{page_id}
	static function addGroup ($url, $controller){
		$url = str_replace('{', '', $url);
		$url = str_replace('}', '', $url);
		$url = explode('/', $url);
		echo PP::echo($url);
		$mainUrl= '/' . $url[1];
		$path = array();
		for($i = 2; $i < sizeof($url); $i++) {
			// Проверить, 
			// Строю массив аргументов
			$path[] = $url[$i];
		}
		$route = self::add('/' . $url[1], $controller);
		$route->addPath($path);

		return $route;
	}

	
	static function resource ($url, $controller){
		$mainRoute = self::add($url, $controller, "index");
		self::add($url . "/create", $controller, "create", $mainRoute);
		self::add($url . "/store", $controller, "store", $mainRoute);
		self::add($url . "/show", $controller, "show", $mainRoute);
		self::add($url . "/edit", $controller, "edit", $mainRoute);
		self::add($url . "/update", $controller, "update", $mainRoute);
		self::add($url . "/destroy", $controller, "destroy", $mainRoute);
		// self::add($url . "/send", $controller, "send", $mainRoute);
		return $mainRoute;
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
	static function add($url, $controller, $action = "index", $parent_id = null){
		self::$routes[$url] = new RouteEl ($url, $controller, $action, $parent_id);
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

	// Если у меня есть статический маршрут
	if(isset(self::$routes[$url])){


		// Если есть родительский роутер
		if (!is_null(self::$routes[$url]->parent_id)) {
			if (is_array(self::$routes[$url]->parent_id->middleware)) { // Если у родителя массив посредников
				if (is_array(self::$routes[$url]->middleware)) { // Если посредники есть и там и там, объеденить

					array_merge (self::$routes[$url]->middleware, self::$routes[$url]->parent_id->middleware);
				} else { // если посредник только у родителя
					self::$routes[$url]->middleware = self::$routes[$url]->parent_id->middleware;
				}
			}
		}



		// Если у меня есть в маршруте посредники, создать каждый из них
		if (is_array(self::$routes[$url]->middleware)) {
			for ($i = 0; $i < sizeof(self::$routes[$url]->middleware); $i++){
				// Создаю новый класс по названию, записанному в переменную
				$tmp = "\App\Middleware\\" . self::$routes[$url]->middleware[$i];
				echo $tmp;
				$middleware[$i] = new $tmp();
			}	
		}
		// Возвращаю экземпляр главного контроллера, передавая ему тот метод
		// который нужно вызвать
		return new self::$routes[$url]->controller(self::$routes[$url]->action, self::$routes[$url]->arg);
	}

	$url = explode("/", $url);

	if(isset(self::$routes['/'.$url[1]])) {
		echo "<p>Динамический маршрут</p>";
		$arg = array();
		echo "<p>Путь маршрута</p>";
		echo PP::echo(self::$routes['/'. $url[1]]->path);		
		$action = self::$routes['/'.$url[1]]->action;

		if (is_array(self::$routes['/'. $url[1]]->path)) {
			for ($i = 0; $i < sizeof(self::$routes['/'.$url[1]]->path); $i++){
				if (self::$routes['/'.$url[1]]->path[$i] =="action") {
					$action = $url[$i+2];
				} else {
					$arg [self::$routes['/'.$url[1]]->path[$i]] = $url[$i+2];
				}
			}
		}
		echo "<p>Разбор пути</p>";
		echo PP::echo($arg);
		// Если у меня есть в маршруте посредники, создать каждый из них
		if (is_array(self::$routes['/'.$url[1]]->middleware)) {
			for ($i = 0; $i < sizeof(self::$routes['/'.$url[1]]->middleware); $i++){
				// Создаю новый класс по названию, записанному в переменную
				$tmp = "\App\Middleware\\" . self::$routes['/'.$url[1]]->middleware[$i];
				echo $tmp;
				$middleware[$i] = new $tmp();
			}	
		}
		return new self::$routes['/'.$url[1]]->controller($action, $arg);

	}

		echo "url = ";
		echo PP::echo($url);


		echo "<p> Router table </p>";
		echo PP::echo(self::$routes);
		

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