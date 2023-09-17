<?php

class EXCEL{

    public function __construct() {
		
         
    }
    
    
    //Plugins y funcionalidades
    
    public function generarExcel($html,$nombre){
        header("Content-Type:   application/vnd.ms-excel");
        header("Content-Disposition: filename=".$nombre.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo "
        <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
        <html>
        <head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head>
        <body>
        ";
        echo $html;
    }
    
    
    //Métodos para los controladores
    
}
?>
