<?php
   $content = 'This is about us page content';
   include('headerfront.php');    
?>
<section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Academia</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">En esta plataforma se hizo para la finalidad de dar a conocer los proyectos elaborados por lo alumnos de la UTM, podras encontrar poyectos como: Genaradores de recursos, Administraciones de proyectos, Adminitradores de curso entre otros</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">conocer más hacerca de la universidad</a>
          </div>
        </div>
      </div>
    </section><br><br><br>
            <center><h1 id="proyectos" class="text-uppercase">
              <strong>Proyectos Disponibles</strong>
            </h1></center><br><br><br>
    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
           <?php
            require_once "../backend/conexion.php";
            $sql = "SELECT * FROM proyecto WHERE Estatus='Activo'";
            if($result = mysqli_query($conexion, $sql)){
            if(mysqli_num_rows($result) > 0){ ?>
            <?php while($row = mysqli_fetch_array($result)){ ?> 
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href='infoproyectos.php?IdPro=<?php echo $row['IdPro']; ?>'>
              <img class="img-fluid" style="width:450px; height:242px;"  src="../backend/upload/<?php echo $row['Equipous']; ?>/<?php echo $row['Imagen']; ?>"  alt="imagen no disponible">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Nombre del proyecto
                  </div>
                  <div class="project-name">
                    <?php echo $row['Nombre']; ?>
                  </div>
                </div>
              </div>
            </a>
          </div>
            <?php } ?>
        <?php }  else {?>

                <div class="alert alert-success" style="width:100%; text-align:center;">
                No Hay Proyectos Disponibles
                </div>

        <?php } ?> 
        <?php } ?> 
        </div>
      </div>
    </section>
    <?php
   $content = 'This is about us page content';
   include('footerfront.php');    
?>