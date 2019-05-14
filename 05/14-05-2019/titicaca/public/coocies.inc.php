<?php



/* if(isset($_POST['bgColor']))
    $bgColor=$_POST['bgColor'];
if(isset($_POST['color']))
    $Color=$_POST['color']; */

setcookie('bgColor', $bgColor, time()+36000000);
setcookie('txColor', $txColor,  time()+36000000);
setcookie('Count', $Count,  time()+36000000);