<?php
class EmpresasModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="empresas";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnaEmpresa($id){
        $query="SELECT * FROM empresas WHERE id='".$id."'";
        $empresa=$this->ejecutarSql($query);
        return $empresa;
    }
    
    public function getEmpresasId($id){
        $query="SELECT * FROM empresas WHERE id='".$id."'";
        $empresa=$this->ejecutarSqlV($query);
        return $empresa;
    }
    
}
?>
