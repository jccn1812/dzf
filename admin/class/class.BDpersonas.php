<?php

include_once('class.database.php');

/*------------------------------------------------------
 archivo de clase: class.Usuarios.php
 -----------------
 Descripción: Implementa la clase para los usuarios
 Aplicación : Portal de participación ciudadana

 Autor : Juan Carlos Campos N.
 Fecha : 18 de agosto 2008

 Ultima modificación : 18 de agosto 2008
*/
class personas extends Database
{
  public $CompUltimoId;
  public $NroFilasAfectadas;
  public $query;
  public $result;
  public $idPersona;
  public $existe;
  
  public $IdPersona;
  public $rut;

  // Los sets para las propiedades
  
  function setIdPersona($IdPersona)
  {
  	$this->IdPersona = $IdPersona;
  }
  
  
  function setRut($rut)
  {
  	$this->rut = $rut;
  }
  


  public function datosPersonaPorRut()
  {

   $connection = Database::Connect();
 
   $this->query = "CALL sp_EtereusCMS_select_datosPersonaPorRut('$this->rut')";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;

  }

 
  public function listaPersonas()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_EtereusCMS_select_listaPersonas()";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }

  public function listaTipoPersonas()
  {
  	$connection = Database::Connect();
  	$this->query = "CALL sp_EtereusCMS_select_listaTipoPersona()";
  	$this->result = Database::Reader($this->query,$connection);
  	Database::desconectar($connection);
  	return $this->result;
  }
  
  
  

  public function Elimina() {
  
  	$connection = Database::Connect ();
  
  	$this->query = "call sp_etereusCMS_delete_eliminaPersona('" . $this->rut . "')";
  
  	try {
  		Database::NonQuery ( $this->query, $connection );
  		if (mysqli_errno ($connection) != 0) // Controla el error al borrar en cascada
  			throw new Exception ( 'No es posible eliminar el cliente/proveedor indicado. Tiene datos relacionados.' );
  	} catch ( Exception $e ) {
  		$this->error = $e->getMessage ();
  	}
  
  	Database::desconectar ( $connection );
  	return;
  
  }
  
 
 


}

?>
