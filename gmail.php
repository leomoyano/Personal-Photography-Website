<?php


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set('Etc/UTC');

$correo = $_POST['email'];
$mensaje = $_POST['message'];
$nombre = $_POST['name'];
$telefono = $_POST['phone'];
$consulta = $_POST['subject'];


use PHPMailer\PHPMailer\PHPMailer;
include('PHPMailerAutoload.php');

$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->SMTPDebug = 2;
$mail->AuthType = 'XOAUTH2';
$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->AuthType = 'XOAUTH2';

$mail->Username = 'account@gmail.com';
$mail->Password = "password";
$mail->setFrom('leomoyano7@gmail.com', 'Mailer');
$mail->addAddress('leomoyano7@gmail.com', 'Leo'); 

$mail->Subject = $consulta;

$mail->Body    = "Nombre:" . $nombre ."\n". 'Telefono: ' . $telefono ."\n" . 'Correo: ' .  $correo . "\n" . "" . "\n" . $mensaje;

if(!$mail->send()) {
    echo 'Error, mensaje no enviado';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
    echo "<script language='JavaScript'>"; 
    echo "location = 'contact2.html'"; 
    echo "</script>";
    
}

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);