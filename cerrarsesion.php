<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$sesion_usuario = $sesion->get("sesion_usuario");	
	if( $sesion_usuario == false )
	{	
		header("Location: login.php");
	}
	else 
	{
		$sesion_usuario = $sesion->get("sesion_usuario");	
		$sesion->termina_sesion();	
		header("location: login.php");
	}
?>