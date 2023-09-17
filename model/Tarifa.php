<?php
class Tarifa extends EntidadBase{

    private $id;
    private $tarifa;
    private $preciohora;
    private $iva;
 
   
    private $created_at;
    private $updated_at;
    
     public function __construct($adapter) {
        $table="tarifas";
        parent::__construct($table, $adapter);
    }
    
    function getId() {
        return $this->id;
    }

    function getTarifa() {
        return $this->tarifa;
    }

    function getPreciohora() {
        return $this->preciohora;
    }

    function getIva() {
        return $this->iva;
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

    function setTarifa($tarifa): void {
        $this->tarifa = $tarifa;
    }

    function setPreciohora($preciohora): void {
        $this->preciohora = $preciohora;
    }

    function setIva($iva): void {
        $this->iva = $iva;
    }

    function setCreated_at($created_at): void {
        $this->created_at = $created_at;
    }

    function setUpdated_at($updated_at): void {
        $this->updated_at = $updated_at;
    }

            

    public function save(){
        $query="INSERT INTO `tarifas`(`id`, `tarifa`, `preciohora`, `iva`, `created_at`, `updated_at`) VALUES (NULL,
                       '".$this->tarifa."',
                       '".$this->preciohora."',
                       '".$this->iva."',
                      
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE tarifas SET   
                       tarifa='".$this->tarifa."',
                       preciohora='".$this->preciohora."',
                       iva='".$this->iva."',
                      
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>