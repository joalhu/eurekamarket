<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div id="cabecera">
<p>Buscar Producto</p>
</div>
<form action="../controller/ClienteController.php" method="post" name="form1" id="form1">
  <table width="74%" border="1" cellspacing="0" cellpadding="3">
    <tbody>
      <tr>
        <td width="15%">Buscar por</td>
        <td width="23%"><select name="select" id="select">
          <option>Seleccionar campo</option>
          <option value="razon">Razon Social</option>
          <option value="pro_ubicacion">RUC</option>
          <option value="pro_unidad">Direccion</option>
          
        </select></td>
        <td width="19%">con el texto</td>
        <td width="29%"><input name="textfield" type="text" id="textfield" size="35"></td>
        <td width="14%"><input name="opc" type="submit" class="boton" id="opc" value="Buscar"></td>
      </tr>
    </tbody>
  </table>

</form>
</body>
</html>