<?php
use App\Layout\Responce;
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. 
| Подключение Composer для работы со сторонними библиотеками
| Настройка автоподключения классов и прочих няжек
|
*/
include_once ("../vendor/autoload.php");
//include_once('session.inc.php');
//include_once('coocies.inc.php');

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| Загрузка ядра системы. Создание необходимых классов
|
*/
include_once ("../Kernel/app.boot.php");

echo Responce::renderPage();
