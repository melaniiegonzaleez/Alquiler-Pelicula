<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Menu horizontal responsive  </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1>
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bitter:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="estilosS.css">
		
    </head>
    <body>

        <header> 
            <p align="center">
                 <div class="header"> Rent Good Films </div>
            </p>         
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu">
            <img src="https://icon-icons.com/icons2/1154/PNG/32/1486564398-menu2_81519.png">
            </label>
        <nav class="menu">
                <ul>
                <li><a href="paginaprincipal.php">Inicio</a></li>
                <li><a href="informacion.php">Informacion</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                </ul>    
            </nav>     
        </header>
    <div>
     <h1>Busque la pelicula que quiera alquilar</h1>
    </div>
    <div class="box">
    <form action="paginformulario (1).php" method="POST">
     <input type="text"  id="search" placeholder="Search" name="peli"/>
	 <NAV CLASS= "navegacion">
	 
     <input type="submit" id= "bottom" value="Buscar">
	
    </form>
    <?php
    @$pelic=$_POST["peli"]; 
	include("conexion.php");
    @$sentencia="select * from pelicula where titulo= '$pelic' ";
	@$consulta=mysqli_query($enlace,$sentencia);
    if($consulta==false){
        echo"Error al insertar ".mysqli_error($enlace);
        echo "<br>";
    }else{
        @$consulta=mysqli_query($enlace,$sentencia);
        while($fila=mysqli_fetch_array($consulta)){
            @$cod_pel=$fila[0];
            @$titulo=$fila[1];
            @$genero=$fila[2];
            @$precio=$fila[3];
        }
         if (@$titulo==$pelic){
            echo "Se ha encontrado la pelicula";
            echo "<br>";
            echo "Si desea alquilarla, presione el boton";
            ?>
            <form action="paginformulario.php" method="POST">
                <input type="submit" id="botonalq" value="Formulario de Alquiler">
            </form>
            <?php
        }
        else{
            echo "No se ha encontrado la pelicula, busque alguna otra";
        }
    }
  ?>
    
</body>
</html>


