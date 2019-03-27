<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';
include '/home/c1510556/public_html/libs/Mailer.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = "Consulta Buscarte";
$message = "Email Consulta: ".$email." \r\n ".
			stripslashes($_POST['message']);

$error = '';



if(!$error)
{
/* $mail = mail(WEBMASTER_EMAIL, $subject, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());
*/
    //doy las gracias por el envío
    echo  "Gracias por rellenar el formulario. Se ha enviado correctamente."; 
	$mailer = new Mailer();
	$mailer->mail->setFrom(WEBMASTER_EMAIL, $name);
	$mailer->mail->addAddress('info@systaxi.site', 'systaxi');
	$mailer->mail->isHTML(true);
	$mailer->mail->Subject = 'Contacto Sitio WEB';
	$mailer->mail->Body = $message;
	$mailer->sendMail();

//	if($mail)
//{
echo 'OK';
//}

}


}
?>