<?php
	
	namespace Controlador;
	use \Prueba\Controlador;
	
	class Seguro extends Controlador {
		
		/**
		 * Seguro::__construct()
		 * 
		 * Genera la validacion de la sesion y su destruccion
		 * @return void
		 */
		public function __construct() {
			session_start();
			parent::__construct();
			if($_SESSION['sesion'] != 'ACTIVO_FULL'):
				header("Location: ".$this->ruta->controlador('LogOut'));
				exit();
			endif;
		}

		
		/**
		 * Seguro::Index()
		 * 
		 * Genera plantilla de bienvenida
		 * @return raw
		 */
		public function Index() {
			echo $this->twig->render('Base.html.twig', array('sesion' => $_SESSION));
		}
	}