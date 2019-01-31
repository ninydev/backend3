<?php
namespace App\Zoo\Animals\Mammals\Predators;
use App\Zoo\Animals\Mammals\Predators;

/**
 * 
 */
class Lions extends Predators
{

	public function doEat (){
		echo __CLASS__ .  " Лев ест зебр ";
		parent::doEat();
	}
}