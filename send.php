<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'danniamylees2@gmail.com';
    $mail->Password = 'SUA-SENHA-DE-APLICATIVO';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom($email, $name);
    $mail->addAddress('danniamylees2@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Nova sugestão enviada pelo site';
    $mail->Body = "
        <h2>Nova sugestão enviada</h2>
        <p><b>Nome:</b> $name</p>
        <p><b>E-mail:</b> $email</p>
        <p><b>Mensagem:</b><br>$message</p>
    ";
    $mail->send();
    echo "Sugestão enviada com sucesso! Obrigada ❤️";
} catch (Exception $e) {
    echo "Erro ao enviar: {$mail->ErrorInfo}";
}
?>