<?php

require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");

 $mail = new PHPMailer\PHPMailer\PHPMailer();
 
//$mail->isSMTP();/*Set mailer to use SMTP*/
$mail->Host = 'smtp.gmail.com';/*Specify main and backup SMTP servers*/
$mail->Port = 587 ;
$mail->SMTPAuth = true;/*Enable SMTP authentication*/
$mail->Username = "biblocur@gmail.com";/*SMTP username*/
$mail->Password = "Prueba12345";/*SMTP password*/
$mail->SMTPSecure = 'tls';
//$mail->SMTPSecure = 'ssl';//*Enable encryption, 'ssl' also accepted*/
$mail->From = 'estebanfabianp@gmail.com';
$mail->FromName = "esteban";
$mail->addAddress( 'estebanfabianp@gmail.com');/*Add a recipient*/
//$mail->addReplyTo('estebanfabianp@gmail.com');
/*$mail->addCC('cc@example.com');*/
/*$mail->addBCC('bcc@example.com');*/
//$mail->WordWrap = 70;/*DEFAULT = Set word wrap to 50 characters*/
//$mail->addAttachment('../tmp/' . $varfile, $varfile);/*Add attachments*/
/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
$mail->isHTML(true);/*Set email format to HTML (default = true)*/
//$mail->Subject = $subject;
$mail->Body    = "funciona";
//$mail->AltBody = $message;
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   // header("Location: ../docs/confirmSubmit.html");
   echo "funciono";
}
