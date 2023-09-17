<?php

class HTML extends ControladorBase{


	
    public function __construct() {

    }
    
    
  
    
    public function generarTablaHtml($objetos){
        

       $html= "<table border=1>";
        $i=0;
         foreach ($objetos as $clave=>$valor)
   		{
            if($i==0){
            $html.=  "<tr>";
               foreach ($valor as $claveH=>$valorH)
   		       {
                  $html.=  "<th>";
                  $html.=  $claveH;
                 $html.=  "</th>"; 
               }
             $html.=  "</tr>";   
            }
            $html.=  "<tr>";
             foreach ($valor as $claveH=>$valorH)
   		       {
                 
                 $html.=  "<td>";
                 $html.=  $valorH;
                 $html.=  "</td>";
                 
                }
             $i=$i+1;
            $html.=  "</tr>";
         }
        $html.=  "</table>";
        return $html;
    }
    
    
    public function generarFichaHtml($objeto,$nombre){

        $html='<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <title>Ficha de '.$nombre.'</title>
        
                <style>
                    .invoice-box {
                        max-width: 800px;
                        margin: auto;
                        padding: 30px;
                        border: 1px solid #eee;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                        font-size: 16px;
                        line-height: 24px;
                        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                        color: #555;
                    }
        
                    .invoice-box table {
                        width: 100%;
                        line-height: inherit;
                        text-align: left;
                    }
        
                    .invoice-box table td {
                        padding: 5px;
                        vertical-align: top;
                    }
        
                    .invoice-box table tr td:nth-child(2) {
                        text-align: right;
                    }
        
                    .invoice-box table tr.top table td {
                        padding-bottom: 20px;
                    }
        
                    .invoice-box table tr.top table td.title {
                        font-size: 45px;
                        line-height: 45px;
                        color: #333;
                    }
        
                    .invoice-box table tr.information table td {
                        padding-bottom: 40px;
                    }
        
                    .invoice-box table tr.heading td {
                        background: #eee;
                        border-bottom: 1px solid #ddd;
                        font-weight: bold;
                    }
        
                    .invoice-box table tr.details td {
                        padding-bottom: 20px;
                    }
        
                    .invoice-box table tr.item td {
                        border-bottom: 1px solid #eee;
                    }
        
                    .invoice-box table tr.item.last td {
                        border-bottom: none;
                    }
        
                    .invoice-box table tr.total td:nth-child(2) {
                        border-top: 2px solid #eee;
                        font-weight: bold;
                    }
        
                    @media only screen and (max-width: 600px) {
                        .invoice-box table tr.top table td {
                            width: 100%;
                            display: block;
                            text-align: center;
                        }
        
                        .invoice-box table tr.information table td {
                            width: 100%;
                            display: block;
                            text-align: center;
                        }
                    }
        
                    /** RTL **/
                    .invoice-box.rtl {
                        direction: rtl;
                        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                    }
        
                    .invoice-box.rtl table {
                        text-align: right;
                    }
        
                    .invoice-box.rtl table tr td:nth-child(2) {
                        text-align: left;
                    }
                </style>
            </head>
        
            <body>
                <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">


                        <tr class="heading">
                        <td>Ficha de '.$nombre.'</td>
                        <td></td>
                          </tr>';
                        foreach ($objeto as $clave=>$valor)
                        {
                         
                         $html.=  "<tr class='details'>";
                               $html.=  "<td>";
                               $html.=  $clave;
                              $html.=  ": </td>"; 
                          $html.=  "<td >";
                             if($clave=="logo"){
                                  $html.="<img src='".$valor."' width='10%' >";
                             }else{
                              $html.=  $valor;
                             }
                              $html.=  "</td>";
                          $html.=  "</tr>";  
                           
                         }



                        $html.='

                    </table>
                </div>
            </body>
        </html>'; 


        
      
        return $html;
    }


    public function generarFichaHtmlFactura($objeto,$inci,$nombre){

      
        $html='<html>
    <head>
    <style>
        *,table,tr,td{
            margin: 0;
            padding: 0;
        }
        @page{
            width: "595pt";
            height: "842pt";
        }
        html,body{
           width: "595pt";
            height: "842pt";  
        }
        
        th{
        background-color:#1eaf12;
        color:#fff;
        font-size:18pt;
        text-align:right;
        height:35pt;
        }
        
        td .valores{
         background-color:#f2f2f2;
        color:#333;
        /*border-bottom:1px solid #fff;*/
        }
        
        .fila{
        border-bottom:1px solid #fff;
        }
        
    </style>    
    </head>
    <body>
    <table border="0" width="595pt" height="842pt" cellspacing="0" cellpadding="0">
    <!-- cabecera-->
        <tr>
            <td height="80pt">
                <table border=0  height="100%" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="30%"><img src="images/cropped-logo_iaticsw.png" width="70%"></td>
                        <td width="70%" style="background-color: #1eaf12;color:#fff;padding-left: 20pt"><h3>FICHA '.$nombre.'</h3></td>
                    </tr>
                </table>
            </td>
        </tr>   
    <!-- contenido-->
    <tr>
        <td height="670pt" style="vertical-align:top">
        <table height="100%" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="15%" style="background-color: #fff" height="670pt">&nbsp;</td>
            <td style="vertical-align:top">
            <!-- tabla objeto-->';
             $html.= "<table border=0 cellspacing=0 cellpadding=30 width=100%>";
            
             foreach ($objeto as $clave=>$valor)
               {
                
                $html.=  "<tr class='fila'>";
                      $html.=  "<th>";
                      $html.=  $clave;
                     $html.=  ": </th>"; 
                 $html.=  "<td class='valores'>&nbsp;&nbsp;";
                    if($clave=="logo"){
                         $html.="<img src='".$valor."' width='10%' >";
                    }else{
                     $html.=  $valor;
                    }
                     $html.=  "</td>";
                 $html.=  "</tr>";  
              
                  
                }
            $html.=  "</table>";
            $html.='</td>
            <td width="15%" style="background-color: #fff">&nbsp;</td>
        </tr>        
        </table>
        </td>
    </tr>
    <!-- pie-->
    <tr><td  height="40pt" align="center" style="border-top: 1px solid #000"><img src="cropped-logo_iaticsw.png" width="10%">© 2023 All rights reserved</td></tr>  
    </table>
    <br>
    
    <table border="0" width="595pt" height="842pt" cellspacing="0" cellpadding="0">
    <!-- cabecera-->
        <tr>
            <td height="80pt">
                <table border=0  height="100%" cellspacing="0" cellpadding="0" width="100%">
                    <tr height="50px">
                        <td width="30%"><img src="images/cropped-logo_iaticsw.png" width="70%"></td>
                        <td width="70%" style="background-color: #1eaf12;color:#fff;padding-left: 20pt"><h3>DATOS DE LA INCIDENCIA</h3></td>
                    </tr>
                </table>
            </td>
        </tr>   
    <!-- contenido-->
    <tr>
        <td height="670pt" style="vertical-align:top">
        <table height="100%" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="15%" style="background-color: #fff" height="670pt">&nbsp;</td>
            <td style="vertical-align:top">
            <!-- tabla objeto-->';
             $html.= "<table border=0 cellspacing=0 cellpadding=30 width=100%>";
            
             foreach ($inci as $clave=>$valor)
               {
                
                $html.=  "<tr class='fila'>";
                      $html.=  "<th>";
                      $html.=  $clave;
                     $html.=  ": </th>"; 
                 $html.=  "<td class='valores'>&nbsp;&nbsp;";
                    if($clave=="logo"){
                         $html.="<img src='".$valor."' width='10%' >";
                    }else{
                     $html.=  $valor;
                    }
                     $html.=  "</td>";
                 $html.=  "</tr>";  
              
                  
                }
            $html.=  "</table>";
            $html.='</td>
            <td width="15%" style="background-color: #fff">&nbsp;</td>
        </tr>        
        </table>
        </td>
    </tr>
    <!-- pie-->
    <tr><td  height="40pt" align="center" style="border-top: 1px solid #000"><img src="cropped-logo_iaticsw.png" width="10%">© 2023 All rights reserved</td></tr>  
    </table>
    
    </body>
    </html>';    
            
            
            
          
            return $html;
        }
    

        public function generarFichaHtmlFacturaEmpresa($objeto,$inci,$empre,$nombre){
    
                
                
              $html='<!DOCTYPE html>
              <html>
                  <head>
                      <meta charset="utf-8" />
                      <title>Factura con datos de la incidecia y empresa.</title>
              
                      <style>
                          .invoice-box {
                              max-width: 800px;
                              margin: auto;
                              padding: 30px;
                              border: 1px solid #eee;
                              box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                              font-size: 16px;
                              line-height: 24px;
                              font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                              color: #555;
                          }
              
                          .invoice-box table {
                              width: 100%;
                              line-height: inherit;
                              text-align: left;
                          }
              
                          .invoice-box table td {
                              padding: 5px;
                              vertical-align: top;
                          }
              
                          .invoice-box table tr td:nth-child(2) {
                              text-align: right;
                          }
              
                          .invoice-box table tr.top table td {
                              padding-bottom: 20px;
                          }
              
                          .invoice-box table tr.top table td.title {
                              font-size: 45px;
                              line-height: 45px;
                              color: #333;
                          }
              
                          .invoice-box table tr.information table td {
                              padding-bottom: 40px;
                          }
              
                          .invoice-box table tr.heading td {
                              background: #eee;
                              border-bottom: 1px solid #ddd;
                              font-weight: bold;
                          }
              
                          .invoice-box table tr.details td {
                              padding-bottom: 20px;
                          }
              
                          .invoice-box table tr.item td {
                              border-bottom: 1px solid #eee;
                          }
              
                          .invoice-box table tr.item.last td {
                              border-bottom: none;
                          }
              
                          .invoice-box table tr.total td:nth-child(2) {
                              border-top: 2px solid #eee;
                              font-weight: bold;
                          }
              
                          @media only screen and (max-width: 600px) {
                              .invoice-box table tr.top table td {
                                  width: 100%;
                                  display: block;
                                  text-align: center;
                              }
              
                              .invoice-box table tr.information table td {
                                  width: 100%;
                                  display: block;
                                  text-align: center;
                              }
                          }
              
                          /** RTL **/
                          .invoice-box.rtl {
                              direction: rtl;
                              font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                          }
              
                          .invoice-box.rtl table {
                              text-align: right;
                          }
              
                          .invoice-box.rtl table tr td:nth-child(2) {
                              text-align: left;
                          }
                      </style>
                  </head>
              
                  <body>
                      <div class="invoice-box">
                          <table cellpadding="0" cellspacing="0">
                              <tr class="top">
                                  <td colspan="2">
                                      <table>
                                          <tr>
                                              <td class="title">
                                                  <img src="'.$empre->logo.'" style="width: 200px" />
                                              </td>
              
                                              <td>
                                                  <strong>Empresa:</strong> '.$empre->nombre_comercial.'<br />
                                                  <strong>Creada:</strong> '.$empre->created_at.'<br />
                                                  <strong>Razón social:</strong> '.$empre->razon_social.'<br />

                                              </td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
              
                              <tr class="information">
                                  <td colspan="2">
                                      <table>
                                          <tr>
                                              <td>
                                              <strong>Direccion completa:</strong> '.$empre->direccion.'<br/>
                                              <strong>Provincia:</strong> '.$empre->provincia.'<br/>
                                              <strong>Codigo postal:</strong> '.$empre->cp.'<br/>

                                                  
                                              </td>
              
                                              <td>
                                              <strong>Persona_contacto:</strong> '.$empre->persona_contacto.'<br/>
                                              <strong>Email:</strong> '.$empre->email.'<br/>
                                              <strong>Telefono:</strong> '.$empre->telefono.'
                                              </td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
                              <tr class="heading">
                              <td>Datos de la incidencia</td>
                              <td></td>
                                </tr>';
                              foreach ($inci as $clave=>$valor)
                              {
                               
                               $html.=  "<tr class='details'>";
                                     $html.=  "<td>";
                                     $html.=  $clave;
                                    $html.=  ": </td>"; 
                                $html.=  "<td >";
                                   if($clave=="logo"){
                                        $html.="<img src='".$valor."' width='10%' >";
                                   }else{
                                    $html.=  $valor;
                                   }
                                    $html.=  "</td>";
                                $html.=  "</tr>";  
                                 
                               }

                               $html.='<br><br><br><tr class="heading">
                               <td>Datos de la Factura</td>
                               <td></td>
                                 </tr>';

                               foreach ($objeto as $clave=>$valor)
                               {
                                
                                $html.=  "<tr class='details'>";
                                      $html.=  "<td>";
                                      $html.=  $clave;
                                     $html.=  ": </td>"; 
                                 $html.=  "<td >";
                                    if($clave=="logo"){
                                         $html.="<img src='".$valor."' width='10%' >";
                                    }else{
                                     $html.=  $valor;
                                    }
                                     $html.=  "</td>";
                                 $html.=  "</tr>";  
                                  
                                }

                              $html.='

   

                          </table>
                      </div>
                  </body>
              </html>';  
              
                return $html;
            }    

    
}



?>