<?php

    include_once ("admin/class/class.BDinformes.php");
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
    $informes->setFilasInforme(consFilasPaginaTotal);
    $informes->setDiasPorVencer(consDiasPorVencer);
    $informes->setPagina($paginaActual);

	 $arrInformes = $informes->listaInformesPorCriterio ();
   
   mysqli_free_result($arrInformes);  
   
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

    $filename = 'biblioteca.xls';

    header('Content-Type: application/vnd.ms-excel');
    
    header('Content-Disposition: attachment; filename='.$filename);    

?>



      <table id="tblInformes" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered w-auto">
      <thead>
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
        
       
        echo '<tr class="gradeA">';
        printf ( '          <td>%s</td>', muestraTipoInforme($rowInforme ["IdTipoInforme"] ));
        printf ( '          <td>%s</td>', $rowInforme ["numeroInforme"] );
        printf ( '          <td>%s</td>', $rowInforme ["Ot"] );
        printf ( '          <td>%s</td>', $rowInforme ["sello"] );
        printf ( '          <td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaEmision"] ));
        printf ( '          <td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaVencimiento"]) );      
        printf ( '          <td nowrap>%s</td>', $rowInforme ["Estado"] );      
        printf ( '          <td>%s</td>', $rowInforme ["descripcion"]  );
        

      }

      echo '  <tr>';
    
    ?>

   </table>
