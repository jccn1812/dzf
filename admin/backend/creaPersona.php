<?php

include_once ("../class/class.htmlPersonas.php");

$IdTipoPersona      = $_POST ["cmbTipoPersona"];
$rut 				= $_POST ["rut"];
$elRut 				= $_POST ["elRut"];
$nombre 			= $_POST ["nombres"];
$paterno 			= $_POST ["apellido_pat"];
$materno 			= $_POST ["apellido_mat"];
$telefono1 			= $_POST ["fono1"];
$telefono2 			= $_POST ["fono2"];
$email 				= $_POST ["email"];
$direccion			= $_POST ["direccion"];
$comuna				= $_POST ["comuna"];



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



$mantenedor->InsertUpdate();

?>