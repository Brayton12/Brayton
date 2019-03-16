<?php
include('./master/header.php'); 
include_once("conexion.php")
?>
<main class="app-content">
<?php

$message = "";
if(isset($_POST['enviar'])){
  if(!empty($_POST['Carrera'])) 
{
    $queryInsert = "INSERT INTO carrera (Carrera) VALUES  ('".$_POST['Carrera']."');";
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
            <h3 class="tile-title">Agregar carrera</h3>
            <div class="tile-body">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success" onclick="demoNotify" >
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form method="post" class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Nombre de la carrera</label>
                  <input class="form-control" type="text" name="Carrera" placeholder="Ejemplo: Arquitectura" required="">
                </div>
                    <div class="form-group col-md-4 align-self-end">
                    <button class="btn btn-info btn-primary" type="submit" name="enviar"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                    <a href="carreras.php" ><button  class="btn btn-info btn-danger">Cancelar</button></a>
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
 <script type="text/javascript">
      $('#demoNotify').click(function(){
      	$.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check' 
      	},{
      		type: "info"
      	});
      });
        $('#demoSwal').click(function(){
          swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          }, function(isConfirm) {
            if (isConfirm) {
              swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          });
        });
    </script>