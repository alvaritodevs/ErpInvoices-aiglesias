<?php
class UsuariosController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function columnas(){
        $usuarios=new Usuario($this->adapter);
        $cols=$usuarios->getColumnas();
        return $cols;
    }
    
    
    
    public function index(){
        
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        
        //Conseguimos todos los usuarios
        $allusuarios=$usuario->getAll();
      
       
        //Creamos el objeto usuario
        $role=new Role($this->adapter);
        //Conseguimos todos los usuarios
        $allroles=$role->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view("usuarios",array(
            "allusuarios"=>$allusuarios,
            "allroles"=>$allroles,

			
        ));
    }
    
    public function inicio(){
        
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        
        //Conseguimos todos los usuarios
        $allusuarios=$usuario->getAll();
      
       
        //Creamos el objeto usuario
        $role=new Role($this->adapter);
        //Conseguimos todos los usuarios
        $allroles=$role->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allusuarios"=>$allusuarios,
            "allroles"=>$allroles,

			
        ));
    }
    
    public function nuevo(){
         $role=new Role($this->adapter);
         $allroles=$role->getAll();
        
         $empresa=new Empresa($this->adapter);
            $allempresas=$empresa->getAll();   
        //Cargamos la vista index y le pasamos valores
        $this->view("newusuario",array("allroles"=>$allroles,"allempresas"=>$allempresas));
    }
    
    
    
    public function crear(){
        if(isset($_POST["nombre"])){
            
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
           $usuario->setUsername($_POST["username"]);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $usuario->setId_roles($_POST["id_roles"]);
            $usuario->setId_empresas($_POST["id_empresas"]);
            $save=$usuario->save();
        }
        $this->redirect("Usuarios", "index");
    }
    
    public function actualizar(){
       // if(isset($_POST["nombre"])){
            
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
            $usuario->setUsername($_POST["username"]);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $usuario->setId_roles($_POST["id_roles"]);
            $usuario->setId_empresas($_POST["id_empresas"]);
            $usuario->setId($_POST["id"]);
            $update=$usuario->update();
       // }
        $this->redirect("Usuarios", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $usuario=new Usuario($this->adapter);
            $usuario->deleteById($id); 
        }
        $this->redirect("Usuarios","index");
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
            $usuarios=new UsuariosModel($this->adapter);
            $usu=$usuarios->getUnUsuario($id);
            
            $role=new Role($this->adapter);
            $allroles=$role->getAll();
            
             $empresa=new Empresa($this->adapter);
            $allempresas=$empresa->getAll();           

            
            $this->view("editusuario",array(
            "usuario"=>$usu,
            "allroles"=>$allroles,
            "allempresas"=>$allempresas
            ));
           
        }
        
    }
    
    public function getUnUsuario($id){
        $query="SELECT * FROM usuarios WHERE id='".$id."'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
    
    public function exportar(){
       /*$html="<table>";
        $html.="<tr>";
        $html.="<th>id</th>";
         $html.="<th>email</th>";
         $html.="<th>password</th>";
         $html.="<th>nombre</th>";
         $html.="<th>apellido</th>";
         $html.="<th>id_roles</th>";
         $html.="<th>created_at</th>";
         $html.="<th>updated_at</th>";
        $html.="</tr>";
       
        $usuarios=new UsuariosModel($this->adapter);
        $allusuarios=$usuarios->getTodosUsuarios();
        foreach($allusuarios as $user){
            $html.="<tr>";
            $html.="<td>".$user->id."</td>";
            $html.="<td>".$user->email."</td>";
            $html.="<td>".$user->password."</td>";
            $html.="<td>".$user->nombre."</td>";
            $html.="<td>".$user->apellido."</td>";
            $html.="<td>".$user->role."</td>";
            $html.="<td>".$user->created_at."</td>";
            $html.="<td>".$user->updated_at."</td>";
            $html.="</tr>";
        }
        
        $html.="<table>";*/
         $usuarios=new UsuariosModel($this->adapter);
        $allusuarios=$usuarios->getTodosUsuarios();
         $html=new HTML();
        $filas=$html->generarTablaHtml($allusuarios);
       // var_dump($filas);
        $excel=new EXCEL();
        $excel->generarExcel($filas,"Usuarios");
        
    }

    public function exportaralt(){
        /*$html="<table>";
         $html.="<tr>";
         $html.="<th>id</th>";
          $html.="<th>email</th>";
          $html.="<th>password</th>";
          $html.="<th>nombre</th>";
          $html.="<th>apellido</th>";
          $html.="<th>id_roles</th>";
          $html.="<th>created_at</th>";
          $html.="<th>updated_at</th>";
         $html.="</tr>";
        
         $usuarios=new UsuariosModel($this->adapter);
         $allusuarios=$usuarios->getTodosUsuarios();
         foreach($allusuarios as $user){
             $html.="<tr>";
             $html.="<td>".$user->id."</td>";
             $html.="<td>".$user->email."</td>";
             $html.="<td>".$user->password."</td>";
             $html.="<td>".$user->nombre."</td>";
             $html.="<td>".$user->apellido."</td>";
             $html.="<td>".$user->role."</td>";
             $html.="<td>".$user->created_at."</td>";
             $html.="<td>".$user->updated_at."</td>";
             $html.="</tr>";
         }
         
         $html.="<table>";*/
          $usuarios=new UsuariosModel($this->adapter);
         $allusuarios=$usuarios->getTodosUsuariosEmp($_GET["id_empresas"]);
          $html=new HTML();
         $filas=$html->generarTablaHtml($allusuarios);
        // var_dump($filas);
         $excel=new EXCEL();
         $excel->generarExcel($filas,"Usuarios");
         
     }
    
    public function imprimir(){
             
        $usuarios=new UsuariosModel($this->adapter);
        $usuario=$usuarios->getDatosUsuario($_GET["id"]);
        $usuario->activo="SI";
        $html=new HTML();
        $ficha=$html->generarFichaHtml($usuario,'usuarios');

        $pdf=new PDF();
        $pdf->generarPdf($ficha,"Usuario");
        
    }
    
     public function enviaremail(){
             
        $usuarios=new Usuario($this->adapter);
        $usuario=$usuarios->getById($_GET["id"]);

      $html='Email de bienvenida.';
        $mail=new MAIL();
      $mail->enviarEmail($usuario->email,"juan@gmail.com","Empresa","Email de bienvenida.",$html);
        
    }
    
}
?>
