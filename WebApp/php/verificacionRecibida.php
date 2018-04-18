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
if ($_GET['id'])
{
//filtrado de datos, también lo puedes hacer con preg_match para más seguridad
$id = $_GET['id']; 
echo $id;    
$resultado = mysqli_query($conn,"SELECT * FROM datosLogin WHERE Email='$id'");
//$row = mysqli_num_rows($resultado);

$fila = mysqli_fetch_array($resultado);
//Se verifica que existe la fila
    
if ($fila > 0)
{
$consulta = "UPDATE datosLogin SET status='TRUE' WHERE Email = '$id'";
if (mysqli_query($conn, $consulta)) {
      echo '<script>
			alert("Usuario Verificado");
			location.href="../index.html";
		</script>';
   } else {
      echo "Error updating record: ";
   }
}
}
else
{
//Se expulsa de esta página si no contiene los parámetros correctos
}
mysqli_close($conn); 
?>