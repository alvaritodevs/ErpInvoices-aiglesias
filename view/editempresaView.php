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
            
      
        <form action="<?php echo $helper->url("empresas","actualizar"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="editempresa">
            <h3>Editar empresa</h3>
        <input type="hidden" name="id" class="form-control" value="<?php echo $empresa->id;?>" />
            <hr/>
            nombre_comercial: <input type="text" name="nombre_comercial" class="form-control" value="<?php echo $empresa->nombre_comercial;?>" />
            razon_social: <input type="text" name="razon_social" class="form-control" value="<?php echo $empresa->razon_social;?>"  />
            cif_nif_nie: <input type="text" name="cif_nif_nie" class="form-control" value="<?php echo $empresa->cif_nif_nie;?>" />
          
            direccion: <input type="text" name="direccion" class="form-control" value="<?php echo $empresa->direccion;?>" />
            cp: <input type="number" name="cp" class="form-control" value="<?php echo $empresa->cp;?>" />
            localidad: <input type="text" name="localidad" class="form-control" value="<?php echo $empresa->localidad;?>" />
            provincia: <input type="text" name="provincia" class="form-control" value="<?php echo $empresa->provincia;?>" />
            
            
            telefono: <input type="number" name="telefono" class="form-control" value="<?php echo $empresa->telefono;?>"  />
            email: <input type="text" name="email" class="form-control" value="<?php echo $empresa->email;?>"  />
            persona_contacto: <input type="text" name="persona_contacto" class="form-control"  value="<?php echo $empresa->persona_contacto;?>"  />
            logo: <br>
             <input type="file" name="logo" class="form-control" />
            <img src="<?php echo $empresa->logo;?>" class="img-fluid col-lg-4 "/>
            <br>
            Tarifa: 
            <select name="id_tarifas" class="form-control" >
                <option></option>
                <?php echo $helper->crearOptionsSel($alltarifas,"id","tarifa",$empresa->id_tarifas);?>
                
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


        <!-- ===== Validator ===== -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>

$(document).ready(function() {
  $("#editempresa").validate({
    rules: {
        nombre_comercial: {
        required: true
      },
        razon_social: {
        required: true
      },
        direccion: {
        required: true
      },
        cp: {
        required: true
      },
        localidad: {
        required: true
      },
        provincia: {
        required: true
      },
        cif_nif_nie: {
        required: true
      },
        telefono: {
        required: true
      },
        email: {
        required: true
      },
        persona_contacto: {
        required: true
      },
        id_tarifas: {
        required: true
      },
        logo: {
        required: true
      }
    },
    messages: {
        nombre_comercial: {
        required: "Porfavor introduzca un nombre."
      },
        razon_social: {
        required: "Porfavor introduzca una razón social."
        
      },
        direccion: {
        required: "Porfavor introduzca una direccion."
      },
        cp: {
        required: "Porfavor introduzca un codigo postal."      
        
      },

        cif_nif_nie: {
        required: "Porfavor introduzca un cif."
      },

        localidad: {
        required: "Porfavor introduzca una localidad."
      },

        provincia: {
        required: "Porfavor introduzca una provincia."
      },

      telefono: {
        required: "Porfavor introduzca un telefono."
      },

      localidad: {
        required: "Porfavor introduzca una localidad."
      },

      email: {
        required: "Porfavor introduzca un email.",
        email:"El formato del email es incorrecto"
      },

      persona_contacto: {
        required: "Porfavor introduzca una persona de contacto."
      },

      id_tarifas: {
        required: "Porfavor seleccione una tarifa."
      },

      logo:{
        required:"Seleccione un logo porfavor"
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