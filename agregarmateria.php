<?php
    $nombre = $_POST['nombre'];
    $exist = $_POST['existencias'];
    
    

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                

    SESSION_START();
    $idUsuario = $_SESSION['idusuario'];
    $idRestaurante = $_SESSION['idrestaurante'];

    $sql="INSERT INTO `almacen`(`id`, `nombre`, `existencias`, `idrestaurante`)";
    $sql=$sql. " values(DEFAULT,'".$nombre."',".$exist.",".$idRestaurante.")";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>