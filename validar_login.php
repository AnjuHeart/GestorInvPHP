<?php

    $usuario = sanitize_text_field($_POST['usuario']);
    $contra = sanitize_text_field($_POST['contra']);
    session_start();
    $_SESSION['usuario'] = $usuario;

    $con = mysqli_connect('localhost','root','',"gestor_php");

    $consulta = "SELECT*FROM usuarios WHERE usuario= '$usuario' and contraseña='$contra'";
    $resultado = mysqli_query($con,$consulta);

    $filasQuery = mysqli_num_rows($resultado);

    if($filasQuery){
        header("location:vista_dashboard.php");
    } else{
        ?>
        <?php
        include("login.php");
        ?>
        <h1 class="noMatchLabel">Error en la autentificación</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($con);

