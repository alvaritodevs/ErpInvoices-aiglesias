<?php
class AyudaVistas{
    
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString="index.php?controller=".$controlador."&action=".$accion;
        return $urlString;
    }
    
    
    public function urlId($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO,$id){
        $urlString="index.php?controller=".$controlador."&action=".$accion."&id=".$id;
        return $urlString;
    }
    
    //Helpers para las vistas
    
    public function crearOptions($array,$value,$mostrar){
        $options="";
        foreach($array as $opt){
              $options.='<option value="'.$opt->$value.'">'.$opt->$mostrar.'</option>';
             }
        return $options;
    }
    
    public function crearOptionsSel($array,$value,$mostrar,$valueSel){
                $options="";
                 foreach($array as $opt){
                    $selected="";
                    if($opt->$value==$valueSel){
                         $selected="selected";
                    }
                    
                    $options.='<option value="'.$opt->$value.'"  '.$selected.'  >'.$opt->$mostrar.'</option>';
                }
     return $options;
    }
    
    public function crearOptionsVariosCampos($array,$value,$mostrarcampos){
        $options="";
        $vmostrar=explode(",",$mostrarcampos);
        foreach($array as $opt){
              $options.='<option value="'.$opt->$value.'">';
              foreach($vmostrar as $c){
              $options.=' '.$opt->$c;
              }
              $options.='</option>';
             }
        return $options;
    }
    
}
?>
