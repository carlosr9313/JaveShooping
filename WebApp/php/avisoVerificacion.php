<html>
<?php
$host = 'localhost';
$username = 'id4739775_carlos';
$password = 'Car.2018';
$db_name = 'id4739775_javeshopping';
//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
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
}    
function mostrar(){  //FUNCION MOSTRAR
echo'<form action="indexReg.php" method="post" name="1">
Usuario (max 20):
  <input type="text" name="username" size="20" maxlength="20" /><br />
Password (max 10):
<input type="password" name="password" size="10" maxlength="10" />
Confirma: <input type="password" name="password2" size="10" maxlength="10" /><br />
Email (max 40):
<input type="text" name="email" size="20" maxlength="40" /><br />
<input type="submit" value="Registrar" />
</form>';
}
function mostrar1(){    //ESTA FUNCION ES PARA IMPRIMIR CUANDO EL REGISTRO ES UN EXITO USUARIO Y CLAVE //NAME:usuario
echo'PRUEBA';
}                //LA FUNCION 1 DEBERIA IR EN login.php
  //incluyo la clase phpmailer
    //require "class.smtp.php";
    $nombreusuario = $_GET['Email']; 
    //echo "NombredeUsuario = '$nombreusuario'";
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
    $mail->Subject = "Activacion cuenta JAVESHOPPING"; //Asunto del correo
      
                    class GoogleURL
                    {

                     private $apiURL = 'https://www.googleapis.com/urlshortener/v1/url';

                     function __construct($apiKey)
                     {
                      //creamos la url de solicitud con nuestra key pública
                      $this->apiURL = $this->apiURL . '?key=' . $apiKey;
                     }

                     //convierte una url larga en una corta
                     public function encode($url)
                     {
                      $data = $this->cURL($url, true);
                      return isset($data->id) ? $data->id : '' ;
                     }

                     //convierte una url corta en la real (larga)
                     public function decode($url)
                     {
                      $data = $this->cURL($url, false);
                      return isset($data->longUrl) ? $data->longUrl : '' ;
                     }

                     //enviamos y recogemos los datos del api de google
                     private function cURL($url, $post = true)
                     {
                      $ch = curl_init();
                      if ($post) {
                       curl_setopt( $ch, CURLOPT_URL, $this->apiURL );
                       curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
                       curl_setopt( $ch, CURLOPT_POST, true );
                       curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode(array('longUrl' => $url)) );
                      }
                      else {
                       curl_setopt( $ch, CURLOPT_URL, $this->apiURL . '&shortUrl=' . $url );
                      }
                      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                      curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                      $json = curl_exec($ch);
                      curl_close($ch);
                      return (object) json_decode($json);
                     }
                    }

        $api = new GoogleURL('AIzaSyB_6GvV73ZI_LnezjglChhyI52YRbwl6AY');
        //ver url acortandola
        $url = "https://javeshopping.000webhostapp.com/verificacionRecibida.php?id=$nombreusuario";
        $url_corta =  $api->encode($url);
        //ver url real
        //$url_larga  = $api->decode('http://goo.gl/mbMv2X');
    
    $mail->Body = 'Hola, te damos la bienvenida a JAVESHOPPING.
         El registro está casi completo. Por favor clickea el enlace que activará su cuenta.Tenga en cuenta que este email puede llegar como correo spam, si fue su caso, dar permiso para sacarlo de esta region de SPAM. Su usuario sera el correo institucional, para completar el registro haz clic en el siguiente link: ('.$url_corta.') y con esto quedará verificada la cuenta'; //Contenido del correo
    $mail->WordWrap = 50; //Numero de columnas
    //$mail->MsgHTML(prueba); //se indica que el cuerpo del correo tendrà formato HTML
    //$mail->AddAttachment($destino); //accedemos  al archivo  que se subió al servidor  y lo adjuntamos
    if ($mail->Send()) { //Enviamos el correo por PHPMailer
        $respuesta= "Bienvenido $nombreusuario el registro está casi completo. Por favor chequea tu email $nombreusuario y clickea el enlace $url_corta que activará su cuenta.Tenga en cuenta que este email puede llegar como correo spam, por lo que debe revisar su bandeja de correos no deseados.";
        //echo "SE ENVIO, $respuesta";
        }else {
        $respuesta= "El mensaje no se pudo enviar a su cuenta =(";
        $respuesta .=" Error: " .$mail->ErrorInfo;   
        //echo "NO SE PUDO ENVIAR";
        }
//header("Location:login.php?respuesta=$respuesta");
//       echo 'El usuario '.$nombreusuario.' ha sido registrado de manera satisfactoria.<br />;
//       Ahora puede entrar ingresando su usuario y su password <br />';
//       mostrar1(); //FUNCION MOSTRAR 1
?>
<!DOCTYPE html>       
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="css/VerificacionEnvio.css"/> 
  <link rel="stylesheet" href="css/cuerpoPagina.css"/> 

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
@import url('https://fonts.googleapis.com/css?family=Indie+Flower');
@import url('https://fonts.googleapis.com/css?family=Shadows+Into+Light');        
   </style>

  

</head>

<body oncontextmenu="return false">

  <div id="body">
    </div>
    
  <div id="header">
     <div class="TitulosRegistroGlobal">
        <div>Ya Estamos a un paso</div>
        </div>
    </div>
    
  <div id="main">
        <div class="TitulosRegistroGlobal2">
            <div><?php echo $respuesta;?></div>
        </div>
    </div>	
    
  <div id="footer">
    </div>    
        
     
</body>
    
</html>