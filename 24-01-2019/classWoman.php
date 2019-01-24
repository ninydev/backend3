<?php

namespace IraDev\Planet;

class People {
	static $count;

	static function getClassName (){
		return __CLASS__;
	}


	public function __construct ($name){ // Выполняется один раз в момент создания обьекта
		echo " Этот обьект создан " . __NAMESPACE__ ."<br/>";

		$this->createNatal();
		echo " Гороскоп составлен " . $this->goroskop;
		// обращение впрямую $this->name = $name;
		$this->setName($name);
		self::$count++; // Увеличить счетчик людей в матрице. Обращение к статике из класса
	}



	public function __destruct (){
		echo " Пипл " . $this->name .  " все ";
	}


	public $name;
	public function getName () { return $this->name;} // Вернуть Имя
	public function setName ($name) { $this->name = $name;} // Назначить имя

	private $blood;
	public function getBlood () { return $this->blood;} // Вернуть кровь
	public function setBlood ($blood) { $this->blood = $blood;} // Назначить кровь

	private $goroskop;
	private function createNatal (){ $this->goroskop = rand(0,10);}

}

// 1. Обращение к статической переменной снаружи
People::$count = 0;