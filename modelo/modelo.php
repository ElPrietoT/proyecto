<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../visualizar/conexion/conexion.php";
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
			$sql="select * from empleados";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay empleados registrados";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Ver</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<td align='center'>".$row["rut_empleados"]."</td>";
			echo "<td align='center'>".$row["nombre_empleados"]."</td>";
			echo "<td><a href='../administradores/mostrandatos.php?listar_entradas=si&codigo=".$row["nombre_empleados"]."'>Ver</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
		}

		//-------MUESTRA VEHICULOS DE LA BASE DE DATOS------

		function listar_vehiculos(){
			$sql="select * from vehiculos";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay empleados registrados";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Marca</th>
					<th>Patente</th>
					<th>Ver</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<td align='center'>".$row["patentes"]."</td>";
			echo "<td align='center'>".$row["marca"]."</td>";
			echo "<td><a href='../administradores/mostrandatos.php?eliminar=si&codigo=".$row["id_vehiculos"]."'>Ver</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
		}

		//---------------------------------------------------------------------------------------------------------------------------
		function mostrar(){
			$kp=$_GET["codigo"];
			echo $kp;
			$sql = "select from entrada where Nombre = " .$kp;
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay registros";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Fecha Entrada</th>
					<th>Hora Entrada</th>
					<th>Emtrada/Salida</th>
					<th>Vehiculo</th>
					<th>Ver</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<td align='center'>".$row["Rut"]."</td>";
			echo "<td align='center'>".$row["Nombre"]."</td>";
			echo "<td align='center'>".$row["Fechaentrada"]."</td>";
			echo "<td align='center'>".$row["Horaentrada"]."</td>";
			echo "<td align='center'>".$row["EntradaSalida"]."</td>";
			echo "<td align='center'>".$row["patentes"]."</td>";
			echo "<td><a href='../administradores/mostrandatos.php?eliminar=si&codigo=".$row["id_empleados"]."'>Ver</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
		}


		//----------Muestra vehiculos

		 function mostrar_vehiculos(){
			$sql = "select from registro_vehiculos where Nombre = ";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay registros";
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Fecha Entrada</th>
					<th>Hora Entrada</th>
					<th>Emtrada/Salida</th>
					<th>Vehiculo</th>
					<th>Ver</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<td align='center'>".$row["Rut"]."</td>";
			echo "<td align='center'>".$row["Nombre"]."</td>";
			echo "<td align='center'>".$row["Fechaentrada"]."</td>";
			echo "<td align='center'>".$row["Horaentrada"]."</td>";
			echo "<td align='center'>".$row["EntradaSalida"]."</td>";
			echo "<td align='center'>".$row["patentes"]."</td>";
			echo "<td><a href='../administradores/mostrandatos.php?eliminar=si&codigo=".$row["id_empleados"]."'>Ver</a></td></tr>";
			$i++;
			}
			}
			echo "</table>";
		}

		//---------------------------------------------------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from empleados where id_empleados = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){
				echo "<script>
						location.href='../administradores/empleados.php';
				</script>";
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../administradores/empleados.php';
				</script>";
				}
		}
		//--------------------------------------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * from empleados where rut_empleados like '%".$dato."%' OR nombre_empleados like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Ver</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){
			echo "<tr><td align='center'>".$row["rut_empleados"]."</td>";
			echo "<td align='center'>".$row["nombre_empleados"]."</td>";
			echo "<td><a href='../control/controlador.php?eliminar=si&codigo=".$row["id_empleados"]."'>Ver</a></td></tr>";
			$i++;
			}
			}
			echo "</tbody></table>";
		}
	}
?>
