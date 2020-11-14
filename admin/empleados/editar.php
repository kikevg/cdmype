<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Empleados</title>
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

    <style>
        #barra {
            background: #fff;
            height: 4px;
            width: 100%;
        }
        #barra #fill-barra {
            background-color: #55efc4;
            height: 100%;
            transition: width .2s;
            width: 0;
        }
    </style>

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
                                    <li class=""><a href="../carousel/lista.php" class="">Lista de imagenes</a></li>
                                    <li class=""><a href="../carousel/agregar.php" class="">Agregar imagen</a></li>
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
                                    <li class=""><a href="lista.php" class="">Lista de empleados</a></li>
                                    <li class=""><a href="agregar.php" class="">Agregar empleado</a></li>
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
                                        <li class="breadcrumb-item"><a href="lista.php">Empleados</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void">Editar empleado</a></li>
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
                                                <li class="breadcrumb-item"><a href="lista.php">Empleados</a></li>
                                                <li class="breadcrumb-item"><a href="javascript:void">Editar empleado</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <!-- modal para los iconos -->
                                <div id="modal-iconos" class="modal fade">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Lista de iconos</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-6">
                                                        <input type="text" id="icon-search" class="form-control mb-4" placeholder="search . . ">
                                                    </div>
                                                </div>
                                                <div class="i-main" id="icon-wrapper"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card">
                                        <div id="barra">
                                            <div id="fill-barra"></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="m-auto" style="width: 650px !important;">
                                                <!-- content here -->
                                                <h2 class="my-4">Agregar empleado</h2>
                                                <div id="mensaje"></div>
                                                <div id="mensaje"></div>
                                                <form id="form-editar" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-5">
                                                                <img src="" alt="" id="perfil" class="img-fluid">
                                                            </div>
                                                            <div class="col-sm-12 col-lg-7">
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" id="file" class="custom-file-input">
                                                                    <label for="file" class="custom-file-label" data-browse="Buscar">Elegir un archivo</label>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <p>Si deseas cambiar la imagen de perfil selecciona una desde tus archivos</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="nombre" class="form-control-label">Nombre <span class="text-danger">*</span></label>
                                                                <input type="text" name="nombre" id="nombre" class="form-control">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="cargo" class="form-control-label">Cargo <span class="text-danger">*</span></label>
                                                                <input type="text" name="cargo" id="cargo" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6">
                                                                <label for="telefono" class="form-control-label">Telefono <span class="text-danger">*</span></label>
                                                                <input type="text" name="telefono" id="telefono" class="form-control">
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6">
                                                                <label for="email" class="form-control-label">Email</label>
                                                                <input type="text" name="email" id="email" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre" class="form-control-label">Descripcion <span class="text-danger">*</span></label>
                                                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control textarea"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block py-3">Guardar</button>
                                                    </div>
                                                </form>
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

    <!-- editor -->
    <script src="../../assets/assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="../../assets/assets/plugins/clipboard/js/clipboard.js"></script>

    <!-- axios -->
    <script src="../../assets/axios/dist/axios.min.js"></script>

    <!-- cusjtom scripts -->
    <script src="../../assets/js/tinymce.js"></script>
    <script src='../../assets/js/fileinput.js'></script>
   <script>

        let id = location.search.split('=')[1];

        axios.get('../../server/empleados.php', {
           params: {
               id: id
           }
        })
        .then(res => {

            console.log(res);

            document.getElementById('id').value = res.data.id;
            document.getElementById('nombre').value = res.data.nombre;
            document.getElementById('cargo').value = res.data.cargo;
            document.getElementById('telefono').value = res.data.telefono;
            document.getElementById('email').value = res.data.email;
            document.getElementById('descripcion').value = res.data.descripcion;
            document.getElementById('perfil').setAttribute('src', '../../'+res.data.url);
        })
        .catch(err => console.error(err));
       
        document.getElementById('form-editar').addEventListener('submit', function (e) {

            e.preventDefault();

            let form = new FormData(this);
            form.set('descripcion', tinymce.get('descripcion').getContent());

            form.append('accion', 'editar');
            axios.post('../../server/empleados.php', form, {
                onUploadProgress: function (e) {
                    let load = (e.loaded / e.total) * 100;
                    document.getElementById('fill-barra').style.width = load + '%';
                }
            })
                .then(res => {

                    console.log(res);

                    if (res.data == 'ok') {
                        location.href = 'lista.php';
                    }

                })
                .catch(err => console.log(err));

        });

   </script>

</body>

</html>

