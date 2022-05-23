<?php

    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    $captcha = $_POST['g-recaptcha-response'];

    if(!empty($captcha)){
        $secret = "6LdOVQMgAAAAAE1DUZi6vOAeA7YFMzfQw5Y7gIam";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
        $arr=json_decode($response,TRUE);
        if($arr["success"]){
            session_start();
            $_SESSION['usuario'] = $usuario;

            $con = mysqli_connect('localhost','root','',"gestor_php");
            
            $consulta = "SELECT*FROM usuarios WHERE usuario= '$usuario'";
            $resultado = mysqli_query($con,$consulta);
            $fila = mysqli_fetch_row($resultado);

            if(password_verify($contra, $fila[3])){
                header("location:vista_dashboard.php");
                SESSION_START();
                $_SESSION['usuario']=$usuario;
            } else{
                ?>
                <?php
                include("login.php");
                echo(password_verify($contra,$fila[3]));
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






