<?php
	
	namespace Prueba;
	
	class Cifrado {
		
		/**
		 * Cifrado::cod()
		 * 
		 * Genera el proceso de cifrado de la informacion
		 * @param string $plaintext
		 * @return strinf
		 */
		public static function cod($plaintext) {
			$key = 'xiGkMdJRsXf7nd7wCpchRan0';
			return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
		}
		
		/**
		 * Cifrado::decod()
		 * 
		 * Genera el proceso de decodificacion de la informacion
		 * @param string $ciphertext_base64
		 * @return string
		 */
		public static function decod($ciphertext_base64) {
			$key = 'xiGkMdJRsXf7nd7wCpchRan0';
			$decode = base64_decode($ciphertext_base64);
			return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $decode, MCRYPT_MODE_CBC,"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
		}
	}