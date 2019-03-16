<?php
include('./master/header.php'); 
?>

<?php
function rrmdir($dir) { 
  if (is_dir($dir)) { 
    $objects = scandir($dir); 
    foreach ($objects as $object) { 
      if ($object != "." && $object != "..") { 
        if (is_dir($dir."/".$object))
          rrmdir($dir."/".$object);
        else
          unlink($dir."/".$object); 
      } 
    }
    rmdir($dir); 
  } 
}
  

if(isset($_POST["IdPro"]) && !empty($_POST["IdPro"])){
    
    require_once "conexion.php";  

    $sql = "DELETE FROM proyecto WHERE IdPro = ?";
    if($stmt = mysqli_prepare($conexion, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["IdPro"]);
        
        if(mysqli_stmt_execute($stmt)){      
              rrmdir('upload/'.$_REQUEST['folder']);
              if(!empty($_POST['IdPro'])){
                $nombredb= $_REQUEST['db'];    
                mysqli_query($conexion,"DROP DATABASE $nombredb");
            }
              
            header("location:proyectos.php");
        } else{
            echo "Oops! No Se ¨Pudo Eliminar Este Proyecto";
        }
    }
    mysqli_close($conexion);  
  
} else{
    if(empty(trim($_GET["IdPro"]))){
        header("location: proyectos.php");
        exit();
    }
} 

   



    //$nombre = $row['bdname'];
    
    

// function delete_directory($dirname) {
//     if (is_dir($dirname)){

//     $dir_handle = opendir($dirname);
//     }
//     if (!$dir_handle){
//     return false;
//     }
    
//     while($file = readdir($dir_handle)) {
//     if ($file != "." && $file != "..") {
//     if (!is_dir($dirname."/".$file))
//     {unlink($dirname."/".$file);}
    
//     else
//     delete_directory($dirname.'/'.$file);
//     }
//     }
    
//     closedir($dir_handle);
//     rmdir('../backend/upload'.'/'.$dirname);
//     return true;
//     }
    

//     //Aqui se ejectua la funcion y el parametro dirname se remplaza por nombre
//     delete_directory($nombre);
    
    ?>


<main class="app-content">

      <div class="app-title">
        <div>
          <h1><i class="fa fa-bell-o"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Eliminacion de Proyecto</font></font></h1>
        </div>
       
      </div>
      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">¿Deseas eliminar este proyecto?</font></font></h3>
            </div>
            <div class="tile-body">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                            <input type="hidden" name="IdPro" value="<?php echo trim($_GET["IdPro"]); ?>"/>
                            <input type="hidden" name="bd" value="<?php echo trim($_GET["bd"]); ?>"/>
                            <input type="hidden" name="folder" value="<?php echo trim($_REQUEST['folder']); ?>">
                            
                           <center> <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <input type="submit" value="Si" class="btn btn-danger">
                                
                                <a href="proyectos.php" class="btn btn-default">No</a>
                         </font></font></p></center>
                        
                    </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          
        </div>
    
   
</main>
<?php
include('./master/footer.php'); 
?>
