<?php 
echo '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
           <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
		   <script language="JavaScript" src="../js/jquery/jquery.js" type="text/javascript"></script>
           <script language="JavaScript" src="../js/personas.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacion.js" type="text/javascript"></script>
	       <script language="JavaScript" src="../js/validacionesDOM.js" type="text/javascript"></script>
           <script language="JavaScript">
           function asignaValidacion()
	    {
	      
          defineObjetoValidacion("cmbTipoPersona","Tipo de persona",TYPE_COMBO,OBLIGATORIO);
          defineObjetoValidacion("rut","Rut",TYPE_RUT,OBLIGATORIO);
          defineObjetoValidacion("nombres","Nombre/Raz\u00F3n social",TYPE_STRING,OBLIGATORIO);
          defineObjetoValidacion("apellido_pat","Apellido paterno",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("apellido_mat","Apellido materno",TYPE_STRING,OPCIONAL);
          defineObjetoValidacion("direccion","Direcci\u00F3n",TYPE_STRING,OBLIGATORIO);
          defineObjetoValidacion("comuna","Comuna",TYPE_STRING,OBLIGATORIO); 		 		 		 		 		 		 		
	    }
    
		asignaValidacion();
		</script>
	  </head>
	<body class="estilo">	
		<div id="containerPOP">
		
		<div class="estilo" id="#containerMain">
            <div class="estilo" id="contenedor_item">
		<div id="errores"></div>
		<form>
		<table width="200" border="0" cellspacing="2" cellpadding="2" align="center">
		<tr>
		<td>
			<label for="cmbTipoPersona">Tipo</label><br>';
			echo creaComboTipoPersona('');
		echo '<br><label for="rut"> Rut</label><br>
		<input type="text" id="rut" name="rut" /> 
			<label for="nombres"> Nombre/Razon S.</label>
		<input type="text" id="nombres" name="nombres" /> 
			<label for="apellido_pat">Paterno  </label> <input type="text" id="apellido_pat" name="apellido_pat" />
			<label for="apellido_mat">Materno   </label> <input type="text" id="apellido_mat" name="apellido_mat" />
		    <label for="fono1">Telefono 1   </label> <input type="text" id="fono1" name="fono1" />
			<label for="fono2">Telefono 2   </label> <input type="text" id="fono2" name="fono2" />	
			<label for="direccion">    Dirección </label> <input type="text" id="direccion" name="direccion" />
		    <label for="comuna">Comuna </label> <input type="text" id="comuna" name="comuna" />
				<div class="botonICNopt">
					<img title="Grabar Cliente/Proveedor" id="saveClienteProv"
						src="../images/correcto.png" width="25" heigth="25"/>
					    <img title="Cancelar el ingreso" id="cancelClienteProv"
						src="../images/cancelar.png" width="20" heigth="20" />
				</div>
			</td>
		</tr>
	</table>
				</form>
		</div>
		
		</div>
		</div>
	</body>	
';

function creaComboTipoPersona($comparador) {
	include_once("../class/class.BDpersonas.php");
	$objPersonas = new personas();
	$result =  $objPersonas->listaTipoPersonas();

	$comboTipo = '<select class="combo_txt" name="cmbTipoPersona" id="cmbTipoPersona">'.'\n';
	$comboTipo = $comboTipo .'<option value="" SELECTED>Seleccione el Tipo</option>'.'\n';


	while ($row = mysqli_fetch_array($result))
	{
		$comboTipo .=   '<option value="'.$row["IdTipoPersona"].'"';
		if($row["IdTipoPersona"] == $comparador )
		{
			$comboTipo .= ' selected';
		}

			
		$comboTipo .= '>'.$row["tipoPersona"]. '</option>'.'\n';

	}
	$comboTipo .= '</select>';


	echo $comboTipo;

}

?>