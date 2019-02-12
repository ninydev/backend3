<?php
namespace App\Cars;
include_once ("../vendor/autoload.php");
use App\Service\PP; // Для вывода PP::echo ($var)

//use App\Cars;



echo "<br /><br /> <hr />";

// $t1 = new TowTruck();
// $t2 = new TowTruck();
$t1 = TowTruck::getInstance();
$t1->test = " Это первый эвакуатор ";

$t2 = TowTruck::getInstance();
echo "<br />" . $t2->test;

unset($t1);
unset($t2);

echo "<br />" . TowTruck::$_self->test;


$t3 = TowTruck::getInstance();
echo "<br />" . $t3->test . "\n\n";




// Обращение к статическому методу
// -> - для обычного объекта
// :: - для статического метода или поля
// $c = Basecar::createNewCarByType();
// $a = Cabriolet::createNewCarByType();

// $a->echoName();

// PP::echo ($GLOBALS);


//$c->echoName();

/*
$g1 = Basecar::createGaraz(5,'car');


for ($i = 0; $i < 5; $i++){
	 $g1[$i]->echoName();
}

echo "<hr>";

$g2 = Basecar::createGaraz(5);

for ($i = 0; $i < 5; $i++){
	$g2[$i]->echoName();
}


/*
$b = Cabriolet::createNewCarByType('Sedan');
$b->echoName();

$c = Sedan::createNewCarByType('Cabriolet');
$c->echoName();
$c->var = "test";

echo "<br /> Всего машин Basecar: " . Basecar::$countCar;
// echo "<br /> Всего машин Cabriolet: " . Cabriolet::$countCar;
*/
/*

echo "<pre>";
var_dump($GLOBALS);
echo "</pre>";

$d = $GLOBALS["c"];
unset($c);

echo "<pre>";
var_dump($GLOBALS);
echo "</pre>";

*/




