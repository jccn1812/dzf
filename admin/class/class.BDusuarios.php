<?php

include_once('class.database.php');

/*------------------------------------------------------
 archivo de clase: class.BDUsuarios.php
 -----------------
 Descripción: Implementa la clase para los usuarios
 Aplicación : Portal de participación ciudadana

 Autor : Juan Carlos Campos N.
 Fecha : 18 de agosto 2008

 Ultima modificación : 18 de agosto 2008
*/
class usuarios extends Database
{
  public $CompUltimoId;
  public $NroFilasAfectadas;
  public $ResultadoLogin;
  public $query;
  public $UserNombre;
  public $UserPass;
  public $UserTipo;
  public $result;
  public $idServ;
  public $IdInstitucion;
  public $IdUser;
  public $existe;

  public $NombreCompleto;

  // Los sets para las propiedades
  function setUsuarioNombre($nomUsuario)
  {
   $this->UserNombre = $nomUsuario;
  }

  function setUsuarioPass($passUsuario)
  {
   $this->UserPass = $passUsuario;
  }

  function getExiste()
  {
  return $this->existe;
  }


  function getUsuarioNombre()
  {
   return $this->UserNombre;
  }

  function setUsuarioId($IdUsuario)
  {
   $this->IdUser = $IdUsuario;
  }

  function setUsuarioTipo($UserTipo)
  {
   $this->UserTipo = $UserTipo;
  }



  function getIdUsuario()
  {
   return $this->IdUsuario;
  }

 function getNombreCompleto()
  {
   return $this->NombreCompleto;
  }


  public function datosUsuario()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_EtereusCMS_select_DatosUsuario('".$this->IdUser."')";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }

  public function datosUsuariosPorId()
  {

   $connection = Database::Connect();
 
   $this->query = "CALL sp_EtereusCMS_select_DatosUsuarioPorId(".$this->IdUser.")";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;

  }

  public function listaUsuariosPorRolPorIdUsuario()
  {
    $connection = Database::Connect();
 
    $this->query = "CALL sp_etereusCMS_select_listaUsuariosPorIdPerfil(".$this->UserTipo.")";
    $this->result = Database::Reader($this->query,$connection);
    Database::desconectar($connection);
    return $this->result;
 



  }

  public function listaUsuariosPorTipo()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_appc_dos_select_ListaUsuarios('".$this->UserTipo."')";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }

  public function listaUsuarios()
  {
   $connection = Database::Connect();
   $this->query = "CALL sp_EtereusCMS_select_ListaUsuarios()";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;
  }


 
 
public function ObtienePermisosPorId(){
   $connection = Database::Connect();
   If(empty($this->IdUser))
     $arg = "NULL";
   else
     $arg = $this->IdUser;

   $this->query = "CALL sp_EtereusCMS_select_ListaPerfilesPorUsuario($arg)";
   $this->result = Database::Reader($this->query,$connection);
   Database::desconectar($connection);
   return $this->result;

}




public function DeterminaExiste()
{
   $connection = Database::Connect();
    $this->query = "CALL sp_etereuscms_select_loginusuario('$this->UserNombre', '$this->UserPass')";
    $this->result = Database::Reader($this->query,$connection);
    $row = mysqli_fetch_object($this->result);
    $this->existe = $row->Existe;
    $this->IdUsuario = $row->Existe;
    Database::desconectar($connection);
    return $this->result;


}

public function DeterminaLoginUsuario()
{
   $connection = Database::Connect();
    $this->query = "CALL sp_EtereusCMS_select_ObtieneDatosUsuarioLogin('$this->UserNombre', '$this->UserPass')";
    $this->result = Database::Reader($this->query,$connection);
    $row = mysqli_fetch_object($this->result);
    $this->IdUsuario = $row->IdUsuario;
    $this->NombreCompleto = $row->Nombre .' '.$row->Paterno.' '.$row->Materno;
    Database::desconectar($connection);

}


 



}

?>
