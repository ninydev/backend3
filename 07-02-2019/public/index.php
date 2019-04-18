<?php
namespace App\Cars;
include_once ("../vendor/autoload.php");
use App\Service\PP; // Для вывода PP::echo ($var)

//use App\Cars;


$sedan = new Sedan ();
$cabriolet = new Cabriolet ();
$dump = new DumpTruck ();
$tractor = new Tractor ();


echo "<br /><br /> <hr />";

PP::echo ($sedan);
PP::echo ($cabriolet);
PP::echo ($dump);
PP::echo ($tractor);

$cabriolet->getTransmissionType();
$cabriolet->getOil();
$cabriolet->getTransmissionOil();

// $tractor->makeConnector();





