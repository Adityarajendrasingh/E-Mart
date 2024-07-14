<?php

use PHPMailer\PHPMailer\PHPMailer;


require_once './phpmailer/Exception.php';
require_once './phpmailer/PHPMailer.php';
require_once './phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'webemailfornewsite@gmail.com'; // Gmail address which you want to use as SMTP server
$mail->Password = 'kymmdcdbajuonfcq'; // Gmail address Password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = '587';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->addAddress($_SESSION['email']);

$mail->setFrom('webemailfornewsite@gmail.com'); // Gmail address which you used as SMTP server
// $mail->addAddress($email); // Email address where you want to receive emails 

$mail->isHTML(true);
