<?php
/**
* Phpmailer Class
*/
class Mailer
{
	public $mail;
	public function __construct()
	{
		require '/home/c1510556/public_html/libs/mailer/PHPMailerAutoload.php';
		$this->mail = new PHPMailer;
		//$this->mail->isSMTP();

		if( defined('SMTP_HOST') && defined('SMTP_USERNAME') && defined('SMTP_PASSWORD') && defined('SMTP_PORT')) {
			if (!empty(DB_HOSTNAME) || !empty(SMTP_USERNAME) || !empty(SMTP_PASSWORD) || !empty(SMTP_PORT) ) {
				$this->mail->Host = HOST;
				$this->mail->SMTPAuth = true;
				$this->mail->Username = MAIL;
				$this->mail->Password = PASS;
				$this->mail->SMTPSecure = 'tls';
				$this->mail->Port = 25;
			}
		}
	}

	public function sendMail()
	{
		$this->mail->send();
	}
}
