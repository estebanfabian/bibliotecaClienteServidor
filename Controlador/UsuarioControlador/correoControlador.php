<?php

require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");

 $mail = new PHPMailer\PHPMailer\PHPMailer();
 
//$mail->isSMTP();/*Set mailer to use SMTP*/
$mail->Host = 'smtp.gmail.com';/*Specify main and backup SMTP servers*/
$mail->Port = 587 ;
$mail->SMTPAuth = true;/*Enable SMTP authentication*/
$mail->Username = "estebanfabianp@gmail.com";/*SMTP username*/
$mail->Password = "1031150232";/*SMTP password*/
$mail->SMTPSecure = 'tls';
//$mail->SMTPSecure = 'ssl';//*Enable encryption, 'ssl' also accepted*/
$mail->From = 'estebanfabianp@gmail.com';
$mail->FromName = "esteban";
$mail->addAddress( 'estebanfabianp@gmail.com');/*Add a recipient*/
$mail->addReplyTo('estebanfabianp@gmail.com');
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

 /*   $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "estebanfabianp@gmail.com";
    $mail->Password = "1031150232";
    $mail->SetFrom("estebanfabianp@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("estebanfabianp@gmail.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>*/