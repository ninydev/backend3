<?php
error_reporting( E_ALL );
ini_set('display_errors', 1);


echo "<h1> Понятие NameSpace </h1>";

include("classPeople.php");
include("classWoman.php");


use NiNydev\Peoples\People;
//namespace NiNydev\Peoples;




// $vasya = new People;

$sasha = new People("Саша");
$sasha->setName ("Саша");
$sasha->setBlood("3 +");

$ira = new IraDev\Planet\People("Ира");
$ira->setName ("Ира");
$ira->setBlood("2 +");
$ira1 = new IraDev\Planet\People("Ира1");
$ira2 = new IraDev\Planet\People("Ира2");


echo "<p> public: " . $sasha->name . " + " . $ira->name ."</p>";
// echo "<p> private: " . $sasha->blood . " + " . $ira->blood ."</p>";


//echo "<h1>" . $sasha->getBlood() . " + " . $ira->getBlood() ."</h1>";


$people[0] = $sasha;
$people[1] = $ira;

echo "<ul>";
for ($i = 0; $i < sizeof($people); $i++){
	echo "<li>" . $people[$i]->getName() . "</li>";
}
echo "</ul>";

echo "<footer> Всего людей в матрице ". " Имя класса ";
echo People::getClassName() . " ";
echo People::$count . " <br>";
echo IraDev\Planet\People::getClassName(). " ";
echo IraDev\Planet\People::$count;
echo "</footer>";