<?php

include ("MysqliDB.php");

class Model {
	
	public $table;
	
	public $editFilds; // доступные к редактированию поля, и их типы
    public $viewFilds; // доступные только к просмотру поля
    public $viewFildsAll; // тображаемые поля на вкладке все
	
	public function All(){
        return MysqliDB::getInstance()->execute("SELECT * FROM " . $this->table);
    }
	
	
	
}