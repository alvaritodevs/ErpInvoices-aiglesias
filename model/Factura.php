<?php
class Factura extends EntidadBase{
 
    private $id;
    private $fecha;
    private $id_empresas;
    private $id_incidencias;
    private $baseimponible;
    private $iva;
    private $total;
  
    private $created_at;
    private $updated_at;
    
    
     public function __construct($adapter) {
        $table="facturas";
        parent::__construct($table, $adapter);
    }
    
    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getId_empresas() {
        return $this->id_empresas;
    }

    function getId_incidencias() {
        return $this->id_incidencias;
    }

    function getbaseimponible() {
        return $this->baseimponible;
    }

    function getIva() {
        return $this->iva;
    }

    function getTotal() {
        return $this->total;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function getUpdated_at() {
        return $this->updated_at;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setId_empresas($id_empresas): void {
        $this->id_empresas = $id_empresas;
    }

    function setId_incidencias($id_incidencias): void {
        $this->id_incidencias = $id_incidencias;
    }

    function setbaseimponible($baseimponible): void {
        $this->baseimponible = $baseimponible;
    }

    function setIva($iva): void {
        $this->iva = $iva;
    }

    function setTotal($total): void {
        $this->total = $total;
    }

    function setCreated_at($created_at): void {
        $this->created_at = $created_at;
    }

    function setUpdated_at($updated_at): void {
        $this->updated_at = $updated_at;
    }

    
        
    public function save(){

        $queryIncidencias="UPDATE incidencias set facturada='1' WHERE id ='".$this->id_incidencias."';";
        $inci=$this->db()->query($queryIncidencias);

        $query="INSERT INTO `facturas`(`id`, `fecha`, `id_empresas`, `id_incidencias`, `baseimponible`, `iva`, `total`, `created_at`, `updated_at`) VALUES (NULL,
                       '".$this->fecha."',
                       '".$this->id_empresas."',
                       '".$this->id_incidencias."',
                       '".$this->baseimponible."',
                       '".$this->iva."',
                        '".$this->total."',
                    
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE facturas SET   
                       fecha='".$this->fecha."',
                       id_empresas='".$this->id_empresas."',
                       id_incidencias='".$this->id_incidencias."',
                       baseimponible='".$this->baseimponible."',
                       iva='".$this->iva."',
                       total='".$this->total."',
                    
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>