<?php
error_reporting(E_ERROR);
require_once "../common/funciones.php";
include_once('class.database.php');
if(!(UserIsLoggedOn()))
{

	exit;
}




/*------------------------------------------------------
 archivo de clase: class.html.php
 -----------------
 Descripción: Implementa la clase HTML para el módulo de
              de administración del sitio APPC
 Aplicación : Portal de participación ciudadana
               - Módulo de administración -

 Autor : Juan Carlos Campos N.
 Fecha : 27 de octubre 2008
*/

class classHtml {

  protected $error;
  protected $arrGabinetes;
  protected $arrGabinetesSoloUsuariosRegistrados;
  

  public function header()
   {
    echo '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
           <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
           <meta name="google-site-verification" content="QMUOLgbFe8lqVgUz9diZwUVBhdtQyDc3VBQDJv_cn3o" />
           <title>Agenda Pro Participaci&oacute;n Ciudadana</title>
           <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
           <script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
           <script language="JavaScript" src="../js/usuarios.js" type="text/javascript"></script>

          </head>
          <body class="estilo">
          <div id="container">
           <div id="header"></div>';
           creaEncabezado();
           
   }

  public function footer()
   {
   	echo '</div>';
    piePagina();
    echo '</body>
           </html>';
   }

   
   public function agregar() {
   	echo '<div class="estilo" id="contenedor_item">
      	   <div align="right"><img id="agregar" src="../images/agregar.gif" width="119" height="30" border="0"/></a></div>
   	  </div>';
   }

  public function volverPanel()
   {
   echo ' <div class="estilo" id="contenedor_item">
           <div align="center">
            <img id="volverPanel" src="../images/volverpanel.gif" width="119" height="30" border="0"/>
          </div>
        </div>
        ';

   }


  public function volverAtras()
   {
   echo ' <div class="estilo" id="contenedor_item">
          <div align="center">
            <label>
            <img id="volverAtras" src="../images/volver.gif" width="119" height="30" border="0"/>
          </div>
        </div>';
   }

  public function volverAtrasNodo()
   {
   echo ' <div class="estilo" id="contenedor_item">
          <div align="center">
            <label>
            <img id="volverAtrasND" src="../images/volver.gif" width="119" height="30" border="0"/>
          </div>
        </div>';
   }


  public function volverFormulario()
   {
   echo ' <div class="estilo" id="contenedor_item">
          <div align="center">
            <label>
            <img id="volverFormulario" src="../images/volver.gif" width="119" height="30" border="0"/>
          </div>
        </div>';


   }

  public function volverAtrasDcto()
   {
   echo ' <div class="estilo" id="contenedor_item">
          <div align="center">
            <label>
            <img id="volverAtrasDC" src="../images/volver.gif" width="119" height="30" border="0"/>
          </div>
        </div>';
   }
  
  
  public function volverAtrasNews()
     {
     echo ' <div class="estilo" id="contenedor_item">
            <div align="center">
              <label>
              <img id="volverAtrasNews" src="../images/volver.gif" width="119" height="30" border="0"/>
            </div>
          </div>';
     }
  
   




  public function closeForm()
   {
    echo '</form>';
   }



  public function detallaError()
   {
   	echo '
   			<div class="estilo" id="contenedor_item">
             	<table width="740" border="0" cellspacing="6" cellpadding="6">
            		<tr>
              	 		<td valign="top" class="td_border" align="center">'.$this->error.'</td>
              	 	</tr>
             	</table>
            </div>';
   		return;

   	}


  public function exito(){
  	echo '
  	<div class="txt_confirm">
       		<table width="715" align="center">
           		<tr>
           			<td width="58"><img src="../images/exito.jpg" width="51" height="47" /></td>
           			<td width="645"><p align="left">&iexcl;Los datos han sido guardados correctamente!</p></td>
           		</tr>
      		</table>
       </div>';
  }
  
  public function exitoEnvioPass(){
	echo '
	<div class="txt_confirm">
			 <table width="715" align="center">
				 <tr>
					 <td width="58"><img src="../images/exito.jpg" width="51" height="47" /></td>
					 <td width="645"><p align="left">&iexcl;La nueva password ha sido enviada al correo registrado por el cliente!</p></td>
				 </tr>
			</table>
	 </div>';
}





  public function creaComboEmpresas($comparador) {
  	include_once("class.BDempresas.php");
  	$objEmpresas = new empresas();
  	$objEmpresas->setIdEmpresa($comparador);
  	$result =  $objEmpresas->listaEmpresas();
  
  	$comboEmp = "<select class='combo_txt' name='empresasListado' id='empresasListado'>"."\n";
  	$comboEmp = $comboEmp ."<option value='' SELECTED>Seleccione la Empresa</option>"."\n";
  	
  
  	while ($row = mysqli_fetch_array($result))
  	{
  		$comboEmp .=   "<option value='".$row['IdEmpresa']."'";
  		if($row['IdEmpresa'] == $comparador )
  		{
  			$comboEmp .= " selected";
  		}
  
  		 
  		$comboEmp .= ">".$row['empresa']. "</option>"."\n";
  
  	}
  	$comboEmp .= "</select>"."\n";
  
  
  	echo $comboEmp;
  
  }
  
  
  public function creaComboMeses($comparador) {
  	include_once("class.BDextras.php");
  	$objExtras = new extras();
  	$result =  $objExtras->listaMeses();
  
  	$comboMes = "<select class='combo_txt' name='cmbMeses' id='cmbMeses'>"."\n";
  	//$comboMes = $comboMes ."<option value='' SELECTED>Seleccione el mes</option>"."\n";
  	 
  
  	while ($row = mysqli_fetch_array($result))
  	{
  		$comboMes .=   "<option value='".$row['IdMes']."'";
  		if($row['IdMes'] == $comparador )
  		{
  			$comboMes .= " selected";
  		}
  
  			
  		$comboMes .= ">".$row['Mes']. "</option>"."\n";
  
  	}
  	$comboMes .= "</select>"."\n";
  
  
  	echo $comboMes;
  
  }

  
  
  public function creaComboTipoCompobante($comparador) {
  	include_once("class.BDextras.php");
  	$objExtras = new extras();
  	$result =  $objExtras->listaTipoComprobantes();
  
  	$comboTipo = "<select class='combo_txt' name='cmbTipoComprobante' id='cmbTipoComprobante'>"."\n";
  	$comboTipo = $comboTipo ."<option value='' SELECTED>Seleccione el Tipo</option>"."\n";
  
  
  	while ($row = mysqli_fetch_array($result))
  	{
  		$comboTipo .=   "<option value='".$row['IdTipoComprobante']."'";
  		if($row['IdTipoComprobante'] == $comparador )
  		{
  			$comboTipo .= " selected";
  		}
  
  			
  		$comboTipo .= ">".$row['tipoComprobante']. "</option>"."\n";
  
  	}
  	$comboTipo .= "</select>"."\n";
  
  
  	echo $comboTipo;
  
  }
  
  public function creaComboCuenta() {
  	
    $IdEnc = obtieneIdEncabezadoActivo();
    include_once("class.BDcuentas.php");
  	$objCuentas = new cuentas();
  	$objCuentas->setIdEncCuenta($IdEnc);
  	
  	$result =  $objCuentas->listaCuentas();
  
  	$comboCta = "<select class='combo_txt' name='cmbCuentas' id='cmbCuentas'>"."\n";
  	$comboCta = $comboCta ."<option value='' SELECTED>Seleccione cuenta</option>"."\n";
  
  	
  	
  	
  	try {
  	    
  	    while ($row = mysqli_fetch_array($result))
  	    {
  	        $comboCta .=   "<option value='".$row['IdCuenta']."'";
  	        $comboCta .= ">".$row['cuenta'].'-'.$row['Descripcion']. "</option>"."\n";
  	    }
  	    $comboCta .= "</select>"."\n";
  	    
  	    
  	} catch (Exception $e) {
  	    echo mysql_error();
  	}
  
  
  
  	echo $comboCta;
  
  }
  
  public function creaComboEncabezadoCuenta($comparador) {
      include_once("class.BDcuentas.php");
      $objCuentas = new cuentas();
      $result =  $objCuentas->listaEnc();
      
      $comboCta = "<select class='combo_txt' name='cmbEncCuentas' id='cmbEncCuentas'>"."\n";
      $comboCta = $comboCta ."<option value='' SELECTED>Seleccione Plan de Cuentas</option>"."\n";
      
      
      while ($row = mysqli_fetch_array($result))
      {
          $comboCta .=   "<option value='".$row['idenccuenta']."'";
          if($row['idenccuenta'] == $comparador )
          {
              $comboCta .= " selected";
          }
          
          
          
          $comboCta .= ">".$row['enccuenta']. "</option>"."\n";
      }
      $comboCta .= "</select>"."\n";
      
      echo $comboCta;
      
  }
  
  

  
  public function creaComboTipoFuncionario($comparador,$idUsuario) {
	include_once("class.BDusuarios.php");
	$objUsuarios = new usuarios();
	$objUsuarios->setUsuarioTipo($comparador);

	$result =  $objUsuarios->listaUsuariosPorRolPorIdUsuario();
    if($comparador == "2"){
		$cmb = "cmbInspector";
	}
	else {
		$cmb = "cmbDirector";
	}


	$comboTipo = "<select class='combo_txt' name='". $cmb ."' id='" . $cmb. "'>"."\n";
	$comboTipo = $comboTipo ."<option value='' SELECTED>Seleccione el Usuario</option>"."\n";


	while ($row = mysqli_fetch_array($result))
	{
		$comboTipo .=   "<option value='".$row['IdUsuario']."'";
		if($row['IdUsuario'] == $idUsuario )
		{
			$comboTipo .= " selected";
		}

			
		$comboTipo .= ">".$row['nombre']. " " . $row['apellidoPaterno'] .  "</option>"."\n";

	}
	$comboTipo .= "</select>"."\n";


	echo $comboTipo;

}


  
  

  public function creaComboTipoPersona($comparador) {
  	include_once("class.BDpersonas.php");
  	$objPersonas = new personas();
  	$result =  $objPersonas->listaTipoPersonas();
  
  	$comboTipo = "<select class='combo_txt' name='cmbTipoPersona' id='cmbTipoPersona'>"."\n";
  	$comboTipo = $comboTipo ."<option value='' SELECTED>Seleccione el Tipo</option>"."\n";
  
  
  	while ($row = mysqli_fetch_array($result))
  	{
  		$comboTipo .=   "<option value='".$row['IdTipoPersona']."'";
  		if($row['IdTipoPersona'] == $comparador )
  		{
  			$comboTipo .= " selected";
  		}
  
  			
  		$comboTipo .= ">".$row['tipoPersona']. "</option>"."\n";
  
  	}
  	$comboTipo .= "</select>"."\n";
  
  
  	echo $comboTipo;
  
  }
  
  function creaComboTipoInforme($comparador){
	  
	$selectInspeccion = "";
	$selectCapacitacion = "";
	$selectCertificacion = "";

	if($comparador=="1") $selectInspeccion ="selected";
	if($comparador=="2") $selectCapacitacion ="selected";
	if($comparador=="3") $selectCertificacion ="selected";

	echo '
		<select id="cmbTipoInforme" name="cmbTipoInforme">
			<option value="1" '.$selectInspeccion.'>Inspecci&oacute;n</option>
			<option value="2" '.$selectCapacitacion.'>Capacitaci&oacute;n</option>
			<option value="3" '.$selectCertificacion.'>Certificaci&oacute;n</option>
		</select>';
}

  




 public function muestraTipoInforme($comparador){
	switch($comparador)
	{
		case 1:
			return "Informe de Inspecci&oacute;n";
			break;
		case 2:	
			return "Informe de Capacitaci&oacute;n";
			break;
		case 3:
			return "Informe de Certificac&oacute;n";		
			break;
	}
 }



  	function ChequeaNulo($valorConvertir,$esNumero)
  	 {
  	  $valorDevolver = "";
  	  if ($valorConvertir=="" )
  	    {
  	     $valorConvertir =  "NULL";
  	    }
  	 else
  	   {
  	     if($esNumero=="S")
  	       {
  	        $valorConvertir =  "$valorConvertir";
  	       }
  	     else
  	      {
  	       $valorConvertir =  "'$valorConvertir'";
  	      }
  	   }

  	 return $valorConvertir;


  	 }
  	 
  	 function ChequeaNuloEx($valorConvertir,$esNumero)
  	 {
  	 	$valorDevolver = "";
  	 	if($esNumero=="S")
  	 	 {
  	 		if($valorConvertir=="")
  	 		 {	
  	 		   $valorConvertir = 0;
  	 		 }
  	 		else 
  	 		{
  	 			$valorConvertir =  "$valorConvertir";
  	 		}   
  	 	 } 
  	 	else
  	 	 {
  	 		if ($valorConvertir=="" )
  	 		{
  	 			$valorConvertir =  "NULL";
  	 		}
  	 		else 
  	 		{
  	 			$valorConvertir =  "'$valorConvertir'";
  	 		}
  	 	 }
  	 		
  	 	
  	 	return $valorConvertir;
  	 
  	 
	   }
	   
	 



  	public function encabezado() {
		echo '<div id="content"><div class="estilo" id="ident_institu">';
		encabezado ();
		echo '</div></div>';
	}







	/*---------------- Metodos para el Frontend -----------------------------*/


	public function headerFront(){
	
	
	  if(eregi("google",$HTTP_USER_AGENT))
	  {
	  if ($QUERY_STRING != "")	
	    {$url = "http://".$SERVER_NAME.$PHP_SELF.'?'.$QUERY_STRING;}
	  else
	    {$url = "http://".$SERVER_NAME.$PHP_SELF;}
	    $today = date("F j, Y, g:i a");	
	    mail("jccn1812@gmail.com", "Se ha detectado un robot de Google en http://$SERVER_NAME","$today - Google ha indexado la página $url.\n..:: Se sugiere revisar los informes de Google Analytics :)  ::..");
	  }
	
  	//$this->cargaGabinetesUsuariosRegistrados();
	
					
	
			echo "
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
			<html xmlns:og='http://opengraphprotocol.org/schema/'xmlns:fb='http://www.facebook.com/2008/fbml' xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<!--Home-->
				<title>".$this->Titulo." </title>
				<script type='text/javascript' src='../js/jquery-1.1.3.1.min.js'></script>
				<script type='text/javascript' src='../js/jquery.easing.min.js'></script>
				<script type='text/javascript' src='../js/jquery.lavalamp.min.js'></script>

				<script language='JavaScript' src='../js/jquery/jquery.js' type='text/javascript'></script>
				<script language='JavaScript' src='../js/jquery.corner.js' type='text/javascript'></script>

				<script language='JavaScript' src='../js/frontend.js' type='text/javascript'></script>
				<script type='text/javascript'>
				
				  var _gaq = _gaq || [];
				  _gaq.push(['_setAccount', 'UA-24054923-1']);
				  _gaq.push(['_trackPageview']);
				
				  (function() {
				    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				  })();
				
				  </script>
				
				
				
				<!-- Stylesheets -->
					<link href='../css/reset.css' rel='stylesheet' type='text/css' media='all' />
					<link href='../css/default.css' rel='stylesheet' type='text/css' media='screen' />
					<link href='../css/styling.css' rel='stylesheet' type='text/css' media='screen' />
					<link href='../css/jquery.accessible-news-slider.css' rel='stylesheet' type='text/css' media='screen' />

					<!-- Print Stylesheet -->
					<link href='../css/print.css' rel='stylesheet' type='text/css' media='print' />
					
					
					
					<link rel='stylesheet' href='../css/lavalamp_test.css' type='text/css' media='screen'>


                     		<script language='JavaScript' src='ftiens4.js' type='text/javascript'></script>


				<!-- Meta Information -->
				<meta name='google-site-verification' content='QMUOLgbFe8lqVgUz9diZwUVBhdtQyDc3VBQDJv_cn3o' />
				<meta http-equiv='content-type' content='text/html; charset=iso-8859-1' />
				<meta http-equiv='imagetoolbar' content='no' />
				<meta http-equiv='cache-control' content='public' />
				<meta http-equiv='pragma' content='no-cache' />
				<meta http-equiv='expires' content='never' />
				<meta name='language' content='en-gb' />
				<meta name='MSSmartTagsPreventParsing' content='true' />
				<meta name='robots' content='index, follow' />
				<meta name='revisit-after' content='1 days' />
				<meta property='og:author' content='".$this->Autor	."' />

				
				</head>
				<body class='fullwidth'>
				  <form method='get'>
				  <input type='hidden' name='accion' value='" . $this->laaccion . "'>
				  <input type='hidden' name='IdGabinete' value='" . $this->IdGabinete . "'>
				  <input type='hidden' name='IndPagHTML' value=''>
				  <input type='hidden' name='IdAbuelo' value='" . $this->IdAbuelo . "'>
				  <input type='hidden' name='NombreGab' value='" . $this->NombreGabinete . "'>
				  <input type='hidden' name='NombreGabinete' value='" . $this->NombreGabinete . "'>
				  <input type='hidden' id='IdNodoSeleccionado' name='IdNodoSeleccionado' value='" . $this->IdNodoSeleccionado . "'>
				  <input type='hidden' name='perm' value=''>
				  <input type='hidden' name='IdNodoPadre' value='" . $this->IdNodoPadre . "'>
				  <input type='hidden' name='IdNodo' value=''>
				  <input type='hidden' name='IdDcto' value='" . $this->IdDcto . "'>
				  <input type='hidden' name='IdNoticia' value='" . $this->IdNoticia . "'>
				  <input type='hidden' name='IdCurso' value=''>
				  <input type='hidden' name='tituloPagina' value='" . $this->Titulo  . "'>

				<div id='container'>

			";
	}


	public function footerFront(){

		echo "
		        <div class='clear'></div>
				<div id='footer'>

					<div id='footer-in'>";

						piePaginaFront();

		echo "
				</div> <!-- end #footer-in -->

				</div> <!-- end #footer -->

			</div> <!-- end div#container -->
			</form>
			</body>
			</html>
			";


	}


	

	public function startDivcontentwrap() {

		echo "
				<div id='content-wrap' class='clear lcol'>
			 ";

	}


	public function endDivcontentwrap() {

		echo "
				</div> <!-- end #content-wrap -->
			 ";

	}

	public function startDivLeft() {

		echo "
				<div class='column cleft'>
					<div class='column-in'>
			";

	}


	public function startDivRight() {

		echo "
				<div class='column cright'>
					<div class='column-in'>

			 ";


	}

	public function startDivContent(){

		echo "
				<div class='content'>
					<div class='content-in'>
			 ";
	}

	public function endDivFront() {

			echo "
					</div> <!-- end .column-in -->
				</div> <!-- end .column -->
				 ";
		}




 	


   public function creaThumnail($imagen)
   {
    $carpeta = '../upload/images/';
    $nombre = $carpeta . $imagen;
    $nuevo  = $carpeta . 'tn_'.$imagen;
    $new_w = 100;
    $new_h = 100;
    createthumb($nombre,$nuevo,$new_w,$new_h);

    echo '<img src="../upload/images/tn_'.$imagen.'" align="top">';

   }

public function meGustaFB()
  {

   $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
   echo "<iframe src='http://www.facebook.com/plugins/like.php?href=".
          urlencode($url).
          "';layout=standard&amp;show-faces=true&amp;width=500&amp;action=like&amp;colorscheme=light' scrolling='no' frameborder='0' allowTransparency='true' style='border:none; overflow:hidden; width:500px; height:60px'></iframe>
        ";  
  }


  public function exitoEnvio(){
  	echo '
  	<div class="txt_confirm">
       		<table width="715" align="center">
           		<tr>
           			<td width="58"><img src="../images/exito.jpg" width="51" height="47" /></td>
           			<td width="645"><p align="left">&iexcl;El boletin ha sido enviado !</p></td>
           		</tr>
      		</table>
       </div>';
  }








}
?>
