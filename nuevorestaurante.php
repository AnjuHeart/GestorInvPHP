<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registrar Restaurante</title>
</head>
<body>
    <header>
        <div class="navbar navbar-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="./img/logo.png" alt="logo">
                </a>
            </div>
        </div>
    </header>
    <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Nuevo restaurante</h3>
                            <div class="col-md-auto">
                                <div class="formulario">
                                    <form action="agregarrestaurante.php" method="post" name="nuevo">
                                        <form name="nuevo" id="form_registro">
                                            
                                            <div class="form-outline mb-4">
                                                <label class="form-label">Nombre del restaurante:</label>
                                                <input type="text" name="nombre" class="form-control form-control-lg"
                                                    required />
                                            </div>
                                            <div class="form-outline mb-4 g-recaptcha"
                                                data-sitekey="6LdOVQMgAAAAALzmj78rR_AB2OvYwCC38rzN_IyC"></div>
                                            <input class="btn btn-danger" type="submit" name="agregarinfo"
                                                value="Registrar">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Foodie, Inc</p>
        </footer>
    </div>
</body>
</html>