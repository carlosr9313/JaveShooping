<?php
session_start(); //Iniciamos o Continuamos la sesion
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


/*=====================================================================================================================*/
/*=====================================================================================================================*/

$nombres = $_POST['userid'];
$pswrd = $_POST['pswrd'];

$resultado = mysqli_query($conn,"SELECT * FROM datosLogin WHERE Email='$nombres'");
//$row = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$Nombre = $row['Nombre'];
$Email = $row['Email'];
$Apellido1 = $row['Apellido1'];
$Contrasena = $row['Contrasena'];
$status=$row['status'];
$contraseñaUser = md5($pswrd);

if('TRUE'===$status){
if($nombres === $Email && $contraseñaUser === $Contrasena){
    $_SESSION['nombre'] = $Nombre;
    $_SESSION['apellido'] = $Apellido1;
    $_SESSION['email'] = $Email;
    $_SESSION['sesion']='LOGUEADO';
    echo '<script>
			location.href="../pagInicio.php";
		</script>';
}else{
    echo '<script>
			alert("Usuario o Contraseña erroneos");
			location.href="../index.html";
		</script>';
}
}else{
      echo '<script>
			alert("NO A VERIFICADO SU CUENTA");
			location.href="../index.html";
		</script>';
}
/*=====================================================================================================================*/
/*=====================================================================================================================*/





//obtenemos los valores del formulario
//	$nombres = $_POST['nombreuser'];
//	$apellidos1 = $_POST['apellido1suser'];
//    $apellidos2 = $_POST['apellido2suser'];
//	$email = $_POST['emailuser'];
//    $fecha = $_POST['fecha'];
//    $pass = $_POST['pass'];
//	$rpass = $_POST['rpass'];

//	//Obtiene la longitus de un string
//	$req = (strlen($nombres)*strlen($apellidos1)*strlen($apellidos2)*strlen($email)*strlen($fecha)*strlen($pass)*strlen($rpass)) or die('<script>alert("Campos llenados de forma incorrecta");location.href="registro.html";</script>');
//
//	//se confirma la contraseña
//	if ($pass != $rpass) {
//        die('<script>alert("Las contraseñas no coinciden, Ingrese los datos de nuevo");location.href="registro.html";</script>');
//	}
//
//	//se encripta la contraseña
//	$contraseñaUser = md5($pass);


//    mysqli_query($conn, 'DROP TABLE datosLogin;');
//
//    mysqli_query($conn, '
//    CREATE TABLE datosLogin (
//    `Id` INT NOT NULL AUTO_INCREMENT ,
//    `Nombre` NVARCHAR(200) NOT NULL ,
//    `Apellido1` NVARCHAR(200) NOT NULL ,
//    `Apellido2` NVARCHAR(200) NOT NULL ,
//    `Email` NVARCHAR(200) NOT NULL ,
//    `Fecha` NVARCHAR(200) NOT NULL ,
//    `Contrasena` NVARCHAR(200) NOT NULL ,
//    `status` NVARCHAR(200) NOT NULL ,
//    PRIMARY KEY (`Id`)
//    );');

//
//    PRIMARY KEY (`Id`)
//    );
//    ');


// Close the connection
mysqli_free_result($resultado);
mysqli_close($conn);

?>