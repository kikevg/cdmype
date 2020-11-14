<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CDMYPE UNIVO</title>
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
        <section id="carousel">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="text-secondary font-weight-normal">¿Deseas emprender?</h4>
                        <h2 class="text-primary display-3 font-weight-normal">Asesoría para tu negocio</h2>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <p class="text-muted paragraph-1 custom-line-height-1">Como modelo de atención a micro y pequeñas empresas ponemos a tu  disposición diversos servicios para el crecimiento de tu empresa</p>
                        <span class="d-block bg-secondary my-5" style="height: 6px; width: 80px"></span>
                        <div>
                            <a href="./servicios.php" class="btn btn-primary text-white px-4 py-3">Saber más</a>
                            <a href="./nosotros.php" class="btn btn-secondary text-white px-4 py-3">Nosotros</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-between mr-3">
                                <div class="p-5 bg-green d-flex align-items-center justify-content-center" style="border-radius: 30px; height: 25px; width: 25px;">
                                    <i class="fas fa-chart-line fa-2x text-success"></i>
                                </div>
                            </div>
                            <div class="py-5">
                                <p class="paragraph-1">Innova en tus procesos de marketing y ventas, alcanza tu mejor nivel</p>
                            </div>
                        </div>  
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-between mr-3">
                                <div class="p-5 bg-yellow d-flex align-items-center justify-content-center" style="border-radius: 30px; height: 25px; width: 25px;">
                                    <i class="fas fa-user-tie fa-2x text-warning"></i>
                                </div>
                            </div>
                            <div class="py-5">
                                <p class="paragraph-1">Capacitate en procesos de mercadeo y aumenta las ganacias de tu empresa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="text-secondary font-weight-normal">Aumenta tu potencial</h4>
                        <h2 class="text-primary display-3 font-weight-normal">Súmate a nuestro equipo</h2>
                        <span class="d-block bg-secondary my-5" style="height: 6px; width: 80px"></span>
                        <a href="./asesoria.php" class="btn btn-primary px-4 py-3">Aplicar a asesoría</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary">
            <div class="overlay">
                <div class="custom-padding-1">
                    <div class="container">
                        <h4 class="text-secondary font-weight-normal text-center">CDMYPE UNIVO</h4>
                        <h2 class="text-center text-white font-weight-normal display-4">En números</h2>
                        <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                        <br>
                        <div class="row text-center pt-5">
                            <div class="col-sm-12 col-lg-4">
                                <h3 class="text-white display-3" id="alianzas"></h3>
                                <h6 class="text-white-50">Alianzas</h6>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <h3 class="text-white display-3" id="empresas"></h3>
                                <h6 class="text-white-50">Empresas</h6>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <h3 class="text-white display-3" id="servicios"></h3>
                                <h6 class="text-white-50">Servicios</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-secondary text-center font-weight-normal">Alianzas</h4>
                <h2 class="text-primary text-center font-weight-normal display-3">Estratégicas</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <img src="./assets/img/conamype.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <img src="./assets/img/cdmype.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <img src="./assets/img/univo.gif" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row" id="imagenes_alianzas"></div>
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

        // para el carousel
        axios.get('./server/carousel.php')
            .then(res => {

                console.log(res);

                let str = '';
                res.data.forEach((i, j)=> {
                    let active = '';

                    if (j == 0)
                        active = 'active';

                    str += `
                        <div class="carousel-item ${active}">
                            <img src="${i.url}" alt="" class="d-block w-100" >
                        </div>
                    `;
                });

                let carousel = `
                    <div id="my-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            ${str}
                        </div>
                        <a href="#my-carousel" class="carousel-control-prev" data-slide="prev" role="button">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#my-carousel" class="carousel-control-next" data-slide="next" role="button">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                `;

                document.getElementById('carousel').innerHTML = carousel;

            })
            .catch(err => console.error(err));

            // total de alianzas
            axios.get('./server/alianzas.php')
                .then(res => {

                    console.log(res);

                    document.getElementById('alianzas').textContent = res.data.length;
                    let alianzas = '';
                    res.data.forEach(a => {
                        alianzas += `
                            <div class="col-sm-12 col-lg-3">
                                <img src="${a.url}" alt="" class="img-fluid" >
                            </div>
                        `;
                    });
                    document.getElementById('imagenes_alianzas').innerHTML = alianzas;
                })
                .catch(err => console.error(err));

            // total de empresas
            axios.get('./server/empresas.php')
                .then(res => {
                    console.log(res);
                    document.getElementById('empresas').textContent = res.data.length
                })
                .catch(err => console.error(err));
            
            // total de servicios
            axios.get('./server/servicios.php', { params: { contexto: 'cdmype' } })
                .then(res => {
                    console.log(res);
                    document.getElementById('servicios').textContent = res.data.length
                })
                .catch(err => console.error(err));
    
    </script>
        
</body>
</html>