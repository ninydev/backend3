<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 02.05.2019
 * Time: 17:20
 */

namespace Kernel\DataBase;


use Kernel\Base\ModelBase;

class Power_type extends ModelBase
{
    public function __construct()
    {
        $arrName = explode("\\", strtolower(get_class($this)));
        $this->table = $arrName[sizeof($arrName)-1];

        $this->viewFildsAll = array("id", "name");
        $this->viewFildsAllAlter = array("#", "Название");

        $this->editFilds = array("name");
        $this->editFildsAlter = array("Название");

        $this->addFilds = array("name");
        $this->addFildsAlter = array("Название");
    }
}