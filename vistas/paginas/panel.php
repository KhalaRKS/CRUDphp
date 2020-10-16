<?php
if(isset($_SESSION["ValidarIngreso"])){

  if($_SESSION["ValidarIngreso"] !='ok'){
    echo "<script> window.location = 'index.php?pagina=inicio'
    </script>";
    return;
  }
}else{
  echo "<script> window.location = 'index.php?pagina=inicio'
    </script>";
    return;
}

?>
  <h1 class="bg-light container-fluid" >Crontrol Panel</h1>

<div class="container">
  <h2>Table</h2>          
  <table class="table table-dark border border-primary">
    <thead>
      <tr class="">
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha</th> 
      </tr>
    </thead>
    <tbody>
    <?php
  include "conexionbbdd/conexion.php";

  $consulta = "SELECT * FROM $nombreTabla";
  $datos = mysqli_query($conexion_db, $consulta);

  while ($register = mysqli_fetch_array($datos)){

    echo "
    <tr>
    <td>" . $register['id'] . "</td>
    <td>" . $register['nombre'] . "</td>
    <td>" . $register['email'] . "</td>
    <td>" . $register['fecha'] . "</td>
    <td>
    <div class='btn-group'>
    
        <a href='index.php?pagina=editar&id=". $register['id'] ."'>
          <button class='btn btn-warning'><i class='fas fa-pencil-alt'></i></button> 
        </a>
        <a href='index.php?pagina=panel&eliminar=ok&id=". $register['id'] ."''>
          <button class='btn btn-danger ml-2'><i class='fas fa-trash-alt'></i></button>
          </a>
    </div>
</td>
  </tr>";
  }

?>
    </tbody>
  </table>
</div>
<?php 
if (isset($_GET["eliminar"])){
  $item = $_GET['id'];
  $query = "DELETE FROM `$nombreTabla` WHERE id='$item'";
  $resultado = mysqli_query($conexion_db, $query);
  include "conexionbbdd/cierraconexion.php";
    $reload = "
    <script>
        window.onload = function() {
        if (!window.location.hash)
        {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
      }
    </script>";
  echo $reload;  
}else{
  include "conexionbbdd/cierraconexion.php";
}