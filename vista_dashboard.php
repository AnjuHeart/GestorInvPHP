<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
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
          <?php SESSION_START(); echo("Restaurante: ".$_SESSION['restaurante']); ?>
            </p>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="vista_dashboard.php" class="nav-link link-secondary">
                Dashboard
              </a>
            </li>
            <li>
              <a href="vista_ventas.php" class="nav-link link-dark">
                Ventas
              </a>
            </li>
            <li>
              <a href="vista_almacen.php" class="nav-link link-dark">
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
    <main>
        <h1>Dashboard</h1>
</main>
</body>

</html>