<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias | CDMYPE UNIVO</title>
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
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <img src="" alt="" id="img" class="img-fluid">
                        <h3 id="titulo" class="text-primary my-4"></h3>
                        <div id="descripcion"></div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card mb-5">
                            <div class="card-header bg-transparent border-0">
                                <h4 class="card-title">Detalles</h4>
                            </div>
                            <div class="card-body">
                                <ul id="detalles" class="list-unstyled"></ul>
                            </div>
                        </div>
                    </div>
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

        let id = location.search.split("=")[1];

        axios.get('./server/noticias.php', { params: {id : id}})
            .then(res => {

                console.log(res);

                let detallesHtml = `
                    <li class="my-2">
                        <span class="d-block mb-2">Categoría</span>
                        <span class="badge bg-blue text-primary py-2 px-3">${res.data.categoria}</span>
                    </li>
                    <li class="my-2">
                        <span class="d-block mb-2">Fecha de publicación</span>
                        <span class="badge bg-blue text-primary py-2 px-3">${res.data.fecha}</span>
                    </li>
                `;

                document.getElementById('img').src = res.data.url;
                document.getElementById('titulo').textContent = res.data.titulo;
                document.getElementById('descripcion').innerHTML = res.data.descripcion;
                document.getElementById('detalles').innerHTML = detallesHtml;

            })
            .catch(err => console.error(err));

    </script>
</body>
</html>