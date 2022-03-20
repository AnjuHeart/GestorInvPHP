<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    <a class="nav-link" href="/vista_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vista_ventas.php">Ventas</a>
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
        <button type="button" class="btn btn-secondary">Añadir un nuevo producto</button>

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