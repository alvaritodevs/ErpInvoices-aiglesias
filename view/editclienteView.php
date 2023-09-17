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
        
        <div class="page-wrapper">
            <div class="container-fluid">
            <?php var_dump($cliente);?>
      
        <form action="<?php echo $helper->url("clientes","actualizar"); ?>" method="post" class="col-lg-5">
            <h3>Editar cliente</h3>
        <input type="hidden" name="id" class="form-control" value="<?php echo $cliente->id;?>" />
            <hr/>
            
            nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $cliente->nombre;?>" />
            apellidos: <input type="text" name="apellidos" class="form-control" value="<?php echo $cliente->apellidos;?>"  />
            nif: <input type="text" name="nif" class="form-control" value="<?php echo $cliente->nif;?>" />
            direccion: <input type="text" name="direccion" class="form-control" value="<?php echo $cliente->direccion;?>"  />
            localidad: <input type="text" name="localidad" class="form-control" value="<?php echo $cliente->localidad;?>"  />
            cp: <input type="text" name="cp" class="form-control"  value="<?php echo $cliente->cp;?>"  />º
            
              provincia: <input type="text" name="provincia" class="form-control"  value="<?php echo $cliente->provincia;?>"  />
              pais: <input type="text" name="pais" class="form-control"  value="<?php echo $cliente->pais;?>"  />
              telefono: <input type="text" name="telefono" class="form-control"  value="<?php echo $cliente->telefono;?>"  />
              email: <input type="text" name="email" class="form-control"  value="<?php echo $cliente->email;?>"  />
              observaciones: <input type="text" name="observaciones" class="form-control"  value="<?php echo $cliente->observaciones;?>"  />
              id_empresas: 
            
            
            <select name="id_empresas" class="form-control" >
                <option></option>
                <?php echo $helper->crearOptionsSel($allempresas,"id","nombre_comercial",$cliente->id_empresas);?>
                
            </select> 
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        
		
	<!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
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