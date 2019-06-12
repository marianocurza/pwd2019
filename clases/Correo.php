<?php
namespace app\clases;

require '../librerias/phpmailer/src/Exception.php';
require '../librerias/phpmailer/src/PHPMailer.php';
require '../librerias/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Correo {
    public static function enviarCorreo($adjunto = '')
    {
        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.mailgun.org"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
//        $mail->Port = 465; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = 'postmaster@sandbox33261ff9a6dc470fb3fc522f97247356.mailgun.org';
        $mail->Password = 'mariano123';
        $mail->setFrom('marianos@sandbox33261ff9a6dc470fb3fc522f97247356.mailgun.org', 'mariano');
        $mail->addAddress('ijtxgcgxb@emltmp.com', 'otroyo');
        $mail->Subject = 'PHPMailer GMail SMTP test';
        $mail->msgHTML("<b>Mensaje Html</b>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'Mensaje Plano';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        if(!empty($adjunto))
            $mail->addAttachment($adjunto); //Attach an image file
        try{
            if(!$mail->send()){
                error_log($mail->ErrorInfo);
                error_log('error enviando correo');
            }else{
                error_log('operacion exitosa');
            }
        } catch (Exception $ex)
        {
                error_log($mail->ErrorInfo);
                error_log('error enviando correo');
        }
        
    }
}
