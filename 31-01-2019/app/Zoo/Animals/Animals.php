<?php
namespace App\Zoo\Animals;
use App\Zoo\Alives;

/**
 * 
 */
abstract  class Animals extends Alives
{
	static private $countAnimals;
	static function getCountAnimals (){
		echo "<p> Животных создано static " . self::$countAnimals . " </p>";
	}
	
	function __construct()
	{
		self::$countAnimals++;
		echo "<p> Создано животное: " . self::$countAnimals . "</p>";
	}

	public function doEat (){
		echo "Это животное ест";
	}

	final public function doDie (){
		echo "Все животные умирают одинаково";
	}

}

//Animals::$countAnimals = 0;