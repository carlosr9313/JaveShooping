<?php
session_start();

$host = 'localhost';
$username = 'id5511100_carlos';
$password = 'Car.2018';
$db_name = 'id5511100_javeshopping2';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

      
    //incluyo la clase phpmailer
   
    
    //require "class.smtp.php";

    $nombreusuario = $_GET['Email']; ; 
    $email = 'javeshooping@gmail.com'; 
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    $mail= new PHPMailer(); //creo un objeto tipo PHPMailer
    $mail->IsSMTP(); //protocolo SMTP
    $mail->SMTPAuth= true; //autenticacion en el SMTP
    $mail->SMTPSecure = "ssl"; //SSL security socket layer
    $mail->Host = "smtp.gmail.com"; //Servidor de SMTP de gmail
    $mail->Port = 465; //puerto seguro del servidor SMTP de gmail
    $mail->From = $email; // Correo del usuario
    $mail->FromName = ($email);
    $mail->AddAddress ($nombreusuario); //Destinatario
    $mail->Username = "javeshooping@gmail.com"; //Aqui pon tu correo de gmail
    $mail->Password = "Car.2018"; //aqui pon tu contrasena
    $mail->Subject = "ACTIVACION DE CUENTA"; //Asunto del correo
    $mail->Body = 'Para completar el registro haz clic en el siguiente link:
      echo <ahref ="http://localhost/log...cion.php?">Verificar cuenta</a>'; //Contenido del correo
    $mail->WordWrap = 50; //Numero de columnas
    //$mail->MsgHTML(prueba); //se indica que el cuerpo del correo tendrà formato HTML
    //$mail->AddAttachment($destino); //accedemos  al archivo  que se subió al servidor  y lo adjuntamos
   
    if ($mail->Send()) { //Enviamos el correo por PHPMailer
        $respuesta= "Bienvenido $nombreusuario el registro está casi completo. Por favor chequea tu email $nombreusuario y clickea el enlace que activará su cuenta.Tenga en cuenta que este email puede llegar como correo spam, por lo que debe revisar su bandeja de correos no deseados. Tanto su contraseña como las instrucciones adicionales han sido enviados a su correo electrónico";
        echo "SE ENVIO, $respuesta";
        }else {
        $respuesta= "El mensaje no se pudo enviar a su cuenta =(";
        $respuesta .=" Error: " .$mail->ErrorInfo;   
        echo "NO SE PUDO ENVIAR";
        }
   
       header("Location:login.php?respuesta=$respuesta");
       echo 'El usuario '.$nombreusuario.' ha sido registrado de manera satisfactoria.<br />;
       Ahora puede entrar ingresando su usuario y su password <br />';
       
?>
               
    