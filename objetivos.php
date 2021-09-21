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
          <!--li><strong><a href="validar_documentos.php">VALIDAR INFORMES</a></strong></li-->

          <li><a class="active" href="objetivos.php"><strong>OBJETIVOS</strong></a></strong></li>
          <?php
          
          If( !empty($isLoged) )
        {
          ?>  
          <li><strong><a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a></strong></li>
          <?php 
        }
        ?>          <li><strong><a href="contacto.php">CONTACTO</a></strong></li>
          <li><strong><a href="metodos_de_pago.php">METODOS DE PAGO</a></strong></li><br>
          <br>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

  </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">
<!-- ======= About Section ======= -->
      <div class="section-title">

          <h2><br>
            <br>
          Objetivos</h2>
          <br>
</div>
          <section id="counts" class="counts">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class=""><img src="assets/img/vision.jpg" alt=""/></i>
              
              <p><strong><br>
                <br>
                  <br>
                  Visión:<br>
              </strong> Ser una empresa de servicios en la industria, caracterizada por sus buenas prácticas, profesionalismo y especialización aportando soluciones concretas, basado en los compromisos y los requisitos exigidos por nuestros clientes.</p>
</div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class=""><img src="assets/img/mision.jpg" width="276" height="87" alt=""/></i>
             
              <p><strong><br>
              </strong></p>
              <p><strong> <br>
                Misión:</strong> <br>
              entregando servicios, profesionalismo, compromiso, confiabilidad y calidad con altos estandares.</p>
</div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box"><img src="assets/img/politicas_calidad.jpg" alt="" width="276" height="87"/></i>
             <p><strong>
              Politica de Calidad:<br>
             </strong>Su principal política radica en el compromiso a   cumplir con los requisitos normativos aplicables.  Con una preocupación constante en el mejoramiento   continuo del SGC, para una mayor satisfacción de   sus clientes</p>
</div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box"><img src="assets/img/mision2.jpg" width="276" height="87" alt=""/></i>
              
              <p><strong>Valores:</strong> <br>
              • Enfoque en el desarollo del negocio a largo plazo sin perder de vista la necesidad de obtener continuamente resultados beneficiosos. <br>
              • Entender qué aporta valor para nuestros clientes y focalizarnos en proporcionar ese valor en todos nuestros procesos <br>
              • Respeto y apertura hacia la diversidad de culturas y tradiciones <br>
              • Relaciones personales basadas en la confianza y en el respeto mutuo.<br>
              Esto supone el compromiso de alinear los hecho con las palabras, Escuchar opiniones distintas y comunicar de forma abierta y sincera. Compromiso con una sólida ética laboral,integridad y honestidad, como con el cumplimiento de la legislación aplicable y los principios, políticas y estándares de DFZCERTIFICA</p>
</div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


      </div>
          <div class="col-lg-4 mt-4 mt-lg-0"> </div>
          <div class="col-lg-4 mt-4 mt-lg-0"> </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->    <!-- End About Section -->

    <!-- ======= Services Section ======= -->    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients"> </section><!-- End Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">INICIO</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="nuestra_empresa.php">NUESTRA EMPRESA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="servicios.php">SERVICIOS</a></li>
              
              <li><i class="bx bx-chevron-right"></i> <a href="validar_documentos.php">VALIDAR INFORME</a></li>

              <li></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="objetivos.php">OBJETIVOS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contacto.php">CONTACTO </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="metodos_de_pago.php">MÉTODOS DE PAGO<br>
              </a></li>
              <?php
         
         If( !empty($isLoged) )
         {
           ?> 
            <li><i class="bx bx-chevron-right"></i><a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a>
            <?php
        }
       ?>
              
              <a href="objetivos.php"></a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>ContactO</h4>
            <p> El Esfuerzo 24, Padre Hurtado, <br>
              Región Metropolitana <br>
              <br>
              <strong>Teléfono: </strong><a href="tel:+562 2904 1494">(+56) 2 2904 1494 </a><br>
              <strong>Celular:</strong> &nbsp;<a href="tel:+5695169 9440">(+56) 9 5169 9440</a><br>
              <strong>Email:</strong><a href="mailto:contact@example.com">&nbsp;comercial@dzfcertifica.cl</a></i></p>
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
      <div class="copyright"> &copy; Todos los derechos reservados</div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
        <a href="https://bootstrapmade.com/">&nbsp;</a></div>
    </div>
  </footer>
  <!-- End Footer -->

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