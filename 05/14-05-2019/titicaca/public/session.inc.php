<?php

session_start();

if(isset($_POST['bgColor']))
    $bgColor=$_POST['bgColor'];
else
    $bgColor=$_COOKIE['bgColor'];

if(isset($_POST['txColor']))
    $txColor=$_POST['txColor'];
else
    $txColor=$_COOKIE['txColor'];

if(isset($_COOKIE['Count']))
    $Count = $_COOKIE['Count'];
else
    $Count = 0;

$Count++;

if(isset($_GET['clearVisit']))
    $Count = 0;

$_SESSION['bgColor'] = $bgColor;
$_SESSION['txColor'] = $txColor;
$_SESSION['Count'] = $Count;