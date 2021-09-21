<?php

    include_once ("admin/class/class.BDinformes.php");
    include_once ("admin/class/constantes.php");
		require_once ("admin/class/sesion.class.php");
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DZ Certifica</title>
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

  <!-- =======================================================
  * Template Name: Eterna - v4.3.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  
  <!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div>
        <h1><a href="index.html"><img src="assets/img/header-logo-custom1.png" width="178" height="50" alt=""/></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

  
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
          Validador de Informes</h2>
          <br>
      </div>
           <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
    <form>
        <div class="form-group">
          <label for="InputNumber">N&uacute;mero del informe</label>
          <input type="InputNumber"  class="form-control" id="InputNumber" name="InputNumber" aria-describedby="emailHelp" placeholder="Ingrese el N&uacute;mero del informe">
        </div>
        <div class="form-group">
          <label for="InputOt">Orden de Trabajo</label>
          <input type="InputOt" class="form-control" id="InputOt" name="InputOt" aria-describedby="emailHelp" placeholder="Ingrese la Orden de Trabajo">
        </div>
        <div class="form-group">
          <label for="InputDesc">Descripci&oacute;n</label>
          <input type="InputDesc" class="form-control" id="InputDesc" name="InputDesc" aria-describedby="emailHelp" placeholder="Descripción o patente">
        </div>
        <br>
        <button type="button" id="btnSubmitForm" class="btn btn-danger float-end">Validar Informe</button>
    </form>
    </section><!-- End Featured Section -->

   
   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


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
 <script src="assets/js/jquery.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/valida.js"></script>

</body>

</html>