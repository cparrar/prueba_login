<?php
	
	/**
	 * Genera la llamada al namespace
	 */
	use \Prueba\Boot;
	
	/**
	 * llamada del autoload de la aplicacion
	 */
	require implode(DIRECTORY_SEPARATOR, array(dirname(__DIR__), 'vendor', 'autoload.php'));
	
	/**
	 * Genera la ejecucion del proceso basico
	 */
	$boot = new \Prueba\Boot();
	$boot->execute();