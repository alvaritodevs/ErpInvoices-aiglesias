<?php
class FacturasModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="facturas";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnaFactura($id){
        $query="SELECT `facturas`.`id`, `facturas`.`fecha`, `facturas`.`id_empresas`, `empresas`.`nombre_comercial`, `facturas`.`id_incidencias`, `incidencias`.`fecha`, `incidencias`.`descripcion`, `facturas`.`baseimponible`, `facturas`.`iva`, `facturas`.`total`, `facturas`.`created_at`, `facturas`.`updated_at` FROM `facturas` ";
        $query.=" INNER JOIN empresas ON `facturas`.`id_empresas`=empresas.id";
      $query.=" INNER JOIN incidencias ON `facturas`.`id_incidencias`=incidencias.id";
         $query.=" WHERE  `facturas`.id='".$id."'";
        $factura=$this->ejecutarSql($query);
        return $factura;
    }
    
  public function getTodasFacturas(){

        //$query="SELECT `facturas`.`id`, `facturas`.`fecha`, `facturas`.`id_empresas`, `empresas`.`nombre_comercial`, `facturas`.`id_incidencias`, `incidencias`.`fecha` as fecha_incidencia, `incidencias`.`descripcion`, `facturas`.`baseimponible`, `facturas`.`iva`, `facturas`.`total`, `facturas`.`created_at`, `facturas`.`updated_at` FROM `facturas` ";

        $query="SELECT `facturas`.`id`, `facturas`.`fecha`, `facturas`.`id_empresas`, `empresas`.`nombre_comercial`, `facturas`.`id_incidencias`, `incidencias`.`fecha` as fecha_incidencia, `incidencias`.`descripcion`, `facturas`.`baseimponible`, `facturas`.`iva`, `facturas`.`total`, `facturas`.`created_at`, `facturas`.`updated_at` FROM `facturas` ";
        $query.=" INNER JOIN empresas ON `facturas`.`id_empresas`=empresas.id";
        $query.=" INNER JOIN incidencias ON `facturas`.`id_incidencias`=incidencias.id";
        
      
        $facturas=$this->ejecutarSqlV($query);
        return $facturas;
    }

   public function getTodasFacturasEmp($id_empresa){

    $query="SELECT * FROM `facturas` WHERE `id_empresas`= $id_empresa";

    $facturas=$this->ejecutarSqlV($query);
    return $facturas;
    
   } 
    
    
    
}
?>
