<?php
namespace App\Homepage;
use App\Config;
use App\Layout\HeaderController;
/**
 * 
 */
class HomepageController extends \Kernel\Base\BaseController
{
    

    var $Model;
	var $content='';
	function __construct($action = "index"){
		if ($action == "index") { $this->index(); return; }; // Нет нужного метода
		if ($action == "send") { $this->send (); return;};
	}
	public function index (){
		$data['pageTitle'] = " Homepage";
		HeaderController::$data ['pageTitle'] = "Homepage";
		HeaderController::$tpl = 'header_home.tpl.php';
		$this->content =  self::render ('homepage.tpl.php', $data);
	}

    
	function getContent () {return $this->content;}
}
