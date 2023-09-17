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
            
      
        <form action="<?php echo $helper->url("facturas","crear"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="newfactura">
            <h3>Nueva factura</h3>
            
            <hr/>
          
            fecha: <input type="date" name="fecha" class="form-control"  />
            
            Empresa: <select name="id_empresas" class="form-control" >
            <option></option>
            <?php foreach($allempresas as $empresa){
            
            ?>
             <option  value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre_comercial;?></option>
            <?php }?>
            
            </select>
            
            Incidencia: <select name="id_incidencias" class="form-control" >
            <option></option>()
            
            <?php echo $helper->crearOptionsVariosCampos($allincidencias,"id","fecha,descripcion");?>
            
            
            
            </select>
            
     
            
            baseimponible: <input type="number" name="baseimponible" class="form-control"  />
            
            iva: <input type="number" name="iva" class="form-control"  />
            
            total: <input type="number" name="total" class="form-control"  />
            
       
            
            
            
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

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- ===== Validator ===== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script>

$(document).ready(function() {
  $("#newfactura").validate({
    rules: {
        fecha: {
        required: true
      },
        id_empresas: {
        required: true
      },
        id_incidencias: {
        required: true
      },
        baseimponible: {
        required: true
      },
        iva: {
        required: true
      },
        total: {
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
        id_incidencias: {
        required: "Porfavor seleccione una incidencia."
      },
        baseimponible: {
        required: "Porfavor introduzca una base imponible."
      },
        iva: {
        required: "Porfavor introduzca el iva.."
      },
        total: {
        required: "Porfavor introduzca el total."
      }
    },

  });
});
        </script>


<style>

    .error{

  display: flex;
  color: red;
  margin-left: 5px;
  vertical-align: middle;
    }


</style>
</body>

</html>