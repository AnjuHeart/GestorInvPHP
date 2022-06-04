<?php
    $matID = $_POST['idmat'];
    $matCANT = $_POST['cantmat'];

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="SELECT * FROM `almacen` WHERE id=$matID";
    $result = mysqli_query($con,$sql);
    $fila = mysqli_fetch_row($result);

    $matExistencia = $fila[2];
    $nuevaExistencia = $matExistencia - $matCANT;

    $sql="UPDATE `almacen` SET `existencias` = '$nuevaExistencia' WHERE `almacen`.`id` = $matID;";
    mysqli_query($con,$sql);
?>