<?php
namespace App\Post;

/**
 * 
 */
class PostController extends \Kernel\Base\BaseController
{
	public static $data;

	public static function builPostData (){
		self::$data ['pageTitle'] = " My Page - must change by Page Controller";
	}


	public static function getContent () {
		self::builPostData();
		return self::render ('media.tpl.php', self::$data);
	}
}