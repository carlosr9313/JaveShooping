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

//obtenemos los valores del formulario
	$nombres = $_POST['nombreuser'];
	$apellidos1 = $_POST['apellido1suser'];
    $apellidos2 = $_POST['apellido2suser'];
	$email = $_POST['emailuser'];
    $fecha = $_POST['fecha'];
    $pass = $_POST['pass'];
	$rpass = $_POST['rpass'];
    $status = 'FALSE';

	//Obtiene la longitus de un string
	$req = (strlen($nombres)*strlen($apellidos1)*strlen($apellidos2)*strlen($email)*strlen($fecha)*strlen($pass)*strlen($rpass)) or die('<script>alert("Campos llenados de forma incorrecta");location.href="registro.html";</script>');

	//se confirma la contraseña
	if ($pass != $rpass) {
        die('<script>alert("Las contraseñas no coinciden, Ingrese los datos de nuevo");location.href="registro.html";</script>');
	}

	//se encripta la contraseña
	$contraseñaUser = md5($pass);

//    mysqli_query($conn, 'DROP TABLE Products;');
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
//
//    PRIMARY KEY (`Id`)
//    );
//    ');


//    CREATE TABLE datosProducto (
//    `Id` INT NOT NULL AUTO_INCREMENT ,
//    `nombre` VARCHAR(200) NOT NULL ,
//    `precio` VARCHAR(200) NOT NULL ,
//    `unidades` VARCHAR(200) NOT NULL ,
//    `oferta` VARCHAR(200) NOT NULL ,
//    `descripcion` VARCHAR(500) NOT NULL ,
//    `foto` LONGBLOB NOT NULL ,
//    `fecha` DATE NOT NULL ,
//    `estadoProducto` VARCHAR(200) NOT NULL ,    
//    `idUsuario` VARCHAR(200) NOT NULL ,
//        
//
//    PRIMARY KEY (`Id`)
//    );

	//ingresamos la informacion a la base de datos
	if ($stmt = mysqli_prepare($conn,"INSERT INTO datosLogin (Nombre, Apellido1, Apellido2, Email, Fecha, Contrasena,status)VALUES (?,?,?,?,?,?,?)")) {
        mysqli_stmt_bind_param($stmt, 'sssssss', $nombres, $apellidos1, $apellidos2,$email,$fecha,$contraseñaUser,$status);
        mysqli_stmt_execute($stmt);
        //echo "Insert: Affected %d rows\n";
        mysqli_stmt_close($stmt);
//        echo '<script>
//			alert("Registro Exitoso");
//			location.href="index.html";
//		</script>';
    }else{
//    echo '<script>
//			alert("FALLO TABLA");
//			
//		</script>';
    }

// Close the connection
mysqli_close($conn);
  header("Location:avisoVerificacion.php?Email=$email");
  
 

?>
     