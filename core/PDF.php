<?php
use Dompdf\Dompdf;
class PDF{

    public function __construct() {
		require_once 'core/dompdf/autoload.inc.php';
         
    }
    
    
    //Plugins y funcionalidades
    
    public function generarPdf($html,$nombre){
           //$dompdf->loadHtmlFile('http://www.apple.com');
            $dompdf = new DOMPDF();
            
            $dompdf->load_html($html);
            $dompdf->render();
            $pdf = $dompdf->output();
            $filename = $nombre.".pdf";
            file_put_contents($filename, $pdf);
            $dompdf->stream($filename, array("Attachment" => false));
    }
    
    
    //Métodos para los controladores

}
?>
