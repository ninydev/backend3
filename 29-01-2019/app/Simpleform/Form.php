<?php
namespace App\Simpleform;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
		try {
	    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.zoho.eu';  // Specify main and backup SMTP servers
		    // $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'noreply@ninydev.com';                 // SMTP username
		    //$mail->Username = 'nikitin_a@itstep.org';                 // SMTP username
		    $mail->Password = '1q2wazsx3edc1qaz';                           // SMTP password
		    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('noreply@ninydev.com', 'Nykytin PHP Mailer test');
		    // $mail->setFrom('nikitin_a@itstep.org', 'Nykytin PHP Mailer test');
		    $mail->addAddress('keeper@ninydev.com');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Send from php IT Step';
		    $mail->Body    = $str;
		    $mail->AltBody = $str;

		    $mail->send();
		    $ret = 'Сообщение отправлено';
		} catch (Exception $e) {
	    	$ret = 'Ошибка отправки сообщения. Mailer Error: '. $mail->ErrorInfo;
		}
		return $ret;

	}


	public function addInput($name, $type = "text", $val = ""){
		$this->item[] = "<input type='" . $type . "' name='" . $name . "' value='" . $val .  "' />";
	}


	public function addTextArea($name, $text = ""){
		$this->item[] = "<textarea name='" . $name . "' >" . $text . "</textarea>";
	}






}
