<?php 

class TarifasController extends ControladorBase{
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
        
        //Creamos el objeto clientesModel
        $tarifa=new Tarifa($this->adapter);
        //Conseguimos todos los clientes
        $alltarifas=$tarifa->getAll();
      
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("tarifas",array(
            "alltarifas"=>$alltarifas,
          
			
        ));
    }
    
    public function nuevo(){
     
        //Cargamos la vista index y le pasamos valores
        $this->view("newtarifa",array());
    }
    
    
    public function crear(){
        
      
            //Creamos un cliente
            $tarifa=new Tarifa($this->adapter);
        
            $tarifa->setTarifa($_POST["tarifa"]);
            $tarifa->setPreciohora($_POST["preciohora"]);
            $tarifa->setIva($_POST["iva"]);
           
           
            $save=$tarifa->save();
           
        
        $this->redirect("Tarifas", "index");
    }
    
    public function actualizar(){
       // if(isset($_POST["nombre"])){
        
            //Creamos un cliente
           $tarifa=new Tarifa($this->adapter);
        
            $tarifa->setTarifa($_POST["tarifa"]);
            $tarifa->setPreciohora($_POST["preciohora"]);
            $tarifa->setIva($_POST["iva"]);
           
            
            $tarifa->setId($_POST["id"]);
            $update=$tarifa->update();
       // }
        //var_dump($update);
        $this->redirect("Tarifas", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $tarifa=new Tarifa($this->adapter);
            $tarifa->deleteById($id); 
        }
        $this->redirect("Tarifas","index");
    }
    
 
    
    public function editar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            $tarifa=new Tarifa($this->adapter);
            $tarif=$tarifa->getById($id);
          
            
            $this->view("edittarifa",array(
            "tarifa"=>$tarif,
            
            ));
           
        }
        
    }


  
}
?>
