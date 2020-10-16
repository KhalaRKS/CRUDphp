<?php
$host = "localhost";
$nombreBD = "curso-php";

$usuario = "root";
$password = "";

$nombreTabla = "registros";

$conexion_db = mysqli_connect("$host","$usuario","$password","$nombreBD")
or die ("Conexion denegada, la base de datos solicitada es inexistente");
$db = mysqli_select_db($conexion_db, $nombreBD)
or die ("La base de datos $nombreBD es inexistente");

?>