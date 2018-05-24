<?php
$host = 'localhost';
$username = 'id5910379_carlos';
$password = 'Car.2018';
$db_name = 'id5910379_ujjaveshopping';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
//else{echo '<script>alert("Se conecto");</script>';}

//obtenemos los valores del formulario
	$nombres = $_POST['nombreuser'];
	$apellidos1 = $_POST['apellido1suser'];
    $apellidos2 = $_POST['apellido2suser'];
	$email = $_POST['emailuser'].'@javeriana.edu.co';
    $fecha = $_POST['fecha'];
    $pass = $_POST['pass'];
	$rpass = $_POST['rpass'];
    $status = 'FALSE';
    $usejav = $_POST['emailuser'];

	//Obtiene la longitus de un string
	$req = (strlen($nombres)*strlen($apellidos1)*strlen($apellidos2)*strlen($email)*strlen($fecha)*strlen($pass)*strlen($rpass)) or die('<script>alert("Campos llenados de forma incorrecta");location.href="../registro.html";</script>');

	//se confirma la contraseña
	if ($pass != $rpass) {
        die('<script>alert("Las contraseñas no coinciden, Ingrese los datos de nuevo");location.href="../registro.html";</script>');
	}

	//se encripta la contraseña
	$contraseñaUser = md5($pass);


$nuevo_usuario=mysqli_query($conn,"SELECT Email FROM datosLogin  WHERE Email='$email'"); 
if (!$nuevo_usuario) { 
	die("Error description: " . mysqli_error($conn));
} else{ if(mysqli_num_rows($nuevo_usuario) > 0){

die('<script>alert("El usuario ya se encuentra registrado");location.href="../registro.html";</script>');
}else{
      //Existe hacer algo
 if ($stmt = mysqli_prepare($conn,"INSERT INTO datosLogin (Nombre, Apellido1, Apellido2, Email, Fecha, Contrasena,status,UsuarioJav)VALUES (?,?,?,?,?,?,?,?)")) {
        mysqli_stmt_bind_param($stmt, 'ssssssss', $nombres, $apellidos1, $apellidos2,$email,$fecha,$contraseñaUser,$status,$usejav);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
// echo '<script>alert("El usuario ya se registrará");location.href="../php/avisoVerificacion.php?Email='.$email.';</script>'; 
 }
     
}

}
// Close the connection

  header("Location:avisoVerificacion.php?Email=$email");


//	//ingresamos la informacion a la base de datos
//	if ($stmt = mysqli_prepare($conn,"INSERT INTO datosLogin (Nombre, Apellido1, Apellido2, Email, Fecha, Contrasena,status)VALUES (?,?,?,?,?,?,?)")) {
//        echo '<script>alert("Se ENTRO");</script>';
//        mysqli_stmt_bind_param($stmt, 'sssssss', $nombres, $apellidos1, $apellidos2,$email,$fecha,$contraseñaUser,$status);
//        mysqli_stmt_execute($stmt);
//        //echo "Insert: Affected %d rows\n";
//        mysqli_stmt_close($stmt);
////        echo '<script>
////			alert("Registro Exitoso");
////			location.href="index.html";
////		</script>';
//    mysqli_close($conn);
//    //header("Location:avisoVerificacion.php?Email=$email");    
//    }else{
//    echo '<script>
//			alert("FALLO Ingresar Datos en Tabla");
//		</script>';
//    }

// Close the connection

  
 
     
  


//    mysqli_query($conn, 'DROP TABLE Products;');
//
//    mysqli_query($conn, '
//    CREATE TABLE datosLogin (
//    `Id` INT NOT NULL AUTO_INCREMENT ,
//    `Nombre` VARCHAR(200) NOT NULL ,
//    `Apellido1` VARCHAR(200) NOT NULL ,
//    `Apellido2` VARCHAR(200) NOT NULL ,
//    `Email` VARCHAR(200) NOT NULL ,
//    `Fecha` VARCHAR(200) NOT NULL ,
//    `Contrasena` VARCHAR(200) NOT NULL ,
//    `status` VARCHAR(200) NOT NULL ,
//
//    PRIMARY KEY (`Id`)
//    )ENGINE = MYISAM
//    ');


//    CREATE TABLE datosProducto (
//    `Id` INT NOT NULL AUTO_INCREMENT ,
//    `nombre` VARCHAR(200) NOT NULL ,
//    `precio` VARCHAR(200) NOT NULL ,
//    `unidades` VARCHAR(200) NOT NULL ,
//    `oferta` VARCHAR(200) NOT NULL ,
//    `descripcion` VARCHAR(500) NOT NULL ,
//    `foto` LONGBLOB NOT NULL ,
//    `fecha` VARCHAR(200) NOT NULL ,
//    `estadoProducto` VARCHAR(200) NOT NULL ,    
//    `idUsuario` VARCHAR(200) NOT NULL ,
//    `categoria` VARCHAR(200) NOT NULL , 
//    `lugar` VARCHAR(200) NOT NULL ,      
//
//    PRIMARY KEY (`Id`)
//    )




//$nuevo_usuario=mysqli_query($conn,"SELECT * FROM datosLogin WHERE Email = $emailLargo"); 
//if (!$nuevo_usuario) { 
//	die("Error description: " . mysqli_error($conn));
//} else{ if(mysqli_num_rows($nuevo_usuario) != 0){
//
//die('<script>alert("El usuario ya se encuentra registrado");location.href="../registro.html";</script>');
//}else{
//mysqli_close($conn);    
//$conn = mysqli_init();
//mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
//if (mysqli_connect_errno($conn)) {
//die('Failed to connect to MySQL: '.mysqli_connect_error());
//}    
//      //Existe hacer algo
// if ($stmt = mysqli_prepare($conn,"INSERT INTO datosLogin (Nombre, Apellido1, Apellido2, Email, Fecha, Contrasena,status)VALUES (?,?,?,?,?,?,?)")) {
//        mysqli_stmt_bind_param($stmt, 'sssssss', $nombres, $apellidos1, $apellidos2,$emailLargo,$fecha,$contraseñaUser,$status);
//        mysqli_stmt_execute($stmt);
//        mysqli_stmt_close($stmt);
// echo '<script>alert("El usuario ya se registrará");location.href="../php/avisoVerificacion.php?Email='.$emailLargo.';</script>'; 
// }else{}
//     
//}
//
//}
//// Close the connection
//
//  header("Location:avisoVerificacion.php?Email=$emailLargo");
 

?>
     