<?php
session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];
$Login = $_SESSION['sesion'];
$dueno=$_SESSION['dueno'];
$productoN=$_SESSION['productoN'];
$unidades=$_SESSION['unidades'];
$idComprar=$_SESSION['idComprar'];
//echo '<script>
//			alert("Dueno '.$dueno.' ");
//		</script>'; 

if($Login != 'LOGUEADO'){
echo '<script>
			alert("FALLA");
            location.href="../index.html";
		</script>';    
     
}
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

if($unidades==0){
  echo '<script>
			alert("Producto No disponible, unidades en (0) ");
            location.href="../pagInicio.php";
		</script>';     
}else{
    if($unidades>0){
    $unidades=$unidades-1;
    $consulta = "UPDATE datosProducto SET unidades=$unidades WHERE Id = '$idComprar'";
            if (mysqli_query($conn, $consulta)) {
                  echo '<script>
                        alert("Unidad adquiridad");
                    </script>';
               } else {
                  echo "Error updating record: ";
               }    
    }
    
}


function acortarurl($url){
    $longitud = strlen($url);
    if($longitud > 45){
        $longitud = $longitud - 30;
        $parte_inicial = substr($url, 0, -$longitud);
        $parte_final = substr($url, -15);
        $nueva_url = $parte_inicial."[ ... ]".$parte_final;
        return $nueva_url;
    }else{
        return $url;
    }
}                  //LA FUNCION 1 DEBERIA IR EN login.php
  //incluyo la clase phpmailer
    //require "class.smtp.php";
    //echo "NombredeUsuario = '$nombreusuario'";
   
    $nombreusuario = $dueno; 
    //echo "NombredeUsuario = '$nombreusuario'";
    $email = 'javeshoopingg@gmail.com'; 
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
    $mail->AddAddress($nombreusuario); //Destinatario
    $mail->Username = "javeshoppingg@gmail.com"; //Aqui pon tu correo de gmail
    $mail->Password = "Car.2018"; //aqui pon tu contrasena
    $mail->Subject = "Informacion de JAVESHOPPING"; //Asunto del correo
    $duenos=$dueno;
    $first_token  = strtok($dueno, '.');

    $mail->Body = 'Hola, el producto ( '.$productoN.' ) fue comprado por '.$Nombre.' '.$Apellido1.'. contactate al usuario ('.$first_token.') lo antes posible, recuerde que debe completar el correo del usuario que le estamos mostrando en el parentesis.
    Cordial Saludo.
    JaveShopping.'; //Contenido del correo
    $mail->WordWrap = 400; //Numero de columnas
    //$mail->MsgHTML(prueba); //se indica que el cuerpo del correo tendrà formato HTML
    //$mail->AddAttachment($destino); //accedemos  al archivo  que se subió al servidor  y lo adjuntamos
    if ($mail->Send()) { //Enviamos el correo por PHPMailer
        echo '<script>
			alert("Compra realizada el Correo ( '.$duenos.' ) fue Enviado al dueño del producto");
            location.href="../pagInicio.php";
		</script>';  
        //echo "SE ENVIO, $respuesta";
        }else {
        echo '<script>
			alert("Compra NO efectuada '.$mail->ErrorInfo.' ");
            location.href="../pagInicio.php";
		</script>';  
        }
//header("Location:login.php?respuesta=$respuesta");
//       echo 'El usuario '.$nombreusuario.' ha sido registrado de manera satisfactoria.<br />;
//       Ahora puede entrar ingresando su usuario y su password <br />';
//       mostrar1(); //FUNCION MOSTRAR 1
?>
