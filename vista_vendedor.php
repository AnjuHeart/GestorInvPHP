<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Ventas de Restaurante</title>
    <script>
    function updateButtons() {
        $(".addBtn").click(function() {

            var actual = parseInt($(this).closest("tr").find(".cant").text());
            actual += 1;
            $(this).closest("tr").find(".cant").text(actual);
            console.log('Funciona');
        });
        $(".substractBtn").click(function() {
            var actual = parseInt($(this).closest("tr").find(".cant").text());
            if (actual >= 1) {
                actual += -1;
                $(this).closest("tr").find(".cant").text(actual);
            }
        });
    }
    </script>
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
                        <?php
                        SESSION_START();
                        $idRestaurante = $_SESSION['idrestaurante'];
                        
                        $con = mysqli_connect('localhost','root','',"gestor_php");
                        
                        $consulta = "SELECT*FROM restaurantes WHERE id= '$idRestaurante'";
                        $resultado = mysqli_query($con,$consulta);
                        $fila = mysqli_fetch_row($resultado);
                        
                        echo("Restaurante: ".$fila[1]); ?>
                    </p>
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
                $idUsuario = $_SESSION['idusuario'];
                $sql = "SELECT * FROM usuarios WHERE id='$idUsuario';";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                $idRestaurante = $row['idrestaurante'];
                
                $sql = "SELECT * FROM ventas WHERE idrestaurante=$idRestaurante";
                $resultRestaurante = mysqli_query($con,$sql);

                while ($row = $resultRestaurante->fetch_assoc()) {
                    if($row['estado'] == "pendiente"){
                        $idProd = $row["idprod"];
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". $idProd ."</td>
                    <td>". $row["cantidad"] ."</td>
                    <td>
                    <table class='table table-striped'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>ID</th>
                                <th>Materia</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>";
                        $sql = "SELECT * FROM productos WHERE id=$idProd";
                        $resultProducto = mysqli_query($con,$sql);
                        $filaProd = mysqli_fetch_array($resultProducto);
                        $materiaProd = explode(",",$filaProd['materia']);
                        foreach ($materiaProd as $valor) {
                            $sql = "SELECT * FROM almacen WHERE id=$valor";
                            $resultMateria = mysqli_query($con,$sql);
                            $filaMateria = mysqli_fetch_array($resultMateria);
                            echo "<tr>";
                            echo "<td>".$filaMateria['id']."</td>";
                            echo "<td>".strtoupper($filaMateria['nombre'])."</td>";
                            echo "<td class='cant'>".$row["cantidad"]."</td>";
                            echo '<td><div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary addBtn">+</button>
                            <button type="button" class="btn btn-danger  substractBtn">-</button>
                            </div></td>';
                            echo "<tr>";
                        }
                        
                    echo "</tbody>
                    </table></td>
                    <td>". $row["total"] ."</td>
                    <td>". $row["notas"] ."</td>
                    </tr>";
                    }
                }
                echo "<script>updateButtons();</script>"
               ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" style="position: fixed; bottom: 30px; right: 20px;"
            onClick="">Enviar Pedidos</button>
    </main>
</body>

</html>