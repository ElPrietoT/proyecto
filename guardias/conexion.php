<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "curso";

		$conexion=mysql_connect($host, $user, $pass);
		mysql_select_db($db);

		$query = "SELECT * FROM empleados";
		$execute = mysql_query($query, $conexion);

		$rt = "SELECT * FROM vehiculos";
		$execute1 = mysql_query($rt, $conexion);

?>
