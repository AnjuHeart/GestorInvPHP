<?php

    $usuario = $_POST['usuario'];
    $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT);
    $captcha = $_POST['g-recaptcha-response'];

    if(!empty($captcha)){
        $secret = "6LdOVQMgAAAAAE1DUZi6vOAeA7YFMzfQw5Y7gIam";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
        $arr=json_decode($response,TRUE);
        if($arr["success"]){
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
        }
    }else{
        header('location:login.php');
    }






