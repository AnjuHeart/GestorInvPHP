<?php
    $_SESSION['idusuario'] = "6"; //Esta línea debe ser eliminada cuando el login funcione
    $nombre = $_POST['nombre'];
    $exist = $_POST['existencias'];
    
    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="INSERT INTO `almacen`(`id`, `nombre`, `existencias`, `usuario`)";
    $sql=$sql. " values(DEFAULT,'".$nombre."',".$exist.",".$_SESSION['idusuario'].")";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>