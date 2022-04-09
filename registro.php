<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign in</title>
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
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Registrarse</h3>
                            <div class="col-md-auto">
                                <div class="formulario">
                                    <form action="agregarinfo.php" method="post" name="nuevo">
                                        <form name="nuevo" id="form_registro">
                                            <div class="form-outline mb-4">
                                                <label class="form-label">Usuario</label>
                                                <input type="text" name="usuario" class="form-control form-control-lg"/>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Trabajador</label>
                                                <select class="form-select" name="trabajador" aria-label="Default select example">
                                                    <option selected>Seleccione tipo de trabajador</option>
                                                    <option value="gerente">Gerente</option>
                                                    <option value="vendedor">Vendedor</option>
                                                    <option value="administrativo">Administrativo</option>
                                                </select>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                                <input type="password" id="typePasswordX-2" name="contra"
                                                    class="form-control form-control-lg" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="typePasswordX-2">Confirmar
                                                    Contraseña</label>
                                                <input type="password" id="typePasswordX-2"
                                                    class="form-control form-control-lg" />
                                            </div>
                                            <input class="btn btn-danger" type="submit" name="agregarinfo"
                                                value="Registar">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Foodie, Inc</p>
        </footer>
    </div>
</body>

</html>