<?php
namespace App\Layout;
use App\Config;

/**
 * 
 */
class FooterController extends \Kernel\Base\BaseController
{
	public static $data;
	public static $tpl;

	public static function buildFooterData (){
		$footerMenu = new \App\Navigation\NavigationController('FooterMenu');
		self::$data['footerMenu'] = $footerMenu->buildMenu('footerMenu','createFooterMenu');
	}


	public static function getContent () {
		self::buildFooterData();
		return self::render (self::$tpl, self::$data);
	}
}


FooterController::$tpl = 'footer.tpl.php';