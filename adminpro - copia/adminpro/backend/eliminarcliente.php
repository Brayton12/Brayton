<?php
include('./master/header.php'); 
?>
<br><br><br><br>

<?php
 if(isset($_POST["Cliente"]) && !empty($_POST["Cliente"])){
    require_once "conexion.php";
    $sql = "DELETE FROM cliente WHERE Cliente = '".$_POST["Cliente"]."'";
    if($stmt = mysqli_prepare($conexion, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["Cliente"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: /AdminPro/backend/clientes.php");
        } else{
            echo "Oops! No Se ¨Pudo Eliminar Este Cliente";
        }
    }
    mysqli_close($conexion);
} else{
    if(empty(trim($_GET["Cliente"]))){
        header("location: /AdminPro/backend/clientes.php");
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
                        <h1>Eliminación De Cliente</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="Cliente" value="<?php echo trim($_GET["Cliente"]); ?>"/>
                            <p>¿Deseas Eliminar Este Cliente?</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="/AdminPro/backend/clientes.php" class="btn btn-default">No</a>
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