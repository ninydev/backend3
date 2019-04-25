<?php

class MySqlTableWork {

    public $dbhost, $dbport, $dbuser, $dbpswd, $dbname; // Данные по подключению к базе
    public $table; // Имя рабочей таблицы
    public $DB; // Указатель на базу данных

    public $editFilds; // доступные к редактированию поля, и их типы
    public $viewFilds; // доступные только к просмотру поля
    public $viewFildsAll; // тображаемые поля на вкладке все


    public function __construct()
    {
        $this->dbhost = "localhost";
        $this->dbport = 3306;
        $this->dbuser = "c1laravel";
        $this->dbpswd = "QweAsdZxc!23";
        $this->dbname = "c1backend3";

        $this->table = "colors";

        $this->viewFildsAll[] = "name";
        $this->viewFildsAll[] = "id";

        $this->editFilds[] = "name";
        $this->editFilds[] = "rgb";

        $this->DB = new mysqli($this->dbhost, $this->dbuser, $this->dbpswd, $this->dbname);
        $this->DB->set_charset("UTF8");
        echo "<div> Connect Server " . $this->DB->errno . " " . $this->DB->error . "</div>";

    }


    public function sqlAll(){
        //$res = $this->DB->query("SELECT * FROM " . $this->table);
        return $this->DB->query("SELECT * FROM " . $this->table);
    }


    public  function echoAll(){
        $data = $this->sqlAll();
        include ("view/all.tpl.php");
    }

    public function echoDel(){
        $data['id'] = $_GET['id'];
        $this->DB->query("DELETE FROM " . $this->table . " WHERE id='" . $_GET['id'] . "' ");
        $data['res'] =  $this->DB->errno . " " . $this->DB->error;
        include ("view/del.tpl.php");
    }

    public function  echoEdit(){
        $data['id'] = $_GET['id'];
        $data['res'] = $this->DB->query("SELECT * FROM " . $this->table . " WHERE id='" . $_GET['id'] . "' ");
        $data['row'] = $data['res']->fetch_assoc();
        include ("view/edit.tpl.php");

    }

    public function echoSaveEdit (){
        $data['id'] = $_GET['id'];
        $sql = "UPDATE " . $this->table . " SET ";
        for($i = 0; $i < sizeof($this->editFilds); $i++) {
            $arrSql[] = $this->editFilds[$i] ." = '" . $_GET[$this->editFilds[$i]] . "' ";
        }

        $sql.= implode(", " ,$arrSql);

        $sql.= " WHERE id='" . $_GET['id'] . "' ";
        echo $sql;
        $this->DB->query($sql);
        $data['res'] =  $this->DB->errno . " " . $this->DB->error;
        include ("view/save.tpl.php");
    }


}