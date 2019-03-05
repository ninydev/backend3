<?php
//var_dump($data);

function BuildUrl($item){
			// Построение ссылки
		$url = $_SERVER['PHP_SELF'];
		$get = array();

		if (isset($item['controller'])) {
			$get[] = "controller=" . $item['controller'];
		}

		if (isset($item['action'])) {
			$get[] = "action=" . $item['action'];
		}

		if (isset($item['arg'])) {
			$arg = array();
			foreach ($item['arg'] as $keya => $valuea) {
				$arg[]=  $keya . "=" . $valuea;
			}
			$get[] = implode ('&',$arg);
		}

		$url.= '?' . implode ('&', $get);
		return $url;
}



 function BuildItem($data, $parent_id) {
	$res = "\n<ul>";

	foreach ($data as $key => $item) {
		if ($item['parentId'] == $parent_id){
			$res_a = '<a href="' . BuildUrl($item) . '" title="' . $item['slug'] . '" >' . $item['text'] . "</a>" ;
			$res.= "<li>" . $res_a;

			if ($item['hasCildren']){
				$res.= BuildItem($data, $key);
			}
			$res.= "</li>\n";
		}
	}
	$res.= "</ul>\n";

	return $res;
}


echo BuildItem($data, 0);


?>


<?php
/*

		<nav id="menuMain" class="col-lg-8">
			<ul>
				<li><a href="<?=$_SERVER['PHP_SELF']?>">Home</a></li>
				<li><a href="#Services">Services</a></li>
				<li><a href="<?=$_SERVER['PHP_SELF']?>?controller=page&action=index&page_id=1">About</a></li>
				<li><a href="#Works">Works</a></li>
				<li><a href="#Blog">Blog</a></li>
				<li><a href="#Clients">Clients</a></li>
				<li><a href="<?=$_SERVER['PHP_SELF']?>?controller=contactform">Contact</a></li>
			</ul>
		</nav>

*/