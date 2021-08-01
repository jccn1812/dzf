<?php
require_once '../class/sesion.class.php';
include_once "../class/constantes.php";

session_start();
function UserIsLoggedOn()
{
  $sesion = new sesion();

  If ($sesion->getSession('IDUSUARIO')=="" )
   {
    $sesion->delVarSession('LOGIN_SSN_USR');
    $sesion->delVarSession('CLAVE_SSN_USR');
    $sesion->delVarSession('sIdAnnoActivo');
    $sesion->delVarSession('sEmpresaActiva');
    $sesion->delVarSession('sAnnoActivo');
    $sesion->delVarSession('sEmpresa');
    $sesion->delVarSession('sRutEmpresa');
    $sesion->delVarSession('sRazonSocial');
    ?>
     <script language="javascript">
      var msg = "Se\u00F1or usuario: ";
      msg = msg+"Su sesi\u00F3n de trabajo ha caducado. Es necesario que se autentifique en ";
      msg = msg+"el sistema nuevamente.";
      alert(msg);
      document.location.href="../backend/index.php";
     </script>
   <?php
   return false;
   exit;
   }
  else
  {

    return true;
  }
}

function obtieneIdEmpresaActiva()
{
    $sesion = new sesion();
    $sIdEmpresa = $sesion->getSession("sIdEmpresa");
    return $sIdEmpresa;
}


function obtieneIdAnnoActivo()
{
	$sesion = new sesion();
	$sIdAnnoActivo = $sesion->getSession("sIdAnnoActivo");
	return $sIdAnnoActivo;
}

function obtieneIdEncabezadoActivo()
{
$sesion = new sesion();
$sIdEncCuenta = $sesion->getSession("sIdEncCuenta");
return $sIdEncCuenta;
}


function annoActivo(){
	$sesion = new sesion();
	return $sesion->getSession('sAnnoActivo');
}

function nombreEmpresaActiva()
{
	$sesion = new sesion();
	return $sesion->getSession('sEmpresa');
}

function razonEmpresaActiva()
{
	$sesion = new sesion();
	return $sesion->getSession('sRazonSocial');
}

function rutEmpresaActiva()
{
	$sesion = new sesion();
	return $sesion->getSession('sRutEmpresa');
}

function actividadEmpresaActiva(){
	$sesion = new sesion();
	return $sesion->getSession('sActividad');
}

function obtieneIdUsuarioActivo()
{
	
	
	$sesion = new sesion();
	$sIdUsuarioActivo = $sesion->getSession($_SESSION['IDUSUARIO']);
	return $sIdUsuarioActivo;
}



function ExisteEmpresaActiva()
{
	$sesion = new sesion();

	If ($sesion->getSession('sIdAnnoActivo')=="" )
	{
	?>
     <script language="javascript">
      var msg = "Se\u00F1or usuario: ";
      msg = msg+"El sistema no detecta un a\u00F1o contable disponible para la contabilizaci\u00F3n. ";
      msg = msg+"Active un a\u00F1o contable desde el Mantenedor de Empresas.";
      alert(msg);
      document.location.href="../backend/mantenedorEmpresas.php";
     </script>
   <?php
   return false;
   exit;
   }
  else
  {

    return true;
  }
}



function showWebSite()
{
 $sesion = new sesion();
 $sesion->setSession('IDUSUARIO', 'WebSite User' );
}


function cargaSesiones()
{
   include_once "../class/class.BDusuarios.php";
   $objUsuarios = new usuarios;
   $objUsuarios->setUsuarioId($_SESSION['IDUSUARIO']);
   $DatosLogin = $objUsuarios->datosUsuario();
   $rowDatosLogin = mysqli_fetch_object($DatosLogin);

   $sesion = new sesion();
   $sesion->setSession('NombreCompleto', CompruebaNulo($rowDatosLogin->NombreUsuario));
   $sesion->setSession('IdUsuario', CompruebaNulo($rowDatosLogin->NombreUsuario));
}

function obtieneNombreMes($IdMes)
{
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	return $meses[$IdMes-1];
	
}

function obtieneNombreEstado($IdEstado)
{
	$estados = array("Activo","Pendiente");

	return $estados[$IdEstado-1];

}

function obtieneNombreTipoComprobante($IdTipoComprobante)
{
	$tipo = array("Ingreso","Egreso","Traspaso");

	return $tipo[$IdTipoComprobante-1];

}




function cargaDatosEmpresa()
{
	include_once ("../class/sesion.class.php");
	$objSesion = new sesion();
	$superGlosa = $objSesion->getSession('sEmpresaActiva');

	return $superGlosa;


}


function piePagina()
{

	echo msgFooter;

}






function piePaginaFront()
{
echo 'be-Web / Etereus CMS<br>';
echo 'Productos inform&aacute;ticos - Desarrollo web - Asesor&iacute;as<br> ';
echo '<a href="mailto:jccn1812@gmail.com">Correo electr&oacute;nico:jccn1812@gmail.com</a> ';

}

function muestraValorCero($valor){
	
	if($valor==0)
	   $valor="";
	
	return $valor;
	
}

function muestraTipoContabilidad($IdTipo)
{
  $tipo = "";
  $tipo =  ($IdTipo=="1" ? 'Contabilidad Completa' : '14 TER'); 
  return $tipo;
 
}



function CompruebaNulo($valor)
{
  if($valor==null){
    $valor = '';
    }
  return $valor;

}


function CompruebaNuloValor($valor)
{
  if($valor==null || $valor=="0")
    $valor = "<img src='../images/no.gif'>";
  else
    $valor = "<img src='../images/si.gif'>";

  return $valor;

}


function CompruebaNuloValorImg($valor)
{
	if($valor==null || $valor=="0")
		$valor = "../images/no.gif";
	else
		$valor = "../images/si.gif";

	return $valor;

}

function formateaNumeroSinCero($numero){
	
	if($numero==0)
		return "";
	
	return number_format($numero,0,",",".");
	
}

function CompruebaAnnoVersusSesion($valor)
{
	include_once ("../class/class.html.php");
	$objSesion = new sesion();
	$annoActivo = $objSesion->getSession('sIdAnnoActivo');;
	if($valor!=$annoActivo)
		$valor = "../images/no.gif";
	else
		$valor = "../images/si.gif";

	return $valor;

}



function creaEncabezado()
{
cargaSesiones();

echo '<div id="system">
       <img src="../images/ico_usuario.jpg" width="10" height="14" border="0"/> Bienvenido(a) '. $_SESSION['NombreCompleto'] .' |
       <!--<img src="images/ico_salir.jpg" width="11" height="14" border="0"/> <a href="../index.php">Salir</a>-->
       <img src="../images/ico_salir.jpg" width="11" height="14" border="0"/> <a id="salir" href="#" >Salir</a>
     </div>';

}

function encabezado()
{
echo '
		<table width="100%" cellpadding="2" cellspacing="2" >
  			<tr>
     			<td colspan="3" class="td_nombreinstitucion">Identificaci&oacute;n Institucional </td>
  			</tr>
 			<tr>
    			<td width="183" class="td_1">Instituci&oacute;n:</td>
   				<td width="518">'. $_SESSION['Institucion'].'</td>
  			</tr>
  			<tr>
    			<td class="td_1">Responsable Institucional:</td>
    			<td width="273">'.$_SESSION['NombreCompleto'].'</td>
  			</tr>
  			<tr>
    			<td><div align="right" class="td_1">Cargo:</div></td>
    			<td colspan="2">'.$_SESSION['Cargo'].'</td>
  			</tr>
  			<tr>
    			<td><div align="right" class="td_1">E-mail:</div></td>
    			<td colspan="2">'.$_SESSION['Email'].'</td>
  			</tr>
  			<tr>
    			<td><div align="right" class="td_1">Tel&eacute;fono  :</div></td>
    			<td colspan="2">'.$_SESSION['Fono'].'</td>
  			</tr>
  			<tr>
    			<td><div align="right" class="td_1">Tel&eacute;fono 2:</div></td>
    			<td colspan="2">'.$_SESSION['Fono2'].'</td>
  			</tr>

		</table>';

}

function chequeaPerfil($argPerfil){
	   try {
			$conexion = new mysqli(BDserver,BDuser,BDpassword,BDBase);

			if (mysqli_connect_errno()) {
				throw new Exception("La conexion fallo<br />");
			}

			else {
				$resultado = $conexion->query("call sp_EtereusCMS_select_ObtienePerfilPorNombrePerfil(". $_SESSION["IDUSUARIO"].",'".$argPerfil."')");

				$row = $resultado->fetch_object();

				if ($row->TienePerfil=="1") {
					return true;

				}
				return false;
			}
	}
	catch (Exception $e) {
			echo $e->getMessage() . mysqli_connect_errno(). "<br />" .mysqli_connect_error();
		}
		$conexion->close();



	}

	
	function actualizaEncabezado($argQuery){
		try {
			$conexion = new mysqli(BDserver,BDuser,BDpassword,BDBase);
	
			if (mysqli_connect_errno()) {
				throw new Exception("La conexion fallo<br />");
			}
	
			else {
				$resultado = $conexion->query("call sp_ContableJEE_ingresaVoucherEncabezado(". $argQuery .")");
			    $row = $resultado->fetch_object();

				return $row->UltimoId;
				
			}
		}
		catch (Exception $e) {
			echo $e->getMessage() . mysqli_connect_errno(). "<br />" .mysqli_connect_error();
		}
		$conexion->close();
	
	
	
	}
	
	
function muestraEstado($estatus,$baseMensaje){
	
	$msg = "";
	if ($estatus == 1){
		return $baseMensaje . ': ACTIVO';
	} elseif ($estatus == 2){
		return $baseMensaje . ': PENDIENTE <img src="../images/alarma.gif">';
	} elseif ($estatus == 3){
		return $baseMensaje . ': ANULADO';
	}
	
}	
	
function muestraFechaDDMMAAAA($lafecha){

  	//list( $anio, $mes, $dia ) = explode( '[__-]', $lafecha);
    //return "$dia-$mes-$anio";
    $lafecha = strtotime($lafecha);
    return  date('d/m/Y',$lafecha);
    
  }

function muestraFechaAAAAMMDD($lafecha){

  	list( $dia,$mes,$anio,  ) = explode( '[__-]', $lafecha);
    return "$anio-$mes-$dia";

  }

function muestraFechaDDMMAAAAconSlash($lafecha){

  	
    $date = str_replace('/', '-', $lafecha);
    return date('Y-m-d', strtotime($date));
    

  }

function muestraFechaAAAAMMDDconSlach($lafecha){

  	list( $anio, $mes, $dia ) = explode( '[__-]', $lafecha);
    return "$dia/$mes/$anio";

  }

 function checkNullToValor($dato){

    if(empty($dato) ){
       return 0;
       }
    else
    {
       return 1;
    }
 }

function convierteFecha($lafecha){
	$trozos=split("-", $lafecha);
	$temp=split(" ",$trozos[2]);
	$dia=$temp[0];
	$date=mktime(0,0,0,$trozos[1], $dia, $trozos[0]);
	return strftime("%d-%b-%Y", $date);


}


function creaComboCuentaIdentificador($Identicador,$comparador){
    
    
    include_once("../class/class.BDcuentas.php");
    $objCuentas = new cuentas();
    $objCuentas->IdEncCuenta = obtieneIdEncabezadoActivo();
    $result =  $objCuentas->listaCuentas();
    
    $comboCta = "<select class='combo_txt' name='".$Identicador."' id='".$Identicador."'>"."\n";
    $comboCta = $comboCta ."<option value='' SELECTED>Seleccione cuenta</option>"."\n";
    while ($row = mysqli_fetch_array($result))
    {
        $comboCta .=   "<option value='".$row['IdCuenta']."'";

        if($comparador==$row['IdCuenta']) {
            $comboCta = $comboCta ."selected ";
        }
        
        $comboCta .= ">".$row['cuenta'].'-'.$row['Descripcion']. "</option>"."\n";
    }
    $comboCta .= "</select>"."\n";
    
    echo $comboCta;
    
}






function thumbjpeg($imagen,$altura,$anchura,$pre) {

// Lugar donde se guardar�n los thumbnails respecto a la carpeta donde est� la imagen "grande".


$dir_thumb = "../upload/images/";
$original = $dir_thumb . $imagen;

// Prefijo que se a�adir� al nombre del thumbnail. Ejemplo: si la imagen grande fuera "imagen1.jpg",
// el thumbnail se llamar�a "tn_imagen1.jpg"
//$prefijo_thumb = "tn_";
$pre_thumb = $pre;

$camino_nombre=explode("/",$imagen);

// Aqu� tendremos el nombre de la imagen.
$nombre=end($camino_nombre);

// Aqu� la ruta especificada para buscar la imagen.
$camino=substr($imagen,0,strlen($imagen)-strlen($nombre));

// Aqu� comprobamos que la imagen que queremos crear no exista previamente
if (file_exists($camino.$dir_thumb.$pre_thumb.$nombre)) {
   return;
  }
else{


$img = imagecreatefromjpeg($original) or die("No se encuentra la imagen $camino$nombre<br>n");

// miramos el tama�o de la imagen original...
$datos = getimagesize($original) or die("Problemas con $camino$nombre<br>n");

// intentamos escalar la imagen original a la medida que nos interesa
$ratio = ($datos[1] / $altura);
$anchura = round($datos[0] / $ratio);

// esta ser� la nueva imagen reescalada
$thumb = imagecreatetruecolor($anchura,$altura);

// con esta funci�n la reescalamos
imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);

// voil� la salvamos con el nombre y en el lugar que nos interesa.
imagejpeg($thumb,$camino.$dir_thumb.$pre_thumb.$nombre);



}
}



function createthumbx($name,$filename,$new_w,$new_h)
{
	$system=explode('.',$name);
	if (preg_match('/jpg|jpeg/',$system[1])){
		$src_img=imagecreatefromjpeg($name);
	}

	if (preg_match('/png/',$system[1])){
		$src_img=imagecreatefrompng($name);
	}

	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);
	if ($old_x > $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$old_y*($new_h/$old_x);
	}
	if ($old_x < $old_y) {
		$thumb_w=$old_x*($new_w/$old_y);
		$thumb_h=$new_h;
	}
	if ($old_x == $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	}

	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

	if (preg_match("/png/",$system[1]))
	{
		imagepng($dst_img,$filename);
	} else {
		imagejpeg($dst_img,$filename);
	}
//	imagedestroy($dst_img);
//	imagedestroy($src_img);

}



function right($value, $count){

    $value = substr($value, (strlen($value) - $count), strlen($value));
    return $value;

}
function left($string, $count){

    return substr($string, 0, $count);

}

 
function generate_string($input, $strength = 10) {

	echo 'genero';
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

	echo $random_string;
    return $random_string;
 }



?>
