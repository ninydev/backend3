<?php

namespace User;
use User\ModelUser;

class ControllerUser extends BaseController {

    private $content;
    private $error;

    public function isUserLogin(){
        return false;
    }

    public function doStartUserSession(){
    }

    public function doEndUserSession(){
    }

    public function getWiget(){
        if ($this->isUserLogin()){
            return $this->render("wiget-login.tpl.php");
        }
        else {
            return $this->render("wiget-guest.tpl.php");
        }
    }

    public function getContent(){
    return $this->content;
    }

    public function getError(){
    return $this->error;
    }

    public function index(){

    }

    public function register (){
        $this->content = $this->render("register-form.tpl.php");
    }

    public function create (){
        // Логика 
        $data = $this->Model->Create();
        $this->content = $this->Model->Create();
        $this->error = $data['errNum'] . $data['errText'];
    }



    private $Model;
    /*
     *  Одиночка
     */
    private function __construct() {
        $this->Model = new ModelUser();
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