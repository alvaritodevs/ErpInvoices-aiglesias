<?php
class TarifasModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="tarifas";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnaTarifa($id){
        $query="SELECT * FROM tarifas WHERE id='".$id."'";
        $cliente=$this->ejecutarSql($query);
        return $cliente;
    }
    
    public function getTodosClientes(){
        $query="SELECT `clientes`.`id`, `clientes`.`nombre`, `clientes`.`apellidos`, `clientes`.`nif`, `clientes`.`direccion`, `clientes`.`localidad`, `clientes`.`cp`, `clientes`.`provincia`, `clientes`.`pais`, `clientes`.`telefono`, `clientes`.`email`, `clientes`.`observaciones`, `clientes`.`id_empresas`, `clientes`.`created_at`, `clientes`.`updated_at`, `empresas`.`nombre_comercial` FROM `clientes` ";
        $query.=" INNER JOIN empresas ON `clientes`.`id_empresas`=empresas.id";
   
        $clientes=$this->ejecutarSqlV($query);
        return $clientes;
    }
    
    
}
?>
