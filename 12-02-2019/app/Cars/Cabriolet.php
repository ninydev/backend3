<?php

namespace App\Cars;
use App\Cars\PCar;

use App\Cars\Transmission;
use App\Cars\Engine;



/**
 * 
 */
class Cabriolet extends PCar {

	    use Transmission, Engine {
	    Engine::getOil insteadof Transmission;	    
        Transmission::getOil as getTransmissionOil;
        //Engine::getOil as EngineOil;
    }

    function echoName () { echo "Cabriolet";}

//    public static function createNewCarByType($carType='') {
//		return new self(); // Создаст экземпляр класса Cabriolet (себя)	 
//	}

}