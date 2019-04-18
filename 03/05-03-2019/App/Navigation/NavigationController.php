<?php
namespace App\Navigation;

/**
 * 
 */
class NavigationController extends \Kernel\Base\BaseController
{
	var $Model;
	var $content;
	var $menuName;

	function __construct($menuName = "mainMenu"){
		$this->menuName = $menuName;
	}

	function buildMenu(){
		$this->Model = new NavigationModel();
		$this->Model->createSimpleMenu();
		$this->content = self::render('mainmenu.tpl.php', $this->Model->arrMenu);
		return $this->content;
	}


	function getContent () {return $this->content;}

}