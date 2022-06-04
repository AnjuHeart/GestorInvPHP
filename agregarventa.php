<?php
    SESSION_START();
    $idprod = $_POST['prodid'];
    $prodname = $_POST['producto'];
    $cantidad = $_POST['cant'];
    $precio = $_POST['price'];
    $total = $_POST['canttotal'];
    $notas = $_POST['nota'];
    $idUsuario = $_SESSION['idusuario'];
    $idRestaurante = $_SESSION['idrestaurante'];
    
    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="INSERT INTO `ventas`(`id`, `idprod`, `producto`, `cantidad`, `precio`, `total`, `usuario`, `idrestaurante`, `notas`)";
    $sql=$sql. " values(DEFAULT,".$idprod.",'".$prodname."',".$cantidad.",".$precio.",".$total.",".$idUsuario.",".$idRestaurante.",'".$notas."')";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>