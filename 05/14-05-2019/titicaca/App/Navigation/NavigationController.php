<?php
namespace App\Navigation;
use App\Config;

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
    

    public  function buildMenu($menuName = 'mainMenu', $method){
        $this->Model = new NavigationModel();
        $this->Model->$method();     
        $this->content = self::render(strtolower($this->menuName) . '.tpl.php', $this->Model->arrMenu);

        return $this->content;
    }


	public function getContent () {
        
        return $this->content;
    }
}