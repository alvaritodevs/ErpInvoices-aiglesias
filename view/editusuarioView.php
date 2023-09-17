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
            
      
        <form action="<?php echo $helper->url("usuarios","actualizar"); ?>" method="post" class="col-lg-5" id="editUsuario">
            <h3>Editar usuario</h3>
            <input type="hidden" name="id"  value="<?php echo $usuario->id;?>" />
            <hr/>

            <?php if($sesion_role=="Administrador"){?>  

            Username: <input type="text" name="username" class="form-control" value="<?php echo $usuario->username;?>" />
            Contraseña: <input type="password" name="password" class="form-control"  value="<?php echo $usuario->password;?>"/>
            Nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" />
            Apellido: <input type="text" name="apellido" class="form-control"  value="<?php echo $usuario->apellido;?>"/>
            Email: <input type="text" name="email" class="form-control"  value="<?php echo $usuario->email;?>"/>
            
            
            Role: 
            <select name="id_roles"  class="form-control">
                <option></option>
               
                <?php foreach($allroles as $role){
                        $selected="";
                        if($role->id==$usuario->id_roles)$selected="selected";
                        ?>
                
                       <option  <?php echo $selected;?>    value="<?php echo $role->id;?>"><?php echo $role->role;?></option>                          
                <?php }?>
            </select>
            
            
             Empresa: 
            <select name="id_empresas"  class="form-control">
                <option></option>
               
                <?php foreach($allempresas as $empresa){
                        $selected="";
                        if($empresa->id==$usuario->id_empresas)$selected="selected";
                        ?>
                
                       <option  <?php echo $selected;?>    value="<?php echo $empresa->id;?>"><?php echo $empresa->nombre_comercial;?></option>                          
                <?php }?>
            </select>

            <?php }else{ ?>

            Username: <input type="text" name="username" class="form-control" value="<?php echo $usuario->username;?>" />
            Contraseña: <input type="password" name="password" class="form-control"  value="<?php echo $usuario->password;?>"/>
            Nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" />
            Apellido: <input type="text" name="apellido" class="form-control"  value="<?php echo $usuario->apellido;?>"/>
            Email: <input type="text" name="email" class="form-control"  value="<?php echo $usuario->email;?>"/>

            <input type="hidden" name="id_roles" class="form-control"  value="<?php echo $usuario->id_roles;?>"/>
            
            <input type="hidden" name="id_empresas" class="form-control"  value="<?php echo $usuario->id_empresas;?>"/>

            <?php } ?>

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


    <?php if($sesion_role=="Administrador"){?>   
            
      <script>

$(document).ready(function() {
  $("#editUsuario").validate({
    rules: {
        username: {
        required: true
      },
        email: {
        required: true,
        email:true

      },
        password: {
        required: true
      },

        nombre: {
        required: true
      },

        apellido: {
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
        username: {
        required: "Porfavor introduce un nombre de usuario"
      },
        password: {
        required: "Porfavor introduce tu contraseña"
        
      },
        email: {
        required: "Porfavor introduce un email",
        email: "El formato del email es incorrecto"
      },

        nombre: {
        required: "Porfavor introduce un nombre"
      },
        apellido: {
        required: "Porfavor introduce un apellido "
      },

      id_roles: {
        required: "Porfavor seleccione un rol"
      },

      id_empresas: {
        required: "Please enter a message",
        email: "Please enter a valid email address"
      },
    },

    });
  });
        </script>


    <?php }else{?>
                
      <script>

$(document).ready(function() {
  $("#editUsuario").validate({
    rules: {
        username: {
        required: true
      },
        email: {
        required: true,
        email:true

      },
        password: {
        required: true
      },

        nombre: {
        required: true
      },

        apellido: {
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
        username: {
        required: "Porfavor introduce un nombre de usuario"
      },
        password: {
        required: "Porfavor introduce tu contraseña"
        
      },
        email: {
        required: "Porfavor introduce un email",
        email: "El formato del email es incorrecto"
      },

        nombre: {
        required: "Porfavor introduce un nombre"
      },
        apellido: {
        required: "Porfavor introduce un apellido "
      },

        id_roles: {
        required: "Porfavor seleccione un rol"
      },

        id_empresas: {
        required: "Porfavor seleccione una empresa",

      },
    },

  });
});
        </script>
                
    <?php };?>

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

