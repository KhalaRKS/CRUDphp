<?php 
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3dee7bc093.js" crossorigin="anonymous"></script>

    <style>
    #box {
        box-shadow=
    }
    </style>
</head>
<body>
<?php
                  $test;
                      if(isset($_GET['pagina'])) {
                            $test = $_GET['pagina'];
                        } else {
                            $test = 'registrar'; 
                        }
                 ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><img src="images/logonav.png" alt="LOGO" style="width:100px;"></a>
    <ul class="nav nav-pills">
    <?php if (!isset($_SESSION["ValidarIngreso"])): ?>
        <li class="nav-item">
            <a class="nav-link <?php if ($test == "registrar"): ?>active <?php endif ?>"  href="index.php?pagina=registrar">Registrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($test == "inicio"): ?>active <?php endif ?>"  href="index.php?pagina=inicio">Iniciar sesión</a>
        </li>
        <?php endif ?>
        <?php if (isset($_SESSION["ValidarIngreso"]) && $_SESSION["ValidarIngreso"] == 'ok'): ?>

        <div class="dropdown right">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Configuración<span class="caret"></span></button>

            <ul class="dropdown-menu">
                <li class="nav-item">
                    <a class="nav-link <?php if ($test == "panel"): ?>active <?php endif ?>"  href="index.php?pagina=panel">Panel</a>
                <li class="nav-item">
                    <a class="nav-link <?php if ($test == "salir"): ?>active <?php endif ?>"  href="index.php?pagina=salir">Cerrar sesión</a>
                </li>
            </ul>
        </div>

<?php endif ?>
    </ul class="nav nav-tabs">
</nav>
<?php

if(isset($_GET["pagina"])){

    if  ( $_GET["pagina"] == "registrar"
     ||   $_GET["pagina"] == "panel"
     ||   $_GET["pagina"] == "salir"
     ||   $_GET["pagina"] == "inicio"
     ||   $_GET["pagina"] == "editar"){

       include $_GET["pagina"] = "paginas/" . $_GET["pagina"] . ".php";

}
    else include $_GET["pagina"] = "paginas/error.php";


}else $_GET["pagina"] = "paginas/registrar.php";



?>




</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>