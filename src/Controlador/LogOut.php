<?php
	
	namespace Controlador;
	use \Prueba\Controlador;
	
	class LogOut extends Controlador {
		
		/**
		 * LogOut::__construct()
		 * 
		 * Genera el proceso de eliminacion de la sesion
		 * @return void
		 */
		public function __construct() {
			session_start();
			session_destroy();
			unset($_SESSION);
			parent::__construct();
		}
		
		/**
		 * LogOut::Index()
		 * 
		 * genera la redireccion al login correspondiente
		 * @return void
		 */
		public function Index() {
			header("Location: ".$this->ruta->controlador('Login'));
			exit();
		}
	}