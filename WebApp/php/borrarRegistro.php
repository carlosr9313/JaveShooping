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

$idbuscar = $_POST['idbuscar'];


   
$resultado = mysqli_query($conn,"SELECT * FROM datosProducto WHERE Id='$idbuscar'");
//Se verifica que existe la fila
$row = mysqli_fetch_array($resultado);
$idUsuario = $row['idUsuario'];
  echo '<script>
			alert('.$idbuscar.');
		</script>';
if ($idUsuario == $Email)
{
$consultaBorrada = "DELETE FROM datosProducto WHERE Id = '$idbuscar'";
$resul = mysqli_query($conn,"DELETE FROM datosProducto WHERE Id = '$idbuscar'");
      echo '<script>
			alert("REGISTRO BORRADO");
			location.href="../pagPublicado.php";
		</script>';
   } else {
     echo '<script>
			alert("NO SE PUEDE BORRAR EL REGISTRO VERIFIQUE EL ((ID))");
			location.href="../pagPublicado.php";
		</script>';
   }



mysqli_close($conn); 
?>