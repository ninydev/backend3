<?php
namespace App\Simpleform;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

use App\Email\SendMail as PHPMailer;

/**
 * 
 */
class Form 
{
	public $item = array();
	public $name;
	
	function __construct($name)
	{
		$this->name = $name;
		echo "Создан экземпляр класса форма";
	}

	public function getForm (){
		$ret = "<div>";
		if (isset($_GET['formName']) && $_GET['formName'] == $this->name) {
			$ret.= "<p> будет отправленно сообщение </p><pre>";
			$ret.= $this->doSend();
			$ret.= "</pre>";
		} else {
			$ret.= $this->buildForm();
		}
		$ret.="</div>";
		return $ret;
	}

	public function buildForm (){
		$ret.="<form action='" . $_SERVER['PHP_SELF'] . "' method='GET' >";
		$ret.="<input type='hidden' name='formName' value='" . $this->name  . "' />\n";
		for ($i = 0; $i < sizeof($this->item); $i++ ){
			$ret.= $this->item[$i] . "<br />\n";
		}
		$ret.="</form>";
		return $ret;		
	}

	public function doSend (){
		$ret = $_GET['Name'] . "\n\n";
		$ret.= $_GET['Phone'] . "\n\n";
		$ret.= $_GET['Email'] . "\n\n";
		$ret.= $_GET['Message'] . "\n\n";

		$ret.= $this->doSendEmail($ret);

		return $ret;
	}

	public function doSendEmail ($str){
		$ret ="";

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	$mail->doSend($str);


	}


	public function addInput($name, $type = "text", $val = ""){
		$this->item[] = "<input type='" . $type . "' name='" . $name . "' value='" . $val .  "' />";
	}


	public function addTextArea($name, $text = ""){
		$this->item[] = "<textarea name='" . $name . "' >" . $text . "</textarea>";
	}






}
