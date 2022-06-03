<?php
    $nombre = $_POST['nombre'];
    
    $con = mysqli_connect('localhost','root','',"gestor_php");
    mysqli_select_db($con,'gestor_php');                
    $sql="INSERT INTO `restaurantes`(`id`, `nombre`) VALUES (DEFAULT,'".$nombre."')";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);

    header("location:registro.php");
?>