<?php
                        
    if($sesion_role=="Administrador"){
        $labelListadoEmpresas="Listado";
    }else{
       $labelListadoEmpresas="Mi empresa"; 
    }
                        ?>

<aside class="sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/factura.png" alt="" width="20px"> <span class="hide-menu"> Facturas </span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li> <a href="<?php echo $helper->url("Facturas","index"); ?>">Listado</a> </li>
                                <?php if($sesion_role=="Administrador"){?>    
                                    <li> <a href="<?php echo $helper->url("Facturas","nuevo"); ?>">Nuevo</a> </li>
                                <?php }?>

                            </ul>
                        </li>
                        
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/incidente.png" alt="" width="20px"> <span class="hide-menu"> Incidencias </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo $helper->url("incidencias","index"); ?>">Listado</a> </li>
                                <li> <a href="<?php echo $helper->url("incidencias","nuevo"); ?>">Nuevo</a> </li>
                                
                            </ul>
                        </li>
                        
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/empresa.png" alt="" width="20px"> <span class="hide-menu"> Empresas </span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                
                                
                                <li> <a href="<?php echo $helper->url("empresas","index"); ?>"><?php echo $labelListadoEmpresas;?></a> </li>
                                 <?php if($sesion_role=="Administrador"){?>
                        
                                <li> <a href="<?php echo $helper->url("empresas","nuevo"); ?>">Nuevo</a> </li>
                        <?php
                        }
                        ?>
                                
                            </ul>
                        </li>
                        
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/usuario.png" alt="" width="20px"> <span class="hide-menu"> Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo $helper->url("usuarios","index"); ?>">Listado</a> </li>
                                 <?php
                        
                        if($sesion_role=="Administrador"){
                        ?>
                        
                                <li> <a href="<?php echo $helper->url("usuarios","nuevo"); ?>">Nuevo</a> </li>
                             <?php }?>   
                            </ul>
                        </li>
                        
                        
                        <?php
                        
                        if($sesion_role=="Administrador"){
                        ?>
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/roles.png" alt="" width="20px"> <span class="hide-menu"> Roles </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo $helper->url("roles","index"); ?>">Listado</a> </li>
                                <li> <a href="<?php echo $helper->url("roles","nuevo"); ?>">Nuevo</a> </li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        <li>
                            <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><img src="images/tarifa.png" alt="" width="20px"> <span class="hide-menu"> Tarifas </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo $helper->url("tarifas","index"); ?>">Listado</a> </li>
                                <li> <a href="<?php echo $helper->url("tarifas","nuevo"); ?>">Nuevo</a> </li>
                                
                            </ul>
                        </li>
                        <?php 
                        }?>
                        

                        
                        
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>