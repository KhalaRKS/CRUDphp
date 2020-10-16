<div class="pt-5 d-flex justify-content-center text-center">
<form method="post" class="p-5 bg-light form-horizontal">
<div class="form-group">

    <label class="control-label" for="email">Email:</label>

    <div class="input-group mb-3">
            <div class="input-group-prepend">

                <span class="input-group-text">@</span>
            
            </div>
        <input type="email" class="form-control" id="email" name="emailLogin">
    </div>
    
</div>
    <div class="form-group">
      <label class="control-label" for="pwd">Contraseña:</label>


        <div class="input-group mb-3">
                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                
                </div>
                <input type="password" class="form-control" id="pwd" name="pwdLogin">
        </div>
    </div>
    <?php
if(isset($_POST["emailLogin"]) && isset($_POST["pwdLogin"])){

  $email = $_POST["emailLogin"];
  $contraseña = $_POST["pwdLogin"];

  include "conexionbbdd/conexion.php";

  $query = "SELECT * FROM $nombreTabla WHERE email ='$email' and password ='$contraseña' ";
  $respuesta = mysqli_query($conexion_db, $query);


  $verf = false;
  while ($resultado = mysqli_fetch_array($respuesta)){
    $verf = true;
    if($resultado["email"] == $_POST["emailLogin"] && $resultado["password"] == $_POST["pwdLogin"]){

      $_SESSION["ValidarIngreso"] = 'ok';
      echo "<script>
  
      if ( window.history.replaceState ){
      window.history.replaceState( null, null, window.location.href );
      }
      window.location = 'index.php?pagina=panel';

    </script>";
    }
  }
  if ($verf == false){
    echo "<script>
  
              if ( window.history.replaceState ){
              window.history.replaceState( null, null, window.location.href );
              }
  
            </script>";
    echo "<div class='alert alert-danger'>El email y/o contraseña <br> no son valídos</div>";
  }
}

?>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    <div>
      <p></p>
    <p>¿Olvidaste tu contraseña?<br>
    <a href="index.php?pagina=registrar">¿No tienes usuario? <br> Registrarse</p></a>
    </div>
  </form>
</div>


