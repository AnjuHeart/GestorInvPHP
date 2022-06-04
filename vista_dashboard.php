<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
    <script src="./js/chart.min.js"></script>
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
    <main style="margin-left: 15px;margin-right: 15px;">
        <h1>Dashboard</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <?php
                  $idRestaurante = $_SESSION['idrestaurante'];

                  $con = mysqli_connect('localhost','root','',"gestor_php");
                  mysqli_select_db($con,'gestor_php');
                  $sql = "SELECT producto,COUNT(producto) AS ValueFrequency FROM salidas WHERE idrestaurante=$idRestaurante group by producto order by ValueFrequency DESC;";
                  $result = mysqli_query($con,$sql);

                  $numeroDeEntradas = 0;
                  $labels = "[";
                  $data = "[";
                  while ($row = $result->fetch_assoc()) {
                    if($numeroDeEntradas < 6){
                      $prodid = $row['producto'];
                      $freq = $row['ValueFrequency'];
            
                      $sql = "SELECT * FROM `productos` WHERE id =$prodid";
                      $busquedaProd = mysqli_query($con,$sql);
                      $filaProd = mysqli_fetch_array($busquedaProd);
                      $nombreProd = $filaProd[1];

                      $labels = $labels."'$nombreProd',";
                      $data = $data."$freq,";
            
                      $numeroDeEntradas += 1;
                    }
                  }
                  $labels = substr_replace($labels ,"",-1);
                  $labels =$labels."]";
                  
                  $data = substr_replace($data ,"",-1);
                  $data =$data."]";

                  echo "<canvas id='myChart' width='200' height='200'></canvas>
                  <script>
                  const ctx = document.getElementById('myChart').getContext('2d');
                  const myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: $labels,
                          datasets: [{
                              label: 'Veces que se compró',
                              data: $data,
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                  </script>";
                ?>
                </div>
                <div class="col-sm">
                    
                </div>
            </div>
        </div>


    </main>
</body>

</html>