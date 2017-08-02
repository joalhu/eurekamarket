<?php
session_start();  //pedir permiso -uso de variab de sesion
$registro=null;
//recuperar datos desde la variable de sesion
if(isset($_SESSION["sregistro"])){
	$registro=$_SESSION["sregistro"];
	unset($_SESSION["sregistro"]);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div id="cabecera">
<p>Modificar Producto</p>
</div>
<form action="../controller/ProductoController.php" method="post" name="form1" id="form1">
  <table width="45%" border="1" cellspacing="0" cellpadding="3">
    <tbody>
      <tr>
        <th colspan="2"> REGISTRO ENCONTRADO</th>
      </tr>
      <tr>
        <td>Codigo</td>
        <td><input type="text" name="datos[]" id="datos[]" readonly value="<?php echo $registro[0][0];?>"></td>
      </tr>
      <tr>
        <td width="34%">Descripcion</td>
        <td width="66%"><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][1];?>"></td>
      </tr>
      <tr>
        <td>Unidad</td>
        <td><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][2];?>"></td>
      </tr>
      <tr>
        <td>Cantidad</td>
        <td><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][3];?>"></td>
      </tr>
      <tr>
        <td>Tipo de Producto</td>
        <td><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][4];?>"></td>
      </tr>
      <tr>
        <td>Precio</td>
        <td><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][5];?>"></td>
      </tr>
      <tr>
        <td>Ubicacion</td>
        <td><input type="text" name="datos[]" id="datos[]"  value="<?php echo $registro[0][6];?>"></td>
      </tr>
     
      <tr>
        <td colspan="2" align="center"><input name="opc" type="submit" class="boton" id="opc" value="Modificar"></td>
      </tr>
    </tbody>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>