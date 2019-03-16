<?php 
       include('arribalogin.php'); 
   include("conexion.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($conexion,$_POST['Correo']);
      $mypassword = mysqli_real_escape_string($conexion,$_POST['Contrasena']); 
      $sql = "SELECT id ,Tipodeusuario,Correo FROM alumno WHERE Correo = '$myusername' and Contrasena = '$mypassword'";
      $result = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['Nombreperfil'];
      $count = mysqli_num_rows($result);
      if($_POST['Correo'] != $row['Correo'] ){
          $error = "Usuario O contraseña Erroneas Intentalo de nuevo";
      }
      else{
     if($row['Tipodeusuario']==2){
          if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
      }
      }
      else{
          if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: indexalumno.php");
      }else {
         $error = "Usuario O contraseña Erroneas Intentalo de nuevo";
      }
      }
      }
   }
?>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">
        <form role="form" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">Correo</label>
            <input class="form-control" type="text" placeholder="Correo" autofocus id="Correo" name="Correo"required>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" type="password" placeholder="Contraseña" name="Contrasena" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Guardar contraseña</span>
                </label>
              </div>
              
            </div>
          </div>
          <div class="form-group btn-container">
          <input type="submit" name="login" value="Iniciar session" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </section>
    <?php
   $content = 'This is about us page content'; 
   include('pielogin.php');     
?>
