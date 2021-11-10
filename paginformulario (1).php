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
    </div>
    <p align="center"> En los campos de tipo DATE debe introducir la fecha de alquiler y de devolucion respectivamente </p>
    <form action="paginacomprarealizada.php" method="POST">
     <input type="number"  id="search" placeholder="Numero de Membresia" name="numembresia"/>
     <input type="text"  id="search" placeholder="Nombre" name="nombre"/>
     <input type="text"  id="search" placeholder="Apellido" name="apellido"/>
     <input type="text"  id="search" placeholder="Direccion" name="direc"/>
     <input type="text"  id="search" placeholder="Ciudad" name="ciudad"/>
     <input type="text"  id="search" placeholder="Pais" name="pais"/>
     <input type="number"  id="search" placeholder="Telefono" name="telef"/>
     <input type="date"  id="search" placeholder="Fecha de alquiler" name="fechaalq"/>
     <input type="date"  id="search" placeholder="Fecha de Devolucion" name="fechadev"/>
     <input type="submit" id= "bottom"  name="save" value="Aceptar">
    </form>
    <?php
    include("conexion.php");
    @$nummembresia=$_POST["numembresia"];
    @$nombre=$_POST["nombre"];
    @$apellido=$_POST["apellido"];
    @$direccion=$_POST["direc"];
    @$ciudad=$_POST["ciudad"];
    @$pais=$_POST["pais"];
    @$telef=$_POST["telef"];
    @$fechaAlq= date ($_POST["fechaalq"]);
    //@$fechaAlqN= date_format($fechaAlq, 'Y-m-d');
    @$fechaDev= date ($_POST["fechadev"]);
   // @$fechaDevN= date_format($fechaDev, 'Y-m-d');
   if($telef<0){
		$telef=abs($telef);
	}
	if($nummembresia<0){
		$nummembresia=abs($nummembresia);
	}
    echo $nummembresia; 
    echo "<br>";
    echo $nombre; 
    echo "<br>";
    echo $apellido; 
    echo "<br>";
    echo $direccion; 
    echo "<br>";
    echo $ciudad;
    echo "<br>"; 
    echo $pais; 
    echo "<br>";
    echo $telef;
    echo "<br>"; 
    echo $fechaAlq;
    echo "<br>"; 
    echo $fechaDev;
    echo "<br>";
$titulo="La la land";
    $cod_pelicula=12345;
    $precio=25000;
    if(isset($_POST["save"])){
        echo "Fecha UNO ".  $fechaAlq;
        echo "<br>";
        echo "FEccha dos ".  $fechaDev;

        $sentenciaDireccion="Insert into direccion values('$direccion','$ciudad','$pais')";

        $sentenciaCliente="Insert into cliente values($nummembresia,'$nombre','$apellido','$direccion',$telef)";

        $sentenciaAlquiler="Insert into alquiler values($nummembresia ,$cod_pelicula, $fechaAlq, $fechaDev, $precio)";

        $insertarDireccion=mysqli_query($enlace,$sentenciaDireccion);
        if($insertarDireccion==false){
            echo"Error al insertar ".mysqli_error($enlace);
        }else{
            header("location:paginformulario.php");
        }


        $insertarCliente=mysqli_query($enlace,$sentenciaCliente);
        if($insertarCliente==false){
            echo"Error al insertar ".mysqli_error($enlace);
        }else{
            header("location:paginformulario.php");
        }


        $insertarAlquiler=mysqli_query($enlace,$sentenciaAlquiler);
            if($insertarAlquiler==false){
                echo"Error al insertar ".mysqli_error($enlace);
            }else{
                header("location:paginformulario.php");
        }
    }
    ?>
</body>
</html>