<?php
class IncidenciasController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function columnas(){
        $incidencias=new Incidencia($this->adapter);
        $cols=$incidencias->getColumnas();
        return $cols;
    }
    
    public function index(){
        
        //Creamos el objeto empresa
        $incidencia=new IncidenciasModel($this->adapter);
        
        //Conseguimos todos los usuarios
        $allincidencias=$incidencia->getTodasIncidencias();
    
        
        //Cargamos la vista index y le pasamos valores
        $this->view("incidencias",array(
            "allincidencias"=>$allincidencias,
         	
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
        $empresa=new Empresa($this->adapter);
        $allempresas=$empresa->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view("newincidencia",array(
        "allempresas"=>$allempresas
        ));
    }
    

    public function crearemail(){
        if(isset($_POST["fecha"])){
       
            $incidencia=new Incidencia($this->adapter);
            $incidencia->setFecha($_POST["fecha"]);
            $incidencia->setId_empresas($_POST["id_empresas"]);
            $incidencia->setDescripcion($_POST["descripcion"]);
            $incidencia->setEstado($_POST["estado"]);
            $incidencia->setDuracion($_POST["duracion"]);
            $incidencia->setFacturada($_POST["facturada"]);
           
            $mail=new MAIL();
            $mail->enviarEmail("aiglesias.contacto@gmail.com","System@gmail.com","System","Incidencia Abierta","La empresa ".$_POST["id_empresas"]." ha creado una nueva incidencia.");
            
            $save=$incidencia->save();

           

            
        }


    $this->redirect("Incidencias", "index");
    }

    public function crear(){
        if(isset($_POST["fecha"])){
       
            //Creamos un producto
            $incidencia=new Incidencia($this->adapter);
            $incidencia->setFecha($_POST["fecha"]);
            $incidencia->setId_empresas($_POST["id_empresas"]);
            $incidencia->setDescripcion($_POST["descripcion"]);
            $incidencia->setEstado($_POST["estado"]);
            $incidencia->setDuracion($_POST["duracion"]);
           
            $save=$incidencia->save();

          
        }


    $this->redirect("Incidencias", "index");
    }
    
    public function actualizar(){
        
      
        
         $incidencia=new Incidencia($this->adapter);
            $incidencia->setFecha($_POST["fecha"]);
            $incidencia->setId_empresas($_POST["id_empresas"]);
            $incidencia->setDescripcion($_POST["descripcion"]);
            $incidencia->setEstado($_POST["estado"]);
            $incidencia->setDuracion($_POST["duracion"]);
           
            $incidencia->setId($_POST["id"]);
        
            $update=$incidencia->update();
       // }
        $this->redirect("Incidencias", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $incidencia=new Incidencia($this->adapter);
            $incidencia->deleteById($id); 
        }
        $this->redirect("Incidencias","index");
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
            $incidencias=new Incidencia($this->adapter);
            $incidencia=$incidencias->getById($id);
            
            $emp=new Empresa($this->adapter);
            $allempresas=$emp->getAll();
            
            $this->view("editincidencia",array(
            "incidencia"=>$incidencia,
            "allempresas"=>$allempresas,
            ));
           
        }
        
    }
    public function subir(){
        $file=new FILE();
        $ficherosubido=$file->subirFichero($_FILES["image_gallery"],$_GET["dir"]);
        
         /*$productos=new ProductosModel($this->adapter);
         $producto=$productos->getUnProducto($id);*/
    }
    
    public function deleteFile(){
       unlink($_POST["id"]);
    }
   

    public function cerrar(){

        $id = $_GET["id"];

        $incidencia= new Incidencia($this->adapter);

        $query="UPDATE `incidencias` set `estado`= 1 WHERE `id` like $id";
        $save=$incidencia->db()->query($query);

        //Creamos el objeto empresa
        $incidencia=new IncidenciasModel($this->adapter);
        
        //Conseguimos todos los usuarios
        $allincidencias=$incidencia->getTodasIncidencias();
    
        $mail=new MAIL();
        $mail->enviarEmail("aiglesias.contacto@gmail.com","Administrador@gmail.com","Administrador","Incidencia Cerrada","La incidencia con el id ".$id." ha sido cerrada por el administrador.");
        
        
        //Cargamos la vista index y le pasamos valores
        $this->view("incidencias",array(
            "allincidencias"=>$allincidencias,
         	
        ));

    }

    public function cerrar2(){

        $id = $_POST["id"];
        $duracion = $_POST["duracion"];

        $incidencia= new Incidencia($this->adapter);

        $query="UPDATE `incidencias` set `estado`= 1 , `duracion`= $duracion WHERE `id` like $id";
        $save=$incidencia->db()->query($query);

        //Creamos el objeto empresa
        $incidencia=new IncidenciasModel($this->adapter);
        
        //Conseguimos todos los usuarios
        $allincidencias=$incidencia->getTodasIncidencias();
    
        $mail=new MAIL();
        $mail->enviarEmail("aiglesias.contacto@gmail.com","Administrador@gmail.com","Administrador","Incidencia Cerrada","La incidencia con el id ".$id." ha sido cerrada por el administrador.");
        
        
        //Cargamos la vista index y le pasamos valores
        $this->view("incidencias",array(
            "allincidencias"=>$allincidencias,
         	
        ));

    }

    public function exportar(){

        $incidencias=new Incidencia($this->adapter);
        $allincidencias=$incidencias->getAll();
       
        $html=new HTML();
        $filas=$html->generarTablaHtml($allincidencias);
        
        $excel=new EXCEL();
        $excel->generarExcel($filas,"Incidencias");
    }

    
    public function exportaralt(){

        $incidencias=new IncidenciasModel($this->adapter);
        $allincidencias=$incidencias->getTodasIncidenciasEmp($_GET["id_empresas"]);
       
        $html=new HTML();
        $filas=$html->generarTablaHtml($allincidencias);
        
        $excel=new EXCEL();
        $excel->generarExcel($filas,"Incidencias");
    }


    public function imprimir(){

        $inicdencias=new Incidencia($this->adapter);
        $incidencia=$inicdencias->getById($_GET["id"]);

        $html=new HTML();
        $ficha=$html->generarFichaHtml($incidencia,"Incidencia");

        $pdf=new PDF();
        $pdf->generarPdf($ficha,"Incidencia");

    }

}
?>
