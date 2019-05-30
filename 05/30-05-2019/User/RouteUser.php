<?php
namespace User;

class RouteUser {

    private $url;
    public $action; // Что делать
    public $param; // что передать

    public function getRegisterLink(){
        return $this->url . "?doUserAction=register";
    }

    public  function getLoginLink () {
        return $this->url . "?doUserAction=login";
    }


    private function __construct (){
        //var_dump($_SERVER);
        // mysite.com/user/verify/{token} --> C->checkEmail($token)
        $url = explode("?", $_SERVER['REQUEST_URI']);
        $this->url = $url[0];
        if (isset($_GET["doUserAction"])) {
            $this->action = $_GET["doUserAction"];
        } else {
            $this->action = "index";
        }
        if (isset($_POST["doUserAction"])){
            if ($_POST["doUserAction"] == "registerCreate"){
                $this->action = "create";
            }
            if ($_POST["doUserAction"] == "loginInto") {
                $this->action = "loginInto";
            }

        }
    }
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

