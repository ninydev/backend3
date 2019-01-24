<?php

$userLogin = " Глобальная переменная";

function getFromFun (){
	$userLogin = "Переменная внутри функции";
	return $userLogin;
}

function getGlobalFun (){
	GLOBAL $userLogin;
	return $userLogin;
}


class someClass {
	public $userLogin = "Переменная внутри класса";

	public function getVar (){
		return $this->userLogin;
		// $this-> Имя переменной - Возвращает переменную
		// $this-> Имя метода () - вызывает указанный метод
	}

	public function getSecondVar (){
		$userLogin = " переменная внутри метода класса";
		return $userLogin;
	}



}

$s = new someClass; // Содаем обьект - Пользователь Саша
$i = new someClass; // Пользоваетль Ира

?>

<h1> Выводим переменные </h1>
<?php

echo "<p> Глобально " . $userLogin ."</p>";
echo "<p> Вернуть из функции " . getFromFun() ."</p>";
echo "<p> Вернуть из функции глобальную " . getGlobalFun() ."</p>";
echo "<p> Вернуть из класса Саша" . $s->getVar() ."</p>";
echo "<p> Вернуть внутреннию переменную " . $s->getSecondVar() ."</p>";
echo "<p> Вернуть из класса Ира" . $i->getVar() ."</p>";




