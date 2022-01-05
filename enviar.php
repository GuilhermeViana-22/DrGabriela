<?php
include './phpmailer/src/PHPMailer.php';
include './phpmailer/src/SMTP.php';
include './phpmailer/src/Exception.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['subject'];
$message = $_POST['message'];
$data = date('d/m/Y H:i:s');

try {

    //Server settings

    //Comente ou descomente essa linha para debugar erros de envio de email (descomentar irá mostrar as mensagens de erro)
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

    $mail->isSMTP();
    $mail->Debugoutput = 'html';                                            //Send using SMTP
    $mail->Host = 'smtp.hostinger.com' ;              //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'administrativo@gabrielachaluppe.com';                     //SMTP username
    //$mail->Username   = 'gabriela.challupe.adv@gmail.com';                     //SMTP username
   // $mail->Username   = 'gguicido.viana@gmail.com';                     //SMTP username
    //$mail->Password   = 'Rafael10@';                               //SMTP password
    $mail->Password   = '1Borbekai&';                               //SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Email marcado como "De"
    $mail->setFrom('administrativo@gabrielachaluppe.com', 'Administração');

    //Email marcado como "Para"
    $mail->addAddress('gabriela.challupe.adv@gmail.com', 'Gabriela');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    //Assunto do email
    $mail->Subject = 'Dra Gabriela um novo cliente entrou em contato';

    //Corpo do email
    $mail->Body  = 
    "<div display:block; border: 1px solid #000; background-color: #cfcfcf;>
    <strong>Nome do cliente :</strong> $nome.<br>
    <strong>contato que o cliente deixou :</strong> $email.<br>
    <strong>assunto que ele deseja tratar :</strong> $assunto<br>
    <strong>descrição :</strong> $message<br>
    
    </div>";

    $mail->send();

    echo "A sua menssagem foi enviada com sucesso";

} catch (Exception $e) {

    //Mensagem de erro
    echo "os dados não foram enviados , ocoreeu uma falha na autenticação dos dados: {$mail->ErrorInfo}";
}
