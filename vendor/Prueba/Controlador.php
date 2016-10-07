<?php

	namespace Prueba;
	
	class Controlador {
		
		/**
		 * instancia de motor de plantillas
		 */
		protected $twig;
		
		/**
		 * instancia de rutas
		 */
		protected $ruta;
		
		/**
		 * Controlador::__construct()
		 * 
		 * Genera la construccion de las variables necesarias
		 * para el procesamiento de datos
		 * 
		 * @return void
		 */
		public function __construct() {
			$this->ruta = new Rutas();
			$loader = new \Twig_Loader_Filesystem(implode(DIRECTORY_SEPARATOR, array(dirname(dirname(__DIR__)), 'src', 'Vista')));
			$this->twig = new \Twig_Environment($loader);
			$this->twig->addExtension(new ExtensionTwig($_POST));
		}

	}