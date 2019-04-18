<?php
include_once ("../vendor/autoload.php");

use App\Simpleform\Form;

// $f = new \App\Simpleform\Form();
$f = new Form("FormSendMail");


$f->addInput ("Name");
$f->addInput ("Phone");
$f->addInput ("Email");
$f->addTextArea("Message");
$f->addInput ("Send", "submit", "Send");


echo $f->getForm();