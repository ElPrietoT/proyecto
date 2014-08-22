<?php

	class conexion{

		function recuperarDatos(){
			include("conexion.php");
			$query= "SELECT * FROM registros";
			$resultado = mysql_query($query);

			while($fila = mysql_fetch_array($resultado))
			{
				echo "$fila[Nombre] <br/>";
				echo "$fila[Email]<br/>";
			}

		}
	}

?>
