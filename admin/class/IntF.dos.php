<?php

interface funcionalidad {
	public function getMantenedor($accion);
	public function recolectaRegistros();
	public function header();
	//public function headerForm($accion);
	public function InsertUpdate();
	public function formulario($accion);
	public function Elimina();
	public function footer();

}

?>
