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
         
      
        <form action="<?php echo $helper->url("tarifas","actualizar"); ?>" method="post" class="col-lg-5" id="edittarifa">
            <h3>Nueva tarifa</h3>
        
            <hr/>
           <input type="hidden" name="id"  value="<?php echo $tarifa->id;?>" />
            tarifa: <input type="text" name="tarifa" class="form-control" value="<?php echo $tarifa->tarifa;?>" />
            preciohora: <input type="number" name="preciohora" class="form-control" value="<?php echo $tarifa->preciohora;?>"  />
            iva: <input type="number" name="iva" class="form-control" value="<?php echo $tarifa->iva;?>" />
           
            <!--  id_empresas: 
            
            <select name="id_empresas" class="form-control" >
                <option></option>
                <?php echo $helper->crearOptions($allempresas,"id","nombre_comercial");?>
            </select> -->
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

        
    <!-- ===== Validator ===== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script>

$(document).ready(function() {
  $("#edittarifa").validate({
    rules: {
        tarifa: {
        required: true
      },
        preciohora: {
        required: true
      },
        iva: {
        required: true
      }
    },
    messages: {
        tarifa: {
        required: "Porfavor introduzca una tarifa correcta."
      },
        preciohora: {
        required: "Porfavor introduzca un precio por hora."
        
      },
        iva: {
        required: "Porfavor introduzca un iva."
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