<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 26.04.2019
 * Time: 20:45
 */

// namespace Kernel\Base;


class BaseModelTable
{
    public $table;             // текущая таблица

    public $addFilds;          // доступные поля для добавления
    public $addFildsAlter;     // альтернативные названия полей для добавления
    public $editFilds;         // доступные к редактированию поля
    public $editFildsAlter;    // альтернативные названия полей к редактированию
    public $viewFilds;         // доступные только к просмотру поля
    public $viewFildsAll;      // отображаемые поля на вкладке все
    public $viewFildsAllAlter; // альтернативные названия полей

    public $sql; // Содержит запрос

    public $Where;
    public $WhereAnd;
    public $WhereOr;
    public $WhereIn;

    public $Order;
    public $Lim;

    public $PagStart;
    public $PagCount;
    public $Pag;

    // $db->Where("(`id` < 5) OR (7>6 AND 7>5)")
    public function Where ($str){
        $this->Where = $sql;
        return $this;
    }

    public function OrderBy ($o){
        $this->Order = " ORDER BY " . $o . " ";
        return $this;
    }


    // id, < , 2
    public function WhereAnd($f, $o, $s){
        $this->WhereAnd[] = $f . $o. $s;
        return $this;
    }

    public function Limit($f, $l = 0 ){
        if ($l == 0)
            $this->Lim = " LIMIT " . $f;
        else 
            $this->Lim = " LIMIT " . $f . ", " . $l;
        return $this;
    }

    public function getCount(){
        return  MySQLi_DB::getInstance()->getCount($this->table);
    }


    public function WhereOr($f, $o, $s){
        $this->WhereOr[] = $f . $o. $s;
        return $this;
    }
    /*return $this   $db->WhereAnd('created_at', '<', 5)->WhereOr('id', '>', 5)*/

    public function Get(){
        $sql = "SELECT * FROM " . $this->table;
        if (strlen($this->Where) > 0  ) {
            $sql.= " WHERE " . $this->Where;
        }
        else{
            $flagWhere = " WHERE ";
            if (is_array($this->WhereAnd)) {
                $sql.= $flagWhere . '(' . implode(") AND (", $this->WhereAnd) . ')';
                $flagWhere = "";
            }
            if (is_array($this->WhereOr)) {
                if (strlen($flagWhere) == 0 ){
                    $sql.= " OR ";
                }
                $sql.= $flagWhere . '(' . implode(") OR (", $this->WhereOr) . ')';
                $flagWhere = "";
            }            
        }

        if (strlen($this->Order) > 0) {
            $sql.= $this->Order;
        }

        if (strlen($this->Pag) > 0 ){
            $sql.= $this->Pag;
        }
        elseif (strlen($this->Lim) > 0) {
            $sql.= $this->Lim;
        }

        echo "<p> sql: " . $sql . "</p>";

        return MySQLi_DB::getInstance()->execute($sql);
    }

    public function Paginate($num) {
        $this->PagCount = $num;
        if (isset($_GET["pagStart"])) {
            $this->PagStart = $_GET["pagStart"];
            $this->Pag = " LIMIT " . $this->PagStart . ", ";
            $this->Pag.=  $this->PagStart + $this->PagCount;    
        } else {
        $this->Pag = " LIMIT " . $num ;
    }
        return $this;
    }

    public function getPaginate(){
        $str = "";
        $count = $this->getCount();
        if ($count > $this->PagCount) {

            $url = explode("?", $_SERVER['REQUEST_URI']);
            $url = $url[0] . "?";
            
            foreach ($_GET as $key => $value) {
                if ($key != 'pagStart')
                    $url.= $key . "=" . $value . "&";
            }

            $str.= "<ul>";
            $str.= '<li><a href="' . $url . 'pagStart=' . 0 . '">Start</a></li>';

            //$str.= "<li><a href=" . " " . ">Start</a></li>";
            //$str.= "<li><a href=" . " " . ">Start</a></li>";

            $str.= '<li><a href="' . $url . 'pagStart=';
            $str.= $count - $this->PagCount . '">End</a></li>';

            $str.= "</ul>";
        }

        $str.= " Count: " . $count;
        return $str;
    }



    public function All(){
        $sql = "SELECT * FROM " . $this->table;
        return MySQLi_DB::getInstance()->execute($sql);
    }

    public function getAddForm(){
        $sql = "SELECT * FROM " . $this->table . " WHERE id='1' ";
        $data['res'] = MySQLi_DB::getInstance()->execute($sql);
        $data['row'] = $data['res']->fetch_assoc();
        return $data;
    }

    public function Create(){
        $sql = "INSERT INTO " . $this->table . " ( ";
        for($i = 0; $i < sizeof($this->addFilds); $i++) {
            $arrFilds[] = "`".$this->addFilds[$i] ."`";
        }
        $sql.= implode(", " ,$arrFilds);
        $sql.= ") VALUES (";
        for($i = 0; $i < sizeof($this->addFilds); $i++) {
            $arrValues[] = "'".$_GET[$this->addFilds[$i]]."'";
        }
        $sql.= implode(", " ,$arrValues);
        $sql.=')';
        $data['res'] = MySQLi_DB::getInstance()->execute($sql);
        return $data;
    }

    public function getEditForm(){
        $data['id'] = $_GET['id'];
        $data['res'] = MySQLi_DB::getInstance()->execute("SELECT * FROM " . $this->table . " WHERE id='" . $_GET['id'] . "' ");
        $data['row'] = $data['res']->fetch_assoc();
        return $data;
    }

    public function Update(){
        $data['id'] = $_GET['id'];
        $sql = "UPDATE " . $this->table . " SET ";
        for($i = 0; $i < sizeof($this->editFilds); $i++) {
            $newValue[] = $this->editFilds[$i] ." = '" . $_GET[$this->editFilds[$i]] . "' ";
        }
        $sql.= implode(", " ,$newValue);
        $sql.= " WHERE id='" . $_GET['id'] . "' ";
        $data['res'] = MySQLi_DB::getInstance()->execute($sql);
        return $data;
    }

    public function Delete(){
        $data['id'] = $_GET['id'];
        $sql = "DELETE FROM " . $this->table . " WHERE id='" . $_GET['id'] . "' ";
        $data['res'] = MySQLi_DB::getInstance()->execute($sql);
        return $data;
    }
}