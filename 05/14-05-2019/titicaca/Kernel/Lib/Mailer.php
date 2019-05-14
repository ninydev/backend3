<?php
namespace Kernel\Lib;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Config;
/**
 * 
 */
class Mailer extends PHPMailer
{
	
	function __construct($name) {
		//Server settings
		/* $this->SMTPDebug = 2;                                 // Enable verbose debug output
		$this->isSMTP();                                      // Set mailer to use SMTP
		$this->Host = Config::$emailSmtp;                     // Specify main and backup SMTP servers
		$this->SMTPAuth = true;                               // Enable SMTP authentication
		$this->Username = Config::$emailUser;                 // SMTP username
		$this->Password = Config::$emailPswd;                  // SMTP password
		$this->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$this->Port = 465;                                    // TCP port to connect to
		//Recipients
		$this->setFrom(Config::$emailUser, 'Titicaca PHP Mailer test');
		$this->addAddress(Config::$emailUser, 'Joe User');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */

		 //Server settings
		 $this->SMTPDebug = 2;                                 // Enable verbose debug output
		 $this->isSMTP();                                      // Set mailer to use SMTP
		 $this->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		 $this->SMTPAuth = true;                               // Enable SMTP authentication
		 $this->Username = 'gololobovsa@gmail.com';                 // SMTP username
		 $this->Password = 'gololobovSA20051976';                           // SMTP password
		 $this->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		 $this->Port = 465;                                    // TCP port to connect to
	 
		 //Recipients
		 $this->setFrom('gololobovsa@gmail.com', 'Mailer');
		 $this->addAddress('gololobovsa@gmail.com', 'Joe User');     // Add a recipient
		 //$this->addAddress('ellen@example.com');               // Name is optional
		 //$this->addReplyTo('info@example.com', 'Information');
		 //$this->addCC('cc@example.com');
		 //$this->addBCC('bcc@example.com');
	 
		 //Attachments
		 //$this->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		 //$this->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		          
	}

	public function doSendmail (){
    
		try {
            //Content
            $this->isHTML(true);                                  // Set email format to HTML
            $this->Subject = 'Message from Titicaca';
            $this->Body    = "";
            $this->AltBody = "";
        
            $this->send();
            $ret = 'Message has been sent';
        } catch (Exception $e) {
            $ret = 'Message could not be sent. Mailer Error: '. $this->ErrorInfo;
        }
        return $ret;
	}
}