<?php
    $_SESSION['idusuario'] = "6"; //Esta línea debe ser eliminada cuando el login funcione
    $idprod = $_POST['prodid'];
    $prodname = $_POST['producto'];
    $cantidad = $_POST['cant'];
    $precio = $_POST['price'];
    $total = $_POST['canttotal'];

    
    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="INSERT INTO `ventas`(`id`, `idprod`, `producto`, `cantidad`, `precio`, `total`, `usuario`)";
    $sql=$sql. " values(DEFAULT,".$idprod.",'".$prodname."',".$cantidad.",".$precio.",".$total.",".$_SESSION['idusuario'].")";   
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>