<?php


	require_once '../class/sesion.class.php';
	include_once '../class/constantes.php';

    error_reporting(E_ERROR);
	$accion = $_POST["accion"];
		
	if($accion=="logout")
	{
		$sesion = new sesion();
		$sesion->closeSession() ;
	}


	switch ($_GET['op']) {

		case 'tp':
			if (isset($_POST['username']) && !empty($_POST['username']) &&
				isset($_POST['password']) && !empty($_POST['password'])) {
					$username = trim($_POST['username']);
					$password = trim($_POST['password']);
					rdrInterfaceUsuario($username, $password);
			}
			else {
				header("Location: index.php");
			}
		break;

		default:
			getLoginMainForm();
		break;
	}

	function rdrInterfaceUsuario($username, $password) {
	    
	    
        include_once ("../class/class.BDusuarios.php");
        
        
        
	    $usuarios = new usuarios ( );
	    $usuarios->setUsuarioNombre($username);
	    $usuarios->setUsuarioPass($password);
	    
        $usuarios->DeterminaExiste();
		$existe = $usuarios->getExiste();
		
		
        
		if (empty($existe)) {
		    header("Location: index.php");
			exit;
		}
		$sesion = new sesion();
		$sesion->setSession('LOGIN_SSN_USR',$username);
		$sesion->setSession('CLAVE_SSN_USR',$password);
		$sesion->setSession('IDUSUARIO',$existe);

		header("Location: selector.php");

		/*
		if (empty($row->Existe)) {
			header("Location: index.php");
			exit;
			}

		try {
			$conexion = new mysqli(BDserver,BDuser,BDpassword,BDBase);

			if (mysqli_connect_errno()) {
				throw new Exception("La conexion fallo<br />");
			}

			else {
				$username = $conexion->real_escape_string($username);
				$password = $conexion->real_escape_string($password);


				$resultado = $conexion->query("CALL sp_etereuscms_select_loginusuario('$username', '$password')");
				$row = $resultado->fetch_object();

				echo "este".$row->Existe;

				if (empty($row->Existe)) {
					header("Location: index.php");
					exit;
				}

				$sesion = new sesion();
				$sesion->setSession('LOGIN_SSN_USR',$username);
				$sesion->setSession('CLAVE_SSN_USR',$password);
				$sesion->setSession('IDUSUARIO',$row->Existe);

				header("Location: selector.php");

				$resultado->close();
			}

		}
		catch (Exception $e) {
			echo $e->getMessage() . mysqli_connect_errno(). "<br />" .mysqli_connect_error();
		}
		$conexion->close();
		*/
	}

	function encabezado(){
	    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<title>'.NombreAplicacion.' - Backend</title>';
	}



	function getLoginMainForm() {

		encabezado();

		echo '<script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
				<script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
				<script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>

				<link href="../css/estilo2.css" rel="stylesheet" type="text/css" />
				<script language="JavaScript">
 				function asignaValidacion()
	    		{
			      defineObjetoValidacion("username","E-mail",TYPE_STRING,OBLIGATORIO);
			      defineObjetoValidacion("password","Password",TYPE_STRING,OBLIGATORIO);
	             }

	             function valida()
                  {
                   if(!validacion(1))
                      return false;
                   else
                      document.forms[0].submit();
                   }
                 </script>
				</head>
				<body class="estilo" onload="asignaValidacion(3)">
				<div id="container">
                <div class="estilo" id="contenedor_item" style="margin: 60px 0px 140px 0px;">

		        <form name="formulario" method="post"action="index.php?op=tp">
		          <table width="341" align="center" cellpadding="2" cellspacing="2" class="tabla_listado">
		              <tr>
		                <td align="right" colspan="3" class="td_nombreinstitucion">DZFCertifica - Autenticaci&oacute;n </td>
		              </tr>
		            <tr>
		              <td width="103" rowspan="3"><img src="../images/logo.png" width="103" height="90" /></td>
		              <td width="50" align="right">E-mail:</td>
		              <td width="166"><input name="username" type="text" id="textfield" size="20" /></td>
		            </tr>
		            <tr>
		              <td align="right">Clave:</td>
		              <td><input name="password" type="password" id="textfield2" size="20" /></td>
		            </tr>
		            <tr>
	              	  <td>&nbsp;</td>
		              <td><input type="button" class="Boton" name="button" onclick="valida()" id="button" value="Ingresar" />
		              </td>
		            </tr>
		          </table>
		        </form>
                <br>
               <table><tr>
                  <td><div id="errores"></div></td></tr></table>
               </div>';



			echo "</body>\n</html>";
	}








?>
