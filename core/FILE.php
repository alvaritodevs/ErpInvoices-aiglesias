<?php

class FILE{

    public function __construct() {
		
         
    }
    
    
    //Plugins y funcionalidades
    //$file --> $_FILES["logo"]
    
    public function subirFichero($file,$dir){
          
            $fichero_subido="";
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            if(isset($file)){
                //$imgData=file_get_contents($file['tmp_name']);
            $dir_subida=$dir."/";
                    $fichero_subido=$dir_subida. basename($file['name']);
                    if(move_uploaded_file($file['tmp_name'],$fichero_subido)){
                       $subido='SI'; 
                    }else{
                        $subido='NO'; 
                    }
            }else{
               $subido='NO';   
            }
        if($subido=='SI')return $fichero_subido;
        else return "";
        
    }
    
    
    public function subirFicheros($file,$dir){
          
            $fichero_subido=array();
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
        $dir_subida=$dir."/";
           
                 $countfiles = count($file['name']);
                
                 for($i=0;$i<$countfiles;$i++){
                     $filename = $file['name'][$i];
   
            // Upload file
            move_uploaded_file($file['tmp_name'][$i],$dir_subida.$filename);
                     array_push($fichero_subido,$dir_subida.$filename);
                     
                     }
                
          $fichero_subido=implode(",",$fichero_subido)   ; 
            
           return   $fichero_subido;      
        
    }
    
    
    public function borrarFichero($file){
          
            $path = $file;
            if (file_exists($path)) {
                unlink($path);
                return true;
            }else{
                return false;
            }  
    }

}
?>
