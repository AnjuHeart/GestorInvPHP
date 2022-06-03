<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      function validarMateria() {
        var nombre = $('#nombreText').val();
        var existencias = $('#existenciasText').val();


        if (nombre != "" && existencias != "") {
            //REPLICACIÓN DE POST
            $.post("agregarmateria.php", {
                nombre: $('#nombreText').val(),
                existencias:  $('#existenciasText').val()
            },
            function(data, status) {
                alert("La inserción fue realizada correctamente");
            });
            location.reload();
        } else {
            alert("Favor de llenar completamente el formulario");
        }
    }
    </script>
    <title>Almacen</title>
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

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="vista_dashboard.php" class="nav-link link-dark">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="vista_ventas.php" class="nav-link link-dark">
                                Ventas
                            </a>
                        </li>
                        <li>
                            <a href="vista_almacen.php" class="nav-link link-secondary">
                                Almacen
                            </a>
                        </li>
                        <li>
                            <a href="vista_productos.php" class="nav-link link-dark">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a href="cerrarsesion.php" class="btn btn-danger">
                                Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main style="margin-left: 15px;margin-right: 15px;">
        <h1>Almacen</h1>

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#popAlmacen">
            Añadir materia prima
        </button>

        <!-- Modal -->
        <div class="modal fade" id="popAlmacen" tabindex="-1" aria-labelledby="popAlmacenLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popAlmacenLabel">Materia prima</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <fieldset disabled>
                            <div class="input-group flex-nowrap disabled">
                                <span class="input-group-text" id="addon-wrapping">ID</span>
                                <input type="text" class="form-control" placeholder="Por defecto..."
                                    aria-label="Por defecto..." aria-describedby="addon-wrapping" name="id">
                            </div>
                        </fieldset>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre: </span>
                            <input type="text" class="form-control" placeholder="Ingredientes, condimetos..." aria-label="Ingredientes, condimetos..."
                                aria-describedby="basic-addon1" id="nombreText">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Existencia actual</span>
                            <input type="text" class="form-control" placeholder="Ej. 0, 10" aria-label="Ej. 0, 10"
                                aria-describedby="basic-addon1" id="existenciasText">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onClick="validarMateria()">Añadir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLA -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Existencias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect('localhost','root','',"gestor_php");


                $idAlmacen = $_SESSION['idrestaurante'];
                $sql = "SELECT * FROM almacen WHERE idrestaurante=$idAlmacen";
                $result = mysqli_query($con,$sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". strtoupper($row["nombre"]) ."</td>
                    <td>". $row["existencias"] ."</td>
                    </tr>";
                }
               ?>
            </tbody>
        </table>
    </main>
</body>

</html>