<?php
include('./master/header.php'); 

?>
<main class="app-content">
<?php

if(isset($_POST['enviar'])){
  include_once("conexion.php");
  $message = "";
if(!empty($_POST['Matricula']) && !empty($_POST['Contrasena']) && !empty($_POST['Nombre']) && !empty($_POST['Paterno'])  && !empty($_POST['Materno']) && !empty($_POST['carreraalum']) && !empty($_POST['equipoalum']) ) 
{
    $queryInsert = "INSERT INTO alumno (Correo,Alumnonom, ApellidoPaterno, ApellidoMaterno, Contrasena, Grupo, Grado, Carrera, Equipo) VALUES  ('".$_POST['Matricula']."', '".$_POST['Nombre']."', '".$_POST['Paterno']."', '".$_POST['Materno']."',  '".$_POST['Contrasena']."', '".$_POST['Grupoalumno']."', '".$_POST['Gradoalumno']."', '".$_POST['carreraalum']."', '".$_POST['equipoalum']."');";
    $resultInsert = mysqli_query($conexion, $queryInsert); 
    if($resultInsert)
    {
       $message ="Usuario Registrado Con Exito";
    }
    else
    {
        $message ="Verifica tus datos por favor no se registro el usuario <br>";
    }
}
}
?>
<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title">Agregar Alumno</h3></center>
            <div class="tile-body" style="margin-left: 100px;">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success">
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form method="post" action="" class="row">
                <div class="form-group col-md-5">
                  <label class="control-label">Matricula</label>
                  <input class="form-control" type="text" name="Matricula" placeholder="Ejemplo: 16060809" required>
                </div>
                <div  class="col-md-5 col-md-offset-4"> <label class="control-label">Nombres</label>
                  <input class="form-control" type="text" name="Nombre" placeholder="Ejemplo: Juan Alberto" required> </div>
                <div class="col-md-5 col-md-offset-4">
                <label class="control-label">Apellido Paterno</label>
                  <input class="form-control" type="text" name="Paterno" placeholder="Ejemplo: Quime" required>
                </div>
                <div class="col-md-5 col-md-offset-4">
                <label class="control-label">Apellido Materno</label>
                  <input class="form-control" type="text" name="Materno" placeholder="Ejemplo: Gonzales" required>
                </div>
                <div class="form-group col-md-5">
                  <label class="control-label">Contraseña</label>
                  <input class="form-control" type="password" name="Contrasena" placeholder="Contraseña" required>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label">Grado<abbr title="Este campo es obligatorio">*</abbr></label>
                      <select name="Gradoalumno" style="width:200px;" class="form-control">';
                        <option selected>Seleccionar</option>
                        <option >01</option>;
                        <option >02</option>;
                        <option >03</option>;
                        <option >04</option>;
                        <option >05</option>;
                        <option >06</option>;
                      </select>
                </div>
                <div class="form-group col-md-2">
                <label class="control-label" >Grupo<abbr title="Este campo es obligatorio">*</abbr></label>
                      <select name="Grupoalumno" class="form-control">';
                        <option  selected>Seleccionar</option>
                        <option >A</option>;
                        <option >B</option>;
                        <option >C</option>;
                        <option >D</option>;
                        <option >E</option>;
                        <option >F</option>;
                      </select>
                </div>
                   <div class="form-group col-md-5">
                  <label class="control-label">Carrera</label>
            <select  class="form-control" name="carreraalum">
                <?php 
                 global $conexion;
                 $sql="SELECT * FROM carrera ";
                 $rec=mysqli_query($conexion,$sql);
                  while($row=mysqli_fetch_array($rec))
                  {
                    echo "<option>";
                    echo $row['Carrera'];
                    echo "</option>";
                  }
                ?>
            </select>
                </div>
                  <div class="form-group col-md-5">
                  <label class="control-label">Equipo</label>
            <select  class="form-control" name="equipoalum">
        <?php 
         global $conexion;
           $sql="SELECT * FROM equipos WHERE Equipo!='administradores';";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
          echo "<option>";
            echo $row['Equipo'];
            echo "</option>";
          }
          ?>
      </select>
                </div>

                    <div style="margin-left:270px;" class="form-group col-md-4 align-self-end">
                      <br><br>
                    <button class="btn btn-info btn-primary" type="submit" name="enviar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                    <a href="alumno.php" ><button  class="btn btn-info btn-danger">Cancelar</button></a>
                    </div>
                
              </form>
              
            </div>
          </div>
        </div>
      </div>
 </main>
<?php
include('./master/footer.php'); 
?> 