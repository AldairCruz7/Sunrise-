<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Administrador</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>static/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/fontawesome/css/all.min.css">
  <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/css/loginadmi.css">

</head>

<body style="background-color:#b9c1ca;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      
      <div align="center"><a title="Sunrise" href="http://dtai.uteq.edu.mx/~jorolv195/AWOS/project/front/">
        <img src="<?= base_url() ?>static/img/logosun.png">
        </a>
      </div>
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">


          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>frontend/login"><i class="fa-2x fas fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


    <!-- /.row -->

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center" style="font-size: 25pt" >Login Administrador</h5>
            <form class="form-signin">&nbsp;&nbsp;
              <div class="form-label-group">
                <input type="correo" id="correo" class="form-control" placeholder="Correo electrónico" required autofocus>
                <label for="correo">Correo electrónico</label>
              </div>&nbsp;&nbsp;&nbsp;&nbsp;

              <div class="form-label-group">
                <input type="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña" required>
                <label for="contrasenia">Contraseña</label>
              </div>&nbsp;&nbsp;&nbsp;

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="text-center">
                <a class="small" href="<?= base_url() ?>frontend/registro">Registrar admin</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- /.row -->
 

  <!-- Footer -->
 <footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>    
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright
    <a class="text-white" href="https://mdbootstrap.com/">Sunrise.com</a>
  </div>
  <!-- Copyright -->
</footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url() ?>static/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
