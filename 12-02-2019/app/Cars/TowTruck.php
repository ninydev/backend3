<?php

namespace App\Cars;
use App\Cars\Truck;

/**
 * 
 */
class TowTruck extends Truck {

	public static $_self;
	public $test;
    public static function getInstance() {
          if (!self::$_self) {
              self::$_self = new self();
          }
          return self::$_self;
    }



	private function __construct() {
		echo " Создан эвакуатор ";
	}

	private function __clone()
      {
          // Отключаем клонирование
      }
    private function __wakeup()
      {
          // Отключаем расширение
      }


}