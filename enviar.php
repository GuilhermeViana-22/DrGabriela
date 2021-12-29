<?php
include 'phpmailer/src/PHPMailer.php';
include 'phpmailer/src/SMTP.php';
include 'phpmailer/src/Exception.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
	
	//Comente ou descomente essa linha para debugar erros de envio de email (descomentar irá mostrar as mensagens de erro)
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	
    $mail->isSMTP();
    $mail->Debugoutput = 'html';                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gguicido.viana@gmail.com';                     //SMTP username
    $mail->Password   = '1Marmaduki';                               //SMTP password
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Email marcado como "De"
    $mail->setFrom('gguicido.viana@gmail.com', 'Mailer');
	
	//Email marcado como "Para"
    $mail->addAddress('gguicido.viana@gmail.com', 'teste');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
	
	//Assunto do email
    $mail->Subject = 'Here is the subject';
	
	//Corpo do email
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();

	//Mensagem de Sucesso
    echo 'Message has been sent';

    
} catch (Exception $e) {
	
	//Mensagem de erro
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    header('Location: '. 'index.php' . '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!
  </div>');

}