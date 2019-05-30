<?php

namespace User;
use User\ModelUser;

class ControllerUser extends BaseController {

    private $content;
    private $error;

    public function isUserLogin(){
        // $_SESSION['user_id'] = 11;
        var_dump($_SESSION['user_id']);
        // var_dump(session_status());

        if (session_status() == PHP_SESSION_ACTIVE and isset ($_SESSION['user_id']) and $_SESSION['user_id'] != -1) {
            return true;
        }
        else {
            return false;
        }


    }

    public function doStartUserSession(){
        // session_start();
        $_SESSION['user_id'] = 10;
        // echo "DoStartSession";
    }

    public function doEndUserSession(){
        unset($_SESSION['user_id']);
        session_destroy();
    }

    public  function  loginInto (){
        // Запрос в базу
        $this->doStartUserSession();
        // echo "Do Login";

    }

    public  function  login (){
        $this->content = $this->render ("login-form.tpl.php");
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
        //$this->content =
        $res = $this->Model->Get();


        $tmpModel = new ModelPostAdress();
        $res = $tmpModel->Get();

        // $this->content = $tmpModel->Get();

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
        $data = $_POST;
        $data['token'] = md5(uniqid($data["email"], true));
        $data = $this->Model->Create($data);
        $this->content = $this->Model->Create();
        $this->error = $data['errNum'] . $data['errText'];
    }



    private $Model;
    /*
     *  Одиночка
     */
    private function __construct() {
        session_start();
        //if (!$this->isUserLogin())
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