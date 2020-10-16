
  <?php 
  include "conexionbbdd/conexion.php";

  $item = $_GET['id'];

  $query = "SELECT * FROM $nombreTabla WHERE id = '$item' ";
  $result = mysqli_query($conexion_db,$query);

  while ($registro = mysqli_fetch_array($result)){

        echo "
    <div class='pt-5 d-flex justify-content-center text-center'>
    <form method='post' class='p-5 bg-light form-horizontal'>
        <div class='form-group'>
            <label class='control-label' for='nombre'>Nombre:</label>
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>

                    <span class='input-group-text'><i class='fas fa-user'></i></span>
                  
                </div>
                <input type='text' class='form-control' id='nombre' placeholder=" . $registro['nombre'] . " name='nombreActualizar'>
            </div>
          
          </div>
          <div class='form-group'>
            <label class='control-label' for='email'>Email:</label>
            <div class='input-group mb-3'>
              <div class='input-group-prepend'>

                  <span class='input-group-text'>@</span>
                
              </div>
            <input type='email' class='form-control' id='email' placeholder=" . $registro['email'] . " name='emailActualizar'>
          </div>
        </div>
        <div class='form-group'>
        <div class='form-group'>
        <label class='control-label' for='pwd'>Contraseña:</label>
        <div class='input-group mb-3'>
          <div class='input-group-prepend'>

              <span class='input-group-text'><i class='fas fa-lock'></i></span>
            
          </div>
          <input type='password' class='form-control' id='pwd' name='pwdActualizar'>
          <input type='hidden' name='pwdActual' value='". $registro['password'] . "'>
      </div>


        </div>";
  }
    
  if(isset($_POST["nombreActualizar"]) && isset($_POST["pwdActualizar"]) && isset($_POST['emailActualizar'])){
    if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$_POST['nombreActualizar'])  and preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',$_POST['emailActualizar'])
                      and preg_match('/^[0-9a-zA-Z]+$/',$_POST['pwdActualizar'])){
    $nombre = $_POST["nombreActualizar"];
    $email = $_POST["emailActualizar"];
    $contraseña = $_POST["pwdActualizar"];
  
  
    include "conexionbbdd/conexion.php";
  
    $GuardarDatosBD = "UPDATE $nombreTabla SET nombre='$nombre', email='$email', password='$contraseña' WHERE id='$item'";
    mysqli_query($conexion_db,$GuardarDatosBD);
    
    include "conexionbbdd/cierraconexion.php";
    $respuesta = true;
   }
  else {
    $respuesta = false;
  }
  
  
  if ($respuesta == true){
    echo '<script>
        if ( window.history.replaceState ){
        window.history.replaceState( null, null, window.location.href );
        }
  
    </script>';
    echo '<div class="alert alert-success"> Los datos se actualizaron correctamente. </div>';
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
  
      <button type="submit" class="btn btn-success">Actualizar datos</button>
    </form>
  </div>