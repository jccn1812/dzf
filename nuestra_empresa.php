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
          <li><strong><a class="active" href="nuestra_empresa.php">NUESTRA EMPRESA</a></strong></li>
          <li><strong><a href="servicios.php">SERVICIOS</a></strong></li>
          <!--li><strong><a href="validar_documentos.php">VALIDAR INFORMES</a></strong></li-->

          <li><strong><a href="objetivos.php"><strong>OBJETIVOS</strong></a></strong></li>
         <?php
         
          If( !empty($isLoged) )
        {
          ?>  
          <li><strong><a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a></strong></li>
          <?php 
        }
        ?>          <li><strong><a href="contacto.php">CONTACTO</a></strong></li>
          <li><strong><a href="metodos_de_pago.php">METODOS DE PAGO</a></strong></li><br>
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
Nuestra Empresa</h2>
<br>
</div>

           <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

         <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h3><a href="">DZFCERTIFICA:</a></h3>
              <p>Es una compañía nacional que entrega servicios de asesoría, ensayos no destructivos, inspección integral de plantas industriales y certificación de equipos móviles. Especialistas en conocimientos normativos regulatorio en Chile, con soluciones para asegurar los activos de sus clientes, a través de un staff de profesionales altamente capacitados, con experiencia en proyectos de envergadura nacional como internacional.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h3><a href="">Mercado</a></h3>
              <p>En un mercado sumamente competitivo, donde el consumidor tiene la opción de elegir entre una gran gama, surge la afirmación, el aumento de la productividad y la mejora de la calidad son factores vitales para garantizar la supervivencia de las empresas en los mercados.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h3><a href="">Exito</a></h3>
              <p>El éxito o fracaso de las empresas dependen en gran parte de su capacidad para identificar los factores que son importantes para los clientes y para vigilar que la empresa funcione de manera competitiva.

“Los buenos resultados dependen de una excelente asesoría”</p>
            </div>
          </div>
        </div>

          </div>
          <div class="col-lg-4 mt-4 mt-lg-0"></div></section><!-- End Featured Section --><!-- End Counts Section -->
    <div class="col-lg-4 mt-4 mt-lg-0"> </div>
          <div class="col-lg-4 mt-4 mt-lg-0"> </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="section-title">
          <h2>Nuestros Valores</h2>
</div>
        <div class="row">
          <div class="col-lg-6">
            <div class="testimonial-item"> <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Lealtad</h3>
<p> <i class="bx bxs-quote-alt-left quote-icon-left"></i> Aceptamos y respetamos los vínculos explícitos e implícitos de nuestros colaboradores y nuestros clientes, reforzando continuamente los valores que representan. <i class="bx bxs-quote-alt-right quote-icon-right"></i> </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item mt-4 mt-lg-0"> <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Respeto</h3>
<p> <i class="bx bxs-quote-alt-left quote-icon-left"></i> Valoramos y defendemos los preceptos y valores individuales de nuestros colaboradores, socios y clientes para convertirnos continuamente en aliados estratégicos de desarrollo personal y empresarial. <i class="bx bxs-quote-alt-right quote-icon-right"></i> </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item mt-4"> <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Responsabilidad</h3>
<p> <i class="bx bxs-quote-alt-left quote-icon-left"></i> Nos preocupamos de dar seguimiento y cumplir todo compromiso y acuerdo tomado. <i class="bx bxs-quote-alt-right quote-icon-right"></i> </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item mt-4"> <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Prudencia</h3>
<p> <i class="bx bxs-quote-alt-left quote-icon-left"></i> Analizamos y comprobamos la información en conjunto con nuestros colaboradores y clientes antes de tomar decisiones, evaluando sus ventajas y aportando nuestra visión y experiencia. <i class="bx bxs-quote-alt-right quote-icon-right"></i> </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="testimonial-item mt-4"> <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>Flexibilidad</h3>
<p> <i class="bx bxs-quote-alt-left quote-icon-left"></i> Somos capaces de adaptarnos a los requerimientos del mercado y nuestros clientes cada vez que sea necesario o requerido, con la finalidad de satisfacer y priorizar las necesidades del servicio brindado. <i class="bx bxs-quote-alt-right quote-icon-right"></i> </p>
            </div>
          </div>
          <div class="col-lg-6"> </div>
        </div>
      </div>
    </section>
    <section id="clients" class="clients">
      <div class="container">
        <div class="section-title">
          <h2>&nbsp; Certificados        </h2>
        </div>
        <div class="portfolio-details-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"> <img src="assets/img/portfolio/portfolio-1.jpg" alt=""> </div>
            <div class="swiper-slide"> <img src="assets/img/portfolio/portfolio-2.jpg" alt=""> </div>
            <div class="swiper-slide"> <img src="assets/img/portfolio/portfolio-3.jpg" alt=""> </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <section class="testimonials"> </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->    <!-- End Clients Section -->

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

  <script src="assets/js/jquery.js"></script>


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