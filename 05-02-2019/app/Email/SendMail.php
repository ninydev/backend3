<?php
namespace App\EMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/**
 * 
 */
class SendMail extends PHPMailer
{
	
	function __construct(){
			    //Server settings
			$this->SMTPDebug = 2;                                 // Enable verbose debug output
		    $this->isSMTP();                                      // Set thiser to use SMTP
		    $this->Host = 'smtp.zoho.eu';  // Specify main and backup SMTP servers
		    // $this->Host = 'smtp.gthis.com';  // Specify main and backup SMTP servers
		    $this->SMTPAuth = true;                               // Enable SMTP authentication
		    $this->Username = 'noreply@ninydev.com';                 // SMTP username
		    //$this->Username = 'nikitin_a@itstep.org';                 // SMTP username
		    $this->Password = '1q2wazsx3edc1qaz';                           // SMTP password
		    $this->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		    $this->Port = 465;                                    // TCP port to connect to

		    //Recipients
		    $this->setFrom('noreply@ninydev.com', 'Nykytin PHP thiser test');
		    // $this->setFrom('nikitin_a@itstep.org', 'Nykytin PHP thiser test');
		    $this->addAddress('keeper@ninydev.com');     // Add a recipient
		    //$this->addAddress('ellen@example.com');               // Name is optional
		    //$this->addReplyTo('info@example.com', 'Information');
		    //$this->addCC('cc@example.com');
		    //$this->addBCC('bcc@example.com');

		    //Attachments
		    //$this->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$this->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
	}

	public function doSend ($str){
				try {

		    $this->isHTML(true);                                  // Set email format to HTML
		    $this->Subject = 'Send from php IT Step';
		    $this->Body    = $str;
		    $this->AltBody = $str;

		    $this->send();
		    $ret = 'Сообщение отправлено';
		} catch (Exception $e) {
	    	$ret = 'Ошибка отправки сообщения. Mailer Error: '. $this->ErrorInfo;
		}
		return $ret;
	}
}