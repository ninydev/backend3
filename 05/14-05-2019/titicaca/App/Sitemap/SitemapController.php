<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 28.03.2019
 * Time: 15:53
 */

namespace App\Sitemap;
use App\Layout\HeaderController;
/**
 *
 */
class SitemapController  extends \Kernel\Base\BaseController
{
    function __construct($action = "index"){
        if ($action == "index") { $this->index(); return; };
    }
    public function index (){
        $data['pageTitle'] = "Sitemap";
        HeaderController::$data ['pageTitle'] = " Sitemap ";
        $data['sitemap'] = \Kernel\Lib\PP::echo(\Kernel\Router::$routes, true);
    /*    $data['sitemap'] = "<ul>";
        foreach (\Kernel\Router::$routes as $url => $route) {
            if ($route->showInSiteMap) {
                $data['sitemap'].= "<li>";
                $data['sitemap'].= $url . " " . $route->name;
                $data['sitemap'].= "</li>";
            }
        }
        $data['sitemap'].= "</ul>";
    */
        $this->content =  self::render ('sitemap.tpl.php', $data);
    }
    /*
    |--------------------------------------------------------------------------
    | Информация, которую вернет мой контроллер
    |--------------------------------------------------------------------------
    |
    */
    var $content;
    function getContent () {return $this->content;}
}