<?php
   include('headerfront.php');    
?>
<?php
if($_GET["IdPro"]){
   require_once "../backend/conexion.php";
   $sql= "SELECT DISTINCT * FROM proyecto,equipos,alumno WHERE proyecto.Equipous=equipos.Equipo and equipos.Equipo=alumno.Equipo and IdPro =  '".$_GET['IdPro']."' ";
   $result = mysqli_query($conexion, $sql);
}
?>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <input type="hidden" name="IdPro" value="<?php echo trim($_GET["IdPro"]); ?>"/>        
  </form>
       <?php global $result;
               if($result)
               { 
               while ($r=$result->fetch_array()){     ?>  
    <div class="container">
      <h1 class="my-4"><?php echo $r["Nombre"];?> 
      </h1>
      <div class="row">
        <div class="col-md-8">
           <br>
          <video class="col-md-12" controls>
       <source src="../backend/upload/<?php echo $r['Equipous']; ?>/<?php echo $r['Presentacion']; ?>" type="video/mp4">
        </video>
       <center>
        <small><br><br> <a href="<?php echo $r["Url"];?>" target="_blank"  style="width: 250px; height:55px; " class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><h3>Ejecutar</h3></a></small></center>
        </div>
        <div class="col-md-4">
          <h3 class="my-3">Descripción del proyecto :</h3>
          <p><?php echo $r["Descripcion"];?></p>
          <h3 class="my-3">Detalles del proyecto :</h3>
          <ul>
            <li>Equipo : <?php   echo $r["Equipous"];?></li>
            <li>Catégoria : <?php   echo $r["Categoria"];?></li>
            <li>Integrantes:    <?php 
         global $conexion;
           $sql="SELECT * FROM alumno WHERE Equipo='".$r["Equipo"]."';";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
              echo "</br>";
            echo $row['Alumnonom'];
            echo "&nbsp;&nbsp;&nbsp;";
            echo $row['ApellidoPaterno']; 
            echo "&nbsp;&nbsp;&nbsp;";
            echo $row['ApellidoMaterno'];
            
          }
          ?></li>
            <li>Grado :  <?php 
         global $conexion;
           $sql="SELECT DISTINCT Grado FROM alumno WHERE Equipo='".$r["Equipo"]."' order by Grado desc limit 1 ;";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
            echo $row['Grado'];
          }
          ?></li>
            <li>Grupo : <?php 
         global $conexion;
           $sql="SELECT DISTINCT  Grupo FROM alumno WHERE Equipo= '".$r["Equipo"]."';";
         $rec=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($rec))
            {
            echo $row['Grupo'];
          }
          ?></li>
            <li>Cliente : <?php   echo $r["Cliente"];?></li>
            <li>Aprobo : <?php   echo $r["calificador"];?></li>
          </ul>
           <br>
         
      <?php    }
                }
                else{
                echo "No Se Selecciono Ningun Proyecto";}
              ?>  
        </div>

      </div>

    </div>

          
    <?php
   
   include('footerfront.php');    
?>