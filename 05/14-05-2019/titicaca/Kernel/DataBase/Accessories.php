<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 03.05.2019
 * Time: 13:29
 */

namespace Kernel\DataBase;


use Kernel\Base\ModelBase;

class Accessories extends ModelBase
{
    public function __construct()
    {
        $arrName = explode("\\", strtolower(get_class($this)));
        $this->table = $arrName[sizeof($arrName)-1];

        $this->viewFildsAll = array("id", "name", "cost");
        $this->viewFildsAllAlter = array("#", "Название", "Цена");

        $this->editFilds = array("name", "cost");
        $this->editFildsAlter = array("Название", "Цена");

        $this->addFilds = array("name", "cost");
        $this->addFildsAlter = array("Название", "Цена");
    }
}