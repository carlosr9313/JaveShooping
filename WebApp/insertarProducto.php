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
$username = 'id4739775_carlos';
$password = 'Car.2018';
$db_name = 'id4739775_javeshopping';

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
    $foto = $_POST['foto'];
	$fecha = $_POST['fecha'];
    $estado = $_POST['estado'];

if ($stmt = mysqli_prepare($conn,"INSERT INTO datosProducto (nombre, precio, unidades, oferta, descripcion, foto, fecha,estadoProducto,idUsuario)VALUES (?,?,?,?,?,?,?,?,?)")) {
        mysqli_stmt_bind_param($stmt,'sssssssss',$nombreProducto,$precio,$unidades,$oferta,$descripcion,$foto,$fecha,$estado,$Email);
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
     