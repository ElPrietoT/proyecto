<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
    <meta name="description" content="esto es una prueba de html5" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Visualizacion datos MPC</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
  </head>
  <body>

<?php

	include("conexion.php");

	date_default_timezone_set("Chile/Continental");
	$nombre = $_POST['nombre'];
	$rut = $_POST['rut'];
	$patentes = $_POST['patentes'];
	$fechaentrada=date("d-m-Y");
	$horaentrada=date("H:i:s");




		mysql_query("INSERT INTO entrada (IDentrada, Nombre, Rut, Fechaentrada, Horaentrada, patentes) VALUES('', '$nombre', '$rut', '$fechaentrada', '$horaentrada','$patentes' )");
		echo "<script>
              alert('Registro realizado con exito');
              location.href='empleados.php';</script>";

		/*
		echo "<h1>Entradas</h1>";
		echo "Tus datos son los siguientes: <br /><br /> Nombre: $nombre<br />Email: $email<br /><br />Fecha Entrada: $fechaentrada  <br /> Hora entrada: $horaentrada <br />";
		echo "<button><a href='entrada.html'>Volver</a></button>";


class conexion{

		function recuperarDatos(){
			include("conexion.php");
			$query= "SELECT * FROM entrada";
			$resultado = mysql_query($query);

			while($fila = mysql_fetch_array($resultado))
			{
				echo "<br/>Nombre: $fila[Nombre] <br/>";
				echo "Rut: $fila[Rut]<br/>";
				echo "Fecha y Hora: $fila[Fechaentrada]<br/>";
				echo "Hora: $fila[Horaentrada]<br/>";

			}

		}
	}
*/

$con= new conexion();
$con ->recuperarDatos();


?>
</body>
</html>
