<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 26.04.2019
 * Time: 20:45
 */

namespace Kernel\Base;
use Kernel\Lib\MySQLi_DB;


class BaseModel
{
    public $table;             // текущая таблица

    public $addFilds;          // доступные поля для добавления
    public $funFildsCreate;
    public $addFildsAlter;     // альтернативные названия полей для добавления
    public $editFilds;         // доступные к редактированию поля
    public $editFildsAlter;    // альтернативные названия полей к редактированию
    public $viewFilds;         // доступные только к просмотру поля
    public $viewFildsAll;      // отображаемые поля на вкладке все
    public $viewFildsAllAlter; // альтернативные названия полей

    public $hasOne;
    public $belongsTo;
    public $hasMany;
    public $manyToMany;

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

    public function hasOne($tblName, $foreign_key, $local_key){
        $this->hasOne[] = [$tblName, $foreign_key, $local_key];
    }
    public function belongsTo($tblName, $foreign_key, $local_key) {
        $this->belongsTo[] = [$tblName, $foreign_key, $local_key];
    }
    public function hasMany($modelName, $foreign_key, $local_key) {
        $this->hasMany[] = [$modelName, $foreign_key, $local_key];
    }
    public function manyToMany($modelName, $foreign_key, $local_key, $middleTable, $middleTableForeign_key, $middleTableLoacl_key) {
        $this->hasMany[] = [$modelName, $foreign_key, $local_key, $middleTable, $middleTableForeign_key, $middleTableLoacl_key];
    }
    public function hasManyThrough($modelName, $foreign_key, $local_key, $middleTable, $middleTableForeign_key, $middleTableLoacl_key) {
        $this->hasMany[] = [$modelName, $foreign_key, $local_key, $middleTable, $middleTableForeign_key, $middleTableLoacl_key];
    }



    // $db->Where("(`id` < 5) OR (7>6 AND 7>5)")
    public function Where ($sql){
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
        $sql = "";

        $addHasMany = "";
        $sqlGroupBy = "";


        if (is_array($this->hasMany)) {
            for ($i = 0; $i < sizeof($this->hasMany); $i++) {
                $tmp = "User\\" . $this->hasMany[$i][0];
                echo $tmp;
                $tmpModel = new $tmp();
                $tblName = $tmpModel->table;

                $tmpConCad = array();

                for ($j = 0; $j < sizeof($tmpModel->addFilds); $j++) {
                    $tmpConCad[] = " GROUP_CONCAT(DISTINCT " . $tblName . "." . $tmpModel->addFilds[$j] . ", ', ')  AS " . $tmpModel->addFilds[$j] . " ";
                }

                $addHasMany .= " LEFT JOIN " . $tblName . " ON " .
                    $tblName . "." . $this->hasMany[$i][1] . "=" . $this->table . "." . $this->hasMany[$i][2] . " ";
            }
            $sql = "SELECT *, " . $tmpConCad[0] . " FROM " . $this->table." ";
            $sqlGroupBy = " GROUP BY " . $this->table . ".id ";
        }



        if (strlen($sql) < 1){
            $sql = "SELECT * FROM " . $this->table." ";
        }

        // var_dump($tmpConCad);



        //$sql = "SELECT * FROM " . $this->table." ";

        if (is_array($this->hasOne)) {
            for ($i = 0; $i < sizeof($this->hasOne); $i++) {
                $sql.= " LEFT JOIN " . $this->hasOne[$i][0] . " ON " .
                    $this->hasOne[$i][0].".". $this->hasOne[$i][1] . "=" . $this->table . "." . $this->hasOne[$i][2] . " ";
            }
        }

        if (is_array($this->belongsTo)) {
            for ($i = 0; $i < sizeof($this->belongsTo); $i++) {
                $sql.= " LEFT JOIN " . $this->belongsTo[$i][0] . " ON " .
                    $this->belongsTo[$i][0].".". $this->belongsTo[$i][1] . "=" . $this->table . "." . $this->belongsTo[$i][2] . " ";
            }
        }

        if (is_array($this->hasMany)) {
                $sql.= $addHasMany;
        }

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
        else if (strlen($this->Lim) > 0) {
            $sql.= $this->Lim;
        }
        $sql.= $sqlGroupBy;
        // echo "<p> sql: " . $sql . "</p>";
        $ret = MySQLi_DB::getInstance()->execute($sql);
        // echo "Server Return <pre>";
        // var_dump($ret);
        // echo "</pre>";
        echo MySQLi_DB::getInstance()->getErrno() . " " . MySQLi_DB::getInstance()->getError();
        return $ret;
    }

    public function Paginate($num) {
        $this->PagCount = $num;
        if (isset($_GET['pagStart'])) {
            $this->PagStart = $_GET['pagStart'];
            $this->Pag = " LIMIT " . $this->PagStart . ", ";
            $this->Pag.= $this->PagCount;
        } else {
            $this->Pag = " LIMIT " . $num ;
        }
        return $this;
    }

    public function getPaginate(){
        $pag['count'] = $this->getCount();
        $pag['pagStart'] = $pag['count'] - $this->PagCount;
        $pag['num'] = $this->PagCount;
        if ($pag['count'] > $this->PagCount) {
            $pag['url'] = explode("?", $_SERVER['REQUEST_URI']);
            $pag['url'] = $pag['url'][0] . "?";

            foreach ($_GET as $key => $value) {
                if ($key != 'pagStart')
                    $pag['url'].= $key . "=" . $value . "&";
            }
        }
        return $pag;
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

    public function Create($data){
        $sql = "INSERT INTO " . $this->table . " ( ";
        for($i = 0; $i < sizeof($this->addFilds); $i++) {
            $arrFilds[] = "`".$this->addFilds[$i] ."`";
        }
        $sql.= implode(", " ,$arrFilds);
        $sql.= ") VALUES (";
        for($i = 0; $i < sizeof($this->addFilds); $i++) {
            if (isset($this->funFildsCreate[$this->addFilds[$i]]['start'])) {
                $strStart = $this->funFildsCreate[$this->addFilds[$i]]['start'];
            } else {
                $strStart = "";
            }
            if (isset($this->funFildsCreate[$this->addFilds[$i]]['end'])) {
                $strEnd = $this->funFildsCreate[$this->addFilds[$i]]['end'];
            } else {
                $strEnd = "";
            }
            $arrValues[] = $strStart . "'".$data[$this->addFilds[$i]]."'" . $strEnd;
        }
        $sql.= implode(", " ,$arrValues);
        $sql.=')';
        $data['res'] = MySQLi_DB::getInstance()->execute($sql);
        $data['errNum'] = MySQLi_DB::getInstance()->getErrno();
        $data['errText'] = MySQLi_DB::getInstance()->getError();
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