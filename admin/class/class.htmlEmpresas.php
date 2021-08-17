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

class Htmlempresas extends classHtml implements funcionalidad {
	/* Datos del formulario */
	private $empresa;
	private $IdEmpresa;
	private $rut;
	private $razonSocial;
	private $actividad;
	private $direccion;
	private $comuna;
	private $contacto;
	private $codigoAct;
	private $estaActivo;
	private $IdAnno;
	private $Anno;
	private $arrEmpresas;
	private $arrAnnosContables;
	private $IdEncCuenta;
	private $IdTipoContab;
    private $email;
	private $password;
	
	
	private $laaccion;

    public function setEmail($email) {
		$this->email = $email;
	}

	public function setlaAccion($laaccion) {
		$this->laaccion = $laaccion;
	}

	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
	}
	
	public function setIdEmpresa($IdEmpresa) {
		$this->IdEmpresa = $IdEmpresa;
	}

	public function setRut($rut) {
		$this->rut = $rut;
	}
	
	public function setRazonSocial($razonSocial) {
		$this->razonSocial = $razonSocial;
	}
	
	public function setActividad($actividad) {
		$this->actividad = $actividad;
	}
	
	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	public function setComuna($comuna) {
		$this->comuna = $comuna;
	}
	
	public function setContacto($contacto) {
		$this->contacto = $contacto;
	}
	
	public function setCodigoAct($codigoAct) {
		$this->codigoAct = $codigoAct;
	}
	
	public function setEstaActivo($activo) {
		$this->estaActivo = $activo;
	}
	
	public function setIdAnno($IdAnno) {
		$this->IdAnno = $IdAnno;
	}
	
	public function setAnno($Anno) {
		$this->Anno = $Anno;
	}
	
	public function setIdEncCuenta($IdEncCuenta) {
	    $this->IdEncCuenta = $IdEncCuenta;
	}
	
	public function setIdTipoContab($IdTipoContab) {
	    $this->IdTipoContab = $IdTipoContab;
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
           <script language="JavaScript" src="../js/empresas.js" type="text/javascript"></script>

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
           <script language="JavaScript" src="../js/empresas.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>
           <script language="JavaScript">
           function asignaValidacion()
	    {
	      defineObjetoValidacion("rut","Rut de la Empresa",TYPE_RUT,OBLIGATORIO);
	      defineObjetoValidacion("empresa","Empresa",TYPE_STRING,OBLIGATORIO);
          defineObjetoValidacion("razonSocial","Razon Social",TYPE_STRING,OPCIONAL); 
          defineObjetoValidacion("codigoAct","Código actividad económica",TYPE_STRING,OPCIONAL); 
          defineObjetoValidacion("actividad","Descripción de actividad económica",TYPE_STRING,OBLIGATORIO); 
          defineObjetoValidacion("contacto","Datos de contacto",TYPE_STRING,OPCIONAL);  		
          defineObjetoValidacion("direccion","Dirección de empresa",TYPE_STRING,OPCIONAL);  
		  defineObjetoValidacion("email","Dirección de correo electronico",TYPE_STRING,OBLIGATORIO);  
                    						
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
			$st = "Mantenedor de Clientes"; elseif ($accion == "3")
			$st = "Agregar Cliente "; elseif ($accion == "2")
			$st = "Modificar Cliente ";elseif ($accion == "1")
			$st = "Datos del Cliente ";
		
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
     		         <td width="10%" class="tabla_titubar">rut</td>
     		         <td width="20%" class="tabla_titubar">Cliente</td>
				     <td width="25%" class="tabla_titubar">Raz&oacute;n Social</td>
					 <td width="10%" class="tabla_titubar">Actividad</td>
					
     		         <td width="5%" align="center" class="tabla_titubar">Cert.</td>
     		         <td width="5%" align="center" class="tabla_titubar">Editar</td>
     		       </tr>';

		if (mysqli_num_rows ( $this->arrEmpresas ) == 0) {
			echo "<tr>" . "\n";
			echo " <td colspan='7' align='center' class='tabla_listado'>No existen empresas en el sistema</td>
                 </tr>
                 </table>";
			return;
		}

		while ( $rowEmpresa = mysqli_fetch_array ( $this->arrEmpresas ) ) {
			$x ++;
			echo '          <tr>';
			printf ( '	        <td align="center" class="tabla_listado">%d</td>', $x );
			printf ( '          <td class="tabla_listado">%s</td>', $rowEmpresa ["rut"] );
			printf ( '          <td class="tabla_listado">%s</td>', $rowEmpresa ["empresa"] );
			printf ( '          <td class="tabla_listado">%s</td>', $rowEmpresa ["razonSocial"] );
			printf ( '          <td class="tabla_listado">%s</td>', $rowEmpresa ["actividad"] );
			
			

			echo '   <td align="center" class="tabla_listado"><input class="btnVer" type="image" src="../images/lupa.gif" width="16" height="17" border="0" value="' . $rowEmpresa ["IdEmpresa"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnEdit" type="image" src="../images/list_modificar.gif" width="16" height="16" border="0" value="' . $rowEmpresa ["IdEmpresa"] . '"/></td>
     		       </tr>';
		}

		echo '  </table>
     		   </div>';

	}


	public function recolectaRegistros() {
		include_once ("class.BDempresas.php");
		$empresas = new empresas ( );
		$this->arrEmpresas = $empresas->listaEmpresas ();
	}


	public function openForm($laaccion) {
		echo '
	    <form method="post">
             <input type="hidden" name="IdEmpresa" value="' . $this->IdEmpresa . '">
             <input type="hidden" name="IdAnno" value="' . $this->IdAnno . '">
             		
             <input type="hidden" name="accion" value="">
             <input type="hidden" name="laaccion" value="' . $laaccion . '">
             <input type="hidden" name="perm" value="">
			 <input name="codigoAct" type="hidden" id="codigoActividad" value="" />
			 <input name="estaActivo" type="hidden" id="estaActivo" value="" />

           ';
	}

	public function formulario($laaccion) {
		

		echo '
            <div class="estilo" id="contenedor_item">
            <div id="errores"></div>
              <table width="735" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td align="right" class="nombrecampo">Rut  : </td>
                  <td colspan="3" align="left"><label>
                    <input name="rut" type="text" class="txtcampo" maxlength="10" size="15" id="rut" value="' . $this->rut . '" />
                  </label></td>
                </tr>
				<tr>
                  <td align="right" class="nombrecampo">Cliente : </td>
                  <td colspan="3" align="left"><label>
                    <input name="empresa" type="text" class="txtcampo" maxlength="45" size="50" id="empresa" value="' . $this->empresa . '" />
                  </label></td>
                </tr>
                <tr>
                  <td width="140" align="right" class="nombrecampo">Raz&oacute;n Social : </td>
                  <td colspan="3" align="left"><label>
                    <input name="razonSocial" type="text" class="txtcampo" maxlength="100" size="60" id="razonSocial" value="' . $this->razonSocial . '" />
                  </label></td>
                </tr>
                  
                <tr>
                  <td width="140" align="right" class="nombrecampo">Actividad : </td>
                  <td colspan="3" align="left"><label>
                    <input name="actividad" type="text" class="txtcampo" maxlength="65" size="40" id="actividad" value="' . $this->actividad . '" />
                  </label></td>
                </tr>      		
                <tr>
                  <td width="140" align="right" class="nombrecampo">Contacto : </td>
                  <td colspan="3" align="left"><label>
                    <input name="contacto" type="text" class="txtcampo" maxlength="45" size="50" id="contacto" value="' . $this->contacto . '" />
                  </label></td>
                </tr>  
				<tr>
                  <td align="right" class="nombrecampo">E-mail : </td>
                  <td colspan="3" align="left"><label>
                    <input name="email" type="text" class="txtcampo" maxlength="100" size="60" id="email" value="' . $this->email . '" />
                  </label></td>
                </tr>   		 
				<tr>
                  <td width="140" align="right" class="nombrecampo">Direcci&oacute;n : </td>
                  <td colspan="3" align="left"><label>
                    <input name="direccion" type="text" class="txtcampo" maxlength="65" size="50" id="direccion" value="' . $this->direccion . '" />
                  </label></td>
                </tr> 
                    		
                <tr>
                  <td width="140" align="right" class="nombrecampo">Comuna : </td>
                  <td colspan="3" align="left"><label>
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
			  <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>';
	echo '
			  </tr>
          </table>
        </div>';

	}
	
	
	

	public function InsertUpdate() {

		$this->generaNuevaPassword();
		
		$connection = Database::Connect ();
		$subquery .= "";
		    
		$subquery .= $this->ChequeaNuloEx ( $this->IdEmpresa, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->empresa, "N" ) . ',';
		$subquery .= $this->ChequeaNuloEx ( $this->razonSocial, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->codigoAct, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->actividad, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->rut, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->direccion, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->comuna, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->contacto, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->estaActivo, "S" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->email, "N" ) . ",";
		$subquery .= $this->ChequeaNuloEx ( $this->password, "N" ) ;

		
					
		try {
			
			$this->query = "call sp_ContableJEE_insert_ingresaEmpresa(" . $subquery . ")";
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
		
		if($this->IdEmpresa == ""){
		   $this->enviaMail();	    
		}
		return;
	}


	function generaNuevaPassword(){

		$this->password = generate_string(PERMITTED_CHARS, 10);					
		return;

	}



	function enviaMail(){
		
		include_once ("class.Mail.php");
		$objMail = new enviarMail(SENDPASSWORDMAIL);
		$objMail->setToMail($this->email);
		$objMail->setAdditionalText('Su nueva password es '.$this->password);
        $objMail->setBodyMail();
		$objMail->sendEmail();


	}


	 public function Elimina() {

		include_once ("class.BDempresas.php");

		$objEmpresa = new empresas ( );
		$objEmpresa->setIdEmpresa ( $this->IdEmpresa );
		$DatosEmpresa = $objEmpresa->Elimina ();
		return;

	}

	function cargaObjetos() {


		include_once ("class.BDempresas.php");

		$objEmpresa = new empresas ( );
		$objEmpresa->setIdEmpresa ( $this->IdEmpresa );
		$DatosEmpresa = $objEmpresa->datosEmpresaPorId ();
		$rowDatosEmpresa = mysqli_fetch_object ( $DatosEmpresa );

		$this->IdEmpresa    	= $rowDatosEmpresa->IdEmpresa;
		$this->empresa       	= $rowDatosEmpresa->empresa;
		$this->rut				= $rowDatosEmpresa->rut;
		$this->razonSocial  	= $rowDatosEmpresa->razonSocial;
		$this->codigoAct     	= $rowDatosEmpresa->codigoActividad;
		$this->actividad     	= $rowDatosEmpresa->actividad;
		$this->contacto     	= $rowDatosEmpresa->contacto;
		$this->direccion     	= $rowDatosEmpresa->direccion;
		$this->comuna     		= $rowDatosEmpresa->comuna;
		$this->estaActivo     	= $rowDatosEmpresa->estaActivo;
		$this->email            = $rowDatosEmpresa->email;
		
		if (mysqli_errno ($connection) != 0) {
			throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );

		}

		
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
	
	
  
	
	
		
	 
  	 
	
	

	
}
