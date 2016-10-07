<?php
	
	namespace Modelo;
	
	class Autenticacion {
		
		private $pdo;
		
		/**
		 * Autenticacion::__construct()
		 * 
		 * Genera la conexion a la base de datos
		 * @return void
		 */
		function __construct() {
			$this->pdo = new \PDO('sqlite:'.__DIR__.DIRECTORY_SEPARATOR.'DB.sqlite');
		}
		
		/**
		 * Autenticacion::consultar()
		 * 
		 * Genera la validacion si existe el usuario
		 * en la base de datos y su credencial valida
		 * 
		 * @param string $usuario
		 * @param string $pass
		 * @return integer
		 */
		public function consultar($usuario = false, $pass = false) {
			$consulta = $this->pdo->prepare('SELECT * FROM USUARIOS WHERE USUARIO = ? AND PASSWORD = ?');
			$consulta->bindValue(1, $usuario);
			$consulta->bindValue(2, $pass);
			$consulta->execute();
			
			return $consulta->fetch(\PDO::FETCH_ASSOC);
		}
	}