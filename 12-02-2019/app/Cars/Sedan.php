<?php

namespace App\Cars;
use App\Cars\PCar;

/**
 * 
 */
class Sedan extends PCar {
	public $var;
	    function echoName () { echo "Sedan";}
//    public static function createNewCarByType($carType='') {
//		return new static(); // найти пример для чего используется	
//	}

}