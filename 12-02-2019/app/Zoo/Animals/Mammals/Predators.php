<?php
namespace App\Zoo\Animals\Mammals;
use App\Zoo\Animals\Mammals\Mammals;

/**
 * 
 */
class Predators  extends Mammals
{


	public function doEat (){
		echo " Ест мясо ";
		parent::doEat();
	}	
}