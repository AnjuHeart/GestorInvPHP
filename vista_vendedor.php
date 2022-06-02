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
                    <th>ID de Producto</th>
                    <th>Cantidad</th>
                    <th>Materia Prima</th>
                    <th>Total</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $con = mysqli_connect('localhost','root','',"gestor_php");
                $_SESSION['idusuario'] = "7"; //Este session usuario es un parche, debe ser eliminado en cuanto funcione el login

                $idUsuario = $_SESSION['idusuario'];
                $sql = "SELECT * FROM usuarios WHERE id=$idUsuario LIMIT 1;";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                $idRestaurante = $row['idrestaurante'];
                
                $sql = "SELECT * FROM ventas WHERE idrestaurante=$idRestaurante";
                $resultRestaurante = mysqli_query($con,$sql);

                while ($row = $resultRestaurante->fetch_assoc()) {
                    $idProd = $row["idprod"];
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". $idProd ."</td>
                    <td>". $row["cantidad"] ."</td>
                    <td>";
                        $sql = "SELECT * FROM productos WHERE id=$idProd";
                        $resultProducto = mysqli_query($con,$sql);
                        $filaProd = mysqli_fetch_array($resultProducto);
                        $materiaProd = explode(",",$filaProd['materia']);
                        foreach ($materiaProd as $valor) {
                            $sql = "SELECT * FROM almacen WHERE id=$valor";
                            $resultMateria = mysqli_query($con,$sql);
                            $filaMateria = mysqli_fetch_array($resultMateria);

                            echo strtoupper($filaMateria['nombre']);
                            echo "<br>";
                        }
                        
                    echo "</td>
                    <td>". $row["total"] ."</td>
                    <td>". $row["notas"] ."</td>
                    </tr>";
                }
               ?>
            </tbody>
        </table>
    </main>
</body>
</html>