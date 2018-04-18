<?php
session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];

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
          <div><p align = "right">Datos de Usuario</p></div>
      </div>  
      
      <div class="TitulosDatosUsuarioRescatado" style = "float: left">
            <div>
            <p align = "right">Nombres</p>
            <p align = "right">Apellido 1</p>
            <p align = "right">Apellido 2</p>
            <p align = "right">Correo</p>
            <p align = "right">Fecha Nacimiento</p>
            <p align = "right">Estado de Cuenta</p>    
            </div>    
      </div>
      
       <div class="TitulosUsuarioRescatado" style = "float: right">
            <div> 
            <p align = "left"><?php echo $Nombre1;?></p>
            <p align = "left"><?php echo $Apellido11;?></p> 
            <p align = "left"><?php echo $Apellido22;?></p>
            <p align = "left"><?php echo $Email1;?></p>
            <p align = "left"><?php echo $Fecha;?></p>
            <p align = "left"><?php echo $estado;?></p>
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
      
      
      <div>
        <form name="BotonFlotante" action="../pagInfo.php" method="POST">   
        <div class="BotonFlotante">
        <input type="submit" value="Editar"/>    
        </div>
        </form> 
      </div>    
   </div>	
    
  <div id="footer">
    </div>    
   
     
</body>
</html>