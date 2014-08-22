<? include("seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
 <title>Registro entrada</title>
<meta charset="utf-8"/>
<link href="../estilo-menu.css" rel="stylesheet" type="text/css" />
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
		<p>VISITAS</p>

	</header>

	<section id="program">

      <ul class="navegador">
      <li><a href="#" class="desplegable">Entrada</a>
        <ul class="subnavegador">
          <li>
          	<div id="entrada">
				<form action="../procesar-visitas-entradas.php" method="POST">
				  <ul>
				    <li>
				        <label for="name">Nombre:</label>
                <input type="text" name="nombre_visita" required />
				    </li>
				    <li>
				      <label for="email">Rut:</label>
				      <input type ="text" name="rut" placeholder="12345678-9" required maxlength="10"/>
				    </li>
            <li>
                <label for="name">Empresa:</label>
                <input type="text" name="empresa" required />
            </li>
            <li>
                <label for="name">Visita a:</label>

              <?php
              function saca_menu_desplegable($ssql,$valor,$nombre){
   echo "<select name='nombre'>";
   $resultado=mysql_query($ssql);
   while ($fila=mysql_fetch_row($resultado)){
     if ($fila[0]==$valor){
       echo "<option selected value='$fila[0]'>$fila[1]</option>";
     }
     else{
       echo "<option value='$fila[0]'>$fila[1]</option>";
     }
  }
   echo "</select>";
}
?>
                <?php
/*ejecución de la función*/
$conexion=mysql_connect('localhost', 'root', '')
or die("Problemas en la conexion");
mysql_select_db("curso",$conexion) or
die("Problemas en la seleccion de la base de datos");
$ssql="SELECT nombre_empleados, CONCAT( nombre_empleados ) AS FNAME FROM empleados order by FNAME";
saca_menu_desplegable($ssql,1,'FNAMES');
?>


            </li>
            <li>
              <label for="obervacion">Observacion:</label><br/><br/>
              <textarea name="observacion"></textarea>



            </li>
				    <li>
				      <button type="submit">Enviar</button>
				      <button type="reset">Borrar</button><br><br>

				    </li>
				  </ul>
				</form>
				</div>
        </ul>
      </li><br><br>



      <li><a href="#" class="desplegable">Salida</a>
        <ul class="subnavegador">
          <li>
          	<div id="entrada">
				<form action="../procesar-visitas-salidas.php" method="POST">
				  <ul>
				    <li>
				        <label for="name">Nombre:</label>
				        <input type="text" name="nombre_salida" required />
				    </li>

				    <li>
				      <button type="submit">Enviar</button>
				      <button type="reset">Borrar</button><br><br>
				    </li>
				  </ul>
				</form>
				</div>

        </ul>
        </li>

    </section>


</body>
</html>
