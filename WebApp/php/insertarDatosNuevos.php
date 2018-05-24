<?php

session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];
$Login = $_SESSION['sesion'];
$IdBuscar = $_SESSION['idBuscar'];

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
  
echo '<script>
			alert('.$IdBuscar.');
		</script>';


$consulta = mysqli_query($conn,"UPDATE datosProducto SET nombre='$nombreProducto', precio ='$precio', unidades ='$unidades', oferta='$oferta', descripcion='$descripcion' WHERE Id = '$IdBuscar'");

// Close the connection
echo '<script>
			location.href="../pagPublicado.php";
		</script>';

?>
     