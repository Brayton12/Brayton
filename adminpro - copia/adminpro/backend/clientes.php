<?php
include('./master/header.php'); 
?>
<main class="app-content">
 

<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clientes</font></font></h3>
            <a class="btn btn-primary icon-btn" href="Agregar_Clientes.php"><i class="fa fa-lg fa-plus"></i>Agregar nuevo </a>
            <br><br><br>
              <?php
                    require_once "conexion.php";
                 $sql = "SELECT * FROM cliente";
                    if($result = mysqli_query($conexion, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<center> <table class='table table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<center>";
                                        echo "<th>Cliente</th>";
                                        echo "<th>Eliminar</th>";
                                        echo "</center>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                       echo "<center>";
                                        echo "<td>" . $row['Cliente'] . "</td>";
                                        echo "<td>"; 
                                            echo "<a href='eliminarcliente.php?Cliente=". $row['Cliente'] ."' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>Eliminar</span></a>";
                                        echo "</td>";
                                                   echo "</center>";
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