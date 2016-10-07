<?php
	
	namespace Prueba;
	
	class Boot {
		
		private $uri;
		
		/**
		 * Boot::__construct()
		 * 
		 * Genera el formato de los datos enviados por URL
		 * @return void
		 */
		function __construct() {
			$this->uri = (array_key_exists('PATH_INFO', $_SERVER)) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : array('Login');
		}
		
		/**
		 * Boot::execute()
		 * 
		 * Ejecuta el proceso de validacion de la URL para
		 * la carga de la informacion solicitada
		 * 
		 * @return raw
		 */
		public function execute() {
			
			if($this->uri[0] == true AND empty($this->uri[0]) == false):
				$this->seleccion($this->uri[0]);
			else:
				call_user_func(array(new \Controlador\Login(), 'Index'));
			endif;
		}
		
		/**
		 * Boot::seleccion()
		 * 
		 * Determina las opciones validas para la carga correspondiente
		 * del controlador
		 * 
		 * @param string $uri
		 * @return raw
		 */
		private function seleccion($uri) {
			if(array_key_exists($uri, array_flip(array('Login', 'Autenticacion', 'Seguro', 'LogOut')))):
				$clase = '\\Controlador\\'.$uri;
				call_user_func(array(new $clase, 'Index'));
			else:
				call_user_func(array(new \Controlador\Login(), 'Index'));
			endif;
		}
	}