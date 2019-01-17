<?php

//*--------------------------------------------------------------
function parserGuest (){
	$ret ="";
	$fileBase ="/storage/files/tmp"; // базовая папка
	$fileName = "guest.txt"; // имя файла
	$filePath= __DIR__ . "/../.." . $fileBase . "/" . $fileName;

	$ret.= '<p class="alert alert-info" >читаю файл: ' . $filePath . '</p>';

//	$fromFile = file ($filePath);
//	$ret.= PP ($fromFile);

	$handle = @fopen($filePath, "r");
	if ($handle) {// если файл открылся
	    while (($buffer = fgets($handle)) !== false) { // прочесть строку
	        $ret.= $buffer;
	        // тут нужно разобраться - это телефон или мыло, и вывести на экран
	        // номер или мыло и фразу - куда пойдет  smsGate или mailGate
	    }
	    if (!feof($handle)) {
	        $ret.= "Ошибка: fgets() неожиданно потерпел неудачу\n";
	    }
	    fclose($handle);
	}


	//$ret.= $fromFile;
	return $ret;
}


function parserPhoto () {
	$ret ="";
	$filesBase ="/storage/files/tmp"; // базовая папка
	$filesPath= __DIR__ . "/../.." . $filesBase . "/";
	$ret.= '<p class="alert alert-info" >читаю каталог: ' . $filesPath . '</p>';
	$arr = scandir($filesPath);
	$ret.= PP($arr);
	if ( ! function_exists( 'exif_imagetype' ) ) {
		$ret.= '<p class="alert alert-error" > Модули не подключены <br>
		extension=php_mbstring.dll
		extension=php_exif.dll
  		</p>';
  		return $ret;
	}

	$ret.= "<ul>";

	for ($i = 0; $i <sizeof($arr); $i++){
			if(exif_imagetype($filesPath . $arr[$i])){ // проверяем является ли файл картинкой
					$ret.= '<li><img src="'.$filesBase . '/' . $arr[$i].'"width="50">'; // выводим картинку
					$ret.= date("F d Y H:i:s.", fileatime($filesPath . $arr[$i]) );

        			list($width, $height, $type, $attr) = getimagesize($filesPath . $arr[$i] );
        			$ret.= PP (getimagesize($filesPath . $arr[$i] ) );

        			$f = fopen($filesPath . $arr[$i], "r");
        			$ret.= PP (fstat($f));
        			fclose($f);


					$ret.= '</li>';


				}
	}

	$ret.="</ul>";

	return $ret;
}
