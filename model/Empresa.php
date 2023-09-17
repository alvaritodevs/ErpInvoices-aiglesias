<?php
class Empresa extends EntidadBase{
   
    private $id;
    private $nombre_comercial;
    private $razon_social;
    
    private $direccion;
    private $cp;
    private $localidad;
    private $provincia;
    
    
    
    
    private $cif_nif_nie;
    private $telefono;
    private $email;
    private $persona_contacto;
    
    private $id_tarifas;
    
    private $logo;
    private $created_at;
    private $updated_at;
    function getDireccion() {
        return $this->direccion;
    }

    function getCp() {
        return $this->cp;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getId_tarifas() {
        return $this->id_tarifas;
    }

    function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    function setCp($cp): void {
        $this->cp = $cp;
    }

    function setLocalidad($localidad): void {
        $this->localidad = $localidad;
    }

    function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    function setId_tarifas($id_tarifas): void {
        $this->id_tarifas = $id_tarifas;
    }

        public function __construct($adapter) {
        $table="empresas";
        parent::__construct($table, $adapter);
    }
    function getId() {
        return $this->id;
    }

    function getNombre_comercial() {
        return $this->nombre_comercial;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getCif_nif_nie() {
        return $this->cif_nif_nie;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getPersona_contacto() {
        return $this->persona_contacto;
    }

    function getLogo() {
        return $this->logo;
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

    function setNombre_comercial($nombre_comercial): void {
        $this->nombre_comercial = $nombre_comercial;
    }

    function setRazon_social($razon_social): void {
        $this->razon_social = $razon_social;
    }

    function setCif_nif_nie($cif_nif_nie): void {
        $this->cif_nif_nie = $cif_nif_nie;
    }

    function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPersona_contacto($persona_contacto): void {
        $this->persona_contacto = $persona_contacto;
    }

    function setLogo($logo): void {
        $this->logo = $logo;
    }

    function setCreated_at($created_at): void {
        $this->created_at = $created_at;
    }

    function setUpdated_at($updated_at): void {
        $this->updated_at = $updated_at;
    }

        

    public function save(){
        $query="INSERT INTO `empresas`(`id`, `nombre_comercial`, `razon_social`, `direccion`, `cp`, `localidad`, `provincia`, `cif_nif_nie`, `telefono`, `email`, `persona_contacto`, `id_tarifas`, `logo`, `created_at`, `updated_at`) VALUES (NULL,
                       '".$this->nombre_comercial."',
                       '".$this->razon_social."',
                       '".$this->direccion."',
                       '".$this->cp."',
                       '".$this->localidad."',
                       '".$this->provincia."',
                       '".$this->cif_nif_nie."',
                       '".$this->telefono."',
                       '".$this->email."',
                       '".$this->persona_contacto."',
                       '".$this->id_tarifas."',
                       '".$this->logo."',
                       '".date("Y-m-d h:i:s")."',
                       '".date("Y-m-d h:i:s")."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
   public function update(){
      
       $query="UPDATE empresas SET   
                       nombre_comercial='".$this->nombre_comercial."',
                       razon_social='".$this->razon_social."',
                       direccion='".$this->direccion."',
                       cp='".$this->cp."',
                       localidad='".$this->localidad."',
                       provincia='".$this->provincia."',
                       cif_nif_nie='".$this->cif_nif_nie."',
                       telefono='".$this->telefono."',
                       email='".$this->email."',
                       persona_contacto='".$this->persona_contacto."',
                       id_tarifas='".$this->id_tarifas."',
                       logo='".$this->logo."',
                       updated_at='".date("Y-m-d h:i:s")."'
                       WHERE id='".$this->id."';";
        $update=$this->db()->query($query);
        //$this->db()->error;
        return $update;
    }
   
}
?>