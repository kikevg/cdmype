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
        <section class="bg-primary">
            <div class="overlay custom-padding-1 "> 
                <div class="container">
                    <h1 class="text-center text-white display-3 font-weight-normal">Noticias</h1>
                    <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                </div>
            </div>
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <div class="mb-5">
                            <input type="text" id="buscar" class="form-control" placeholder="Buscar">
                        </div>
                        <div id="noticias"></div>
                        <nav class="d-flex align-items-center">
                            <button type="button" class="btn btn-primary mr-2" id="prev">Prev</button>
                            <ul class="pagination m-0 p-0" id="paginacion"></ul>
                            <button type="button" class="btn btn-primary ml-2" id="next">Next</button>
                        </nav>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card mb-5">
                            <div class="card-header bg-transparent border-0">
                                <h4 class="card-title">Categorías</h4>
                            </div>
                            <div class="card-body">
                                <ul id="categorias" class="list-unstyled"></ul>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-header bg-transparent border-0">
                                <h4 class="card-title">Últimas noticias</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush" id="ultimasNoticias"></ul>
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

        axios.get('./server/noticias.php')
            .then(res => {

                let noticias = res.data;
                let copiaNoticias = [...noticias];

                let pagina = 1;
                let elementosPorPagina = 5;

                // para listar las categorias y las ultimas noticas

                let categorias = [];
                let listaCategorias = `
                    <li class="d-inline-block my-2">
                        <button type="button" class="btn badge bg-blue text-primary py-2 px-3 btn-categoria" data-categoria="all">Todas</button>
                    </li>`;
                let ultimasNoticias = '';

                for (let i = 0; i < noticias.length; i++) {
                    if (categorias.indexOf(noticias[i].categoria) == -1)
                        categorias.push(noticias[i].categoria);
                }

                categorias.forEach(c => {
                    listaCategorias += `                    
                        <li class="d-inline-block my-2">
                            <button type="button" class="btn badge bg-blue text-primary py-2 px-3 btn-categoria" data-categoria="${c}">${c}</button>
                        </li>
                    `;
                })

                let n = 0;
                if (noticias.length == 1)
                    n = 1;
                else if (noticias.length == 2)
                    n = 2;
                else
                    n = 3;
            

                for (let i = 0; i < n; i++) {
                    ultimasNoticias += `
                        <li class="list-group-item px-0">
                            <h5><a href="noticiadetalle.php?id=${noticias[i].id}" class="text-primary">${noticias[i].titulo}</a></h5>
                            <p class="text-muted">Fecha de publicacion: ${noticias[i].fecha}</p>
                        </li>
                    `;
                }

                if (noticias.length > 3) {
                }

                document.getElementById('categorias').innerHTML = listaCategorias;
                document.getElementById('ultimasNoticias').innerHTML = ultimasNoticias;

                // para la paginacion de las noticias

                function paginar() {
                    let noticiasHtml = '';
                    let inicio = (pagina -1) * elementosPorPagina;
                    let fin = pagina * elementosPorPagina;
                    copiaNoticias.slice(inicio, fin).forEach(n => {
                        noticiasHtml += `
                            <div class="card mb-5">
                                <img src="${n.url}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h2><a href="noticiadetalle.php?id=${n.id}" class="text-primary">${n.titulo}</a></h2>
                                    <p class="text-muted">Fecha de publicacion: ${n.fecha}</p>
                                </div>
                            </div>
                        `;
                    })
                    document.getElementById('noticias').innerHTML = noticiasHtml;
                }

                paginar();

                function paginacion() {
                    let numPaginas = Math.ceil(copiaNoticias.length / elementosPorPagina);
                    let botonesHtml = '';
                    for (let i = 1; i <= numPaginas; i++)
                        botonesHtml += `<li class="page-item"><button type="button" class="page-link bg-primary text-white border-0" data-pagina="${i}">${i}</button></li>`;
                    document.getElementById('paginacion').innerHTML = botonesHtml;

                    let links = document.querySelectorAll('.page-link').forEach(b => {
                        b.addEventListener('click', function () {
                            pagina = parseInt(this.getAttribute('data-pagina'));
                            console.log(pagina);
                            paginar();
                        })
                    })
                }

                paginacion();

                document.getElementById('prev').addEventListener('click', function () {
                    if (pagina > 1) {
                        pagina -= 1;
                        paginar();
                    }
                });

                document.getElementById('next').addEventListener('click', function () {
                    if (pagina < Math.ceil(copiaNoticias.length / elementosPorPagina)) {
                        pagina += 1;
                        paginar();
                    }
                })

                document.querySelectorAll('.btn-categoria').forEach(b => {
                    b.addEventListener('click', function () {
                        if (this.getAttribute('data-categoria') == 'all') {
                            copiaNoticias = noticias;
                            paginar();
                            paginacion();
                        } else {
                            let d = noticias.filter(n => n.categoria.includes(this.getAttribute('data-categoria')));
                            copiaNoticias = d;
                            pagina = 1;
                            paginar();
                            paginacion();
                        }
                    });
                });

                document.getElementById('buscar').addEventListener('keyup', function () {
                    if (this.value != '') {
                        let d = noticias.filter(n => n.titulo.includes(this.value));

                        if (d.length == 0) {
                            document.getElementById('noticias').innerHTML = `<h2 class="mb-5">No hay coincidencias</h2>`;
                            return;
                        }

                        pagina=1;
                        copiaNoticias = d;
                        paginar();
                        paginacion();
                    } else {
                        copiaNoticias = noticias;
                        pagina=1;
                        paginar();
                        paginacion();
                    }
                })

            })
            .catch(err => console.error(err));

    </script>
</body>
</html>