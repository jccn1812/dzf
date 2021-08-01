<?php

include_once ('../class/class.html.php');
include_once ('IntF.dos.php');
/*------------------------------------------------------
 archivo de clase: class.htmlUsuarios.php
 -----------------
 Descripción: Implementa la clase HTML para los usuarios
 Clase de la que hereda : classHtml
 Interface  : funcionalidad
 Aplicación : Electoral.cl
               - Módulo de administración -
 Autor : Juan Carlos Campos N.
 Fecha : 31 de enero de 2009
*/

class Htmlusuarios extends classHtml implements funcionalidad {
	protected $tipoUsuario;
	private $UserName;
	private $arrUsuarios;
	private $result;

	/* Datos del formulario */
	private $nombre;
	private $paterno;
	private $materno;
	private $clave;
	private $direccion;
	private $email;
	private $telefono1;
	private $telefono2;
	private $institucion;
	private $servicio;
	private $laaccion;
	private $IdUsuario;
	private $estaactivo;
	private $listaPermisos;
	private $profesion;

	public function setlaAccion($laaccion) {
		$this->laaccion = $laaccion;
	}


	public function setUserName($username) {
		$this->UserName = $username;
	}

	public function setIdUsuario($IdUsuario) {
		$this->IdUsuario = $IdUsuario;
	}


	public function setNombre($elnombre) {
		$this->nombre = $elnombre;
	}

	public function setPaterno($elpaterno) {
		$this->paterno = $elpaterno;
	}

	public function setMaterno($elmaterno) {
		$this->materno = $elmaterno;
	}

	public function setClave($laclave) {
		$this->clave = $laclave;
	}



	public function setEmail($elemail) {
		$this->email = $elemail;
	}

	public function setFono1($eltelefono1) {
		$this->telefono1 = $eltelefono1;
	}

	public function setFono2($eltelefono2) {
		$this->telefono2 = $eltelefono2;
	}

	public function setEstaActivo($estaactivo) {
		$this->estaactivo = $estaactivo;
	}

	public function setListaPermisos($listaPermisos){
	    $this->listaPermisos = $listaPermisos;
	}

	public function setProfesion($profesion){
	    $this->profesion = $profesion;
	}

  public function getMantenedor($accion) {
  

  	
  	switch ( $accion) {
			case "" : //Mostrar la lista de usuarios
				$this->header ();
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->agregarUser ();
				$this->bodyAdministrador ();
				$this->closeForm ();
				$this->volverPanel ();
				$this->footer ();
			break;

			case "1" : // Ver los datos del usuario
				$this->header ();
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->verUsuario ();
				$this->volverAtras ();
				$this->footer ();
			break;

			case "2" : // Edicion. Formulario de usuarios.
				$this->headerForm ($accion);
				$this->topTitulo ( $accion );
				$this->openForm ( $accion );
				$this->cargaObjetos ();
				$this->formulario ( $accion );
				$this->closeForm ();
				$this->footer ();
			break;

			case "3" : // Inserción. Formulario de usuarios.
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
				$this->verUsuario ();

				if ($this->error != "")
					$this->volverFormulario (); else
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
					$this->agregarUser ();
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
           <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
           <title>Backend -'.NombreAplicacion.'</title>
           <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
           <script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
           <script language="JavaScript" src="../js/usuarios.js" type="text/javascript"></script>

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
           <script language="JavaScript" src="../js/usuarios.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>
           <script language="JavaScript">
           function asignaValidacion()
	    {
	      defineObjetoValidacion("name_sesion","E-mail",TYPE_EMAIL,OBLIGATORIO);
	      defineObjetoValidacion("nombres","Nombre del usuario",TYPE_STRING,OBLIGATORIO);
	      defineObjetoValidacion("apellido_pat","Apellido paterno",TYPE_STRING,OBLIGATORIO);
	      defineObjetoValidacion("apellido_mat","Apellido materno",TYPE_STRING,OBLIGATORIO);
		  defineObjetoValidacion("profesion","Profesion",TYPE_STRING,OBLIGATORIO);';

	   if($laaccion=="2"){
		  	echo '
		  		defineObjetoValidacion("pass1","Password",TYPE_STRING,OPCIONAL);
	      		defineObjetoValidacion("pass_confirm","Confirmaci\u00F3n de la Password",TYPE_STRING,OPCIONAL);';
		 }
		 elseif ($laaccion=="3") {
		 	   	 echo '
		       		 defineObjetoValidacion("pass1","Password",TYPE_STRING,OBLIGATORIO);
	           		 defineObjetoValidacion("pass_confirm","Confirmaci\u00F3n de la Password",TYPE_STRING,OBLIGATORIO);';
		 }


	    echo '	     
	      defineObjetoValidacion("fono1","Tel\u00E9fono del Usuario",TYPE_STRING,OBLIGATORIO);
	      defineObjetoValidacion("fono2","Tel\u00E9fono 2 del Usuario",TYPE_STRING,OPCIONAL);';


		echo '
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
			$st = "Mantenedor de usuarios"; elseif ($accion == "3")
			$st = "Agregar Usuario "; elseif ($accion == "2")
			$st = "Modificar Usuario ";elseif ($accion == "1")
			$st = "Datos del usuario ";

		echo '
                <div id="content">
                <div class="pagtitulo">' . $st . '</div>';



	}

	public function agregarUser() {
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
     		         <td  align="center" class="tabla_titubar">N&ordm;</td>
     		         <td width="15%" class="tabla_titubar">E-mail</td>
     		         <td width="40%" class="tabla_titubar">Usuario</td>
     		         <td width="10%" align="center" class="tabla_titubar">Activo</td>
     		         <td width="10%" align="center" class="tabla_titubar">Ver</td>
     		         <td width="10%" align="center" class="tabla_titubar">Editar</td>
     		         <td width="10%" align="center" class="tabla_titubar">Borrar</td>
     		       </tr>';

		if (mysqli_num_rows ( $this->arrUsuarios ) == 0) {
			echo "<tr>" . "\n";
			echo " <td colspan='7' align='center' class='tabla_listado'>No existen usuarios registrados</td>
                 </tr>
                 </table>";
			return;
		}

		while ( $rowUser = mysqli_fetch_array ( $this->arrUsuarios ) ) {
			$x ++;
			echo '          <tr>';
			printf ( '	         <td align="center" class="tabla_listado">%d</td>', $x );
			printf ( '          <td class="tabla_listado">%s</td>', $rowUser ["UserName"] );
			printf ( '          <td class="tabla_listado">%s</td>', $rowUser ["Paterno"].' '.$rowUser ["Materno"].' '.$rowUser ["Nombre"] );
		    printf ( '          <td class="tabla_listado" align="center">%s</td>', CompruebaNuloValor($rowUser ["EstaActivo"]) );


			echo '   <td align="center" class="tabla_listado"><input class="btnVer" type="image" src="../images/lupa.gif" width="16" height="17" border="0" value="' . $rowUser ["IdUsuario"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnEdit" type="image" src="../images/list_modificar.gif" width="16" height="16" border="0" value="' . $rowUser ["IdUsuario"] . '"/></td>
     		         <td align="center" class="tabla_listado"><input class="btnElim" type="image" src="../images/list_eliminar.gif"  width="16" height="16" border="0" value="' . $rowUser ["IdUsuario"] . '"/></td>
     		       </tr>';
		}

		echo '           </table>
     		   </div>';

	}


	public function recolectaRegistros() {
		include_once ("class.BDusuarios.php");
		$usuarios = new usuarios ( );
		$this->arrUsuarios = $usuarios->listaUsuarios();
	}

	public function verUsuario() {

		if ($this->error != "") {
			$this->openFormRecuperacion ();
			$this->detallaError ();
			$this->closeForm ();
			return;
		}

		include_once ("class.BDusuarios.php");
		$objUsuarios = new usuarios ( );
		$objUsuarios->setUsuarioId ( $this->IdUsuario );
		$DatosLogin = $objUsuarios->datosUsuariosPorId();

		$rowDatosLogin = mysqli_fetch_object ( $DatosLogin );

		echo '
	   <div class="estilo" id="contenedor_item">
            <table width="740" border="0" cellspacing="6" cellpadding="6">
            	<tr>
              	 	<td valign="top" class="td_border"><span class="view_details_labels">E-mail : </span>' . $rowDatosLogin->UserName . '<br />
                 	<span class="view_details_labels">Nombres : </span>' . $rowDatosLogin->Nombre . '<br />
                 	<span class="view_details_labels">Apellido Paterno : </span>' . $rowDatosLogin->Paterno . '<br />
                 	<span class="view_details_labels">Apellido Materno : </span>' . $rowDatosLogin->Materno . '</td>';

		echo '  </tr>
		          <td valign="top" class="td_border">                 	
                 	<span class="view_details_labels">Tel&eacute;fono 1 : </span>' . $rowDatosLogin->Fono1 . '<br />
                 	<span class="view_details_labels">Tel&eacute;fono 2 : </span>' . $rowDatosLogin->Fono2 . '<br />
                 	<span class="view_details_labels">Esta activo       : </span> ';
        if($rowDatosLogin->EstaActivo=="1")
           	echo  'SI<br />';
        else
            echo  'NO<br />';

        echo '    </td>
            	</tr>
            </table>
       </div>';

		mysqli_free_result($DatosLogin);


	}

	public function openForm($laaccion) {
		echo '
	    <form method="post">
             <input type="hidden" name="IdUsuario" value="' . $this->IdUsuario . '">
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
                  <td align="right" class="nombrecampo">E-mail : </td>
                  <td colspan="3" align="left"><label>
                    <input name="name_sesion" type="text" class="txtcampo" maxlength="100" size="50" id="name_sesion" value="' . $this->UserName . '" />
                  </label></td>
                </tr>
                <tr>
                  <td width="140" align="right" class="nombrecampo">Nombres : </td>
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
				<td align="right" class="nombrecampo">Profesi&oacute;n : </td>
				<td colspan="3" align="left"><input name="profesion" type="text" class="txtcampo" maxlength="40" size="32" id="profesion" value="' . $this->profesion . '" /></td>
			  </tr>
                <tr>
                  <td align="right" class="nombrecampo">Contrase&ntilde;a : </td>
                  <td width="100" align="left"><input name="pass1" type="password" class="txtcampo" size="12" maxlength="10" id="pass1" /></td>
                  <td width="161" align="right" class="nombrecampo">Reingrese Contrase&ntilde;a :</td>
                  <td width="308" align="left"><input name="pass_confirm" type="password" class="txtcampo" size="12" maxlength="10" id="pass_confirm" /></td>
                </tr>';



		echo '

               <!-- <tr>
                  <td align="right"><span class="nombrecampo">Correo Electr&oacute;nico :</span></td>
                  <td colspan="3" align="left"><input name="email" type="text" class="txtcampo" maxlength="40" size="32" id="email" value="' . $this->email . '" /></td>
                </tr>-->
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
                  <td align="right"><span class="nombrecampo">Perfil de usuario:</span></td>
                  <td colspan="3" align="left">';
        $this->contruyePermisos();
		echo '
                  </span></td>
                </tr>
                <tr>
                  <td align="right"><span class="nombrecampo">Esta activo</span></td>
                  <td colspan="3" align="left"><span class="txt_innerform">
                    <input name="estaactivo" type="checkbox" class="txtcampo" maxlength="12" size="12" id="estaactivo" value="1"';
                    if($this->estaactivo=="1")
                      echo "checked";
		echo ' />
                  </td>
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
        
		$subquery .= $this->ChequeaNulo ( $this->IdUsuario, "N" ) . ',';
		$subquery .= $this->ChequeaNulo ( $this->UserName, "N" ) . ',';
		$subquery .= $this->ChequeaNulo ( $this->clave, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->nombre, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->paterno, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->materno, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->UserName, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->telefono1, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->telefono2, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->listaPermisos, "N" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->estaactivo, "S" ) . ",";
		$subquery .= $this->ChequeaNulo ( $this->profesion, "N" );

		echo $subquery;

		try {
			
			$this->query = "call sp_EtereusCMS_insert_IngresaUsuario(" . $subquery . ")";
			
			$result = Database::Reader ( $this->query, $connection );

			if (mysqli_errno ($connection) == 1062) // Controla duplicidad de campo clave
				throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

		if (mysqli_errno ($connection) == 0){
	        $rowDatosUsuario = mysqli_fetch_object( $result );
			$this->IdUsuario = $rowDatosUsuario->UltimoId;

		}


		Database::desconectar ( $connection );

		$this->asignaPermisos();

		return;
	}

	public function asignaPermisos()
	{
	 $this->EliminaPermisos();

	$subquery = "";

	 for($x=0;$x<strlen($this->listaPermisos);$x++)
	 {
	   if(substr($this->listaPermisos,$x,1)!=",")
	    $subquery .= "(".$this->IdUsuario.','.substr($this->listaPermisos,$x,1).'),';
	 }

	 $subquery = substr($subquery,0,strlen($subquery)-1);

	 $connection = Database::Connect ();



	try {
			$this->query = 'INSERT INTO relperfilusuario (IdUsuario,IdPerfil) VALUES '. $subquery;

			$result = Database::Reader ( $this->query, $connection );

			if (mysqli_errno ($connection) == 1062) // Controla duplicidad de campo clave
				throw new Exception ( 'No fue posible la creaci&oacute;n. El nombre de inicio de sesi&oacute;n debe ser &uacute;nico y ya existe para otro usuario.' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}



	 	Database::desconectar ( $connection );
	 	return;





	}

	public function EliminaPermisos() {

		$connection = Database::Connect ();

		$this->query = "call sp_EtereusCMS_delete_EliminaPerfilesUsuario('" . $this->IdUsuario . "')";

		try {
			Database::NonQuery ( $this->query, $connection );
			if (mysqli_errno ($connection) != 0) // Controla el error al borrar en cascada
				throw new Exception ( 'No es posible redefinir los perfiles de usuario. Contacte al administrador del sistema. ' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

		Database::desconectar ( $connection );
		return;

	}




	public function Elimina() {

		$connection = Database::Connect ();

		$this->query = "call sp_EtereusCMS_delete_eliminaUsuarioPorId('" . $this->IdUsuario . "')";

		try {
			Database::NonQuery ( $this->query, $connection );
			if (mysqli_errno ($connection) != 0) // Controla el error al borrar en cascada
				throw new Exception ( 'No es posible eliminar el usuario indicado. Tiene datos relacionados.' );
		} catch ( Exception $e ) {
			$this->error = $e->getMessage ();
		}

		Database::desconectar ( $connection );
		return;

	}

	function cargaObjetos() {


		include_once ("class.BDusuarios.php");

		$objUsuarios = new usuarios ( );
		$objUsuarios->setUsuarioId ( $this->IdUsuario );
		$DatosUser = $objUsuarios->datosUsuariosPorId ();
		$rowDatosUser = mysqli_fetch_object ( $DatosUser );

		$this->UserName  = $rowDatosUser->UserName;
		$this->nombre    = $rowDatosUser->Nombre;
		$this->paterno   = $rowDatosUser->Paterno;
		$this->materno   = $rowDatosUser->Materno;
		$this->email     = $rowDatosUser->Email;
		$this->telefono1 = $rowDatosUser->Fono1;
		$this->telefono2 = $rowDatosUser->Fono2;
		$this->estaactivo= $rowDatosUser->EstaActivo;
		$this->profesion = $rowDatosUser->Profesion;
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

	public function contruyePermisos(){

		$objUsuarios = new usuarios ( );
		$objUsuarios->setUsuarioId ( $this->IdUsuario );
		$permisos = $objUsuarios->ObtienePermisosPorId ();
		echo "<table border='0'>";
		while ( $rowPermisos = mysqli_fetch_array ( $permisos ) ) {
		  echo '<tr><td><span class="nombrecampo">'.$rowPermisos["NombrePerfil"].'</span></td><td><span class="txt_innerform"><input type="checkbox" name="permisos" id="permisos" value="'.$rowPermisos["IdPerfil"].'" title="'.$rowPermisos["Detalle"].'"';
		  if(!empty($rowPermisos["PerfilAsignado"]))
		     echo ' checked';

	      echo '></td></span></tr>';


	    }
	    echo "</table>";
	}
}
