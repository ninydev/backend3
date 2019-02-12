<?php
namespace App\Zoo\Animals\Mammals\Omnivores;
use App\Zoo\Animals\Mammals\Omnivores;

/**
 * 
 */
final class Elephants extends Omnivores
{
	
	function __construct()
	{
		$this->pub_hp = " У слона 1 жизнь. Он не кот";

		echo " priv_hp " . $this->getPrivate();


		echo "<p> Создан экземпляр слона </p>";
						parent::__construct();

	}

	public function doEat (){
		echo __CLASS__ .  "Конкретно слон ест бананы";
		parent::doEat();
	}

}