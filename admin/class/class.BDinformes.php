<?php

include_once('class.database.php');

/*------------------------------------------------------
 archivo de clase: class.Informes.php
 -----------------
 Descripción: Implementa la clase para los usuarios
 Aplicación : Portal de participación ciudadana

 Autor : Juan Carlos Campos N.
 Fecha : 18 de agosto 2008

 Ultima modificación : 18 de agosto 2008
*/
class informes extends Database
{
  public $CompUltimoId;
  public $NroFilasAfectadas;
  public $query;
  public $result;
  
  public $existe;
  
  public $IdInforme;
  public $IdEmpresa;
  

  // Los sets para las propiedades
  
  function setIdInforme($IdInforme)
  {
  	$this->IdInforme = $IdInforme;
  }
  
  function setIdEmpresa($IdEmpresa)
  {
  	$this->IdEmpresa = $IdEmpresa;
  }
  


  public function datosInformePorId()
  {

   $connection = Database::Connect();
   $this->query = "CALL sp_EtereusCMS_DatosInformePorId(".$this->IdInforme.")";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;

  }

 
  public function listaInformes()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_EtereusCMS_select_InformesPorIdEmpresa(".$this->IdEmpresa.")";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }
  
  
  
  public function Elimina() {
  
  	$connection = Database::Connect ();
  
  	$this->query = "call sp_EtereusCMS_delete_eliminaInformePorId('" . $this->IdInforme . "')";
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
  
  public function ObtieneCategoriasPorId(){
    $connection = Database::Connect();
    If(empty($this->IdInforme))
      $arg = "NULL";
    else
      $arg = $this->IdInforme;
 
    $this->query = "CALL sp_EtereusCMS_select_ListaCategoriasPorInforme($arg)";
    $this->result = Database::Reader($this->query,$connection);
    Database::desconectar($connection);
    return $this->result;
 
 }
 


}

?>
