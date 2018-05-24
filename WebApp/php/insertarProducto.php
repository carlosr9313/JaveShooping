<?php

session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];
$Login = $_SESSION['sesion'];
if($Login != 'LOGUEADO'){
echo '<script>
			alert("FALLA");
            location.href="../index.html";
		</script>';    
     
}

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

    $nombreProducto = $_POST['nombreProducto'];
	$precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
	$oferta = $_POST['oferta'];
    $descripcion = $_POST['descripcion'];
    $foto = 'FOTO';
	$fecha = $_POST['fecha'];
    $estado = 'TRUE';
    $categoria =$_POST['categoria'];
    $lugar =$_POST['lugar'];

$req = (strlen($nombreProducto)*strlen($precio)*strlen($unidades)*strlen($oferta)*strlen($descripcion)*strlen($fecha)) or die('<script>alert("Campos llenados de forma incorrecta");location.href="../pagPublicar.php";</script>');


if ($stmt = mysqli_prepare($conn,"INSERT INTO datosProducto (nombre, precio, unidades, oferta, descripcion, foto, fecha,estadoProducto,idUsuario,categoria,lugar)VALUES (?,?,?,?,?,?,?,?,?,?,?)")) {
        mysqli_stmt_bind_param($stmt,'sssssssssss',$nombreProducto,$precio,$unidades,$oferta,$descripcion,$foto,$fecha,$estado,$Email,$categoria,$lugar);
        mysqli_stmt_execute($stmt);
        //echo "Insert: Affected %d rows\n";
        mysqli_stmt_close($stmt);
        echo '<script>
			alert("Registro Exitoso");
			location.href="../pagInicio.php";
		</script>';
    }else{
//    echo '<script>
//			alert("FALLO TABLA");
//			
//		</script>';
    }

// Close the connection

?>
     