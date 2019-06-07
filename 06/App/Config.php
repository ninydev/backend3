<?php
namespace App;

/**
 * 
 */
final class Config {

  // Путь к файлам View (шаблон)
  public static $pathToTemplate = __DIR__ . '/../resources/view/mydesign/';
  public static $pathToStorage = __DIR__ . '/../storage/';


  // Имя сайта
  public static $appSiteName = " My Site ";

  // Настройки почты
  public static $emailSmtp = "smtp.google.com";
  public static $emailUser = "keeper@ninydev.com";
  public static $emaiPswd = "";


    // Настройки базы
    public static $DBhost = "localhost";
    public static $DBport = 3306;
    public static $DBname = "c1backend3";
    //public static $DBname = "c1user";
    public static $DBuser = "c1laravel";
    public static $DBpswd = "QweAsdZxc!23";
    //*------------------------------------------------------------



//*------------------------------------------------------------
// Обеспечение единственной копии класса      
      private function __construct() {}
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

// $Config = Config::getInstance();
