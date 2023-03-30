<?php 


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;


  require ('PHPMailer-master/src/Exception.php');
  require ('PHPMailer-master/src/PHPMailer.php');
  require ('PHPMailer-master/src/SMTP.php');

  $mail = "<H3>Bienvenido! Esto Funciona con wave metrix.digital</H3> ";

  // Creación de la instancia
$mailWeb = new PHPMailer();
// Seteo del uso
$mailWeb->IsSMTP(); // Uso SMTP
// Seteo de la seguridad
$mailWeb->SMTPSecure = 'ssl';
// Host
$mailWeb->Host = "smtp.gmail.com";
// Degug. Valores 1 -> errores y mensajes // 2 solo mensajes // 0 no informa nada
$mailWeb->SMTPDebug = 1;
// Autenticación
$mailWeb->SMTPAuth = true;
// Puerto
$mailWeb->Port = 465;
// Usuario
$mailWeb->Username = "steven@somosforma.com";
// Contraseña
$mailWeb->Password = "thpolvfybhdgomss";
// Quien envia
$mailWeb->SetFrom("steven@somosforma.com", "Wave");
// Asunto del email
$mailWeb->Subject = "Asunto";
// En caso de que la vista HTML no esté activida. Esto ya es muy poco probable
$mailWeb->AltBody = "Para ver correctamente este mensaje use la vista de HTML";
// El cuerpo del mensaje. 
$mailWeb->MsgHTML($mail);
// Dirección del destinatario
$mailWeb->AddAddress("stevensalcedoocampo@gmail.com");
// Enviar el correo
if (!$mailWeb->Send())
  {
    echo "Error: $mailWeb->ErrorInfo";
  }
  else
  {
    echo "Message Sent!";
  }









