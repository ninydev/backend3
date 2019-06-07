<?php
namespace App\Page;

/**
 * 
 */
class PageController 
{
	var $Model;
	var $content;
	function __construct($action = "index", $arg = 1){
		// var_dump($arg);
		if (isset($arg["page_id"])) $page_id = $arg["page_id"];
        $this->Model=new PageModel ();
		if (is_numeric($page_id)) {
            $this->getById($page_id);
        } else {
            $this->getBySlug($page_id);
        }
	}


    function getById($page_id){
        $data = $this->Model->getPageByID($page_id);
        $this->content = $data ['body'];
    }

    function  getBySlug ($slug){
        $data = $this->Model->getPageBySlug($slug);
        $this->content = $data ['body'];
    }

	function getContent () {return $this->content;}

}