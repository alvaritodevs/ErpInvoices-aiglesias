<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;
   
    public function __construct($table, $adapter) {
        
        $this->table=(string) $table;
        
		
        //require_once 'Conectar.php';
        //$this->conectar=new Conectar();
        //$this->db=$this->conectar->conexion();
		 
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id"); 
        return $query;
    }
    
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
    

    /*
     * Aqui podemos montarnos un monton de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    public function getColumnas(){
         $db_cfg = include 'config/database.php';
        
        $query="SELECT COLUMN_NAME AS columna, COLUMN_TYPE AS tipo
            FROM information_schema.columns WHERE 1
            AND  table_schema = '".$db_cfg["database"]."'
            AND table_name = '".$this->table."' ORDER BY ORDINAL_POSITION;";
        $columnas=$this->db->query($query);
       while($row = $columnas->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
}
?>
