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
            
        <?php if($sesion_role=="Administrador"){ ?>
            <form action="<?php echo $helper->url("incidencias","crear"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="newincidencia">
        <?php }else{ ?>

            <form action="<?php echo $helper->url("incidencias","crearemail"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="newincidencia">

        <?php } ?>

        <h3>Nueva incidencia</h3>
            
            <hr/>
            
  
            fecha: <input type="date" name="fecha" class="form-control"  />

            descripcion:<textarea type="text" name="descripcion" class="form-control" cols="40" rows="5"></textarea>

            
        <?php if($sesion_role=="Administrador"){?>   
            
            estado: 
            <select name="estado" class="form-control">
                <option value="0">Abierta</option>
                <option value="1">Cerrada</option>

            </select>
            
            duracion: <input type="number" name="duracion" class="form-control"  />
            Empresa: <select name="id_empresas" class="form-control" >
            <option></option>
            <?php foreach($allempresas as $empresa){
            
            ?>
             <option  value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre_comercial;?></option>
            <?php }?>
            
            </select>

                
        <?php }else{?>

            <input type="hidden" name="id_empresas" value="<?php echo $sesion_id_empresas?>">
            <input type="hidden" name="estado" class="form-control" />
            <input type="hidden" name="duracion" class="form-control"  />
            <input type="hidden" name="facturada" class="form-control"  />


        <?php };?>
  

            <input type="submit" value="enviar" class="btn btn-success" id="enviar"/>
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
    <!-- Dropzone JavaScript -->



    <!-- ===== Validator ===== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



    <script>

    <?php if($sesion_role=="Administrador"){?>   
            
             
        $(document).ready(function() {

        $("#newincidencia").validate({
            
            rules: {
                fecha: {
                required: true
            },
                descripcion: {
                required: true
            },
                estado: {
                required: true
            },
                duracion: {
                required: true
            },
                id_empresas: {
                required: true
            },
                facturada: {
                required: true
            }
            },
            messages: {
                fecha: {
                required: "Porfavor introduzca una fecha."
            },
                id_empresas: {
                required: "Porfavor seleccione una empresa."
                
            },
                estado: {
                required: "Porfavor introduzca un estado."
            },
                duracion: {
                required: "Porfavor introduzca una duración."
            },
                facturada: {
                required: "Porfavor seleccione si esta facturada."
            },
                descripcion: {
                required: "Porfavor introduzca una descripción."
            }
            },

        });
        });

    <?php }else{?>
        
        $(document).ready(function() {

            $("#newincidencia").validate({
            
            rules: {
                fecha: {
                required: true
                },
                descripcion: {
                required: true
                }
            },
            messages: {
                fecha: {
                required: "Porfavor introduzca una fecha."
                },
                descripcion: {
                required: "Porfavor introduzca una descripción."
                }
            },

            });
        });
        
    <?php };?>

</script>

<style>

    .error{
  display: flex;
  color: red;
  margin-left: 5px;
  vertical-align: middle;}

</style>

</body>

</html>