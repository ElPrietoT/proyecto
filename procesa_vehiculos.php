<?php

	include("guardias/conexion.php");

	date_default_timezone_set("Chile/Continental");


if($row = mysql_fetch_array($execute)){
   $nombre = $_POST['nombre'];
}

if($rw = mysql_fetch_array($execute1)){
	$patente = $_POST['patentes'];
}

	$kilometraje = $_POST['kilometraje'];
	$destino = $_POST['destino'];
	$fechaentrada=date("d-m-Y");
	$horaentrada=date("H:i:s");
	$entrada= "entrada";




		mysql_query("INSERT INTO registro_vehiculos (id_registro_vehiculos, id_empleado, id_vehiculos, kilometraje, destino, fechaentrada, horaentrada, entrada) VALUES('', '$nombre', '$patente', '$kilometraje', '$destino', '$fechaentrada', '$horaentrada','$entrada' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='guardias/menu.php';</script>";



$con= new conexion();
$con ->recuperarDatos();


?>
