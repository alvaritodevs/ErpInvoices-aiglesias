<?php
class IncidenciasModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="incidencias";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnaIncidencia($id){
        $query="SELECT * FROM incidencias WHERE id='".$id."'";
        $incidencia=$this->ejecutarSql($query);
        return $incidencia;
    }

    public function getUnaIncidenciaFactura($id){
        $query="SELECT `incidencias`.`id`, `incidencias`.`fecha`, `incidencias`.`id_empresas`, `incidencias`.`descripcion`, `incidencias`.`estado`, `incidencias`.`duracion`, `incidencias`.`facturada`, `incidencias`.`created_at`, `incidencias`.`updated_at` FROM `incidencias`   ";
        $query.=" INNER JOIN facturas ON `incidencias`.`id`=`facturas`.`id_incidencias` WHERE `incidencias`.`id`='".$id."'";
        $incidencia=$this->ejecutarSql($query);
        return $incidencia;
    }
    
    public function getTodasIncidencias(){
        $query="SELECT `incidencias`.`id`, `incidencias`.`fecha`, `incidencias`.`id_empresas`, `incidencias`.`descripcion`, `incidencias`.`estado`, `incidencias`.`duracion`, `incidencias`.`facturada`, `incidencias`.`created_at`, `incidencias`.`updated_at` FROM `incidencias`;  ";
        //$query.=" INNER JOIN empresas ON `incidencias`.`id_empresas`=empresas.id";
   
        $incidencias=$this->ejecutarSqlV($query);
        return $incidencias;
    }

    public function getTodasIncidenciasEmp($id_emp){
        $query="SELECT `incidencias`.`id`, `incidencias`.`fecha`, `incidencias`.`id_empresas`, `incidencias`.`descripcion`, `incidencias`.`estado`, `incidencias`.`duracion`, `incidencias`.`facturada`, `incidencias`.`created_at`, `incidencias`.`updated_at` FROM `incidencias`  ";
        $query.=" WHERE incidencias.id_empresas = ".$id_emp."";
   
        $incidencias=$this->ejecutarSqlV($query);
        return $incidencias;
    }
    
    
}
?>
