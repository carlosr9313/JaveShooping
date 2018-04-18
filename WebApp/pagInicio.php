<?php
session_start(); //Iniciamos la Sesion o la Continuamos
$Nombre = $_SESSION['nombre'];
$Apellido1 = $_SESSION['apellido'];
$Email =  $_SESSION['email'];
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
      <div id="Usuario">
        <form name="UsuarioInfor" action="../pagInfo.php" method="POST">   
        <div class="UsuarioInfor">
         
        <div>Hola </div>  
             <div><?php echo $Nombre;?></div>
        <input type="submit" value="Info"/>    
        </div>
        </form>    
      </div>
      
        <div id="Cargar">
        <form name="BotonCargarPublicaciones" action="../pagInicio.php" method="POST">   
        <div class="BotonCargarPublicaciones">
              
            <div><input type="submit" value="Recargar"/></div>    
        </div>
        </form>    
      </div>
      
      
    </div>
    
  <div id="main">
    </div>	
    
  <div id="footer">
    </div>    
   
     
</body>
</html>