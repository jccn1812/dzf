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

  public $IdTipoInforme;
  public $numeroInforme;   
  public $ot;              
  public $sello;           
  
  public $IdEstado;       
  public $fechaInicioVcto; 
  public $fechaFinVcto;    

  public $filasInforme; 
  public $diasPorVencer;    

  public $pagina;    
  


  // Los sets para las propiedades
  
  function setIdInforme($IdInforme)
  {
  	$this->IdInforme = $IdInforme;
  }
  
  function setIdEmpresa($IdEmpresa)
  {
  	$this->IdEmpresa = $IdEmpresa;
  }
  
  function setIdTipoInforme($IdTipoInforme)
  {
  	$this->IdTipoInforme = $IdTipoInforme;
  }
 
  function setNumeroInforme($numeroInforme)
  {
  	$this->numeroInforme = $numeroInforme;
  }
 
  function setOt($ot)
  {
  	$this->ot = $ot;
  }

  function setSello($sello)
  {
  	$this->sello = $sello;
  }

  function setIdEstado($idEstado)
  {
  	$this->idEstado = $idEstado;
  }

  function setFechaInicioVcto($fechaInicioVcto)
  {
  	$this->fechaInicioVcto = $fechaInicioVcto;
  }

  function setFechaFinVcto($fechaFinVcto)
  {
  	$this->fechaFinVcto = $fechaFinVcto;
  }

  function setFilasInforme($filasInforme)
  {
  	$this->filasInforme = $filasInforme;
  }

  function setDiasPorVencer($diasPorVencer)
  {
  	$this->diasPorVencer = $diasPorVencer;
  }

  function setPagina($pagina)
  {
  	$this->pagina = $pagina;
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

 public function listaInformesPorCriterio()
 {

  if($this->pagina==1) $this->pagina = 0; 

  $connection = Database::Connect();
  $this->query =  "CALL sp_etereusCMS_select_listaInformesPorCriterio(
                  ".$this->ChequeaNull ($this->numeroInforme,"S").",
                  ".$this->ChequeaNull ($this->IdTipoInforme,"S").",
                  ".$this->ChequeaNull ($this->ot,"S").",";
  
  if(empty($this->sello)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->sello."'," ; 
  }

  $this->query = $this->query .$this->ChequeaNull ($this->IdEmpresa,"N").",";

  if(empty($this->fechaInicioVcto)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->fechaInicioVcto."'," ; 
  }

  if(empty($this->fechaFinVcto)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->fechaFinVcto."'," ; 
  }

  $this->query = $this->query .$this->ChequeaNull ($this->idEstado,"S").",
                ".$this->ChequeaNull ($this->diasPorVencer,"N").",
                ".$this->ChequeaNull ($this->filasInforme,"S").",
                ".$this->pagina .")";
  
  $this->result = Database::Reader($this->query,$connection);
  Database::desconectar($connection);
  return $this->result;
 }
    
 public function cuentaInformesPorCriterio()
 {
  $connection = Database::Connect();
  $this->query =  "CALL sp_etereusCMS_select_cuentaInformesPorCriterio(
                  ".$this->ChequeaNull ($this->numeroInforme,"S").",
                  ".$this->ChequeaNull ($this->IdTipoInforme,"S").",
                  ".$this->ChequeaNull ($this->ot,"S").",";

                  
  
  if(empty($this->sello)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->sello."'," ; 
  }

  $this->query = $this->query .$this->ChequeaNull ($this->IdEmpresa,"N").",";

  if(empty($this->fechaInicioVcto)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->fechaInicioVcto."'," ; 
  }

  if(empty($this->fechaFinVcto)){
    $this->query = $this->query . "NULL,";
  }                
  else
  {
    $this->query = $this->query . "'" .$this->fechaFinVcto."'," ; 
  }

  $this->query = $this->query .$this->ChequeaNull ($this->idEstado,"S").",
                ".$this->ChequeaNull ($this->diasPorVencer,"N").")";
  


  $this->result = Database::Reader($this->query,$connection);
  Database::desconectar($connection);
  return $this->result;
 }


 
 function ChequeaNull($valorConvertir,$esNumero)
 {
  $valorDevolver = "";
  if ($valorConvertir=="" )
    {
     $valorConvertir =  "NULL";
    }
 

 return $valorConvertir;


 }



}

?>
