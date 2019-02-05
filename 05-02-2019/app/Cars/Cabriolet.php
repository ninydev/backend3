<?php

namespace App\Cars;
use App\Cars\PCar;

use App\Cars\Transmission;



/**
 * 
 */
class Cabriolet extends PCar {
	use Transmission; // Использовать коробку передач
}