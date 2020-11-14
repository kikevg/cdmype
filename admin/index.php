<!DOCTYPE html>
<html lang="es">

<head>
	<title>Login</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Elite Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Elite Able, Elite Able bootstrap admin template">
	<meta name="author" content="Phoenixcoded" />

	<!-- Favicon icon -->
	<link rel="icon" href="../assets/assets/images/favicon.ico" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="../assets/assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="../assets/assets/plugins/animation/css/animate.min.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="../assets/assets/css/style.css">
	
</head>
<body>

    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content container">
            <div class="card">
                <div class="row flex-column-reverse flex-md-row align-items-center">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h1>Login</h1>
                            <h4 class="mb-3 f-w-400">Ingresa tus credenciales</h4>
                            <div id="msj"></div>
                            <form id="form-login">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-user"></i></span>
                                    </div>
                                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                    </div>
                                    <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="form-group text-left mt-2">
                                    <div class="checkbox checkbox-primary d-inline">
                                        <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                        <label for="checkbox-fill-a1" class="cr"> Guardar credenciales</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/img/LogoCDMYPE_logo-1.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="../assets/assets/js/vendor-all.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- axios -->
    <script src="../assets/axios/dist/axios.min.js"></script>
    <!-- custom scripts -->
    <script>

        document.getElementById('form-login').addEventListener('submit', function (e) {
            e.preventDefault();

            let usuario = document.getElementById('usuario');
            let clave = document.getElementById('clave');

            if (usuario.value == '' || clave.value == '') {
                mostrarMensaje('Llena todos los campos');
                return;
            }

            let form = new FormData(this);

            
            axios.post('../server/auth.php', form)
                .then(res => {

                    console.log(res);

                    if (res.data == 'ok') {
                        location.href = 'home.php';
                    } else {
                        mostrarMensaje(res.data);
                    }

                })
                .catch(err => console.error(err));

        })

        function mostrarMensaje(msj) {
            document.getElementById('msj').innerHTML = `
                <span class='d-block alert alert-danger alert-dismissible fade show'>
                    <strong>${msj}</strong>
                    <button type='button' class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
                </span>
            `;
        }

    </script>
</body>

</html>
