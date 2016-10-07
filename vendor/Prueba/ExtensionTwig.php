<?php
	
	namespace Prueba;
	
	class ExtensionTwig extends \Twig_Extension {
		
		/**
		 * contenedores de datos
		 */
		private $post, $ruta;
		
		/**
		 * ExtensionTwig::__construct()
		 * 
		 * Genera la construccion de las variables
		 * correspondientes para aplicarlas en la
		 * plantilla
		 * 
		 * @param array $post
		 * @param object $ruta
		 * @return void
		 */
		function __construct($post = array()) {
			$this->post = $post;
			$this->ruta = new Rutas();
		}
		
		/**
		 * ExtensionTwig::getGlobals()
		 * 
		 * Asigna las variables globales en la plantilla
		 * @return array
		 */
		public function getGlobals() {
			return array(
				'post' => $this->post,
				'rutas' => $this->ruta
			);
		}
		
		/**
		 * ExtensionTwig::getFunctions()
		 * 
		 * retorna las funciones personalizadas
		 * para las plantillas
		 * 
		 * @return array
		 */
		public function getFunctions() {
			return array(
				new \Twig_SimpleFunction('assets', array($this, 'assetFunction')),
				new \Twig_SimpleFunction('decodificar', array($this, 'decodificarFunction')),
			);
		}
		
		/**
		 * ExtensionTwig::decodificarFunction()
		 * 
		 * Genera el proceso de decodificacion
		 * @param string $data
		 * @return string
		 */
		public function decodificarFunction($data) {
			return \Prueba\Cifrado::decod($data);
		}
		
		/**
		 * ExtensionTwig::assetFunction()
		 * 
		 * Retorna la ruta correspondiente al asset
		 * @param string $data
		 * @return string
		 */
		public function assetFunction($data) {
			return $this->ruta->asset($data);
		}
		
		/**
		 * ExtensionTwig::getName()
		 * 
		 * Retorna el nombre de la extension
		 * @return string
		 */
		public function getName() {
			return 'Prueba de Login';
		}
	}