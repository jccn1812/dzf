<?php

include_once ('../class/class.html.php');
include_once ('IntF.dos.php');
/*------------------------------------------------------
 archivo de clase: class.htmlInformes.php
 -----------------
 Descripción: Implementa la clase HTML para las cuentas
 Clase de la que hereda : classHtml
 Interface  : funcionalidad
 Aplicación : contable web
               - Módulo de administración -
 Autor : Juan Carlos Campos N.
 Fecha : 31 de enero de 2009
 Nuevo : 7 de diciembre de 2016
*/

class Htmlinformes extends classHtml implements funcionalidad {
	/* Datos del formulario */
	private $accion;   
	private $arrInformes;         
	private $IdInforme;         
	private $IdTipoInforme;     
	private $IdEmpresa;     
	private $numeroInforme;    
	private $ot;  
	private $descripcion;  

	private $fechaEmision;      
	private $fechaVencimiento;  
	private $IdUsuarioDirector; 
	private $IdUsuarioInspector;
	private $laaccion;

	private $listaPermisos;

   
	public function setlaAccion($laaccion) {
		$this->laaccion = $laaccion;
	}

	public function setIdInforme($IdInforme) {
		$this->IdInforme = $IdInforme;
	}
	
	public function setIdTipoInforme($IdTipoInforme) {
		$this->IdTipoInforme = $IdTipoInforme;
	}

	public function setIdEmpresa($IdEmpresa) {
		$this->IdEmpresa = $IdEmpresa;
	}
	
	public function setNumeroInforme($numeroInforme) {
		$this->numeroInforme = $numeroInforme;
	}

	public function setOt($ot) {
		$this->ot = $ot;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	
	public function setFechaEmision($fechaEmision) {
		$this->fechaEmision = $fechaEmision;
	}
	
	public function setFechaVencimiento($fechaVencimiento) {
		$this->fechaVencimiento = $fechaVencimiento;
	}

	public function setIdUsuarioDirector($IdUsuarioDirector) {
		$this->IdUsuarioDirector = $IdUsuarioDirector;
	}
	
	public function setIdUsuarioInspector($IdUsuarioInspector) {
		$this->IdUsuarioInspector = $IdUsuarioInspector;
	}
	

	public function setListaPermisos($listaPermisos){
	    //$this->listaPermisos = substr($listaPermisos,1,strlen($listaPermisos)-1);
		$this->listaPermisos = trim($listaPermisos);
	}
	
	
  public function getMantenedor($accion) {
  

  	switch ( $accion) {
			case "" : //Mostrar la lista de cuentas
				$this->header ();
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->agregar();
				$this->bodyAdministrador ();
				$this->closeForm ();
				$this->volverAtras ();
				$this->footer ();
			break;

			case "1" : // Ver los datos del cuenta
				$this->header ();
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->verCuenta ();
				$this->volverAtras ();
				$this->footer ();
			break;

			case "2" : // Edicion. Formulario de cuenta.
				$this->headerForm ($accion);
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->cargaObjetos ();
				$this->formulario ( $accion );
				$this->closeForm ();
				$this->footer ();
			break;

			case "3" : // Edicion. Formulario de cuenta.
				$this->headerForm ($accion);
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->formulario ( $accion );
				$this->closeForm ();
				$this->footer ();
			break;

			case "4" : // Grabar/Modificar
				$this->InsertUpdate ();
				$this->header ();
				$this->topTitulo ( $accion );
				if($this->error=="")
				   $this->exito();
				$this->openForm ( $accion );
				//$this->verCuenta ();

				if ($this->error != "")
					$this->volverFormulario (); 
				else
					$this->volverAtras ();
				$this->footer ();
			break;
			case "5" :
				$this->Elimina ();
				if ($this->error != "") {
					$this->header ();
					$this->topTitulo ( $accion );
					$this->openForm ( $accion );
					$this->detallaError ();
					$this->volverAtras ();
					$this->closeForm ();
					$this->footer ();
				} else {
					$this->header ();
					$this->topTitulo ( $accion );
					$this->openForm ( $accion );
					$this->agregar();
					$this->bodyAdministrador ();
					$this->closeForm ();
					$this->volverAtras ();
					$this->footer ();

				}
					
			break;

		}

	}

	public function header() {
		echo '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
		   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Backend -'.NombreAplicacion.'</title>
           <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
           <script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
           <script language="JavaScript" src="../js/informes.js" type="text/javascript"></script>

          </head>
          <body class="estilo">
          <div id="container">
           <div id="header"></div>';
		creaEncabezado ();
	}

	public function headerForm($laaccion) {
		echo '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
           <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
           <title>Backend -'.NombreAplicacion.'</title>
           <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
           <script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
           <script language="JavaScript" src="../js/informes.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>

		   <link type="text/css" rel="stylesheet" href="../js/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
		   <SCRIPT type="text/javascript" src="../js/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
	   

           <script language="JavaScript">
           function asignaValidacion()
	    {
	      defineObjetoValidacion("numeroInforme","Numero Informe",TYPE_NUMBER,OBLIGATORIO);
	      defineObjetoValidacion("ot","Orden de trabajo",TYPE_NUMBER,OBLIGATORIO);
          
		  
		  defineObjetoValidacion("cmbTipoInforme","Tipo de Informe",TYPE_COMBO,OBLIGATORIO); 
          defineObjetoValidacion("descripcion","Descripcion del Informe",TYPE_STRING,OBLIGATORIO); 
          
		  defineObjetoValidacion("fechaEmision","Fecha de Emision Informe",TYPE_DATE,OBLIGATORIO); 
          defineObjetoValidacion("fechaVencimiento","Fecha de Vencimiento Informe",TYPE_DATE,OBLIGATORIO);  		
          defineObjetoValidacion("cmbDirector","Usuario Director",TYPE_COMBO,OBLIGATORIO); 
		  defineObjetoValidacion("cmbInspector","Usuario Inspector",TYPE_COMBO,OBLIGATORIO);  
                  						
	    }
           </script>';
		echo '</head>
          <body class="estilo" onload="asignaValidacion()">
          <div id="container">
           <div id="header"></div>';
		creaEncabezado ();
	}

	public function topTitulo($accion) {
		if ($accion == "")
			$st = "Mantenedor de Informes"; elseif ($accion == "3")
			$st = "Agregar Informe "; elseif ($accion == "2")
			$st = "Modificar Informe ";elseif ($accion == "1")
			$st = "Datos del Informe ";
		
		echo '
                <div id="content">
				<div class="pagtitulo">' . $st . '</div>';
		



	}

	public function agregar() {
		echo '<div class="estilo" id="contenedor_item">
      	   <div align="right"><img id="agregar" src="../images/agregar.gif" width="119" height="30" border="0"/></a></div>
   	  </div>';
	}

	public function bodyAdministrador() {
		$this->recolectaRegistros ();

		echo '
     		 <div class="estilo" id="contenedor_item">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
     		       <tr>
     		         <td width="5%" align="center" class="tabla_titubar">N&ordm;</td>

     		         <td width="10%" class="tabla_titubar">N&uacute;mero</td>
     		         <td width="20%" class="tabla_titubar">Tipo de Informe</td>
					 <td width="10%" class="tabla_titubar">Fecha de Creaci&oacute;n</td>
				     <td width="15%" class="tabla_titubar">Fecha de Vencimiento</td>
					 <td width="30%" class="tabla_titubar">Inspector</td>
					
     		         <td width="5%" align="center" class="tabla_titubar">Editar</td>
     		         <td width="5%" align="center" class="tabla_titubar">Borrar</td>
     		       </tr>';

		if (mysqli_num_rows ( $this->arrInformes ) == 0) {
			echo "<tr>" . "\n";
			echo " <td colspan='7' align='center' class='tabla_listado'>No existen Informes en el sistema</td>
                 </tr>
                 </table>";
			return;
		}

		while ( $rowInforme = mysqli_fetch_array ( $this->arrInformes ) ) {
			$x ++;
			echo '          <tr>';
			printf ( '	        <td align="center" class="tabla_listado">%d</td>', $x );
			printf ( '          <td class="tabla_listado">%s</td>', $rowInforme ["numeroInforme"] );
			printf ( '          <td class="tabla_listado">%s</td>', $this->muestraTipoInforme($rowInforme ["IdTipoInforme"]) );
			printf ( '          <td class="tabla_listado">%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaEmision"]) );
			printf ( '          <td class="tabla_listado">%s</td>', muestraFechaDDMMAAAA($rowInforme ["fechaVencimiento"]) );
			
			printf ( '          <td class="tabla_listado">%s</td>', $rowInforme ["nombreInspector"]  );
			

			echo '   <td align="center" class="tabla_listado"><input class="btnEdit" type="image" src="../images/list_modificar.gif" width="16" height="16" border="0" value="' . $rowInforme ["IdInforme"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnElim" type="image" src="../images/list_eliminar.gif"  width="16" height="16" border="0" value="' . $rowInforme ["IdInforme"] . '"/></td>
     		       </tr>';
		}

		echo '  </table>
     		   </div>';

	}


	public function recolectaRegistros() {
		include_once ("class.BDInformes.php");
		$informes = new informes ( );
		$informes->setIdEmpresa($this->IdEmpresa);
		$this->arrInformes = $informes->listaInformes ();
	}


	public function openForm($laaccion) {
		echo '
	    <form method="post">
             <input type="hidden" name="IdInforme" value="' . $this->IdInforme . '">
			 <input type="hidden" name="IdEmpresa" value="' . $this->IdEmpresa . '">
			 
             		
             <input type="hidden" name="accion" value="">
             <input type="hidden" name="laaccion" value="' . $laaccion . '">
             <input type="hidden" name="perm" value="">

           ';
	}

	public function formulario($laaccion) {
		

		echo '
            <div class="estilo" id="contenedor_item">
            <div id="errores"></div>
              <table width="735" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td align="right" class="nombrecampo">N&uacute;mero  : </td>
                  <td colspan="3" align="left"><label>
                    <input name="numeroInforme" type="text" class="txtcampo" maxlength="10" size="10" id="numeroInforme" value="' . $this->numeroInforme . '" />
                  </label></td>
                </tr>
				<tr>
                  <td align="right" class="nombrecampo">Orden de trabajo (OT) : </td>
                  <td colspan="3" align="left"><label>
                    <input name="ot" type="text" class="txtcampo" maxlength="10" size="10" id="ot" value="' . $this->ot . '" />
                  </label></td>
                </tr>
                <tr>
                  <td width="140" align="right" class="nombrecampo">Tipo de informe : </td>
                  <td colspan="3" align="left"><label>
				  ';
				     echo $this->creaComboTipoInforme($this->IdTipoInforme);
            echo ' 
				  </label></td>
                </tr>
                  
                <tr>
                  <td width="140" align="right" class="nombrecampo">Descripci&oacute;n : </td>
                  <td colspan="3" align="left"><label>
                    <input name="descripcion" type="text" class="txtcampo" maxlength="65" size="40" id="descripcion" value="' . $this->descripcion . '" />
                  </label></td>
                </tr>      		
                <tr>
                  <td width="140" align="right" class="nombrecampo">Fecha de emisi&oacute;n : </td>
                  <td colspan="3" align="left"><label>
				  <input type="text" class="txtcampo" value="' . $this->fechaEmision . '"  maxlength="10" size="10" readonly name="fechaEmision" id="fechaEmision"><input type="button" id="btnCal1" value="*">
                  </label></td>
                </tr>  
				<tr>
                  <td align="right" class="nombrecampo">Fecha vencimiento : </td>
                  <td colspan="3" align="left"><label>
				  <input type="text" class="txtcampo" value="' . $this->fechaVencimiento . '"  maxlength="10" size="10" readonly name="fechaVencimiento" id="fechaVencimiento"><input type="button" id="btnCal2" value="*">
                  </label></td>
                </tr>   		 
				<tr>
                  <td width="140" align="right" class="nombrecampo">Director : </td>
                  <td colspan="3" align="left"><label>';

                    
				$this->creaComboTipoFuncionario(consIdUsuarioDirector,$this->IdUsuarioDirector);
				
				echo '  
					</label></td>
                </tr> 
                    		
                <tr>
                  <td width="140" align="right" class="nombrecampo">Inspector : </td>
                  <td colspan="3" align="left"><label>';

				  $this->creaComboTipoFuncionario(consIdUsuarioInspector,$this->IdUsuarioInspector);
                echo '
				  </label></td>
                </tr>    	


				<tr>
                  <td align="right"><span class="nombrecampo">Categor&iacute;as:</span></td>
                  <td colspan="3" align="left">';
        $this->contruyeCategorias();
		echo '
                  </span></td>
                </tr>

				


              </table>
           </div>
				
           <div class="estilo" id="contenedor_item" align="center">
           <table border="0" align="center">
            <tr>
              <td>
              <input id="volverInformes" type="button" class="Boton" name="button2" id="button2" value="Cancelar" />
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="button" name="bntSbm" class="Boton" id="bntSbm" value="Guardar" /></td>
			  <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>';
	
	echo '
			  </tr>
          </table>
        </div>';

	}
	
	
	

	public function InsertUpdate() {

		$connection = Database::Connect ();
		$subquery .= "";
		     
		$subquery .= $this->ChequeaNuloEx ( $this->IdInforme, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->IdTipoInforme, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->IdEmpresa, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->numeroInforme, "S" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->ot, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->descripcion, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( muestraFechaDDMMAAAAconSlash($this->fechaEmision), "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( muestraFechaDDMMAAAAconSlash($this->fechaVencimiento), "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->IdUsuarioDirector, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->IdUsuarioInspector, "N" ) ;
		
					
		try {
			
			$this->query = "call sp_EtereusCMS_insert_ingresaInforme(" . $subquery . ")";
			$result = Database::Reader ( $this->query, $connection );
         
			if (mysqli_errno ($connection) == 1062) // Controla duplicidad de campo clave
				throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

	   if (mysqli_errno ($connection) == 0){
	        //$rowDatosCuenta = mysqli_fetch_object( $result );
	        //$this->IdCuenta = $rowDatosCuenta->UltimoId;

		}


		Database::desconectar ( $connection );

		$this->asignaCategorias();

		return;
	}

	public function Elimina() {

		include_once ("class.BDempresas.php");

		$objEmpresa = new empresas ( );
		$objEmpresa->setIdEmpresa ( $this->IdEmpresa );
		$DatosEmpresa = $objEmpresa->Elimina ();
		return;

	}

	function cargaObjetos() {


		include_once ("class.BDinformes.php");

		$objInformes = new informes ( );
		$objInformes->setIdInforme ( $this->IdInforme );
		$DatosInformes = $objInformes->datosInformePorId ();
		$rowDatosInformes = mysqli_fetch_object ( $DatosInformes );

		$this->IdInforme    		= $rowDatosInformes->IdInforme;
		$this->IdTipoInforme    	= $rowDatosInformes->IdTipoInforme;
		$this->numeroInforme  		= $rowDatosInformes->numeroInforme;
		$this->ot     				= $rowDatosInformes->ot;
		$this->descripcion     		= $rowDatosInformes->descripcion;
		$this->fechaEmision     	= muestraFechaDDMMAAAA($rowDatosInformes->fechaEmision);
		$this->fechaVencimiento     = muestraFechaDDMMAAAA($rowDatosInformes->fechaVencimiento);
		$this->IdUsuarioDirector    = $rowDatosInformes->IdUsuarioDirector;
		$this->IdUsuarioInspector   = $rowDatosInformes->IdUsuarioInspector;
		
		if (mysqli_errno ($connection) != 0) {
			throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );

		}

		
	}

	public function asignaCategorias()
	{
	 $this->EliminaCategorias();

	$subquery = "";

	echo 'Los permisos para el calculo '.$this->listaPermisos;
	
	$cats = preg_split("/,/", $this->listaPermisos);

	foreach($cats as $categoria){

		if(is_numeric($categoria)){
		  $subquery .= "(".$this->IdInforme .','. $categoria .'),';
		}
	}
	$subquery = substr($subquery,0,strlen($subquery)-1);
  
	$connection = Database::Connect ();



	try {
			$this->query = 'INSERT INTO relinformecategoria (IdInforme,IdCategoria) VALUES '. $subquery;

			$result = Database::Reader ( $this->query, $connection );

			if (mysqli_errno ($connection) == 1062) // Controla duplicidad de campo clave
				throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}



	 	Database::desconectar ( $connection );
	 	return;





	}


	public function EliminaCategorias() {

		$connection = Database::Connect ();

		$this->query = "call sp_EtereusCMS_delete_EliminaInformesCategoria('" . $this->IdInforme . "')";

		try {
			Database::NonQuery ( $this->query, $connection );
			if (mysqli_errno ($connection) != 0) // Controla el error al borrar en cascada
				throw new Exception ( 'No es posible redefinir las categorias del informe. Contacte al administrador del sistema. ' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

		Database::desconectar ( $connection );
		return;

	}

	public function contruyeCategorias(){

		$objInformes = new informes ( );
		$objInformes->setIdInforme ( $this->IdInforme );
		$categorias = $objInformes->ObtieneCategoriasPorId ();
		echo "<table border='0'>";
		while ( $rowCategorias = mysqli_fetch_array ( $categorias ) ) {
		  echo '<tr><td><span class="nombrecampo">'.$rowCategorias["Categoria"].'</span></td><td><span class="txt_innerform"><input type="checkbox" name="permisos" id="permisos" value="'.$rowCategorias["IdCategoria"].'" ';
		  if(!empty($rowCategorias["CategoriaAsignada"]))
		     echo ' checked';

	      echo '></td></span></tr>';


	    }
	    echo "</table>";
	}
	
	
}
