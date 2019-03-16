<?php
include('./master/header.php'); 
?>
<main class="app-content">
<?php
include_once("conexion.php");  
$sql = 'SELECT * FROM usuario';
$statement = $pdo-> prepare($sql);
$statement-> execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="row">
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></h3>
            <a class="btn btn-primary icon-btn" href="Agregar_US.php"><i class="fa fa-lg fa-plus"></i>Agregar nuevo </a>
            
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Id usuaro</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo</font></font></th>
                   <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña</font></font></th>
                   <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Id perfil</font></font></th>
                   <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                  </tr>
                </thead>
               
                <?php foreach($people as $person):?>
                  <tr>
                    <td>
                      <?= $person->idUsuario;?>
                    </td>
                    <td>
                      <?= $person->Correo;?>
                    </td>
                    <td>
                      <?= $person->Contrasena;?>
                    </td>
                    <td>
                      <?= $person->idPerfil;?>
                    </td>
                    <td>
                    <div class="btn-group"><a class="btn btn-primary" href="Editar_U.php?idUsuario=<?=$person->idUsuario?>"><i class="fa fa-lg fa-edit"></i></a><a onclick="return confirm('¿Estas segugo que deseas eliminar este elemento?')" href="Eliminar_U.php?idUsuario=<?=$person->idUsuario?>" class="btn btn-danger" ><i class="fa fa-lg fa-trash"></i></a></div>
                    </td>
                  </tr>                
                <?php endforeach;?>
              </table>
              
          </div>
        </div>
      </div> 
      
     
  
        
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
    