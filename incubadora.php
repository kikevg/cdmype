<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incubadora de empresas | CDMYPE UNIVO</title>
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
        <section class="bg-white custom-padding-1">
            <div class="container">
                <h2 class="text-center text-primary display-3 font-weight-normal">Incubadora de empresas</h2>
                <br>
                <p class="text-muted w-75 m-auto text-center paragraph-1">Nuestro objetivo principal es fomentar emprendimientos mediante asistencia técnicas, infraestructura física y tecnológica</p>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
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

        axios.get('./server/servicios.php', { params: { contexto: 'incubadora' }})
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