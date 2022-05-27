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

            $con = mysqli_connect('localhost','root','',"gestor_php");
            
            $consulta = "SELECT*FROM usuarios WHERE usuario= '$usuario'";
            $resultado = mysqli_query($con,$consulta);
            $fila = mysqli_fetch_row($resultado);

            if(password_verify($contra, $fila[3])){
                SESSION_START();
                $_SESSION['restaurante']=$fila[4];
                header("location:vista_dashboard.php");
            } else{
                ?>
                <?php
                include("login.php");
                ?>
                <script type = "text/javascript"> 
                    alert("Verifique que el usuario y contraseña sean correctos");
                </script>
                <?php
            }
            mysqli_free_result($resultado);
            mysqli_close($con);
        }
    }else{
        header('location:login.php');
    }






