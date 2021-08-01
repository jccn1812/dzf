 <?php
 error_reporting(0);
      require_once '../class/sesion.class.php';
	  include_once '../class/constantes.php';
	  include_once '../common/funciones.php';
	  if(!(UserIsLoggedOn()))
	  {
	   header("location: ../index.php"	);
	  }

	  /*if(!(ExisteEmpresaActiva()))
	  {
		  header("location: ../index.php"	);
	  }
*/

         echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
				<title>'.NombreAplicacion.'</title>';

		echo '<script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
				<script language="JavaScript" src="../js/administracion.js" type="text/javascript"></script>

				<link href="../css/estilo2.css" rel="stylesheet" type="text/css" />
				</head>
				<body class="bodyFront">
				<div id="container">
                <div class="estilo" id="contenedor_item" style="margin: 60px 0px 140px 0px;">

		        <form  method="post">
		        <input type="hidden" name="accion">
		        <input type="hidden" name="IdInstanciaLink">
		        <input type="hidden" name="NombreInstanciaLink">
		          <table width="400" align="center" cellpadding="2" cellspacing="8" class="tabla_selector" border="0">
		              <tr>
		                <td align="right" colspan="9" class="td_nombreinstitucion">Selector principal </td>
		              </tr>
		            <tr>';
		if(chequeaPerfil('SuperUsuario')){
			echo '    <td width="103"><img border="0" src="../images/usuarios.jpg" title="Definiciones" valign="absmiddle" /></td>
		              <td align="left">
					    <a id="usuarios" href="#">&ordm;&nbsp;Usuarios del M&oacute;dulo</a>
					 </td>
			          ';
			
			$sesion = new sesion();

			If ($sesion->getSession('sTipoCont')=="1" )
			{			
				echo '		
			          	<td width="103"><img border="0" src="../images/contenido.jpg" title="Vouchers"/></td>
		              	<td align="left"><a href="#" id="vouchers">&ordm;&nbsp;Ingreso de asientos contables</a></td>
		             	</tr>';
			}
			else
			{
				echo '		
				<td width="103"><img border="0" src="../images/contenido.jpg" title="Vouchers"/></td>
				<td align="left"><a id="empresas" href="#">&ordm;&nbsp;Cartera de Clientes</a>
				</td>
			   </tr>';

			}
			echo '		 
		             <tr>
		              <td width="103" colspan="2"><img border="0" src="../images/links.jpg" title="Informes y listados"/></td>
		              <td align="left">
					   <a href="#" id="libroCompraVenta">&ordm;&nbsp;Informe 1</a><br>
					   <a href="#" id="libroDiario">&ordm;&nbsp;Informe 2</a><br>
					   <a href="#" id="libroMayor">&ordm;&nbsp;Informe 3</a><br>
					
					   
					  </td>
			         </tr>
                     <tr>

			         ';
		}
		
		 echo '       <td></td>
		              </tr>

		          </table>
		            <br>
		           <a href="#" id="FinSesion">Cerrar sesi&oacute;n</a>
		        </form>

                <br>
               </div>
               </div>';


			echo "</body>\n</html>";
?>