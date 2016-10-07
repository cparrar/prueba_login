<?php
	
	namespace Prueba;
	
	class Rutas {
		
		/**
		 * Contenedor array de variables de servidor
		 */
		private $server;
		
		/**
		 * Rutas::__construct()
		 * 
		 * Constructor de informacion general
		 * @return void
		 */
		public function __construct() {
			$this->server = $_SERVER;
		}
		
		/**
		 * Rutas::asset()
		 * 
		 * Genera la ruta para los assets de la plantilla
		 * @param string $ruta
		 * @return string
		 */
		public function asset($ruta) {
			$protocolo = 'http://';
			$path = implode('/', array(trim($this->server['HTTP_HOST'], '/'), trim(dirname($this->server['SCRIPT_NAME']), '/'), trim($ruta, '/'))); 
			return $protocolo.$this->server['HTTP_HOST'].trim(trim(dirname($this->server['SCRIPT_NAME']), '/'), '\\').'/'.$ruta;
		}
		
		/**
		 * Rutas::controlador()
		 * 
		 * Genera la ruta del controlador
		 * @param string $controlador
		 * @return string
		 */
		public function controlador($controlador) {
			$protocolo = 'http://';
			$path = implode('/', array(trim($this->server['HTTP_HOST'], '/'), trim($this->server['SCRIPT_NAME'], '/'), $controlador));
			return $protocolo.$path;
		}
	}