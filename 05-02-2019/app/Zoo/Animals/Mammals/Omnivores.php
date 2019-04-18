<?php
namespace App\Zoo\Animals\Mammals;
use App\Zoo\Animals\Mammals\Mammals;

/**
 * 
 */
class Omnivores  extends Mammals
{
	
	function __construct()
	{
		parent::__construct();
		echo "<p> Появилось травоядное </p>";
	}
}