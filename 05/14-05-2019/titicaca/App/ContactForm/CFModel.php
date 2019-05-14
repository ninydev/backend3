<?php
namespace App\ContactForm;
use Kernel\Lib\Mailer;
use Kernel\Request;
use App\Config;

/**
 * 
 */
class CFModel
{

	
	public function sendmail (){
        //$ret='';
        $mail = new Mailer(true);
        //$ret.=
        $mail->doSendmail();
        //return $ret;
    }
        
}