<?php

namespace App\Cars;

/**
 * 
 */
trait Transmission {
	public function getTransmissionType (){
		echo "<p> Есть коробка передач </p>";
	}
	
}


/*
trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}
*/