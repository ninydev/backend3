<?php
require_once ("vendor/autoload.php");

$smarty = new Smarty();
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("msgError", "Error");
$smarty->assign("Name", "Olexandr Nykytin");
$smarty->assign("States", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));




    $smarty->display('index.tpl');
