<?php
    $deleteID = $_POST['id'];

    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');
    $sql = "DELETE FROM `almacen` WHERE `almacen`.`id` = $deleteID;";
    mysqli_query($con,$sql);
    mysqli_close($con);
?>