<?php
include_once ("../vendor/autoload.php");


use App\Zoo\Animals\Mammals\Omnivores\Elephants;
use App\Zoo\Animals\Mammals\Predators\Lions;
use App\Zoo\Animals\Reptiles\Snakes\Pythons;
use App\Zoo\Animals\Animals;

//$a = new Animals();
//$a->doEat();

// echo "<p> Животных создано " . Animals::$countAnimals . " </p>";


echo "<br />Elephants: ";
$e = new Elephants();
$e->doEat();
// var_dump($e);

echo "<br />Lions: ";
$l = new Lions();
$l->doEat();
// var_dump($l);

echo "<br />Pythons: ";
$p = new Pythons();
$p->doEat();
// var_dump($p);


Animals::getCountAnimals();

/*
use App\Simpleform\Form;

// $f = new \App\Simpleform\Form();
$f = new Form("FormSendMail");


$f->addInput ("Name");
$f->addInput ("Phone");
$f->addInput ("Email");
$f->addTextArea("Message");
$f->addInput ("Send", "submit", "Send");


echo $f->getForm();

*/