<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ventas de Restaurante</title>
</head>
<body>
<header>
        <div class="px-3 py-2 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                    <p class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none link-dark">
                        NOMBRE DEL RESTAURANTE
                    </p>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="cerrarsesion.php" class="btn btn-danger">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main style="margin-left: 15px;margin-right: 15px;">
        <h1>Ventas recibidas</h1>

        <!-- TABLA -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ID de Venta</th>
                    <th>Materia Prima</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $con = mysqli_connect('localhost','root','',"gestor_php");
                $_SESSION['idusuario'] = "6"; //Este session usuario es un parche, debe ser eliminado en cuanto funcione el login

                $idUsuario = $_SESSION['idusuario'];
                $sql = "SELECT * FROM productos WHERE usuario=$idUsuario";
                $resultProductos = mysqli_query($con,$sql);

                

                while ($row = $resultProductos->fetch_assoc()) {
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". $row["descripcion"] ."</td>
                    <td>". $row["materia"] ."</td>
                    <td>". $row["precio"] ."</td>
                    <td>null</td>
                    </tr>";
                }
               ?>
            </tbody>
        </table>
    </main>
</body>
</html>