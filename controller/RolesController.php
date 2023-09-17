<?php
class RolesController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function columnas(){
        $roles=new Role($this->adapter);
        $cols=$roles->getColumnas();
        return $cols;
    }
    
    
    
    public function index(){
        
        //Creamos el objeto usuario
        $role=new Role($this->adapter);
        //Conseguimos todos los usuarios
        $allroles=$role->getAll();
      
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        //Conseguimos todos los usuarios
        $allusuarios=$usuario->getAll();
       
        //Cargamos la vista index y le pasamos valores
        $this->view("roles",array(
            "allroles"=>$allroles,
            "allusuarios"=>$allusuarios,
			
        ));
    }
    
    public function nuevo(){
        
       
       
        //Cargamos la vista index y le pasamos valores
        $this->view("newrole",array());
    }
    
    
    public function crear(){
        if(isset($_POST["role"])){
            if($_POST["role"]!=""){
            //Creamos un usuario
            $role=new Role($this->adapter);
            $role->setRole($_POST["role"]);
           
            $save=$role->save();
            }
        }
        $this->redirect("Roles", "index");
    }
    
    public function actualizar(){
       // if(isset($_POST["nombre"])){
            
            //Creamos un usuario
            $role=new Role($this->adapter);
            $role->setRole($_POST["role"]);
            $role->setId($_POST["id"]);
            $update=$role->update();
       // }
        //var_dump($update);
        $this->redirect("Roles", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $role=new Role($this->adapter);
            $role->deleteById($id); 
        }
        $this->redirect();
    }
    
    public function hola(){
        $usuarios=new UsuariosModel($this->adapter);
        $usu=$usuarios->getUnUsuario(1);
        
        //var_dump($usu);
        //Cargamos la vista detalle y le pasamos valores
       $this->view("detalle2",array(
            "usuario"=>$usu,

        ));
    }
    
    public function editar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            $roles=new RolesModel($this->adapter);
            $rol=$roles->getUnRole($id);
            $this->view("editrole",array(
            "role"=>$rol,
            ));
           
        }
        
    }
    
    public function getUnUsuario($id){
        $query="SELECT * FROM usuarios WHERE id='".$id."'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
    
    public function exportar(){
      /* $html="<table>";
        $html.="<tr>";
        $html.="<th>id</th>";
         $html.="<th>Role</th>";
        $html.="</tr>";
        
        $roles=new Role($this->adapter);
        $allroles=$roles->getAll();
        foreach($allroles as $role){
            $html.="<tr>";
            $html.="<td>".$role->id."</td>";
            $html.="<td>".$role->role."</td>";
            $html.="</tr>";
        }
        
        $html.="</table>";*/
        $roles=new Role($this->adapter);
        $allroles=$roles->getAll();
        
       
        $html=new HTML();
        $filas=$html->generarTablaHtml($allroles);
        
       $excel=new EXCEL();
        $excel->generarExcel($filas,"Roles");
        
    }
    
    public function imprimir(){
             
        $roles=new Role($this->adapter);
        $role=$roles->getById($_GET["id"]);

        $html=new HTML();
        $ficha=$html->generarFichaHtml($role,"Role");

        $pdf=new PDF();
        $pdf->generarPdf($ficha,"Role");
        
    }
    
}
?>
