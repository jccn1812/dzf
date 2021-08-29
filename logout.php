<?php
require_once 'admin/class/sesion.class.php';
session_start();

$sesion = new sesion();
$sesion->closeSession();
echo "1";

?>