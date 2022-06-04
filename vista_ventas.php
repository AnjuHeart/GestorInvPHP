<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <?php SESSION_START(); echo("Restaurante: ".$_SESSION['restaurante']); ?>
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
            <select class="form-select" id="seleccionProd" aria-label="Example select with button addon">
                <option selected value="0">--Seleccione Producto--</option>
                <?php
                  $con = mysqli_connect('localhost','root','',"gestor_php");
                  
                  $idUsuario = $_SESSION['idusuario'];
                  $sql = "SELECT * FROM productos WHERE usuario=$idUsuario";
                  $result = mysqli_query($con,$sql);
  
                  while ($row = $result->fetch_assoc()) {
                      echo '<option value="'.$row['id'].'">'.strtoupper($row['descripcion']) . ': $ '. strval($row['precio']) .'</option>';
                  }
                ?>
            </select>
            <button class="btn btn-outline-secondary" type="button" onClick="ventaTabla()">Agregar</button>
        </div>
        <table class="table" id="tablaVentas">
            <thead>
                <tr>
                    <th scope="col">ID de Producto</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
          <button type="button" class="btn btn-success" style="position: fixed; bottom: 30px; right: 20px;" onClick="pushVentas()">Guardar Ventas</button>
    </main>
</body>
<script>
    function ventaTabla() {
        var prodPrecio = $('#seleccionProd option:selected').text().split(': $ ');

        var filaTabla = `<tr>
                          <td class="prodID">` + $('#seleccionProd').val() + `</td>
                          <td class="producto">` + prodPrecio[0] + `</td>
                          <td class="cant">0</td>
                          <td class="precio">` + prodPrecio[1] + `</td>
                          <td class="total">0</td>
                          <td><div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary addBtn"><i class="bi bi-plus"></i></button>
                            <button type="button" class="btn btn-secondary  substractBtn"><i class="bi bi-dash-lg"></i></button>
                            <button type="button" class="btn btn-danger deleteBtn"><i class="bi bi-x"></i></button>
                        </div></td>
                        </tr>`

        $("#tablaVentas > tbody").append(filaTabla);

        $('#seleccionProd').val(0);
        updateButtons();
    }

    function updateButtons() {
        $(".addBtn").click(function() {
            var actual = parseInt($(this).closest("tr").find(".cant").text());
            var precio = parseInt($(this).closest("tr").find(".precio").text());
            actual += 1;
            $(this).closest("tr").find(".cant").text(actual);
            $(this).closest("tr").find(".total").text(actual*precio);
        });
        $(".substractBtn").click(function() {
            var actual = parseInt($(this).closest("tr").find(".cant").text());
            var precio = parseInt($(this).closest("tr").find(".precio").text());
            if (actual >= 1) {
                actual += -1;
                $(this).closest("tr").find(".cant").text(actual);
                $(this).closest("tr").find(".total").text(actual*precio);
            }
        });
        $(".deleteBtn").click(function() {
          $(this).closest("tr").remove();
        });
    }
    function pushVentas(){
      $('#tablaVentas > tbody  > tr').each(function() {
        var idprod = $(this).find(".prodID").text();
        var prodname = $(this).find(".producto").text();
        var cantidad = $(this).find(".cant").text();
        var precio = $(this).find(".precio").text();
        var total = $(this).find(".total").text();

        if(parseInt(cantidad) > 0){
          $.post("agregarventa.php", {
                prodid: idprod,
                producto: prodname,
                cant: cantidad,
                price: precio,
                canttotal: total
            },
            function(data, status) {});
            $(this).remove();
        }else{
          alert("La venta de " + prodname +" no fue registrada, revisar nuevamente la información")
        }
      });
      alert("Ventas registradas con éxito")
    }
    </script>
</html>