<? include("seguridad.php"); ?>
<?php
	require("../modelo/modelo.php");
	$objModelo = new Formulario();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Registro entrada</title>
<meta charset="utf-8"/>
<link href="../estilo-admin.css" rel="stylesheet" type="text/css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){ // Script del Navegador
    $("ul.subnavegador").not('.selected').hide();
    $("a.desplegable").click(function(e){
      var desplegable = $(this).parent().find("ul.subnavegador");
      $('.desplegable').parent().find("ul.subnavegador").not(desplegable).slideUp('slow');
      desplegable.slideToggle('slow');
      e.preventDefault();
    })
 });
</script>
</head>
<body>
	<header>
		<img id="logo" src="../img/logompc.png"/>
		<p>VISUALIZACION DE<br/> REGISTROS</p>
		<div id="usuario">
		<p>Usuario: <? echo $_SESSION["usuarioactual"]; ?></p><br>
		<a href="logout.php">Cerrar Sesion</a>
		</div>

	</header>

	<nav>
		<ul>
			<li>
				<a href="empleados.php">Empleados</a>
			</li>
			<li>
				<a href="visitas.php">Visitas</a>
			</li>
			<li>
				<a href="vehiculos.php">Vehiculos</a>
			</li>

		</ul>
	</nav>

	<section>
		<form action="" method="post">
			<input type="text" name="boxBuscar" id="boxBuscar" autofocus="autofocus" value="" placeholder="Ingrese un dato." />
			<button type="submit" name="botonBuscar" value="Buscar" id="botonBuscar">Buscar</button>


		<?php
			//----------------------BUSCAR USUARIO---------------------------------------------------------------------------
	if(isset($_POST["botonBuscar"]) && $_POST["boxBuscar"]!=""){
			$objModelo->buscar($_POST["boxBuscar"]);
	}else{
			$objModelo->listar_vehiculos();
	}
			?>


		</form>

	</section>






	<footer><p>CopyRight&copy; 2014 - Desarrollado por "Los Prietos"</p>
</footer>

</body>
</html>
