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
            <h3>Clientes</h3>
            <hr/>
        </div>
        <section class="col-lg-12 usuario">
        
               
                <hr/>
            <div class="table-responsive">
                                <table class="table color-table primary-table" id="tabla">
                                    <thead>
                                  
                                        <tr>
                                            <th>#</th>
                                            <th>tarifa</th>
                                            <th>preciohora</th>
                                            <th>iva</th>
                                         
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                      
                                        foreach($alltarifas as $tarifa) {?>
                                        <tr>
                                            <td><?php echo $tarifa->id; ?></td>
                                            <td> <?php echo $tarifa->tarifa; ?></td>
                                            <td> <?php echo $tarifa->preciohora; ?></td>
                                            <td> <?php echo $tarifa->iva; ?></td>
                                          
                                          
                                          
                                            <td>
                                                <a href="<?php echo $helper->urlId("tarifas","editar",$tarifa->id); ?>" class="btn btn-info">Editar</a>
                                            <a href="<?php echo $helper->url("tarifas","borrar",$tarifa->id); ?>" class="btn btn-danger">Borrar</a>
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