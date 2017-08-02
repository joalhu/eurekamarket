<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div id="cabecera">
<p>Insertar Cliente</p>
</div>
<form action="../controller/ClienteController.php" method="post" name="form1" id="form1">
  <table width="45%" border="1" cellspacing="0" cellpadding="3">
    <tbody>
      <tr>
        <th colspan="2">NUEVO REGISTRO</th>
      </tr>
      <tr>
        <td width="34%">Razon Social</td>
        <td width="66%"><input type="text" name="datos[]" id="datos[]"></td>
      </tr>
       <tr>
        <td width="34%">RUC</td>
        <td width="66%"><input type="text" name="datos[]" id="datos[]"></td>
      </tr>
      <tr>
        <td>Direccion</td>
        <td><input type="text" name="datos[]" id="datos[]"></td>
      </tr>
      <tr>
        <td>Telefono</td>
        <td><input type="text" name="datos[]" id="datos[]"></td>
      </tr>
      <tr>
        <td>Correo</td>
        <td><input type="text" name="datos[]" id="datos[]"></td>
      </tr>
        
      <tr>
        <td colspan="2" align="center"><input name="opc" type="submit" class="boton" id="opc" value="Insertar"></td>
      </tr>
    </tbody>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>