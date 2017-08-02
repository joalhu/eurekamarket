<?php
session_start();  //permiso para usar variables de sesion
//recuperar la data desde las variables de sesion
$lista=null;
if(isset($_SESSION["slista"])){
    $lista=$_SESSION["slista"];  //recuperamos los datos
    unset($_SESSION["slista"]);  //destruyo la variab de sesion
}
$error=null;
if(isset($_SESSION["serror"])){
    $error=$_SESSION["serror"];  //recuperamos los datos
    unset($_SESSION["serror"]);  //destruyo la variab de sesion
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script language="javascript">
 function cliente()   {
     location.href="indexCliente.php";
 }
 function producto(){
	 location.href="indexProducto.php";
 }
 function comprobante(){
	 location.href="indexComprobante.php";
 }
 </script>
</head>

<body>
<div id="cabecera">
<h1>Ventas</h1>
</div>
<form id="form1" name="form1" method="post" action="../controller/ComprobanteController.php">
<table width="90%" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
        <td><input name="button" type="button" class="boton" id="button" value="Producto" onclick="producto()"></td>
      <td><input name="button2" type="button" class="boton" id="button2" value="Cliente" onClick="cliente()"></td>
      <td><input name="button3" type="button" class="boton" id="button3" value="Comprobante" onClick="comprobante()"></td>
         </tr>
  </tbody>
</table>
<BR>

</form>
<br>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>