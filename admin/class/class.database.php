<?php
 include "constantes.php";
 Class Database
{
	public $connection;

	function __construct()
	{

		$databaseName = BDBase;
		$serverName   = BDserver;
		$databaseUser = BDuser;
		$databasePassword = BDpassword;
		$databasePort = BDPort;
        //$this->connection = mysql_connect ($serverName.":".$databasePort, $databaseUser, $databasePassword,false,65536) or die("error en la conexion");
       // $this->connection = mysql_connect ($serverName.":".$databasePort, $databaseUser, $databasePassword,false,131072) or die("error en la conexion");

        
		$this->connection = new mysqli($serverName, $databaseUser, "mishijos", $databaseName);

/*
		if ($this->connection)
		{
                      //  echo "La conexion se realizo" . "<br>";
			if (!mysql_select_db ($databaseName))
			{
                echo mysql_error();
				throw new Exception('Error al conectar la base de datos "'.$databaseName);
			}
		}
		else
		{
			throw new Exception('No es posible conectar la base de datos. Revise los parametros en configuration.php.');
		}
*/		
	}

	public function Connect()
	{
		static $database = null;
		//if (!isset($database))
		//{
		    $database = new Database();
	//	}
		return $database->connection;
	}

	public static function Reader($query, $connection)
	{

	    $cursor = mysqli_query($connection,$query)  ;
       //echo 'El error '.mysql_error();
       return $cursor;
	}

	public static function Read($cursor)
	{
		flush();
		return mysqli_fetch_assoc($cursor);
	}

	public static function NonQuery($query, $connection)
	{
		flush();
		mysqli_query($connection,$query);
		$result = mysqli_affected_rows($connection);
		//mysql_store_result($result);
		if ($result == -1)
		{
			return false;
		}
		return $result;

	}

	public static function Query($query, $connection)
	{
		flush();
		$result = mysqli_query($connection,$query) or die("Error en $sql <br>MySQL error: ".mysqli_error($connection));  ;
		return mysqli_num_rows($result);
	}

	public static function InsertOrUpdate($query, $connection)
	{
		flush();
		$result = mysqli_query($connection,$query) or die("Error en $sql <br>MySQL error: ".mysqli_error($connection)); ;
		return intval(mysql_insert_id($this->connection));
	}

	public function desconectar($connection)
	{
	    
         //echo "desconectamos". "<br>";
	    $est = mysqli_close($connection) or die("Error al cerrar xxx la conexión <br>MySQL error: ".mysqli_error($connection));
	    
         $connection = null;

         return ;
	}






}
?>
