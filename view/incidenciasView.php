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
            <h3>Incidencias</h3>
            <hr/>
        </div>
        <section class="col-lg-12 usuario">
        <?php if($sesion_role=="Administrador"){?>      
            <a href="<?php echo $helper->url("Incidencias","exportar");?>" class="btn btn-success">Exportar</a> 
    <?php }else{   ?>
        <a href="<?php echo $helper->url("Incidencias","exportaralt");?>&id_empresas=<?php echo $sesion_id_empresas?>" class="btn btn-success">Exportar</a> 
    <?php  } ?>
        <?php if($sesion_role=="Administrador"){?>  
                    

            <?php }else{?>
    
                <?php 
    
                $inci = new IncidenciasModel($this->adapter);
                $incidencia = $inci->getUnaIncidencia($sesion_id_empresas)
    
            ?>
    
        <?php };?>
        <?php if($sesion_role=="Administrador"){?>  
        

<hr/>
            <div class="table-responsive">
                <table class="table color-table primary-table" id="tabla">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>fecha</th>
                            <th>id_empresas</th>
                            <th>descripcion</th>
                            <th>estado</th>
                            <th>duracion</th>
                            <th>facturada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach($allincidencias as $incidencia) {?>
                        <tr>
                            <td><?php echo $incidencia->id; ?></td>
                            <td> <?php echo $incidencia->fecha; ?></td>
                            <td> <?php echo $incidencia->id_empresas; ?></td>
                            <td> <?php echo $incidencia->descripcion; ?></td>
                            <td> <?php
                            if ($incidencia->estado==0) {
                                echo 'Abierta';
                            }else{
                                echo 'Cerrada';  
                            }?></td>
                            <td> <?php echo $incidencia->duracion; ?></td>
                            <td> <?php 
                            
                            if ($incidencia->facturada==0) {
                                echo 'No';
                            }else{
                                echo 'Si';  
                            }?></td>

                          
                            <td>
                                <a href="<?php echo $helper->urlId("incidencias","editar",$incidencia->id);?>" class="btn btn-info">Editar</a>
                                <a href="<?php echo $helper->urlId("incidencias","imprimir",$incidencia->id);?>" class="btn btn-info">Imprimir</a>
                                <a href="<?php echo $helper->urlId("incidencias","borrar",$incidencia->id);?>" class="btn btn-danger">Borrar</a>
                                <?php if($sesion_role=="Administrador"){?>    
                                <!--<a href="<?php //echo $helper->url("incidencias","cerrar"); ?>&id=<?php echo $incidencia->id; ?>" class="btn btn-info">Cerrar</a> -->
                                <?php if ($incidencia->estado=='0') {?>
                                    
                                <div class="cerrarincidencia">
                                    <form action="<?php echo $helper->url("incidencias","cerrar2"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="cerrarInci">
                                        <br>
                                        
                                        <p>Introduzca la duración y cierre la incidencia.</p>
                                        <div class="insertar">
                                            <input type="number" name="duracion">
                                            <input type="hidden" name="id" value="<?php echo $incidencia->id; ?>">
                                            <input type="submit" value="cerrar">
                                        </div>
                                    </form>
                                    <style>
                                        .insertar{
                                            display: flex;
                                            
                                        }
                                    </style>
                                </div>
                                <?php } ?>
                                <?php }?>
                            </td>
                        </tr>



                         <?php } ?>
                        
                    </tbody>
                </table>
            </div>

        <?php }else{?>
            
<hr/>
            <div class="table-responsive">
                <table class="table color-table primary-table" id="tabla">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>fecha</th>
                            <th>id_empresas</th>
                            <th>descripcion</th>
                            <th>estado</th>
                            <th>duracion</th>
                            <th>facturada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach($allincidencias as $incidencia) {?>

                            <?php 
            
                            if ($incidencia->id_empresas==$sesion_id_empresas) {
                               
                                ?>

<tr>
                            <td><?php echo $incidencia->id; ?></td>
                            <td> <?php echo $incidencia->fecha; ?></td>
                            <td> <?php echo $incidencia->id_empresas; ?></td>
                            <td> <?php echo $incidencia->descripcion; ?></td>
                            <td> <?php
                            if ($incidencia->estado==0) {
                                echo 'Abierta';
                            }else{
                                echo 'Cerrada';  
                            }?></td>
                            <td> <?php echo $incidencia->duracion; ?></td>
                            <td> <?php 
                            
                            if ($incidencia->facturada==0) {
                                echo 'No';
                            }else{
                                echo 'Si';  
                            }?></td>

                          
                            <td>
                                <a href="<?php echo $helper->urlId("incidencias","editar",$incidencia->id);?>" class="btn btn-info">Editar</a>
                                <a href="<?php echo $helper->urlId("incidencias","imprimir",$incidencia->id);?>" class="btn btn-info">Imprimir</a>
                                <a href="<?php echo $helper->urlId("incidencias","borrar",$incidencia->id);?>" class="btn btn-danger">Borrar</a>
                                <?php if($sesion_role=="Administrador"){?>    
                                <!--<a href="<?php //echo $helper->url("incidencias","cerrar"); ?>&id=<?php echo $incidencia->id; ?>" class="btn btn-info">Cerrar</a> -->
                                <?php if ($incidencia->estado=='0') {?>
                                    
                                <div class="cerrarincidencia">
                                    <form action="<?php echo $helper->url("incidencias","cerrar2"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="cerrarInci">
                                        <br>
                                        
                                        <p>Introduzca la duración y cierre la incidencia.</p>
                                        <div class="insertar">
                                            <input type="number" name="duracion">
                                            <input type="hidden" name="id" value="<?php echo $incidencia->id; ?>">
                                            <input type="submit" value="cerrar">
                                        </div>
                                    </form>
                                    <style>
                                        .insertar{
                                            display: flex;
                                            
                                        }
                                    </style>
                                </div>
                                <?php } ?>
                                <?php }?>
                            </td>
                        </tr>
                        <?php } ?>    
            
                            





                         <?php } ?>
                        
                    </tbody>
                </table>
            </div>

            
        <?php };?>   


            
        </section>
            </div>
            
            <!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>

</body>
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
            responsive: true
        } );

    });


    </script>


    
<script>
/*
$(document).ready(function() {
    $('#borrara<?php //$incidencia->id?>').submit(function(event) {
        // Prevent form submission
        event.preventDefault();

        // Display confirmation dialog box
        bootbox.confirm({
            message: "Are you sure you want to submit this form?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-default'
                }
            },
            callback: function(result) {
                if (result) {
                    // User clicked "OK"
                    // Submit the form
                    alert("aa")
                    //$('#borrar').submit();
                } else {
                    // User clicked "Cancel" or closed the dialog
                    // Do nothing
                }
            }
        });
    });
});
*/
</script>

</html>