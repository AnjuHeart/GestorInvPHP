<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ventas</title>
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
              <a href="vista_dashboard.php" class="nav-link link-dark">
                Dashboard
              </a>
            </li>
            <li>
              <a href="vista_ventas.php" class="nav-link link-secondary">
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
    <main style="margin-left: 15px;margin-right: 15px;">
        <h1>Ventas</h1>
        <div class="input-group">
            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected>--Seleccione Producto--</option>
                <?php
                  $con = mysqli_connect('localhost','root','',"gestor_php");
                  $_SESSION['idusuario'] = "6"; //Este session usuario es un parche, debe ser eliminado en cuanto funcione el login
  
  
                  $idUsuario = $_SESSION['idusuario'];
                  $sql = "SELECT * FROM productos WHERE usuario=$idUsuario";
                  $result = mysqli_query($con,$sql);
  
                  while ($row = $result->fetch_assoc()) {
                      echo '<option value "'.$row['id'].'">'.strtoupper($row['descripcion']).'</option>';
                  }
                ?>
            </select>
            <button class="btn btn-outline-secondary" type="button">Agregar</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <th scope="row">1</th>
                    <td>Hamburgesa</td>
                    <td>$120.00</td>
                    <td>$120.00</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary"><i class="bi bi-plus"></i></button>
                            <button type="button" class="btn btn-secondary"><i class="bi bi-dash-lg"></i></button>
                            <button type="button" class="btn btn-danger"><i class="bi bi-x"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>
    </main>
</body>

</html>