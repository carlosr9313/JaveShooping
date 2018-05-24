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


/*=====================================================================================================================*/
/*=====================================================================================================================*/

$nombresBuscar = $_POST['productoABuscar'];

//echo '<script>
//			alert("Dato a buscar =('.$nombresBuscar.')");
//		</script>';  

$resultado = mysqli_query($conn,"SELECT * FROM datosProducto WHERE nombre LIKE '%$nombresBuscar%' OR descripcion LIKE '%$nombresBuscar%'");
//$row = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$nombre = $row['nombre'];
//
//echo '<script>
//			alert("Dato encontrado =('.$nombre.')");
//		</script>';  

$precio = $row['precio'];
$unidades = $row['unidades'];
$descripcion = $row['descripcion'];
$fecha = $row['fecha'];
$dueno=$row['idUsuario'];

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Registro</title>
  <link rel="stylesheet" href="css/pagInicio.css"/> 
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
          <div><p align = "right">Datos de Publicacion</p></div>
      </div>  
      
    
       <div class="TitulosUsuarioRescatado" style = "float: center">
           
             <div align="center"> 
                <?php 
                echo "<table>";  
                echo "<tr>";  
                echo "<th>ID    </th>";   
                echo "<th>Nombre    </th>";    
                echo "<th>Precio    </th>";  
                echo "<th>Unidades    </th>";
                echo "<th>Categoria    </th>";
                echo "<th>Lugar    </th>"; 
                echo "</tr>"; 
                $resultado2 = mysqli_query($conn,"SELECT * FROM datosProducto WHERE nombre LIKE '%$nombresBuscar%' OR descripcion LIKE '%$nombresBuscar%'");
                while ($row2 = mysqli_fetch_array($resultado2)){
               echo '<i style="color:blue;font-size:20px;font-family:calibri ;">
                    <tr>
                        <td style="text-align:center;">'.$row2['Id'].'</td>
                        <td style="text-align:center;">'.$row2['nombre'].'</td>
                        <td style="text-align:center;">'.$row2['precio'].'</td>
                        <td style="text-align:center;">'.$row2['unidades'].'</td>
                        <td style="text-align:center;">'.$row2['categoria'].'</td>
                        <td style="text-align:center;">'.$row2['lugar'].'</td>
                    </tr>
                    </i>';
                }
                echo "</table>";  
                ?>
                     
            </div>
           
                    <div class="idComprar">
                      <form name="BotonFlotanteDerecha" action="php/comprarProducto.php" method="POST">     
                        <input type="text" placeholder="Digite # id que desea Comprar" name="idComprar">  
                        <div class="BotonFlotanteDerecha">
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