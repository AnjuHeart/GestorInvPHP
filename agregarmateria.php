<?php
    $nombre = $_POST['nombre'];
    $exist = $_POST['existencias'];
    
    

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                

    $idUsuario = $_SESSION['idusuario'];
    $sql = "SELECT * FROM usuarios WHERE id=$idUsuario LIMIT 1;";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $idRestaurante = $row['idrestaurante'];

    $sql="INSERT INTO `almacen`(`id`, `nombre`, `existencias`, `idrestaurante`)";
    $sql=$sql. " values(DEFAULT,'".$nombre."',".$exist.",".$idRestaurante.")";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>