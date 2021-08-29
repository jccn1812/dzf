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

  
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
  </script>
</head>

<body>
<br>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex justify-content-between align-items-center">

      <div>
        <h1>&nbsp;</h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php"><strong>INICIO</strong></a></li>
          <li><strong><a href="nuestra_empresa.php">NUESTRA EMPRESA</a></strong></li>
          <li><strong><a href="servicios.php">SERVICIOS</a></strong></li>
          <li><strong><a href="objetivos.php">OBJETIVOS</a></strong></li>
          <?php

        If( !empty($isLoged))
        {
          ?>  
          <li><strong><a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a></strong></li>
          <?php 
        }
        ?>
          

          <li><strong><a href="contacto.php">CONTACTO</a></strong></li>
          <li><strong><a href="metodos_de_pago.php">METODOS DE PAGO</a></strong></li><br>
  <?php

        If( empty($isLoged) )
        {
        ?>           
	<li>&nbsp;&nbsp;&nbsp;&nbsp;<strong><button type="button" class="btn btn-primary btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#modalForm">Ingreso de clientes</button></li>
	<?php 
        }
        ?>
	<br>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

     

    </div>
    <?php
        
        If( !empty($isLoged))
        {
          echo "<div class='px-2'><p class='smalltext'>";
	        echo $sesion->getSession('EMPRESA');
          echo '</p';
          
          echo "<form id='frmLogout' method='post' action='#'>";
          echo '<button type="button" id="btnLogout" class="btn btn-secondary btn-sm btn-danger">Cerrar sesión</button>';
          echo "</form>";
          echo "</div>";
        }
          ?>
    
  </header><!-- End Header -->

  <!-- Modal -->
  <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de Clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Ingrese su RUT</label>
                            <input type="text" class="form-control" id="rutCliente" name="rutCliente" placeholder="Rut del Cliente" value="" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                        </div>
                        <!--<div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" />
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>-->
                        <div class="modal-footer d-block">
                            <p class="float-start">Si lo desea <a href="#">Reinicie su password</a>&nbsp;aqu&iacute;</p>
                            <button type="button" id="btnSubmitForm" class="btn btn-danger float-end">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->


  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">&nbsp;         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/logo_final_sii_agosto.png" width="197" height="164" alt=""/></h2>
                <p class="animate__animated animate__fadeInUp">Es una compañía nacional que entrega servicios de asesoría, ensayos no destructivos, inspección integral de plantas industriales y certificación de equipos móviles.</strong></p>
                <a href="nuestra_empresa.php" class="btn-get-started animate__animated animate__fadeInUp">Ver más</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/logo_final_sii_agosto.png" width="197" height="164" alt=""/></h2>
                <p class="animate__animated animate__fadeInUp"> Especialistas en conocimientos normativos regulatorio en Chile.Con soluciones para asegurar los activos de sus clientes.</p>
                <a href="objetivos.php" class="btn-get-started animate__animated animate__fadeInUp">Ver más</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
               <h2 class="animate__animated animate__fadeInDown">&nbsp;         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/logo_final_sii_agosto.png" width="197" height="164" alt=""/></h2>
                <p class="animate__animated animate__fadeInUp"> A través de un staff de profesionales altamente capacitados, con experiencia en proyectos de envergadura nacional como internacional.</p>
                <a href="servicios.php" class="btn-get-started animate__animated animate__fadeInUp">Ver más</a>
              </div>
            </div>
          </div>
          <!-- Slide 4 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-4.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
               <h2 class="animate__animated animate__fadeInDown">&nbsp;         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/logo_final_sii_agosto.png" width="197" height="164" alt=""/></h2>
                <p class="animate__animated animate__fadeInUp"> El éxito o fracaso de las empresas dependen en gran parte de su capacidad para identificar los factores que son importantes para los clientes y para vigilar que la empresa funcione de manera competitiva. </p>
                <a href="servicios.php" class="btn-get-started animate__animated animate__fadeInUp">Ver más</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

         <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h3><a href="">DZFCERTIFICA:</a></h3>
              <p>DZFCERTIFICA. Es una compañía nacional que entrega servicios de asesoría, ensayos no destructivos, inspección integral de plantas industriales y certificación de equipos móviles. Especialistas en conocimientos normativos regulatorio en Chile, con soluciones para asegurar los activos de sus clientes, a través de un staff de profesionales altamente capacitados, con experiencia en proyectos de envergadura nacional como internacional.</p>
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
          <div class="col-lg-4 mt-4 mt-lg-0"> </div>
          <div class="col-lg-4 mt-4 mt-lg-0"> </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>CALIDAD EN SERVICIO.</h3>
            <p>La calidad es uno de los requisitos fundamentales para garantizar  el éxito en su negocio, crea fidelidad del cliente y asegura ventajas  competitivas en la industria.<br>
              DZF Certifica, ofrece una sólida vinculación, compromiso y satisfacción  de calidad a través de altos estándares nacionales e internacionales de la  industria y sus procesos de certificación.              </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <strong>SERVICIOS</strong></li>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;ENSAYOS NO DESTRUCTIVOS <br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;INSPECCIÓN DE EQUIPOS MÓVILES DE IZAJE<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;ASESORÍA DE REGULARIZACIÓN EN ESTANQUES SEC/SEREMI<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;CERTIFICACIÓN DE ESTANQUES ISOTANQUE, API 653, UL58, BS2594, D.O.T.<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;INSPECCIÓN INTEGRAL DE PLANTAS INDUSTRIALES DECRETO SUPREMO<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;CALIFICACIÓN DE SOLDADORES Y PROCEDIMIENTOS<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;CERTIFICACIÓN DE INSTRUMENTOS DE INSPECCIÓN<br>
              <li><img src="assets/img/bullet.jpg" alt=""/>&nbsp;CAPACITACIONES <br>
              <li><a href="servicios.php" class="btn-get-started animate__animated animate__fadeInUp">Ver más</a><br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
              
              <a href="servicios.php" class="btn-get-started animate__animated animate__fadeInUp"></a>

            </ul>
</div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>&nbsp; Clientes</h2>
          <p>Numerosos clientes ya confían en nosotros. </p>
          <p>Somos conscientes de la particularidad de cada proyecto, por lo que nos ajustamos a las necesidades de cada cliente y hacemos nuestros sus objetivos.<br>
            <br>
          </p>
        </div>

        <div class="clients-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-9.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-10.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-11.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-15.png" class="img-fluid" alt=""></div>
		 </div>
          <div class="swiper-pagination"></div>
        </div><br>
<br>
<br>
<br>

        <div class="container">
          <div class="section-title">
            <h2>&nbsp; Alianzas</h2>
            <p><br>
            En la industria de la certificación e inspección no se puede ser participe de todos los procesos, por lo que DZF CERTIFICA nos aliamos con otras empresas que lideran el mercado, para si ofrecer un servicio de calidad garantizada en el menor tiempo posible. </p>
          </div>
          <div class="clients-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-12.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-13.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-14.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-12.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-13.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-14.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

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
      <div class="copyright">
      © Todos los derechos reservados </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
      <a href="https://bootstrapmade.com/">&nbsp;</a> </div>
    </div>
  </footer><!-- End Footer -->

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