<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 26.04.2019
 * Time: 20:53
 */

// namespace Kernel\DataBase;


// use Kernel\Base\ModelBase;

class Color extends BaseModelTable
{
    public function __construct()
    {
        $arrName = explode("\\", strtolower(get_class($this)));
        $this->table = $arrName[sizeof($arrName)-1].'s';

        $this->viewFildsAll = array("id", "name", "rgb", "code" );
        $this->viewFildsAllAlter = array("#", "Название", "RGB", "Код");

        $this->editFilds = array("name", "rgb", "code");
        $this->editFildsAlter = array("Название", "RGB", "Код");

        $this->addFilds = array("name", "rgb", "code");
        $this->addFildsAlter = array("Название", "RGB", "Код");
    }
}