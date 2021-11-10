<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Menu horizontal responsive
        </title>
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
     <h1>Ingrese los datos requeridos</h1>
	 <center>
	 <h3>Si se ingresan números negativos, se cargarán los datos como positivos. </h3>
	  <center>
    </div>
     <form action="ingresarpelicula(1).php" method="POST">
     <?php
    include("conexion.php");
    echo "<br>";
    @$id=$_POST["id"];
    echo $id;
    if ($id==0){
        ?>
        <input type="number"  id="search" placeholder="Codigo de Pelicula" name="cod_pelicula"/>
        <input type="text"  id="search" placeholder="Titulo de Pelicula" name="nombrePelicula"/>
        <input type="text"  id="search" placeholder="Genero" name="Genero"/>
        <input type="number"  id="search" placeholder="Precio" name="precioPelicula"/>
        <input type="submit" id= "bottom"  name="save" value="Aceptar">
       </form>
       <?php
    } else{ 
        $sentencia="select * from pelicula where cod_pelicula=$id";
        $consulta=mysqli_query($enlace,$sentencia);
        while($fila=mysqli_fetch_array($consulta)){
            $cod_pel=$fila[0];
            $titulo=$fila[1];
            $genero=$fila[2];	
            $precio=$fila[3];	
        ?>
         <input type="hidden"  id="search"  name="cod_pelicula" value="<?php echo $cod_pel ?>"/>
        <input type="number"  id="search"  name="cod_peliculaFALSO" value="<?php echo $cod_pel ?>" disabled/>
        <input type="text"  id="search"  name="nombrePelicula" value="<?php echo $titulo ?>"/>
        <input type="text"  id="search" name="Genero" value="<?php echo $genero ?>"/>
        <input type="number"  id="search" name="precioPelicula" value="<?php echo $precio ?>"/>
        <input type="submit" id= "bottom"  name="mod" value="Modificar">

        <?php
    }
}

    include("conexion.php");
    @$cod_pelicula=$_POST["cod_pelicula"];
    @$titulo=$_POST["nombrePelicula"];
    @$genero=$_POST["Genero"];
    @$precio=$_POST["precioPelicula"];
	if($precio<0){
		$precio=abs($precio);
	}
	if($cod_pelicula<0){
		$cod_pelicula=abs($cod_pelicula);
	}
    if(isset($_POST["save"])){
        $sentencia="Insert into pelicula values ($cod_pelicula,'$titulo','$genero',$precio)";
        $insertar=mysqli_query($enlace,$sentencia);
            if($insertar==false){
                echo"Error al insertar ".mysqli_error($enlace);
            }else{
                header("location:tablapelicula.php");
        }
    } else if(isset($_POST["mod"])){
        $sentencia="Update pelicula set titulo='$titulo', genero='$genero',precio=$precio where cod_pelicula=$cod_pelicula";
        $insertar=mysqli_query($enlace,$sentencia);
            if($insertar==false){
                echo"Error al insertar ".mysqli_error($enlace);
            }else{
                header("location:tablapelicula.php");
        }
    }

    ?>
</body>
</html>