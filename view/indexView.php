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
                
                <?php if(isset($_GET["controller"])){?>
                
            <div class="col-lg-7">
            <h3>Usuarios</h3>
            <hr/>
        </div>
        <section class="col-lg-12 usuario" style="height:400px;overflow-y:scroll;">
          <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5">
            <h3>Nuevo usuario</h3>
            <input type="hidden" name="id"  />
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control" />
            Apellido: <input type="text" name="apellido" class="form-control" />
            Email: <input type="text" name="email" class="form-control" />
            Contraseña: <input type="password" name="password" class="form-control" />
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>  
               
                <hr/>
            <div class="table-responsive">
                                <table class="table color-table primary-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
                                            <td> <?php echo $user->nombre; ?></td>
                                            <td><?php echo $user->apellido; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td>
                                                <a href="<?php echo $helper->url("usuarios","editar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Editar</a>
                                            <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
                                            </td>
                                        </tr>
                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            
            <hr/>
            <form action="<?php echo $helper->url("roles","crear"); ?>" method="post" class="col-lg-5">
            <h3>Nuevo role</h3>
            
            <hr/>
            Role: <input type="text" name="role" class="form-control" />
      
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>  
            <div class="table-responsive">
                                <table class="table color-table primary-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Role</th>
                                          
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($allroles as $role) {?>
                                        <tr>
                                            <td><?php echo $role->id; ?></td>
                                            <td> <?php echo $role->role; ?></td>
                                          
                                            <td>
                                                <a href="<?php echo $helper->url("roles","editar"); ?>&id=<?php echo $role->id; ?>" class="btn btn-info">Editar</a>
                                            <a href="<?php echo $helper->url("roles","borrar"); ?>&id=<?php echo $role->id; ?>" class="btn btn-danger">Borrar</a>
                                            </td>
                                        </tr>
                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            
            
        </section>
                <?php }?>
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
</body>

</html>