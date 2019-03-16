<?php
include('./master/header.php'); 
?>
<main class="app-content">
 

<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alumnos Registrados</font></font></h3>
            <a class="btn btn-primary icon-btn" href="Agregar_alumnos.php"><i class="fa fa-lg fa-plus"></i>Agregar nuevo </a>
            <br><br><br>
              <?php
                    require_once "conexion.php";
                 $sql = "SELECT * FROM  alumno where Tipodeusuario=1";
                    if($result = mysqli_query($conexion, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<center> <table class='table table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<center>";
                                       echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Apellido Paterno</th>";
                                        echo "<th>Apellido Materno</th>";
                                        echo "<th>Matricula</th>";
                                        echo "<th>Cuatrimestre</th>";
                                        echo "<th>Grupo</th>";
                                        echo "<th>Carrera</th>";
                                        echo "<th>Acciones</th>";
                                        echo "</center>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Alumnonom'] . "</td>";
                                        echo "<td>" . $row['ApellidoPaterno'] . "</td>";
                                        echo "<td>" . $row['ApellidoMaterno'] . "</td>";
                                        echo "<td>" . $row['Correo'] . "</td>";
                                        echo "<td>" . $row['Grado'] . "</td>";
                                        echo "<td>" . $row['Grupo'] . "</td>";
                                        echo "<td>" . $row['Carrera'] . "</td>";
                                        echo "<td>"; 
                                            echo "<a href='eliminaralumno.php?id=". $row['id'] ."' title='eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>Eliminar</span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table> </center>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No hay resultados.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
                    }
                    mysqli_close($conexion);
                    ?>
              </table>
            </div>
          </div>
        </div>
        
<?php
include('./master/footer.php'); 
?>