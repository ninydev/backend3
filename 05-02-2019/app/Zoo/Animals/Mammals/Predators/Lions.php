<?php
namespace App\Zoo\Animals\Mammals\Predators;
use App\Zoo\Animals\Mammals\Predators;

/**
 * 
 */
class Lions extends Predators
{
	function __construct(){
		$this->pub_hp = " Кошачий - у него 9 жизней ";
		parent::__construct();
	}

	public function doEat (){
		echo __CLASS__ .  " Лев ест зебр ";
		parent::doEat();
	}
}