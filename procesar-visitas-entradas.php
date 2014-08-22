<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$nombre = $_POST['nombre_visita'];
	$rut = $_POST['rut'];
	$empresa = $_POST['empresa'];
	$visita = $_POST['nombre'];
	$observacion = $_POST['observacion'];
	$fechaentrada=date("d-m-Y");
	$horaentrada=date("H:i:s");
	$entrada= "entrada";




		mysql_query("INSERT INTO entrada_visita (id_entrada_visita, nombre_visita, rut_visita, empresa_visita, nombre_empleado, observacion, fechaentrada, horaentrada, entrada) VALUES('', '$nombre', '$rut', '$empresa', '$visita', '$observacion', '$fechaentrada', '$horaentrada','$entrada' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='guardias/menu.php';</script>";



$con= new conexion();
$con ->recuperarDatos();


?>
