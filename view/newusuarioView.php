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
            
               
      
        <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5" id="newusuario">
            <h3>Editar usuario</h3>
        
            <?php if($sesion_role=="Administrador"){?>   
            
                <hr/>
            Nombre: <input type="text" name="nombre" class="form-control" />
            Apellido: <input type="text" name="apellido" class="form-control"  />
            Email: <input type="text" name="email" class="form-control"  />
            Contraseña: <input type="password" name="password" class="form-control"  />
            Role: 
            <select name="id_roles"  class="form-control">
                <option></option>
               
                <?php foreach($allroles as $role){?>
                
                       <option value="<?php echo $role->id;?>"><?php echo $role->role;?></option>                          
                <?php }?>
            </select>
            
            Empresa: 
            <select name="id_empresas"  class="form-control">
                <option></option>
               
                <?php foreach($allempresas as $empresa){
                       
                        ?>
                
                       <option    value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre_comercial;?></option>                          
                <?php }?>
            </select>
            
            <input type="submit" value="enviar" class="btn btn-success"/>

            <?php }else{?>
    
                <hr/>
            Nombre: <input type="text" name="nombre" class="form-control" />
            Apellido: <input type="text" name="apellido" class="form-control"  />
            Email: <input type="text" name="email" class="form-control"  />
            Contraseña: <input type="password" name="password" class="form-control"  />
            Role: <input type="password" name="id_roles" class="form-control" value="<?php echo 'empresa'?>"  />

            
            Empresa: 
            <select name="id_empresas"  class="form-control">
                <option></option>
               
                <?php foreach($allempresas as $empresa){
                       
                        ?>
                
                       <option    value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre_comercial;?></option>                          
                <?php }?>
            </select>
            
            <input type="submit" value="enviar" class="btn btn-success"/>    
    
            <?php };?>

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
  $("#newusuario").validate({
    rules: {
        nombre: {
        required: true
      },
        apellido: {
        required: true
      },
        email: {
        required: true,
        email:true
      },
        password: {
        required: true
      },
        id_roles: {
        required: true
      },
        id_empresas: {
        required: true
      },
    },
    messages: {
        nombre: {
        required: "Porfavor introduzca un nombre."
      },
        id_empresas: {
        required: "Porfavor seleccione una empresa."
        
      },
        apellido: {
        required: "Porfavor introduzca un apellido."
      },
        email: {
        required: "Porfavor introduzca un email.",
        email:"El email no es correcto"
      },
        password: {
        required: "Porfavor introduzca una contraseña."
      },
        id_roles: {
        required: "Porfavor seleccione un rol."
      },
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