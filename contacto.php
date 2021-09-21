<?php
      require_once 'admin/class/sesion.class.php';
      session_start();

      $sesion = new sesion();
      $isLoged = $sesion->getSession('ID_EMPRESA');

      $name = $_POST ["name"];



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
  <style type="text/css">
  .Estilo17 {
    color: #9C9C9C
}
.Estilo18 {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    color: #9C9C9C;
    line-height: 17px;
}
.blanco {font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	line-height: 17px;
}
.texto_empresa {
    font-family: Tahoma, Geneva, sans-serif;
    font-size: 12px;
    color: #CCCCCC;
    text-align: justify;
    line-height: 20px;
}
  </style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
  </script>
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
    <section id="featured" class="featured">
      <div class="container">

      <div class="section-title">

<h2><br>
  <br>
Contacto</h2>
<br>


            
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <h3>Dirección</h3>
              <p>&nbsp; &nbsp;El Esfuerzo 24, Padre Hurtado, Región Metropolitana</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4"><h3> Email</h3>
<p><a href="mailto:Comercial@dzfcertifica.cl">&nbsp; &nbsp; Comercial@dzfcertifica.cl</a><br>
  <a href="mailto:Comercial@dzfcertifica.cl"> &nbsp;  &nbsp;&nbsp;&nbsp;Comercial@dzfcertifica.com</a></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4"><h3>Teléfono<br>
              </h3>
              <p><a href="tel:+56229041494">&nbsp;(+56) 2 2904 1494</a> </p>
              <p><a href="tel:+56951699440">  (+56) 9 5169 9440 </a></p>
              <p><a href="tel:+56229041494"> &nbsp;</a></p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 "><a href="https://www.google.com/maps/place/DZF+CERTIFICA/@-33.5564308,-70.7973404,17z/data=!4m5!3m4!1s0x9662dd4835891a6f:0xf920291900105d8d!8m2!3d-33.5563823!4d-70.7973921?hl=es" target="new"> &nbsp;    &nbsp;   &nbsp;  <img src="assets/img/mapa.jpg" width="486" height="318" alt=""/></a></div>
<div class="col-lg-6">
        <?php
         if (empty($name)) 
         {
        ?>
          
            <form class="php-email-form">
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
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center">
              <button type="button" id="btnMail" class="btn btn-secondary btn-sm btn-danger">Enviar</button>  
            </form>
         
          
          <?php
         }
          else
          {
            echo "<p>Estimado cliente<br><br> El envio de su mensaje se ha realizado exit&oacute;samente y pronto nos prondremos en contacto con usted.<br><br>
            Para nosotros su opinion es importante, por lo que estamos constantemente atendiendo sus dudas y consultas.<br><br>Lo invitamos a contactarnos
            utilizando este formulario y a trav&eacute;s de los canales indicados en esta p&aacute;gina. </p>"; 
          }
          ?>
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
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">INICIO</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="nuestra_empresa.php">NUESTRA EMPRESA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="servicios.php">SERVICIOS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="validar_documentos.php">VALIDAR INFORME</a></li>

              <li></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="objetivos.php">OBJETIVOS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contacto.php">CONTACTO </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="metodos_de_pago.php">MÉTODOS DE PAGO<br>
              </a></li>
              
         <?php      
          If( !empty($isLoged) )
           {
         ?>    <li><i class="bx bx-chevron-right"></i>
              <a href="biblioteca_de_clientes.php">BIBLIOTECA DE CLIENTES</a>
          <?php
           }
          ?> 
              <a href="objetivos.php"></a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contacto</h4>
            <p> El Esfuerzo 24, Padre Hurtado, <br>
              Región Metropolitana <br>
              <br>
              <strong>Teléfono: </strong><a href="tel:+56229041494">(+56) 2 2904 1494 </a><br>
              <strong>Celular:</strong> &nbsp;<a href="tel:+56951699440">(+56) 9 5169 9440</a><br>
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
      <div class="copyright">&copy; Todos los derechos reservados</div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ --></div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/js/jquery.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>