<?php
	require ("../modelo/modelo.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>

</head>

<body>
<form class="form" action="../control/controlador.php" method="post" enctype="multipart/form-data">
      <div id="formulario">
          <h2>Solicitud Orden de compra</h2>

            <li>
              <label>Nombre</label>
            <input list="browsers" name="ot" id="ot"/>
              <datalist id="browsers">
              <option value="Gonzalo Burgos">
              <option value="Hector Prieto">
              <option value="Jano Perez">
              <option value="Alvaro">

            </datalist>

              </li>
            <li>
              <label>OC</label>
              <input type="text" name="oc" id="oc" value="" required="required" />
            </li>

            <li>
              <label>Descripcion</label>
              <input type="text" name="descripcion" id="descripcion" value="" required="required" />
            </li>
            <li>
              <label>Dimension</label>
            <input type="text" name="dimension" id="dimension" value="" required="required" />
            </li>
            <li>
            <label>Cantidad</label>
            <input type="number" value="" name="cantidad" id="cantidad" required="required" min="0" />
            </li>
              <li>
            <label>Valor estimado</label>
            <input type="text" name="vestimado" id="vestimado" value="" required="required" />
            </li>
            <li>
            <label>Valor real</label>
            <input type="text" name="vreal" id="vreal" value="" required="required" />
            </li>
            <li>
            <label>Diferencia</label>
            <input type="text" name="diferencia" id="diferencia" value="" required="required" />
            </li>
            <li>
            <label>Observacion</label>
            <input type="text" name="observa" id="observa" value="" required="required" />
            </li>

            <li>
            <button type="submit">Registrar</button>
            <a href='modificarInformacion.php' target="_blank";>Listar</a>
            </li>
            <?php
            if(isset($_GET["mensaje"])){
              echo "<center>".$_GET["mensaje"]."</center>";
            }
            ?>
            <br /><br />
    </div>
    </form>
<br />
<br />
<br />
</body>
</html>
