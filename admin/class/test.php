<?php

include_once ("constantes.php");
include_once ("class.database.php");
include_once ("class.BDusuarios.php");

echo BDserver . '<br>' ;
echo BDuser . '<br>';
echo BDpassword . '<br>';
echo BDBase . '<br>';


		$objUsuarios = new usuarios ( );
		$objUsuarios->setUsuarioId ('3');
		$DatosUser = $objUsuarios->datosUsuariosPorId ();
		$rowDatosUser = mysqli_fetch_object ( $DatosUser );

		echo $rowDatosUser->UserName;
		echo $rowDatosUser->Nombre;
		echo $rowDatosUser->Paterno;
		echo $rowDatosUser->Materno;
		echo $rowDatosUser->Email;
		echo $rowDatosUser->Fono1;
		echo $rowDatosUser->Fono2;
		echo $rowDatosUser->EstaActivo;



		try {
			$conexion = new mysqli(BDserver,BDuser,BDpassword,BDBase);

			if (mysqli_connect_errno()) {
				throw new Exception("La conexion fallo<br />");
			}

			else {
				$resultado = $conexion->query("call sp_EtereusCMS_select_ObtienePerfilPorNombrePerfil('3','SuperUsuario')");

				$row = $resultado->fetch_object();

				if ($row->TienePerfil=="1") {
					echo  'SI';

				}
				else {
					echo 'No';
					}
				
			}


		}
		catch (Exception $e) {
			echo $e->getMessage() . mysqli_connect_errno(). "<br />" .mysqli_connect_error();
		}
		$conexion->close();


		//Envio de correo
    	ini_set( 'display_errors', 1 );
    	error_reporting( E_ALL );
		$from = "test@hostinger-tutorials.com";
		$to = "test@hostinger.com";
		$subject = "Checking PHP mail";
		$message = "PHP mail works just fine";
		$headers = "From:" . $from;
		mail($to,$subject,$message, $headers);
		echo "The email message was sent.";




?>
