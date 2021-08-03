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
class empresas extends Database
{
  public $CompUltimoId;
  public $NroFilasAfectadas;
  public $query;
  public $result;
  
  public $existe;
  public $IdEmpresa;

  public $rut;
  public $password;
  

  // Los sets para las propiedades
  function setIdEmpresa($IdEmpresa)
  {
  	$this->IdEmpresa = $IdEmpresa;
  }

  function setRut($rut)
  {
  	$this->rut = $rut;
  }

  function setPassword($password)
  {
  	$this->password = $password;
  }
  
  


  public function datosEmpresaPorId()
  {

   $connection = Database::Connect();
   $this->query = "CALL sp_ContableJEE_select_datosEmpresaPorId(".$this->IdEmpresa.")";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;

  }

 
  public function listaEmpresas()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_contableJEE_select_listaEmpresas()";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }

  
  
  public function datosEmpresaActiva($IdAnnoContable)
  {
  	$connection = Database::Connect();
  	$this->query = "call sp_ContableJEE_select_datosAnnoActivo(".$IdAnnoContable.")";
  	$this->result = Database::Reader($this->query,$connection);
  	Database::desconectar($connection);
  	return $this->result;
  }
  
  public function datosLoginEmpresa()
  {
  	$connection = Database::Connect();
  	$this->query = "call sp_EtereusCMS_select_checkLoginClienteEmpresa('".$this->rut."','".$this->password."')";
    $this->result = Database::Reader($this->query,$connection);
  	Database::desconectar($connection);
  	return $this->result;
  }
  


  
  
  public function Elimina() {
  
  	$connection = Database::Connect ();
  
  	$this->query = "call sp_ContableJEE_delete_eliminaEmpresaPorId('" . $this->IdEmpresa . "')";
    echo $this->query;
  
  	try {
  		Database::NonQuery ( $this->query, $connection );
  		if (mysqli_errno ($connection) != 0) // Controla el error al borrar en cascada
  			throw new Exception ( 'No es posible eliminar la empresa indicada. Tiene datos relacionados.' );
  	} catch ( Exception $e ) {
  		$this->error = $e->getMessage ();
  	}
  
  	Database::desconectar ( $connection );
  	return;
  
  }
  
 
 


}

?>
