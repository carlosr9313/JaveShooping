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
  <link rel="stylesheet" href="css/pagPublicar.css"/> 
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
<!--            <p align = "right">Foto</p>-->
            <p align = "right">Fecha</p>
            <p align = "right">Categoria</p>
            <p align = "right">Lugar</p>    
            </div>    
      </div>
      
      
       <div class="BotonBuscar">
        <div>
            <form action="php/insertarProducto.php" method="POST">   
        
            <p align = "left"><input type="text" placeholder="Nombre de Producto" name="nombreProducto"></p>   
            <p align = "left"><input type="text" placeholder="Precio de Producto" name="precio"></p>   
            <p align = "left"><input type="text" placeholder="Unidades del Producto" name="unidades"></p>    
            <p align = "left">
                <select name="oferta">
                    <option selected disabled>Selecciona Oferta</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                    <option value="50">50%</option>
                    <option value="30">30%</option>
                    <option value="20">20%</option>
                    <option value="10">10%</option>
                </select>
             </p>    
            <p align = "left"><input type="text" placeholder="Descripcion de Producto" name="descripcion"></p>    
<!--            <p align = "left"><input type="text" placeholder="XXxxxxxxXXXXXxxxxxxXXXX" name="foto"></p> -->
            <p align = "left"><input name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y"); ?>" size="10" /></p>   
            <p align = "left">
                <select name="categoria">
                    <option selected disabled>Selecciona Categoria</option>
                    <option value="Accesorios">Accesorios</option>
                    <option value="Comida">Comida</option>
                    <option value="Trabajos">Trabajos</option>
                    <option value="Vivienda">Vivienda</option>
                    <option value="Tecnologia">Tecnologia</option>
                    <option value="Muebles">Muebles</option>
                    <option value="Perfumeria">Perfumeria</option>
                    <option value="Ropa">Ropa</option>
                    <option value="Farmaceutica">Farmaceutica</option>
                    <option value="Viajes">Viajes</option>
                </select>
             </p>
                <p align = "left">
                <select name="lugar">
                    <option selected disabled>Selecciona Lugar</option>
                    <option value="EntradaBiblo">Entrada Biblo</option>
                    <option value="Giraldo">Giraldo</option>
                    <option value="Baron">Baron</option>
                    <option value="Basicas">Basicas</option>
                 
                </select>
             </p>     
            <div class="BotonFlotante">
                <input type="submit" value="Publicar"/>    
                </div>     
            </form>     
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
        
      </div>    
   </div>	
    
  <div id="footer">
    </div>    
   
     
</body>
</html>
