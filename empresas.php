<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas | CDMYPE UNIVO</title>
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
            <img src="./assets/img/BannerPrestigio.jpg" alt="" class="img-fluid">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center font-weight-normal text-secondary">Catálogo de</h4>
                <h2 class="text-center font-weight-normal text-primary display-3">Empresas</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <div class="row" id="empresas"></div>
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

        axios.get('./server/empresas.php')
            .then(res => {

                console.log(res);

                str = '';

                res.data.forEach(s => {

                    str += `
                        <div class="col-sm-12 col-lg-6">
                           <div class="card">
                                <img src="${s.url}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2>${s.nombre}</h2>
                                        <div>
                                            <button type="button" class="btn btn-transparent" data-toggle="collapse" data-target="#text${s.id}">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse multi-collpase" id="text${s.id}">
                                        <p class="font-weight-bold">Propietario</p>
                                        <h4 class="font-weight-normal">${s.propietario}</h4>
                                        <p class="font-weight-bold">Año de fundacion</p>
                                        <h4 class="font-weight-normal">${s.fundacion}</h4>
                                        <p class="font-weight-bold">Sitio web</p>
                                        <p class="font-weight-normal"><a href="${s.website}">${s.website}</a></p>
                                        <p class="font-weight-bold">Descripción</p>
                                        ${s.descripcion}
                                    </div>
                                </div>
                           </div>
                        </div>
                    `;
                });

                document.getElementById('empresas').innerHTML = str;

            })
            .catch(err => console.log(err));

    </script>
</body>
</html>