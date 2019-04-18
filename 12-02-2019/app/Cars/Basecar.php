<?php

namespace App\Cars;

/**
 * 
 */
class Basecar {
	public static $countCar;
	public function echoName (){ echo " SomeCar";}
	final public static function createNewCarByType($carType='') {
		// echo __CLASS__;
		// $this-> - для обычного метода
		// self:: - для статического метода или поля
		self::$countCar++;
		if (self::$countCar > 20 ) {
			echo " Достигнут предел созданных машин";
			return false;
		}

		switch ($carType) {
			case 'Cabriolet':
				return new Cabriolet();
				break;
			case 'Sedan':
				return new Sedan();
				break;
			case 'DumpTruck':
				return new DumpTruck();
				break;
			case 'Tractor':
				return new Tractor();
				break;
			
			default:
				# code...
				break;
		}
		
		//return new static(); // Создаст обьект, к которому было первое обращение
		return new self (); // Возможна ошибка, поскольку нет методов предков
	}

	final public static function createGaraz($size = 10, $type = 'truck'){
		// $car = [];
		for ($i = 0 ; $i < $size; $i++) {
			if ($type == "car"){
				if (rand (0,1) == 0 ){
					$car[$i] = self::createNewCarByType ('Cabriolet');
				} else {
					$car[$i] = self::createNewCarByType ('Sedan');
				}

			} else {
				if (rand (0,1) == 0 ){
					$car[$i] = self::createNewCarByType ('DumpTruck');
				} else {
					$car[$i] = self::createNewCarByType ('Tractor');
				}

			}
			
		}
		return $car;
	}


}