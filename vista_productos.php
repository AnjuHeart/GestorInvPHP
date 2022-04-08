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
    <title>Dashboard!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#" style="margin-left: 15px;">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vista_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vista_ventas.php">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Almacén</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos <span class="sr-only">(actual)</span></a>
                </li>
            </ul>
        </div>
    </nav>
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
                        <form>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">ID</span>
                                <input type="text" class="form-control" placeholder="Identificador"
                                    aria-label="Identificador" aria-describedby="addon-wrapping">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text">Descripción</span>
                                <textarea class="form-control"
                                    aria-label="Ej. 'Pollo a la plancha con salsa de ostión...'"></textarea>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Materia Prima</span>
                                <input type="text" class="form-control" placeholder="..." aria-label="..."
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="button-addon2">Seleccionar</button>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Precio. $</span>
                                <input type="text" class="form-control" placeholder="Ej. '58.00'" aria-label="Ej. '58.00'"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Imagen</span>
                                <input type="text" class="form-control" placeholder="No hay imagen seleccionada..." aria-label="No hay imagen seleccionada..."
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="button-addon2">Seleccionar</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Añadir</button>
                    </div>
                </div>
            </div>
        </div>

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
                <tr>
                    <td scope="row">1</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td scope="row">5</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td scope="row">6</td>
                    <td>text</td>
                    <td>text</td>
                    <td>$00.00</td>
                    <td>null</td>
                </tr>
            </tbody>
        </table>

    </main>
</body>

</html>