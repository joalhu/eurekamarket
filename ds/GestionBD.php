<?php


class GestionBD extends PDO {
    //variables estaticas
    public static $instancia=null;
    
    //Metodo estatico (Patron de diseño singleton)
    public static function getInstancia(){
        if (self::$instancia==null) {
            self::$instancia=new GestionBD();            
        }
        return self::$instancia;
    }
    //metodo constructor
    public function __construct() {
        try {
        $servidor="eurekabankdb.mysql.database.azure.com";
        //$bdatos="ventas@eurekabankdb";
		$bdatos="eurekabank@eurekabankdb";
        $url="mysql:host=".$servidor.";dbname=".$bdatos;
        $user="eurekabank";
        $password="3ur3K4B@nk";
        parent::__construct($url, $user, $password);
        } catch (Exception $exc) {
            //El objeto exception será disparado a la capa anterior
            throw $exc;
        }
        }
        
        /**
         * Este metodo ejecuta comandos select
         */
        public function ejecutarConsulta($sql){
            try {
                //crear el comando
                $cmd=$this->prepare($sql);
                //Ejecutar el comando
                $cmd->execute();
                //Capturar resultado de la consulta y retornarlo
           return $cmd->fetchAll();
            } catch (Exception $exc) {
                throw $exc;
            }
                }
        //metodo para ejecutar comandos insert, update, delete, etc
         public function ejecutarActualizacion($sql){
             try {
                 $cmd=$this->prepare($sql);
                 $cmd->execute();
             } catch (Exception $exc) {
                 throw $exc;
             }
                  }       
}
