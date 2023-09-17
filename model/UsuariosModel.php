<?php
class UsuariosModel extends ModeloBase{
    private $table;
    
    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }
    
    //Metodos de consulta
    public function getUnUsuario($id){
        $query="SELECT * FROM usuarios WHERE id='".$id."'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
    
    public function getTodosUsuarios(){
        $query="SELECT `usuarios`.`id`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`id_empresas`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`id_roles`, `usuarios`.`created_at`, `usuarios`.`updated_at`,roles.role as role FROM `usuarios` ";
        $query.=" LEFT JOIN roles ON `usuarios`.`id_roles`=roles.id";
        
        $usuarios=$this->ejecutarSqlV($query);
        return $usuarios;
    }

    public function getTodosUsuariosEmp($id_emp){
        $query="SELECT `usuarios`.`id`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`nombre`, `usuarios`.`id_empresas`, `usuarios`.`apellido`, `usuarios`.`id_roles`, `usuarios`.`created_at`, `usuarios`.`updated_at`,roles.role as role FROM `usuarios` ";
        $query.=" LEFT JOIN roles ON `usuarios`.`id_roles`=roles.id WHERE usuarios.id_empresas =".$id_emp."";
        
        $usuarios=$this->ejecutarSqlV($query);
        return $usuarios;
    }
    
    public function getDatosUsuario($id){
        $query="SELECT `usuarios`.`id` as Id, `usuarios`.`email` as Email, `usuarios`.`password` as Password, `usuarios`.`nombre` as Nombre, `usuarios`.`apellido` as Apellido, roles.role as Role, `usuarios`.`created_at` as Creado, `usuarios`.`updated_at` as Actualizado FROM `usuarios` ";
        $query.=" LEFT JOIN roles ON `usuarios`.`id_roles`=roles.id";
        $query.=" WHERE `usuarios`.`id`=".$id;
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
    
    
}
?>
