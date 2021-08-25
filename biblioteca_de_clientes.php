<?php

    include_once ("admin/class/class.BDInformes.php");
    include_once ("admin/class/constantes.php");
		require_once ("admin/class/sesion.class.php");
    
    session_start();

    $sesion = new sesion();
    $IdEmpresa = $sesion->getSession('ID_EMPRESA');   
    $empresa   = $sesion->getSession('EMPRESA');
    $rut       = $sesion->getSession('RUT');

    $IdTipoInforme   = $_POST ["cmbTipoInforme"];
    $numeroInforme   = $_POST ["numeroInforme"];
    $ot              = $_POST ["ot"];
    $sello           = $_POST ["sello"];
    
    $IdEstado        = $_POST ["cmbEstado"];
    $fechaInicioVcto = $_POST ["fechaInicioVcto"];
    $fechaFinVcto    = $_POST ["fechaFinVcto"];

    $paginaActual    = $_POST ["pagina"];

    $toExcel         = $_POST ["toExcel"];

  
    
    if(empty($paginaActual))
    {
      $paginaActual = 1;
    };



    $informes = new informes ( );
		$informes->setIdEmpresa($IdEmpresa);
    $informes->setIdTipoInforme($IdTipoInforme);
    $informes->setNumeroInforme($numeroInforme);
    $informes->setOt($ot);
    $informes->setSello($sello);
    $informes->setIdEstado($IdEstado);

    $informes->setFechaInicioVcto($fechaInicioVcto);
    $informes->setFechaFinVcto($fechaFinVcto);
    $informes->setFilasInforme(consFilasPagina);
    
    /*
    if($toExcel=="1"){
      $informes->setFilasInforme(consFilasPaginaTotal);    
    }
    */
    $informes->setDiasPorVencer(consDiasPorVencer);
    $informes->setPagina($paginaActual);





		$arrInformes = $informes->listaInformesPorCriterio ();
    
    $registros = $informes->cuentaInformesPorCriterio ();


    $rowDato = mysqli_fetch_object( $registros );
    $filas = $rowDato->filas;
    if($filas<consFilasPagina)
      {
            $paginas = 1;
      }
    else{
      $paginas = round(($filas/consFilasPagina)+.5);
    }   




    function muestraTipoInforme($tipoInforme){
      switch($tipoInforme)
      {
        case 1:
          return "Inspecci&oacute;n";
          break;
        case 2:	
          return "Capacitaci&oacute;n";
          break;
        case 3:
          return "Certificac&oacute;n";		
          break;
      }
    }


    function muestraEstado($estado){
      switch($estado)
      {
        case 1:
          return "Vigente";
          break;
        case 2:	
          return "Vencido";
          break;
        case 3:
          return "Por vencer";		
          break;
      }
    }

        
    function muestraFechaDDMMAAAA($lafecha){

      $lafecha = strtotime($lafecha);
      return  date('d/m/Y',$lafecha);
      
    }

    function creaComboTipoInformeBT($comparadorTipoInforme){
	  
      $selectInspeccion = "";
      $selectCapacitacion = "";
      $selectCertificacion = "";
    
      if($comparadorTipoInforme=="1") $selectInspeccion     = "selected";
      if($comparadorTipoInforme=="2") $selectCapacitacion   = "selected";
      if($comparadorTipoInforme=="3") $selectCertificacion  = "selected";
    
      echo '
        <select id="cmbTipoInforme" name="cmbTipoInforme" class="form-select form-select-sm"" aria-label=".form-select-lg example">
          <option value="">Seleccione</option>
          <option value="1" '.$selectInspeccion.'>Inspecci&oacute;n</option>
          <option value="2" '.$selectCapacitacion.'>Capacitaci&oacute;n</option>
          <option value="3" '.$selectCertificacion.'>Certificaci&oacute;n</option>
        </select>';
     }
    

     function creaComboEstado($comparadorEstado){
	  
      $selectInspeccion = "";
      $selectCapacitacion = "";
      $selectCertificacion = "";
    
      if($comparadorEstado=="1") $selectVigente ="selected";
      if($comparadorEstado=="2") $selectVencido ="selected";
      if($comparadorEstado=="3") $selectPorVencer ="selected";
    
      echo '
        <select id="cmbEstado" name="cmbEstado" class="form-select form-select-sm"" aria-label=".form-select-lg example">
          <option value="">Seleccione</option>
          <option value="1" '.$selectVigente.'>Vigente</option>
          <option value="2" '.$selectVencido.'>Vencido</option>
          <option value="3" '.$selectPorVencer.'>Por vencer</option>
        </select>';
     }
  



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

  <link rel="stylesheet" href="assets/css/datatables.css">

  <!-- =======================================================
  * Template Name: Eterna - v4.3.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:comercial@dzcertifica.cl">comercial@dzfcertifica.cl</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>(+56) 2 2904 1494 - (+56 9) 5169 9440</span></i>
-      </div>
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
          Biblioteca de Clientes</h2>
          <br>
      </div>
           <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

      <div>
        <h6>
          <?php
            echo $empresa ."<br>";
            echo $rut;
          ?>
        </h6>
      </div>

      <div><label><?php echo consBiblioMSG?></label></div><br>

  
      <form id="frmbiblio" method="post">
      <input type="hidden" name="pagina" id="pagina" value="">  
      <input type="hidden" name="toExcel" id="toExcel" value="<?php echo $toExcel ?>">  

     <!-- <a href="#" id="btnExtendTable" class="btn-primary btn-sm btn-danger stretched-link" onclick='extiendeTabla()' >Exportar a excel</a-->
      


      <table id="tblInformes" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered w-auto">
      <thead>
            <tr>
            <th>
            <?php
              creaComboTipoInformeBT($IdTipoInforme)
              ?>
            </th>
							<th>
                <input type="text" class="form-control form-control-sm" id="numeroInforme" name="numeroInforme" aria-describedby="Numero" maxlength="10" value="<?=$numeroInforme?>">
              </th>
							<th> 
                <input type="text" class="form-control form-control-sm" id="Ot" name="ot" maxlength="10" value="<?=$ot?>">
              </th>
							<th>
                <input type="text" class="form-control form-control-sm" id="sello" name="sello" maxlength="10" value="<?=$sello?>">
              </th>
              <th></th>
							<th>
              <input type="date" name="fechaInicioVcto" placeholder="dd-mm-yyyy" class="form-control form-control-sm" value="<?=$fechaInicioVcto?>">
              <input type="date" name="fechaFinVcto" placeholder="dd-mm-yyyy" class="form-control form-control-sm" value="<?=$fechaFinVcto?>">


              </th>
              <th>
              <?php
                 creaComboEstado($IdEstado)
              ?>
                
              </th>
              <th>
              <button id="btnSearch" type="submit" class="form-control form-control-sm btn btn-primary btn-sm btn-danger">Buscar</button>

              </th>
            </tr>
						<tr>
							<th>Tipo</th>
							<th>N&uacute;mero</th>
							<th>OT</th>
							<th>Sello</th>
              <th>Fecha creaci&oacute;n</th>
							<th>Fecha Vencimiento</th>
              <th>Estado</th>
              <th>Descripci&oacute;n</th>
            </tr>
					</thead>


     <?php
        $x=0;
        while ( $rowInforme = mysqli_fetch_array ( $arrInformes ) ) {
        $x ++;
        
        switch ($rowInforme ["Estado"]){

          case "Vigente":            
            $detalle = $rowInforme ["Estado"] . "&nbsp;&nbsp;&nbsp;<img src='assets/img/verde.jpg'>";
            break;
          case "Vencido":
            $detalle = $rowInforme ["Estado"] . "&nbsp;&nbsp;&nbsp;<img src='assets/img/rojo.jpg'>";
            break;    
          case "Por vencer":
            $detalle = $rowInforme ["Estado"] . "&nbsp;<img src='assets/img/amarrillo.jpg'>";
            break;  
        }

        echo '<tr class="gradeA">';
        printf ( '          <td>%s</td>', muestraTipoInforme($rowInforme ["IdTipoInforme"] ));
        printf ( '          <td>%s</td>', $rowInforme ["numeroInforme"] );
        printf ( '          <td>%s</td>', $rowInforme ["Ot"] );
        printf ( '          <td>%s</td>', $rowInforme ["sello"] );
        printf ( '          <td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaEmision"] ));
        printf ( '          <td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaVencimiento"]) );      
        printf ( '          <td nowrap>%s</td>', $detalle );      
        printf ( '          <td>%s</td>', $rowInforme ["descripcion"]  );
        

      }

      echo '  <tr>';
    
    ?>

   </table>

   <nav aria-label="Pagina">
   <ul class="pagination justify-content-end">
  <?php
   for ($x = 1; $x <= $paginas; $x++) {
        if($x==$paginaActual){
          echo " <li class='page-item active' aria-current='page'>";
        }
        else
        {
          echo "<li class='page-item'>";
        }
        echo "<a href='#' class='page-link' onclick='asignaPag($x)'>$x</a></li> ";
   } 
  ?>
  </ul>
</nav>


</form>

      </div>
    </section><!-- End Featured Section -->
    </section><!-- End Counts Section -->


     
    

      </div>
    </section><!-- End Featured Section -->

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

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch"> </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"> </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"> </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"> </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"> </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"> </div>

        </div>

      </div>
    </section><!-- End Services Section -->

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
      &copy; Todos los derechos reservados</div>
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