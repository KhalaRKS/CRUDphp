
<div class="pt-5 d-flex justify-content-center text-center">
<form method="post" class="p-5 bg-light form-horizontal">
    <div class="form-group">
        <label class="control-label" for="nombre">Nombre:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-user"></i></span>
               
            </div>
             <input type="text" class="form-control" id="nombre" name="nombreRegistro">
        </div>
      
      </div>
    <div class="form-group">
      <label class="control-label" for="email">Email:</label>
      <div class="input-group mb-3">
            <div class="input-group-prepend">

                <span class="input-group-text">@</span>
               
            </div>
              <input type="email" class="form-control" id="email" name="emailRegistro">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="pwd">Contraseña:</label>
      <div class="input-group mb-3">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-lock"></i></span>
               
            </div>
              <input type="password" class="form-control" id="pwd" name="pwdRegistro">
        </div>
    </div>






    <?php
if(isset($_POST["nombreRegistro"]) && isset($_POST["pwdRegistro"])){
  if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$_POST['nombreRegistro'])  and preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',$_POST['emailRegistro'])
                    and preg_match('/^[0-9a-zA-Z]+$/',$_POST['pwdRegistro'])){
  $nombre = ucfirst($_POST["nombreRegistro"]);
  $email = $_POST["emailRegistro"];
  $contraseña = $_POST["pwdRegistro"];

  include "conexionbbdd/conexion.php";

  $query = "SELECT INTO $nombreTabla WHERE email='$email'";
  $dato = mysqli_query($conexion_db,$query);

    if ( isset($dato)){
      echo '<script>
      if ( window.history.replaceState ){
      window.history.replaceState( null, null, window.location.href );
      }

  </script>';
  echo '<div class="alert alert-danger">El email ya se encuentra registrado</div>';
  include "conexionbbdd/cierraconexion.php";
  return;
    }else {
      $GuardarDatosBD = "INSERT INTO $nombreTabla (nombre,email,password) VALUES ('$nombre','$email','$contraseña')";
      mysqli_query($conexion_db,$GuardarDatosBD);
      
      include "conexionbbdd/cierraconexion.php";
      $respuesta = true;
    }
  
 }else {
  $respuesta = false;
}

if ($respuesta == true){
  echo '<script>
      if ( window.history.replaceState ){
      window.history.replaceState( null, null, window.location.href );
      }

  </script>';
  echo '<div class="alert alert-success"> El usuario ha sido registrado </div>';
}
if ($respuesta == false){
             echo '<script>
      if ( window.history.replaceState ){
      window.history.replaceState( null, null, window.location.href );
      }

  </script>';
  echo '<div class="alert alert-danger">No se permiten caracteres especiales</div>';
}
}
?>

    <button type="submit" class="btn btn-primary">Registrarme</button>
  </form>
</div>


