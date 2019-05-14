<?php
namespace App\Layout;

/**
 * 
 */
class SidebarController extends \Kernel\Base\BaseController
{
	public static $data;
	public static $tpl;

	public static function buildAsideData (){
		$mainMenu = new \App\Navigation\NavigationController();
		self::$data['mainMenu'] = $mainMenu->buildMenu('mainMenu',"createMenu");
		if (!isset(self::$data ['pageTitle']))
			self::$data ['pageTitle'] = " My Slogan ";
	}


	public static function getContent () {
		
		self::buildAsideData();
		return self::render (self::$tpl, self::$data);
	}
}
SidebarController::$tpl = 'aside.tpl.php';