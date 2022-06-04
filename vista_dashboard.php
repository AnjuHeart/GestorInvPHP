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
    <style>
    .chartBox {
        width: 35%;
    }
    </style>
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

                  $sql = "SELECT WEEK(fecha), SUM(cantidad) FROM salidas WHERE idrestaurante = $idRestaurante AND fecha >= NOW() - INTERVAL 4 WEEK GROUP BY WEEK(fecha);";
                  $result = mysqli_query($con,$sql);
                  
                  $labelSemana = "[";
                  $dataVentasSemanal = "[";

                  while ($row = $result->fetch_assoc()) {
                    $semana = $row['WEEK(fecha)'];
                    $ventas = $row['SUM(cantidad)'];

                    $labelSemana = $labelSemana."'Semana $semana',";
                    $dataVentasSemanal = $dataVentasSemanal."$ventas,";
                  }

                  $labelSemana = substr_replace($labelSemana ,"",-1);
                  $labelSemana =$labelSemana."]";
                  
                  $dataVentasSemanal = substr_replace($dataVentasSemanal ,"",-1);
                  $dataVentasSemanal =$dataVentasSemanal."]";

                  if($numeroDeEntradas > 0){
                    echo "
                      <div class='container'>
                        <div class='row'>
                            <div class='col-sm chartBox'>
                                <canvas id='myChart' width='200' height='200'></canvas>
                            </div>
                            <div class='col-sm chartBox'>
                                <canvas id='chartFechas' width='200' height='200'></canvas>
                            </div>
                        </div>
                    </div>
                    <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'pie',
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
                    
                    const elementcanvas = document.getElementById('chartFechas').getContext('2d');
                    const chartFecha = new Chart(elementcanvas, {
                        type: 'bar',
                        data: {
                            labels: $labelSemana,
                            datasets: [{
                                label: 'Ventas en esta semana',
                                data: $dataVentasSemanal,
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
                    });</script>";
                  } else{
                    echo"
                    <center><b>No hay suficiente información para generar gráficas</b></center>
                    ";
                  }
                ?>
    </main>
</body>

</html>