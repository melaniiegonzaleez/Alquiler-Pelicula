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
        <table border=1 align="center" id="tabla">
	<tr> 
		<th colspan=6>Peliculas disponibles</th>
	</tr>
	<tr>
		<td>Codigo Pelicula </td>
		<td>Titulo </td>
		<td>Genero </td>
		<td>Precio </td>
		<td colspan="2" align="center">Accion </td>
	</tr>
	<?php
	include("conexion.php");
	$sentencia="select * from pelicula";
	$consulta=mysqli_query($enlace,$sentencia);
	while($fila=mysqli_fetch_array($consulta)){
		$cod_pel=$fila[0];
		$titulo=$fila[1];
		$genero=$fila[2];	
		$precio=$fila[3];	
	?>
	<tr>
		<td><?php echo $cod_pel ?></td>
		<td><?php echo $titulo ?></td>
		<td><?php echo $genero ?></td>
		<td><?php echo $precio ?></td>
		 <!-- boton eliminar-->
		<td>
			<form action="tablapelicula.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $cod_pel ?>">
			<input type="submit" value="Eliminar" name="borrar">
			</form>
			<?php
			if(isset($_POST["borrar"])){
				$idp=$_POST["cod_pelicula"];
				$sentencia="delete from pelicula where cod_pelicula=$cod_pel";
				$borrar=mysqli_query($enlace,$sentencia);
				if($borrar==false){
					echo "Error al borrar el registro".mysqli_error($enlace);
				}else{
					header("location:tablapelicula.php");
				}
			}
				
			?>
		</td>	

		 <!-- boton modificar-->
		 <td>
			<form action="ingresarpelicula.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $cod_pel ?>">
			<input type="submit" value="Modificar" name="mod">
			</form>
		 </td>
		
	</tr>
	<?php }// fin while ?>
</table>
	<form action="ingresarpelicula.php" method="post">
        <input type="hidden" name="id" value="0">
        <input type="submit" id="hola" value="Ingresar">
    </form>
</body>
</html>
