<?php
include('./master/header.php'); 
include_once("conexion.php")
?>
<main class="app-content">
<?php

$message = "";
if(isset($_POST['enviar'])){


if(!empty($_POST['Cliente'])) 
{
    $queryInsert = "INSERT INTO cliente (Cliente) VALUES  ('".$_POST['Cliente']."');";
    $resultInsert = mysqli_query($conexion, $queryInsert); 
    if($resultInsert)
    {
       $message ="<strong>Cliente Registrado Con Exito</strong>. <br>";
    }
    else
    {
        $message ="<strong>Verifica tus datos por favor no se registro el Cliente</strong>. <br>";
    }
 
}
   
}



?>

<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Agregar Cliente</h3>
            <div class="tile-body">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success" onclick="demoNotify" >
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form method="post" class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Nombre del Cliente</label>
                  <input class="form-control" type="text" name="Cliente" placeholder="Nombre Del Cliente" required="">
                </div>
                    <div class="form-group col-md-4 align-self-end">
                    <button class="btn btn-info btn-primary" type="submit" name="enviar"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                    <a href="clientes.php" ><button  class="btn btn-info btn-danger">Cancelar</button></a>
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