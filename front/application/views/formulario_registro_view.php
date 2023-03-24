<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>static/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/fontawesome/css/all.min.css">
  <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/css/registro.css">

  <!-- scripts de accion de usuario -->
  <script src="<?= base_url() ?>static/js/registro.js"></script>
  <script src="<?= base_url() ?>static/js/mensajes.js"></script>
  <script src="<?= base_url() ?>static/js/error.js"></script>

  <script>
    var appData = {
      base_url  : "<?= base_url() ?>",
      url_ws    : "<?= base_url()."../back/" ?>"
      };
  </script>

</head>

<body style="background-color:#b9c1ca;">

  <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      
      <div align="center"><a title="Sunrise" href="http://dtai.uteq.edu.mx/~jorolv195/AWOS/project/front/">
        <img src="<?= base_url() ?>static/img/logosun.png">
        </a>
      </div>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>



  <!-- Header -->
  
    <!-- body -->
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center" style="font-size: 25pt" >Registro</h5>
                  <form>

                    <div class="form-label-group" id="group-nombre">
                      <input type="text" id="nombre" class="form-control" placeholder="Nombre">
                      <label for="nombre">Nombre</label>
                    </div>

                    <div class="form-label-group" id="group-telefono">
                      <input type="text" id="telefono" class="form-control" placeholder="No.Teléfono">
                      <label for="telefono">No.Teléfono</label>
                    </div>

                    <div class="form-label-group" id="group-correo">
                      <input type="text" id="correo" class="form-control" placeholder="Correo Electrónico">
                      <label for="correo">Correo Electrónico</label>
                    </div>

                    <div class="form-label-group" id="group-contrasenia">
                      <input type="password" id="contrasenia" class="form-control" placeholder="Contraseña">
                      <label for="contrasenia">Contraseña</label>
                    </div>

                    <button type="button" class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" id="btn-registro">
                    Registrarme</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
   <!-- body -->

    <div id="mensaje"></div>
 

   <!-- Footer -->
 <footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">Sunrise</a>
  </div>
  <!-- Copyright -->
</footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url() ?>static/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
