<?php
/* Recuperar os Dados do Formulário de Envio*/
$txtAssunto = $_POST["assunto"];
$txtEmail = $_POST["destinatario"];
$corpoMensagem = $_POST["corpo"];
 
/* Extender a classe do phpmailer para envio do email*/
require_once("phpmailer/class.phpmailer.php");
 
/* Definir Usuário e Senha do Gmail de onde partirá os emails*/
define('GUSER', 'senaimercurio@gmail.com');
define('GPWD', '@senai123!@#');
 
global $error;
$mail = new PHPMailer();
/* Montando o Email*/
$mail->IsSMTP(); /* Ativar SMTP*/
$mail->SMTPDebug = 1; /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
$mail->SMTPAuth = true; /* Autenticação ativada */
$mail->SMTPSecure = 'ssl'; /* TLS REQUERIDO pelo GMail*/
$mail->Host = 'smtp.gmail.com'; /* SM                                                                                                       TP utilizado*/
$mail->Port = 465; /* A porta 465 deverá estar aberta em seu servidor*/
$mail->Username = GUSER;
$mail->Password = GPWD;
$mail->SetFrom('senaimercurio@gmail.com', 'Sistema Mercurio');
$mail->Subject = $txtAssunto;
$mail->Body = $corpoMensagem;
$mail->addAddress($txtEmail);
$mail->IsHTML(true);

 
/* Função Responsável por Enviar o Email*/
if(!$mail->Send()) {
    echo $mail->ErrorInfo;
} else {
    echo 'Sucesso';
}