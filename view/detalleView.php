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
        <form action="#" method="post" class="col-lg-5">
            <h3>Detalle usuario</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" disabled/>
            Apellido: <input type="text" name="apellido" class="form-control" value="<?php echo $usuario->apellido;?>" disabled/>
            Email: <input type="text" name="email" class="form-control"  value="<?php echo $usuario->email;?>" disabled/>
            Contraseña: <input type="password" name="password" class="form-control"  value="<?php echo $usuario->password;?>" disabled/>
        </form>
        
        
		
	
        <footer class="col-lg-12">
            <hr/>
           Ejemplo PHP MySQLi POO MVC
        </footer>
    </body>
</html>