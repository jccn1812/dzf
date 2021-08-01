<?php
include_once '../class/constantes.php';
echo '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
						<title>Alcala - upload de archivos</title>
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
					  <td class="tdPopUp" height="22">Subir Imagen
					  </td>
					 </tr>
					 <tr>
					  <td>
						<form enctype="multipart/form-data" action="uploadFileImg.php" method="post">
						<input type="hidden" name="MAX_FILE_SIZE" value="700000">

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

			$hayRestriccion = ExisteRestriccionPorTipoArchivoImg;


			If($hayRestriccion == 1 && fileTypeImgUpload!=$tipo_archivo) //Existe restriccion para un tipo de archivo
			{
			  echo '<div id="content"><div id="divError"><img src="../images/advertencia.jpg" height="79" width="79" valign="top"><br>';
			  echo fileTypeIMGMsgError.'<br>';
			  echo $tipo_archivo .'<br>';
			  echo fileTypeImgUpload;

			  echo '</div></div></table>';
			  exit();

			}



			if(
			   ($tipo_archivo != fileTypeImgJPG) &&
			   ($tipo_archivo != fileTypeImgBMP)  &&
			   ($tipo_archivo != fileTypeImgGIF)  &&
			   ($tipo_archivo != fileTypeImgPNG) &&
			   ($tipo_archivo != fileTypeImgOtro)
			  )
			{

			  echo '<div id="content"><div id="divError"><img src="../images/advertencia.jpg" height="79" width="79" valign="top"><br>';
			  echo fileFileIMGMsgError.' '.$tipo_archivo;
			  echo '</div></div></table>';
			  exit();
			}


            $directorio = uploadFolder_images;


			echo '<tr>
				   <td>
				     <div id="content">';
						if (move_uploaded_file($_FILES['userfile']['tmp_name'], $directorio.$nombre_archivo)){
						   echo "<table cellspacing=3 cellpadding=2 border=0 width='100%' class='tablaContent'>";
						   echo "<tr><td colspan=2 class='tdPopUp'>El archivo fue cargado correctamente.</td></tr>";
						   echo "<tr><td class='nombrecampo'>Archivo </td><td class='nombrecampo'> $nombre_archivo</td></tr>";
						   echo "<tr><td class='nombrecampo'>Tipo </td><td class='nombrecampo'>$tipo_archivo </td></tr>";
						   echo "<tr><td class='nombrecampo'>valid. </td><td class='nombrecampo'>".fileTypeImgUpload."</td></tr>";


						   echo "</table><br>";
						   echo "<a href='#' onclick='window.close()'>Salir</a>";
						   echo "<script>window.opener.document.forms[0].nombreFotoPrincipal.value = '".$nombre_archivo."'</script>";
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