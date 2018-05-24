<?php
session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];
$Login = $_SESSION['sesion'];
if($Login != 'LOGUEADO'){
echo '<script>
			alert("FALLA de comprobar usuario");
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


/*=====================================================================================================================*/
/*=====================================================================================================================*/

$nombresBuscar = $_POST['productoABuscar'];
$idComprar = $_POST['idComprar'];
$_SESSION['idComprar']=$idComprar;

$resultado = mysqli_query($conn,"SELECT * FROM datosProducto WHERE Id='$idComprar'");
//$row = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$nombre = $row['nombre'];
$precio = $row['precio'];
$unidades = $row['unidades'];
$descripcion = $row['descripcion'];
$fecha = $row['fecha'];
$dueno=$row['idUsuario'];
$categoria=$row['categoria'];
$lugar=$row['lugar'];

$_SESSION['unidades']=$unidades;
$_SESSION['productoN']=$nombre;
$_SESSION['dueno']=$dueno;

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Registro</title>
  <link rel="stylesheet" href="../css/pagInicio.css"/> 
  <link rel="stylesheet" href="../css/cuerpoPagina.css"/> 
  <link rel="stylesheet" href="../css/cuerpoPagina.css"/> 

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
          <div><p align = "right">Datos de Publicacion</p></div>
      </div>  
      
    
       <div class="TitulosUsuarioRescatado" style = "float: center">
            <div> 
                
            <p align = "left"><?php echo $nombre;?></p>
            <p align = "left"><?php echo $precio;?></p> 
            <p align = "left"><?php echo $unidades;?></p>
            <p align = "left"><?php echo $descripcion;?></p>
            <p align = "left"><?php echo $fecha;?></p>
            <p align = "left"><?php echo $dueno;?></p>
            <p align = "left"><?php echo $categoria;?></p>
            <p align = "left"><?php echo $lugar;?></p>    
            </div>    
      </div>
              
                    <div class="idBorrar">
                      <form name="BotonFlotanteDerecha2" action="../pagInicio.php" method="POST">     
<!--                    <input type="text" placeholder="Digite id que desea borrar" name="idbuscar">  -->
                        
                        <div class="BotonFlotanteDerecha2">
                        <input type="submit" value="Cancelar"/>    
                        </div>
                        </form> 
           
<!--
                    <form name="BotonFlotanteIzquierda" action="../pagPublicado.php" method="POST">   
                        <div class="BotonFlotanteIzquierda">
                        <input type="submit" value="Editar"/>    
                        </div>
                    </form> 
-->
                    </div>
           
                    <div class="idEditar">
                      <form name="BotonFlotanteDerecha2" action="../php/correoCompra.php" method="POST">     
<!--                    <input type="text" placeholder="Digite id que desea editar" name="idbuscar">  -->
                        
                        <div class="BotonFlotanteDerecha2">
                        <input type="submit" value="Comprar"/>    
                        </div>
                        </form> 
           
<!--
                    <form name="BotonFlotanteIzquierda" action="../pagPublicado.php" method="POST">   
                        <div class="BotonFlotanteIzquierda">
                        <input type="submit" value="Editar"/>    
                        </div>
                    </form> 
-->
                    </div>       
      
      
      
       <div id="Usuario">
        <form name="UsuarioInfor" action="../pagInicio.php" method="POST">   
        <div class="UsuarioInfor">
         
        <div>Hola </div>  
             <div><?php echo $Nombre;?></div>
        <input type="submit" value="Volver"/>    
        </div>
        </form>    
      </div> 
      
      
   </div>	
    
  <div id="footer">
    </div>    
   
     
</body>
</html>