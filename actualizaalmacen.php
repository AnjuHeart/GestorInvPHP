<?php
    $upID = $_POST['id'];
    $upName = $_POST['nombre'];
    $upExis = $_POST['existencias'];

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');
    $sql = "UPDATE `almacen` SET `existencias` = '$upExis' WHERE `almacen`.`id` = $upID;";
    mysqli_query($con,$sql);

    $sql = "UPDATE `almacen` SET `nombre` = '$upName' WHERE `almacen`.`id` = $upID;";
    mysqli_query($con,$sql);
    mysqli_close($con);
?>