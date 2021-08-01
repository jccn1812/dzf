<?php
// Controla los mantenedores de usuarios
include_once '../common/funciones.php';
include_once ("../class/class.htmlPersonas.php");


if(!(ExisteEmpresaActiva()))
{
	header("location: ../index.php"	);
}


$accion      		= $_POST ["accion"];
$modificador 		= $_POST ["laaccion"];
$IdPersona   		= $_POST ["IdPersona"];
$IdTipoPersona      = $_POST ["cmbTipoPersona"];
$rut 				= $_POST ["rut"];
$elRut 				= $_POST ["elRut"];
$nombre 			= $_POST ["nombres"];
$paterno 			= $_POST ["apellido_pat"];
$materno 			= $_POST ["apellido_mat"];
$email 				= $_POST ["email"];
$telefono1 			= $_POST ["fono1"];
$telefono2 			= $_POST ["fono2"];
$direccion			= $_POST ["direccion"];
$comuna				= $_POST ["comuna"];


/*
 ---------------------------
 | Acciones del formulario |---------------------------------------
 ---------------------------
 - Accion por defecto : Mostrar la lista de usuarios según tipo
 - 1 : Ver los datos de la cuenta
 - 2 : Editar una cuenta (Formulario)
 - 3 : Ingresar una cuenta (Formulario)
 - 4 : Grabar ingreso o modificaciones. Se recibe el formulario
 ----------------------------------------------------------------
*/

$mantenedor = new Htmlpersonas ( );

$mantenedor->setIdPersona ( $IdPersona );
$mantenedor->setIdTipoPersona ( $IdTipoPersona );
$mantenedor->setRut ( $rut );
$mantenedor->setElRut ( $elRut );

$mantenedor->setNombre ( $nombre );
$mantenedor->setPaterno ( $paterno );
$mantenedor->setMaterno ( $materno );
$mantenedor->setEmail ( $email );
$mantenedor->setFono1 ( $telefono1 );
$mantenedor->setFono2 ( $telefono2 );
$mantenedor->setDireccion ( $direccion );
$mantenedor->setComuna ( $comuna );



$mantenedor->getMantenedor ( $accion );

?>

