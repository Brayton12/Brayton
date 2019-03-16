<?php
   include('conexion.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conexion,"select Alumnonom from alumno where Correo = '$user_check' ;");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['Alumnonom'];
   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
   }
?>