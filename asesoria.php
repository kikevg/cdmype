<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesoria | CDMYPE UNIVO</title>
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
            <img src="./assets/img/BannerConsultoriaProfesional.jpg" alt="" class="img-fluid">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center text-secondary font-weight-normal">¿Tiénes o deseas iniciar un emprendimiento?</h4>
                <h2 class="text-center text-primary font-weight-normal display-3">Servicios y asesoría para tu empresa</h2>
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
        <section class="custom-padding-1 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h2 class="text-primary font-weight-normal display-3">Pasos</h2>
                        <span class="d-block bg-secondary my-5" style="height: 6px; width: 80px"></span>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <p class="text-muted paragraph-1 custom-line-height-1">¿Quieres fortalecer tus planes de negocios y tus procesos de ventas y mercadeo? Aplica a la asesoría y los servicios que CDMYPE UNIVO te ofrece</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-4 d-flex align-items-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mr-2" style="height: 60px; width: 60px;">
                            <h2 class="text-white m-0 p-0">1</h2>
                        </div>
                        <p>Descarga el formulario de <br> solicitud <a href="./assets/files/solicitud.docx" class="text-secondary">aqui</a></p>
                    </div>
                    <div class="col-sm-12 col-lg-4 d-flex align-items-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mr-2" style="height: 60px; width: 60px;">
                            <h2 class="text-white m-0 p-0">2</h2>
                        </div>
                        <p>Llene el formulario con <br> los datos de su empresa</p>
                    </div>
                    <div class="col-sm-12 col-lg-4 d-flex align-items-center">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mr-2" style="height: 60px; width: 60px;">
                            <h2 class="text-white m-0 p-0">3</h2>
                        </div>
                        <p>Envia la solicitud <br> a <span class="text-secondary">cdmype@univo.edu.sv</span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center text-secondary font-weight-normal">¡Confia en nosotros!</h4>
                <h2 class="text-center text-primary font-weight-normal display-3">Te brindamos total confidencialidad</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
            </div>
        </section>
    </main>

    <?php require_once 'footer.php' ?>

    <!-- jquery -->
    <script src="./assets/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>