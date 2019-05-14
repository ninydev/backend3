<?php
namespace App\ContactForm;
use App\Config;
use App\Layout\HeaderController;
use Kernel\Router;
/**
 * 
 */
class CFController extends \Kernel\Base\BaseController
{
    

    var $Model;
	var $content;
    function __construct($action = "index"){
        if ($action == "index") { $this->index(); return; }; // Нет нужного метода
        if ($action == "send") { $this->send (); return;};
    }
	public function index (){

        $data['pageTitle'] = "Contact Form";
        HeaderController::$data ['pageTitle'] = "Contact form";
        $data['formAction'] = Router::getFormAction();
        $this->content =  self::render ('contact.tpl.php', $data);

	}
	public function send (){

        $this->Model = new CFModel();
        $this->Model->sendmail();

        HeaderController::$data ['pageTitle'] = "Contact form send";
        $data['pageTitle'] = "Contact Form Send";
        $this->content =  self::render ('contact_send.tpl.php', $data);

    }
    
	function getContent () {return $this->content;}
}
