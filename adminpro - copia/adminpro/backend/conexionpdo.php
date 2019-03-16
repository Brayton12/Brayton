<?php
try{
    $link='mysql:host=localhost;dbname=adminpro';
    $usuario='root';
    $pass='';
     $pdo=new PDO($link,$usuario,$pass);
     

}
    catch(PDOException $e){
        echo "ERROR:".$e->getMessage();
        }
?>