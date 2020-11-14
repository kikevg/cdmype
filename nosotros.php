<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nostros | CDMYPE UNIVO</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2b5123bf0f.js"></script>
    <!-- owl carousel -->
    <link rel="stylesheet" href="./assets/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/owlcarousel/dist/assets/owl.theme.default.min.css">
</head>
<body>

    <div id="modal-contacto" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-contacto">
                        <div class="form-group">
                            <label for="to">Envair a</label>
                            <input type="text" readonly name="destino" id="dest" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Asunto</label>
                            <input type="text" name="asunto" id="asunto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mesaje">Mensaje</label>
                            <textarea name="mensaje" id="mensaje" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block py-3">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header>
        <?php require_once 'navbar.php' ?>
    </header>

    <main>
        <section>
            <img src="./assets/img/BannerSlogan.jpg" alt="" class="img-fluid">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <h4 class="text-center text-secondary font-weight-normal">Nuestra</h4>
                <h2 class="text-center text-primary font-weight-normal display-3">Historia</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <br>
                <p class="text-muted w-50 m-auto text-justify m-auto">CDMYPE UNIVO es un modelo de atención y de servicios a micro y pequeñas empresas, basado en la alianza público-privado-academia, forma parte de una política de Estado que genera oportunidades para el desarrollo de este segmento económico. También es una red de apoyo que CONAMYPE facilita a empresarios y empresarias para acercar más los servicios brindando más cobertura. Acompaña el desarrollo de las MYPEs, mediante la prestación de servicios de mayor calidad, gracias a la aplicación de una metodología de acompañamiento a mediano y largo plazo que se adecúa a las condiciones, naturaleza y necesidades de las MYPEs. Contribuye, además, en la dinamización de las economías en los territorios, al desarrollo de los tejidos productivos empresariales y que busca integrar a las MYPEs a la economía del país. Es una entidad comprometida con el empresario y empresaria, que lo coloca al centro de su accionar, considerandolo como agente que contribuye al desarrollo económico del país.</p>
            </div>
        </section>
        <section class="custom-padding-1 bg-light">
            <div class="container">
                <h4 class="text-center font-weight-normal text-secondary">Marco</h4>
                <h2 class="text-center font-weight-normal text-primary display-3">Filosófico</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="card border-0">
                            <div class="card-body">
                                <h4 class="text-primary">Misión</h4>
                                <br>
                                <p>Somos un Centro de Desarrollo de la micro y pequeña empresa, que facilita y provee servicios de desarrollo empresarial integral con equidad de género a través de asesoría empresarial, financiera, tecnológica, asistencia técnica, capacitación y vinculación con el entorno empresarial, para contribuir a la generación de impacto económico del departamento de San Miguel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card border-0">
                            <div class="card-body">
                                <h4 class="text-primary">Visión</h4>
                                <br>
                                <p>Ser un centro líder reconocido en el departamento de San Miguel y a nivel nacional, como facilitador de la cultura emprendedora empresarial, mediante procesos transparentes, equitativos en servicios integrales vinculados con la academia y con énfasis en la equidad de género, que contribuyan a la generación de impacto económico en las MYPES.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card border-0">
                            <div class="card-body">
                                <h4 class="text-primary">Valores</h4>
                                <br>
                                <ul class="list-unstyled">
                                    <li class="d-inline-block pr-3 py-3">Integridad</li>
                                    <li class="d-inline-block pr-3 py-3">Lealtad</li>
                                    <li class="d-inline-block pr-3 py-3">Responsablidad</li>
                                    <li class="d-inline-block pr-3 py-3">Honestidad</li>
                                    <li class="d-inline-block pr-3 py-3">Excelencia</li>
                                    <li class="d-inline-block pr-3 py-3">Innovación</li>
                                    <li class="d-inline-block pr-3 py-3">Servicio</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="custom-padding-1" id="team">
            <div class="container">
                <h4 class="text-center font-weight-normal text-secondary">Nuestro</h4>
                <h2 class="text-center font-weight-normal text-primary display-3">Equipo</h2>
                <span class="d-block bg-secondary my-5 mx-auto" style="height: 6px; width: 80px"></span>
                <div id="msj"></div>
                <div class="pt-5" id="empleados">
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
    <!-- owl carousel -->
    <script src="./assets/owlcarousel/dist/owl.carousel.min.js"></script>
    <!-- custom script -->
    <script>

        axios.get('./server/empleados.php')
            .then(res => {

                console.log(res);

                str = '';

                res.data.forEach(e => {
                    str += `
                        <div class="item pt-5">
                            <div class="card my-5 bg-light border-0">
                                <div class="card-header border-0 bg-transparent">
                                    <div class="card-header-profile">
                                        <img src="${e.url}" alt="img" class="img-fluid">
                                    </div>
                                    <div class="text-right">
                                        <h5 class="text-primary">${e.nombre}</h5>
                                        <span>${e.cargo}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center py-3">
                                        <i class="fas fa-quote-left text-muted"></i>
                                    </div>
                                    <div>${e.descripcion}</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="d-block text-muted">${e.email}</span>
                                            <span class="d-block text-muted">${e.telefono}</span>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-contactar" data-toggle="modal" data-target="#modal-contacto" data-email="${e.email}">Contactar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                })

                let owl = `
                    <div class="owl-carousel owl-theme" id="owl">
                        ${str}
                    </div>
                `;

                document.getElementById('empleados').innerHTML = owl;

                let botones = document.querySelectorAll('.btn-contactar');
                agregarEventoBotonContactar(botones);

                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 20,
                    nav: true,
                    autoHeight: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 2
                        }
                    }
                });

            })
            .catch(err => console.log(err));

        function agregarEventoBotonContactar(botones) {
            botones.forEach(b => {
                b.addEventListener('click', function (e) {
                    let email = this.getAttribute('data-email');
                    document.getElementById('dest').value = email;
                });
            })
        }

        document.getElementById('form-contacto').addEventListener('submit', function (e) {
            e.preventDefault();
            let form = new FormData(this);
            axios.post('./server/contacto.php', form)
                .then(res => {
                    if (res.data == 'ok') {
                        $('#modal-contacto').modal('hide');
                        document.getElementById('msj').innerHTML = `
                            <span class="d-block alert alert-success alert-dismissible fade show">
                                El correo electrónico se envio correctamente
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </span>
                        `;
                    }
                })
                .catch(err => console.error(err));
        });
    
    </script>
</body>
</html>