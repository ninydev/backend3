<?php
namespace App\Navigation;

use App\Config;

/**
 * 
 */
class NavigationModel
{
    var $arrMenu;
    public function createMenu()
    {
/*      $this->arrMenu[1]['controller'] = "";
        $this->arrMenu[1]['action'] = "";
        $this->arrMenu[1]['arg'] = array('page_id' =>  1);
        $this->arrMenu[1]['slug'] = "";
        $this->arrMenu[1]['target'] = "_top";
        $this->arrMenu[1]['js']= array('onclick' =>  '');
        $this->arrMenu[1]['class'] = "";
        $this->arrMenu[1]['id'] = "";
        $this->arrMenu[1]['hasChildren'] = false;
        $this->arrMenu[1]['parentId'] = 0;
        $this->arrMenu[1]['text'] = ""; */

        //HomePage
        $this->arrMenu[1]['controller'] = "HomepageController";
        $this->arrMenu[1]['action'] = "index";
        $this->arrMenu[1]['arg'] = array('page_id' =>  1);
        $this->arrMenu[1]['slug'] = "index.html";
        $this->arrMenu[1]['target'] = "_top";
        //$this->arrMenu[1]['js']= array('onclick' =>  '');
        $this->arrMenu[1]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[1]['id'] = "";
        $this->arrMenu[1]['hasChildren'] = false;
        $this->arrMenu[1]['parentId'] = 0;
        $this->arrMenu[1]['text'] = "Home";


        //News
        $this->arrMenu[2]['controller'] = "post";
        $this->arrMenu[2]['action'] = "index";
        $this->arrMenu[2]['arg'] = array('page_id' =>  'post');
        $this->arrMenu[2]['slug'] = "news.html";
        $this->arrMenu[2]['target'] = "_top";
        //$this->arrMenu[2]['js']= array('onclick' =>  '');
        $this->arrMenu[2]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[2]['id'] = "";
        $this->arrMenu[2]['hasChildren'] = false;
        $this->arrMenu[2]['parentId'] = 0;
        $this->arrMenu[2]['text'] = "News";

        //About
        $this->arrMenu[3]['controller'] = "PageController";
        $this->arrMenu[3]['action'] = "index";
        $this->arrMenu[3]['arg'] = array('page_id' =>  '2');
        $this->arrMenu[3]['slug'] = "about.html";
        $this->arrMenu[3]['target'] = "_top";
        //$this->arrMenu[3]['js']= array('onclick' =>  '');
        $this->arrMenu[3]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[3]['hasChildren'] = false;
        $this->arrMenu[3]['parentId'] = 0;
        $this->arrMenu[3]['text'] = "About";


        //Servises
        $this->arrMenu[5]['controller'] = "PageController";
        $this->arrMenu[5]['action'] = "index";
        $this->arrMenu[5]['arg'] = array('page_id' =>  '3');
        $this->arrMenu[5]['slug'] = "service.html";
        $this->arrMenu[5]['target'] = "_top";
        //$this->arrMenu[3]['js']= array('onclick' =>  '');
        $this->arrMenu[5]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[5]['hasChildren'] = false;
        $this->arrMenu[5]['parentId'] = 0;
        $this->arrMenu[5]['text'] = "Services";

        //Cars
        $this->arrMenu[7]['controller'] = "PageController";
        $this->arrMenu[7]['action'] = "index";
        $this->arrMenu[7]['arg'] = array('page_id' =>  'cars');
        $this->arrMenu[7]['slug'] = "cars.html";
        $this->arrMenu[7]['target'] = "_top";
        //$this->arrMenu[3]['js']= array('onclick' =>  '');
        $this->arrMenu[7]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[7]['hasChildren'] = false;
        $this->arrMenu[7]['parentId'] = 0;
        $this->arrMenu[7]['text'] = "Cars";

        //SiteMap
        $this->arrMenu[6]['controller'] = "PageController";
        $this->arrMenu[6]['action'] = "index";
        $this->arrMenu[6]['arg'] = array('page_id' =>  'sitemap');
        $this->arrMenu[6]['slug'] = "sitemap.html";
        $this->arrMenu[6]['target'] = "_top";
        //$this->arrMenu[3]['js']= array('onclick' =>  '');
        $this->arrMenu[6]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[6]['hasChildren'] = false;
        $this->arrMenu[6]['parentId'] = 0;
        $this->arrMenu[6]['text'] = "Site Map";

        //ContactForm
        $this->arrMenu[4]['controller'] = "CFController";
        $this->arrMenu[4]['action'] = "index";
        //$this->arrMenu[4]['arg'] = array('page_id' =>  'contactform');
        $this->arrMenu[4]['slug'] = "contact.html";
        $this->arrMenu[4]['target'] = "_top";
        //$this->arrMenu[3]['js']= array('onclick' =>  '');
        $this->arrMenu[4]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[4]['hasChildren'] = false;
        $this->arrMenu[4]['parentId'] = 0;
        $this->arrMenu[4]['text'] = "Написать нам";


        //return $this->arrMenu;
    }

    public function createFooterMenu()
    {
        //Warranty
        $this->arrMenu[1]['controller'] = "page";
        $this->arrMenu[1]['action'] = "index";
        $this->arrMenu[1]['arg'] = array('page_id' =>  'warranty');
        $this->arrMenu[1]['slug'] = "warranty.html";
        $this->arrMenu[1]['target'] = "_top";
        //$this->arrMenu[1]['js']= a rray('onclick' =>  '');
        //$this->arrMenu[1]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[1]['id'] = "";
        $this->arrMenu[1]['hasChildren'] = false;
        $this->arrMenu[1]['parentId'] = 0;
        $this->arrMenu[1]['text'] = "Warranty";

        //Service
        $this->arrMenu[2]['controller'] = "page";
        $this->arrMenu[2]['action'] = "index";
        $this->arrMenu[2]['arg'] = array('page_id' =>  'services');
        $this->arrMenu[2]['slug'] = "service.html";
        $this->arrMenu[2]['target'] = "_top";
        //$this->arrMenu[2]['js']= a rray('onclick' =>  '');
        //$this->arrMenu[2]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[2]['id'] = "";
        $this->arrMenu[2]['hasChildren'] = false;
        $this->arrMenu[2]['parentId'] = 0;
        $this->arrMenu[2]['text'] = "Service";

        //About
        $this->arrMenu[3]['controller'] = "page";
        $this->arrMenu[3]['action'] = "index";
        $this->arrMenu[3]['arg'] = array('page_id' =>  '2');
        $this->arrMenu[3]['slug'] = "about.html";
        $this->arrMenu[3]['target'] = "_top";
        //$this->arrMenu[3]['js']= a rray('onclick' =>  '');
        //$this->arrMenu[3]['class'] = "btn btn-light btn-sm btn-block";
        //$this->arrMenu[3]['id'] = "";
        $this->arrMenu[3]['hasChildren'] = false;
        $this->arrMenu[3]['parentId'] = 0;
        $this->arrMenu[3]['text'] = "About";

    }
        
}