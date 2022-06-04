<?php
    $idVenta = $_POST['id'];
    $idProducto = $_POST['idprod'];
    $cantVenta = $_POST['cant'];
    $totalVenta = $_POST['total'];

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');
    $sql="UPDATE `ventas` SET `estado` = 'entregada' WHERE `ventas`.`id` = $idVenta;";
    mysqli_query($con,$sql);

    $sql="INSERT INTO `salidas`(`id`, `venta`, `producto`, `cantidad`, `total`, `fecha`)";
    $sql=$sql."VALUES (DEFAULT,".$idVenta.",".$idProducto.",".$cantVenta.",".$totalVenta.",now())";
    mysqli_query($con,$sql);
?>