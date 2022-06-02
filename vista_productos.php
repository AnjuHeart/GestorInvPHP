<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function SwitchModular() {
        $('#popModular .btn-close').click();
        $('#popMateria').modal('show');
    }

    function SwitchMaterialObtain() {
        $texto = "";
        $('#checkboxes input:checked').each(function() {
            $texto += $(this).attr('name') + ",";

        });
        $('#popMateria .btn-close').click();
        $('#popModular').modal('show');

        $('#textoMateria').val($texto.slice(0, -1));
    }

    function validarProducto() {
        var desc = $('#descrArea').val();
        var materia = $('#textoMateria').val();
        var precio = $('#precioProd').val();


        if (desc != "" && materia != "" && precio != "") {
            //REPLICACIÓN DE POST
            $.post("agregarproducto.php", {
                desc: $('#descrArea').val(),
                materia:  $('#textoMateria').val(),
                precio: $('#precioProd').val()
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
    <title>Productos</title>
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
                            <a href="vista_dashboard.php" class="nav-link link-dark">Dashboard</a>
                        </li>
                        <li>
                            <a href="vista_ventas.php" class="nav-link link-dark">Ventas</a>
                        </li>
                        <li>
                            <a href="vista_almacen.php" class="nav-link link-dark">Almacen</a>
                        </li>
                        <li>
                            <a href="vista_productos.php" class="nav-link link-secondary">Productos</a>
                        </li>
                        <li>
                            <a href="cerrarsesion.php" class="btn btn-danger">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main style="margin-left: 15px;margin-right: 15px;">
        <h1>Productos</h1>

        <!---POP-UP--->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#popModular">
            Añadir un nuevo producto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="popModular" tabindex="-1" aria-labelledby="popModularLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popModularLabel">Formulario para nuevo producto</h5>
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
                        <div class="input-group">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" aria-label="Ej. 'Pollo a la plancha con salsa de ostión...'"
                                name="descrArea" id="descrArea"></textarea>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Materia Prima</span>
                            <input type="text" class="form-control" placeholder="..." aria-label="..."
                                aria-describedby="button-addon2" id="textoMateria">
                            <button class="btn btn-outline-secondary" type="button" id="seleccionMateria"
                                onClick="SwitchModular()">Seleccionar</button>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Precio. $</span>
                            <input type="text" class="form-control" placeholder="Ej. '58.00'" aria-label="Ej. '58.00'"
                                aria-describedby="basic-addon1" id="precioProd">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Imagen</span>
                            <input type="text" class="form-control" placeholder="No hay imagen seleccionada..."
                                aria-label="No hay imagen seleccionada..." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button"
                                id="button-addon2">Seleccionar</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onClick="validarProducto()">Añadir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- POP MATERIA PRIMA -->
        <div class="modal fade" id="popMateria" tabindex="-1" role="dialog" aria-labelledby="popMateriaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popMateriaLabel">Seleccionar materia prima de este producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="checkboxes">
                            <?php
                                $con = mysqli_connect('localhost','root','',"gestor_php");
                                $_SESSION['idusuario'] = "6"; //Este session usuario es un parche, debe ser eliminado en cuanto funcione el login

                                $idUsuario = $_SESSION['idusuario'];
                                $sql = "SELECT * FROM usuarios WHERE id=$idUsuario LIMIT 1;";
                                $result = mysqli_query($con,$sql);
                                $row = mysqli_fetch_array($result);
                                $idRestaurante = $row['idrestaurante'];
                                
                                $sql = "SELECT * FROM almacen WHERE idrestaurante=$idRestaurante";
                                $result = mysqli_query($con,$sql);

                                while ($row = $result->fetch_assoc()) {
                                    $idcheck = "material" . strval($row['id']) . "," . strval($row['idrestaurante']);
                                    $aescribir = strval($row["id"]) . ": " . strtoupper($row["nombre"]);
                                    echo '<div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="'.$row["id"].'" class="custom-control-input" id="'.$idcheck.'">
                                    <label class="custom-control-label" for="'.$idcheck.'">
                                    '.$aescribir.'</label>
                                </div>
                                <br>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onClick="SwitchMaterialObtain()"
                            id="addProdBTN">Añadir</button>
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
                    <th>Materia prima</th>
                    <th>Precio Unitario</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $con = mysqli_connect('localhost','root','',"gestor_php");
                    $_SESSION['idusuario'] = "6"; //Este session usuario es un parche, debe ser eliminado en cuanto funcione el login


                    $idUsuario = $_SESSION['idusuario'];
                    $sql = "SELECT * FROM productos WHERE usuario=$idUsuario";
                    $result = mysqli_query($con,$sql);

                    while ($row = $result->fetch_assoc()) {
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