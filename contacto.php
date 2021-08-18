<?php
       require_once 'admin/class/sesion.class.php';
       session_start();

       $sesion = new sesion();
       $isLoged = $sesion->getSession('ID_EMPRESA');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DZF Certifica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center"><i class="bi bi-envelope d-flex align-items-center"><a href="mailto:comercial@dzcertifica.cl">comercial@dzfcertifica.cl</a></i> <i class="bi bi-phone d-flex align-items-center ms-4"><span> (+56) 2 2904 1494 - (+56 9) 5169 9440</span></i></div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class=""><i class=""></i></a>
        <a href="#" class=""><i class=""></i></a>
        <a href="#" class=""><i class=""></i></a>
        <a href="#" class=linkedin"><i class=""></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div>
        <h1><a href="index.php"><img src="assets/img/header-logo-custom1.png" width="178" height="50" alt=""/></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><strong><a href="index.php">INICIO</a></strong></li>
          <li><strong><a href="nuestra_empresa.php">NUESTRA EMPRESA</a></strong></li>
          <li><strong><a href="servicios.php">SERVICIOS</a></strong></li>
          <li><strong><a href="objetivos.php"><strong>OBJETIVOS</strong></a></strong></li>
          <?php
          
          If( !empty($isLoged) )
        {
          ?>  
          <li><strong><a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a></strong></li>
          <?php 
        }
        ?>          <li><strong><a class="active" href="contacto.php">CONTACTO</a></strong></li>
          <li><strong><a href="metodos_de_pago.php">METODOS DE PAGO</a></strong></li><br>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

  </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">&nbsp;</a></li>
        </ol>
        <h2>Contacto</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>&nbsp; &nbsp; Dirección</h3>
              <p>&nbsp; &nbsp;El Esfuerzo 24, Padre Hurtado, Región Metropolitana</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>  &nbsp; &nbsp; Email</h3>
<p><a href="mailto:Comercial@dzfcertifica.cl">&nbsp; &nbsp; Comercial@dzfcertifica.cl</a></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>&nbsp; &nbsp;Teléfono</h3>
              <p><a href="tel:+56 9 5169 9440">&nbsp; &nbsp; +56 9 5169 9440 - (+56) 2 2904 1494</a></p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 "><a href="https://www.google.com/maps/place/DZF+CERTIFICA/@-33.5564308,-70.7973404,17z/data=!4m5!3m4!1s0x9662dd4835891a6f:0xf920291900105d8d!8m2!3d-33.5563823!4d-70.7973921?hl=es" target="new"> &nbsp;    &nbsp;   &nbsp;  <img src="assets/img/mapa.jpg" width="486" height="318" alt=""/></a></div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="mensaje" rows="5" placeholder="Mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
<div class="col-lg-6">
    <h4>&nbsp;</h4>
</div>
<div class="footer-top">
     <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">INICIO</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">NUESTRA EMPRESA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SERVICIOS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">VALIDAR DOCUMENTOS</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">OBJETIVOS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BIBLIOTECA DE CLIENTES</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CONTACTO </a></li>
              
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>ContactO</h4>
            <p> El Esfuerzo 24, Padre Hurtado, <br>
              Región Metropolitana <br>
              <br>
              <strong>Teléfono: </strong>(+56) 2 2904 1494 <br>
              <strong>Celular:</strong> &nbsp;(+56) 9 5169 9440<br>
              <strong>Email:</strong><a href="mailto:contact@example.com">&nbsp;comercial@dzfcertifica.cl</a></i> </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Nuestra Empresa</h3>
            <p>Es ser una empresa de servicios en la industria, caracterizada por sus buenas prácticas, profesionalismo y especialización aportando soluciones concretas, basado en los compromisos y los requisitos exigidos por nuestros clientes</p>
           
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="container">
      <div class="copyright">&copy; Todos los derechos reservados</div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ --></div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>