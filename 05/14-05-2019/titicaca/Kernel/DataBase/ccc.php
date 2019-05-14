<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 03.05.2019
 * Time: 13:40
 */

namespace Kernel\DataBase;


use Kernel\Base\ModelBase;

class ccc extends ModelBase
{
    public function __construct()
    {
        $this->table = "ccc"; //strtolower(get_class($this)).'s';
        //echo $this->table;
        $this->viewFildsAll = array("id", "Модель");
        $this->viewFildsAllAlter = array("#", "Название");

        //$this->editFilds = array("name", "cost");
        //$this->editFildsAlter = array("Название", "Цена");

        //$this->addFilds = array("name", "cost");
        //$this->addFildsAlter = array("Название", "Цена");
    }
}