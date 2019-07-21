<?php
echo "<div>" . __FILE__ . "</div>" ;

function controlPage(){
	echo "<p> Work </p>";
}

add_action ("ninydev_startpage", "controlPage");


// add_action("storefront_header", "controlPage" );
add_action("storefront_header", "controlPage", 25 );