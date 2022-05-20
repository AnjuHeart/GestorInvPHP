<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        window.location.href = "vista_dashboard.php";
    });
    </script>

</head>

<body>

    <?php                       
        $usuario = $_POST['usuario'];
        $trabajador = $_POST['trabajador'];
        $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT);
        $captcha = $_POST['g-recaptcha-response'];

        if(!empty($captcha)){
            $secret = "6LdOVQMgAAAAAE1DUZi6vOAeA7YFMzfQw5Y7gIam";
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr=json_decode($response,TRUE);
            if($arr["success"]){
                $con = mysqli_connect('localhost','root','',"gestor_php");

                if (!$con) { die('No se pudo conectar: ' . mysqli_error($con)); 
                }

                mysqli_select_db($con,'gestor_php');                
                $sql="insert into usuarios(id,usuario, trabajador, contraseña)";
                $sql=$sql. " values(DEFAULT,'".$usuario."','".$trabajador."','".$contra."')";   
                $result = mysqli_query($con,$sql);
                mysqli_close($con);
            }
        }else{
            header('location:registro.php');
        }
    ?>

</body>

</html>