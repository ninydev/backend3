<?php


$menu; // Место для меню
$count  = 1;


function addEl($url,$text, $parent = 0 )
{

	GLOBAL $menu, $count;
	$menu [$count]['url'] = $url;
	$menu [$count]['text'] = $text;
	$menu [$count]['parent'] = $parent;
	$menu [$count]['children'] = false;

	if ($parent != 0 ){
		$menu [$parent]['children'] = true;
	}

 	$count++;
	return $count-1;	
}


function echoMenu ($parent = 0){
	
	GLOBAL $menu, $count;
	$str = getMenuHTML();

	if (strlen($str) > 0 ) {
		return " <!-- Востановленно из файла -->" . $str;
	}
	// ут может быть обращение к базе, куча версий и тд
	$ret = '<ul>';
	for($i = 1;$i < $count;$i++){
		if ($menu[$i]['parent'] == $parent){
			$ret.= '<li><a href="' . $menu[$i]['url'] . '">' . $menu[$i]['text'] . '</a>';
			if ($menu[$i]['children'] == true){
				$ret.= echoMenu($i);
			}

			$ret.='</li>';	
		}

	}
	$ret.= '</ul>';

	saveMenuHTML($ret);

	return $ret;
}

$filePathJson = "../database/data/menu.json";

function saveMenuJson(){
	GLOBAL $menu, $filePathJson;
	$handle = fopen($filePathJson, "w");
	fwrite($handle, json_encode($menu));
	fclose($handle);
}

function loadMenuJson() {
	GLOBAL $menu,$filePathJson, $count ;
	$str = file_get_contents ($filePathJson);
	$menu = json_decode( $str , true);
	$count = sizeof($menu);

}

$filePathHTML = "../public/cache/menu.html";

function saveMenuHTML($html) {
	GLOBAL $filePathHTML;
	$handle = fopen($filePathHTML, "w");
	fwrite($handle, $html);
	fclose($handle);
}

function getMenuHTML (){
	GLOBAL $filePathHTML;
	return file_get_contents ($filePathHTML);
}









