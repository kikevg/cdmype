<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | CDMYPE UNIVO</title>
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
        <section>
            <img src="./assets/img/BannerServicios.jpg" alt="" class="img-fluid">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center text-secondary font-weight-normal">Servicios</h4>
                <h2 class="text-center text-primary font-weight-normal display-3">Empresariales</h2>
                <br>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <br>
                <div class="row pt-5">
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-yellow d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px">
                            <i class="fas fa-user-tie fa-2x text-warning"></i>
                        </div>
                        <div class="py-5 text-center">
                            <p class="paragraph-1">Te brindamos asesoría legal para el registro de tu empresa</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-green d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px;">
                            <i class="fas fa-chart-line fa-2x text-success"></i>
                        </div>
                        <div class="py-5 text-center">
                            <p class="paragraph-1">Te brindamos asesoría de mercadeo para el posicionamiento de tu empresa</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="p-5 bg-blue d-flex align-items-center justify-content-center m-auto" style="border-radius: 30px; height: 25px; width: 25px;">
                            <i class="fas fa-award fa-2x text-primary"></i>
                        </div>
                        <div class="py-5 text-center">
                            <p class="paragraph-1">Te capacitamos para que logres mayor eficiencia en tu trabajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row" id="servicios"></div>
            </div>
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center text-secondary font-weight-normal">¡Recuerda!</h4>
                <h2 class="text-center text-primary font-weight-normal display-3">Todos nuestros servicios son gratuitos</h2>
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

        axios.get('./server/servicios.php', { params: { contexto: 'cdmype' }})
            .then(res => {

                console.log(res)

                str = '';

                res.data.forEach(s => {

                    let color = s.color.split('-')[1];

                    if (color == 'success')
                        color = 'green';
                    else if (color == 'primary')
                        color = 'blue';
                    else if (color == 'danger')
                        color = 'red'

                    str += `
                        <div class="col-sm-12 col-lg-6 d-flex align-items-center justify-content-between mb-5">
                            <div class="p-5 bg-${color}  d-flex align-items-center justify-content-center mr-4" style="border-radius: 30px; height: 25px; width: 25px;">
                            <i class="fas fa-chart-line fa-2x ${s.color}"></i>
                            </div>
                            <div class="w-100">
                                <h4 class="${s.color}">${s.nombre}</h4>
                                <p class="text-muted">${s.descripcion}</p>
                            </div>
                        </div>
                    `;
                });

                document.getElementById('servicios').innerHTML = str;

            })
            .catch(err => console.log(err));

    </script>
</body>
</html>