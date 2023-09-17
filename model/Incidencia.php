<?php
class Incidencia extends EntidadBase{
 
    private $id;
    private $fecha;
    private $id_empresas;
    private $descripcion;
    private $estado;
    private $duracion;
    private $facturada;
   
    private $created_at;
    private $updated_at;
    
      public function __construct($adapter) {
        $table="incidencias";
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

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getFacturada() {
        return $this->facturada;
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

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setDuracion($duracion): void {
        $this->duracion = $duracion;
    }

    function setFacturada($facturada): void {
        $this->facturada = $facturada;
    }

    function setCreated_at($created_at): void {
        $this->created_at = $created_at;
    }

    function setUpdated_at($updated_at): void {
        $this->updated_at = $updated_at;
    }

       
    
    
        

    public function save(){
        $query="INSERT INTO `incidencias`(`id`, `fecha`, `id_empresas`, `descripcion`, `estado`, `duracion`, `facturada`, `created_at`, `updated_at`) VALUES (NULL,
                       '".$this->fecha."',
                       '".$this->id_empresas."',
                       '".$this->descripcion."',
                       '".$this->estado."',
                       '".$this->duracion."',
                       '".$this->facturada."',
                    
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE incidencias SET   
                       fecha='".$this->fecha."',
                       id_empresas='".$this->id_empresas."',
                       descripcion='".$this->descripcion."',
                       estado='".$this->estado."',
                       duracion='".$this->duracion."',
                       facturada='".$this->facturada."',
                    
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>