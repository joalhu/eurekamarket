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
 function listado()   {
     location.href="../controller/ComprobanteController.php?opc=Listado";
 }
 function insertar(){
	 location.href="insertarComprobante.php";
 }
 function buscar(){
	 location.href="buscarComprobante.php";
 }
  function reporte(){
	 location.href="../Graficos/Grafico3.php";
 }
 </script>
</head>

<body>
<div id="cabecera">
<h1>COMPROBANTES</h1>
</div>
<form id="form1" name="form1" method="post" action="../controller/ComprobanteController.php">
<table width="90%" border="0" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
        <td><input name="button" type="button" class="boton" id="button" value="Listado" onclick="listado()"></td>
      <td><input name="button2" type="button" class="boton" id="button2" value="Insertar" onClick="insertar()"></td>
      <td><input name="opc" type="submit" class="boton" id="button3" value="Eliminar"></td>
      <td><input name="button4" type="button" class="boton" id="button4" value="Buscar" onClick="buscar()"></td>
      <td><input name="button4" type="button" class="boton" id="button4" value="Reporte" onClick="reporte()"></td>
    </tr>
  </tbody>
</table>
<BR>
<?php if(count($lista)>0) { ?>
  <table width="90%" border="1" cellspacing="0" cellpadding="3">
    <tbody>
      <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Codigo</th>
        <th scope="col">Fecha</th>
        <th scope="col">Cliente</th>
        <th scope="col">Productos</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Sub Total</th>
        <th scope="col">IGV</th>
        <th scope="col">Total</th>
     
      </tr>
      <?php foreach($lista as $fila) { ?>
      <tr>
        <td align="center"><input type="checkbox" name="checks[]" id="checks[]" value="<?php echo $fila[0];?>"></td>
        <td align="center">
        <a href="../controller/ComprobanteController.php?cod=<?php echo $fila[0];?>&opc=Cargar">
		<?php echo $fila[0];?></a>
        </td>
        <td><?php echo $fila[1];?></td>
        <td><?php echo $fila[2];?></td>
        <td><?php echo $fila[3];?></td>
        <td><?php echo $fila[4];?></td>
        <td><?php echo $fila[5];?></td>
        <td><?php echo $fila[6];?></td>
        <td><?php echo $fila[7];?></td>
        <td><?php echo $fila[8];?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } ?>
</form>
<br>
<?php if($error!=null) { ?>
<div id="error"><?php echo "Error: ". $error;?></div>
<?php } ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>