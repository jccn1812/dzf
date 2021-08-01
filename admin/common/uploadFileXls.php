<?php
include_once '../class/constantes.php';

echo '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
						<title>be-Web.cl - upload de archivos</title>
						<link href="../css/estilo2.css" rel="stylesheet" type="text/css"
					</head>
					<html>
					<body class="estilo">
					<div id="content">
					<table cellspacing="0" cellpading="0" width="100%" border="0" height="100%" align="center" class="tablaContent">
					<tr>
					 <td>
						<table cellspacing="0" cellpading="0" height="140" border="0" align="center">
	';



		if ($_FILES['userfile']['name']=="")
		{
			echo '
					 <tr>
					  <td class="tdPopUp" height="22">Subir Archivo XLS
					  </td>
					 </tr>
					 <tr>
					  <td>
						<form enctype="multipart/form-data" action="uploadFileXls.php" method="post">
						<input type="hidden" name="MAX_FILE_SIZE" value="7000000">

						<input class="Boton" name="userfile" type="file">
					  </td>
					  </tr>
					  <tr>
					  <td>
						<input class="Boton" type="submit" value="Subir archivo">
						</form>
					  </td>
					  </tr>
					 ';
		}
		else
		{

		    //datos del archivo
			$nombre_archivo = $_FILES['userfile']['name'];
			$tipo_archivo   = $_FILES['userfile']['type'];
			$tamano_archivo = $_FILES['userfile']['size'];
			$tamano_archivo = round($tamano_archivo /1024);

			$hayRestriccion = ExisteRestriccionPorTipoArchivoXls;


			If($hayRestriccion == 1 && fileTypeXlsUpload!=$tipo_archivo) //Existe restriccion para un tipo de archivo
			{
			  echo '<div id="content"><div id="divError"><img src="../images/advertencia.jpg" height="79" width="79" valign="top"><br>';
			  echo fileTypeMsgError.'<br>';
			  echo $tipo_archivo;
			  echo '</div></div></table>';
			  exit();

			}



			if(
			   ($tipo_archivo != fileTypeDocWord) &&
			   ($tipo_archivo != fileTypeDocPDF)  &&
			   ($tipo_archivo != fileTypeDocXLS)  &&
			   ($tipo_archivo != fileTypeDocXLS)
			  )
			{
			  echo '<div id="content"><div id="divError"><img src="../images/advertencia.jpg" height="79" width="79" valign="top"><br>';
			  echo fileFileMsgError .'<br>';
			  echo "tamaño ".$_FILES['userfile']['type'].'<br>';
			  echo "tipo ".$tipo_archivo.'<br>';

			  echo '</div></div></table>';
			  exit();
			}

			if(strlen($nombre_archivo)>100)
			{
			 echo '<div id="content"><div id="divError"><img src="../images/advertencia.jpg" height="79" width="79" valign="top"><br>';
			 echo 'El nombre del archivo no debe sobrepasar los 100 caracteres<br>';

			 echo '</div></div></table>';
			  exit();

			}



            $directorio = uploadFolder_xls;


			echo '<tr>
				   <td>
				     <div id="content">';
						if (move_uploaded_file($_FILES['userfile']['tmp_name'], $directorio.$nombre_archivo)){
						   echo "<table cellspacing=3 cellpadding=2 border=0 width='100%' class='tablaContent'>";
						   echo "<tr><td colspan=2 class='tdPopUp'>El archivo fue cargado correctamente.</td></tr>";
						   echo "<tr><td class='nombrecampo'>Archivo </td><td class='nombrecampo'> $nombre_archivo</td></tr>";
						   echo "<tr><td class='nombrecampo'>Peso </td><td class='nombrecampo'>$tamano_archivo Kb</td></tr>";
						   echo "</table><br>";
						   echo "<a href='#' onclick='window.close()'>Salir</a>";
						   echo "<script>window.opener.document.forms[0].archivo.value = '".$nombre_archivo."'</script>";
						}else{
						   echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
						}
						echo '</div>
			       </td>
					  </tr>
					';
		}
echo '

        	</table>
         </td>
         </tr>
         </table>
         </div>

         &nbsp;&nbsp;
		</body>
		</html>';
?>