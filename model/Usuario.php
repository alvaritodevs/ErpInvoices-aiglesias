<?php
class Usuario extends EntidadBase{
   
    private $id;
    
    private $username;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $id_roles;
    private $id_empresas;
    private $created_at;
    private $updated_at;
    
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    
    public function getId_empresas() {
        return $this->id_empresas;
    }
    
    public function setId_empresas($id_empresas) {
        $this->id_empresas = $id_empresas;
    }
    
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getId_roles() {
        return $this->id_roles;
    }

    public function setId_roles($id_roles) {
        $this->id_roles = $id_roles;
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
        $query="INSERT INTO `usuarios`(`id`, `username`, `email`, `password`, `nombre`, `apellido`, `id_roles`, `id_empresas`, `created_at`, `updated_at`) VALUES (NULL,
                        '".$this->username."',
                       '".$this->email."',
                       '".$this->password."',
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->id_roles."',
                       '".$this->id_empresas."',
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE usuarios SET   
                        username='".$this->username."',
                       nombre='".$this->nombre."',
                       apellido='".$this->apellido."',
                       email='".$this->email."',
                       password='".$this->password."',
                       id_roles='".$this->id_roles."',
                       id_empresas='".$this->id_empresas."',
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>