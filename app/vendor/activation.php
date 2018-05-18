<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;

function mailer($email,$name,$token)
{
  require_once 'autoload.php';

  $mail = new PHPMailer(true);                          

      //Server settings
      $mail->SMTPDebug = 2;                   
      $mail->isSMTP();                                   
      $mail->Host = 'smtp.gmail.com'; 
      $mail->SMTPAuth = true;                    
      $mail->Username = 'itsthenewsforum@gmail.com';      
      $mail->Password = 'mayank2996';                      
      $mail->SMTPSecure = 'tls';                           
      $mail->Port = 587;

      //Recipients
      $mail->setFrom('itsthenewsforum@gmail.com','NCU-UPS');
      $mail->addAddress($email,$name);
      $mail->isHTML(true);
      $mail->Subject = 'Password Verification';
      $mail->Body    = 'Hello '.$name.', <br>Thank you for signing up at NCU-UPS.<br>Please click this link to recover your account:<br>
                        http://localhost/ups/user/recover.php?email='.$email.'&token='.$token;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
}

?>
