<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Compra</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>static/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/fontawesome/css/all.min.css">
  <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/css/superindice.css">


    <!-- scripts de accion de usuario -->
    <script src="<?= base_url() ?>static/js/usuario.js"></script>
  <script src="<?= base_url() ?>static/js/compra.js"></script>
  <script src="<?= base_url() ?>static/js/mensajes.js"></script>

  <script>
    var appData = {
      base_url  : "<?= base_url() ?>",
      url_ws    : "<?= base_url()."../back/" ?>",
      correo    : "<?= $this->session->userdata( "correo" ) ?>",
      idCliente : 0
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
      </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!-- <div class="input-group rounded">
          <input type="buscar" class="form-control rounded" placeholder="Buscar" aria-label="buscar"
            aria-describedby="Buscar-addon" />
            <button type="button" class="btn btn-dark">
              <i class="fas fa-search"></i>
            </button>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->


      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          </li>
          
          <li class="nav-item">
            <span style="color: black; font-family: Century Gothic;  font-size: 20pt;" id="nombre-cliente"></span>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;

          <li class="nav-item">
            <a title="Catalogo" class="nav-link" href="<?= base_url() ?>frontend/catalogo"><i class="fa-2x fas fa-book-open"></i></a>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
            <a title="Carrito Compras" class="nav-link" href="<?= base_url() ?>frontend/carritocompras"><i class="fa-2x fas fa-shopping-cart"></i></a>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>frontend/listadeseos">
                <i class="fa-2x fas fa-clipboard-list"></i>
                <span class="badge badge-pill badge-danger" id="lista-contador"></span>
              </a>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <li class="nav-item">
            <a title="Compras" class="nav-link" href="<?= base_url() ?>frontend/historial"><i class="fa-2x fas fa-shopping-bag"></i></a>
            </li>&nbsp;&nbsp;&nbsp;&nbsp; -->
          <li class="nav-item" id="sesion">
            </li>&nbsp;&nbsp;&nbsp;&nbsp; 
        </ul>
      </div>
    </div>
  </nav>


    <!-- Header -->

    <!-- body -->
    <br/>
    <br/>

    <div class="jumbotron">
    <div class="container">
      <p style="font-family: Montserrat, Homer Simpson UI; font-size: 27pt" >Casi completamos tu compra :)</p>
      <br/>
        <div class="row">
        <input id="ArraTotal" type="hidden" value=""/>
          <!-- lista carrito -->
          <div class="col-lg-9" align="left">
            <table class="table table-borderless" id="table-compra">
            <thead>
              <tr>
                <th scope="col" style="font-size: 15pt;">Articulo</th>
                <th scope="col" style="font-size: 15pt;">Cantidad</th>
                <th scope="col" style="font-size: 15pt;">Precio</th>
                <th scope="col" style="font-size: 15pt;">Subtotal</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
          </div>

          <!-- resumen pedido -->
          <div class="col-lg-3" align="left" id="opciones" >
          </div>

        </div>

          
        <div class="row" id="datos" >
        </div>
        <div class="row" id="direccion" >
        </div>
    </div>
  </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
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
