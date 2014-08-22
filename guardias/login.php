<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
    <meta name="description" content="esto es una prueba de html5" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Validación Guardias MPC</title>
    <link href="../estilo.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header>
      <img id="logo" src="../img/logompc.png"/>
      <p> GUARDIAS</p>
    </header>
    <section>
    <div id="fondoform">
  <form action="control.php" method="post">
<ul>
  <li>
   <label>Usuario:</label>
<?php
function saca_menu_desplegable2($ssql,$valor,$usuario){
   echo "<select name='usuario'>";
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
$ssql="SELECT idusuario, CONCAT( idusuario ) AS FNAME FROM guardias order by FNAME";
saca_menu_desplegable2($ssql,1,'FNAMES');
?>






  </li>
  <li>
   <label>Password:</label>
    <input name="clave" id="clave" required="required" type="password" />
    <button name="iniciar" type="submit"><img src="../img/boton.png"></button>
  </li>
</table>
</form>
</div>
</section>

<footer><p>CopyRight&copy; 2014 - Desarrollado por "Los Prietos"</p>
</footer>
</body>
</html>
