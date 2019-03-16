<?php
include('./master/header.php'); 
include_once("conexion.php")
?>
<main class="app-content">
<?php

$message = "";
if(isset($_POST['enviar'])){

if(!empty($_POST['Equipo'])) 
{
    $queryInsert = "INSERT INTO equipos ( Equipo ) VALUES  ('".$_POST['Equipo']."');";
    $resultInsert = mysqli_query($conexion, $queryInsert); 
    if($resultInsert)
    {
         $message ="Datos Insertados";
    }
    else
    {
        $message ="Datos no insertados";
    }
 
}
   
}



?>

<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Agregar Equipo</h3>
            <div class="tile-body">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success" onclick="demoNotify" >
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form method="post" class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Nombre del Equipo</label>
                  <input class="form-control" type="text" name="Equipo" placeholder="Nombre Del Equipo" required="">
                </div>
                    <div class="form-group col-md-4 align-self-end">
                    <button class="btn btn-info btn-primary" type="submit" name="enviar"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                    <a href="equipos.php" ><button  class="btn btn-info btn-danger">Cancelar</button></a>
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