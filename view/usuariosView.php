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
            <h3>Usuarios</h3>
            <hr/>
        </div>
        <section class="col-lg-12 usuario">
    <?php if($sesion_role=="Administrador"){?>      
        <a href="<?php echo $helper->url("Usuarios","exportar");?>" class="btn btn-success">Exportar</a>
    <?php }else{   ?>
        <a href="<?php echo $helper->url("Usuarios","exportaralt");?>&id_empresas=<?php echo $sesion_id_empresas?>" class="btn btn-success">Exportar</a>
    <?php  } ?>
                <hr/>
                            <?php if($sesion_role=="Administrador"){?>    
                                <div class="table-responsive">
                                <table class="table color-table primary-table" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($allusuarios as $user) {?>
                                        <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td> <?php echo $user->username; ?></td>
                                            <td> <?php echo $user->nombre; ?></td>
                                            <td><?php echo $user->apellido; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td>
                                                <a href="<?php echo $helper->url("usuarios","editar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Editar</a>
                                            <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
                                                
                                                <a href="<?php echo $helper->url("usuarios","imprimir"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Imprimir</a>
                                                
                                                  <a href="<?php echo $helper->url("usuarios","enviaremail"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Email</a>
                                            </td>
                                        </tr>
                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            <?php }else{ ?>

                <div class="table-responsive">
                                <table class="table color-table primary-table" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UserName</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($allusuarios as $user) {?>

                                            <?php if ($user->id_empresas==$sesion_id_empresas) { ?>
                                            
                                                <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td> <?php echo $user->username; ?></td>
                                            <td> <?php echo $user->nombre; ?></td>
                                            <td><?php echo $user->apellido; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td>
                                                <a href="<?php echo $helper->url("usuarios","editar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Editar</a>
                                            <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
                                                
                                                <a href="<?php echo $helper->url("usuarios","imprimir"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Imprimir</a>
                                                
                                                  <a href="<?php echo $helper->url("usuarios","enviaremail"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Email</a>
                                            </td>
                                        </tr>

                                            <?php } ?>

                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                </div>    
            <?php } ?>
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

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        
        $('#tabla').DataTable( {
            responsive: true
        } );

    });


    </script>
</body>

</html>