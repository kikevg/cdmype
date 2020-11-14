<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carousel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Elite Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Elite Able, Elite Able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="../../assets/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../../assets/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="../../assets/assets/plugins/animation/css/animate.min.css">
    <!-- prism css -->
    <link rel="stylesheet" href="../../assets/assets/plugins/prism/css/prism.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../../assets/assets/css/style.css">

</head>

<body class="layout-4">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  menu-light icon-colored brand-info">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="../home.php" class="b-brand">
                    <div class="b-bg">
                        <?php echo $_SESSION['usuario']['nombre'][0] ?>
                    </div>
                    <span class="b-title"><?php echo $_SESSION['usuario']['nombre'] ?></span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:void"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navegación</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="../home.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Gestión</label>
                    </li>
                    <!-- para la gestion de cdmype -->
                    <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                        <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-folder"></i></span><span class="pcoded-mtext">CDMYPE</span></a>
                        <ul class="pcoded-submenu">
                            <!-- para la gestion de imagenes de carousel -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Carousel</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="lista.php" class="">Lista de imagenes</a></li>
                                    <li class=""><a href="agregar.php" class="">Agregar imagen</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de servicios -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Servicios</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../servicios/lista.php" class="">Lista de servicios</a></li>
                                    <li class=""><a href="../servicios/agregar.php" class="">Agregar servicio</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de alianzas -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Alianzas</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../alianzas/lista.php" class="">Lista de alianzas</a></li>
                                    <li class=""><a href="../alianzas/agregar.php" class="">Agregar alianza</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de empresas -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Empresas</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../empresas/lista.php" class="">Lista de empresas</a></li>
                                    <li class=""><a href="../empresas/agregar.php" class="">Agregar empresa</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de empleados -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Empleados</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../empleados/lista.php" class="">Lista de empleados</a></li>
                                    <li class=""><a href="../empleados/agregar.php" class="">Agregar empleado</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de noticias -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Noticias</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../noticias/lista.php" class="">Lista de noticias</a></li>
                                    <li class=""><a href="../noticias/agregar.php" class="">Agregar noticia</a></li>
                                </ul>
                            </li>
                            <!-- para la gestion de usuarios -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Usuarios</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../usuarios/lista.php" class="">Lista de usuarios</a></li>
                                    <li class=""><a href="../usuarios/agregar.php" class="">Agregar usuario</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- para la gestion de centro emprendedor -->
                    <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                        <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-folder"></i></span><span class="pcoded-mtext">Centro emprendedor</span></a>
                        <ul class="pcoded-submenu">
                            <!-- para la gestion de servicios -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Servicios</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../centro/servicios/lista.php" class="">Lista de servicios</a></li>
                                    <li class=""><a href="../centro/servicios/agregar.php" class="">Agregar servicio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- para la gestion de incubadora de empresas -->
                    <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                        <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-folder"></i></span><span class="pcoded-mtext">Incubadora de empresas</span></a>
                        <ul class="pcoded-submenu">
                            <!-- para la gestion de servicios -->
                            <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                                <a href="javascript:void" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Servicios</span></a>
                                <ul class="pcoded-submenu">
                                    <li class=""><a href="../incubadora/servicios/lista.php" class="">Lista de servicios</a></li>
                                    <li class=""><a href="../incubadora/servicios/agregar.php" class="">Agregar servicio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="../log.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Actividad</span></a></li>
                    <li class="nav-item pcoded-menu-caption"><label>Cerrar sesion</label></li>
                    <li data-username="Documentation" class="nav-item"><a href="../logout.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Salir</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:void"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    E
                </div>
                <span class="b-title">Elite Able</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:void">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="javascript:void" class="mob-toggler"></a>
            <ul class="navbar-nav mr-auto">
                <li>
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Navegacion</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../home.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void">Carousel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:void" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <span><?php echo $_SESSION['usuario']['nombre'] ?></span>
                            </div>
                            <ul class="pro-body">
                                <li><a href="../usuarios/perfil.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item"><i class="feather icon-user"></i> Perfil</a></li>
                                <li><a href="../usuarios/config.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item"><i class="feather icon-settings"></i> Configuraciones</a></li>
                                <li><a href="../usuarios/actividad.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item"><i class="feather icon-sidebar"></i> Mi actividad</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="../logout.php" class="dropdown-item"><i class="feather icon-log-out"></i> Salir</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Navegacion</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="../home.php"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="javascript:void">Carousel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <!-- modal para eliminar -->
                                <div id="modal-eliminar" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Eliminar servicio</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <span>Para eliminar este registro llene copie el texto siguiente.</span>
                                                    <span class="font-weight-bold">Recuerde que una vez que lo elimine no se podra recuperar</span>
                                                </p>
                                                <div class="form-group">
                                                    <p>Texto: <span id="texto" class="font-weight-bold"></span></p>
                                                    <input type="text" id="confirm" class="form-control">
                                                </div>
                                                <form id="form-eliminar">
                                                    <input type="hidden" name="id" id="ideliminar">
                                                    <div class="form-group">
                                                        <button type="submit" id="btn-borrar" class="btn btn-danger" disabled>Eliminar</button>
                                                        <button type="type" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h2 class="my-4">Lista de imagenes</h2>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-4" id="carousel"></div>
                                                <div class="col-sm-12 col-md-8 table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Nombre</th>
                                                                <th>Descripcion</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="../../assets/assets/js/vendor-all.min.js"></script>
    <script src="../../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/assets/js/pcoded.min.js"></script>

    <!-- prism Js -->
    <script src="../../assets/assets/plugins/prism/js/prism.min.js"></script>

    <!-- axios -->
    <script src="../../assets/axios/dist/axios.min.js"></script>
    <!-- custom script -->
   <script>

        function cargarImagnes() {
            axios.get('../../server/carousel.php')
                .then(res => {

                    console.log(res);

                    let html = '';
                    res.data.forEach((i, j)=> {
                        let active = '';

                        if (j == 0)
                            active = 'active';

                        html += `
                            <div class="carousel-item ${active}">
                                <img src="../../${i.url}" alt="" class="d-block w-100" >
                            </div>
                        `;
                    });

                    let carousel = `
                        <div id="my-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                ${html}
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
        
                    let data = res.data;
                    let str = '';
        
                    data.forEach((s, i) => {
                        let disabledUp = '';
                        let disabledDown = '';

                        if (i == 0)
                            disabledUp = 'disabled';

                        if (i == (data.length - 1))
                            disabledDown = 'disabled';

                        str += `
                            <tr>
                                <td>${i+1}</td>
                                <td>${s.nombre}</td>
                                <td>${s.descripcion}</td>
                                <td class="w-25">
                                    <div class="btn-group p-0">
                                        <form class="form-index-up p-0">
                                            <input type="hidden" name="indice" value="${s.indice}">
                                            <button type="submit" class="btn btn-light" ${disabledUp}>
                                                <i class="feather icon-chevron-up p-0 m-0"></i>
                                            </button>
                                        </form>
                                        <form class="form-index-dow p-0">
                                            <input type="hidden" name="indice" value="${s.indice}">
                                            <button type="submit" class="btn btn-light" ${disabledDown}>
                                                <i class="feather icon-chevron-down p-0 m-0"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-light btn-borrar" data-toggle="modal" data-target="#modal-eliminar" data-id='${s.id}'>
                                            <i class="feather icon-trash text-danger p-0 m-0"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
        
                    document.getElementById('tbody').innerHTML = str;

                    let botonesBorrar = document.querySelectorAll('.btn-borrar');
                    agregarEventoBotonesBorrar(botonesBorrar);
                    let formsUp = document.querySelectorAll('.form-index-up');
                    agregarEventoUpForm(formsUp);
                    let formsDown = document.querySelectorAll('.form-index-dow');
                    agregarEventoDownForm(formsDown);
        
                })
                .catch(err => console.error(err));
        }

        cargarImagnes();

        function agregarEventoBotonesBorrar(botones) {
            botones.forEach(b => {
                b.addEventListener('click', function (e) {
                    let tr = this.parentElement.parentElement.parentElement;
                    let id = this.getAttribute('data-id');
                    let texto = tr.children[0].textContent + '/' + tr.children[1].textContent;
                    document.getElementById('texto').textContent = texto;
                    document.getElementById('ideliminar').value = id;
                });
            })
        }

        function agregarEventoUpForm(forms) {
            forms.forEach(f => {
                f.addEventListener('submit', function (e) {
                    e.preventDefault();
                    let form = new FormData(this);
                    form.append('accion', 'up');
                    axios.post('../../server/carousel.php', form)
                        .then(res => {
                            cargarImagnes();
                        })
                        .catch(err => console.error(err));
                })
            })
        }

        function agregarEventoDownForm(forms) {
            forms.forEach(f => {
                f.addEventListener('submit', function (e) {
                    e.preventDefault();
                    let form = new FormData(this);
                    form.append('accion', 'down');
                    axios.post('../../server/carousel.php', form)
                        .then(res => {
                            cargarImagnes();
                        })
                        .catch(err => console.error(err));
                })
            })
        }

        document.getElementById('confirm').addEventListener('keyup', function (e) {

            let texto = document.getElementById('texto').textContent;
            if (this.value == texto) {
                document.getElementById('btn-borrar').removeAttribute('disabled');
            } else {
                document.getElementById('btn-borrar').setAttribute('disabled', 'true');
            }
            
        });

        document.getElementById('form-eliminar').addEventListener('submit', function (e) {
            e.preventDefault();
            
            let form = new FormData(this);
            form.append('accion', 'borrar');

            axios.post('../../server/carousel.php', form)
                .then(res => {

                    console.log(res);

                    if (res.data == 'ok') {
                        cargarImagnes();
                        document.getElementById('mensaje').innerHTML = `
                        <span class='d-block alert alert-success alert-dismissible fade show' data-dismiss='alert'>
                        Los datos se eliminaron exitosamente
                        <button type='button' class='close'>
                        <span>&times;</span>
                        </button>
                            </span>
                            `;
                        $('#modal-eliminar').modal('hide');
                        document.getElementById('confirm').value = '';
                        document.getElementById('btn-borrar').setAttribute('disabled', 'true');
                    }
                })
                .catch(err => console.log(err));

        });

   </script>

</body>

</html>

