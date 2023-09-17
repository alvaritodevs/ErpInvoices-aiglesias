<?php

class MAIL{

    public function __construct() {
		
         
    }
    
    
    //Plugins y funcionalidades
    
    public function enviarEmail($to,$from,$fromName,$subject,$htmlContent){
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        //$headers .= 'Cc: welcome@example.com' . "\r\n"; 
        //$headers .= 'Bcc: ' . "\r\n"; 
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers)){ 
                //echo 'Email has sent successfully.'; 
            }else{ 
               //echo 'Email sending failed.'; 
            }
    }
    
    
    //Métodos para los controladores
    
}
?>
