<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro emprendedor | CDMYPE UNIVO</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2b5123bf0f.js"></script>
</head>
<body>

    <header>
        <?php require_once 'navbar.php' ?>
    </header>

    <main>
        <section class="custom-padding-1">
            <div class="container">
                <h2 class="text-center text-primary display-3 font-weight-normal">Centro emprendedor</h2>
                <br>
                <p class="text-muted w-75 m-auto text-center">Es una unidad encargada de promover la cultura emprendedora, dentro de la universidad con la población estudiantil  y fuera de la universidad con grupos de interés o vulnerables dentro de la sociedad como parte de la proyección social de la Universidad</p>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <div class="row pt-5">
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-yellow d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px">
                            <i class="fas fa-user-tie fa-2x text-warning"></i>
                        </div>
                        <div class="py-5 text-center">
                            <h4>Misión</h4>
                            <p class="text-muted">Fomentar la cultura emprendedora a través de herramientas innovadoras, logrando potenciar al futuro empresarios para dinamizar la actividad económica de la zona oriental</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-green d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px;">
                            <i class="fas fa-chart-line fa-2x text-success"></i>
                        </div>
                        <div class="py-5 text-center">
                            <h4>Visión</h4>
                            <p class="text-muted">Ser un centro de desarrollo empresarial, con liderazgo y reconocimiento nacional, que contribuya al fortalecimiento de los sectores económicos para elevar la calidad de vida de los grupos</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-blue d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px;">
                            <i class="fas fa-award fa-2x text-primary"></i>
                        </div>
                        <div class="py-5 text-center">
                            <h4>Valores</h4>
                            <ul class="list-unstyled">
                                <li class="d-inline-block pr-3 py-2"><span>Responsabilidad</span></li>
                                <li class="d-inline-block pr-3 py-2"><span>Honestidad</span></li>
                                <li class="d-inline-block pr-3 py-2"><span>Credibilidad</span></li>
                                <li class="d-inline-block pr-3 py-2"><span>Respeto</span></li>
                                <li class="d-inline-block pr-3 py-2"><span>Trabajo en equipo</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary">
            <div class="overlay custom-padding-1"> 
                <div class="container">
                    <h4 class="font-weight-normal text-secondary text-center">Nuestros</h4>
                    <h2 class="font-weight-normal text-white text-center display-4">Servicios</h2>
                    <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                    <br>
                    <div class="row" id="servicios"></div>
                </div>
            </div>
        </section>
        <section class="bg-white custom-padding-1">
            <div class="container">
                <h2 class="text-center text-primary">El centro emprendedor nace en 2004, como dependencia de la facultad de ciencias económicas.</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
            </div>
        </section>
    </main>

    <?php require_once 'footer.php' ?>

    <!-- jquery -->
    <script src="./assets/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- axios -->
    <script src="./assets/axios/dist/axios.min.js"></script>
    <!-- custom script -->
    <script>

        axios.get('./server/servicios.php', { params: { contexto: 'centro' }})
            .then(res => {

                console.log(res);

                str = '';

                res.data.forEach(s => {
                    str += `
                        <div class="col-sm-12 col-lg-6 mb-5">
                            <h4 class="text-white">${s.nombre}</h4>
                            <div class="text-white-50">${s.descripcion}</div>
                        </div>
                    `;
                })

                document.getElementById('servicios').innerHTML = str;

            })
            .catch(err => console.log(err));

    </script>
</body>
</html>