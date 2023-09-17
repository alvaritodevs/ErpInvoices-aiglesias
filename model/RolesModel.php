<?php
class RolesModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="roles";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnRole($id){
        $query="SELECT * FROM roles WHERE id='".$id."'";
        $role=$this->ejecutarSql($query);
        return $role;
    }
    
    
}
?>
