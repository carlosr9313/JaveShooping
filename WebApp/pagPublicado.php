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
          <div><p align = "right">Productos Publicados</p></div>
      </div>  
      
       <div class="TitulosUsuarioRescatado" style = "float: center">
            <div align="center"> 
                <?php 
                echo "<table>";  
                echo "<tr>";  
                echo "<th>ID </th>";   
                echo "<th>Nombre </th>";    
                echo "<th>Precio </th>";  
                echo "<th>Unidades </th>";  
                echo "</tr>"; 
                $resultado = mysqli_query($conn,"SELECT * FROM datosProducto WHERE idUsuario='$Email'");
                while ($row = mysqli_fetch_array($resultado)){
               echo '<i style="color:blue;font-size:20px;font-family:calibri ;">
                    <tr>
                        <td style="text-align:center;">'.$row['Id'].'</td>
                        <td style="text-align:center;">'.$row['nombre'].'</td>
                        <td style="text-align:center;">'.$row['precio'].'</td>
                        <td style="text-align:center;">'.$row['unidades'].'</td>
                    </tr>
                    </i>';
                }
                echo "</table>";  
                ?>
                     
            </div>
          
                    <div class="idBorrar">
                      <form name="BotonFlotanteDerecha" action="php/borrarRegistro.php" method="POST">     
                    <input type="text" placeholder="Digite id que desea borrar" name="idbuscar">  
                        
                        <div class="BotonFlotanteDerecha">
                        <input type="submit" value="Borrar"/>    
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
                      <form name="BotonFlotanteDerecha" action="php/editarRegistro.php" method="POST">     
                    <input type="text" placeholder="Digite id que desea editar" name="idbuscar">  
                        
                        <div class="BotonFlotanteDerecha">
                        <input type="submit" value="Editar"/>    
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
                        
             
      </div >
       <div id="Usuario" style = "float: left">
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