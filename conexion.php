<?php
$nombrebd="alquilerdepeliculas";
$nombreServidor="localhost";
$nombreUsuario="root";
$contrabd="";
$enlace=mysqli_connect($nombreServidor,$nombreUsuario,$contrabd,$nombrebd);
if($enlace){
echo " ";
}else{
mysqli_connect_errno($enlace);
}
?>