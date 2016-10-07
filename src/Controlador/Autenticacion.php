<?php
	
	namespace Controlador;
	use \Prueba\Controlador;
	
	class Autenticacion extends Controlador {
		
		/**
		 * Autenticacion::Index()
		 * 
		 * Genera el proceso de validacion
		 * de los datos del usuario de lo contrario
		 * retornara al login
		 * 
		 * @return raw
		 */
		public function Index() {
			
			if(isset($_POST) AND isset($_POST['user']) AND isset($_POST['pass'])):
				$this->validacion();
			else:
				header("Location: ".$this->ruta->controlador('Login?mensaje=novalido'));
				exit();
			endif;
		}
		
		/**
		 * Autenticacion::validacion()
		 * 
		 * Se realiza la validacion de la existencia del usuario
		 * de lo contrario retornara al login
		 * 
		 * @return void
		 */
		private function validacion() {
			
			if($this->vacio() == false):
				$this->consulta();
			else:
				
				header("Location: ".$this->ruta->controlador('Login?mensaje=datosvacios'));
				exit();
			endif;
		}
		
		/**
		 * Autenticacion::consulta()
		 * 
		 * Genera la validacion del usuario
		 * @return raw
		 */
		private function consulta() {
			
			$modelo = new \Modelo\Autenticacion();
			$data = $modelo->consultar(trim(mb_strtolower($_POST['user'])), trim(\Prueba\Cifrado::cod($_POST['pass'])));
			//dump($data);die;
			if($data == true):
				$this->sesion($data);
			else:
				header("Location: ".$this->ruta->controlador('Login?mensaje=datosincorrectos'));
				exit();
			endif;
		}
		
		/**
		 * Autenticacion::sesion()
		 * 
		 * registra la sesion correspondiente
		 * y redirecciona a zona segura
		 * 
		 * @return void
		 */
		private function sesion($info) {
			session_start();
			
			$_SESSION['sesion'] = 'ACTIVO_FULL';
			foreach ($info AS $nombre => $valor):
				$_SESSION[$nombre] = $valor;
			endforeach;
			
			header("Location: ".$this->ruta->controlador('Seguro'));
			exit();
		}
		
		/**
		 * Autenticacion::vacio()
		 * 
		 * Valida si los datos correspondientes son vacios
		 * @return boolean
		 */
		private function vacio() {
			foreach ($_POST AS $valor):
				if(empty($valor) == true):
					$lista[] = true;
				endif;
			endforeach;
			
			return (isset($lista) == true) ? true : false;
		}
	}