<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sesión finalizada</title>
</head>
<body>
<header>
        <div class="navbar navbar-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="./img/logo.png" alt="logo">
                </a>
                <div class="col-md-3 text-end">
                    <a href="./login.php" class="btn btn-light">Iniciar Sesión</a>
                    <a href="./registro.php" class="btn btn-danger">Registrarse</a>
                </div>
            </div>
        </div>
    </header>
<div class="px-4 py-5 my-5 text-center cont">
    <div class="col-lg-6 mx-auto">
        <?php
            SESSION_START();
            SESSION_UNSET();
            SESSION_DESTROY();
        ?>
        <img src="./img/moto.jpg" alt="Cierre de sesión" width="100%" height="auto">
        <br><br>
      <p class="lead mb-4">Se cerró la sesión correctamente</p>
      </div>
    </div>
</div>
</body>
</html>