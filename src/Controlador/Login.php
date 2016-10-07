<?php
	
	namespace Controlador;
	use \Prueba\Controlador;
	
	class Login extends Controlador {
		
		/**
		 * Login::index()
		 * 
		 * Muestra la plantilla del login de la aplicacion
		 * @return raw
		 */
		public function index() {
			echo $this->twig->render('Login.html.twig');
		}
	}