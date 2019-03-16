<?php
include('./master/headeralumno.php'); 

?>
<main class="app-content">
 
<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title">Registrar Proyecto</h3></center>
            <div class="tile-body" style="margin-left: 100px;">
            <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success">
                 <?= $message;?>
                </div>
            <?php endif;?>
              <form class="row" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-5">
                  <label class="control-label">Nombre del proyecto</label>
                  <input class="form-control" type="text" name="Nombre" placeholder="Ejemplo: Gestión de proyectos" required>
                </div>
                <div  class="col-md-5 col-md-offset-4"> <label class="control-label">Descripción del proyecto</label>
                  <input class="form-control" type="text" name="Descripcion" placeholder="Ejemplo: Este proyecto trata acerca.." required> </div>
                <div class="col-md-10 col-md-offset-4">
                <label class="control-label">Ubicación del archivo index</label>
                  <input class="form-control" type="text" name="url" placeholder="Ejemplo: miproyecto/index.php" required><br>
                  <label class="control-label">Nombre de la base de datos</label>
                  <input class="form-control" type="text" name="dbname" placeholder="Ejemplo: bdalmacen" required>
                </div>
              </br>
                <div class="col-md-5 col-md-offset-4">
                  <br>     
                <label class="control-label">Equipo</label>
                <?php 
         global $conexion; 
           $sql="SELECT Equipo FROM alumno WHERE  Alumnonom ='$login_session'";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            { ?>
            <input class="form-control"  name="equipo" readonly="readonly" Value="<?php echo $row['Equipo'] ?>"  type="text">
         <?php }   ?>
                </div>

                <div class="form-group col-md-5">
                   <br>                  
                  <label class="control-label">Lenguaje de programación</label>
                  <input class="form-control" type="text" name="categoria" value="PHP" readonly="readonly">
                </div>
             
        
                   <div class="form-group col-md-5">
                  <label class="control-label">Cliente</label>
        <select class="form-control"  name="cliente" required>
        <?php 
         global $conexion;
           $sql="SELECT * FROM cliente ";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
          echo "<option>";
            echo $row['Cliente'];
            echo "</option>";
          }
          ?>
      </select>
                </div>
                  <div class="form-group col-md-5">
                  <label class="control-label">Aprobó</label>
             <select class="form-control"  name="calificador" required>
        <?php 
         global $conexion;
           $sql="SELECT * FROM cliente ";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
          echo "<option>";
            echo $row['Cliente'];
            echo "</option>";
          }
          ?>
      </select>
                </div>
                <div class="form-group col-md-5">
                  <br>
                  <label class="control-label">Selecciona tu proyecto en archivo .zip</label>
                   <input type="file" required="" class="form-control" name="proyectorar" accept=".zip">
                </div>
                <div class="form-group col-md-5">
                  <br>
                  <label class="control-label">Selecciona la presentación de tu proyecto .mp4</label>
                   <input type="file" required="" class="form-control"  name="video" accept=".mp4">
                </div>
                <div class="form-group col-md-5">
                  <br>
                  <label class="control-label">Selecciona tu base de datos .sql</label>
                    <input type="file" required="" class="form-control" name="base" accept=".sql" >
                </div>
                <div class="form-group col-md-5">
                  <br>
                  <label class="control-label">Selecciona una imagen para visualizar tu proyecto</label>
                  <input type="file" required="" class="form-control" name="imagen" accept=".jpg, .jpeg"  >
                </div>
                    <div style="margin-left:220px;" class="form-group col-md-4 align-self-end">
                      <br><br>
                    <button class="btn btn-info btn-primary" type="submit" style="width: 150px; height: 45px; font-size: 18px;" name="enviar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
                    <a href="indexalumno.php" ><button style="margin-left: 20px; width: 100px; height: 45px; font-size: 18px;" class="btn btn-info btn-danger">Cancelar</button></a>
                    </div>                    
              </form>
              

<center>
<?php  require 'conexion.php'; 

if(isset($_POST["enviar"])){

//insercion de alumnos
if(!empty($_POST['Nombre']) && !empty($_POST['Descripcion']) && !empty($_POST['cliente'])  && !empty($_POST['calificador'])) 
{
  $ext = substr($_FILES['proyectorar']['name'], strpos($_FILES['proyectorar']['name'], '.'));
  $nombre="archivo".$ext;
  if(move_uploaded_file($_FILES['proyectorar']['tmp_name'], "upload/".$nombre));
  
  $enzipado = new ZipArchive();

  $carpeta = $_POST['equipo'];

  $enzipado->open('upload/archivo.zip');
  $extraido = $enzipado->extractTo("upload/$carpeta/");
  
  if($extraido == TRUE)
    {
       for ($x = 0; $x < $enzipado->numFiles; $x++) 
       {
            $archivo = $enzipado->statIndex($x);
            // echo 'Extraido: '.$archivo['name'].'</br>';
             
       }
       echo $enzipado->numFiles ." archivos descomprimidos en total".'<br>';
    }
    else
    {
      'Ocurrió un error y el archivo no se pudó descomprimir';
    }
      
   $extt = substr($_FILES['base']['name'], strpos($_FILES['base']['name'], '.'));
  $nombree=$_POST['equipo'].$extt;
  if(move_uploaded_file($_FILES['base']['tmp_name'], "upload/$carpeta/".$nombree));

  $exto = substr($_FILES['imagen']['name'], strpos($_FILES['imagen']['name'], '.'));
  $nombre=$_POST['equipo'].$exto;
  if(move_uploaded_file($_FILES['imagen']['tmp_name'], "upload/$carpeta/".$nombre));
  
  $ext = substr($_FILES['video']['name'], strpos($_FILES['video']['name'], '.'));
  $nombre=$_POST['equipo'].$ext;
  if(move_uploaded_file($_FILES['video']['tmp_name'], "upload/$carpeta/".$nombre));
    

$conn =new mysqli('localhost', 'root', '');
$query = '';
$sqlScript = file("upload/$carpeta/$nombree");
  $correc="No";
foreach ($sqlScript as $line){

    $startWith = substr(trim($line), 0 ,2);
    $endWith = substr(trim($line), -1 ,1);
    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
        continue;
    }
    $query = $query . $line;
    if ($endWith == ';') {
        mysqli_query($conn,$query) or die('<strong>Problemas Detectado en la base de datos en la siguiente linea de codigo' . $query. 'corrijalo por favor no se registro el proyecto');
        
        //echo $query."<br>";
        $query= '';             
        }
}
echo '<div class="success-response sql-import-response">Base De Datos Creada Exitosamente</div>';
 $correc="SI";

if(file_exists("upload/$carpeta/$nombree") && $correc="SI"){

  $queryInsert = "INSERT INTO  proyecto (Nombre, Descripcion, Url, Imagen, Cliente, calificador, Categoria, Presentacion , Equipous,bdname) VALUES  ('".$_POST['Nombre']."', 
  '".$_POST['Descripcion']."',
   '/adminpro/adminpro/backend/upload/".$carpeta."/".$_POST['url']."', 
   '".$_POST["equipo"].$exto."',
   '".$_POST['cliente']."',  
   '".$_POST['calificador']."', 
   '".$_POST['categoria']."',
   '".$_POST["equipo"].$ext."',
    '".$_POST['equipo']."',
    '".$_POST['dbname']."');";
  $resultInsert = mysqli_query($conexion, $queryInsert); 
  if($resultInsert)
  {
  global $login_session;
     $message ="<strong>Proyecto Registrado Con Exito</strong>. <br>";
  }
  else
  {
      $message ="<strong>Verifica tus datos por favor no se registro el Proyecto</strong> <br>";
     
  }

}else{
  $message ="<strong>Verifica tus datos por favor no se registro el Proyecto</strong> <br>";
}

} 
}
?>
</center>
<center>
     <?php 
                if(!empty($message)): ?>
                <div class="alert alert-success">
                 <?= $message;?>
                </div>
            <?php endif;?>
</center>



            </div>
          </div>
        </div>
      </div>
 </main>
<?php
include('./master/footer.php'); 
?> 