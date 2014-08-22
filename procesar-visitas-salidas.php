<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$nombre = $_POST['nombre_salida'];
	$rut ='';
	$empresa='';
	$visita = '';
	$observacion='';
	$fechaentrada=date("d-m-Y");
	$horasalida=date("H:i:s");
	$salida= "salida";
	$horaentrada="";
	$entrada= "";




		mysql_query("INSERT INTO entrada_visita (id_entrada_visita, nombre_visita, rut_visita, empresa_visita, nombre_empleado, observacion, fechaentrada, horaentrada, entrada, horasalida, salida) VALUES('', '$nombre', '$rut', '$empresa', '$visita', '$observacion', '$fechaentrada', '$horaentrada','$entrada', '$horasalida', 'salida' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='guardias/menu.php';</script>";



$con= new conexion();
$con ->recuperarDatos();


?>
