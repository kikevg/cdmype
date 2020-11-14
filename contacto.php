<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | CDMYPE UNIVO</title>
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
            <img src="./assets/img/BannerContactenos.jpg" alt="" class="img-fluid">
        </section>
        <section class="custom-padding-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-primary">Contacto</h2>
                                <p class="text-muted">Escribenos para solventar tus dudas</p>
                                <span class="d-block bg-secondary my-4" style="height: 6px; width: 40px"></span>
                                <div id="msj"></div>
                                <form id="form-contacto">
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
                    <div class="col-sm-12 col-lg-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.8555328408197!2d-88.1813477852388!3d13.482998290521817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b2a65d2291a9f%3A0x9850fb64dc946657!2sCDMYPE%20UNIVO!5e0!3m2!1sen!2ssv!4v1596056469778!5m2!1sen!2ssv", frameborder="0" width="100%" height="400"></iframe>
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
    
        document.getElementById('form-contacto').addEventListener('submit', function (e) {
            e.preventDefault();
            let form = new FormData(this);
            form.append('destino', 'cdmype@univo.edu.sv');
            axios.post('./server/contacto.php', form)
                .then(res => {

                    console.log(res);

                    if (res.data == 'ok') {
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