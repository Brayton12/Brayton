<?php
include('./master/header.php'); 
?>
<br><br><br><br>

<?php
 if(isset($_POST["Equipo"]) && !empty($_POST["Equipo"])){
    require_once "conexion.php";
    $sql = "DELETE FROM equipos WHERE Equipo = '".$_POST["Equipo"]."'";
    if($stmt = mysqli_prepare($conexion, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["Equipo"]);
        if(mysqli_stmt_execute($stmt)){
            header("location:/AdminPro/backend/equipos.php");
        } else{
            echo "Oops! No Se ¨Pudo Eliminar Este Equipo";
        }
    }
    mysqli_close($conexion);
} else{
    if(empty(trim($_GET["Equipo"]))){
        header("location: /AdminPro/backend/equipos.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div style="margin-left: 550px; text-align:center; " class="wrapper" class="alert alert-danger fade in">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Eliminación De Equipo</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="Equipo" value="<?php echo trim($_GET["Equipo"]); ?>"/>
                            <p>¿Deseas Eliminar Esta Equipo?</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="/AdminPro/backend/equipos.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
include('./master/footer.php'); 
?>