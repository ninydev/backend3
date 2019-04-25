<?php

class MysqliDB {
    public $dbhost, $dbport, $dbuser, $dbpswd, $dbname; // Данные по подключению к базе
    public $table; // Имя рабочей таблицы
    public $DB; // Указатель на базу данных
	private $instance;
	private $responce;
	
	private function __construct() {
		$this->DB = new mysqli($this->dbhost, $this->dbuser, $this->dbpswd, $this->dbname);
        $this->DB->set_charset("UTF8");
	}
	
	public static function getInstance (){
		if ($instance == NULL) {
			$instance = new MysqliDB();
		}
		return $instance;
	}
	
	public function execute ($sqlStr) {
		$this->responce = $this->DB->query($sqlStr);
		return $this->responce;
	}
	
	public function getResponce(){
		return $this->response;
	}

	
}