<?php
//echo var_dump($data);
if(isset($_GET['page_id']))
    $Page_id = $_GET['page_id'];
else
    $Page_id = 1;

echo \Kernel\Router::BuildItemButton($data, 0);
?>
