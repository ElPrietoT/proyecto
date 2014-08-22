<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../conexion/conexion.php";
	class Formulario{
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		function Formulario(){
			$this->conexion= new  Conexion();
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function registrar1($modelo, $nombre, $marca, $placa, $color, $ciudad){

			$queryRegistrar = "insert into vehiculos (modelo, nombre, marca, placa, color, ciudad)
			values ('".$modelo."', '".$nombre."', '".$marca."', '".$placa."', '".$color."', '".$ciudad."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());

			if($registrar){
				echo "<script>location.href='../vista/index.php?mensaje=". $this->mensajeExito."';</script>";
			}else{
				echo "<script>location.href='../vista/index.php?mensaje=".$this->mensajeError."';</script>";
			}
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function registrar($ot, $oc, $descripcion, $dimension, $cantidad, $vestimado, $vreal, $diferencia, $observa){

			$queryRegistrar = "insert into vehiculos (ot, oc, descripcion, dimension, cantidad, vestimado, vreal, diferencia, observa)
			values ('".$ot."','".$oc."','".$descripcion."', '".$dimension."', '".$cantidad."', '".$vestimado."', '".$vreal."', '".$diferencia."', '".$observa."')";
			$registrar1 = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());

			if($registrar1){
				echo  $this->mensajeExito;
			}else{
				echo $this->mensajeError;
			}
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function listar(){
			$sql="select * from entrada";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			echo "<div id='content'>";
			if(mysqli_num_rows($rs)<1){
				echo "No hay vehiculos registrados";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Entrada/Salida</th>
					<th>Vehiculos</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<td align='center'>".$row["Rut"]."</td>";
			echo "<td align='center'>".$row["Nombre"]."</td>";
			echo "<td align='center'>".$row["Fechaentrada"]."</td>";
			echo "<td align='center'>".$row["Horaentrada"]."</td>";
			echo "<td align='center'>".$row["EntradaSalida"]."</td>";
			echo "<td align='center'>".$row["patentes"]."</td>";




			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?IDentrada='.$row["IDentrada"].'&Rut='.$row["Rut"].'&Nombre='.$row["Nombre"].'&Fechaentrada='.$row["Fechaentrada"].'&Horaentrada='.$row["Horaentrada"].'&EntradaSalida='.$row["EntradaSalida"].'&patentes='.$row["patentes"].'" >Cambiar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["IDentrada"]."'>Eliminar</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
			echo "</div>";
		}
		//---------------------------------------------------------------------------------------------------------------------------
		function modificarUsuario($descripcion, $dimension, $cantidad, $vestimado, $vreal, $diferencia, $observa, $id){
			$queryUpdate = "update vehiculos set descripcion = '".$descripcion."', dimension = '".$dimension."', cantidad = '".$cantidad."', vestimado = '".$vestimado."', vreal = '".$vreal."', diferencia = '".$diferencia."', observa = '".$observa."', where id = ".$id;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}

		//---------------------------------------------------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from entrada where IDentrada = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){
				echo "<script>
						location.href='../vista/modificarInformacion.php';
				</script>";
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../vista/modificarInformacion.php';
				</script>";
				}
		}
		//--------------------------------------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * from entrada where Rut like '%".$dato."%' OR Nombre like '%".$dato."%' OR Fechaentrada like '%".$dato."%' OR Horaentrada like '%".$dato."%' OR EntradaSalida like '%".$dato."%' OR patentes like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			echo "<div id='content'>";
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Entrada/Salida</th>
					<th>Vehiculos</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<tr><td align='center'>".$row["Rut"]."</td>";
			echo "<td align='center'>".$row["Nombre"]."</td>";
			echo "<td align='center'>".$row["Fechaentrada"]."</td>";
			echo "<td align='center'>".$row["Horaentrada"]."</td>";
			echo "<td align='center'>".$row["EntradaSalida"]."</td>";
			echo "<td align='center'>".$row["patentes"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../vista/fancyBoxModificar.php?id='.$row["IDentrada"].'&Rut='.$row["Rut"].'&Nombre='.$row["Nombre"].'&Fechaentrada='.$row["Fechaentrada"].'$Horaentrada='.$row["Horaentrada"].'$patentes='.$row["patentes"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["IDentrada"]."'>Eliminar</a></td></tr>";
			$i++;
			}
			}
			echo "</tbody></table>";
			echo "</div>";
		}
	}
?>
