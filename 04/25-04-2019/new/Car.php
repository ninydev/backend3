<?php

include ("MysqliDB.php");

class Color public Model {
	
	public function __construct(){
		$this->table = "cars"; // Найти способ атвоматического наименования таблицы по имени класса

        $this->viewFildsAll[] = "name";
        $this->viewFildsAll[] = "id";

        $this->editFilds[] = "name";
        $this->editFilds[] = "rgb";		
	}
	
}