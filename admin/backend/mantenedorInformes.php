<?php
// Controla el mantenedor de empresa
include_once ("../class/class.htmlInformes.php");



$accion             = $_POST ["accion"];
$modificador        = $_POST ["laaccion"];
$IdInforme          = $_POST ["IdInforme"];
$IdTipoInforme      = $_POST ["cmbTipoInforme"];
$IdEmpresa          = $_POST ["IdEmpresa"];
$ot                 = $_POST ["ot"];
$numeroInforme      = $_POST ["numeroInforme"];
$descripcion        = $_POST ["descripcion"];
$fechaEmision       = $_POST ["fechaEmision"];
$fechaVencimiento   = $_POST ["fechaVencimiento"];
$IdUsuarioDirector  = $_POST ["cmbDirector"];
$IdUsuarioInspector = $_POST ["cmbInspector"];
$sello              = $_POST ["sello"];

$permisos           = $_POST ["perm"];


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
$mantenedor = new Htmlinformes ( );

$mantenedor->setIdInforme ( $IdInforme );
$mantenedor->setIdTipoInforme ( $IdTipoInforme );
$mantenedor->setIdEmpresa ( $IdEmpresa );
$mantenedor->setNumeroInforme ( $numeroInforme );

$mantenedor->setOt($ot);
$mantenedor->setDescripcion($descripcion);
$mantenedor->setFechaEmision ($fechaEmision);
$mantenedor->setFechaVencimiento($fechaVencimiento);
$mantenedor->setIdUsuarioDirector ( $IdUsuarioDirector );
$mantenedor->setIdUsuarioInspector ( $IdUsuarioInspector );

$mantenedor->setListaPermisos ( $permisos );
$mantenedor->setSello ( $sello );

$mantenedor->getMantenedor ( $accion );

?>

