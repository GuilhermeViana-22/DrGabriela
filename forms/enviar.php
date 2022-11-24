<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

if ($_POST) {

     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $assunto = $_POST['assunto'];
     $descricao = $_POST['descricao'];

     $mail = new PHPMailer(true);

     try {
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                        
          $mail->Host       = 'smtp-mail.outlook.com';                 
          $mail->SMTPAuth   = true;                                 
          $mail->Username   = 'guilherme_viana20@outlook.com';                     
          $mail->Password   = '1Marmaduki&';                             
          $mail->SMTPSecure = 'tls';
          $mail->Port       = 587;                                   
          //Recipients
          $mail->setFrom('guilherme_viana20@outlook.com', 'Mailer');
          $mail->addAddress('guilherme_viana20@outlook.com', 'Guilherme Augusto dos santos viana');
          $mail->addReplyTo('guilherme_viana20@outlook.com', 'Information');
          $mail->isHTML(true);
          $mail->Subject = 'Novo contato';
          $Body = "Chegou um novo contato<br>
          Nome:  $nome<br>
          E-mail: $email<br>
          assunto: $assunto<br>
          Message: $descricao<br>";
          $mail->Body    = $Body;
          $mail->AltBody = 'Entre em contato com este cliente';
          $mail->send();

     } catch (Exception $e) {           
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }

}

