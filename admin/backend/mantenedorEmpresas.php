<?php
// Controla el mantenedor de empresa
include_once ("../class/class.htmlEmpresas.php");



$accion      = $_POST ["accion"];
$modificador = $_POST ["laaccion"];
$IdEmpresa   = $_POST ["IdEmpresa"];
$rut		 = $_POST ["rut"];
$empresa     = $_POST ["empresa"];
$actividad   = $_POST ["actividad"];
$razonSocial = $_POST ["razonSocial"];
$contacto    = $_POST ["contacto"];
$codigoAct   = $_POST ["codigoAct"];
$direccion   = $_POST ["direccion"];
$comuna 	 = $_POST ["comuna"];
$estaActivo  = $_POST ["estaActivo"];
$IdAnno      = $_POST ["IdAnno"];
$Anno        = $_POST ["anno"];

$email       = $_POST ["email"];



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


$mantenedor = new Htmlempresas ( );

$mantenedor->setIdEmpresa ( $IdEmpresa );
$mantenedor->setEmpresa ( $empresa );
$mantenedor->setRut ( $rut );
$mantenedor->setRazonSocial($razonSocial);
$mantenedor->setActividad ($actividad);
$mantenedor->setContacto($contacto);
$mantenedor->setCodigoAct ( $codigoAct );
$mantenedor->setDireccion ( $direccion );
$mantenedor->setComuna ( $comuna );
$mantenedor->setEstaActivo($estaActivo);
$mantenedor->setlaAccion ( $modificador );
$mantenedor->setIdAnno ( $IdAnno );
$mantenedor->setAnno ( $Anno );

$mantenedor->setEmail ( $email );



$mantenedor->getMantenedor ( $accion );

?>

