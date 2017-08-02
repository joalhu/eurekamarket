<?php


require_once '../ds/GestionBD.php';
class ComprobanteModel {
	public function cargar($cod){
       try {
           $sql="select * from comprobante where comp_codigo='$cod'";
		 //  echo $sql;
           $gbd=GestionBD::getInstancia();  //conexion
           $lista=$gbd->ejecutarConsulta($sql);
           if(count($lista)==0){  //esta vacio?
               //Interrumpe el programa y dispara el error de ejecucion
               //Es capturado por el catch
               throw new Exception("No se encontraron datos...");
           }
           return $lista;
       } catch (Exception $exc) {
           throw $exc;  //Lo dispara a la capa anterior (controller)
       }
      }

      public function buscar($campo,$valor){
       try {
           if($campo=="descripcion") {
           $sql="select * from comprobante where comp_codigo like'".$valor."%'";
           } else {
           $sql="select * from comprobante "
                   . "where ".$campo." like '".$valor."%'";    
           }
           $gbd=GestionBD::getInstancia();  //conexion
           $lista=$gbd->ejecutarConsulta($sql);
           if(count($lista)==0){  //esta vacio?
               //Interrumpe el programa y dispara el error de ejecucion
               //Es capturado por el catch
               throw new Exception("No se encontraron datos...");
           }
           return $lista;
       } catch (Exception $exc) {
           throw $exc;  //Lo dispara a la capa anterior (controller)
       }
      }
      
   public function listado(){
       try {
           $sql="select * from comprobante where comp_estado='1'";
           $gbd=GestionBD::getInstancia();  //conexion
           $lista=$gbd->ejecutarConsulta($sql);
           if(count($lista)==0){  //esta vacio?
               //Interrumpe el programa y dispara el error de ejecucion
               //Es capturado por el catch
               throw new Exception("No se encontraron datos...");
           }
           return $lista;
       } catch (Exception $exc) {
           throw $exc;  //Lo dispara a la capa anterior (controller)
       }
      }
    public function generarCodigo(){
        try {
            $sql="select lpad(pro_codigo+1,4,'0') from comprobante order by "
                    . "comp_codigo desc limit 0,1";
            $gbd=GestionBD::getInstancia();  //conexion
           $lista=$gbd->ejecutarConsulta($sql);
           return $lista[0][0];
        } catch (Exception $exc) {
            throw $exc;
        }
        }
      
	  public function eliminar($casillas){
          try {
			   $gbd=GestionBD::getInstancia();  //conexion
			  for($i=0;$i<count($casillas);$i++) {
              $sql="update comprobante set comp_estado='0' where comp_codigo='$casillas[$i]'";
              $gbd->ejecutarActualizacion($sql);
			  }
          } catch (Exception $exc) {
              throw $exc;
          }
            }
	  
	  
      public function insertar($datos){
          try {
              $cod=$this->generarCodigo();
              $sql="insert into comprobante values('$cod','$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]''1')";
              echo $sql;
              $gbd=GestionBD::getInstancia();  //conexion
              $gbd->ejecutarActualizacion($sql);
          } catch (Exception $exc) {
              throw $exc;
          }
            }
      
}
