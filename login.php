<?php

	require_once("sesion.class.php");
    
	$sesion = new sesion();

    $sesion_usuario = $sesion->get("sesion_usuario");
   
	
	if( $sesion_usuario != "" )
	{	
		header("Location: index.php");		
	}
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["username"];
		$password = $_POST["password"];
     
		if(count(validarUsuario($usuario,$password))>0)
		{		
            
            $valores=validarUsuario($usuario,$password);
			$sesion->set("sesion_usuario",$usuario);
            $sesion->set("sesion_role",$valores["role"]);
            $sesion->set("sesion_id_usuario",$valores["id"]);
            $sesion->set("sesion_id_empresas",$valores["id_empresas"]);
            $sesion->set("sesion_nombre",$valores["nombre"]);
            $sesion->set("sesion_apellido",$valores["apellido"]);
            $sesion->set("valores",$valores);
			
			header("location: index.php");
		}
		else 
		{
			echo "Verifica tu nombre de usuario y contraseña";
		}
	}
	
	function validarUsuario($usuario, $password)
	{
        include("bd.php");
	
        $conexion = new mysqli($host,$userBD,$passBD,$database);
		$consulta = "select usuarios.id,usuarios.username,usuarios.password,usuarios.nombre,usuarios.apellido,roles.role,usuarios.id_empresas from usuarios ";
		$consulta .= " INNER JOIN roles ON  usuarios.id_roles=roles.id";
        $consulta .= " where usuarios.username = '$usuario';";
		$result = $conexion->query($consulta);
		$valores=array();
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp(sha1($password),$fila["password"]) == 0 ){
                $valores["role"]=$fila["role"];
                $valores["id"]=$fila["id"];
                $valores["id_empresas"]=$fila["id_empresas"];
                $valores["nombre"]=$fila["nombre"];
                $valores["apellido"]=$fila["apellido"];
                 $valores["username"]=$fila["username"];
				return $valores;						
            }else					
				return $valores;
		}
		else
				return $valores;
	}
?>










<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="cssLogin/style.css">

	<style>

@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

	</style>

	</head>
	<body>



	<div class="container">
	<div class="screen">
		<div class="screen__content">
			
			<form class="login" name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
				<div class="login__field">
					<i class="login__icon "><img width="14px" src="images/us.png" alt=""></i>
					
					<input type="text" class="login__input" placeholder="Nombre de usuario" name="username">
				</div>
				<div class="login__field">
					<i class="login__icon "><img width="14px" src="images/key.png" alt=""></i>
					<input type="password" class="login__input" placeholder="Contraseña" name="password">
				</div>
				<button class="button login__submit" name="iniciar">
					<span class="button__text">Iniciar Sesión</span>
					<i class="button__icon"><img width="25px" src="images/log-in.png" alt=""></i>
				</button>				
			</form>

		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>



	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>