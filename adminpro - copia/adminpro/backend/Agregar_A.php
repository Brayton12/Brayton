<?php
include('./master/header.php'); 
include_once("conexion.php")
?>
<main class="app-content">
<?php

$message = "";
if (isset($_POST['Matricula']) && isset($_POST['Nombre'])&& isset($_POST['ApellidoPaterno'])&& isset($_POST['ApellidoMaterno'])&& isset($_POST['idUsuario'])&& isset($_POST['Id_carrera']) ) {
    $Matricula = $_POST['Matricula'];
    $Nombre= $_POST['Nombre'];
    $ApellidoPaterno=$_POST['ApellidoPaterno'];
    $ApellidoMaterno=$_POST['ApellidoMaterno'];
    $idUsuario=$_POST['idUsuario'];
    $Id_carrera=$_POST['Id_carrera'];
    $sql = 'INSERT INTO alumno(Matricula,Nombre,ApellidoPaterno,ApellidoMaterno,idUsuario,Id_carrera) values (:Matricula,:Nombre,:ApellidoPaterno,:ApellidoMaterno,:idUsuario,:Id_carrera)';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([':Matricula' => $Matricula,':Nombre'=>$Nombre,':ApellidoPaterno'=>$ApellidoPaterno,':ApellidoMaterno'=>$ApellidoMaterno,':idUsuario'=>$idUsuario,':Id_carrera'=>$Id_carrera])) {
      
        $message ='Datos insertados';
        
    }  
}
?>


<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Agregar Alumno</h3>
            <div class="tile-body">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success">
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form method="post" class="row">
                <div class="form-group col-md-5">
                  <label class="control-label">Matricula</label>
                  <input class="form-control" type="text" name="Matricula" placeholder="Ejemplo: 16060809" required>
                </div>
                <div class="col-md-4 col-md-offset-4"></div>


                <div class="form-group col-lg-5">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" type="text" name="Nombre" placeholder="Ejemplo: Juan Alberto" required>
                </div>
                <div class="form-group col-md-5">
                  <label class="control-label">Apellido Paterno</label>
                  <input class="form-control" type="text" name="ApellidoPaterno" placeholder="Ejemplo: Quime" required>
                </div>
                <div class="form-group col-md-5">
                  <label class="control-label">Apellido Materno</label>
                  <input class="form-control" type="text" name="ApellidoMaterno" placeholder="Ejemplo: Gonzales" required>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="Id_ciclo">Usuario<abbr title="Este campo es obligatorio">*</abbr></label>
                  <?php
                        echo'<select name="idUsuario" id="idUsuario" class="form-control" required>';
                        echo'<option value="0" selected>Seleccionar</option>';
                        foreach ($pdo->query('SELECT idUsuario,Correo FROM usuario') as $row) {
                        echo '<option value="'.$row['idUsuario'].'">'.$row['Correo'].'</option>';
                        }
                        echo'</select>';
                    ?>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="Id_ciclo">Carrera<abbr title="Este campo es obligatorio">*</abbr></label>
                  <?php
                        echo'<select name="Id_carrera" id="Id_carrera" class="form-control" required>';
                        echo'<option value="0" selected>Seleccionar</option>';
                        foreach ($pdo->query('SELECT Id_carrera,Carrera FROM carrera') as $row) {
                        echo '<option value="'.$row['Id_carrera'].'">'.$row['Carrera'].'</option>';
                        }
                        echo'</select>';
                    ?>
                </div>
                    <div class="form-group col-md-4 align-self-end">
                    <button class="btn btn-info btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
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
