<?php

include_once ('../class/class.html.php');
include_once ('IntF.dos.php');
/*------------------------------------------------------
 archivo de clase: class.htmlCuentas.php
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

class Htmlpersonas extends classHtml  {
	/* Datos del formulario */


	private $accion;
	private $arrPersonas;
	private $modificador;
	private $IdPersona;
	private $IdTipoPersona;
	private $rut;
	private $elRut;	
	private $nombre;
	private $paterno;
	private $materno;
	private $email;
	private $telefono1;
	private $telefono2;
	private $direccion;
	private $comuna;
	 
	
	
	
	private $laaccion;

	public function setlaAccion($laaccion) {
		$this->laaccion = $laaccion;
	}

	public function setIdPersona($IdPersona) {
		$this->IdPersona = $IdPersona;
	}
	
	
	public function setIdTipoPersona($IdTipoPersona) {
		$this->IdTipoPersona = $IdTipoPersona;
	}
	
	public function setRut($rut) {
		$this->rut = $rut;
	}
	
	public function setElRut($elRut) {
		$this->elRut = $elRut;
	}
	
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	
	public function setPaterno($paterno) {
		$this->paterno = $paterno;
	}
	
	public function setMaterno($materno) {
		$this->materno = $materno;
	}
	
	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}
	
	public function setComuna($comuna) {
		$this->comuna = $comuna;
	}
	
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function setFono1($telefono1) {
		$this->telefono1 = $telefono1;
	}
	
	public function setFono2($telefono2) {
		$this->telefono2 = $telefono2;
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
				$this->volverPanel ();
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
					$this->volverPanel ();
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
           <script language="JavaScript" src="../js/personas.js" type="text/javascript"></script>

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
           <script language="JavaScript" src="../js/personas.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>
           <script language="JavaScript">
           function asignaValidacion()
	    {
	      
          defineObjetoValidacion("cmbTipoPersona","Tipo de persona",TYPE_COMBO,OBLIGATORIO);
          defineObjetoValidacion("rut","Rut",TYPE_RUT,OBLIGATORIO);
          defineObjetoValidacion("nombres","Nombre/Raz\u00F3n social",TYPE_STRING,OBLIGATORIO);
          defineObjetoValidacion("apellido_pat","Apellido paterno",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("apellido_mat","Apellido materno",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("email","Email",TYPE_EMAIL,OPCIONAL);
          defineObjetoValidacion("fono1","Tel\u00E9fono 1",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("fono2","Tel\u00E9fono 2",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("direccion","Direcci\u00F3n",TYPE_STRING,OBLIGATORIO);
          defineObjetoValidacion("comuna","Comuna",TYPE_STRING,OBLIGATORIO); 		 		 		 		 		 		 		
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
			$st = "Mantenedor de Clientes/Proveedores"; elseif ($accion == "3")
			$st = "Agregar Clientes/Proveedores "; elseif ($accion == "2")
			$st = "Modificar Clientes/Proveedores ";elseif ($accion == "1")
			$st = "Datos de Clientes/Proveedores ";

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
     		         <td width="15%" class="tabla_titubar">Rut</td>
     		         <td width="40%" class="tabla_titubar">Nombre/Razon Social</td>
				     <td width="20%" class="tabla_titubar">Direccion</td>
				     <td width="20%" class="tabla_titubar">Comuna</td>
     		         <td width="10%" align="center" class="tabla_titubar">Ver</td>
     		         <td width="10%" align="center" class="tabla_titubar">Editar</td>
     		         <td width="15%" align="center" class="tabla_titubar">Borrar</td>
     		       </tr>';

		if (mysqli_num_rows ( $this->arrPersonas ) == 0) {
			echo "<tr>" . "\n";
			echo " <td colspan='7' align='center' class='tabla_listado'>No existen Clientes/Proveedores en el sistema</td>
                 </tr>
                 </table></div>";
			return;
		}

		while ( $rowPersona = mysqli_fetch_array ( $this->arrPersonas ) ) {
			$x ++;
			echo '          <tr>';
			printf ( '	        <td align="center" class="tabla_listado">%d</td>', $x );
			printf ( '          <td class="tabla_listado">%s</td>', $rowPersona ["rut"] );
			printf ( '          <td class="tabla_listado">%s</td>', $rowPersona ["paterno"].' '.$rowPersona['materno']. ' '.$rowPersona["nombre"] );
			printf ( ' 			<td class="tabla_listado">%s</td>', $rowPersona ["direccion"] );
			printf ( ' 			<td class="tabla_listado">%s</td>', $rowPersona ["comuna"] );
			echo '   <td align="center" class="tabla_listado"><input class="btnVer" type="image" src="../images/lupa.gif" width="16" height="17" border="0" value="' . $rowPersona ["rut"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnEdit" type="image" src="../images/list_modificar.gif" width="16" height="16" border="0" value="' . $rowPersona ["rut"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnElim" type="image" src="../images/list_eliminar.gif"  width="16" height="16" border="0" value="' . $rowPersona ["rut"] . '"/></td>
     		       </tr>';
		}

		echo '           </table>
     		   </div>';

	}


	public function recolectaRegistros() {
		include_once ("class.BDpersonas.php");
		$personas = new personas ( );
		$this->arrPersonas = $personas->listaPersonas ();
	}

	

	public function openForm($laaccion) {
		echo '
	    <form method="post">
             <input type="hidden" name="elRut" value="' . $this->rut . '">
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
                  <td align="right" class="nombrecampo">Tipo : </td>
                  <td colspan="3" align="left"><label>';
                      echo $this->creaComboTipoPersona($this->IdTipoPersona) ;
                echo  '
                  </label></td>
                </tr>
				
				<tr>
                  <td align="right" class="nombrecampo">Rut : </td>
                  <td colspan="3" align="left"><label>
                    <input name="rut" type="text" class="txtcampo" maxlength="10" size="15" id="rut" value="' . $this->rut . '" />
                  </label></td>
                </tr>
                <tr>
                  <td width="140" align="right" class="nombrecampo">Nombres/Razon social : </td>
                  <td colspan="3" align="left"><label>
                    <input name="nombres" type="text" class="txtcampo" maxlength="80" size="32" id="nombres" value="' . $this->nombre . '" />
                  </label></td>
                </tr>
                <tr>
                  <td align="right" class="nombrecampo">Apellido Paterno : </td>
                  <td colspan="3" align="left"><input name="apellido_pat" type="text" class="txtcampo" maxlength="40" size="32" id="apellido_pat" value="' . $this->paterno . '" /></td>
                </tr>
                <tr>
                  <td align="right" class="nombrecampo">Apellido Materno : </td>
                  <td colspan="3" align="left"><input name="apellido_mat" type="text" class="txtcampo" maxlength="40" size="32" id="apellido_mat" value="' . $this->materno . '" /></td>
                </tr>
               <tr>
                  <td align="right"><span class="nombrecampo">Correo Electr&oacute;nico :</span></td>
                  <td colspan="3" align="left"><input name="email" type="text" class="txtcampo" maxlength="40" size="32" id="email" value="' . $this->email . '" /></td>
                </tr>
                <tr>
                  <td align="right" class="nombrecampo">Tel&eacute;fono 1:</td>
                  <td colspan="3" align="left"><label><span class="txt_innerform">
                    <input name="fono1" type="text" class="txtcampo" maxlength="12" size="12" id="fono1" value="' . $this->telefono1 . '"/>
                  </span></label></td>
                </tr>
                <tr>
                  <td align="right"><span class="nombrecampo">Tel&eacute;fono 2:</span></td>
                  <td colspan="3" align="left"><span class="txt_innerform">
                    <input name="fono2" type="text" class="txtcampo" maxlength="12" size="12" id="fono2" value="' . $this->telefono2 . '" />
                  </span></td>
                </tr>   		
                 <tr>
                  <td width="140" align="right" class="nombrecampo">Direcci&oacute;n : </td>
                  <td colspan="3" align="left"><label>
                    <input name="direccion" type="text" class="txtcampo" maxlength="65" size="50" id="direccion" value="' . $this->direccion . '" />
                  </label></td>
                </tr> 
                    		
                <tr>
                  <td width="140" align="right" class="nombrecampo">Comuna : </td>
                  <td colspan="3s" align="left"><label>
                    <input name="comuna" type="text" class="txtcampo" maxlength="30" size="32" id="comuna" value="' . $this->comuna . '" />
                  </label></td>
                </tr>    		 		
 


              </table>
           </div>
           <div class="estilo" id="contenedor_item" align="center">
           <table border="0" align="center">
            <tr>
              <td>
              <input id="volverAtras" type="button" class="Boton" name="button2" id="button2" value="Cancelar" />
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="button" name="bntSbm" class="Boton" id="bntSbm" value="Guardar" /></td>
            </tr>
          </table>
        </div>';

	}

	public function InsertUpdate() {

		$connection = Database::Connect ();
		$subquery .= "";
        
		$subquery .= $this->ChequeaNuloEx ( $this->IdPersona, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->IdTipoPersona, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->nombre, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->paterno, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->materno, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->rut, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->email, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->telefono1, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->telefono2, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->direccion, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->comuna, "N" ) ;
		
		
					
		try {
			
			$this->query = "call sp_EtereusCMS_insert_ingresaPersona(" . $subquery . ")";
			$result = Database::Reader ( $this->query, $connection );
         
			if (mysqli_errno ($connection) == 1062) // Controla duplicidad de campo clave
				throw new Exception ( 'No fue posible la creaci&oacute;n. ' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

	   if (mysqli_errno ($connection) == 0){
	        $rowDatosPersona = mysqli_fetch_object( $result );
			$this->IdPersona = $rowDatosPersona->UltimoId;
		}

		Database::desconectar ( $connection );

		return;
	}

	public function Elimina() {

		include_once ("class.BDpersonas.php");

		$objPersona = new personas();
		$objPersona->setRut( $this->elRut );
		$DatosPersona = $objPersona->Elimina ();
		return;

	}

	function cargaObjetos() {


		include_once ("class.BDpersonas.php");

		$objPersona = new personas();
		$objPersona->setRut($this->elRut);
		$DatosPersona = $objPersona->datosPersonaPorRut ();
		$rowDatosPersona = mysqli_fetch_object ( $DatosPersona );
		
		$this->IdPersona 		= $rowDatosPersona->IdPersona;
		$this->IdTipoPersona 	= $rowDatosPersona->IdTipoPersona;
		$this->nombre 			= $rowDatosPersona->nombre;
		$this->paterno 			= $rowDatosPersona->paterno;
		$this->materno 			= $rowDatosPersona->materno;
		$this->rut 				= $rowDatosPersona->rut;
		$this->email			= $rowDatosPersona->email;
		$this->telefono1		= $rowDatosPersona->telefono1;
		$this->telefono2		= $rowDatosPersona->telefono2;
		$this->direccion		= $rowDatosPersona->direccion;
		$this->comuna			= $rowDatosPersona->comuna;
				
	}

	public function openFormRecuperacion() {
		echo '
	    <form method="get">
             <input type="hidden" name="name_sesion" value="">
             <input type="hidden" name="nombres" value="' . $this->nombre . '">
             <input type="hidden" name="apellido_pat" value="' . $this->paterno . '">
             <input type="hidden" name="apellido_mat" value="' . $this->materno . '">
             <input type="hidden" name="email" value="' . $this->email . '">
             <input type="hidden" name="fono1" value="' . $this->telefono1 . '">
             <input type="hidden" name="fono2" value="' . $this->telefono2 . '">
        ';

	}
	
	public function verCuenta() {
	
		if ($this->error != "") {
			$this->openFormRecuperacion ();
			$this->detallaError ();
			$this->closeForm ();
			return;
		}
	
		include_once ("class.BDpersonas.php");
		$objPersonas = new personas ( );
		$objPersonas->setRut( $this->elRut );
		$DatosPersona = $objPersonas->datosPersonaPorRut();
	
		$rowDatosPersonas = mysqli_fetch_object ( $DatosPersona );
		
		
		
		
		echo '
	   <div class="estilo" id="contenedor_item">
            <table width="740" border="0" cellspacing="6" cellpadding="6">
            	<tr>
              	 	<td valign="top" class="td_border">
				     <span class="view_details_labels">
				            Tipo             : ' . $rowDatosPersonas->tipoPersona . '<br />
				            Rut              : ' . $rowDatosPersonas->rut . '<br />
				            Nombre/R.Social  : ' . $rowDatosPersonas->paterno.' '.$rowDatosPersonas->materno. ' '.$rowDatosPersonas->nombre . '<br />
				     		Dirección        : ' . $rowDatosPersonas->direccion . '<br />
				     		Comuna           : ' . $rowDatosPersonas->comuna . '<br />
                 	        
		
		
				     				<br /></span></td>
		
			    </td>
            	</tr>
            </table>
       </div>';
		
		mysqli_free_result($DatosPersona);
	
	
	}
	
	public function obtieneDatosPersona($rut){
		include_once ("class.BDpersonas.php");
		$objPersonas = new personas ( );
		$objPersonas->setRut( $rut);
		$arrDatosPersonas = $objPersonas->datosPersonaPorRut();		
		
		$partidaArray = array();
		while ( $row = mysqli_fetch_array ( $arrDatosPersonas ) ) {
			$partidaArray[] = $row;
		}
		
		
		mysqli_free_result($DatosPersona);
		
		return json_encode($partidaArray);
		
		
		
	}
	

	
}
