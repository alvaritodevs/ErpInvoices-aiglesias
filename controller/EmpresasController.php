<?php
class EmpresasController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function columnas(){
        $roles=new Usuario($this->adapter);
        $cols=$roles->getColumnas();
        return $cols;
    }
    
    public function index(){
        
        $empresa=new Empresa($this->adapter);
        $allempresas=$empresa->getAll();
      
        require_once("sesion.class.php");
	
    $sesion = new sesion();
	$sesion_usuario = $sesion->get("sesion_usuario");
    $sesion_role = $sesion->get("sesion_role");
    $sesion_id_usuario = $sesion->get("sesion_id_usuario");
    $sesion_id_empresas = $sesion->get("sesion_id_empresas");
	$sesion_nombre = $sesion->get("sesion_nombre");
    $sesion_apellido = $sesion->get("sesion_apellido");
	if( $sesion_role != "Administrador" )
	{	
	
         $empresas=new EmpresasModel($this->adapter);
         
        $allempresas=$empresas->getEmpresasId($sesion_id_empresas);
	}
        
        $this->view("empresas",array(
            "allempresas"=>$allempresas,
          
			
        ));
    }
    
    public function nuevo(){
        
        $tarifa=new Tarifa($this->adapter);
        $alltarifas=$tarifa->getAll();
       
        //Cargamos la vista index y le pasamos valores
        $this->view("newempresa",array("alltarifas"=>$alltarifas,));
    }
    
    
    public function crear(){
        
        
        if(isset($_POST["nombre_comercial"])){
            if($_POST["nombre_comercial"]!=""){
            //Creamos un empresa
                
            //subir el logo
            if(isset($_FILES["logo"])){
                //$_FILES["logo"]["name"] -->el nombre la imagen
                //$_FILES["logo"]["tmp"] -->la imagen en bits
                   $file=new FILE();
                  $fichero_subido=$file->subirFichero($_FILES['logo'],"logos2"); 
            }else{
                $fichero_subido="";
            }
                
              
                
                
            $empresa=new Empresa($this->adapter);
            $empresa->setNombre_comercial($_POST["nombre_comercial"]);
            $empresa->setRazon_social($_POST["razon_social"]);
            $empresa->setCif_nif_nie($_POST["cif_nif_nie"]);
            $empresa->setTelefono($_POST["telefono"]);
            $empresa->setEmail($_POST["email"]);
            $empresa->setPersona_contacto($_POST["persona_contacto"]);
            $empresa->setLogo($fichero_subido);
                
             $empresa->setDireccion($_POST["direccion"]);
            $empresa->setCp($_POST["cp"]);
            $empresa->setLocalidad($_POST["localidad"]);
            $empresa->setProvincia($_POST["provincia"]);
            $empresa->setId_tarifas($_POST["id_tarifas"]);
           
            $save=$empresa->save();
           
            }
        }
       $this->redirect("Empresas", "index");
    }
    
    public function actualizar(){
       // if(isset($_POST["nombre"])){
            
           
                $emp=new EmpresasModel($this->adapter);
                $em=$emp->getUnaEmpresa($_POST["id"]);
            //subir el logo
            if(isset($_FILES["logo"])){
                if($_FILES["logo"]["name"]!=""){
                //$_FILES["logo"]["name"] -->el nombre la imagen
                //$_FILES["logo"]["tmp"] -->la imagen en bits
                    
                   $file=new FILE();
                  $fichero_subido=$file->subirFichero($_FILES['logo'],"logos2");
                 //borrar el anterior
                    $borrado=$file->borrarFichero($em->logo);
                }else{$fichero_subido=$em->logo;}
            }else{
                $fichero_subido=$em->logo;
            }
                
            //Creamos un usuario
            $empresa=new Empresa($this->adapter);
            $empresa->setNombre_comercial($_POST["nombre_comercial"]);
            $empresa->setRazon_social($_POST["razon_social"]);
            $empresa->setCif_nif_nie($_POST["cif_nif_nie"]);
            $empresa->setTelefono($_POST["telefono"]);
            $empresa->setEmail($_POST["email"]);
            $empresa->setPersona_contacto($_POST["persona_contacto"]);
            $empresa->setLogo($fichero_subido);
        
        
         $empresa->setDireccion($_POST["direccion"]);
            $empresa->setCp($_POST["cp"]);
            $empresa->setLocalidad($_POST["localidad"]);
            $empresa->setProvincia($_POST["provincia"]);
            $empresa->setId_tarifas($_POST["id_tarifas"]);
        
            $empresa->setId($_POST["id"]);
            $update=$empresa->update();
       // }
        //var_dump($update);
        $this->redirect("Empresas", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $empresa=new Empresa($this->adapter);
            $empresa->deleteById($id); 
        }
        $this->redirect("Empresas","index");
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
            $empresas=new EmpresasModel($this->adapter);
            $emp=$empresas->getUnaEmpresa($id);
            
           /* $empresas=new Empresa($this->adapter);
            $emp=$empresas->getById($id);*/
             $tarifa=new Tarifa($this->adapter);
        $alltarifas=$tarifa->getAll();
            $this->view("editempresa",array(
            "empresa"=>$emp,
             "alltarifas"=>$alltarifas,   
            ));
           
        }
        
    }
    
    public function getUnUsuario($id){
        $query="SELECT * FROM usuarios WHERE id='".$id."'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
    
    public function imprimir(){
             
        $empresas=new Empresa($this->adapter);
        $empresa=$empresas->getById($_GET["id"]);

        $html=new HTML();
        $ficha=$html->generarFichaHtml($empresa,"EMPRESA");

        $pdf=new PDF();
        $pdf->generarPdf($ficha,"Empresa");
        
    }

    public function exportar(){

        $empresas=new Empresa($this->adapter);
        $allempresas=$empresas->getAll();
       
        $html=new HTML();
        $filas=$html->generarTablaHtml($allempresas);
        
        $excel=new EXCEL();
        $excel->generarExcel($filas,"Empresas");

    }
    
}
?>
