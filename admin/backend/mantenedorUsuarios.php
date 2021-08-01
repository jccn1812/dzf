<?php
// Controla los mantenedores de usuarios
include_once '../common/funciones.php';
include_once ("../class/class.htmlUsuarios.php");



$accion = $_POST ["accion"];
$modificador = $_POST ["laaccion"];
$IdUsuario = $_POST ["IdUsuario"];
$UserName = $_POST ["name_sesion"];
$elIdUsuario = $_POST ["IdUsuario"];
$elnombre = $_POST ["nombres"];
$elpaterno = $_POST ["apellido_pat"];
$elmaterno = $_POST ["apellido_mat"];
$laclave = $_POST ["pass1"];
$elemail = $_POST ["email"];
$eltelefono1 = $_POST ["fono1"];
$eltelefono2 = $_POST ["fono2"];
$permisos = $_POST ["perm"];
$elestaactivo = $_POST ["estaactivo"];
$profesion = $_POST ["profesion"];

/*
 ---------------------------
 | Acciones del formulario |---------------------------------------
 ---------------------------
 - Accion por defecto : Mostrar la lista de usuarios según tipo
 - 1 : Ver los datos del usuario
 - 2 : Editar un usuario (Formulario)
 - 3 : Ingresar un usuario (Formulario)
 - 4 : Grabar ingreso o modificaciones. Se recibe el formulario
 ----------------------------------------------------------------
*/

$mantenedor = new Htmlusuarios ( );



$mantenedor->setIdUsuario ( $IdUsuario );
$mantenedor->setUserName ( $UserName );
$mantenedor->setNombre ( $elnombre );
$mantenedor->setPaterno ( $elpaterno );
$mantenedor->setMaterno ( $elmaterno );
$mantenedor->setClave ( $laclave );
$mantenedor->setEmail ( $elemail );
$mantenedor->setFono1 ( $eltelefono1 );
$mantenedor->setFono2 ( $eltelefono2 );
$mantenedor->setlaAccion ( $modificador );
$mantenedor->setEstaActivo ( $elestaactivo );
$mantenedor->setListaPermisos ( $permisos );
$mantenedor->setProfesion ( $profesion );

$mantenedor->getMantenedor ( $accion )?>

