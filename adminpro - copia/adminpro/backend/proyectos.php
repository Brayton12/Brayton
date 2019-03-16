
<?php
include('./master/header.php'); 
?>

<?php
if (isset($_POST['enviar'])){ 
    require_once 'conexion.php';
       if(!empty($_POST['IdPro']) && !empty($POST['Noactivo'])){
        echo '<script type="text/javascript">
        alert("Opciones No Validas. ¡verifica tus datos por favor!");
        window.location.href="proyectos.php";
        </script>';
       }
       else{
      if(!empty($_POST['IdPro'])){
        $id = $_POST['IdPro'];
        $count = count($id);
        $status = 'Activo';
        for ($i=0; $i < $count; $i++) {
          mysqli_query($conexion,"UPDATE proyecto SET Estatus='$status' WHERE IdPro='$id[$i]'");
        }
      }
      else{
        echo "Ac";
      }

      if(!empty($_POST['Noactivo'])){
       $idd = $_POST['Noactivo'];
       $countt = count($idd);
       $statusdos = 'No Activo';
        for ($j=0; $j < $countt; $j++){
           mysqli_query($conexion,"UPDATE proyecto SET Estatus='$statusdos' WHERE IdPro='$idd[$j]'");
        } 
      }else
      {
         echo "no";
      }    
    
      echo '<script type="text/javascript">
        alert("Datos actualizados con exito.");
        window.location.href="proyectos.php";
        </script>';
       }
}
  ?>

<main class="app-content">
<form method="POST" action=""> 
<div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Proyectos Registrados</font></font></h3></center>
            <button style="background:#51b8c3;" class="btn btn-info btn-primary" type="submit" name="enviar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guadar Cambios</button>
            <br><br><b>
                <?php 

        include "conexion.php";
        $user_id=null;
        $sql1= "select * from proyecto";
        $query = $conexion->query($sql1);
                  ?>

            <div class="table-responsive">
      <?php if($query->num_rows>0):?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th></th>
            <th>Activo</th>
            <th>Inactivo</th>
            <th>Proyecto</th>
            <th>Categoria</th>
            <th>Equipo</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($r=$query->fetch_array()):?>
          <tr>
          <td><?php  $r["IdPro"]; ?></td>
          <td><input type="checkbox" name="IdPro[]" value="<?php echo $r['IdPro']; ?>" <?php if($r["Estatus"]=="Activo"){echo 'checked';} ?>></td>
          <td><input type="checkbox" name="Noactivo[]" value="<?php echo $r['IdPro']; ?>" <?php if($r["Estatus"]=="No Activo"){echo 'checked';} ?>></td>
          <td><?php echo $r["Nombre"]; ?></td>
          <td><?php echo $r["Categoria"]; ?></td>
          <td><?php echo $r["Equipous"]; ?></td>
          <td>
           <?php echo "<a  href='eliminarproyecto.php?IdPro=". $r['IdPro'] ."&folder=".$r['Equipous']."&db=".$r['bdname']."' title='Borrar' data-toggle='tooltip'><i class='fa fa-lg fa-trash'></i> <span class='glyphicon glyphicon-trash'></span></a>";?><?php echo "<a  href='eliminarrproyecto.php?IdPro=". $r['IdPro'] ."&folder=".$r['Equipous']."&db=".$r['bdname']."' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>Eliminar</span></a>";?>
       
           </td>  
         
          </tr>
          <?php endwhile;?>
        </tbody>
      </table>
      <?php else:?>
  <center><p class="alert alert-warning">No hay resultados</p></center>
<?php endif;?>
    </div>    

              
      



            </div>
          </div>
      </form>
        </div>
        
<?php
include('./master/footer.php'); 
?>