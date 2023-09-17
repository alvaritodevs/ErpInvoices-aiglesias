<!DOCTYPE html>
<html lang="en">

<?php include("head.php");?>

<body class="fix-header">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php include("nav.php");?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php include("left-sidebar.php");?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="col-lg-7">
            <h3>Empresas</h3>
         </div>
        <section class="col-lg-12 usuario">
        
        <?php
            //$sesion_idempresa=2
            //$allempresas->getall
            //if(sesion es distinto a administrador)
            
            //machacamos $allempresas

            //$allempresas= $emmpresa ->getbyId($sesion_idempresa)
        ?>

        <?php if($sesion_role=="Administrador"){?>    
        <?php }else{?>

            <?php 

            $empresaobj = new EmpresasModel($this->adapter);
            $empresa = $empresaobj->getUnaEmpresa($sesion_id_empresas)

            ?>

        <?php };?>
        <hr/>
        
        <a href="<?php echo $helper->url("Empresas","exportar");?>" class="btn btn-success">Exportar</a> 

        <hr/>        
            <div class="table-responsive">
                                <table class="table color-table primary-table" id="tabla">
                                    <thead>
                                       
                                        <tr>
                                            <th>#</th>
                                            <th>nombre_comercial</th>
                                            <th>telefono</th>
                                            <th>persona_contacto</th>
                                            <th>logo</th>
                                          
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                        
                                        foreach($allempresas as $empresa) {?>
                                        <tr>
                                            <td><?php echo $empresa->id; ?></td>
                                            <td> <?php echo $empresa->nombre_comercial; ?></td>
                                            <!--<td> <?php echo $empresa->razon_social; ?></td>
                                            <td> <?php echo $empresa->cif_nif_nie; ?></td>-->
                                            <td> <?php echo $empresa->telefono; ?></td>
                                            <td> <?php echo $empresa->persona_contacto; ?></td>
                                            <td> <img width="80px" src="<?php echo $empresa->logo; ?>" alt="No hay logo"></td>
                                          
                                            <td>
                                                <a href="<?php echo $helper->url("empresas","editar"); ?>&id=<?php echo $empresa->id; ?>" class="btn btn-info">Editar</a>
                                                
                                             <?php if($sesion_role=="Administrador"){?>    
                                            <a href="<?php echo $helper->url("empresas","borrar"); ?>&id=<?php echo $empresa->id; ?>" class="btn btn-danger">Borrar</a>
                                            <?php }?>
                                                
                                                 <a href="<?php echo $helper->url("empresas","imprimir"); ?>&id=<?php echo $empresa->id; ?>" class="btn btn-info">Imprimir</a>
                                            </td>
                                        </tr>
                                         <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
            
            
            
            
        </section>
            </div>
            
            <!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/components/sparkline/jquery.charts-sparkline.js"></script>
    <script src="plugins/components/knob/jquery.knob.js"></script>
    <script src="plugins/components/easypiechart/dist/jquery.easypiechart.min.js"></script>
    <script src="js/db1.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="plugins/components/styleswitcher/jQuery.style.switcher.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        
        $('#tabla').DataTable( {
            responsive: true,
            responsiveToggle: true,
            responsiveToggleTitle: 'Show/hide columns'
        } );

    });


    </script>
</body>

</html>