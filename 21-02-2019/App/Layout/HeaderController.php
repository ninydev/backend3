<?php
namespace App\Layout;

/**
 * 
 */
class HeaderController  extends \Kernel\Base\BaseController
{
	public static $data;

	public static function buildHeadData (){
		self::$data ['pageTitle'] = " My Page - must change by Page Controller";
	}


	public static function getContent () {
		self::buildHeadData();
		return self::render ('header.tpl.php', self::$data);
	}
}