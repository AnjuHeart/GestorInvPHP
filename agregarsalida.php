<?php
    SESSION_START();
    $idVenta = $_POST['id'];
    $idProducto = $_POST['idprod'];
    $cantVenta = $_POST['cant'];
    $totalVenta = $_POST['total'];
    $idrestaurante = $_SESSION['idrestaurante'];

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');
    $sql="UPDATE `ventas` SET `estado` = 'entregada' WHERE `ventas`.`id` = $idVenta;";
    mysqli_query($con,$sql);

    $sql="INSERT INTO `salidas`(`id`, `venta`, `producto`, `cantidad`, `total`, `fecha`, `idrestaurante`)";
    $sql=$sql."VALUES (DEFAULT,".$idVenta.",".$idProducto.",".$cantVenta.",".$totalVenta.",now(),".$idrestaurante.")";
    mysqli_query($con,$sql);
?>