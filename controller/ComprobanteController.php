<?php
session_start();  //habilitar el uso de variables de session
require_once '../model/ComprobanteModel.php';
try {
    //Capturar el pedido del view sea que sea haya enviado
    //con POST / GET
    $op=$_REQUEST["opc"];
	if(isset($_POST["checks"])){ $casillas=$_POST["checks"]; }
	if(isset($_GET["cod"])) { $codigo=$_GET["cod"]; }
//	echo "Codigo: $codigo";
//	echo "Opcion: $op";
    //capturar los datos del formulario
    //los datos capturados son enviados al arreglo data
    if(isset($_POST["datos"])) { $data=$_POST["datos"]; } 
    //capturar los datos del filtro de busqueda
    if(isset($_POST["select"])) { $campo=$_POST["select"]; }
    if(isset($_POST["textfield"])) { $dato=$_POST["textfield"]; }
    //Instanciar el model
    $em=new ProductoModel();
    //Invocar al metodo
                    if($op=="Buscar"){                        
                    $_SESSION["slista"]=$em->buscar($campo, $dato);
                    }
	if($op=="Eliminar"){
		$em->eliminar($casillas);
		$_SESSION["slista"]=$em->listado();
	}
    if ($op=="Listado") {
        $_SESSION["slista"]=$em->listado();
    }
    if($op=="Insertar"){
        $em->insertar($data);
        $_SESSION["slista"]=$em->listado();
    }
	if($op=="Cargar"){	
        $_SESSION["sregistro"]=$em->cargar($codigo);        
		header("location: ../view/modificarComprobante.php");
		exit;
    }
		if($op=="Modificar"){	
        $em->modificar($data);
		$_SESSION["slista"]=$em->listado();
         }
} catch (Exception $exc) {
    $_SESSION["serror"]=$exc->getMessage();
}
//redireccionar hacia el view
header("location: ../view/indexComprobante.php");
?>