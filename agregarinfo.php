<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        window.location.href = "/index.html";
    });
    </script>

</head>

<body>

    <?php                       
        $usuario = sanitize_text_field($_POST['usuario']);
        $trabajador = sanitize_text_field($_POST['trabajador']);
        $contra = sanitize_text_field(($_POST['contra']));

        $con = mysqli_connect('localhost','root','',"gestor_php");

        if (!$con) { die('No se pudo conectar: ' . mysqli_error($con)); 
        }

        mysqli_select_db($con,'gestor_php');                
        $sql="insert into usuarios(id,usuario, trabajador, contraseña)";
        $sql=$sql. " values(DEFAULT,'".$usuario."','".$trabajador."','".$contra."')";   
        $result = mysqli_query($con,$sql);
        mysqli_close($con);
    ?>

</body>

</html>