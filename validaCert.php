<?php

       include_once ("admin/class/class.BDinformes.php");
       include_once ("admin/class/constantes.php");





       $numero		      = $_POST ["numero"];
       $ot              = $_POST ["ot"];
       $desc            = $_POST ["desc"];




         
        $informes = new informes ( );
		    $informes->setNumeroInforme($numero);
        $informes->setOt($ot);
        $informes->setDesc($desc);
        $informes->setDiasPorVencer(consDiasPorVencer);

        $registros = $informes->detalleInformePorCriterio();

        $DatosCert = mysqli_fetch_object( $registros );

        $rutEmpresa         =   $DatosCert->rutEmpresa;
        $empresa            =   $DatosCert->empresa;
        
        $cantRegistros = mysqli_num_rows($registros);


        if(empty($rutEmpresa)){

          echo "<label>" . mensajeValidaInformeNoEncontrado ."</label>";
          exit;
      }   

        


       
        $paginas = round(($cantRegistros/consFilasPagina)+.5);



        echo "
        <div>
        <h6>
             Certificados relacionado a:<br> 
             $empresa <br>
             $rutEmpresa
         </h6>
      </div>";

        echo "Cantidad de Informes encontrados: $cantRegistros";

        $paginas = round(($cantRegistros/consFilasPagina)+.5);

        
       mysqli_data_seek (  $registros, 0);
        
       echo '
       <table id="tblInformes" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered w-auto">
        <tr>
        <th>Tipo</th>
        <th>N&uacute;mero</th>
        <th>OT</th>
        <th>Sello</th>
        <th>Fecha creaci&oacute;n</th>
        <th>Fecha Vencimiento</th>
        <th>Estado</th>
        <th>Descripci&oacute;n/Patente</th>
        <th>Categor&iacute;as</th>
      
            </tr>
            
            ';

        while ( $rowInforme = mysqli_fetch_array ( $registros ) ) {

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
            printf ( '<td>%s</td>', muestraTipoInforme($rowInforme ["IdTipoInforme"] ));
            printf ( '<td>%s</td>', $rowInforme ["numeroInforme"] );
            printf ( '<td>%s</td>', $rowInforme ["Ot"] );
            printf ( '<td nowrap>%s</td>', $rowInforme ["sello"] );
            printf ( '<td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaEmision"] ));
            printf ( '<td>%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaVencimiento"]) );      
            printf ( '<td nowrap>%s</td>', $detalle );      
            printf ( '<td>%s</td>', $rowInforme ["descripcion"]  );
            printf ( '<td>%s</td>', $rowInforme ["strCategoria"]  );
            
            echo '</tr>
            ';
          }
            echo '</table>';
          /*
            echo '<nav aria-label="Pagina">
                  <ul class="pagination justify-content-end">';
           
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
           
           echo '</ul>
         </nav>';
         */
         






            
            
        


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
            return "Certificaci&oacute;n";		
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
  
  
        if(is_null($lafecha) || empty($lafecha) )
          {
            return "";
          } 
        
        $lafecha = strtotime($lafecha);
        return  date('d/m/Y',$lafecha);
        
      }
  

?>