<?php
class FacturasController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function columnas(){
        $facturas=new Factura($this->adapter);
        $cols=$facturas->getColumnas();
        return $cols;
    }
    
    
    
    public function index(){
        
        //Creamos el objeto empresa
        $factura=new FacturasModel($this->adapter);
        
        //Conseguimos todos los usuarios
        $allfacturas=$factura->getTodasFacturas();
    
        
        //Cargamos la vista index y le pasamos valores
        $this->view("facturas",array(
            "allfacturas"=>$allfacturas,
         	
        ));
    }
    
    
    
    public function nuevo(){
        $empresa=new Empresa($this->adapter);
        $allempresas=$empresa->getAll();
        
         $incidencia=new Incidencia($this->adapter);
        $allincidencias=$incidencia->getAll();
        //Cargamos la vista index y le pasamos valores
        $this->view("newfactura",array(
        "allempresas"=>$allempresas
        ,"allincidencias"=>$allincidencias
        ));
    }
    
    
    
    public function crear(){
        if(isset($_POST["fecha"])){
        
            //Creamos una factura
            $factura=new Factura($this->adapter);
            $factura->setFecha($_POST["fecha"]);
            $factura->setId_empresas($_POST["id_empresas"]);
            $factura->setId_incidencias($_POST["id_incidencias"]);
            $factura->setbaseimponible($_POST["baseimponible"]);
            $factura->setIva($_POST["iva"]);
            $factura->setTotal($_POST["total"]);
           
            $id = $_POST["id_incidencias"];
            $incidencia= new Incidencia($this->adapter);
            $query="UPDATE `incidencias` set `facturada`= 1 WHERE `id` like $id";
            $save=$incidencia->db()->query($query);
           
           
            $save=$factura->save();
            
          
        }
        $this->redirect("Facturas", "index");
    }
    
    public function actualizar(){
    
           //Creamos una factura
            $factura=new Factura($this->adapter);
            $factura->setFecha($_POST["fecha"]);
            $factura->setId_empresas($_POST["id_empresas"]);
            $factura->setId_incidencias($_POST["id_incidencias"]);
            $factura->setbaseimponible($_POST["baseimponible"]);
            $factura->setIva($_POST["iva"]);
            $factura->setTotal($_POST["total"]);
            $factura->setId($_POST["id"]);
        
            $update=$factura->update();
       // }
        $this->redirect("Facturas", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $factura=new Factura($this->adapter);
            $factura->deleteById($id); 
        }
        $this->redirect("Facturas","index");
    }
    
    
    
    public function editar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            $facturas=new FacturasModel($this->adapter);
            $factura=$facturas->getUnaFactura($id);
            
            $emp=new Empresa($this->adapter);
            $allempresas=$emp->getAll();
            
            $inc=new Incidencia($this->adapter);
            $allincidencias=$inc->getAll();
            
            $this->view("editfactura",array(
            "factura"=>$factura,
            "allempresas"=>$allempresas,
                "allincidencias"=>$allincidencias,
            ));
           
        }
        
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
          $facturas=new Factura($this->adapter);
          $allfacturas=$facturas->getAll();
          
         
          $html=new HTML();
          $filas=$html->generarTablaHtml($allfacturas);
          
         $excel=new EXCEL();
          $excel->generarExcel($filas,"Facturas");
          
    }


    public function exportaralt(){
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
          $facturas=new FacturasModel($this->adapter);
          $allfacturas=$facturas->getTodasFacturasEmp($_GET["id_empresas"]);
         
          $html=new HTML();
          $filas=$html->generarTablaHtml($allfacturas);
          
         $excel=new EXCEL();
          $excel->generarExcel($filas,"Facturas");
          
    }

    public function imprimir(){

        $facturas=new FacturasModel($this->adapter);
        $factura=$facturas->getUnaFactura($_GET["id"]);

        $id_incidencia=$factura->id_incidencias;

        $incidencia= new IncidenciasModel($this->adapter);
        $inci=$incidencia->getUnaIncidencia($id_incidencia);

        $idemp=$factura->id_empresas;

        $empresa= new EmpresasModel($this->adapter);
        $emp=$empresa->getUnaEmpresa($idemp);

        $html=new HTML();
        $ficha=$html->generarFichaHtmlFacturaEmpresa($factura,$inci,$emp,"FACTURA");

        $pdf=new PDF();
        $pdf->generarPdf($ficha,"Factura");

    }

}
?>
