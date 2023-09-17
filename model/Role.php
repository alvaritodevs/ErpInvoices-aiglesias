<?php
class Role extends EntidadBase{
    private $id;
    private $role;
    private $created_at;
    private $updated_at;
    
    public function __construct($adapter) {
        $table="roles";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }
    
    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function save(){
        $query="INSERT INTO roles (id,role,created_at,updated_at)
                VALUES(NULL,
                       '".$this->role."',
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE roles SET   
                       role='".$this->role."',
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>