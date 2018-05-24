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


$resultado = mysqli_query($conn,"SELECT * FROM datosLogin WHERE Email='$Email'");
//$row = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$Nombre1 = $row['Nombre'];
$Email1 = $row['Email'];
$Apellido11 = $row['Apellido1'];
$Apellido22 = $row['Apellido2'];
$Fecha = $row['Fecha'];
$status=$row['status'];
if('TRUE'===$status){
    $estado='Activo';
}
$idbuscar = $_POST['idbuscar'];
$_SESSION['idBuscar']=$idbuscar;

$resultado2 = mysqli_query($conn,"SELECT * FROM datosProducto WHERE Id '$idbuscar'");
//$row = mysqli_num_rows($resultado);
$row2 = mysqli_fetch_array($resultado);
$nombrep = $row2['nombre'];
$preciop = $row2['precio'];
$unidadesp = $row2['unidades'];
$ofertap = $row2['oferta'];
$descripcion = $row2['descripcion'];

echo '<script>
			alert('.$_SESSION['idBuscar'].');
		</script>';

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Registro</title>
  <link rel="stylesheet" href="../css/pagPublicar.css"/> 
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
        <div>JAVE<span>shopping</span></div>
        </div>
   
    </div>
    
  <div id="main">
    
      <div class="TituloINFO">
          <div><p align = "right">Datos de producto a publicar</p></div>
      </div>  
      
      <div class="TitulosDatosUsuarioRescatado" style = "float: left">
            <div>
            <p align = "right">Nombre Producto</p>
            <p align = "right">Precio</p>
            <p align = "right">Unidades</p>
            <p align = "right">Oferta</p>
            <p align = "right">Descripcion</p>
              
            </div>    
      </div>
      
      
       <div class="BotonBuscar">
        <div>
            <form action="../php/insertarDatosNuevos.php" method="POST">   
        
            <p align = "left"><input type="text" placeholder="EDITAR" name="nombreProducto"></p>   
            <p align = "left"><input type="text" placeholder="EDITAR" name="precio"></p>   
            <p align = "left"><input type="text" placeholder="EDITAR" name="unidades"></p>   
            <p align = "left"><input type="text" placeholder="EDITAR" name="oferta"></p>   
            <p align = "left"><input type="text" placeholder="EDITAR" name="descripcion"></p>   
            
            <div class="BotonFlotante">
                <input type="submit" value="Publicar"/>    
                </div>     
            </form>     
        </div>
        </div>
      
     
   
       <div id="Usuario">
        <form name="UsuarioInfor" action="../pagPublicado.php" method="POST">   
        <div class="UsuarioInfor">
         
        <div>Hola </div>  
             <div><?php echo $Nombre;?></div>
        <input type="submit" value="Volver"/>    
        </div>
        </form>    
      </div> 
      
      
      <div> 
        
      </div>    
   </div>	
    
  <div id="footer">
    </div>    
   
     
</body>
</html>
