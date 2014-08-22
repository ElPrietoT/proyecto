<?php
	require ("../modelo/modelo.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var descripcion = "", dimension="", cantidad="", vestimado="", vreal="", diferencia="", observa="";

	function modificarInformacion(){
		descripcion = document.getElementById("descripcion_editar").value;
		dimension = document.getElementById("dimesion_editar").value;
		cantidad = document.getElementById("cantidad_editar").value;
		vestimado = document.getElementById("vestimado_editar").value;
		vreal = document.getElementById("vreal_editar").value;
		diferencia = document.getElementById("diferencia_editar").value;
    observa = document.getElementById("observa_editar").value;
     
		id = document.getElementById("id_editar").value;
		if(descripcion!="" && dimension!="" && cantidad!="" && vestimado!="" && vreal!="" && diferencia!="" && observa!=""){
			ajax_("../control/controlador.php?descripcion_editar="+descripcion+"&dimesion_editar="+dimension+"&cantidad_editar="+cantidad+"&vestimado_editar="+vestimado+"&vreal_editar="+vreal+"&diferencia_editar="+diferencia+"&observa_editar="+observa+"&id_editar="+id);
		}else{
			alert("Ingrese toda la informacion.");
		}
	}
</script>
</head>

<body>
<form>
  <?php
		if(isset($_GET["descripcion"]) && isset($_GET["dimension"]) && isset($_GET["cantidad"]) && isset($_GET["vestimado"]) && isset($_GET["vreal"]) && isset($_GET["diferencia"])&& isset($_GET["observa"])){
			$id=$_GET["id"];
			$descripcion=$_GET["descripcion"];
			$dimension=$_GET["dimension"];
			$cantidad=$_GET["cantidad"];
			$vestimado=$_GET["vestimado"];
			$vreal=$_GET["vreal"];
			$diferencia=$_GET["diferencia"];
      $observa=$_GET["observa"];
      
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
    <input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id; ?>" />
    <tr>
      <td>Descripcion</td>
      <td><input type="text" name="descripcion_editar" id="descripcion_editar" value="<?php echo $descripcion; ?>" /></td>
    </tr>
    <tr>
      <td>Dimensiones</td>
      <td><input type="text" name="dimesion_editar" id="dimesion_editar" value="<?php echo $dimension; ?>" /></td>
    </tr>
    <tr>
      <td>Cantidad</td>
      <td><input type="text" name="cantidad_editar" id="cantidad_editar"  value="<?php echo $cantidad; ?>" /></td>
    </tr>
    <tr>
      <td>Valor Estimado</td>
      <td><input type="text" name="vestimado_editar" id="vestimado_editar" value="<?php echo $vestimado; ?>" /></td>
    </tr>
    <tr>
      <td>Valor Real</td>
      <td><input type="text" name="vreal_editar" id="vreal_editar" value="<?php echo $vreal; ?>" /></td>
    </tr>
    <tr>
      <td>Diferencia</td>
      <td><input type="text" name="diferencia_editar" id="diferencia_editar" value="<?php echo $diferencia; ?>" /></td>
      </tr>
      <tr>
      <td>Observaciones</td>
      <td><input type="text" name="observa_editar" id="observa_editar" value="<?php echo $observa; ?>" /></td>
      </tr>
      
    <tr>
      <td colspan="3" align="center"><input type="button" value="Modificar" onclick="modificarInformacion();" /></td>
    </tr>
  </table>
  <div id="resultado" align="center"></div>
</form>
<br />
<br />
<br />
</body>
</html>
