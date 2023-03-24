<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lista De Articulos</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>static/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/fontawesome/css/all.min.css">
  <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>

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


            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>frontend/listaadmi">Administrador</a>
            </li>  &nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>frontend/listaclientes">Clientes</a>
            </li>  &nbsp;&nbsp;&nbsp;                     
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>frontend/listaarticulos">Articulos</a>
            </li> &nbsp;&nbsp;&nbsp;
              <a class="nav-link" href=""><i class="fa-2x fas fa-user"></i></a>
            </li>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Page Content -->
  <div class="container">

    <br/>
    <br/>
    <br/>

    <h1 style="font-family: Montserrat, Homer Simpson UI;" >Articulos</h1>
    <!-- /.table -->
    <br/>
    <br/>
    <br/>
    <div class="container">

      <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Articulo</th>
          <th scope="col">Descripción</th>
          <th scope="col">Precio Unitario</th>
          <th scope="col">Categoria</th>
          <th scope="col">Estado</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      </table>

    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <!-- /.table -->

  </div>
  <!-- /.container -->

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
