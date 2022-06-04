<?php
    SESSION_START();
    $desc = $_POST['desc'];
    $materia = $_POST['materia'];
    $precio = $_POST['precio'];
    
    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="insert into `productos`(`id`, `descripcion`, `precio`, `materia`, `usuario`,`idrestaurante`)";
    $sql=$sql. " values(DEFAULT,'".$desc."',".$precio.",'".$materia."',".$_SESSION['idusuario'].",".$_SESSION['idrestaurante'].")";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>