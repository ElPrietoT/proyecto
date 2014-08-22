<?php
	require("../modelo/modelo.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";
	//---------------------------------------------------------------------------------------------------------------------------
	if(isset($_GET["descripcion_editar"]) && isset($_GET["dimesion_editar"]) && isset($_GET["cantidad_editar"]) && isset($_GET["vestimado_editar"]) && isset($_GET["vreal_editar"]) && isset($_GET["diferencia_editar"]) && isset($_GET["observa_editar"]) && isset($_GET["id_editar"])){

			$objFormulario->modificarUsuario($_GET["descripcion_editar"],$_GET["dimesion_editar"],$_GET["cantidad_editar"],$_GET["vestimado_editar"],$_GET["vreal_editar"],$_GET["diferencia_editar"],$_GET["observa_editar"],$_GET["id_editar"]);
	}
//---------------------------------------------------------------------------------------------------------------------------
if(isset($_POST["descripcion_agregar"]) && isset($_POST["dimesion_agregar"]) && isset($_POST["cantidad_agregar"]) && isset($_POST["vestimado_agregar"]) && isset($_POST["vreal_agregar"]) && isset($_POST["diferencia_agregar"]) && isset($_POST["observa_agregar"])){
			$objFormulario->registrar1($_POST["descripcion_agregar"],$_POST["dimesion_agregar"],$_POST["cantidad_agregar"],$_POST["vestimado_agregar"],$_POST["vreal_agregar"],$_POST["diferencia_agregar"]);

		}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------
	if(isset($_POST["ot"]) && isset($_POST["oc"]) && isset($_POST["descripcion"]) && isset($_POST["dimension"]) && isset($_POST["cantidad"]) && isset($_POST["vestimado"]) && isset($_POST["vreal"]) && isset($_POST["diferencia"])){
			$objFormulario->registrar($_POST["ot"],$_POST["oc"],$_POST["descripcion"],$_POST["dimension"],$_POST["cantidad"],$_POST["vestimado"],$_POST["vreal"],$_POST["diferencia"],$_POST["observa"]);

		}
	//-------------------------ELIMINAR USUARIO-------------------------
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Seguro que desea eliminar el registro?");
				if(confirmar){
					location.href="controlador.php?confirmacion=si&codigo_user=<?php echo $_GET["codigo"]; ?>";
				}else{
					location.href="../administradores/empleados.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["codigo_user"]);
	}
	//---------MOSTRAR USUARIO---------




?>
