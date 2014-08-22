<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Mi ejemplo de select form db data filled</title>
  <meta content="enrique otero" name="author">
  <meta name="copyright" content="GNU_GPL">
</head>
<body>
<!--El código de la función lo tome de Miguel Angel Alvarez en
w3.desarrolloweb.com/articulos/1608.php
DesarrolloWeb es un buen sitio, no puedo negar lo mucho que me ha ayudado,
lo digo como gesto de agradecimiento y sin animo de promocionar a nadie...
!GRACIAS¡-->
<!--
Este escript sirve para llenar los campos "<option value></option>" y
"<option selected value></option>"
que son los posibles valores que el usuario puede seleccionar de un
de un formulario html del tipo "select" que es un "menú desplegable"
En este ejemplo tenemos dos bloques de código PHP:
-El primero de ellos define la función "saca_menu_desplegable"
-El segundo realiza la conexión con el servidor de BD, selecciona BD,
 establece el valor de la variable $ssql y ejecuta la función.
-->
<!--Debemos suponer que:
-Tenemos una base de datos llamada "obras"
-Tenemos una tabla llamada "CATALOG_ARTISTAS"
-Tenemos las columnas "ID, NOMBRE, APELL_PAT, APELL_MAT" dentro de nuestra tabla
-->
<?php
/*Definimos la función que buscará los registros en la base de datos.
Va a tener tres parametros:
1-$ssql----Que será el query para buscar los registros en la BD
2-$valor---Que sera el valor por defecto que tomará el
           formulario (en este caso 4 que corresponde a "pablo")
3-$nombre--Que será el nombre del formulario*/
function saca_menu_desplegable($ssql,$valor,$nombre){
/*con echo damos la instrucción para que se escriba la etiqueta
"<select name=''> que construye el formulario de lista "select"
y le pasamos el valor de la variable $nombre, no debemos olvidar
cerrar la etiqueta con otro echo al final "</select>"*/
   echo "<select name=\'$nombre\'>";
/*creamos la variable $resultado, que va a almacenar los resultados
del query, la función mysql_query obtiene como parametro la variable
ssql, que a su vez es parametro de la función saca_menu_desplegable*/
   $resultado=mysql_query($ssql);
/*sobre la variable resultado ejecutamos la funcion mysql_fetch_row que
devuelve la suguiente fila o null cuanod se acaban las filas (o la primera
fila, si existe, cuando comienza a ejecutarse) de los datos almacenados en
$result. Almacenamos cada fila obtenida en la variable $fila.
Finalmente, con la sentencia while, repetimos la operación mientras que
mysql_fetch_row nos devuelva una fila, el proceso se detiene cuando
fetch_row devuelve null, es decir, cuando se acaban las filas*/
   while ($fila=mysql_fetch_row($resultado)){
/*intecalado con el proceso anterior, por cada fila que fetch row devuelve,
la sentencia "if" comprueba si la fila es la que se selecciono como valor
por defecto, si cumple con el criterio entonces escribe la fila como la opción
por defecto del formulario, de lo contrario la escribe como opción normal.
Para terminar todo bien y poder ver los nombres en lugar de los ID's de cada
fila debemos tener cuidado al momento de escribirlos de foma tal que queden:
"echo "<option value='ID'>FNAME</option>" para los valores normales o ...
"echo "<option selected value='ID'>FNAME</option>" para el valor por defecto
Debemos pues saber que el método para acceder a las columnas de las filas
recuperadas por mysql_fetch_row y almacenadas dentro de una variable es:
$variable[No de columna]
En nuestro ejemplo esto es:
$fila[0]--> Será igual a la primera columna del registro, ocea ID
$fila[1]--> Será igual a la segunda columna del registro, ocea FNAME*/
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
/*Aquí comienza nuestro segundo bloque, lo primero que hacemos es
establecer la conexión con la BD*/
$conexion=mysql_connect("localhost","root","")
or die("Problemas en la conexion");
/*Seleccionamos la base de datos "obras"*/
mysql_select_db("curso",$conexion) or
die("Problemas en la seleccion de la base de datos");
/*Establecemos los valores de la variable $ssql que es la sentencia
sql que hará la búsqueda dentro de nuestra BD y nuestra tabla
En este caso le digo que seleccione el campo "ID" y posteriormente
le digo que también seleccione la concatenación de las cadenas de los
campos NOMBRE, APELL_PAT y APELL_MAT agregando especios en blanco
entre cada cadena. A esta concatenación la llamaremos "FNAME", de
"Full Name" o "nombre completo"; finalmente le pido que me ordene los
registros por FNAME, para tenerlos por orden alfabetico y no por su ID)*/
$ssql="SELECT id_guardias, CONCAT( nombre_guardias ) AS FNAME FROM guardias order by FNAME";
/*$ssql="select ID,NOMBRE from CATALOG_ARTISTAS";*/
/*Terminamos nuestro script con la llamada a la función
"saca_menu_desplegable", y le damos como parámetros:
-$ssql, la variable que contiene la sentencia sql para obtener los registros
-4, que corresponde al ID del registro que queremos tener por defecto en nuestro formulario
-'FNAMES', que es el nombre del formulario*/
saca_menu_desplegable($ssql,4,'FNAMES');
?>
<br>
<br>
<br>
<!--Finalmente pongo lo mismo pero sin tanto choro para poder copypastear el script-->
<?php
/*definición de la función*/
function saca_menu_desplegable2($ssql,$valor,$nombre){
   echo "<select name=\'$nombre\'>";
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
$ssql="SELECT id_empleados, CONCAT( nombre_empleados ) AS FNAME FROM empleados order by FNAME";
saca_menu_desplegable2($ssql,1,'FNAMES');
?>
</body>
</html>
