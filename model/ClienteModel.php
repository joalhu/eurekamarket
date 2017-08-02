<?php


require_once '../ds/GestionBD.php';
class ClienteModel {
	public function cargar($cod){
       try {
           $sql="select * from cliente where cli_codigo='$cod'";
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
           if($campo=="razon") {
           $sql="select * from cliente where cli_razon like'".$valor."%'";
           } else {
           $sql="select * from cliente "
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
           $sql="select * from cliente where cli_estado='1'";
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
            $sql="select lpad(pro_codigo+1,4,'0') from cliente order by "
                    . "cli_codigo desc limit 0,1";
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
              $sql="update cliente set cli_estado='0' where cli_codigo='$casillas[$i]'";
              $gbd->ejecutarActualizacion($sql);
			  }
          } catch (Exception $exc) {
              throw $exc;
          }
            }
	  

	  
	  public function modificar($datos){
          try {
              $sql="update cliente set cli_razon='$datos[1]', cli_RUC='$datos[2]',  cli_direccion='$datos[3]', cli_telefono='$datos[4]', cli_correo='$datos[5]' where cli_codigo='$datos[0]'";
              $gbd=GestionBD::getInstancia();  //conexion
              $gbd->ejecutarActualizacion($sql);
          } catch (Exception $exc) {
              throw $exc;
          }
            }
	  
      public function insertar($datos){
          try {
              $cod=$this->generarCodigo();
              $sql="insert into cliente values('$cod','$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','1')";
              echo $sql;
              $gbd=GestionBD::getInstancia();  //conexion
              $gbd->ejecutarActualizacion($sql);
          } catch (Exception $exc) {
              throw $exc;
          }
            }
            
      
}
