<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $helper->url("usuarios","editar"); ?>"  class="col-lg-5" method="post">
            <h3>detalle 2</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $usuario->id;?>"/>
             Nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>"/>
            Apellido: <input type="text" name="apellido" class="form-control" value="<?php echo $usuario->apellido;?>"/>
            Email: <input type="text" name="email" class="form-control"  value="<?php echo $usuario->email;?>"/>
            Contraseña: <input type="password" name="password" class="form-control"  value="<?php echo $usuario->password;?>"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        
		
	
        <footer class="col-lg-12">
            <hr/>
           Ejemplo PHP MySQLi POO MVC
        </footer>
    </body>
</html>